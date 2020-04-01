<?php 

    function menu($page){
        echo "<!-- Page Preloder -->
            <section class='footer-section'>
                <div class='container'>
                    <div id='preloder'>
                        <div class='loader'></div>
                    </div>
                    <div class='footer-logo text-center'>
                        <a href='index.html'><img src='img/logo-light.png' alt=''></a>
                    </div>
                    <!-- Header section -->
                    <header class='header-section'>
                        <nav class='main-navbar'>
                            <div class='container'>
                                <!-- menu -->
                                <ul class='main-menu'>
                                    <li><a href='index.php'>Home</a></li>
                                    <li><a href='#'>Women</a></li>
                                    <li><a href='#'>Men</a></li>
                                    <li><a href='#'>Jewelry
                                        <span class='new'>New</span>
                                    </a></li>
                                    <li><a href='#'>Shoes</a>
                                        <ul class='sub-menu'>
                                            <li><a href='#'>Sneakers</a></li>
                                            <li><a href='#'>Sandals</a></li>
                                            <li><a href='#'>Formal Shoes</a></li>
                                            <li><a href='#'>Boots</a></li>
                                            <li><a href='#'>Flip Flops</a></li>
                                        </ul>
                                    </li>
                                    <li><a href='#'>Pages</a>
                                        <ul class='sub-menu'>
                                            <li><a href='./product.html'>Product Page</a></li>
                                            <li><a href='./category.html'>Category Page</a></li>
                                            <li><a href='./cart.html'>Cart Page</a></li>
                                            <li><a href='./checkout.html'>Checkout Page</a></li>
                                            <li><a href='./contact.html'>Contact Page</a></li>
                                        </ul>
                                    </li>
                                    <li><a href='#'>Blog</a></li>
                                </ul>
                            </div>
                        </nav>
                    </header>
                </div>
            </section>
            <!-- Header section end -->";
    }
?>