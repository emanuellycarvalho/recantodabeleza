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
            
            $date = Carbon::today()->setTimezone('America/Sao_Paulo')->format('d/m/Y');
            
            $clients = $this->objClient->all();
            $employees = $this->getAtendentes();
            $services = $this->objService->all();
            $products = $this->objProduct->all();

            return view('newAttendance')->with(compact('date'))
                                        ->with(compact('clients'))
                                        ->with(compact('services'))
                                        ->with(compact('products'))
                                        ->with(compact('employees'));

            
        }catch(Excepcion $e){
            abort(401, $e->getMessage());
        }    
    }

    public function store(AttendanceRequest $request)
    {  
        try {

           $att = $this->objAttendance->create([
                'dtAtendimento' => Carbon::createFromFormat('d/m/Y', $request->data, 'America/Sao_Paulo')->toDateTimeString(),
                'valorTotal' => $request->valorFinal,
                'cdCliente' => $request->cliente,
                'cdAgendamento' => null,
                'situacao' => $request->situacao,
                'cdFuncionario' => 1, //futuramente o funcionário logado
                'tipoPagamento' => $request->tipoPagamento,
                'qtdParcelas' => $request->parcelas
           ]); 

           $servicos = explode(',', $request->servicos);
           $funcionarios = explode(',', $request->funcionarios);
           $valoresServicos = explode(',', $request->valoresServicos);

           $produtos = explode(',', $request->produtos);
           $quantidades = explode(',', $request->quantidades);
           $valoresProdutos = explode(',', $request->valoresProdutos); 
            
            for($i = 1; $i < sizeof($servicos); $i++){
                $att->relService()->attach($servicos[$i], ['cdFuncionario' => $funcionarios[$i], 'valorCobrado' => $valoresServicos[$i]]);
            } 

            for($i = 1; $i < sizeof($produtos); $i++){
                $att->relProduct()->attach($produtos[$i], ['quantidade'=> $quantidades[$i], 'valorCobrado' => $valoresProdutos[$i]]);
            }

            return $this->index();
        } catch (Exception $e){
            abort(401, $e->getMessage());
        }
    }

    protected function getAtendentes(){
        $employees = null;
        $obj = $this->objEmployeeType->where('nmFuncao', 'Atendente')->first();

        if($obj != null){
            $etype = $this->objEmployeeType->where('cdTipoFuncionario', $obj->cdTipoFuncionario)->first();
            $employees = $etype->relEmployee()->get();
        }
        
        if($employees != null){
            return $employees;
        }        

        throw new \Exception('Desculpe, ocorreu um erro ao recuperar os atendentes.');
    }

    protected function registerPayment(){
        $clients = $this->objClient->all();
        return view('registerPayment')->with(compact('clients'));
    }

    protected function getAttendances(){
        return $this->objAttendance->all();
    }

    protected function getUnpaidAttendances(){
        return $this->objAttendance->where('situacao', 'N')->get();
    }

    protected function getSomeonesAttendances($id){
        return $this->objAttendance->where('cdCliente', $id)->get();
    }
}
