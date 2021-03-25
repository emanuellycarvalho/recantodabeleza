
<!DOCTYPE html>
<html>
<head>
	<title>Login - Recanto Beleza</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="css/icon.css">
	<link rel="stylesheet" href="css/Estilo.css">
	<link rel="stylesheet" href="css/Login.css">

</head>
<body>
	<header>
		<?php
		include_once("Cabecalho.php");
		?>
	</header>

	<h2><img src="imagens/logo.png" style="width: 5%; height: 5%;">Login</h2>

	<form id="formularioLogin" action="LoginControlador.php?operacao=autenticar" method="post">
		<div class="container">
			<div class="row form-group">
				<div class="col-md-12">
					<label for="email">E-mail:</label>  
					<input class="form-control" name="email" id="email" type="email" placeholder="exemplo@exemplo" autofocus>
				</div>			
			</div>
			<div class="row form-group">
				<div class="col-md-12">
					<label for="senha">Senha:</label>
					<input class="form-control" id="senha" name="senha" type="password">
				</div>			
			</div>	
		
			<div class="row form-group">
				<div class="col-12">
					<button class="btn btn-success" type="submit" name="action">Login</button>	
				</div>
				<div class="col-8 novaSenha">
					<a href="#">Esqueceu sua senha?</a>
				</div>	
			</div>

			<div class="col-10 cadastro">
				<a href="Cliente.php"> Não possui cadastro? Cadastre-se</a>
			</div>					
		</div>
	</form >

	<script src="jQuery/jQuery.js"></script>
	<script src="jQuery/jQuery.validate.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="js/login.js"></script>

</body>
</html>