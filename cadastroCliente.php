<?php
	// colocar Feminino pra estar selecionado quando carregar a pagina no radio do Sexo
	require_once('menu.php');
?>
<!DOCTYPE html>
<html lang='zxx'>
<head>
	<title>Cadastre-se</title>
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


	<!--[if lt IE 9]>
		  <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
	  <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
	<![endif]-->

</head>
<body>
	<?php
		menu('Cadastre-se');
	?>
	<!-- Contact section -->
	<section class='contact-section'>
		<div class='container'>
			<div class='row'>
				<div class="col-lg-6 contact-info">
					<form class='contact-form' name='cadastroPessoa'>
						<div class='cf-title'><h4>Dados pessoais</h4></div>
						<label for='nmCliente'>Nome completo</label>
						<input type='text' name='nmCliente' id='nmCliente' placeholder='Nome'>
						<label for='sexo'>Sexo</label>
						<div class='cf-radio-btns address-rb'> 
							<!-- tirar "address-rb" pra colocar um por linha -->
							<div class='col-md-12'>
								<div class='cfr-item'>
									<input type='radio' name='sexo' id='feminino'>
									<label for='feminino'>Feminino</label>
								</div>
								<div class='cfr-item'>
									<input type='radio' name='sexo' id='masculino'>
									<label for='masculino'>Masculino</label>
								</div>
								<div class='cfr-item'>
									<input type='radio' name='sexo' id='outro'>
									<label for='outro'>Outro</label>
								</div>
							</div>
						</div>
						<label for='dtNasc'>Data de nascimento</label>
						<input type='text' name='dtNasc' id='dtNasc' placeholder='00/00/00'>
						<label for='rg'>RG</label>
						<input type='text' name='rg' id='rg'>
						<label for='telefone'>Telefone</label>
						<input type='text' name='telefone' id='telefone' placeholder='(00) 00000-0000'>
						
						<div class='row'><p>. </p></div>
						<div class='cf-title'><h4>Endereço</h4></div>
						<label for='cep'>CEP</label>
						<input type='text' name='cep' id='cep' placeholder='00000-000'>
						<label for='rua'>Rua</label>
						<input type='text' name='rua' id='rua'>
						<label for='bairro'>Bairro</label>
						<input type='text' name='bairro' id='bairro'>
						<label for='cidade'>Cidade</label>
						<input type='text' name='cidade' id='cidade'>
						<label for='numero'>Número</label>
						<input type='text' name='numero' id='numero'>
						<label for='complemento'>Complemento</label>
						<input type='text' name='complemento' id='complemento' placeholder='Ex.: Apartamento'>
						<div class='row'><p>. </p></div>

						<div class='cf-title'><h4>Login</h4></div>
						<label for='email'>Email</label>
						<input type='email' name='email' id='email' placeholder='E-mail'>
						<label for='senha'>Senha</label>
						<input type='password' name='senha' id='senha'>
						<label for='senha2'>Confirme sua senha</label>
						<input type='password' name='senha2' id='senha2'>
						
						<div class='row'><p>. </p></div>
						<button class='site-btn'>CADASTRE-SE</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact section end -->


	<!-- Related product section -->
	<section class='related-product-section spad'>
		<div class='container'>
			<div class='section-title'>
				<h2>Your Favorites</h2>
			</div>
			<div class='row'>
				<div class='col-lg-3 col-sm-6'>
					<div class='product-item'>
						<div class='pi-pic'>
							<div class='tag-new'>New</div>
							<img src='./img/product/2.jpg' alt=''>
							<div class='pi-links'>
								<a href='#' class='add-card'><i class='flaticon-bag'></i><span>ADD TO CART</span></a>
								<a href='#' class='wishlist-btn'><i class='flaticon-heart'></i></a>
							</div>
						</div>
						<div class='pi-text'>
							<h6>$35,00</h6>
							<p>Black and White Stripes Dress</p>
						</div>
					</div>
				</div>
				<div class='col-lg-3 col-sm-6'>
					<div class='product-item'>
						<div class='pi-pic'>
							<img src='./img/product/5.jpg' alt=''>
							<div class='pi-links'>
								<a href='#' class='add-card'><i class='flaticon-bag'></i><span>ADD TO CART</span></a>
								<a href='#' class='wishlist-btn'><i class='flaticon-heart'></i></a>
							</div>
						</div>
						<div class='pi-text'>
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
				<div class='col-lg-3 col-sm-6'>
					<div class='product-item'>
						<div class='pi-pic'>
							<img src='./img/product/9.jpg' alt=''>
							<div class='pi-links'>
								<a href='#' class='add-card'><i class='flaticon-bag'></i><span>ADD TO CART</span></a>
								<a href='#' class='wishlist-btn'><i class='flaticon-heart'></i></a>
							</div>
						</div>
						<div class='pi-text'>
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
				<div class='col-lg-3 col-sm-6'>
					<div class='product-item'>
						<div class='pi-pic'>
							<img src='./img/product/1.jpg' alt=''>
							<div class='pi-links'>
								<a href='#' class='add-card'><i class='flaticon-bag'></i><span>ADD TO CART</span></a>
								<a href='#' class='wishlist-btn'><i class='flaticon-heart'></i></a>
							</div>
						</div>
						<div class='pi-text'>
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Related product section end -->
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
