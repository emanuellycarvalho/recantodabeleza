<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelClient;
use App\Models\ModelService;
use App\Models\ModelEmployee;
use App\Models\ModelScheduling;
use App\Models\ModelEmployeeType;
use App\Models\Event;
use App\Http\Requests\SchedulingRequest;
use Carbon\Carbon;

class SchedulingController extends Controller
{
    protected  $objScheduling;
    protected  $objEmployee;    
    protected  $objService;
    protected  $objClient;

    public function __construct(){
        $this->objEmployeeType = new ModelEmployeeType();
        $this->objScheduling = new ModelScheduling();
        $this->objEmployee = new ModelEmployee();
        $this->objService = new ModelService();
        $this->objClient = new ModelClient();
    }

    public function index()
    {
        //$schedule = $this->objScheduling->all();
        //$employees = $this->objEmployee->all();
        //$clients = $this->objC lient->all();
        //return view('scheduling', compact('employees'), compact('clients'), compact('schedule'));
    }
     
    public function loadEvents(){
        $schedule = Event::all();
        return response()->json($schedule); 
    }

    public function findClient($id){
        $client = $this->objClient->where('cdCliente', $id);
        if ($client != null){
            $client = [
                'success' => true,
                'error' => null,
                'nome' => $client->nmCliente,
                'telefone' => $client->telefone
            ];
        } else {
            $client = [
                'success' => false,
                'error' => 'Desculpe-nos, ocorreu um erro ao encontrar o cliente'
            ];
        }
        return $client;
    }
    
    public function create()
    {
        $id = $this->objEmployeeType->where('nmFuncao', 'Atendente')->first()->cdTipoFuncionario;
        $schedule = $this->objScheduling->all();
        $employees = $this->objEmployee->all();
        $services = $this->objService->all();
        $clients = $this->objClient->all();
        return view('newScheduling')->with(compact('employees'))
                                    ->with(compact('id'))
                                    ->with(compact('clients'))
                                    ->with(compact('schedule'))
                                    ->with(compact('services')); 
        //with pode ser usado quantas vezes forem necessarias
    }
  
    public function store(SchedulingRequest $request)
    {  
        try {

            $start = $request->data . ' ' . $request->inicio;
            $end = $start = $request->data . ' ' . $request->fim;

            $client = findClient($request->cliente);
            
            if(!$client['success']){
                abort(401, $client['error']);
            }
            
            $agendamento = $this->objScheduling->create([
                'title' => $client['nome'],
                'telefone' => $client['telefone'],
                'start' => Carbon::createFromFormat('d/m/Y H:i', $start , 'America/Sao_Paulo')->toDateString(),
                'end' => Carbon::createFromFormat('d/m/Y H:i', $end , 'America/Sao_Paulo')->toDateString(),
                'valorTotal' => $request->total,
                'cdFuncionario' => 3, //futuramente o usuario logado
                'cdCliente' => $request->cliente
            ]); 
            
            $servicos = $request->select_services;
            $funcionarios = $request->select_employees;
            $valores = $request->valor;
            
            if(is_array($servicos)){
                for($i = 0; $i < sizeof($servicos); $i++){
                    $agendamento->relService()->attach($servicos[$i]);
                }
            } else {
                $agendamento->relService()->attach($servicos);
            }
            
            dd($agendamento);
            
        } catch (Exception $exception){
            dd($exception);
        }
    }
  
    public function show($id)
    {
        $sup = $this->objScheduling->where('cdAgendamento', $id)->first();
        return view('showScheduling', compact('sup'));
    }
  
    public function edit($id)
    {
        $sup = $this->objScheduling->where('cdAgendamento', $id)->first();
        return view('newScheduling',compact('sup'));
    }
  
    public function update(SchedulingRequest $request, $id)
    {
        if ($this->objScheduling->create([
            'horario' => $request->horario,
            'servico' => $request->servico,
            'cliente' => $request->cliente,
            'funcionario' => $request->funcionario
        ])){
                return redirect('adm/scheduling');
        }
    }
  
    public function destroy($id)
    {
        $del = $this->objScheduling->where('cdAgendamento', $id)->delete();
    }
}
