<?php 
	session_start();
	if ($_SESSION["teste"]!="true") {
		echo "<script> alert('Acesso negado!'); location.href='Login.php';</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Relatório de atendimento de cliente - Recanto Beleza</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="css/icon.css"/>
	<link rel="stylesheet" href="css/select2.min.css" />
	<link rel="stylesheet" href="css/Estilo.css"/>
	<link rel="stylesheet" href="css/Relatorio.css"/>


</head>
<body>
	<header>
		<?php 
		include_once("CabecalhoHome.php");  	
		?>
	</header>

	<div class="container">
		<form id="formAtendimentoClienteFormulario" action="relatorio/RelatorioAtendimentoClienteImpressao.php" method="post">
			<h2><img src="imagens/arquivo.png" title="Relatório de Cliente" alt="Relatório de Cliente"> Histórico de Atendimento por Cliente</h2>
			<div class= "form-group">
				<div class="row col-12">
					<div class="col-3">
						<label for="cliente">Cliente/Telefone:</label>
						<select id="cliente" name="cliente" class="form-control" required="">
							<option value="" disabled selected>Selecione um cliente</option>	
						</select>
					</div>
				
					<div class="col-3">
						<label for="dtInicio">Data Inicial:</label>  
						<input class="form-control" id="dtInicio" name="dtInicio" type="date" placeholder="dd/mm/aaaa" >
					</div>

					<div class="col-3">
						<label for="dtFinal">Data Final:</label>  
						<input class="form-control" id="dtFinal" name="dtFinal" type="date" placeholder="dd/mm/aaaa" >
					</div>

					<div class="col-2">
						  <button type="button" class="btn btn-success" name="exibir" id="exibir" onclick="exibirRelatorio()">Exibir</button>
					</div>
				</div>
			</div>

			<div class="row form-group col-12">
				<table id="tabelaRelatorio" class="table table-striped" >
					<thead>					
						<tr>
							<th width="33.33%">Data</th>
							<th width="33.33%">Serviço</th>
							<th width="33.34%"></th>
						<tr>
					</thead>
					<tbody>
					</tbody>
						<!--<td>21/01/2019</td>
						<td>Corte de Cabelo</td>
						<td> <a class="btn" href="#"> <img src="imagens/olho.png"> </a> </td>
					</tr>

					<tr>
						<td>28/01/2019</td>
						<td>Escova</td>
						<td> <a class="btn" href="#"> <img src="imagens/olho.png"> </a> </td>
					</tr>

					<tr>
						<td>15/02/2019</td>
						<td>Pintura de Cabelo</td>
						<td> <a class="btn" href="#"> <img src="imagens/olho.png"> </a> </td>
					</tr>-->
				</table>
			</div>		
		</form>

		<div class="row form-group">
			<div class="col-md-12" align="right">	
				<a href="HomeFuncionario.php" class="btn btn-primary" type="button" name="cancelar" id="cancelar">Cancelar</a>
				<a class='btn btn-success' name='imprimir' id='imprimir' href="relatorio/RelatorioAtendimentoClienteImpressao.php" >Imprimir</a>	
			</div>											
		</div>	
	</div>

	<div id="addDetalhesModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="detalhesAtendimento">Detalhes do atendimento</h5>
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
						
						<div class="form-group row">
							<div class="col-sm-12">
								<button type="button" name="cadDetalhe" id="cadDetalhe" class="btn btn-success float-right"> Salvar </button> 
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
<script src="js/relatorioCliente.js"></script>	
</html>