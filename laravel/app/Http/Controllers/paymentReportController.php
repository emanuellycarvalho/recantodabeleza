<?php

namespace App\Http\Controllers;

use App\Http\Requests\LatePaymentReportRequest;
use App\Models\ModelCustomer;
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

            return $this->geraPdf();
        }
    }

    public function geraPdf() {
        $customers = ModelCustomer::all();

        $pdf = PDF::loadView('pdfLatePayment', compact('customers'));
        
        return $pdf->setPaper('a4')->stream('Pagamentos Atrasados.pdf');
    }

}
