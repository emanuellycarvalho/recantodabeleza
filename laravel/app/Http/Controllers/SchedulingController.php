<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelClient;
use App\Models\ModelService;
use App\Models\ModelEmployee;
use App\Models\ModelScheduling;
use App\Models\ModelEmployeeType;
use App\Models\AgendamentoServico;
use App\Http\Requests\SchedulingRequest;
use Carbon\Carbon;

class SchedulingController extends Controller
{
    protected  $agendamentoServico;
    protected  $objEmployeeType;    
    protected  $objScheduling;
    protected  $objEmployee;   
    protected  $objService;
    protected  $objClient;

    public function __construct(){
        $this->agendamentoServico = new AgendamentoServico();
        $this->objEmployeeType = new ModelEmployeeType();
        $this->objScheduling = new ModelScheduling();
        $this->objEmployee = new ModelEmployee();
        $this->objService = new ModelService();
        $this->objClient = new ModelClient();
    }

    public function index()
    {
        return redirect('index');
    }

    public function create($date)
    {
        try{
            $back = 'Cancelar';
        
            $date = $this->generateDate($date);

            $id = $this->getAtendente();
            $etype = $this->objEmployeeType->where('cdTipoFuncionario', $id)->first();
            $employees = $etype->relEmployee()->get();

            $schedule = $this->objScheduling->all();
            $services = $this->objService->all();
            $clients = $this->objClient->all();
            return view('newScheduling')->with(compact('employees'))
                                        ->with(compact('clients'))
                                        ->with(compact('schedule'))
                                        ->with(compact('services'))
                                        ->with(compact('date'))
                                        ->with(compact('back')); 
        }catch(Excepcion $e){
            abort(401, $e->getMessage());
        }    
    }
  
    public function store(SchedulingRequest $request)
    {  
        try {

            $start = $request->data . ' ' . $request->inicio;
            $end = $request->data . ' ' . $request->fim;
            
            $client = $this->findClient($request->cliente);
            
            $agendamento = $this->objScheduling->create([
                'title' => $client['nome'],
                'telefone' => $client['telefone'],
                'start' => Carbon::createFromFormat('d/m/Y H:i', $start, 'America/Sao_Paulo')->toDateTimeString(),
                'end' => Carbon::createFromFormat('d/m/Y H:i', $end, 'America/Sao_Paulo')->toDateTimeString(),
                'valorTotal' => $request->total,
                'cdFuncionario' => 3, //futuramente o usuario logado
                'cdCliente' => $request->cliente
            ]); 
            
            $servicos = $request->service_id;
            $funcionarios = $request->employee_id;
            $valores = $request->valor;
            
            for($i = 0; $i < sizeof($servicos); $i++){
                $agendamento->relService()->attach($servicos[$i], ['cdFuncionario' => $funcionarios[$i], 'valorCobrado' => $valores[$i+1]]);
            } 
            
            return redirect('adm/');
        } catch (Exception $e){
            abort(401, $e->getMessage());
        }
    }
  
    public function edit($id)
    {
        $back = 'Voltar';
        $scd = $this->objScheduling->where('cdAgendamento', $id)->first();
        
        $rel = $this->agendamentoServico->where('cdAgendamento', $id)->get();
        $rel = $this->menageRelationship($rel);
        //dd($rel);

        $date = Carbon::createFromFormat('Y-m-d H:i:s', $scd->start)->format('d/m/Y');
        $start = Carbon::createFromFormat('Y-m-d H:i:s', $scd->start)->format('H:i');
        $end = Carbon::createFromFormat('Y-m-d H:i:s', $scd->end)->format('H:i');

        $id = $this->objEmployeeType->where('nmFuncao', 'Atendente')->first()->cdTipoFuncionario;
        $employees = $this->objEmployee->all();
        $services = $this->objService->all();
        $clients = $this->objClient->all();
        return view('newScheduling')->with(compact('employees'))
                                    ->with(compact('id'))
                                    ->with(compact('clients'))
                                    ->with(compact('services'))
                                    ->with(compact('date'))
                                    ->with(compact('start'))
                                    ->with(compact('end'))
                                    ->with(compact('scd'))
                                    ->with(compact('rel'))
                                    ->with(compact('back'));
    }
  
