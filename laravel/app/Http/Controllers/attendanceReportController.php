<?php

namespace App\Http\Controllers;

use App\Models\ModelCustomer;
use App\Models\ModelAttendance;
use App\Models\ModelEmployee;
use App\Models\ModelService;
use App\Models\AtendimentoServico;

use App\Http\Requests\AttendanceReportRequest;

use PDF;

class attendanceReportController extends Controller
{

    public function index()
    {
        $customers = ModelCustomer::all();
        return view ('reportAttendance', compact('customers'));
    }

    public function store(AttendanceReportRequest $request)
    {
        if (isset($request->dtInicial) && isset($request->dtFinal)){
            $dtInicial = explode( '/' , $request->dtInicial);
            $dtInicial = $dtInicial[2] . '-' . $dtInicial[1] . '-' . $dtInicial[0];

            $dtFinal = explode( '/' , $request->dtFinal);
            $dtFinal = $dtFinal[2] . '-' . $dtFinal[1] . '-' . $dtFinal[0];

            if ($request->clientes == '0') {
                return $this->geraPdf($dtInicial, $dtFinal, 0);                
            } else {
                return $this->geraPdf($dtInicial, $dtFinal, $request->clientes);
            }

        }
    }

    public function geraPdf($dtInicial, $dtFinal, $operacao) {
        if ($operacao == 0) {
            $resultado = $this->filtrarTodosOsAtendimentos($dtInicial, $dtFinal);    
        } else {
            $resultado = $this->filtrarAtendimentoEspecifico($dtInicial, $dtFinal, $operacao);
        }

        $pdf = PDF::loadView('pdfAttendance', compact('resultado'));
        
        return $pdf->setPaper('a4')->stream('Atendimentos Realizados.pdf');
    }

    public function filtrarAtendimentoEspecifico($dtInicial, $dtFinal, $cdCliente) {
        $customers = ModelCustomer::all();
        $attendance = ModelAttendance::all();
        $employees = ModelEmployee::all();
        $services = ModelService::all();
        $servicoAtendimento = AtendimentoServico::all();
        
        $funcionarios = array();
        $servicos = array();
        $atendimentos = array();
        $clientes = array();
        
        $dataHoje = date('Y-m-d');
     
        foreach ($customers as $cust) {
            if ($cust->cdCliente == $cdCliente) {
                $clientes[] = $cust;
                foreach ($attendance as $att) {
                    if ($dtFinal >= $att->dtAtendimento && $dtInicial <= $att->dtAtendimento && $cust->cdCliente == $att->cdCliente) {
                        $atendimentos[] = $att;
                        foreach ($services as $svc) {
                            foreach ($servicoAtendimento as $svcAtt) {
                                if ($svc->cdServico == $svcAtt->cdServico && $att->cdAtendimento == $svcAtt->cdAtendimento) {
                                    $servicos[] = $svc;
                                }
                            }

                            foreach ($employees as $emp) {
                                foreach ($servicoAtendimento as $svcAtt) {
                                    if ($emp->cdFuncionario == $svcAtt->cdFuncionario && $att->cdAtendimento == $svcAtt->cdAtendimento) {
                                        $funcionarios[] = $emp;
                                    }
                                }
                            }
                        }
                    }
                }                
            }
        }

        $atendimentosResultado = array_unique($atendimentos);
        $clientesResultado = array_unique($clientes);
        $servicosResultado = array_unique($servicos);
        $funcionariosResultado = array_unique($funcionarios);

        foreach ($atendimentosResultado as $a) {
            $a->dtAtendimento = explode( '-' , $a->dtAtendimento);
            $a->dtAtendimento = $a->dtAtendimento[2] . '/' . $a->dtAtendimento[1] . '/' . $a->dtAtendimento[0];

        }        
        
        return array($servicosResultado, $atendimentosResultado, $clientesResultado, $funcionariosResultado);
    }

    public function filtrarTodosOsAtendimentos($dtInicial, $dtFinal) {
        $customers = ModelCustomer::all();
        $attendance = ModelAttendance::all();
        $employees = ModelEmployee::all();
        $services = ModelService::all();
        $servicoAtendimento = AtendimentoServico::all();
        
        $funcionarios = array();
        $servicos = array();
        $atendimentos = array();
        $clientes = array();
        
        $dataHoje = date('Y-m-d');
     
        foreach ($attendance as $att) {
            if($att != null && $dtFinal >= $att->dtAtendimento && $dtInicial <= $att->dtAtendimento) {
                $atendimentos[] = $att;
            }
            foreach ($customers as $cust) {
                if ($att->cdCliente == $cust->cdCliente) {
                    $clientes[] = $cust;
                    foreach ($services as $svc) {
                        foreach ($servicoAtendimento as $svcAtt) {
                            if ($svc->cdServico == $svcAtt->cdServico && $att->cdAtendimento == $svcAtt->cdAtendimento) {
                                $services[] = $svc;
                            }
                        }
                    }
                }
            }                
        }

        $atendimentosResultado = array_unique($atendimentos);
        $clientesResultado = array_unique($clientes);
        $servicosResultado = array_unique($servicos);
        $funcionariosResultado = array_unique($funcionarios);

        foreach ($atendimentosResultado as $a) {
            $a->dtAtendimento = explode( '-' , $a->dtAtendimento);
            $a->dtAtendimento = $a->dtAtendimento[2] . '/' . $a->dtAtendimento[1] . '/' . $a->dtAtendimento[0];

        }        
        
        return array($servicosResultado, $atendimentosResultado, $clientesResultado, $funcionariosResultado);
    }

}
