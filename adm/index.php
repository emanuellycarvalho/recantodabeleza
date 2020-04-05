<?php
	require_once('menu.php');
?>
<!DOCTYPE html>
<html lang='zxx'>
<head>
	<title>Admnistração RdB</title>
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
		menu('Administração');
    ?>
	
	<!-- Clients section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='row'>
				<div class='col-lg-7 order-2 order-lg-0'>
					<div class='col-md-3 offset-md-7'>
						<a href='registroServico.php' class='site-btn'>Novo débito</a>
					</div>
					<div class='row justify-content-center'>
						<div class='col-lg-9'>
							<div class='cart-table'>
								<h3>Inadimplentes</h3>
								<div class='cart-table-warp'>
									<table>
									<thead>
										<tr>
											<th class='product-th'>Nome</th>
											<th class='quy-th'>Saldo</th>
											<th class='quy-th'>Receber</th>
											<th class='quy-th'>Editar Saldo</th>
											<th class='quy-th'>Selecionar</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class='quy-col'>
												<a href='cliente.php'>
													<div class='pc-title'>
														<h4>Fulano</h4>
														<p>(31) 00000-0000</p>
													</div>
												</a>
											</td>
											<td class='quy-col'>
													<center><h4>10,00</h4></center>
											</td>
											<td class='quy-col'><center><a href='registrarPagamento.php'><img src='../img/icons/pay.png' height='35px'></a></center></td>
											<td class='quy-col'><center><h4><a href='editarDebito.php'><img src='../img/icons/edit.png' height='30px'></a></h4></center></td>
											<td class='quy-th'><center></center></td>
										</tr>
									</tbody>
								</table>
								</div>
								<div class='total-cost'>
								<a href='registrarPagamentos.php' class='site-btn sb-dark'>Receber selecionados</a>
								</div>
							</div>
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
