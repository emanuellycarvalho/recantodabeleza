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
            $atendimentos = $resultado[0];
            $clientes = $resultado[1];

        ?>

        @foreach($clientes as $cl)
            @foreach($atendimentos as $at)
                @if ($cl->cdCliente == $at->cdCliente)
                    <p><b>Cliente:</b> {{$cl->nmCliente}} | <b>Contato:</b> {{$cl->telefone}}</p>
                    <p><b>Forma de pagamento:</b> {{$at->tipoPagamento}}</b> - R${{$at->valorTotal}}</p>
                @endif
            @endforeach
            <hr>
        @endforeach

</body>
</html>