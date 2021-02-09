<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelEmployee;
use App\Models\ModelCustomer;
use App\Http\Requests\SchedulingReportRequest;
use PDF;

class SchedulingReportController extends Controller
{
    protected $objEmployee;
    
    public function __construct() {
        $this->objEmployee = new ModelEmployee();
    }

    public function index() {
        $employees = $this->objEmployee->all();
        return view('reportScheduling', compact('employees'));
    }

    public function store(SchedulingReportRequest $request) {
        
        if (isset($request->dtInicial) && isset($request->dtFinal)){
            $dtInicial = explode( '/' , $request->dtInicial);
            $dtInicial = $dtInicial[2] . '-' . $dtInicial[1] . '-' . $dtInicial[0];

            $dtFinal = explode( '/' , $request->dtFinal);
            $dtFinal = $dtFinal[2] . '-' . $dtFinal[1] . '-' . $dtFinal[0];
            
        }

        return $this->geraPdf();

    }
    
    public function geraPdf() {
        $customers = ModelCustomer::all();

        $pdf = PDF::loadView('pdfScheduling', compact('customers'));
        
        return $pdf->setPaper('a4')->stream('Agendamentos Realizados.pdf');
    }
}
