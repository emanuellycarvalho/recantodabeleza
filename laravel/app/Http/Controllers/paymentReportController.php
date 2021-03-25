<?php

namespace App\Http\Controllers;

use App\Http\Requests\LatePaymentReportRequest;

use App\Models\ModelCustomer;
use App\Models\ModelAttendance;
use App\Models\ModelPayment;

use PDF;

class paymentReportController extends Controller
{

    public function index()
    {
        $customers = ModelCustomer::all();
        return view('reportLatePayment', compact('customers'));
    }

    public function store(LatePaymentReportRequest $request)
    {
        if (isset($request->dtInicial) && isset($request->dtFinal)){
            $dtInicial = explode( '/' , $request->dtInicial);
            $dtInicial = $dtInicial[2] . '-' . $dtInicial[1] . '-' . $dtInicial[0];

            $dtFinal = explode( '/' , $request->dtFinal);
            $dtFinal = $dtFinal[2] . '-' . $dtFinal[1] . '-' . $dtFinal[0];

            if ($request->clientes == '0') {
                return $this->geraPdf($dtInicial, $dtFinal, 0, $request->ordenacao);                
            } else {
                return $this->geraPdf($dtInicial, $dtFinal, $request->clientes, $request->ordenacao);
            }
        }
    }

    public function geraPdf($dtInicial, $dtFinal, $operacao, $ordenacao) {
        if ($operacao == 0) {
            $resultado = $this->filtrarTodosOsClientes($dtInicial, $dtFinal, $ordenacao);    
        } else {
            $resultado = $this->filtrarClienteEspecifico($dtInicial, $dtFinal, $operacao, $ordenacao);
        }
        
        $pdf = PDF::loadView('pdfLatePayment', compact('resultado'));
        
        return $pdf->setPaper('a4')->stream('Pagamentos Atrasados.pdf');
    }

    // O número da operação será exatamente o código do cliente recuperado do formulário

    public function filtrarClienteEspecifico($dtInicial, $dtFinal, $cdCliente, $ordenacao) {
        $customers = ModelCustomer::all();
        $attendance = ModelAttendance::all();
        $payment = ModelPayment::all();
        $atendimentos = array();
        $pagamentos = array();
        $clientes = array();
        $dataHoje =  date('Y-m-d');
     
        foreach ($customers as $cust) {
            if ($cust->cdCliente == $cdCliente) {
                $clientes[] = $cust;
                foreach ($payment as $p) {
                    if ($p->situacao == 'N' && $dataHoje > $p->dtVencimento) {
                        $pagamentos[] = $p;
                        foreach ($attendance as $att) {
                            if ($att->cdAtendimento == $p->cdAtendimento && $cust->cdCliente == $att->cdCliente) {
                                $atendimentos[] = $att;
                            }
                        }
                    }
                }                
            }
        }

        $atendimentosResultado = array_unique($atendimentos);
        $pagamentosResultado = array_unique($pagamentos);
        $clientesResultado = array_unique($clientes);

        foreach ($atendimentosResultado as $a) {
            $a->dtAtendimento = explode( '-' , $a->dtAtendimento);
            $a->dtAtendimento = $a->dtAtendimento[2] . '/' . $a->dtAtendimento[1] . '/' . $a->dtAtendimento[0];

        }        
        
        if ($ordenacao == 2) {
            sort($pagamentosResultado);
        }

        return array($pagamentosResultado, $atendimentosResultado, $clientesResultado, $ordenacao);
    }

    public function filtrarTodosOsClientes($dtInicial, $dtFinal, $ordenacao) {
        
        $customers = ModelCustomer::all();
        $attendance = ModelAttendance::all();
        $payment = ModelPayment::all();
        $atendimentos = array();
        $pagamentos = array();
        $clientes = array();
        $dataHoje =  date('Y-m-d');
     
        foreach ($payment as $p) {
            if ($p->situacao == 'N' && $dataHoje > $p->dtVencimento) {
               $pagamentos[] = $p;
               foreach ($attendance as $att) {
                    if ($att->cdAtendimento == $p->cdAtendimento) {
                        $atendimentos[] = $att;
                        foreach ($customers as $cust) {
                            if ($cust->cdCliente == $att->cdCliente) {
                                $clientes[] = $cust;
                            }
                        }   
                    }
                }
            }
        }

        $atendimentosResultado = array_unique($atendimentos);
        $pagamentosResultado = array_unique($pagamentos);
        $clientesResultado = array_unique($clientes);

        foreach ($atendimentosResultado as $a) {
            $a->dtAtendimento = explode( '-' , $a->dtAtendimento);
            $a->dtAtendimento = $a->dtAtendimento[2] . '/' . $a->dtAtendimento[1] . '/' . $a->dtAtendimento[0];

        }        

        if ($ordenacao == 1) {
            sort($clientesResultado);
        } else {
            if ($ordenacao == 2) {
                sort($pagamentosResultado);
            }
        }
     
        foreach ($pagamentosResultado as $p) {
            $p->dtVencimento = explode( '-' , $p->dtVencimento);
            $p->dtVencimento = $p->dtVencimento[2] . '/' . $p->dtVencimento[1] . '/' . $p->dtVencimento[0];

        }

        return array($pagamentosResultado, $atendimentosResultado, $clientesResultado, $ordenacao);
    }

}