    public function update(SchedulingRequest $request, $id)
    {
        try {
            $start = $request->data . ' ' . $request->inicio;
            $end = $request->data . ' ' . $request->fim;
            
            $client = $this->findClient($request->cliente);
            
            $this->objScheduling->where('cdAgendamento', $id)->update([
                'title' => $client['nome'],
                'telefone' => $client['telefone'],
                'start' => Carbon::createFromFormat('d/m/Y H:i', $start, 'America/Sao_Paulo')->toDateTimeString(),
                'end' => Carbon::createFromFormat('d/m/Y H:i', $end, 'America/Sao_Paulo')->toDateTimeString(),
                'valorTotal' => $request->total,
                'cdFuncionario' => 3, //futuramente o usuario logado
                'cdCliente' => $request->cliente
            ]); 
            
            $servicos = $request->service_id;
            $funcionarios = $request->employee_id;
            $valores = $request->valor;
    
            $agendamento = $this->objScheduling->where('cdAgendamento', $id)->first();
            //dd($agendamento);

            $this->agendamentoServico->where('cdAgendamento', $id)->delete();

            for($i = 0; $i < sizeof($servicos); $i++){
                $this->agendamentoServico->insert([
                    'cdAgendamento' => $id,
                    'cdServico' => $servicos[$i], 
                    'cdFuncionario' => $funcionarios[$i], 
                    'valorCobrado' => $valores[$i+1],
                    'created_at' => $agendamento->created_at,
                    'updated_at' => Carbon::now()
                ]);
            } 
                        
            return redirect('adm/');
        } catch (Exception $e){
            abort(401, $e->getMessage());
        }
    }
  
    public function destroy($id)
    {
        try{
            $this->objScheduling->where('cdAgendamento', $id)->delete();
        } catch(Exception $e){
            abort(401, $e->getMessage());
        }

        return redirect('adm/');
    }

    public function show($id)
    {
        return $this->destroy($id);
    }

    protected function loadEvents(){
        $schedule = $this->objScheduling->all();
        return response()->json($schedule); 
    }

    protected function getAtendente(){
        $obj = $this->objEmployeeType->where('nmFuncao', 'Atendente')->first();
        if($obj != null){
            return $obj->cdTipoFuncionario;
        }

        throw new \Exception('Desculpe, ocorreu um erro ao recuperar os atendentes.');
    }
    protected function findClient($id){
        $client = $this->objClient->where('cdCliente', $id)->first();
        if ($client != null){
            $client = [
                'success' => true,
                'error' => null,
                'nome' => $client->nmCliente,
                'telefone' => $client->telefone
            ];
        } else {
            throw new \Exception('Desculpe, ocorreu um erro ao identificar o cliente.');
        }
        return $client;
    }

    protected function generateDate($date){
        if ($date == null){
            $date = Carbon::today()->setTimezone('America/Sao_Paulo')->format('Y-m-d')->toDateTimeString();
        }

        $date = Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
        
        return $date;
    }

    protected function menageRelationship($rel){
        //dd('a');
        if($rel != null){
            //dd('b');
            $return = [];
            foreach($rel as $r){
                $re = new \stdClass();
                $service = $this->objService->where('cdServico', $r->cdServico)->first();
                $employee = $this->objEmployee->where('cdFuncionario', $r->cdFuncionario)->first();

                $re->cdFuncionario = $employee->cdFuncionario;
                $re->nmFuncionario = $employee->nmFuncionario;
        
                $re->cdServico = $service->cdServico;
                $re->nmServico = $service->nmServico;

                array_push($return, $re);
            }
            //dd($return);
            return $return;
        }  else {
            throw new \Exception('Desculpe, ocorreu um erro ao recuperar os servicos deste agendamento.');
        }
    }
}
