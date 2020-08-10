<?php
	require_once('menu.php');
?>
<!DOCTYPE html>
<html lang='zxx'>
<head>
	<title>Visualizar Serviços</title>
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
		menu('Visualizar Serviços', '#');
	?>
	
	<!-- Service section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='col-md-3 offset-md-9'>
				<a href='cadastroFuncionario.php'><img src='../img/icons/newEmployee.png' width='70px'></a>
			</div>
			<div class='row justify-content-center'>
				<div class='col-lg-9'>
					<div class='cart-table'>
						<h3>Nossos Funcionários</h3>
						<div class='cart-table-warp'>
							<table>
							<thead>
								<tr>
									<th class='product-th'>Nome</th>
									<th class='quy-th'>Acumulado</th>
									<th class='quy-th'>Excluir</th>
                                    <th class='quy-th'>Editar</th>
                                    <th class='quy-th'>Ver mais</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class='quy-col'>
                                        <a href='Funcionário.php'>
                                            <div class='pc-title'>
                                                <h4>Fulano</h4>
                                                <p>(31) 00000-0000</p>
                                            </div>
                                        </a>
									</td>
									<td class='quy-col'>
                                            <center><h4>150,00</h4></center>
									</td>
									<td class='quy-col'><center><a href=''><img src='../img/icons/deleteEmployee.png' height='35px'></a></center></td>
                                    <td class='quy-col'><center><a href=''><img src='../img/icons/editEmployee.png' height='35px'></a></center></td>
                                    <td class='quy-th'><center><a href=''><img src='../img/icons/seeEmployee.png' height='35px'></a></center></td>
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
    <!-- Service section end -->
    
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
