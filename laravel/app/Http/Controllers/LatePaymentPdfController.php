<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelCustomer;
use PDF;

class LatePaymentPdfController extends Controller
{
    public function geraPdf() {
        $customers = ModelCustomer::all();

        $pdf = PDF::loadView('pdfLatePayment', compact('customers'));
        
        return $pdf->setPaper('a4')->stream('Pagamentos Atrasados.pdf');
    }
}
