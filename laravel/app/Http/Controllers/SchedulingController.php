<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelClient;
use App\Models\ModelEmployee;
use App\Models\ModelScheduling;
use App\Models\ModelEmployeeType;
use App\Http\Requests\SchedulingRequest;

class SchedulingController extends Controller
{
    protected  $objScheduling;
    protected  $objEmployee;
    protected  $objClient;

    public function __construct(){
        $this->objEmployeeType = new ModelEmployeeType();
        $this->objScheduling = new ModelScheduling();
        $this->objEmployee = new ModelEmployee();
        $this->objClient = new ModelClient();
    }

    public function index()
    {
        //$schedule = $this->objScheduling->all();
        //$employees = $this->objEmployee->all();
        //$clients = $this->objClient->all();
        //return view('scheduling', compact('employees'), compact('clients'), compact('schedule'));
        return view('scheduling');
    }
  
    public function create()
    {
        $employees = $this->objEmployee->all();
        $clients = $this->objClient->all();
        $id = $this->objEmployeeType->where('nmFuncao', 'Atendente')->first()->cdTipoFuncionario;
        $schedule = $this->objScheduling->all();
        return view('newScheduling')->with(compact('employees'))->with(compact('id'))->with(compact('clients'))->with(compact('schedule')); 
        //with pode ser usado quantas vezes forem necessarias
    }
  
    public function store(SchedulingRequest $request)
    { 

        try {
            dd('a');

            $servicos = $request->servicos;
            $funcionarios = $request->funcionarios;
            dd('a');
            $agendamento = $this->objScheduling->create([
                'dtAgendamento' => $request->data,
                'inicio' => $request->inicio, 
                'fim' => $request->fim,
                'valorEstimado' => $request->valor,
                'funcionario' => $request->funcionario,
                'cdCliente' => $request->cliente
            ]);

            dd('a');
            
            $dom = new DOMDocument();
            $dom->loadHTMLFile('newScheduling.blade');

            $selects = $dom->getElementsByTagName('select');
                dd($selects);
            
        } catch (Exception $exception){
            return view ('more');
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
