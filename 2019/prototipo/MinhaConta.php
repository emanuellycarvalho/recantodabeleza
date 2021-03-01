<?php 
	session_start();
	if ($_SESSION["status"]!="cliente") {
		echo "<script> alert('Acesso negado!'); location.href='Login.php';</script>";
	}
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Minha Conta - Recanto Beleza</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="css/icon.css">
	<link rel="stylesheet" href="css/Estilo.css">
	<link rel="stylesheet" href="css/MinhaConta.css">


</head>

<body>
	<header>
		<?php 
		include_once("CabecalhoHome.php");  	
		?>
	</header>

	<?php 
	include_once("MenuSuperior.php");
	?>

	<div id="id" class="row" style="margin-top: 1%;">
		<div class="col-md-11" id="identificacao">
			<b>Olá, Isabel!</b>
		</div>

		<div class="col-md-1">
			<a type="button" href="LoginControlador.php?operacao=encerrar" class="btn btn-primary">SAIR</a> 
		</div>
	</div>

	<div class="row">
		<div class="col-2">
			<nav class="navbar navbar-default">
				<ul class="nav flex-column col-12" id="menuLateral">
					<li>
						<h5>Serviços</h5>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Meus pedidos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="font-size: 13px; margin-left: 3%;" href="#">-Confirmar pagamento</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Meus serviços</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Meus tratamentos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Marcar horário</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Dados cadastrais</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Meus vales</a>
					</li>
				</ul>
			</nav>

		</div>

		<div class="col-10" >

			<table class="table table-striped col-12">
				
				<h5 style="margin-left: 40%;"> Pendências</h5>
				
				<tr>
					<th class="col-2">Data</th>
					<th class="col-2">Valor</th>
					<th class="col-6">Situação</th>
					<th class="col-2"></th>
				</tr>
				
				<tr>
					<td>14/11/2018</td>
					<td>R$70,00</td>	
					<td>Aguardando pagamento de serviço</td>
					<td> <a class="btn" href="#"> <img src="imagens/olho.png"> </a> </td>
				</tr>

				<tr>
					<td>18/11/2018</td>
					<td>R$19,90</td>	
					<td>Aguardando finalizar compra</td>
					<td> <a class="btn" href="#"> <img src="imagens/olho.png"> </a> </td>
				</tr>

				<tr>
					<td>22/11/2018</td>
					<td>R$39,90</td>	
					<td>Aguardando pagamento de produto</td>
					<td> <a class="btn" href="#"> <img src="imagens/olho.png"> </a> </td>
				</tr>
			</table>

			<table class="table table-striped col-12">
				
				<h5 style="margin-left: 37%; padding-top: 2%;"> Próximos agendamentos</h5>
				
				<tr>
					<th class="col-2">Data</th>
					<th class="col-2">Valor</th>
					<th class="col-6">Serviço</th>
					<th class="col-2"></th>
				</tr>
				
				<tr>
					<td>15/12/2018</td>
					<td>R$70,00</td>	
					<td>Maquiagem</td>
					<td> <a class="btn" href="#"> <img src="imagens/olho.png"> </a> </td>
				</tr>

				<tr>
					<td>15/12/2018</td>
					<td>R$50,00</td>	
					<td>Hidratação, escova e penteado</td>
					<td> <a class="btn" href="#"> <img src="imagens/olho.png"> </a> </td>
				</tr>
				<tr>
					<td>15/12/2018</td>
					<td>R$20,00</td>	
					<td>Manicure e pedicure</td>
					<td> <a class="btn" href="#"> <img src="imagens/olho.png"> </a> </td>
				</tr>
			</table>
		</div>
	</div>

	<div class="col-1" style="padding-left: 0%;" >
		<button class="btn btn-primary" > < VOLTAR ÀS COMPRAS </button> 
	</div>
	
	<footer>
		<?php
			include_once("Rodape.php");
		?>
	</footer>
</body>

<script src="jQuery/jquery.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>-->
<script src="js/datatables.js"></script>
<script src="js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>