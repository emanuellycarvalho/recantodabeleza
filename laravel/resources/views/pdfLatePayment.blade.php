<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamentos Atrasados</title>

</head>
<body>
    <h1>Pagamentos Atrasados</h1>

    <?php
        date_default_timezone_set('America/Sao_Paulo');
        echo date('d/m/Y \à\s H:i:s');
    ?>
    <hr>
        <?php
            $pagamentos = $resultado[0];
            $atendimentos = $resultado[1];
            $clientes = $resultado[2];
            $i = 0;
        ?>

        @foreach ($atendimentos as $a)
            @if ($a != null)
                @foreach ($clientes as $c)
                    @if ($c != null && $c->cdCliente == $a->cdCliente)
                        <b>Cliente:</b> {{$c->nmCliente}} | <b>Telefone:</b> {{$c->telefone}}
                        <br>
                        <b>Forma de pagamento:</b> {{$a->tipoPagamento}}
                        <br>
                        ------------------------------------------------------------------------------------------------------------------------------------
                        <br>
                        <b>Subtotal</b>
                        <br>
                        @foreach ($pagamentos as $p)
                            @if ($a->cdAtendimento == $p->cdAtendimento)
                                Parcela {{$p->parcela}} - R${{$p->valor}}
                                <br>
                            @endif
                        @endforeach
                        ------------------------------------------------------------------------------------------------------------------------------------
                        <br>
                        <b>Total:</b> R${{$a->valorTotal}}
                    @endif
                @endforeach
                <hr>
            @endif
        @endforeach
       

</body>
</html>