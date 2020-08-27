
<!DOCTYPE html>
<html lang='zxx'>
<head>
	<title>@yield('title');</title>
	<meta charset='UTF-8'>
	<meta name='description' content=' Divisima | eCommerce Template'>
	<meta name='keywords' content='divisima, eCommerce, creative, html'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<!-- Favicon -->
	<link href='{{url("/img/favicon.png")}}' rel='shortcut icon'/>

	<!-- Google Font -->
	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i' rel='stylesheet'>

 
	<!-- Stylesheets -->
	<link rel='stylesheet' href='{{url("/assets/css/bootstrap.min.css")}}'/>
	<link rel='stylesheet' href='{{url("/assets/css/font-awesome.min.css")}}'/>
	<link rel='stylesheet' href='{{url("/assets/css/flaticon.css")}}'/>
	<link rel='stylesheet' href='{{url("/assets/css/slicknav.min.css")}}'/>
	<link rel='stylesheet' href='{{url("/assets/css/jquery-ui.min.css")}}'/>
	<link rel='stylesheet' href='{{url("/assets/css/owl.carousel.min.css")}}'/>
	<link rel='stylesheet' href='{{url("/assets/css/animate.css")}}'/>
	<link rel='stylesheet' href='{{url("/assets/css/style.css")}}'/>

	<!-- Template's Javascripts & Jquery -->
	<script src='{{url("/assets/js/jquery-3.2.1.min.js")}}'></script>
	<script src='{{url("/assets/js/bootstrap.min.js")}}'></script>
	<script src='{{url("/assets/js/jquery.slicknav.min.js")}}'></script>
	<script src='{{url("/assets/js/owl.carousel.min.js")}}'></script>
	<script src='{{url("/assets/js/jquery.nicescroll.min.js")}}'></script>
	<script src='{{url("/assets/js/jquery.zoom.min.js")}}'></script>
	<script src='{{url("/assets/js/jquery-ui.min.js")}}'></script>
	<script src='{{url("/assets/js/main.js")}}'></script>
	<!-- End Template's Javascripts & Jquery -->


