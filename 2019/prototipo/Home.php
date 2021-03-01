	
<!DOCTYPE html>
<html>
<head>
	<title>Recanto Beleza</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="css/Estilo.css"/>
	<link rel="stylesheet" href="css/icon.css"/>

	
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

	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-2">
				<a href="#"><img id="horario" src="imagens/marqueHorario.jpeg" title="Marcar horário"></a>
				<a href="#"><img id="oferta" src="imagens/oferta2.jpg" title="Ver novos produtos"></a>
			</div>

			<div id="carouselExampleIndicators" class="carousel slide col-xs-12 col-sm-12 col-md-8 col-lg-7" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" >
					<div class="carousel-item active" align="center">
						<img class="img-fluid d-block w-5" id="slide" src="imagens/novoslide3.jpg" alt="First slide">
					</div>
					<div class="carousel-item" align="center">
						<img class="img-fluid d-block w-5" id="slide" src="imagens/novoslide4.jpg" alt="Second slide">
					</div>
					<div class="carousel-item" align="center">
						<img class="img-fluid d-block w-5" id="slide" src="imagens/novoslide5.jpg" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>

			<div class="col-xs-12 col-md-2">
				<a href="#"><img id="anuncio1" src="imagens/anuncio1.png" title="Produto capilar"></a>
				<a href="#"><img id="anuncio2" src="imagens/anuncio2.png" title="Produto capilar"></a>
			</div>
		</div>

		<div class="row" id="destaque">
			<div class="col-9">
				<table class="destaques" id="d1">
					<th>OFERTAS DA SEMANA:</th>
					<tr>
						<td>
							<div class="card-deck col-11" id="servicos">
								<div class="card">
									<img class="card-img-top" src="imagens/servico1.jpeg" alt="Make-Up" title="Make-Up">
									<div class="card-body">
										<a href="#"><h5 class="card-title">Make-Up </h5></a>
										<p class="card-text">R$60,00</p>
									</div>
								</div>
								<div class="card">
									<img class="card-img-top" src="imagens/servico2.jpeg" alt="Escova" title="Escova">
									<div class="card-body">
										<a href="#"><h5 class="card-title">Escova</h5></a>
										<p class="card-text">R$25,00</p>
									</div>
								</div>
								<div class="card">
									<img class="card-img-top" src="imagens/servico3.jpeg" alt="Corte" title="Corte">
									<div class="card-body">
										<a href="#"><h5 class="card-title">Corte</h5></a>
										<p class="card-text">R$20,00</p>
									</div>
								</div>
								<div class="card">
									<img class="card-img-top" src="imagens/servico4.jpeg" alt="Descoloração" title="Descoloração">
									<div class="card-body">
										<a href="#"><h5 class="card-title">Descoloração</h5></a>
										<p class="card-text">R$40,00</p>
									</div>
								</div>
							</div>
						</td>
					</tr>
				</table>
			</div>

			<div class="col-3">
				<table class="destaques" id="d2" >
					<th style="padding: 4%;">NOVIDADE:</th>
					<tr>
						<td>
							<div class="card-deck col-11" id="depilacao">
								<div class="card">
									<img class="card-img-top" src="imagens/dep.jpg" alt="Novidade" title="Novidade">
									<div class="card-body">
										<a href="#"><h5 class="card-title">Depilação à laser </h5></a>
										<p class="card-text">R$240,00</p>
									</div>
								</div>
							</div>
						</td>
					</tr>
				</table>
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
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>

</html>