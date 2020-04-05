<?php
    require_once('menu.php');
?>

<!DOCTYPE html>
<html lang='zxx'>
<head>
	<title>Recanto da Beleza</title>
	<meta charset='UTF-8'>
	<meta name='description' content=' Divisima | eCommerce Template'>
	<meta name='keywords' content='divisima, eCommerce, creative, html'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<!-- Favicon -->
	<link href='img/favicon.ico' rel='shortcut icon'/>

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
        menu('Home');
		require_once('banner.php');
	?>

	<!-- Hero section -->
	<section class='features-section'>
		<div class='container-fluid'>
			<div class='row'>
				<div class='col-md-0 p-0 feature'></div>
				<div class='col-md-12 p-0 feature'>
					<div class='feature-inner'>
						<h2>Promoções da semana</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class='hero-section'>
		<div class='hero-slider owl-carousel'>
			<div class='hs-item set-bg' data-setbg='img/bg.jpg'>
				<div class='container'>
					<div class='row'>
						<div class='col-xl-6 col-lg-7 text-white'>
							<span>Promoção</span>
							<h2>PENTEADOS</h2>
							<p>Penteados variados para todos os tipos de cabelo estão com preço especial essa semana!</p>
							<a href='#' class='site-btn sb-line'>VEJA MAIS</a>
							<a href='#' class='site-btn sb-white'>AGENDE O SEU</a>
						</div>
					</div>
					<div class='offer-card text-white'>
						<span>a partir de</span>
						<h2>$29</h2>
						<p>AGENDE JÁ</p>
					</div>
				</div>
			</div>
			<div class='hs-item set-bg' data-setbg='img/bg-2.jpg'>
				<div class='container'>
					<div class='row'>
						<div class='col-xl-6 col-lg-7 text-white'>
							<span>Promoção</span>
							<h2>MANICURE</h2>
							<p>Fique com as unhas lindas por um precinho promocional para este final de semana!</p>
							<a href='#' class='site-btn sb-line'>VEJA MAIS</a>
							<a href='#' class='site-btn sb-white'>AGENDE O SEU</a>
						</div>
					</div>
					<div class='offer-card text-white'>
						<span>mão e pé</span>
						<h2>$25</h2>
						<p>AGENDE JÁ</p>
					</div>
				</div>
			</div>
		</div>
		<div class='container'>
			<div class='slide-num-holder' id='snh-1'></div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Features section -->
	<section class='features-section'>
		<div class='container-fluid'>
			<div class='row'>
				<div class='col-md-4 p-0 feature'>
					<div class='feature-inner'>
						<div class='feature-icon'>
							<img src='img/icons/3.png' alt='#'>
						</div>
						<h2>Encomenda de produtos</h2>
					</div>
				</div>
				<div class='col-md-4 p-0 feature'>
					<div class='feature-inner'>
						<div class='feature-icon'>
							<img src='img/icons/2.png' alt='#'>
						</div>
						<h2>Profissionais qualificados</h2>
					</div>
				</div>
				<div class='col-md-4 p-0 feature'>
					<div class='feature-inner'>
						<div class='feature-icon'>
							<img src='img/icons/1.png' alt='#'>
						</div>
						<h2>Aceitamos todas as bandeiras</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->

	<!-- queridinhos da semana / novidades section -->
	<section class='category-section spad'>
		<div class='container'>
			<div class='row'>
				<div class='col-lg-8 order-2 order-lg-0'>
					<div class='section-title'>
						<h2>QUERIDINHOS DA SEMANA</h2>
					</div>
					<div class='product-slider owl-carousel'>
						<div class='product-item'>
							<div class='pi-pic'>
								<img src='./img/product/1.jpg' alt=''>
								<div class='pi-links'>
									<a href='#' class='add-card'><i class='flaticon-bag'></i><span>+ CARRINHO</span></a>
									<a href='#' class='wishlist-btn'><i class='flaticon-heart'></i></a>
								</div>
							</div>
							<div class='pi-text'>
								<h6>$35,00</h6>
								<p>Flamboyant Pink Top </p>
							</div>
						</div>
						<div class='product-item'>
							<div class='pi-pic'>
								<div class='tag-new'>New</div>
								<img src='./img/product/2.jpg' alt=''>
								<div class='pi-links'>
									<a href='#' class='add-card'><i class='flaticon-bag'></i><span>+ CARRINHO</span></a>
									<a href='#' class='wishlist-btn'><i class='flaticon-heart'></i></a>
								</div>
							</div>
							<div class='pi-text'>
								<h6>$35,00</h6>
								<p>Black and White Stripes Dress</p>
							</div>
						</div>
						<div class='product-item'>
							<div class='pi-pic'>
								<img src='./img/product/3.jpg' alt=''>
								<div class='pi-links'>
									<a href='#' class='add-card'><i class='flaticon-bag'></i><span>+ CARRINHO</span></a>
									<a href='#' class='wishlist-btn'><i class='flaticon-heart'></i></a>
								</div>
							</div>
							<div class='pi-text'>
								<h6>$35,00</h6>
								<p>Flamboyant Pink Top </p>
							</div>
						</div>
						<div class='product-item'>
							<div class='pi-pic'>
								<img src='./img/product/4.jpg' alt=''>
								<div class='pi-links'>
									<a href='#' class='add-card'><i class='flaticon-bag'></i><span>+ CARRINHO</span></a>
									<a href='#' class='wishlist-btn'><i class='flaticon-heart'></i></a>
								</div>
							</div>
							<div class='pi-text'>
								<h6>$35,00</h6>
								<p>Flamboyant Pink Top </p>
							</div>
						</div>
						<div class='product-item'>
							<div class='pi-pic'>
								<img src='./img/product/6.jpg' alt=''>
								<div class='pi-links'>
									<a href='#' class='add-card'><i class='flaticon-bag'></i><span>+ CARRINHO</span></a>
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

				<div class='col-lg-1 order-2 order-lg-3'></div>

				<div class='col-lg-3 order-2 order-lg-4'>
					<div class='section-title'>
						<h2>NOTÍCIAS</h2>
					</div>
					<div class='filter-widget'>
						<div class='price-range-wrap'>
							<h2 class='fw-title-pink'>COVID-19</h2>
							Por causa da pandemia, estaremos restringindo o número de clientes por horário para evitar aglomerações e nos manter seguros.
						</div>
					</div>
					<div class='filter-widget mb-0'>
						<div class='price-range-wrap'>
							<h2 class='fw-title-pink'>Feriado nacional</h2>
							Estaremos funcionando normalmente durante o feriado. Agende eu horário!
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- queridinhos da semana / novidades section end -->

	
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

	</body>
</html>
