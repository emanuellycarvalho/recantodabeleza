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

    public function search(Request $request)
    {
        $term = $request->get('term');
        $employees = $this->objEmployee->where('nmFuncionario', 'like', '%' . $term . '%')->get();
        return $employees;
    }

    public function index()
    {
        $employees = $this->objEmployee->paginate(5);
        $etypes = $this->objEmployeeType->all();
        return view('employees', compact('employees'), compact('etypes'));
    }

    public function create()
    {
        $etypes = $this->objEmployeeType->all();
        return view('newEmployee', compact('etypes'));
    }

    public function store(EmployeeRequest $request)
    {   
        $cepResponse = cep($request->cep);
        if ($cepResponse->isOk()){
            $data = $cepResponse->getCepModel();
            //return $data;
        } else {
            $errorCEP = "O CEP informado é inválido!";  
            $etypes = $this->objEmployeeType->all();
            return view('newEmployee', compact('errorCEP'), compact('etypes'));
        }
        
        $dtNasc = NULL;

        if (isset($request->dtNasc)){
            $dtNasc = explode( '/' , $request->dtNasc);
            $dtNasc = $dtNasc[2] . '-' . $dtNasc[1] . '-' . $dtNasc[0];
        }
        //return $dtNasc;

        if ($this->objEmployee->create([
            'nmFuncionario' => $request->nome,
            'sexo' => $request->sexo,
            'dtNasc' => $dtNasc,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'senha' => $request->senha,
            'numero' => $request->numero,
            'cep' => $data->cep,
            'rua' => $data->logradouro,
            'bairro' => $data->bairro,
            'cidade' => $data->localidade,
            'complemento' => $request->complemento ?? NULL,
            'cdTipoFuncionario' => $request->tipo
            /*
            'cep' => $request->cep,
            'rua' => $request->rua,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            */
            ])){
                return redirect('adm/employee');
            } 
    }

    public function show($id)
    {
        $emp = $this->objEmployee->where('cdFuncionario', $id)->first();
        return view('showEmployee', compact('emp'));
    }

    public function edit($id)
    {
        $emp = $this->objEmployee->where('cdFuncionario', $id)->first();
        $etypes = $this->objEmployeeType->all();
        return view('newEmployee', compact('etypes'), compact('emp'));
    }
  
    public function update(EmployeeRequest $request, $id)
    {
        $cepResponse = cep($request->cep);
        if ($cepResponse->isOk()){
            $data = $cepResponse->getCepModel();
            //return $data;
        } else {
            $errorCEP = "O CEP informado é inválido!";  
            $etypes = $this->objEmployeeType->all();
            return view('newEmployee', compact('errorCEP'), compact('etypes'));
        }
        
        $dtNasc = NULL;

        if (isset($request->dtNasc)){
            $dtNasc = explode( '/' , $request->dtNasc);
            $dtNasc = $dtNasc[2] . '-' . $dtNasc[1] . '-' . $dtNasc[0];
        }

        if ($this->objEmployee->where('cdFuncionario', $id)->update([
            'nmFuncionario' => $request->nome,
            'sexo' => $request->sexo,
            'dtNasc' => $dtNasc,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'senha' => $request->senha,
            'numero' => $request->numero,
            'cep' => $request->cep,
            'rua' => $request->logradouro,
            'bairro' => $request->bairro,
            'cidade' => $data->localidade,
            'complemento' => $request->complemento ?? NULL,
            'cdTipoFuncionario' => $request->tipo
        ])){
            return redirect('adm/employee');
        }
    }
  
    public function destroy($id)
    {
        $del = $this->objEmployee->where('cdFuncionario', $id)->delete();
    }

    public function getCPFs(){
        return $this->objEmployee->whereNotNull('cpf')->get(); 
    }

    public function getEmails(){
        return $this->objEmployee->whereNotNull('email')->get(); 
    }
  
}
