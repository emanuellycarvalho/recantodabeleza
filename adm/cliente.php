<?php
	require_once('menu.php');
?>
<!DOCTYPE html>
<html lang='zxx'>
<head>
	<title>Visualizar Cliente</title>
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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>
<body>
	<?php
		menu('Visualizar Cliente', 'seeClient-light');
	?>
	
	<!-- Client section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-lg-9'>
					<div class='cart-table'>
						<h3>Fulano da Silva</h3>
						<div class='cart-table-warp'>
                            <div class='row'>
                                <div class='col-lg-3 order-2 order-lg-0 text-center'>
                                    <img src='../img/users/1.jpg' width='200px'>
                                </div>
                                <div class='col-lg-7 order-2 order-lg-1'>
									<b>Nasceu em </b> 20/02/1988 <b class='pink'> |</b>
									<b>RG: </b> MG-00.000.00 <b class='pink'>|</b>
									<b>Sexo: </b> Outro <br>
                                    <hr>
                                    <b>Telefone: </b> (31) 98873-3308 <br> <br>
                                    <b>E-mail: </b> fulano@yahoo.com.br <br> <br>
                                    <b>Endereço: </b> Praça dos Três Poderes - Brasília, DF - <br> <br>
                                </div>
                            </div>
                        </div>
                        <div class='total-cost'>
                        	<a href='clientes.php' class='site-btn sb-dark'>Voltar</a>	
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- Clients section end -->
    
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
