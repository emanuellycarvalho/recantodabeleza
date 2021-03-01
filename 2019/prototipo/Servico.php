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
	<title>Serviços - Recanto Beleza</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="css/datatables.css"/>
	<link rel="stylesheet" href="css/icon.css">
	<link rel="stylesheet" href="css/Estilo.css">
	<link rel="stylesheet" href="css/Servico.css">	

</head>

<body>	

	<header>
		<?php 
		include_once("CabecalhoHome.php");  	
		?>
	</header>
	
	<div id="areaTabela" class="container">
		<h1><img src='imagens/servico.png' title="Serviços" alt="Serviços">Serviços</h1>

		<div id="mensagem">
			<div id="msnSucesso" class="alert alert-success" role="alert" >
	  			Serviço excluído com sucesso!
			</div>

			<div id="msnErro" class="alert alert-danger" role="alert">
		  		O sistema não conseguiu excluir o serviço.
			</div>	

			<div id="msnSucessoCad" class="alert alert-success" role="alert" >
		  		Serviço cadastrado com sucesso!
			</div>

			<div id="msnErroCad" class="alert alert-danger" role="alert">
		  		O sistema não conseguiu cadastrar o serviço.
			</div>

			<div id="msnSucessoEdit" class="alert alert-success" role="alert" >
		  		Serviço editado com sucesso!
			</div>

			<div id="msnErroEdit" class="alert alert-danger" role="alert">
		  		O sistema não conseguiu editar o serviço.
			</div>
		</div>

		<div class="mb-2 clearfix">
			<button class='btn btn-success float-left filtrar' onclick='filtrar()'>Filtrar</button>

			<a class='mx-2 btn btn-warning float-left' href='Servico.php' id="limpar">Limpar</a>

			<button class='btn crud float-right' data-toggle='tooltip' data-placement='right' title='Cadastrar Serviço' onclick='cadastrarDado()'> <img src='imagens/servicoAdicionar.png'> </button>
		</div>

		<div>
			<table id="tabelaServico" class="table table-striped">
				<thead>					
					<tr>
						<th width="10%">Código</th>
						<th width="50%">Nome do serviço</th>
						<th width="10%">Valor</th>
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
		<form id="formularioServico" action="#" method="post">

			<div id="tituloCad"><h2> <img src='imagens/servicoAdicionar.png' title="Cadstrar Serviços" alt="Cadastrar Serviços"> CADASTRAR SERVIÇO</h2></div>
			<div id="tituloEdit"><h2> <img src='imagens/servicoEditar.png' title="Editar Serviços" alt="Editar Serviços"> EDITAR SERVIÇO</h2></div>
			<div id="tituloVisu"><h2> <img src='imagens/servicoVisualizar.png' title="Visualizar Serviços" alt="Visualizar Serviços"> VISUALIZAR SERVIÇO</h2></div>

			<p id="obs">* Campo obrigatório</p>

			<div class="row form-group">
				<div>
					<input class="form-control" id="cdServico" name="cdServico" value="" type="hidden">
				</div>	
				<div class="col-1"></div>
				<div class="col-6">
					<label for="nmServico">Nome do serviço: <span> * </span></label>  
					<input class="form-control" id="nmServico" name="nmServico" value="" type="text">
				</div>
				<div class="col-2">
					<label for="valor">Valor(R$): <span> * </span></label>  
					<input class="form-control" id="valor" name="valor" value="" type="text" placeholder="000.00">
				</div>				
			</div>			

			<div class="row form-group">
				<div class="col-12">
					<button type="submit" id="salvar" name="btnSalvar" class="btn btn-success salvar float-right">Salvar</button>											
					<a href="Servico.php" id="cancelar" class="btn btn-primary float-right">Cancelar</a>																		
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
					<label>Nome do servico:</label> 
					<input class="form-control" name="nmServico2" id="nmServico2" type="text" style="width: 40%;" value="" disabled>

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
					<h4 class="modal-title" id="servicoTitulo" style="text-align: center;">Filtrar Serviço</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="#">
					<div class="modal-body">
						<div class="row form-group">
							<div class="col-md-12">
								<label for="nmServico1">Nome do Serviço: </label>  
								<input class="form-control" name="nmServico1" id="nmServico1" type="text" value="" >
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
	<script src="js/servico.js"></script>	
</body>
</html>

