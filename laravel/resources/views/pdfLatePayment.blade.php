<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamentos Atrasados</title>

</head>
<body>

    <style>
    .pagenum:before {content: counter(page);}
    footer .pagenum:before {content: counter(page);}
    </style>

    <img style="width:650px" src="img\logo-relatorio.png">
    <hr style="color:pink; background-color:#C71585; height:3px">
    <h1>Pagamentos Atrasados</h1>
    <?php
        date_default_timezone_set('America/Sao_Paulo');
        echo 'Relatório emitido no dia ';
        echo date('d/m/Y \à\s H:i:s');
        echo ', por Fulano de Tal';
    ?>
    <br>
    <hr style="color:pink; background-color:#C71585; height:2px">
        <?php
            $pagamentos = $resultado[0];
            $atendimentos = $resultado[1];
            $clientes = $resultado[2];
            $operacao = $resultado[3];
            $i = 0;
            $total = 0;
            $valorMultas = 0;
            $cont = 0;
        ?>
        @if (count($clientes) >= 1 && $operacao == 1)
            @foreach ($clientes as $c)
                @if ($c != null)
                    <br>
                    <b>Cliente:</b> {{$c->nmCliente}} | <b>Telefone:</b> {{$c->telefone}}
                    @foreach ($atendimentos as $a)
                        @if ($a != null && $c->cdCliente == $a->cdCliente)
                            <br>
                            <hr>
                            <br>
                            <b>Atendimento realizado no dia:</b> {{$a->dtAtendimento}}
                            <br>
                            <b>Forma de pagamento:</b> {{$a->tipoPagamento}}
                            <br>
                            <b>Subtotal</b>
                            <br>
                            @foreach ($pagamentos as $p)
                                @if ($a->cdAtendimento == $p->cdAtendimento)
                                    Parcela {{$p->parcela}} - R${{$p->valor + $p->multas}}
                                    
                                    @if($p->multas != null)
                                    (R${{$p->multas}} de multas) 
                                    @endif
                                    
                                    @php
                                        $valorMultas = $valorMultas + $p->multas;
                                    @endphp

                                    | <b>Data de vencimento:</b> {{$p->dtVencimento}}
                                    
                                    <br>
                                @endif
                            @endforeach
                            <br>
                            <b>Valor do atendimento:</b> R${{$a->valorTotal+$valorMultas}};
                            @php
                                $total = $total + $a->valorTotal + $valorMultas;
                                $valorMultas = 0;
                            @endphp
                        @endif
                    @endforeach
                    <br>       
                    <hr>
                    <b>Valor total:</b> R${{$total}}
                    <br>
                    <br>
                    <hr style="color:pink; background-color:#C71585; height:2px">
                @endif
                @php
                    $total = 0;
                @endphp
            @endforeach
        @endif

        @if (count($clientes) > 1 && $operacao == 2)
            @foreach ($pagamentos as $p)
            <br>
                @if ($p != null)
                    <b>Pagamento:</b> {{$p->parcela}}ª parcela - <b>Valor:</b> R${{$p->valor + $p->multas}} 
                    @if($p->multas != 0)
                    (Multa de R${{$p->multas}} inclusa)
                    @endif

                    <br><b>Data de vencimento:</b> {{$p->dtVencimento}}
                    <br>
                    @foreach ($atendimentos as $a)
                        @if($a->cdAtendimento == $p->cdAtendimento)    
                            @foreach ($clientes as $c)
                            @php
                            $cont++;
                            @endphp
                                @if ($a->cdCliente == $c->cdCliente)
                                    <b>Devedor:</b> {{$c->nmCliente}} | <b>Telefone:</b> {{$c->telefone}}
                                    <br>
                                    <b>Atendimento do dia</b> {{$a->dtAtendimento}}
                                        <hr>
                                @endif
                            @endforeach 
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif

        @if (count($clientes) == 1 && $operacao == 2)
            @foreach ($clientes as $c)
                @if ($c != null)
                    <b>Cliente:</b> {{$c->nmCliente}} | <b>Telefone:</b> {{$c->telefone}}
                    @foreach ($atendimentos as $a)
                        @if ($a != null && $c->cdCliente == $a->cdCliente)
                            <hr>
                            <b>Atendimento realizado no dia:</b> {{$a->dtAtendimento}}
                            <br>
                            <b>Forma de pagamento:</b> {{$a->tipoPagamento}}
                            <br><br>
                            <b>Subtotal:</b>
                            <br>

                            @foreach ($pagamentos as $p)
                                @if ($a->cdAtendimento == $p->cdAtendimento)
                                    Parcela {{$p->parcela}} - R${{$p->valor+$p->multas}}
                                    @if($p->multas != 0)
                                        (Multa de R${{$p->multas}} inclusa)
                                    @endif
                                    <br>
                                @endif

                                @php
                                    if ($p->cdAtendimento == $a->cdAtendimento) {
                                        $valorMultas = $valorMultas + $p->multas;
                                    }
                                @endphp

                            @endforeach
                            <br>
                            <b>Valor do atendimento:</b> R${{$a->valorTotal+$valorMultas}}
                            @php
                                $total = $total + $a->valorTotal + $valorMultas;
                                $valorMultas = 0;
                            @endphp
                        @endif
                    @endforeach
                    <hr>
                    <b>Valor total: R${{$total}}</b>
                    <hr>
                @endif
                @php
                    $total = 0;
                @endphp
            @endforeach
        @endif

<footer>
<div style="text-align:right" class="pagenum-container">Página <span class="pagenum"></span></div>
</footer>

</body>
</html>