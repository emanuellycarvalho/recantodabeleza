<?php
	require_once('menu.php');
?>
<!DOCTYPE html>
<html lang='zxx'>
<head>
	<title>Acesse sua conta</title>
	<meta charset='UTF-8'>
	<meta name='description' content=' Divisima | eCommerce Template'>
	<meta name='keywords' content='divisima, eCommerce, creative, html'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<!-- Favicon -->
	<link href='img/favicon.png' rel='shortcut icon'/>

	<!-- Google Font -->
	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i' rel='stylesheet'>


	<!-- Stylesheets -->
	<link rel='stylesheet' href='css/bootstrap.min.css'/>
	<link rel='stylesheet' href='css/font-awesome.min.css'/>
	<link rel='stylesheet' href='css/flaticon.css'/>
	<link rel='stylesheet' href='css/slicknav.min.css'/>
	<link rel='stylesheet' href='css/jquery-ui.min.css'/>
	<link rel='stylesheet' href='css/owl.carousel.min.css'/>
	<link rel='stylesheet' href='css/animate.css'/>
	<link rel='stylesheet' href='css/style.css'/>

</head>
<body>
	<?php
		menu('Login');
    ?>
    
    <!-- Page info -->
    <div class='page-top-info'>
        <div class='container'>
            <h4>Acesse sua conta</h4>
            <div class='site-pagination'>
                <a href='index.php'>Home</a> /
                <a href=''>Entrar</a>
            </div>
        </div>
    </div>
    <!-- Page info end -->

	<!-- Contact section -->
	<section class='contact-section'>
		<div class='container'>
			<div class='row'>
				<div class="col-lg-6 contact-info">
					<form class='contact-form' name='cadastroPessoa' action='act/logar.php'>
						<div class='cf-title'><h4>Dados de acesso</h4></div>
						<label for='email'>Email</label>
						<input type='email' name='email' id='email' placeholder='E-mail'>
						<label for='senha'>Senha</label>
						<input type='password' name='senha' id='senha'>
						</p>Ainda não tem uma conta? <a href='cadastroCliente.php'>Cadastre-se</a>!</p>					
						<button class='site-btn'>ENTRAR</button>
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
	<script src='js/jquery-3.2.1.min.js'></script>
	<script src='js/bootstrap.min.js'></script>
	<script src='js/jquery.slicknav.min.js'></script>
	<script src='js/owl.carousel.min.js'></script>
	<script src='js/jquery.nicescroll.min.js'></script>
	<script src='js/jquery.zoom.min.js'></script>
	<script src='js/jquery-ui.min.js'></script>
	<script src='js/main.js'></script>
	<script src='js/projeto.js'></script>

	</body>
</html>
