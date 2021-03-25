<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atendimentos Realizados</title>

</head>
<body>
    <img style="width:650px" src="img\logo-relatorio.png">
    <hr style="color:pink; background-color:#C71585; height:3px">
    <h1>Atendimentos Realizados</h1>
    
    <?php
        date_default_timezone_set('America/Sao_Paulo');
        echo date('d/m/Y \à\s H:i:s');
    ?>
        <hr style="color:pink; background-color:#C71585; height:2px">
        <?php
            $atendimentos = $resultado[0];
            $clientes = $resultado[1];
            $funcionarios = $resultado[2];
            $servicos = $resultado[3]
        ?>

    
    
        @foreach ($clientes as $c)
            @if($c != null)
                <b>Cliente:</b> {{$c->nmCliente}} | <b>Telefone:</b> {{$c->telefone}}
                <br><b>Atendimentos</b><br>
                    
                @foreach ($atendimentos as $a)
                    @if ($c->cdCliente == $a->cdCliente)
                        ------------------------------------------------------------------------------------------------------------------------------------
                    <br>
                    <b>Data do atendimento:</b> {{$a->dtAtendimento}}
                    @foreach ($funcionarios as $f)
                        @if($f->cdFuncionario == $a->cdFuncionario)
                            <br><b>Funcionario:</b> {{$f->nmFuncionario}}
                        @endif
                    @endforeach
                    @if ($a->situacao == 'P') 
                        <br><b>Situação:</b> Pago
                    @elseif ($a->situacao == 'N')
                        <br><b>Situação:</b> Não Pago
                    @endif

                    <br><b>Valor Total: </b>R${{$a->valorTotal}}
                    @endif
                @endforeach
                <br>
                <hr>
            @endif
        @endforeach
       

</body>
</html>