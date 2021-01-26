<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos Realizados</title>

</head>
<body>
    <h1>Agendamentos Realizados</h1>
    <a href='{{url("/adm")}}'><img src='{{url("/img/logo-light.png")}}' alt=''></a> 
    <?php
        date_default_timezone_set('America/Sao_Paulo');
        echo date('d/m/Y \à\s H:i:s');
    ?>
    <hr>

        @foreach($customers as $cust)
		    <p><b>{{$cust->nmCliente}}</b></p>
			<p>{{$cust->telefone}}</p>
        @endforeach

</body>
</html>