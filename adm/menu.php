<?php 
    function menu($page, $icon){
        echo "<!-- Page Preloder -->
            <section class='footer-section'>
                <div class='container'>
                    <div id='preloder'>
                        <div class='loader'></div>
                    </div>
                    <div class='footer-logo text-center'>
                        <a href='index.php'><img src='../img/logo-light.png' alt=''></a>                    
                        <div class='col-md-2 offset-md-11'>
                            <a href='' title='Seu perfil'><img src='../img/icons/user-light.png' alt=''></a>
                            <a href='' title='Sair'><img src='../img/icons/logoff-light.png' alt=''></a>
                            <p class='light'>Fulano de tal - Secretário</p>
                        </div>
                    </div>
                    <!-- Header section -->
                    <header class='header-section'>
                        <nav class='main-navbar'>
                            <div class='container text-center'>
                                <!-- menu -->
                                <ul class='main-menu'>
                                    <li><a href='index.php'>Home</a></li>
                                    <li><a href='#'>Produtos</a></li>
                                    <li><a href='#'>Serviços</a></li>
                                    <li><a href='clientes.php'>Clientes</a></li>
                                    <li><a href='funcionarios.php'>Funcionários</a></li>
                                    <li><a href='fornecedores.php'>Fornecedores</a></li>
                                    <li><a href='#'>Relatorios</a></li>
                                    <li><a href='#'>Outros</a></li>
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
                                " . icon($icon) . "
                                <h2> ". $page . " </h2>  
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Page info end -->";
    }

    function icon ($i){
        if ($i != null){
            return "<img src='../img/icons/" . $i  . ".png' width='35px'>";
        }
    }
?>