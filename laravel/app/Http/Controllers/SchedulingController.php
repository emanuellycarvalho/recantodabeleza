<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelClient;
use App\Models\ModelService;
use App\Models\ModelEmployee;
use App\Models\ModelScheduling;
use App\Models\ModelEmployeeType;
use App\Http\Requests\SchedulingRequest;
use DOMDocument;

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
        //$clients = $this->objClient->all();
        //return view('scheduling', compact('employees'), compact('clients'), compact('schedule'));
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

            $agendamento = $this->objScheduling->create([
                'dtAgendamento' => Carbon::createFromFormat('d/m/Y', $request->data, 'America/Sao_Paulo')->toDateString(),
                'inicio' => $request->inicio, 
                'fim' => $request->fim,
                'valorTotal' => 100.00,
                'cdFuncionario' => 3,
                'cdCliente' => $request->cliente
            ]); 
            
            $dom = new DOMDocument();
            $back = back()->getTargetUrl();
            libxml_use_internal_errors(true);
            $dom->loadHTMLFile($back);
            libxml_clear_errors();
                
            $selects = $dom->getElementsByTagName('select');
            for ($i = 1; $i < sizeof($selects); $i++){
                $select = $selects->item($i);
                dd($select);
                $c = $select->getAttribute('value');
                return $c;
            }
            
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
