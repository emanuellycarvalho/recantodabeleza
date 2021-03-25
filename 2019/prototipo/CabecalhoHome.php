<?php 

if(!isset($_SESSION)) { 
	session_start(); 
} 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cabecalho</title>
	<meta charset="utf-8">
</head>
<body>

</body>
</html>
<div class="container-fluid">
	<div class="row">
		<div class="col-12" id="areaSuperior" >
			<a href="#"> Fale Conosco</a>
			<a href="#"> Quem somos? </a>
			<a href="#"> Ajuda </a>
		</div>
	</div>

	<div class="row">
		<div class="col-1">
			<a href="Home.php">
				<img src="imagens/logo.png" title="Recanto Beleza" alt="Recanto Beleza"/>
			</a>
		</div>

		<div class="col-1" id="titulo">
			<h1> <a href="Home.php"> RECANTO </br> BELEZA</a> </h1>
		</div>

		<div class="col-sm-7">
			<div id="imaginary_container"> 
				<div class="input-group stylish-input-group">
					<input type="text" class="form-control"  placeholder="Buscar por..." style="height: 50px; margin-left: 10%;">
					<span class="input-group-addon">
						<button type="submit">
							<span> <i class="material-icons" style="font-size: 200%; margin-top: 30%; color: black;">search</i></span>
						</button>  
					</span>
				</div>
			</div>
		</div>

		<?php 
		if (isset($_SESSION["teste"])) {
			if ($_SESSION["teste"]) {
				if(isset($_SESSION["status"])){
					if ($_SESSION["status"] =="admin") {
						echo '<div class="col-1" id="minhaConta">
						<i class="material-icons">account_circle</i><br>
						<a href="HomeFuncionario.php"> Minha Conta</a>
						</div>';
					}else{
						echo '<div class="col-1" id="minhaConta">
						<i class="material-icons">account_circle</i><br>
						<a href="MinhaConta.php"> Minha Conta</a>
						</div>';

						echo '<div class="col-2" id="carrinho">
						<i class="material-icons">shopping_cart</i><br>
						<a href="#" style="margin-left: 20%;"> Meu carrinho</a>
						</div>';
					}
				}
			}else{
				echo '<div class="col-1" id="minhaConta">
				<i class="material-icons">account_circle</i><br>
				<a href="Login.php"> Minha Conta</a>
				</div>';
			}
		}else{
			echo '<div class="col-1" id="minhaConta">
			<i class="material-icons">account_circle</i><br>
			<a href="Login.php"> Minha Conta</a>
			</div>';

			echo '<div class="col-2" id="carrinho">
			<i class="material-icons">shopping_cart</i><br>
			<a href="#" style="margin-left: 20%;"> Meu carrinho</a>
			</div>';
		}

		?>

	</div>
</div>