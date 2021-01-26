<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelCustomer;
use PDF;

class SchedulingPdfController extends Controller
{
    public function geraPdf() {
        $customers = ModelCustomer::all();

        $pdf = PDF::loadView('pdfScheduling', compact('customers'));
        
        return $pdf->setPaper('a4')->stream('Agendamentos Realizados.pdf');
    }
}
