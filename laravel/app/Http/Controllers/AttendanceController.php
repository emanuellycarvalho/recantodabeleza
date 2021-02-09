<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelClient;
use App\Models\ModelService;
use App\Models\ModelProduct;
use App\Models\ModelEmployee;
use App\Models\ModelPayment;
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
    protected  $objCustomer;

    public function __construct(){
        $this->objEmployeeType = new ModelEmployeeType();
        $this->objScheduling = new ModelScheduling();
        $this->objAttendance = new ModelAttendance();
        $this->objEmployee = new ModelEmployee();
        $this->objPayment = new ModelPayment();
        $this->objService = new ModelService();
        $this->objProduct = new ModelProduct();
        $this->objCustomer = new ModelClient();
    }

    public function index()
    {
        return view('index');
    }

    public function create()
    {
        return $this->newCreate(Carbon::now()->format('Y-m-d'));
    }

    public function newCreate($date)
    {
        try{

            $date = Carbon::createFromFormat('Y-m-d', $date, 'America/Sao_Paulo')->format('d/m/Y');
            $clients = $this->objCustomer->orderBy('nmCliente')->get();
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
        //dd($request);
        try {

        $total = str_replace(',', '.', $request->valorFinal);
        $total = str_replace(' ', '', $total);

           $att = $this->objAttendance->create([
                'dtAtendimento' => Carbon::createFromFormat('d/m/Y', $request->data, 'America/Sao_Paulo')->toDateTimeString(),
                'valorTotal' => $total,
                'cdCliente' => $request->cliente,
                'cdAgendamento' => null,
                'situacao' => $request->situacao,
                'cdFuncionario' => 1, //futuramente o funcionário logado
                'tipoPagamento' => $request->tipoPagamento,
                'qtdParcelas' => $request->parcelas
           ]);
           if($att == null)
            throw new \Exception('Desculpe, ocorreu um erro ao registrar o atendimento.');

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

            //pagamento
            $valorParcela = floatval($att->valorTotal)/floatval($att->qtdParcelas);
            $valorParcela = number_format($valorParcela, 2);
            $dtAtendimento = Carbon::createFromFormat('Y-m-d H:i:s', $att->dtAtendimento, 'America/Sao_Paulo');

            for($i = 1; $i <= $att->qtdParcelas; $i++){

                $situacao = 'P';
                if($att->tipoPagamento == 'crediario' && $i != 1)
                    $situacao = 'N';

                if($i == 1){
                    $dtVencimento = $dtAtendimento->toDateTimeString();
                } else {
                    $dtVencimento = $dtAtendimento->add(30, 'day')->toDateTimeString();
                }

                $payment = $this->objPayment->create([
                    'cdAtendimento' => $this->objAttendance->all()->last()->cdAtendimento,
                    'parcela' => $i,
                    'valor' => $valorParcela,
                    'situacao' => $situacao,
                    'dtVencimento' => $dtVencimento
                ]);

                if($payment == null)
                    throw new \Exception('Desculpe, ocorreu um erro ao registrar o pagamento do atendimento.');
            }

            return $this->index();
        } catch (Exception $e){
            abort(401, $e->getMessage());
        }
    }

    public function show($id)
    {
        $atdc = $this->objAttendance->where('cdAtendimento', $id)->first();

        if(is_null($atdc))
            throw new \Exception('Desculpe, ocorreu um erro ao recuperar os dados do atendimento.');

        $cli = $this->objCustomer->where('cdCliente', $atdc->cdCliente)->first();

        if(is_null($cli))
            throw new \Exception('Desculpe, ocorreu um erro ao recuperar os dados do cliente.');

        return view ('showAttendance')->with(compact('atdc'))
                                      ->with(compact('cli'));
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

    public function showPayment($id){
        try{
            $att = $this->objAttendance->where('cdAtendimento', $id)->first();
            if($att == null)
                throw new \Exception('Desculpe, ocorreu um erro ao recuperar o atendimento.');

            $dtAttendance = Carbon::createFromFormat('Y-m-d', $att->dtAtendimento, 'America/Sao_Paulo')->format('d/m/Y');
            $services = $att->relService()->get();
            $products = $att->relProduct()->get();
            $employees = $this->objEmployee->all();


            $cli = $this->objCustomer->where('cdCliente', $att->cdCliente)->first();
            if($cli == null)
                $cli->nmCliente = 'Não encontrado.';
            else{
                $nmClient = $cli->nmCliente;
                $telefone = $cli->telefone;
            }

            return view('showPayment')->with(compact('att'))
                                      ->with(compact('employees'))
                                      ->with(compact('nmClient'))
                                      ->with(compact('telefone'))
                                      ->with(compact('dtAttendance'))
                                      ->with(compact('services'))
                                      ->with(compact('products'));

        } catch(Exception $e){
            abort(401, $e->getMessage());
        }

    }

    public function pay(Request $request)
    {
        try{
            if(!$this->objPayment->where('cdParcela', $request->cdParcela)->update(['situacao' => 'P']))
                throw new \Exception('Desculpe, ocorreu um erro ao atualizar a situação do(s) pagamento(s) selecionado(s).');

            return;

        } catch(Exception $e){
            abort(401, $e->getMessage());
        }
    }

    protected function registerPaymentView(){
        $clients = $this->objCustomer->orderBy('nmCliente')->get();
        return view('registerPayment')->with(compact('clients'));
    }

    protected function getAttendances(){
        return $this->objAttendance->all();
    }

    protected function getUnpaidAttendances(Request $request){
        $att = $this->objAttendance->where('situacao', 'N')->where('cdCliente', $request->get('client'))->get()->last();
        return $this->objPayment->where('situacao', 'N')->where('cdAtendimento', $att->cdAtendimento)->get();
    }

    protected function getSomeonesAttendances($id){
        return $this->objAttendance->where('cdCliente', $id)->get();
    }
}
