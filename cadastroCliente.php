<?php
	// achar um artificio mais sofisticado pra dar espaço ente as áreas do form que "<div class='row'><p>. </p></div>"
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

</head>
<body>
	<?php
		menu('Cadastre-se');
	?>

	<!-- Page info -->
	<div class='page-top-info'>
        <div class='container'>
            <h4>Faça seu cadastro</h4>
            <div class='site-pagination'>
                <a href='index.php'>Home</a> /
                <a href=''>Cadastre-se</a>
            </div>
        </div>
    </div>
	<!-- Page info end -->
	
	<!-- Contact section -->
	<section class='contact-section'>
		<div class='container'>
			<div class='col-lg-10 offset-md-1'>
				<form class='contact-form' name='cadastroPessoa' action='act/cadastrarFuncionario.php'>
					<div class='cf-title'><h4>Dados pessoais</h4></div>
					
					<div class='row'> <!-- grupo de inputs referente aos dados pessoais -->
						
						<div class="col-md-12 col-xs-12">
							<div class="form-group">
								<label for='nmFunc'>Nome completo*</label>
								<input type='text' name='nmFunc' id='nmFunc' placeholder='Nome'>
							</div>
						</div>
						
						<div class="col-md-12 col-xs-12">
							<div class="form-group">
								<label for='sexo'>Sexo</label>
								<div class='cf-radio-btns address-rb'> 
									<!-- tirar "address-rb" pra colocar um por linha -->
									<div class='col-md-5'>
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
							</div>
						</div>

						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for='dtNasc'>Data de nascimento</label>
								<input type='text' name='dtNasc' id='dtNasc' placeholder='00/00/00' >
							</div>
						</div>

						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for='rg'>RG*</label>
								<input type='text' name='rg' id='rg'>
							</div>
						</div>

						<div class="col-md-12 col-xs-12">
							<div class="form-group">
								<label for='telefone'>Telefone*</label>
								<input type='text' name='telefone' id='telefone' placeholder='(00) 00000-0000'>
							</div>
						</div>
					</div>
													
					<div class='row'><p>. </p></div>
					
					<div class='cf-title'><h4>Endereço</h4></div>

					<div class="row">  <!-- grupo de inputs referente aos dados de endereço -->
						
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for='cep'>CEP</label>
								<input type='text' name='cep' id='cep' placeholder='00000-000'>
							</div>
						</div>
						
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for='rua'>Rua</label>
								<input type='text' name='rua' id='rua'>
							</div>
						</div>

						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for='bairro'>Bairro*</label>
								<input type='text' name='bairro' id='bairro'>
							</div>
						</div>

						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for='cidade'>Cidade*</label>
								<input type='text' name='cidade' id='cidade'>
							</div>
						</div>

						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for='numero'>Número</label>
								<input type='text' name='numero' id='numero'>
							</div>
						</div>

						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for='complemento'>Complemento</label>
								<input type='text' name='complemento' id='complemento' placeholder='Ex.: Apartamento'>
							</div>
						</div>
					</div>
					
					<div class='row'><p>. </p></div>

					<div class='col-md-6 offset-md-3'>
						<div class='cf-title'><h4>Login</h4></div>
						<label for='email'>Email*</label>
						<input type='email' name='email' id='email' placeholder='E-mail'>
						<label for='senha'>Senha*</label>
						<input type='password' name='senha' id='senha'>
						<label for='senha2'>Confirmar senha*</label>
						<input type='password' name='senha2' id='senha2'>
					</div>
					
					<div class='col-md-2 offset-md-5'>
						<div class='row'><p>. </p></div>
						<button class='site-btn'>CADASTRAR</button>
						<div class='row'><p>. </p></div>
					</div>
				</form>
			</div>	
		</div>
	</section>
	<!-- Contact section end -->
	<?php 
		require_once('banner.php'); 
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
