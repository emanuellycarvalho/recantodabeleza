<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AttendanceRequest;
use App\Models\ModelAttendance;
use App\Models\ModelEmployee;
use App\Models\ModelEmployeeType;


class AttendanceController extends Controller
{

    protected  $objAttendance;
    protected  $objEmployee;
    protected  $objEmployeeType;

    public function __construct(){
        $this->objAttendance = new ModelAttendance();
        $this->objEmployee = new ModelEmployee();
        $this->objEmployeeType = new ModelEmployeeType();
    }
    public function index()
    {
        $etype = $this->objEmployeeType->where('nmFuncao', 'Atendente');
        $employees = $this->objEmployee->where('cdTipoFuncionario', '{{$etype->cdTipoFuncionario}}');
        return view('attendance', compact('employees'));
    }
  
    public function create()
    {
        $employees = $this->objEmployee->all();
        $id = $this->objEmployeeType->where('nmFuncao', 'Atendente')->first()->cdTipoFuncionario;
        return view('newAttendance', compact('employees'), compact('id'));
    }
  
    public function store(AttendanceRequest $request)
    {
        if ($this->objAttendance->create([
            'inicio' => $request->inicio,
            'servico' => $request->servico,
            'cliente' => $request->cliente,
            'funcionario' => $request->funcionario
        ])){
                return redirect('adm/attendance');
        }
    }
  
    public function show($id)
    {
        $sup = $this->objAttendance->where('cdAtendimento', $id)->first();
        return view('showAttendance', compact('sup'));
    }
  
    public function edit($id)
    {
        $sup = $this->objAttendance->where('cdAtendimento', $id)->first();
        return view('newAttendance',compact('sup'));
    }
  
    public function update(AttendanceRequest $request, $id)
    {
        if ($this->objAttendance->create([
            'horario' => $request->horario,
            'servico' => $request->servico,
            'cliente' => $request->cliente,
            'funcionario' => $request->funcionario
        ])){
                return redirect('adm/attendance');
        }
    }
  
    public function destroy($id)
    {
        $del = $this->objAttendance->where('cdAtendimento', $id)->delete();
    }
    
}
