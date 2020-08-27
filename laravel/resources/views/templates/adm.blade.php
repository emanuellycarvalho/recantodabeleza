
<!DOCTYPE html>
<html lang='zxx'>
<head>
	<title>@yield('title')</title>
	<meta charset='UTF-8'> 
	<meta name='description' content=' Divisima | eCommerce Template'>
	<meta name='keywords' content='divisima, eCommerce, creative, html'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<!-- Favicon -->
	<link href='{{url("/img/faviconAdm.png")}}' rel='shortcut icon'/>

	<!-- Google Font -->
	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i' rel='stylesheet'>

    <!-- Fullcalendar -->
    <link href='{{asset("assets/fullcalendar/lib/main.css")}}' rel='stylesheet' />
    <link href='{{asset("assets/fullcalendar/fullcalendar.css")}}' rel='stylesheet'>

    <!-- Autocomplete -->
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

	<!-- Stylesheets -->
	<link rel='stylesheet' href='{{url("/assets/css/bootstrap.min.css")}}'/>
	<link rel='stylesheet' href='{{url("/assets/css/font-awesome.min.css")}}'/>
	<link rel='stylesheet' href='{{url("/assets/css/flaticon.css")}}'/>
	<link rel='stylesheet' href='{{url("/assets/css/slicknav.min.css")}}'/>
	<link rel='stylesheet' href='{{url("/assets/css/jquery-ui.min.css")}}'/>
	<link rel='stylesheet' href='{{url("/assets/css/owl.carousel.min.css")}}'/>
	<link rel='stylesheet' href='{{url("/assets/css/animate.css")}}'/>
	<link rel='stylesheet' href='{{url("/assets/css/style.css")}}'/> 
	<link rel='stylesheet' href='{{url("/assets/css/theme.default.css")}}'/>

    <!--====== Javascripts & Jquery ======-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src='{{url("/assets/js/jquery-3.2.1.min.js")}}'></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
	<script src='{{url("/assets/js/bootstrap.min.js")}}'></script>
	<script src='{{url("/assets/js/jquery.slicknav.min.js")}}'></script>
	<script src='{{url("/assets/js/owl.carousel.min.js")}}'></script>
	<script src='{{url("/assets/js/jquery.nicescroll.min.js")}}'></script>
	<script src='{{url("/assets/js/jquery.validate.min.js")}}'></script>
	<script src='{{url("/assets/js/jquery.zoom.min.js")}}'></script>
	<script src='{{url("/assets/js/jquery-ui.min.js")}}'></script>
	<script src='{{url("/assets/js/jquery.mask.min.js")}}'></script>
    <script src='{{url("/assets/js/validator.min.js")}}'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script> 
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js'></script>
    <script src='{{url("/assets/js/jquery.quicksearch.js")}}'></script>
    <script src='{{url("/assets/js/jquery.tablesorter.min.js")}}'></script>
    <script src='{{url("/assets/js/moment-with-locales.min.js")}}'></script>
    <script src='{{url("/assets/js/locale-moment_pt-br.js")}}'></script>
	<script src='{{url("/assets/js/main.js")}}'></script>
	<script src='{{url("/assets/js/projeto.js")}}'></script>
	<script src='{{url("/assets/js/validacao.js")}}'></script>
    <script src='{{asset("assets/fullcalendar/script.js")}}'></script>
    

</head>
<body>
    <!-- Page Preloder -->
    <section class='footer-section'>
        <div class='container'>
            <div id='preloder'>
                <div class='loader'></div>
            </div>
            <div class='text-center'>
                <a href='{{url("/adm")}}'><img src='{{url("/img/logo-light.png")}}' alt=''></a>                    
                <div class='col-md-2 offset-md-11'>
                    <a href='#' title='Seu perfil'><img src='{{url("/img/icons/user-light.png")}}' alt=''></a>
                    <a href='#' title='Sair'><img src='{{url("/img/icons/logoff-light.png")}}' alt=''></a>
                    <p class='light'>Fulano de tal - Secretário</p>
                </div>  
            </div>
            <!-- Header section -->
            <header class='header-section'>
                <nav class='main-navbar'>
                    <div class='container text-center'>
                        <!-- menu -->
                        <ul class='main-menu'>
                            <li><a href='{{url("/adm")}}'>Home</a></li>
                            <li><a href='#' class='none'>Atendimentos</a> 
                                <ul class='sub-menu'>
                                    <li><a href='{{url("adm/scheduling/create")}}'>Agendar</a></li>
                                    <li><a href='{{url("adm/attendance/create")}}'>Registrar</a></li>
                                </ul>
                            </li>
                            <li><a href='#' class='none'>Pagamentos</a> 
                                <ul class='sub-menu'>
                                    <li><a href='{{url("adm/registerPayment")}}'>de Clientes</a></li>
                                    <li><a href='#'>de Despesas</a></li>
                                </ul>
                            </li>
                            <li><a href='#' class='none'>Gerenciar</a> 
                                <ul class='sub-menu'>
                                    <li><a href='{{url("adm/customer")}}'>Clientes</a></li>
                                    <li><a href='{{url("adm/service")}}'>Serviços</a></li>
                                    <li><a href='{{url("adm/product")}}'>Produtos</a></li>
                                    <li><a href='{{url("/adm/employee")}}'>Funcionários</a></li>
                                    <li><a href='{{url("/adm/supplier")}}'>Fornecedores</a></li>
                                </ul>
                            </li>
                            <li><a href='#'>Relatorios</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
        </div>
    </section>
    <!-- Header section end -->
    
    <!-- Page info -->
    <section class='features-section'>
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-0 p-0 feature'></div>
                <div class='col-md-12 p-0 feature'>
                    <div class='feature-inner'>
                             @yield('icon')
                             <img scr='{{url("/img/blog-thumbs/line.png")}}' width='10px'>
                        <h2> @yield('title') </h2>  
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page info end -->

    @yield('content')

    <script>
        //DELETE
        (function(win, doc){
        'use strict';

        if (doc.querySelector('.js-del')){
            let btn = doc.querySelectorAll('.js-del');
            for (let i = 0; i < btn.length; i++){
            btn[i].addEventListener('click', confirmDel, false);
            }
        }
  
        function confirmDel(event){
            event.preventDefault();
            $('#confirmModal').modal({
            show: true,
            });
            //console.log(event.target.parentNode.href);
            let token = doc.getElementsByName('_token')[0].value;
            $('#del').on('click', function () {
                let href = $(this).href;
                console.log(href);
                let ajax = new XMLHttpRequest();
                ajax.open('DELETE', event.target.parentNode.href);
                ajax.setRequestHeader('X-CSRF-TOKEN', token);
                ajax.onreadystatechange = function(){
                if (ajax.readyState === 4 && ajax.status === 200){
                    setTimeout(function(){ 
                    $('#success').hide();  
                    }, 5000);
                }
                win.location.href= '@yield("del")';
                }
                ajax.send();
            
            });
        }
        
        })(window, document);
    </script>

</body>
</html>

