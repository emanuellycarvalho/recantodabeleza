<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelClient;
use App\Models\ModelService;
use App\Models\ModelProduct;
use App\Models\ModelEmployee;
use App\Models\ModelAttendance;
use App\Models\ModelScheduling;
use App\Models\ModelEmployeeType;
use App\Http\Requests\AttendanceRequest;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    protected  $objEmployeeType;    
    protected  $objScheduling;
    protected  $objAttendance;
    protected  $objEmployee;   
    protected  $objService;
    protected  $objProduct;
    protected  $objClient;

    public function __construct(){
        $this->objEmployeeType = new ModelEmployeeType();
        $this->objScheduling = new ModelScheduling();
        $this->objAttendance = new ModelAttendance();
        $this->objEmployee = new ModelEmployee();
        $this->objService = new ModelService();
        $this->objProduct = new ModelProduct();
        $this->objClient = new ModelClient();
    }

    public function index()
    {
        return view('attendances');
    }

    public function create()
    {
        try{              
            
            $id = $this->getAtendente();
            $etype = $this->objEmployeeType->where('cdTipoFuncionario', $id)->first();
            $employees = $etype->relEmployee()->get();

            $clients = $this->objClient->all();
            $services = $this->objService->all();
            $products = $this->objProduct->all();

            return view('newAttendance')->with(compact('clients'))
                                        ->with(compact('services'))
                                        ->with(compact('products'))
                                        ->with(compact('employees'));

            
        }catch(Excepcion $e){
            abort(401, $e->getMessage());
        }    
    }

    public function store(SchedulingRequest $request)
    {  
        try {

           $att = $this->objAttendance->create([
                'dtAtendimento' => $request->data,
                'valorTotal' => $request->valorFinal,
                'cdCliente' => $request->cliente,
                'cdAgendamento' => null,
                'situação' => $request->situacao,
                'cdFuncionario' => 1, //futuramente o funcionário logado
                'tipoPagamento' => $request->tipoPagamento,
                'qtdParcelas' => $request->parcelas
           ]); 
            
           dd($att);
            return $this->index();
        } catch (Exception $e){
            abort(401, $e->getMessage());
        }
    }

    protected function getAtendente(){
        $obj = $this->objEmployeeType->where('nmFuncao', 'Atendente')->first();
        if($obj != null){
            return $obj->cdTipoFuncionario;
        }

        throw new \Exception('Desculpe, ocorreu um erro ao recuperar os atendentes.');
    }
}
