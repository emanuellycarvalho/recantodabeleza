<?php 
	session_start();
	if ($_SESSION["teste"]!="true") {
		echo "<script> alert('Acesso negado!'); location.href='Login.php';</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Funcionário - Recanto Beleza</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="css/icon.css">
	<link rel="stylesheet" href="css/Estilo.css">
	<link rel="stylesheet" href="css/HomeFuncionario.css">
	<link rel="stylesheet" href="css/MenuLateral.css">
	<!--<link rel="stylesheet" href="css/fontAwesome.min.css">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--Setinha de dropdonw do menu lateral-->

	
	<link href='css/fullcalendar.min.css' rel='stylesheet' />
	<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
	<link href='css/personalizado.css' rel='stylesheet' />		
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

	<div class="row" style="margin-left: 0%; margin-right: 0%;">
		<div class="col-md-11" id="identificacao">
			<b>Olá, Maria!</b>
		</div>

		<div class="col-md-1">
			<a type="button" href="LoginControlador.php?operacao=encerrar" class="btn btn-primary" style="margin-top: 10%">SAIR</a> 
		</div>
	</div>

	<div class="row" style="margin-top: 2%; margin-left: 0%; margin-right: 0%;">
		<div class="col-md-2" style="margin-bottom: 5%; padding-left: 0%">
			<div class="sidenav">
				<button class="dropdown-btn" >Gerenciar 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
					<a href="Cliente.php">Clientes</a>
					<a href="Produto.php">Produtos</a>
					<a href="Servico.php">Serviços</a>
					<a href="Profissional.php">Profissionais</a>
					<a href="#">Fornecedores</a>
					<a href="Cidade.php">Cidades</a>
				</div>
				<button class="dropdown-btn" >Atendimentos 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
					<a href="AgendarAtendimento.php">Agendar</a>
					<a href="RegistrarAtendimento.php">Registrar</a>
				</div>
				<button class="dropdown-btn" >Compras 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
					<a href="#">Registrar</a>
					<a href="#">Pedidos</a>
					<a href="#">Vendas</a>
				</div>
				<button class="dropdown-btn" >Pagamentos 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
					<a href="RegistrarPagamento.php">Registrar</a>
					<a href="#">Despesas</a>
					<a href="#">Financeiro</a>
				</div>
				<button class="dropdown-btn" >Relatórios 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
					<a href="#">Agendamentos</a>
					<a href="#">Pagamentos em Atraso</a>
					<a href="RelatorioCliente.php">Atendimentos por Cliente</a>
				</div>
				<button class="dropdown-btn" >Ajuda 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
					<a href="#">Documentaçao</a>
					<a href="#">Suporte</a>
					<a href="#">Sobre</a>
					<a href="Funcionalidades.php">Funcionalidades</a>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<?php 
				include_once("calendario.php");
			 ?>
		</div>

		
		<div class="col-md-4">
			<table id="tabelaFuncionario" class="table table-striped col-md-12">
				
				<h5> Pagamentos Pendentes</h5>
				
				<tr>
					<th>Cliente</th>
					<th>Telefone</th>
					<th>Data de </br> Vencimento</th>
					<th>Valor</th>
				</tr>
				
				<tr>
					<td>Diogo</td>
					<td>96767-6767</td>
					<td>20/03/2019</td>
					<td>R$70,00</td>
				</tr>

				<tr>
					<td>Bianca</td>
					<td>98989-8989</td>
					<td>25/03/2019</td>
					<td>R$19,90</td>
				</tr>
			</table>
		</div>
	</div>
	
	<footer class="col-12">
		<?php
		include_once("Rodape.php");
		?>
	</footer>

</body>

<script src="jQuery/jquery.js"></script>
<script src="jQuery/jquery.validate.js"></script>
<script src="jQuery/jquery.mask.js"></script>
<script src="js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/datatables.js"></script>
<script src="js/select2.min.js"></script>

<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script src='locale/pt-br.js'></script>

<script src="js/agendarAtendimento.js"></script>
<script src="js/cliente2.js"></script>

<script src='js/calendario.js'></script>

<script src="js/menu2.js"></script>
<script src="js/cidade.js"></script>
<script src="js/cliente.js"></script>
<script src="js/profissional.js"></script>
<script src="js/produto.js"></script>
<script src="js/servico.js"></script>
<script src="js/registrarAtendimento.js"></script>
<script src="js/registrarPagamento.js"></script>
<script src="js/relatorioCliente.js"></script>


</html>


