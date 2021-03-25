<?php 
	session_start();
	if ($_SESSION["teste"]!="true") {
		echo "<script> alert('Acesso negado!'); location.href='Login.php';</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrar Atendimento - Recanto Beleza</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="css/icon.css"/>	
	<link rel="stylesheet" href="css/select2.min.css" />
	<link rel="stylesheet" href="css/Estilo.css">
	<link rel="stylesheet" href="css/Cadastrar.css">
	<link rel="stylesheet" href="css/RegistrarAtendimento.css">
	

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

	<div id="areaFormulario" >
		<form id="formularioCliente" action="#" method="post" >
			<div id="tituloCad"><h2><img src='imagens/usuarioNovo.png' title="Cadastrar Cliente" alt="Cadastrar Cliente"> CADASTRAR CLIENTE</h2></div>
			<div class="container">
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
										<input class="form-check-input" style="margin-left: 5%;" type="radio" name="sexo" 
										id="sexoM" value="M" >
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
								<input id="email" name="email" type="email" class="form-control" required value="" placeholder="exemplo@exemplo">
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
								<input class="form-control" id="numero" name="numero" type="text" required value="">
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
								<select id="cdCidade" name="cdCidade" class="form-control" required="">
									<option value="" disabled selected>Selecione uma cidade</option>
								</select>				
							</div>
							<div class="col-1">
								<button type="button" id="novaCidade" class="btn" data-toggle='tooltip' data-placement='right' title='Cadastrar Cidade' onclick="addCidadeExibirModal()">+</button>	
							</div>
						</div>
					</div>
				</fieldset>	
			</div>

			<div class="row form-group">
				<div class="col-md-12">	
					<button class="btn btn-success" type="submit" name="submit" >Salvar</button>	
					<a href="RegistrarAtendimento.php" class="btn btn-primary">Cancelar</a>
				</div>											
			</div>			
		</form >
	</div>

	<div class="container cont" id="areaRegistro">
		<div id="mensagem">
			<div id="msnSucessoCad" class="alert alert-success" role="alert" >
		  		Cliente cadastrado com sucesso!
			</div>

			<div id="msnErroCad" class="alert alert-danger" role="alert">
		  		O sistema não conseguiu cadastrar o cliente.
			</div>
		</div>
		
		<form action="#" method="post">
			<h1><img src="imagens/barbearia.png" title="Registrar Atendimento" alt="Registrar Atendimento"> Registrar Atendimento</h1>
			<div class="row form-group">
				<div class="row col-12">
					<div class="col-2">
						<label for="dtAtendimento">Data:</label>  
						<input class="form-control" id="dtAtendimento" name="dtAtendimento" type="date" placeholder="dd/mm/aaaa" >
					</div>
				
					<div class="col-3">
						<label for="cliente">Cliente/Telefone:</label>
						<select id="cliente" name="cliente" class="form-control">	  
							<option value="" disabled selected>Selecione um cliente</option>
						</select>
					</div>

					<div class="col-1 opcoes2">
						<button type="button" id="adicionar" class="btn btn-secondary" name="adicionar" title="Cadastrar Cliente" onclick="exibirCadastrarCliente()">+</button>
					</div>
				</div>
			</div>

			<h4> Serviços:</h4>
			<div id="subtitulo"></div>

			<div class="row form-group col-12">
				<div class="col-3">
					<label for="servico">Serviço:</label>
					<select id="servico" name="servico" class="form-control"> 
						<option value="" disabled selected>Selecione um serviço</option>	
					</select>
				</div>

				<div class="col-2" style="margin-left: 3%;">
					<label for="valor">Valor(R$):</label>  
					<input class="form-control" id="valor" name="valor" type="text" style="width: 60%;">
				</div>

				<div class="col-3">
					<label for="profissional">Profissional:</label>
					<select id="profissional" name="profissional" class="form-control">	
						<option value="" disabled selected>Selecione um profissional</option>	
					</select>
				</div>

				<div class="col-2" style="margin-top: 2.2%; ">
					<button type="button" class="btn btn-secondary" onclick="exibirModalDetalhes()">Detalhar Serviço</button>
				</div>

				<div class="col-1" style="margin-top: 2%; ">
					<button type="button" onclick="salvarServico()" title="Adicionar na tabela"><img src="imagens/tabelaInserir.png" style="height: 35px;"></button>
				</div>

			</div>

			<div class="row form-group col-12">
				<table id="servicos" class="col-12 table table-striped" >
					<thead>					
						<tr>
							<th width="25%">Serviço</th>
							<th width="25%">Valor(R$)</th>
							<th width="25%">Profissional</th>
							<th width="25%"></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>

			<div class="col-12" align="right">
				<p> <b id="totalServico"></b> </p>  
			</div>

			<h4> Produtos:</h4>
			<div id="subtitulo"></div>

			<div class="row form-group col-12">
				<div class="col-3">
					<label for="produto">Produto:</label>
					<select id="produto" name="produto" class="form-control">				
						<option value="" disabled selected>Selecione um produto</option>	
					</select>
				</div>

				<div class="col-1"></div>

				<div class="col-2" style="margin-left: 5%;">
					<label for="valorUnitario">Valor Unitário(R$):</label>
					<input class="form-control" id="valorUnitario" name="valorUnitario" type="text"  style="width: 80%;">
				</div>

				<div class="col-1"></div>

				<div class="col-2">
					<label for="qtd">Quantidade:</label>
					<input class="form-control" id="qtd" name="qtd" type="number" style="width: 60%;" >
				</div>

				<div class="col-1" style="margin-top: 2%; ">
					<button type="button" onclick="salvarProduto()" title="Adicionar na tabela"><img src="imagens/tabelaInserir.png" style="height: 35px;"></button>
				</div>
			</div>

			<div class="row form-group col-12">
				<table id="produtos" class="col-12 table table-striped" >
					<thead>					
						<tr>
							<th width="30%">Produto</th>
							<th width="20%">Valor Unitário(R$)</th>
							<th width="15%">Quantidade</th>
							<th width="20%">Subtotal(R$)</th>
							<th width="15%"></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>

			<div class="col-12" align="right">
				<p> <b id="totalProduto"></b> </p>  
			</div>

			<div class="col-12" align="right">
				<p style="font-size: 20px;"> <b id="totalGeral"></b> </p>  
			</div>		
		</form>

		<div class="row form-group">
			<div class="col-md-12" align="right">	
				<a href="HomeFuncionario.php" class="btn btn-success " type="button" name="submit" >Salvar</a>
				<button class="btn btn-primary" name="cancelar" onClick="JavaScript: window.history.back()">Cancelar</button>	
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
								<button type="button" name="cadDetalhe" id="cadDetalhe" class="btn btn-success float-right" onclick="addDetalhe()"> Salvar </button> 
							</div>
						</div>
					</form>
				</div>
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

	<div class="modal fade" id="confirm-delete-servico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header atencao">
					Atenção
				</div>
				<div class="modal-body">
					Confirma exclusão deste registro? <br>
					<br>
					<label><strong>Serviço:</strong></label> 
					<input class="form-control-plaintext" name="serv" id="serv" type="text" style="width: 30%;" value="" disabled>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" href="#">Cancelar</button>
					<a class="btn btn-danger excluir" id="botaoExcluirModal" >Excluir</a>
				</div>
			</div>
		</div>	
	</div>

	<div class="modal fade" id="confirm-delete-produto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header atencao">
					Atenção
				</div>
				<div class="modal-body">
					Confirma exclusão deste registro? <br>
					<br>
					<label><strong>Produto:</strong></label> 
					<input class="form-control-plaintext" name="prod" id="prod" type="text" style="width: 30%;" value="" disabled>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal" href="#">Cancelar</button>
					<a class="btn btn-danger excluir" id="botaoExcluirModal2" >Excluir</a>
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
<script src="jQuery/jquery.mask.js"></script>
<script src="jQuery/jquery.validate.js"></script>
<script src="js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="js/select2.min.js"></script> <!--Filtro no select-->
<script src="js/registrarAtendimento.js"></script>
<script src="js/cliente2.js"></script>

</html>