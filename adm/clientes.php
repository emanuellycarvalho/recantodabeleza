<?php
	require_once('menu.php');
?>
<!DOCTYPE html>
<html lang='zxx'>
<head>
	<title>Clientes</title>
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
		menu('Clientes', 'client');
	?>
	
	<!-- Clients section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-md-9'>
					<div class='row'>
						<div class='col-xl-1 col-lg-5'>
							<a href='cadastroCliente.php'><img src='../img/icons/filter.png' width='70px'></a>
						</div>
						<div class='col-xl-10 col-lg-5'>
							<form class='header-search-form'>
								<input type='text' placeholder='Encontre na página'>
								<button><i class='flaticon-search'></i></button>
							</form>
						</div>
						<div class='col-xl-1 col-lg-5'>
							<a href='cadastroCliente.php'><img src='../img/icons/newClient.png' width='70px'></a>
						</div>
					</div>
				</div>
				<div class='col-lg-9'>
					<hr>
					<div class='cart-table'>
						<div class='cart-table-warp'>
							<table>
							<thead>
								<tr>
									<th class='product-th'>Nome</th>
									<th class='quy-th'>CPF</th>
									<th class='quy-th'>Telefone</th>
									<th class='quy-th'>Excluir</th>
                                    <th class='quy-th'>Editar</th>
                                    <th class='quy-th'>Ver mais</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class='quy-col'>
                                        <a href='cliente.php'>
                                            <div class='pc-title'>
                                                <h4>Fulano	</h4>
												<p>fulano@yahoo.com.br</p>
                                            </div>
                                        </a>
									</td>
									<td class='quy-col'><center>127.234.223-30</center></td>
									<td class='quy-col'><center>(31) 98873-3308</center></td>
									<td class='quy-col'><center><a href=''><img src='../img/icons/deleteClient.png' height='35px'></a></center></td>
                                    <td class='quy-col'><center><a href=''><img src='../img/icons/editClient.png' height='35px'></a></center></td>
                                    <td class='quy-col'><center><a href='cliente.php'><img src='../img/icons/seeClient.png' height='35px'></a></center></td>
								</tr>
							</tbody>
						</table>
                        </div>
                        <div class='total-cost'></div>
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
