@extends('templates.adm')

@section('title') Administração @endsection('title')

@section('content')

	<!-- Clients section -->
    <section class='cart-section spad'>
		<div class='container'>

			<div class='row'>
				<div class='col-md-4 offset-md-3'>
					<a href='registroServico.php' class='site-btn'>Novo débito</a>
				</div>
			</div>
			<div class='row'>
				<div class='col-lg-7 order-2 order-lg-0'>
					<div class='row justify-content-center'>
						<div class='col-lg-12'>
							<div class='table'>
								<h3>Inadimplentes</h3>
								<div class='cart-table-warp'>
									<table>
										<thead>
											<tr>
												<th class='product-th'>Nome</th>
												<th class='quy-th'><center>Saldo</center></th>
												<th class='quy-th'><center>Data</center></th>
												<th class='quy-th'>Receber</th>
												<th class='quy-th'>Mais</th>
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
														<h4>10,00</h4>
												</td>
												<td class='quy-col'>
														<h5>20/02/20</h5>
												</td>
												<td class='quy-col'>
													<a href='registrarPagamento.php'><img src='{{url("/img/icons/pay.png")}}' height='35px'></a>
												</td>
												<td class='quy-th'>
													<a href='registrarPagamento.php'><img src='{{url("/img/icons/see.png")}}' height='35px'></a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

				<script type="text/javascript">
						google.charts.load("current", {packages:["corechart"]});
						google.charts.setOnLoadCallback(drawChart);
						function drawChart() {
							var data = google.visualization.arrayToDataTable([
								["Categoria", "Total", { role: "style" } ],
								["Ganhos", 823, "color: #27d927"],
								["Despesas", 530, "color: Red"]
							]);

							var view = new google.visualization.DataView(data);
							view.setColumns([0, 1,
											{ calc: "stringify",
												sourceColumn: 1,
												type: "string",
												role: "annotation" },
											2]);

							var options = {
								title: "Balanço Mensal",
								width: 600,
								height: 400,
								bar: {groupWidth: "95%"},
								legend: { position: "none" },
							};
							var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
							chart.draw(view, options);
						}
					</script>

					
				<div class='col-lg-4 order-2 order-lg-1'>
					<div id="barchart_values" style="width: 700px; height: 300px;"></div>
				</div>
			</div>
			<hr>

			<div class='row'>
				<div class='col-lg-5 order-2 order-lg-0'>
					<div class='section-title'>
						<h2>TOP 3 DA SEMANA</h2>
					</div>
					<div class='product-slider owl-carousel'>
						<div class='product-item'>
							<div class='pi-pic'>
								<img src='{{url("/img/users/1.jpg")}}' alt=''>
							</div>
							<div class='pi-text'>
								<h6>Claudinho L.</h6>
							</div>
						</div>
						<div class='product-item'>
							<div class='pi-pic'>
								<img src='{{url("/img/users/2.jpg")}}' alt=''>
							</div>
							<div class='pi-text'>
								<h6>Alessandra B.</h6>
							</div>
						</div>
						<div class='product-item'>
							<div class='pi-pic'>
								<img src='{{url("/img/users/3.jpg")}}' alt=''>
							</div>
							<div class='pi-text'>
								<h6>Bochehca A.</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>
	<!-- Clients section end -->
    
@endsection