<?php
	require_once('menu.php');
?>
<!DOCTYPE html>
<html lang='zxx'>
<head>
	<title>Novo Serviço</title>
	<meta charset='UTF-8'>
	<meta name='description' content=' Divisima | eCommerce Template'>
	<meta name='keywords' content='divisima, eCommerce, creative, html'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<!-- Favicon -->
	<link href='../img/faviconAdm.png' rel='shortcut icon'/>

	<!-- Google Font -->
	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i' rel='stylesheet'>


	<!-- Stylesheets -->
	<link rel='stylesheet' href='../css/bootstrap.min.css'/>
	<link rel='stylesheet' href='../css/font-awesome.min.css'/>
	<link rel='stylesheet' href='../css/flaticon.css'/>
	<link rel='stylesheet' href='../css/slicknav.min.css'/>
	<link rel='stylesheet' href='../css/jquery-ui.min.css'/>
	<link rel='stylesheet' href='../css/owl.carousel.min.css'/>
	<link rel='stylesheet' href='../css/animate.css'/>
	<link rel='stylesheet' href='../css/style.css'/>

</head>
<body>
	<?php
		menu('Novo Serviço');
	?>
	
	<!-- Contact section -->
	<section class='contact-section'>
		<div class='container'>
			<div class='row'>
				<div class='col-lg-6 contact-info'>
					<form class='contact-form' name='cadastroServiço' action='act/cadastrarServiço.php'>
						<label for='nmProd'>Nome*</label>
						<input type='text' name='nmProd' id='nmProd' placeholder='Nome'>
						<label for='valor'>Valor*</label>
						<input type='text' name='valor' id='valor' placeholder='R$ 00,00'>
                        <label for='descricao'>Descrição</label>
						<textarea name='descricao' id='descricao' rows='5'></textarea>
						<label for='foto'>Imagem*</label>
						<div class='custom-file'>
							<input type='file' class='custom-file-input' id='foto'>
							<label class='custom-file-label' for='foto' data-browse='Procurar'></label>
						</div>
                        <small class='form-text text-muted'>*PNG, JPG ou JPEG na proporção 1:1</small>
					
						<div class='row'><p>. </p></div>
						<label for='profissionais'>Profissionais capacitados</label>
						<select multiple class='form-control form-control-lg' id='profissionais'>
							<!-- preenchimento via banco -->
						</select>
					
                        <div class='row'><p>. </p></div>
						<label for='senha'>Confirmar senha*</label>
						<input type='password' name='senha' id='senha'>
						
						<div class='row'><p>. </p></div>
						<button class='site-btn'>CADASTRAR</button>
						<div class='row'><p>. </p></div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact section end -->
	<?php 
		require_once('rodape.php');
	?>
	<!--====== Javascripts & Jquery ======-->
	<script src='../js/jquery-3.2.1.min.js'></script>
	<script src='../js/bootstrap.min.js'></script>
	<script src='../js/jquery.slicknav.min.js'></script>
	<script src='../js/owl.carousel.min.js'></script>
	<script src='../js/jquery.nicescroll.min.js'></script>
	<script src='../js/jquery.zoom.min.js'></script>
	<script src='../js/jquery-ui.min.js'></script>
	<script src='../js/main.js'></script>
	<script src='../js/projeto.js'></script>

	</body>
</html>
