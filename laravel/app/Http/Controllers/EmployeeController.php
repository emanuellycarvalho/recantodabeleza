<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\ModelEmployee;
use App\Models\ModelEmployeeType;

class EmployeeController extends Controller
{

    protected  $objEmployee;
    protected  $objEmployeeType;

    public function __construct(){
        $this->objEmployee = new ModelEmployee();
        $this->objEmployeeType = new ModelEmployeeType();
    }
    public function index()
    {
        $employees = $this->objEmployee->paginate(5);
        return view('employees',['employees' => $employees]);
    }

    public function create()
    {
        $etypes = $this->objEmployeeType->all();
        return view('newEmployee', compact('etypes'));
    }

    public function store(SupplierRequest $request)
    {
        if ($this->objSupplier->create([
            'nmFornecedor' => $request->nmFornecedor,
            'cnpj' => $request->cnpj,
            'telefone'  => $request->telefone,
            'email' => $request->email
            ])){
                return redirect('adm/supplier');
            }
    }
  
}
