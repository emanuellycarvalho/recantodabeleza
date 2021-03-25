<?php 
	session_start();
	if ($_SESSION["teste"]!="true") {
		echo "<script> alert('Acesso negado!'); location.href='Login.php';</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrar Pagamento - Recanto Beleza</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="css/icon.css"/>
	<link rel="stylesheet" href="css/select2.min.css" />
	<link rel="stylesheet" href="css/Estilo.css"/>
	<link rel="stylesheet" href="css/RegistrarPagamento.css"/>


</head>
<body>
	<header>
		<?php 
		include_once("CabecalhoHome.php");  	
		?>
	</header>

	<div class="container">
		<div id="mensagem" class="alert alert-success" role="alert">
			O pagamento foi registrado com sucesso 
		</div>
		<form id="formularioPagamento" action="#" method="post">
			<h1><img src="imagens/pagar.png" title="Registrar Pagamento" alt="Registrar Pagamento"> Registrar Pagamento</h1>
			<div class= "form-group">
				<div class="row col-12">
					<div class="col-3" style="padding: 0%;">
						<label for="cliente">Cliente/Telefone:</label>
						<select id="cliente" name="cliente" class="form-control" required="">
							<option value="" disabled selected>Selecione um cliente</option>	
						</select>
					</div>
				
					<div class="col-2">
						  <button type="button" class="btn btn-success" id="exibir" onclick="exibirRegistro()">Exibir</button>
					</div>
				</div>
			</div>

			<div class="row form-group col-12">
				<table id="tabelaPagamento" class="table table-striped" >
					<thead>					
						<tr>
							<th width="40%">Data de atendimento</th>
							<th width="30%">Valor(R$)</th>
							<th width="15%"></th>
							<th width="15%">Pago</th>
						<tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>		
		</form>

		<div class="row form-group">
			<div class="col-md-12" align="right">
				<a href="HomeFuncionario.php" class="btn btn-primary" type="button" name="cancelar" id="cancelar">Cancelar</a>	
				<button class='btn btn-success' type="button" onclick="registrarPagamento()" id='pagar' >Registrar pagamento</button>	
			</div>											
		</div>	
	</div>

	<div id="addDetalhesModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="detalhesAtendimento">Detalhes do Pagamento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="detalhes">
						<div class="form-group row">
							<label class="col-2 col-form-label">Detalhes:</label>
							<div class="col-10">
								<textarea name="detalhes" class="form-control" id="detalhes"  rows="5"></textarea>
							</div>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<?php
			include_once("Rodape.php");
		?>
	</footer>
	
</body>

<script src="jQuery/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/registrarPagamento.js"></script>	
</html>