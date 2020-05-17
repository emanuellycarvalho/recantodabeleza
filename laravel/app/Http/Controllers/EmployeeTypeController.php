<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeTypeRequest;
use App\Models\ModelEmployeeType;

class EmployeeTypeController extends Controller
{

    protected  $objEmployeeType;

    public function __construct(){
        $this->objEmployeeType = new ModelEmployeeType();
    }
    public function index()
    {
        $etypes = $this->objEmployeeType->paginate(5);
        return view('employeeTypes', compact('etypes'));
    }

    public function create()
    {
        return view('newEmployeeType');
    }

    public function store(EmployeeTypeRequest $request)
    {   
        $salario = str_replace(',', '.', $request->salarioBase);
        
        if ($this->objEmployeeType->create([
            'nmFuncao' => $request->nome,
            'salarioBase' => $salario
            ])){
                return redirect('adm/employeeType');
            } 
    }

    public function show($id)
    {
        $etype = $this->objEmployeeType->where('cdTipoFuncionario', $id)->first();
        return view('showEmployeeType', compact('etype'));
    }

    public function edit($id)
    {
        $etype = $this->objEmployeeType->where('cdTipoFuncionario', $id)->first();
        return view('newEmployeeType', compact('etype'));
    }
  
    public function update(EmployeeTypeRequest $request, $id)
    {
        $salario = str_replace(',', '.', $request->salarioBase);

        if ($this->objEmployeeType->where('cdTipoFuncionario', $id)->update([
            'nmFuncao' => $request->nome,
            'salarioBase' => $salario
            ])){
                return redirect('adm/employeeType');
            } 
    }
  
    public function destroy($id)
    {
        $del = $this->objEmployeeType->where('cdTipoFuncionario', $id)->delete();
    }
  
}
