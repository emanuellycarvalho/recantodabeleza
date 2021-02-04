<?php

namespace App\Http\Controllers;

use App\Http\Requests\LatePaymentReportRequest;
use App\Models\ModelCustomer;
use App\Models\ModelAttendance;

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
        $atendimentos = array();
        $clientes = array();
        
        foreach ($attendance as $att) {
            if ($att->situacao == 'N' && $att->dtAtendimento >= $dtInicial && $att->dtAtendimento <= $dtFinal) {
                dd($att->dtAtendimento, $dtInicial, $dtFinal);
                $att->valorTotal = str_replace('.', ',', $att->valorTotal);
                $att->valorTotal = str_replace(' ', '', $att->valorTotal);
                $atendimentos[] = $att;
                foreach ($customers as $cust) {
                    if ($cust->cdCliente == $att->cdCliente) {
                        $clientes[] = $cust;
                    }
                }
            }
        }
        
        return array($atendimentos, $clientes);
    }

}
