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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>
<body>
	<?php
		menu('cliente');
	?>
	
	<!-- Client section -->
    <section class='cart-section spad'>
		<div class='container'>
			<div class='col-md-3 offset-md-8'>
				<a href='../clientes.php' class='site-btn'>Clientes</a>
			</div>
			<div class='row justify-content-center'>
				<div class='col-lg-9'>
					<div class='cart-table'>
						<h3>Fulano da Silva</h3>
						<div class='cart-table-warp'>
                            <div class='row'>
                                <div class='col-lg-3 order-2 order-lg-0'>
                                    <img src='../img/users/1.jpg' width='200px'>
                                </div>
                                <div class='col-lg-7 order-2 order-lg-1'>
                                    <b>Saldo: </b> Nulo <br> <br>
                                    <hr>
                                    <b>Telefone: </b> (31) 98873-3308 <br> <br>
                                    <b>E-mail: </b> fulano@yahoo.com.br <br> <br>
                                    <b>Endereço: </b> Praça dos Três Poderes - Brasília, DF <br> <br>
                                </div>
                            </div>
                        </div>
                        <div class='total-cost'>
                        <a href='../cadastroCliente.php' class='site-btn sb-dark'>Editar</a>
                        </div>
					</div>
				</div>
			</div>
            <br><br>
            <div class='row'>
				<div class='col-lg-6 order-2 order-lg-0'>
					<div class='row justify-content-center'>
						<div class='col-lg-12'>
							<div class='table'>
								<h3>Últimos serviços</h3>
								<div class='cart-table-warp'>
									<table>
										<thead>
											<tr>
												<th class='product-th'>Nome</th>
												<th class='quy-th'><center>Profissional</center></th>
												<th class='quy-th'><center>Valor</center></th>
												<th class='quy-th'><center>Data</center></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class='quy-col'>
													<h5>Cauterização</h5>
												</td>
												<td class='quy-col'>
													<h5>Andressa B.</h5>
												</td>
												<td class='quy-col'>
                                                    <h5>39,99</h5>
												</td>
												<td class='quy-col'>
													<h5>20/02/20</h5>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
                </div>
                <div class='col-lg-6 order-2 order-lg-1'>
					<div class='row justify-content-center'>
                        <div class='col-lg-12'>
                            <div class='table'>
                                <h3>Últimas compras</h3>
                                <div class='cart-table-warp'>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class='product-th'>Nome</th>
                                                <th class='quy-th'><center>Marca</center></th>
                                                <th class='quy-th'><center>Valor</scenter></th>
                                                <th class='quy-th'><center>Data</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class='quy-col'></td>
                                                <td class='quy-col'>Sem compras recentes<td>
                                                <td class='quy-col'></td>
                                                <td class='quy-col'></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class='row'>
                    <div class='row justify-content-center'>
                        <script type="text/javascript">
                            google.charts.load("current", {packages:["corechart"]});
                            google.charts.setOnLoadCallback(drawChart);
                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Serviço', 'Vezes'],
                                    ['Cauterização', 2],
                                    ['Massagem corporal', 4],
                                    ['Limpeza de pele', 3],
                                    ['Escova', 2]
                                ]);

                            var options = {
                                legend: 'none',
                                pieSliceText: 'label',
                                title: 'Serviços mais solicitados',
                                pieStartAngle: 100,
                            };

                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                chart.draw(data, options);
                            }
                        </script>
                        <div id="piechart" style="width: 900px; height: 450px;"></div>
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
