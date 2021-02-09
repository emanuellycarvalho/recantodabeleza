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
        return view('reportLatePayment');
    }

    public function store(LatePaymentReportRequest $request)
    {
        if (isset($request->dtInicial) && isset($request->dtFinal)){
            $dtInicial = explode( '/' , $request->dtInicial);
            $dtInicial = $dtInicial[2] . '-' . $dtInicial[1] . '-' . $dtInicial[0];

            $dtFinal = explode( '/' , $request->dtFinal);
            $dtFinal = $dtFinal[2] . '-' . $dtFinal[1] . '-' . $dtFinal[0];

            return $this->geraPdf($dtInicial, $dtFinal);
        }
    }

    public function geraPdf($dtInicial, $dtFinal) {
        $resultado = $this->filtrar($dtInicial, $dtFinal);
        
        $pdf = PDF::loadView('pdfLatePayment', compact('resultado'));
        
        return $pdf->setPaper('a4')->stream('Pagamentos Atrasados.pdf');
    }

    public function filtrar($dtInicial, $dtFinal) {
        
        $customers = ModelCustomer::all();
        $attendance = ModelAttendance::all();
        $payment = ModelPayment::all();
        $atendimentos = array();
        $pagamentos = array();
        $clientes = array();
        $dataHoje =  date('Y-m-d');
        $cont = 0;
        $i = 0;

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

        foreach ($clientes as $c) {
            $i++;
            foreach ($clientes as $c2) {
                if ($c == $c2) {
                    $cont++;
                }

                if ($cont > 1) {
                    $clientes[$i] = null;
                }

            }
            $cont = 0;
        }
        
        $i = 0;

        foreach ($atendimentos as $a) {
            $i++;
            foreach ($atendimentos as $a2) {
                if ($a == $a2) {
                    $cont++;
                }

                if ($cont > 1) {
                    $atendimentos[$i] = null;
                }

            }
            $cont = 0;
        }

        //        $att->valorTotal = str_replace('.', ',', $att->valorTotal);
        //        $att->valorTotal = str_replace(' ', '', $att->valorTotal);
        
        return array($pagamentos, $atendimentos, $clientes);
    }

}
