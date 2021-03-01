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
	<title>Produtos - Recanto Beleza</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="css/datatables.css"/>
	<link rel="stylesheet" href="css/icon.css">
	<link rel="stylesheet" href="css/Estilo.css">
	<link rel="stylesheet" href="css/Produto.css">	

</head>

<body>	

	<header>
		<?php 
		include_once("CabecalhoHome.php");  	
		?>
	</header>
	
	<div id="areaTabela" class="container">
		<h1><img src='imagens/produto.png' title="Produtos" alt="Produtos">Produtos</h1>

		<div id="mensagem">
			<div id="msnSucesso" class="alert alert-success" role="alert" >
	  			Produto excluído com sucesso!
			</div>

			<div id="msnErro" class="alert alert-danger" role="alert">
		  		O sistema não conseguiu excluir o produto.
			</div>	

			<div id="msnSucessoCad" class="alert alert-success" role="alert" >
		  		Produto cadastrado com sucesso!
			</div>

			<div id="msnErroCad" class="alert alert-danger" role="alert">
		  		O sistema não conseguiu cadastrar o produto.
			</div>

			<div id="msnSucessoEdit" class="alert alert-success" role="alert" >
		  		Produto editado com sucesso!
			</div>

			<div id="msnErroEdit" class="alert alert-danger" role="alert">
		  		O sistema não conseguiu o produto.
			</div>
		</div>

		<div class="mb-2 clearfix">
			<button class='btn btn-success float-left filtrar' onclick='filtrar()'>Filtrar</button>

			<a class='mx-2 btn btn-warning float-left' href='Produto.php' id="limpar">Limpar</a>
			
			<button class='btn float-right crud' data-toggle='tooltip' data-placement='right' title='Cadastrar Produto' onclick='cadastrarDado()'> <img src='imagens/produtoAdicionar.png'> </button>

		</div>

		<div>
			<table id="tabelaProduto" class="table table-striped">
				<thead>					
					<tr>
						<th width="10%">Código</th>
						<th width="60%">Nome do produto</th>
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
		<form id="formularioProduto" action="#" method="post">

			<div id="tituloCad"><h2> <img src='imagens/produtoAdicionar.png' title="Cadastrar Produtos" alt="Cadastrar Produtos"> CADASTRAR PRODUTO</h2></div>
			<div id="tituloEdit"><h2> <img src='imagens/produtoEditar.png' title="Editar Produtos" alt="Editar Produtos"> EDITAR PRODUTO</h2></div>
			<div id="tituloVisu"><h2> <img src='imagens/produtoVisualizar.png' title="Visualizar Produtos" alt="Visualizar Produtos"> VISUALIZAR PRODUTO</h2></div>

			<p id="obs">* Campo obrigatório</p>

			<div class="row form-group">
				<div class="col-md-2">
					<input class="form-control" id="cdProduto" name="cdProduto" value="" type="hidden">
				</div>	
				<div class="col-md-8">
					<label for="nmProduto">Nome do produto: <span> * </span></label>  
					<input class="form-control" id="nmProduto" name="nmProduto" value="" type="text">
				</div>				
			</div>			

			<div class="row form-group">
				<div class="col-md-12">
					<button type="submit" id="salvar" name="btnSalvar" class="btn btn-success salvar float-right">Salvar</button>											
					<a href="Produto.php" id="cancelar" class="btn btn-primary float-right">Cancelar</a>																		
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
					<label>Nome do produto:</label> 
					<input class="form-control" name="nmProduto2" id="nmProduto2" type="text" style="width: 40%;" value="" disabled>

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
					<h4 class="modal-title" id="proditoTitulo">Filtrar Produto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="#">
					<div class="modal-body">
						<div class="row form-group">
							<div class="col-md-12">
								<label for="nmProduto1">Nome do produto: </label>  
								<input class="form-control" name="nmProduto1" id="nmProduto1" type="text" value="" >
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
	<script src="js/produto.js"></script>	
</body>
</html>

