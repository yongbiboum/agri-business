<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Fruit Shop is new Html theme that we have designed to help you transform your store into a beautiful online showroom. This is a fully responsive Html theme, with multiple versions for homepage and multiple templates for sub pages as well" />
    <meta name="keywords" content="Fruit,7uptheme" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name='revisit-after' content='1 days' />
    @yield('aimeos_header')
    <title>Agribusiness | Marché</title>
@yield('aimeos_styles')
<!-- <link rel="stylesheet" type="text/css" href="css/rtl.css" media="all"/> -->
</head>
<body class="preload">
<div class="wrap">
    <header id="header">
        <div class="header">
            <div class="top-header2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 hidden-xs">
                            <ul class="currency-language list-inline-block pull-left">
                                <li>
                                    <div class="language-box">
                                        <a href="#" class="language-current"><img src="/packages/assets/images/icon/flag-fr.png" alt=""><span>Français</span></a>
                                        <ul class="language-list list-none">
                                            <li><a href="#"><img src="/packages/assets/images/icon/flag-fr.png" alt=""><span>Français</span></a></li>
                                            <li><a href="#"><img src="/packages/assets/images/icon/flag-en.png" alt=""><span>English</span></a></li>
                                            <li><a href="#"><img src="/packages/assets/images/icon/flag-gm.png" alt=""><span>Deutsch</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="currency-box">
                                        <a href="#" class="currency-current"><span>Fcfa</span></a>
                                        <ul class="currency-list list-none">
                                            <li><a href="#"><span class="currency-index">€</span>EUR</a></li>
                                            <li><a href="#"><span class="currency-index">¥</span>JPY</a></li>
                                            <li><a href="#"><span class="currency-index">$</span>USD</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <ul class="info-account list-inline-block pull-right">
                                @if (session('status')):
                                <li><a href="#"><span class="color"><i class="fa fa-user-o"></i></span>Mon Compte</a></li>
                                @else :
                                <li><a href="/register"><span class="color"><i class="fa fa-key"></i></span>Connexion</a></li>
                                <li><a href="/login"><span class="color"><i class="fa fa-check-circle-o"></i></span>Inscription</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Header -->
            <div class="main-header">
                <div class="container">
                    <div class="row">
                        @yield('aimeos_stage')
                    </div>
                </div>
            </div>
            <!-- End Main Header -->
            <div class="nav-header bg-white header-ontop">
                <div class="container">
                    <nav class="main-nav main-nav1">
                        @yield('aimeos_nav')
                        <a href="#" class="toggle-mobile-menu"><span></span></a>
                    </nav>
                </div>
            </div>
            <!-- End Nav Header -->
        </div>
    </header>
    <section id="content">
        <div class="container">
            @yield('aimeos_slide')
            <div class="content-shop">
                <div class="row">
                    @yield('aimeos_left_side')
                    @yield('aimeos_body')
                    @yield('aimeos_aside')
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    @yield('aimeos_footer')
</div>
@yield('aimeos_scripts')
</body>
