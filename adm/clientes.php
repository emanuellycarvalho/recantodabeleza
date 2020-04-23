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
	<link rel='stylesheet' href='../css/theme.default.css'/>

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
							<a href='' title='Filtrar resultados'><img src='../img/icons/filter.png' width='70px'></a>
						</div>
						<div class='col-xl-10 col-lg-5'>
							<form class='header-search-form'>
								<input type='search' placeholder='Encontre na página'>
								<button><i class='flaticon-search'></i></button>
							</form>
						</div>
						<div class='col-xl-1 col-lg-5'>
							<a href='cadastroCliente.php' title='Novo cliente'><img src='../img/icons/newClient.png' width='70px'></a>
						</div>
					</div>
				</div>
				<div class='col-lg-9'>
					<hr>
					<div class='cart-table'>
						<div class='cart-table-warp'>
							<table id='table' class='tablesorter'>
							<thead>
								<tr>
									<th class='product-th'>Nome</th>
									<th class='quy-th'>CPF</th>
									<th class='quy-th'>Telefone</th>
									<th class='quy-th'></th>
									<th class='quy-th'>Excluir</th>
                                    <th class='quy-th'>Editar</th>
                                    <th class='quy-th'>Ver mais</th>
                                    <th class='quy-th'>Relatórios</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class='quy-col'>
                                        <a href='cliente.php' title='Visualizar cliente'>
                                            <div class='pc-title'>
                                                <h4>Fulano	</h4>
												<p>fulano@yahoo.com.br</p>
                                            </div>
                                        </a>
									</td>
									<td class='quy-col'><center>127.234.223-30</center></td>
									<td class='quy-col'><center>(31) 98873-3308</center></td>
									<td class='quy-col'><img scr='../img/blog-thumbs/line.png' width='35px'></td>
									<td class='quy-col'><center><a href='' title='Excluir cliente'><img src='../img/icons/deleteClient.png' height='35px'></a></center></td>
                                    <td class='quy-col'><center><a href='' title='Editar cliente'><img src='../img/icons/editClient.png' height='35px'></a></center></td>
                                    <td class='quy-col'><center><a href='cliente.php' title='Visualizar cliente'><img src='../img/icons/seeClient.png' height='35px'></a></center></td>
									<td class='quy-col'><center><a href='relatoriosCliente.php' title='Relatórios do cliente'><img src='../img/icons/actionsClient.png' height='35px'></a></center></td>
								</tr>
								<tr>
									<td class='quy-col'>
                                        <a href='cliente.php' title='Visualizar cliente'>
                                            <div class='pc-title'>
                                                <h4>Ciclano	</h4>
												<p>ciclano@yahoo.com.br</p>
                                            </div>
                                        </a>
									</td>
									<td class='quy-col'><center>127.232.231-30</center></td>
									<td class='quy-col'><center>(31) 98773-3308</center></td>
									<td class='quy-col'><img scr='../img/blog-thumbs/line.png' width='35px'></td>
									<td class='quy-col'><center><a href='' title='Excluir cliente'><img src='../img/icons/deleteClient.png' height='35px'></a></center></td>
                                    <td class='quy-col'><center><a href='' title='Editar cliente'><img src='../img/icons/editClient.png' height='35px'></a></center></td>
                                    <td class='quy-col'><center><a href='cliente.php' title='Visualizar cliente'><img src='../img/icons/seeClient.png' height='35px'></a></center></td>
									<td class='quy-col'><center><a href='relatoriosCliente.php' title='Relatórios do cliente'><img src='../img/icons/actionsClient.png' height='35px'></a></center></td>
								</tr>
							</tbody>
							</table>
                        </div>
                        <div class='total-cost-free'>
							<div class='col-lg-6 order-lg-0'>
								<h6>Exibindo <input type='number' value ='1'> de 123</h6>
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
	<script src='../js/jquery.tablesorter.min.js'></script>

	</body>
</html>
