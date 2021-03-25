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
	<title>Cidades - Recanto Beleza</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="css/datatables.css"/>
	<link rel="stylesheet" href="css/icon.css">
	<link rel="stylesheet" href="css/Estilo.css">
	<link rel="stylesheet" href="css/Cidade.css">	

</head>

<body>	

	<header>
		<?php 
		include_once("CabecalhoHome.php");  	
		?>
	</header>
	
	<div id="areaTabela" class="container">
		<h1><img src='imagens/cidade.png' title="Cidades" alt="Cidades">Cidades</h1>

		<div id="mensagem">
			<div id="msnSucesso" class="alert alert-success" role="alert" >
	  			Cidade excluída com sucesso!
			</div>

			<div id="msnErro" class="alert alert-danger" role="alert">
		  		O sistema não conseguiu excluir cidade.
			</div>	

			<div id="msnSucessoCad" class="alert alert-success" role="alert" >
		  		Cidade cadastrada com sucesso!
			</div>

			<div id="msnErroCad" class="alert alert-danger" role="alert">
		  		O sistema não conseguiu cadastrar a cidade.
			</div>

			<div id="msnSucessoEdit" class="alert alert-success" role="alert" >
		  		Cidade editada com sucesso!
			</div>

			<div id="msnErroEdit" class="alert alert-danger" role="alert">
		  		O sistema não conseguiu editar a cidade.
			</div>
		</div>

		<div class="mb-2 clearfix">
			<button class='btn float-left filtrar' onclick='filtrar()'>Filtrar</button>
			
			<a class='mx-2 btn btn-warning float-left' href='Cidade.php' id="limpar">Limpar</a>

			<button class='btn crud float-right' type="button" data-toggle='tooltip' data-placement='right' title='Cadastrar Cidade' onclick='cadastrarDado()'> <img src='imagens/cidadeAdicionar.png'> </button>

			
		</div> 

		<div>
			<table id="tabelaCidade" class="table table-striped">
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
		<form id="formularioCidade" action="#" method="post">

			<div id="tituloCad"><h2> <img src='imagens/cidadeAdicionar.png' title="Cadastrar Cidades" alt="Cadastrar Cidades"> CADASTRAR CIDADE</h2></div>
			<div id="tituloEdit"><h2> <img src='imagens/cidadeEditar.png' title="Editar Cidades" alt="Editar Cidades"> EDITAR CIDADE</h2></div>
			<div id="tituloVisu"><h2> <img src='imagens/cidadeVisualizar.png' title="Visualizar Cidades" alt="Visualizar Cidades"> VISUALIZAR CIDADE</h2></div>

			<p id="obs">* Campo obrigatório</p>

			<div class="row form-group">
				<div class="col-md-2">
					<input class="form-control" id="cdCidade" name="cdCidade" value="" type="hidden">
				</div>	
				<div class="col-md-8">
					<label for="nmCidade">Nome da cidade: <span> * </span></label>  
					<input class="form-control" id="nmCidade" name="nmCidade" value="" type="text">
				</div>				
			</div>			

			<div class="row form-group">
				<div class="col-md-12">
					<button type="submit" id="salvar" name="btnSalvar" class="btn btn-success salvar float-right">Salvar</button>											
					<a href="Cidade.php" id="cancelar" class="btn btn-primary float-right">Cancelar</a>																		
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
					<label>Nome da Cidade:</label> 
					<input class="form-control" name="nmCidade2" id="nmCidade2" type="text" style="width: 30%;" value="" disabled>

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
					<h4 class="modal-title" id="cidadeTitulo" style="text-align: center;">Filtrar Cidade</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="#">
					<div class="modal-body">
						<div class="row form-group">
							<div class="col-md-12">
								<label for="nmCidade1">Nome da Cidade: </label>  
								<input class="form-control" name="nmCidade1" id="nmCidade1" type="text" value="" >
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
	<script src="js/cidade.js"></script>	
</body>
</html>

