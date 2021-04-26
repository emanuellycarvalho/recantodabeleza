<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atendimentos Realizados</title>

    <style>
        @page { margin: 100px 50px; }
        #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px; background-color: orange; text-align: center; }
        #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px; }
        #footer .page:after { content: counter(page, decimal); }
    </style>
   
</head>
<body>

    <div>
        <img style="width:650px" src="img\logo-relatorio.png">
        <hr style="color:pink; background-color:#C71585; height:3px">
        <h1>Atendimentos Realizados</h1>
        
        <?php
            date_default_timezone_set('America/Sao_Paulo');
            echo 'Relatório emitido no dia ';
            echo date('d/m/Y \à\s H:i:s');
            echo ', por Fulano de Tal';
        ?>
        <br>
        <hr style="color:pink; background-color:#C71585; height:2px">
    </div>

        <?php
            $servicos = $resultado[0];
            $atendimentos = $resultado[1];
            $clientes = $resultado[2];
            $funcionarios = $resultado[3];
            $servicoAtendimento = $resultado[4];
        ?>

        <div id="content" style="page-break-before: auto;">
            @if (count($clientes) == 1) 
                    @foreach ($clientes as $c)
                    @if($c != null)
                    <br>
                        <b>Cliente:</b> {{$c->nmCliente}} | <b>Telefone:</b> {{$c->telefone}}
                        <hr>
                        @foreach ($atendimentos as $a)
                            @if ($c->cdCliente == $a->cdCliente)
                                <br>
                                <b>Data do atendimento:</b> {{$a->dtAtendimento}}
                                <br>
                                <b>Serviços Realizados:</b>
                                @foreach ($servicoAtendimento as $svcAtt)
                                    @foreach ($servicos as $s)
                                        @if ($s->cdServico == $svcAtt->cdServico && $svcAtt->cdAtendimento == $a->cdAtendimento)
                                        <li style="margin-left: 2%; margin-top:3px">{{$s->nmServico}}</li>
                                        <br>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
                        @endforeach
                        <div id="footer">
                            <p class="page">Página <?php $PAGE_NUM ?></p>
                        </div>
                    @endif 
                    <br>
                    <hr>   
                @endforeach
            @else
                @foreach ($clientes as $c)
                    @if($c != null)
                    <br>
                        <b>Cliente:</b> {{$c->nmCliente}} | <b>Telefone:</b> {{$c->telefone}}
                        <hr>
                        @foreach ($atendimentos as $a)
                            @if ($c->cdCliente == $a->cdCliente)
                                <br>
                                <b>Data do atendimento:</b> {{$a->dtAtendimento}}
                                <br>
                                <b>Serviços Realizados:</b>
                                @foreach ($servicoAtendimento as $svcAtt)
                                    @foreach ($servicos as $s)
                                        @if ($s->cdServico == $svcAtt->cdServico && $svcAtt->cdAtendimento == $a->cdAtendimento)
                                            <li style="margin-left: 2%; margin-top:3px">{{$s->nmServico}}</li>
                                            <br>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
                        @endforeach
                    
                    @endif 
                    <br>
                    <hr style="color:pink; background-color:#C71585; height:2px">
                    <div id="footer">
                        <p class="page">Página <?php $PAGE_NUM ?></p>
                    </div>
                @endforeach
            @endif
        </div>

</body>
</html>