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
	<title>Cadastro de Cliente - Recanto Beleza</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="css/datatables.css"/>
	<link rel="stylesheet" href="css/icon.css"/>
	<link rel="stylesheet" href="css/select2.min.css" /> <!--filtro no select-->
	<link rel="stylesheet" href="css/Estilo.css">
	<link rel="stylesheet" href="css/Cadastrar.css">
	<link rel="stylesheet" href="css/Cliente.css">
	
</head>

<body>
	
	<header>
		<?php 
		include_once("CabecalhoHome.php");  	
		?>
	</header>

	<div id="areaTabela" class="container">
		<h1><img src="imagens/usuario.png" title="Clientes" alt="Clientes">Clientes</h1>

		<div class="mb-2 clearfix">

		<button class='btn btn-success float-left filtrar' onclick='filtrar()'>Filtrar</button>

		<a class='mx-2 btn btn-warning float-left' id="limpar" href='Cliente.php'>Limpar</a>
			
		<button class='btn crud float-right' data-toggle='tooltip' data-placement='right' title='Cadastrar Cliente' onclick='cadastrarDado()'> <img src='imagens/usuarioNovo.png'></button>
	

		</div>

		<div>
			<table id="tabelaCliente" class="table table-striped">
				<thead>					
					<tr>
						<th width="25%">Nome</th>
						<th width="15%">Cpf</th>
						<th width="10%">Telefone</th>
						<th width="20%">Email</th>
						<th width="10%"></th>
						<th width="10%"></th>
						<th width="10%"></th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>

		<div id="mensagem">
			<div id="msnSucesso" class="alert alert-success" role="alert" >
	  			Cliente excluído com sucesso!
			</div>

			<div id="msnErro" class="alert alert-danger" role="alert">
		  		O sistema não conseguiu excluir o cliente.
			</div>	

			<div id="msnSucessoCad" class="alert alert-success" role="alert" >
		  		Cliente cadastrado com sucesso!
			</div>

			<div id="msnErroCad" class="alert alert-danger" role="alert">
		  		O sistema não conseguiu cadastrar o cliente.
			</div>

			<div id="msnSucessoEdit" class="alert alert-success" role="alert" >
		  		Cliente editado com sucesso!
			</div>

			<div id="msnErroEdit" class="alert alert-danger" role="alert">
		  		O sistema não conseguiu editar o cliente.
			</div>
		</div>		
	</div> 

	<div id="areaFormulario">
		<form id="formularioCliente" action="#" method="post" >
			<div id="tituloCad"><h2><img src='imagens/usuarioNovo.png' title="Cadastrar Clientes" alt="Cadastrar Clientes"> CADASTRAR CLIENTE</h2></div>
			<div id="tituloEdit"><h2><img src='imagens/usuarioEditar.png' title="Editar Clientes" alt="Editar Clientes"> EDITAR CLIENTE</h2></div>
			<div id="tituloVisu"><h2><img src='imagens/usuarioVisualizar.png' title="Visualizar Clientes" alt="Visualizar Clientes"> VISUALIZAR CLIENTE</h2></div>
			<div class="container">
				<p id="obs">* Campos obrigatórios</p>
				<fieldset>
					<h4> Dados Pessoais </h4>
					<div class="col-12" id="subtitulo"></div>
					<div>
						<div class="row form-group">
							<div class="col-md-8">
								<input class="form-control" name="cdCliente" id="cdCliente" type="hidden" required value="" >
								
								<label for="nmCliente">Nome Completo: <span> * </span></label>  
								<input class="form-control" id="nmCliente" name="nmCliente" type="text" autofocus required value="" >
							</div>

							<div class="col-md-4">
								<fieldset class="scheduler-border">
									<legend class="scheduler-border">Sexo: <span> * </span></legend>	
									<div class="form-check ">
										<input class="form-check-input" type="radio" name="sexo" id="sexoF" value="F" >
										<label class="form-check-label" for="sexoF">Feminino</label>	
										<input class="form-check-input" type="radio" name="sexo" id="sexoM" value="M" style="margin-left: 5%;">
										<label class="form-check-label" for="sexoM" style="margin-left: 15%;">Masculino</label>
									</div>

								</fieldset>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="dtNascimento">Data de Nascimento: <span> * </span></label>
								<input class="form-control" id="dtNascimento" name="dtNascimento" type="date" required value="" >	
							</div>

							<div class="col-md-6">
								<label for="cpf">CPF: <span> * </span></label>  				
								<input class="form-control" id="cpf" name="cpf" type="text" placeholder="000.000.000-00" required value="" onblur="testaCpf()" onfocus="teste()"> 
								<div id="msnErroCpf">
						  			Digite um CPF válido
								</div> 
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="rg">RG: <span> * </span></label>  
								<input class="form-control" id="rg" name="rg" type="text" required value="">
							</div>

							<div class="col-md-6">
								<label for="telefone">Telefone: <span> * </span></label>  
								<input class="form-control" id="telefone" name="telefone" type="text" placeholder="(00)00000-0000" required value="" >
							</div>						
						</div>	

						<div class="row form-group">
							<div class="col-md-12">
								<label for="email">E-mail: <span> * </span></label>		
								<input id="email" name="email" type="email" class="form-control" placeholder="exemplo@exemplo" required value="">
							</div>										
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="senha">Senha: <span> * </span></label>
								<input class="form-control" id="senha" name="senha" type="password" required value="" >
							</div>			

							<div class="col-md-6">
								<label for="senhaC">Confirmar Senha: <span> * </span></label>
								<input class="form-control" id="senha2" name="senha2" type="password" required value="">					
							</div>		
						</div>
					</div>			
				</fieldset>
			</div>
			<div class="container">
				<fieldset>
					<h4> Endereço </h4>
					<div class="col-12" id="subtitulo"></div>
					<div>
						<div class="row form-group">
							<div class="col-md-6">
								<label for="rua">Rua: <span> * </span></label>  
								<input class="form-control" id="rua" name="rua" type="text" required value=""> 
							</div>

							<div class="col-md-6">
								<label for="numero">Nº: <span> * </span></label>  
								<input class="form-control" id="numero" name="numero" type="text" required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="complemento">Complemento:</label>  
								<input class="form-control" id="complemento" name="complemento" type="text" value="">
							</div>

							<div class="col-md-6">
								<label for="bairro">Bairro: <span> * </span></label>  
								<input class="form-control" id="bairro" name="bairro" type="text" required value="">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="cep">Cep: <span> * </span></label>  
								<input class="form-control" id="cep" name="cep" type="text" required value="">
							</div>

							<div class="col-md-5">
								<label for="cdCidade">Cidade: <span> * </span></label>
								<select id="cdCidade" name="cdCidade" class="form-control meuselect" required="">
									<option value="" disabled selected>Selecione uma cidade</option>
								</select>				
							</div>
							<div class="col-1">
								<button type="button" id="novaCidade" class="btn" data-toggle='tooltip' data-placement='top' title='Cadastrar Nova Cidade' onclick="addCidadeExibirModal()">+</button>	
							</div>	
						</div>
					</div>
				</fieldset>	
			</div>

			<div class="row form-group">
				<div class="col-md-12">	
					<button id="salvar" class="btn btn-success" type="submit" name="submit" >Salvar</button>	
					<a href="Cliente.php" id="cancelar" class="btn btn-primary">Cancelar</a>
				</div>											
			</div>			
		</form >
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
					<div class="row">
						<label><strong>Nome do Cliente:</strong></label> 
						<input class="form-control-plaintext" name="nmCliente2" id="nmCliente2" type="text" style="width: 30%; margin:0%; padding: 0%; height: 0%; margin-left: 2%" value="" disabled>
					</div>
					<div class="row" style="margin-top: 2%;">
						<label><strong>CPF:</strong></label> 
					<input class="form-control-plaintext" name="cpf2" id="cpf2" type="text" style="width: 30%;margin:0%; padding: 0%; height: 0%; margin-left: 2%" value="" disabled>
					</div>

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
					<h4 class="modal-title" id="clienteTitulo" style="text-align: center;">Filtrar Cliente</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="filtro" method="post" action="#">
					<div class="modal-body">
						<div class="row form-group">
							<div class="col-md-12">
								<label for="nmCliente1">Nome do Cliente: </label>  
								<input class="form-control" name="nmCliente1" id="nmCliente1" type="text" value="" >
							</div>
							<div class="col-md-12">
								<label for="cpf1">Cpf: </label>  
								<input class="form-control" name="cpf1" id="cpf1" type="text" value="" placeholder="000.000.000-00">
							</div>
							<div class="col-md-12">
								<label for="tel1">Telefone: </label>  
								<input class="form-control" name="tel1" id="tel1" type="text" value="" placeholder="(00)00000-0000">
							</div>
							<div class="col-md-12">
								<label for="email1">E-mail: </label>  
								<input class="form-control" name="email1" id="email1" type="text" value="" placeholder="exemplo@exemplo">
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

	<div id="addCidadeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="cidade">Cadastrar Cidade</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="insert_form">
						<div class="form-group row">
							<div class="col-1">
								<label class="col-form-label">Nome: </label>
							</div>
							<div class="col-11">
								<input name="nome" type="text" class="form-control" id="nome" autofocus>
							</div>
							
						</div>
						
						<div class="form-group row">
							<div class="col-sm-12">
								<button type="button" name="cadCidade" id="cadCidade" onclick="addCidade()"class="btn btn-success"> Cadastrar </button> 
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<footer class="col-12">
		<?php
		include_once("Rodape.php");
		?>
	</footer>

	<script src="jQuery/jquery.js"></script>
	<script src="jQuery/jquery.mask.js"></script>
	<script src="jQuery/jquery.validate.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="js/datatables.js"></script>
	<script src="js/select2.min.js"></script> <!--Filtro no select-->
	<script src="js/cliente.js"></script>
	<script src="js/filtro.js"></script>
	
</body>
</html>
