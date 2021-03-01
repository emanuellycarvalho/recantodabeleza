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
	<title>Profissionais - Recanto Beleza</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="css/icon.css">
	<link rel="stylesheet" href="css/datatables.css"/>
	<link rel="stylesheet" href="css/Estilo.css">
	<link rel="stylesheet" href="css/Profissional.css">

</head>

<body>
	
	<header> 
		<?php 
		include_once("CabecalhoHome.php");  	
		?>
	</header>

	<!--<div id="cidade">
		<?php 
		//include_once("Cidade.php");  	
		?>
	</div>-->

	<div id="areaTabela" class="container">
		<h1><img src='imagens/profissional.png' title="Profissionais" alt="Profissionais">Profissionais</h1>

		<div id="mensagem">
			<div id="msnSucesso" class="alert alert-success" role="alert" >
				Profissional excluído com sucesso!
			</div>

			<div id="msnErro" class="alert alert-danger" role="alert">
				O sistema não conseguiu excluir o profissional.
			</div>	

			<div id="msnSucessoCad" class="alert alert-success" role="alert" >
				Profissional cadastrado com sucesso!
			</div>

			<div id="msnErroCad" class="alert alert-danger" role="alert">
				O sistema não conseguiu cadastrar o profissional.
			</div>

			<div id="msnSucessoEdit" class="alert alert-success" role="alert" >
				Profissional editado com sucesso!
			</div>

			<div id="msnErroEdit" class="alert alert-danger" role="alert">
				O sistema não conseguiu editar o profissional.
			</div>
		</div>

		<div class="mb-2 clearfix">
			<button class='btn btn-success float-left filtrar' onclick='filtrar()'>Filtrar</button>

			<a class='mx-2 btn btn-warning float-left' href='Profissional.php' id="limpar">Limpar</a>

			<button class='btn crud float-right' data-toggle='tooltip' data-placement='right' title='Cadastrar Profissional' onclick='cadastrarDado()'><img src='imagens/profissionalAdicionar.png'> </button>
		</div>

		<div>
			<table id="tabelaProfissional" class="table table-striped">
				<thead>					
					<tr>
						<th width="10%">Código</th>
						<th width="60%">Nome</th>
						<th width="10%"></th>
						<th width="10%"></th>
						<th width="10%"></th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>		
	</div> 


	<div id="areaFormulario">
		<form id="formularioProfissional" action="#" method="post" >

			<div id="tituloCad"><h2> <img src='imagens/profissionalAdicionar.png' title="Cadastrar Profissionais" alt="Cadastrar Profissionais"> CADASTRAR PROFISSIONAL</h2></div>
			<div id="tituloEdit"><h2> <img src='imagens/profissionalEditar.png' title="Editar Profissionais" alt="Editar Profissionais"> EDITAR PROFISSIONAL</h2></div>
			<div id="tituloVisu"><h2> <img src='imagens/profissionalVisualizar.png' title="Visualizar Profissionais" alt="Visualizar Profissionais"> VISUALIZAR PROFISSIONAL</h2></div>

			<p id="obs">* Campo obrigatório</p>

			<div class="row form-group">
				<div class="col-md-2">
					<input class="form-control" id="cdProfissional" name="cdProfissional" value="" type="hidden">
				</div>	
				<div class="col-md-8">
					<label for="nmProfissional">Nome do profissional: <span> * </span></label>  
					<input class="form-control" id="nmProfissional" name="nmProfissional" value="" type="text">
				</div>				
			</div>			

			<div class="row form-group">
				<div class="col-md-12">
					<button type="submit" id="salvar" name="submit" class="btn btn-success salvar float-right">Salvar</button>											
					<a href="Profissional.php" id="cancelar" class="btn btn-primary float-right">Cancelar</a>																		
				</div>											
			</div>					
		</form>			
	</div>	

	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header atencao">
					Atenção
				</div>
				<div class="modal-body">
					Confirma exclusão deste registro? <br>
					<br>
					<label>Nome do Profissional:</label> 
					<input class="form-control" name="nmProf" id="nmProf" type="text" style="width: 30%;" value="" disabled>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" href="#">Cancelar</button>
					<a class="btn btn-success excluir" id="botaoExcluirModal" >Excluir</a>
				</div>
			</div>
		</div>	
	</div>

	<div class="modal fade" id="confirm-filtro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="profissionalTitulo" style="text-align: center;">Filtrar Profissional</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="#">
					<div class="modal-body">
						<div class="row form-group">
							<div class="col-md-12">
								<label for="nmProfissional1">Nome do Profissional</label>  
								<input class="form-control" name="nmProfissional1" id="nmProfissional1" type="text" value="" >
							</div>
						</div>					        	
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal" href="#">Cancelar</button>
						<button type="button" class="btn btn-success filtro" id="botaoFiltro" onclick="filtrarDado()"> Aplicar </button>
					</div>
				</form>
			</div>
		</div>	
	</div>

	<footer class="col-12">
		<?php
		include_once("Rodape.php");
		?>
	</footer>

	<script src="jQuery/jquery.js"></script>
	<script src="jQuery/jquery.validate.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="js/datatables.js"></script>
	<script src="js/profissional.js"></script>	
</body>
</html>
