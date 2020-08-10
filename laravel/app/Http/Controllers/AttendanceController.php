<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelClient;
use App\Models\ModelService;
use App\Models\ModelProduct;
use App\Models\ModelEmployee;
use App\Models\ModelScheduling;
use App\Models\ModelEmployeeType;
use App\Http\Requests\AttendanceRequest;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    protected  $agendamentoServico;
    protected  $objEmployeeType;    
    protected  $objScheduling;
    protected  $objEmployee;   
    protected  $objService;
    protected  $objProduct;
    protected  $objClient;

    public function __construct(){
        $this->agendamentoServico = new AgendamentoServico();
        $this->objEmployeeType = new ModelEmployeeType();
        $this->objScheduling = new ModelScheduling();
        $this->objEmployee = new ModelEmployee();
        $this->objService = new ModelService();
        $this->objProduct = new ModelProduct();
        $this->objClient = new ModelClient();
    }

    public function index()
    {
        return redirect('index');
    }

    public function create()
    {
        try{
            
            $clients = $this->objClient->all();
            $services = $this->objService->all();
            $products = $this->objProduct->all();
            $employees = $this->objEmployee->all();

            
        }catch(Excepcion $e){
            abort(401, $e->getMessage());
        }    
    }
}
