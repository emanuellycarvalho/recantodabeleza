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

    <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>

</head>
<body>
	<?php
		menu('Relatórios', 'actionsClient-light');
	?>
	
	<!-- Client section -->
    <section class='cart-section spad'>
		<div class='container'>
            <h3>Fulano da Silva</h3>
            <hr>
            <b >Telefone: </b> (31) 98873-3308 |
            <b >E-mail: </b> fulano@yahoo.com.br |
            <b >Endereço: </b> Praça dos Três Poderes - Brasília, DF 
			<div class='row justify-content-center'>
				<script type='text/javascript'>
					google.charts.load('current', {packages:['corechart']});
					google.charts.setOnLoadCallback(drawChart);
					function drawChart() {
						var data = google.visualization.arrayToDataTable([
							['Serviço', 'Vezes'],
							['Cauterização', 2],
							['M. corporal', 4],
							['M. capilar', 4],
							['Limpeza de pele', 3],
							['Escova', 2]
						]);

					var options = {
						legend: {position: 'right', 
								textStyle: {
									fontName: 'Josefin Sans', 
									fontSize: 16	
								}},
						pieSliceText: 'label',
						title: 'Serviços mais solicitados',
						titleTextStyle: {
							color: 'black',
							fontName: 'Josefin Sans', 
							fontSize: 30	
						},
						colors: ['#ec105a', '#ff8f8f', '#f44336', '#f3b49f', '#f57f80', '#fad7d7'],
					};

						var chart = new google.visualization.PieChart(document.getElementById('piechart'));
						chart.draw(data, options);
					}
				</script>
				<div id='piechart' style='width: 900px; height: 400px;'></div>
            </div>
            <div class='row'>
				<div class='col-lg-6 order-2 order-lg-0'>
					<div class='cart-table'>
						<h3>Últimos serviços</h3>
						<div class='cart-table-warp'>
							<table id='table' class='tablesorter'>
								<thead>
									<tr>
										<th class='product-th'>Nome</th>
										<th class='quy-th'><center>Profissional</center></th>
										<th class='quy-th'><center>Valor</center></th>
										<th class='quy-th'><center>Data</center></th>
										<th class='quy-th'><center>Pago</center></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class='quy-col'>
											<h5>Cauterização</h5>
										</td>
										<td class='quy-col'>
											<h5>Andressa</h5>
										</td>
										<td class='quy-col'>
											<h5>39,99</h5>
										</td>
										<td class='quy-col'>
											<h5>20/02/20</h5>
										</td>
										<td class='quy-col'>
											<img src='../img/icons/v.png' width='25px'>
										</td>
									</tr>
									<tr>
										<td class='quy-col'>
											<h5 >Corte de cabelo</h5>
										</td>
										<td class='quy-col'>
											<h5 >Bochecha</h5>
										</td>
										<td class='quy-col'>
											<h5 >19,99</h5>
										</td>
										<td class='quy-col'>
											<h5 >20/02/20</h5>
										</td>
										<td class='quy-col'>
											<img src='../img/icons/v.png' width='25px'>
										</td>
									</tr>
									<tr>
										<td class='quy-col'>
											<h5>Luzes</h5>
										</td>
										<td class='quy-col'>
											<h5>Andressa</h5>
										</td>
										<td class='quy-col'>
											<h5>49,99</h5>
										</td>
										<td class='quy-col'>
											<h5>20/02/20</h5>
										</td>
										<td class='quy-col'>
											<a href='registrarPagamento.php' title='Registrar pagamento'><img src='../img/icons/empty.png' width='25px'></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class='total-cost'>
							<h6>Débito: <span>R$49,99</span></h6>
						</div>
					</div>
                </div>
                <div class='col-lg-6 order-2 order-lg-1'>
					<div class='row justify-content-center'>
						<div class='cart-table'>
							<h3>Últimas compras</h3>
							<div class='cart-table-warp'>
								<table id='table' class='tablesorter'>
									<thead>
										<tr>
											<th class='product-th'>Nome</th>
											<th class='quy-th'><center>Marca</center></th>
											<th class='quy-th'><center>Valor</scenter></th>
											<th class='quy-th'><center>Data</center></th>
											<th class='quy-th'><center>Pago</center></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class='quy-col'></td>
											<td class='quy-col'><td>
											<td class='quy-col'>Sem compras recentes</td>
											<td class='quy-col'></td>
											<td class='quy-col'></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class='total-cost'>
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