</head>
<body>
    <!-- Page Preloder -->
    <div id='preloder'>
        <div class='loader'></div>
    </div>
    
    <!-- Header section -->
    <header class='header-section'>
        <div class='header-top'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-2 text-center text-lg-left'>
                        <!-- logo -->
                        <a href='./index.php' class='site-logo'>
                            <img src='{{url("/img/logo2.png")}}' alt=''>
                        </a>
                    </div>
                    <div class='col-xl-6 col-lg-5'>
                        <form class='header-search-form'>
                            <input type='text' placeholder='Encontre no site'>
                            <button><i class='flaticon-search'></i></button>
                        </form>
                    </div>
                    <div class='col-xl-4 col-lg-5'>
                        <div class='user-panel'>
                            <div class='up-item'>
                                <img src='{{url("/img/icons/user.png")}}' alt=''>
                                <a href='{{url("client/create")}}'>Entre ou Cadastre-se</a>
                            </div>
                            <div class='up-item'>
                                <div class='shopping-card'>
                                    <img src='{{url("/img/icons/cart.png")}}' alt=''>
                                    <span>0</span>
                                </div>
                                <a href='carrinho.php'>Carrinho de compras</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class='main-navbar'>
            <div class='container text-center'>
                <!-- menu -->
                <ul class='main-menu'>
                    <li :active><a href='index.php'>Home</a></li>
                    <li><a href='#'>Produtos</a>
                        <ul class='sub-menu'>
                            <li><a href='#'>Kit capilar</a></li>
                            <li><a href='#'>Cremes de massagem</a></li>
                            <li><a href='#'>Cuidados para unhas</a></li>
                            <li><a href='#'>Cuidados para o rosto</a></li>
                        </ul>
                    </li>
                    <li><a href='#'>Serviços</a>
                        <ul class='sub-menu'>
                            <li><a href='#'>Unhas</a></li>
                            <li><a href='#'>Cabelos</a></li>
                            <li><a href='#'>Estética facial</a></li>
                            <li><a href='#'>Estética corporal</a></li>
                        </ul>
                    </li>
                    <li><a href='#'>Novidades
                        <span class='new'>New</span>
                    </a></li>
                    <li><a href='#'>Sorteios</a></li>
                    <li><a href='#'>Nossos profissionais</a>
                        <ul class='sub-menu'>
                            <li><a href='#'>Fulano</a></li>
                            <li><a href='#'>Beltrano</a></li>
                            <li><a href='#'>Ciclano</a></li>
                        </ul>
                    </li>
                    <li><a href='#'>Blog</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Header section end -->

    @yield('content');

    <!-- Footer section -->
    <section class='footer-section'>
		<div class='container'>
			<div class='footer-logo text-center'>
				<a href='index.html'><img src='{{url("/img/logo-light.png")}}' alt=''></a>
			</div>
			<div class='row'>
				<div class='col-lg-3 col-sm-6'>
					<div class='footer-widget about-widget'>
						<h2>SOBRE NÓS</h2>
						<p>Este é um sistema desenvolvido para fins didáticos por dois alunos do terceiro ano do 
						curso de Desenvolvimento de Sistemas sob a orientação da professora Deisymar Botega.</p>
						<img src='{{url("/img/cards.png")}}' alt=''>
					</div>
				</div>
				<div class='col-lg-3 col-sm-6'>
					<div class='footer-widget about-widget'>
						<h2>MAIS</h2>
						<ul>
							<li><a href=''>Sobre nós</a></li>
							<li><a href=''>Horários</a></li>
							<li><a href=''>Pedidos</a></li>
							<li><a href=''>Produtos</a></li>
						</ul>
						<ul>
							<li><a href=''>Parceiros</a></li>
							<li><a href=''>Contato</a></li>
							<li><a href=''>Trabalhe conosco</a></li>
							<li><a href=''>Localize no mapa</a></li>
						</ul>
					</div>
				</div>
				<div class='col-lg-3 col-sm-6'>
					<div class='footer-widget about-widget'>
						<h2>PERGUNTAS FREQUENTES</h2>
						<div class='fw-latest-post-widget'>
							<div class='lp-item'>
								<div class='lp-thumb set-bg' data-setbg='{{url("/img/blog-thumbs/1.png")}}'></div>
								<div class='lp-content'>
									<h6>onde envio meu currículo?</h6>
									<span>21 Out, 2018</span>
									<a href='#' class='readmore'>Ler Mais</a>
								</div>
							</div>
							<div class='lp-item'>
								<div class='lp-thumb set-bg' data-setbg='{{url("/img/blog-thumbs/2.png")}}'></div>
								<div class='lp-content'>
									<h6>onde localizo meu pedido?</h6>
									<span>31 jan, 2019</span>
									<a href='#' class='readmore'>Ler Mais</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='col-lg-3 col-sm-6'>
					<div class='footer-widget contact-widget'>
						<h2>CONTATO</h2>
						<div class='con-info'>
							<span>C.</span>
							<p>Recanto da Beleza</p>
						</div>
						<div class='con-info'>
							<span>E.</span>
							<p>R. Dezenove de Novembro, 121 - Centro, Timóteo - MG</p>
						</div>
						<div class='con-info'>
							<span>T.</span>
							<p>+55 31 3842 3245</p>
						</div>
						<div class='con-info'>
							<span>C.</span>
							<p>+55 31 97953 3245</p>
						</div>
						<div class='con-info'>
							<span>E.</span>
							<p>recantodabeleza@contato.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='social-links-warp'>
			<div class='container'>
				<div class='social-links'>
					<a href='' class='instagram'><i class='fa fa-instagram'></i><span>instagram</span></a>
					<a href='' class='google-plus'><i class='fa fa-google-plus'></i><span>g+plus</span></a>
					<a href='' class='pinterest'><i class='fa fa-pinterest'></i><span>pinterest</span></a>
					<a href='' class='facebook'><i class='fa fa-facebook'></i><span>facebook</span></a>
					<a href='' class='twitter'><i class='fa fa-twitter'></i><span>twitter</span></a>
					<a href='' class='youtube'><i class='fa fa-youtube'></i><span>youtube</span></a>
					<a href='' class='tumblr'><i class='fa fa-tumblr-square'></i><span>tumblr</span></a>
				</div>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
            <p class='text-white text-center mt-5'>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class='fa fa-heart-o' aria-hidden='true'></i> by <a href='https://colorlib.com' target='_blank'>Colorlib</a></p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			</div>
		</div>
	</section>
	<!-- Footer section end -->


</body>
</html>