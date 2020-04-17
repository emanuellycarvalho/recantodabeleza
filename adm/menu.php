<?php 
    function menu($page){
        echo "<!-- Page Preloder -->
            <section class='footer-section'>
                <div class='container'>
                    <div id='preloder'>
                        <div class='loader'></div>
                    </div>
                    <div class='footer-logo text-center'>
                        <a href='index.php'><img src='../img/logo-light.png' alt=''></a>
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
                                    <li><a href='#'>Fornecedores</a></li>
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
                        <div class='col-md-8 p-0 feature'>
                            <div class='feature-inner'>
                                <h2>" . $page . "</h2>
                            </div>
                        </div>
                        <div class='col-md-4 p-0 feature'>
                            <div class='feature-inner'>
                                <h2>Não se esqueça do logoff</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Page info end -->";
    }
?>