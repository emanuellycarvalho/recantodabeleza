<?php 
    function menu($page){
        
        echo "<!-- Page Preloder -->
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
                                    <img src='img/logo2.png' alt=''>
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
                                        <img src='img/icons/user.png' alt=''>
                                        <a href='login.php'>Entre ou Cadastre-se</a>
                                    </div>
                                    <div class='up-item'>
                                        <div class='shopping-card'>
                                            <img src='img/icons/cart.png' alt=''>
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
                    <div class='container'>
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
            <!-- Header section end -->";
    }
?>