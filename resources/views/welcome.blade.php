<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Fruit Shop is new Html theme that we have designed to help you transform your store into a beautiful online showroom. This is a fully responsive Html theme, with multiple versions for homepage and multiple templates for sub pages as well" />
    <meta name="keywords" content="Fruit,7uptheme" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name='revisit-after' content='1 days' />
    <title>Agri Business | Accueil</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/libs/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/libs/ionicons.min.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/libs/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/libs/bootstrap-theme.min.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/libs/jquery.fancybox.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/libs/jquery-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/libs/owl.carousel.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/libs/owl.transitions.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/libs/jquery.mCustomScrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/libs/owl.theme.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/libs/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/libs/animate.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/libs/hover.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/color.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/theme.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/responsive.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="/packages/assets/css/browser.css" media="all"/>
    <!-- <link rel="stylesheet" type="text/css" href="/packages/assets/css/rtl.css" media="all"/> -->
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
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <form class="search-form pull-left">
                                <input onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" value="Recherche" type="text">
                                <input type="submit" value="" />
                            </form>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <div class="logo logo1">
                                <h1 class="hidden">Agri business</h1>
                                <a href="index.html"><img class="image" src="/packages/assets/images/home/home2/agri.png" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12">

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Header -->
            <div class="nav-header bg-white header-ontop">
                <div class="container">
                    <nav class="main-nav main-nav1">
                        <ul>
                            <li class="current-menu-item ">
                                <a href="#">Accueil</a>
                            </li>
                            <li><a href="/list">Marché</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">A propos</a></li>
                            <li><a href="#">Contacts</a></li>
                            <li><a href="#">Comment ça marche ?</a></li>
                        </ul>
                        <a href="#" class="toggle-mobile-menu"><span></span></a>
                    </nav>
                </div>
            </div>
            <!-- End Nav Header -->
        </div>
    </header>
    <!-- End Header -->
    <section id="content">
        <div class="banner-slider banner-slider1 bg-slider parallax-slider">
            <div class="wrap-item" data-transition="fade" data-autoplay="true" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1]]">
                <div class="item-slider item-slider1">
                    <div class="banner-thumb"><a href="#"><img src="/packages/assets/images/home/home3/slide2.jpg" alt="" /></a></div>
                    <div class="banner-info animated" data-animated="bounceIn">
                        <div class="text-center white text-uppercase">
                            <h3 class="title30">Au coeur de l'agribusiness africain</h3>
                            <h2 class="title120 font-bold animated" data-animated="flash"></h2>
                            <a href="#" class="btn-arrow white" style="background-color: green">Je suis un Producteur</a>
                            <a href="#" class="btn-arrow white" style="background-color: red">Je suis un Client</a>
                        </div>
                    </div>
                </div>
                <div class="item-slider item-slider1">
                    <div class="banner-thumb"><a href="#"><img src="/packages/assets/images/home/home3/slide1.jpg" alt="" /></a></div>
                    <div class="banner-info animated" data-animated="bounceIn">
                        <div class="text-center white text-uppercase">
                            <h3 class="title30">Au coeur de l'agribusiness africain</h3>
                            <h2 class="title120 font-bold animated" data-animated="flash"></h2>
                            <a href="#" class="btn-arrow white" style="background-color: green">Je suis un Producteur</a>
                            <a href="#" class="btn-arrow white" style="background-color: red">Je suis un Client</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner -->
        <div class="container">
            <h2 class="title30 font-bold title-box1 text-center">Agribusiness ... ?</h2>

            <div class="item-client">
                <div class="client-info" id="home-intro">
                    <p class="desc paci-font color">Plateforme intégrée de transit de produits agricoles entre acteurs du secteur primaire en afrique </p>
                </div>
            </div>
            <br/>
            <hr/>
        </div>
        <div class="container">
            <div class="list-service1">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="item-service1 table">
                            <div class="service-icon">
                                <a href="#"><i class="fa fa-bus"></i></a>
                            </div>
                            <div class="service-info">
                                <h3 class="title18"><a href="#" class="black">Livraison et logistique Assurée</a></h3>
                                <p class="desc">Quelque soit le hangar de reception des produits </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="item-service1 table">
                            <div class="service-icon">
                                <a href="#"><i class="fa fa-refresh"></i></a>
                            </div>
                            <div class="service-info">
                                <h3 class="title18"><a href="#" class="black">Garantie sur investissements</a></h3>
                                <p class="desc">100% de remboursement en cas de non satisfaction </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="item-service1 table">
                            <div class="service-icon">
                                <a href="#"><i class="fa fa-volume-control-phone"></i></a>
                            </div>
                            <div class="service-info">
                                <h3 class="title18"><a href="#" class="black">Support 24.7</a></h3>
                                <p class="desc">Contact Center disponible à tout moment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End List Service -->
               <div class="choise-intro3 text-center">
                    <h2 class="title30 font-bold">Qui Sont Concernés Par La Plateforme  ?</h2>
                    <p class="color2">Les acteurs qui interviennent dans la plateforme ...</p>
                </div>
                <div class="fruit-farmers">
                    <div class="container">
                        <div class="farm-slider banner-slider">
                            <div class="wrap-item group-navi" data-transition="fade" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1]]">
                                <div class="item-farm item-slider">
                                    <div class="farm-infos animated" data-animated="bounceInLeft">
                                        <h2 class="title18"><b><a href="#" class="black">CLIENTS - AGRO INDUSTRIES - GROSSISTES - REVENDEURS</a></b></h2>
                                        <div class="farm-cat">
                                            <a href="#" class="silver">A LA QUÊTE DE PRODUITS</a>
                                        </div>
                                        <p class="desc">Meet the maker of our bread – our fabulous baker boy alberto Trombin.
                                            He creates superb bread in their Melbourne-based bread-quarters.</p>
                                        <p class="desc"> Lorem ipsum dolor sit amet consectur, don magnet i accetior sum it refectur </p>
                                        <p class="desc"> </p>
                                        <br ><br >
                                        <div class="product-extra-link">
                                            <a href="#" class="addcart-link">En savoir plus</a>
                                        </div>
                                    </div>
                                    <div class="farm-thumbs banner-adv zoom-image fade-out-in animated" data-animated="bounceInLeft">
                                        <a href="#" class="adv-thumb-link"><img src="/packages/assets/images/home/home2/farm11.jpg" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fruit-farmer">
                    <div class="container">
                        <div class="farm-slider banner-slider">
                            <div class="wrap-item group-navi" data-transition="fade" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1]]">
                                <div class="item-farm item-slider">

                                    <div class="farm-info animated" data-animated="bounceInLeft">
                                        <h2 class="title18"><b><a href="#" class="black">AGRICULTEURS RURAUX - ENTREPRENEURS - INDUSTRIELS</a></b></h2>
                                        <div class="farm-cat">
                                            <a href="#" class="silver">A LA QUÊTE DES GRANDS MARCHES D'ECOULEMENT</a>
                                        </div>
                                        <p class="desc">Meet the maker of our bread – our fabulous baker boy alberto Trombin.
                                            He creates superb bread in their Melbourne-based bread-quarters.</p>
                                        <p class="desc"> Lorem ipsum dolor sit amet consectur, don magnet i accetior sum it refectur in dolor
                                        un seculum
                                        </p>
                                        <p class="desc"> </p>
                                        <br ><br >
                                        <div class="product-extra-link">
                                            <a href="#" class="addcart-link">Devenir producteur</a>
                                        </div>
                                    </div>
                                    <div class="farm-thumb banner-adv zoom-image fade-out-in animated" data-animated="bounceInRight">
                                        <a href="#" class="adv-thumb-link"><img src="/packages/assets/images/home/home2/fille.png" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End List Adv -->

            <!-- End Product Best Sale -->
       <div class="container"> <div class="product-price-off">
            <div class="container">
                <h2 class="title30 text-center font-bold">Catégorie de produits</h2>
                <ul class="list-inline-block text-center title-tab-icon3">
                    <li><a href="#pr1" data-toggle="tab"><img class="wobble-horizontal" src="/packages/assets/images/home/home1/fru1.png" alt=""><span>PROUITS SECS</span></a></li>
                    <li><a href="#pr2" data-toggle="tab"><img class="wobble-horizontal" src="/packages/assets/images/home/home1/fru2.png" alt=""><span>FRUITS</span></a></li>
                    <li class="active"><a href="#pr1" data-toggle="tab"><img class="wobble-horizontal" src="/packages/assets/images/home/home1/fru4.png" alt=""><span>LEGUMES</span></a></li>
                    <li><a href="#pr2" data-toggle="tab"><img class="wobble-horizontal" src="/packages/assets/images/home/home1/fru5.png" alt=""><span>TUBERCULES</span></a></li>
                </ul>
                <div class="tab-content">
                    <div id="pr1" class="tab-pane active">
                        <div class="list-price-off clearfix">
                            <div class="item-product-price table">
                                <div class="product-thumb">
                                    <a href="detail.html" class="product-thumb-link zoom-thumb">
                                        <img src="/packages/assets/images/product/fruit_12.jpg" alt="">
                                    </a>
                                    <a href="quick-view.html" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="detail.html">Conconut Chips</a><strong class="color pull-right">$20/1 Pound</strong></h3>
                                    <p class="desc">Organic food consumption is rapidly increasing. The heightened interest in the global environment and a willingness to look</p>
                                </div>
                            </div>
                            <div class="item-product-price table">
                                <div class="product-thumb">
                                    <a href="detail.html" class="product-thumb-link zoom-thumb">
                                        <img src="/packages/assets/images/product/fruit_01.jpg" alt="">
                                    </a>
                                    <a href="quick-view.html" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="detail.html">Apetito Pure Fruit Juice</a><strong class="color pull-right">$48/1 Pound</strong></h3>
                                    <p class="desc">Organic food consumption is rapidly increasing. The heightened interest in the global environment and a willingness to look</p>
                                </div>
                            </div>
                            <div class="item-product-price table">
                                <div class="product-thumb">
                                    <a href="detail.html" class="product-thumb-link zoom-thumb">
                                        <img src="/packages/assets/images/product/fruit_25.jpg" alt="">
                                    </a>
                                    <a href="quick-view.html" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="detail.html">Asian Banana</a><strong class="color pull-right">$53/1 Pound</strong></h3>
                                    <p class="desc">Organic food consumption is rapidly increasing. The heightened interest in the global environment and a willingness to look</p>
                                </div>
                            </div>
                            <div class="item-product-price table">
                                <div class="product-thumb">
                                    <a href="detail.html" class="product-thumb-link zoom-thumb">
                                        <img src="/packages/assets/images/product/fruit_21.jpg" alt="">
                                    </a>
                                    <a href="quick-view.html" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="detail.html">Fresh Meal Kit</a><strong class="color pull-right">$35/1 Pound</strong></h3>
                                    <p class="desc">Organic food consumption is rapidly increasing. The heightened interest in the global environment and a willingness to look</p>
                                </div>
                            </div>
                            <div class="item-product-price table">
                                <div class="product-thumb">
                                    <a href="detail.html" class="product-thumb-link zoom-thumb">
                                        <img src="/packages/assets/images/product/fruit_11.jpg" alt="">
                                    </a>
                                    <a href="quick-view.html" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="detail.html">Conconut Chips</a><strong class="color pull-right">$27/1 Pound</strong></h3>
                                    <p class="desc">Organic food consumption is rapidly increasing. The heightened interest in the global environment and a willingness to look</p>
                                </div>
                            </div>
                            <div class="item-product-price table">
                                <div class="product-thumb">
                                    <a href="detail.html" class="product-thumb-link zoom-thumb">
                                        <img src="/packages/assets/images/product/fruit_24.jpg" alt="">
                                    </a>
                                    <a href="quick-view.html" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="detail.html">Aurore Grape</a><strong class="color pull-right">$29/1 Pound</strong></h3>
                                    <p class="desc">Organic food consumption is rapidly increasing. The heightened interest in the global environment and a willingness to look</p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn-arrow color">Voir Tous</a>
                        </div>
                    </div>
                    <!-- ENd Tab -->

                    <div id="pr2" class="tab-pane">
                        <div class="list-price-off">
                            <div class="item-product-price table">
                                <div class="product-thumb">
                                    <a href="detail.html" class="product-thumb-link zoom-thumb">
                                        <img src="/packages/assets/images/product/fruit_02.jpg" alt="">
                                    </a>
                                    <a href="quick-view.html" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="detail.html">Conconut Chips</a><strong class="color pull-right">$20/1 Pound</strong></h3>
                                    <p class="desc">Organic food consumption is rapidly increasing. The heightened interest in the global environment and a willingness to look</p>
                                </div>
                            </div>
                            <div class="item-product-price table">
                                <div class="product-thumb">
                                    <a href="detail.html" class="product-thumb-link zoom-thumb">
                                        <img src="/packages/assets/images/product/fruit_03.jpg" alt="">
                                    </a>
                                    <a href="quick-view.html" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="detail.html">Apetito Pure Fruit Juice</a><strong class="color pull-right">$48/1 Pound</strong></h3>
                                    <p class="desc">Organic food consumption is rapidly increasing. The heightened interest in the global environment and a willingness to look</p>
                                </div>
                            </div>
                            <div class="item-product-price table">
                                <div class="product-thumb">
                                    <a href="detail.html" class="product-thumb-link zoom-thumb">
                                        <img src="/packages/assets/images/product/fruit_25.jpg" alt="">
                                    </a>
                                    <a href="quick-view.html" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="detail.html">Asian Banana</a><strong class="color pull-right">$53/1 Pound</strong></h3>
                                    <p class="desc">Organic food consumption is rapidly increasing. The heightened interest in the global environment and a willingness to look</p>
                                </div>
                            </div>
                            <div class="item-product-price table">
                                <div class="product-thumb">
                                    <a href="detail.html" class="product-thumb-link zoom-thumb">
                                        <img src="/packages/assets/images/product/fruit_04.jpg" alt="">
                                    </a>
                                    <a href="quick-view.html" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="detail.html">Fresh Meal Kit</a><strong class="color pull-right">$35/1 Pound</strong></h3>
                                    <p class="desc">Organic food consumption is rapidly increasing. The heightened interest in the global environment and a willingness to look</p>
                                </div>
                            </div>
                            <div class="item-product-price table">
                                <div class="product-thumb">
                                    <a href="detail.html" class="product-thumb-link zoom-thumb">
                                        <img src="/packages/assets/images/product/fruit_05.jpg" alt="">
                                    </a>
                                    <a href="quick-view.html" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="detail.html">Conconut Chips</a><strong class="color pull-right">$27/1 Pound</strong></h3>
                                    <p class="desc">Organic food consumption is rapidly increasing. The heightened interest in the global environment and a willingness to look</p>
                                </div>
                            </div>
                            <div class="item-product-price table">
                                <div class="product-thumb">
                                    <a href="detail.html" class="product-thumb-link zoom-thumb">
                                        <img src="/packages/assets/images/product/fruit_06.jpg" alt="">
                                    </a>
                                    <a href="quick-view.html" class="quickview-link fancybox fancybox.iframe"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="detail.html">Aurore Grape</a><strong class="color pull-right">$29/1 Pound</strong></h3>
                                    <p class="desc">Organic food consumption is rapidly increasing. The heightened interest in the global environment and a willingness to look</p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn-arrow color">View All</a>
                        </div>
                    </div>
                    <!-- ENd Tab -->
                </div>
            </div>
        </div>
        <div class="wht-choise3">
            <div class="choise-intro3 text-center">
                <h2 class="title30 font-bold">Pourquoi choisir notre plateforme</h2>
                <p class="color2">Les raisons qui font de nous les meilleurs</p>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="banner-choise8 text-left"><a href="#" class="wobble-horizontal"><img src="/packages/assets/images/home/home2/choise1.png" alt="" /></a></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="choise-policy3">
                        <div class="item-choise3 table">
                            <div class="choise-icon3">
                                <a href="#" class="color"><i class="fa fa-snowflake-o"></i></a>
                            </div>
                            <div class="choise-info3">
                                <h3 class="title18"><a href="#" class="color">100% de produits frais</a></h3>
                                <p class="desc">Nous travaillons avec plus de 50 collectivités agricoles dans chaque région et en tirons le meilleur. </p>
                            </div>
                        </div>
                        <div class="item-choise3 table">
                            <div class="choise-icon3">
                                <a href="#" class="color"><i class="fas fa-truck"></i></a>
                            </div>
                            <div class="choise-info3">
                                <h3 class="title18"><a href="#" class="color">Livraison saine, rapide et assurée</a></h3>
                                <p class="desc">Nous avons developpé un large réseau de distribution et de partage avec un ensemble d'experts dans le conditionnement.</p>
                            </div>
                        </div>
                        <div class="item-choise3 table">
                            <div class="choise-icon3">
                                <a href="#" class="color"><i class="fa fa-trophy"></i></a>
                            </div>
                            <div class="choise-info3">
                                <h3 class="title18"><a href="#" class="color">Une riche expérience et expertise</a></h3>
                                <p class="desc">Nous travaillons avec des promoteurs agricoles et et des collectivités depuis des décennies pour un résultat probant.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="banner-choise8 text-right"><a href="#" class="wobble-horizontal"><img src="/packages/assets/images/home/home2/choise2.png" alt="" /></a></div>
                </div>
            </div>
        </div>
       </div>
        <!-- End Why Choise -->

        <div class="client-say2 text-center box-parallax">
            <div class="container">
                <h2 class="title30 paci-font color">Temoignages</h2>
                <h2 class="title30 text-uppercase font-bold white">Agribussiness</h2>
                <div class="client-slider2">
                    <div class="wrap-item" data-transition="fade" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1]]">
                        <div class="item-client2">
                            <div class="client-thumb">
                                <a href="#" tabindex="0"><img src="/packages/assets/images/home/home1/av1.png" alt=""></a>
                            </div>
                            <div class="client-info">
                                <h3 class="title18"><a href="#" class="color">BOREL NDZOGANG</a></h3>
                                <span class="white">Grossiste marché central</span>
                                <p class="desc white">“La plateforme d'agribusiness me permet d'avoir toujours en stock des produits de choix et m'a permis de booster mon chiffre d'affaire ”</p>
                            </div>
                        </div>
                        <div class="item-client2">
                            <div class="client-thumb">
                                <a href="#" tabindex="0"><img src="/packages/assets/images/home/home1/av2.png" alt=""></a>
                            </div>
                            <div class="client-info">
                                <h3 class="title18"><a href="#" class="color">KEVIN TEGUIA</a></h3>
                                <span class="white">Agro industriel, jus natures</span>
                                <p class="desc white">“Grace à la plateforme j'ai des fruits frais toujours disponible pour la fabrication de mes jus, je suis à l'abris des ruprutres de stock et des frais de l'importation et des grossistes couteux ”</p>
                            </div>
                        </div>
                        <div class="item-client2">
                            <div class="client-thumb">
                                <a href="#" tabindex="0"><img src="/packages/assets/images/home/home1/av3.png" alt=""></a>
                            </div>
                            <div class="client-info">
                                <h3 class="title18"><a href="#" class="color">NYA MARCEL</a></h3>
                                <span class="white">Agriculteur</span>
                                <p class="desc white">“Grace à agribusiness ma famille et moi à muyuka pouvant vivre de notre culture en écoulant facilement et rapidement nos productions vers les grandes villes.”</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="statistic-box">
    <h2 class="title30 font-bold text-center border-bottom">Agribussiness en chiffres</h2>
    <div class="list-statistic">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="item-rotate-number text-center text-uppercase font-bold">
                    <div class="rotate-number numscroller style1">368</div>
                    <h2 class="title14">MOYENNE DE LIVRAISON PAR SEMAINE</h2>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="item-rotate-number text-center text-uppercase font-bold">
                    <div class="rotate-number numscroller style3">1224</div>
                    <h2 class="title14 ">CLIENTS REGULIERS ET SATISFAITS</h2>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="item-rotate-number text-center text-uppercase font-bold">
                    <div class="rotate-number numscroller style2">91</div>
                    <h2 class="title14 ">AGRO INDUSTRIES PARTENAIRES</h2>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="item-rotate-number text-center text-uppercase font-bold">
                    <div class="rotate-number numscroller style1">70</div>
                    <h2 class="title14">EXPERTS AGRONOMES</h2>
                </div>
            </div>
        </div>
    </div>
</div>

        <div class="list-brand">
            <div class="container">
                <h2 class="title30 font-bold text-center">Nos partenaires</h2>
                <p class="color2  text-center">Qui nous soutiennnent dans ce projet</p>
                <div class="brand-slider">
                    <div class="wrap-item" data-pagination="false" data-autoplay="true" data-itemscustom="[[0,2],[480,3],[768,4],[990,5]]">
                        <div class="item-brand">
                            <a href="#" class="pulse-grow"><img src="/packages/assets/images/home/home1/br1.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="#" class="pulse-grow"><img src="/packages/assets/images/home/home1/br2.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="#" class="pulse-grow"><img src="/packages/assets/images/home/home1/br3.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="#" class="pulse-grow"><img src="/packages/assets/images/home/home1/br4.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="#" class="pulse-grow"><img src="/packages/assets/images/home/home1/br5.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="#" class="pulse-grow"><img src="/packages/assets/images/home/home1/br1.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="#" class="pulse-grow"><img src="/packages/assets/images/home/home1/br2.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="#" class="pulse-grow"><img src="/packages/assets/images/home/home1/br3.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="#" class="pulse-grow"><img src="/packages/assets/images/home/home1/br4.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="#" class="pulse-grow"><img src="/packages/assets/images/home/home1/br5.png" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>        <!-- End List Brand -->
<!-- End Client -->
</section>
    <!-- End Content -->
    <footer id="footer">
        <div class="footer2 box-parallax">
            <div class="container">
                <div class="main-footer2">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="footer-box2">
                                <a href="#" class=""><h2 class="title18 font-bold color"> A propos d'agribusiness</h2></a>
                                <p class="desc white">Excellence in quality and service is the hallmark of all operations performed at Fruit. Firmly standing by its business values, Fruit is active in manufacture and sale of textile </p>
                            </div>
                            <div class="footer-box2 payment-method">
                                <a href="" class=""><h2 class="title18 font-bold color">Moyens de paiement</h2></a>
                                <a href="#" class="wobble-top"><img src="/packages/assets/images/icon/pay11.png" alt=""></a>
                                <a href="#" class="wobble-top"><img src="/packages/assets/images/icon/pay31.png" alt=""></a>
                                <a href="#" class="wobble-top"><img src="/packages/assets/images/icon/pay41.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="footer-box2">
                                <h2 class="title18 font-bold color">Adresses </h2>
                                <div class="contact-footer2">
                                    <p class="desc white"><span class="color"><i class="fa fa-map-marker" aria-hidden="true"></i></span>Yaoundé - Cameroun , Nkolfoulou Batiment Noubru holding , Rue 253 </p>
                                    <p class="desc white"><span class="color"><i class="fa fa-phone" aria-hidden="true"></i></span>+237 6 91 77 95 46 Whatsapp disponible.</p>
                                    <p class="desc white"><span class="color"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="#" class="white">agribusiness.email@agri.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="footer-box2">
                                <h2 class="title18 font-bold color">Souscrire à notre courrier </h2>
                                <p class="white">Ne manquez aucune nouveauté</p>
                                <form class="email-form2">
                                    <input onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" value="Entrer e-mail" type="text">
                                    <input type="submit" value="valider">
                                </form>
                            </div>
                            <div class="social-network footer-box2">
                                <h2 class="title18 font-bold color">Réseaux sociaux</h2>
                                <a href="#" class="float-shadow"><img src="/packages/assets/images/icon/icon-fb.png" alt=""></a>
                                <a href="#" class="float-shadow"><img src="/packages/assets/images/icon/icon-tw.png" alt=""></a>
                                <a href="#" class="float-shadow"><img src="/packages/assets/images/icon/icon-pt.png" alt=""></a>
                                <a href="#" class="float-shadow"><img src="/packages/assets/images/icon/icon-ig.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main Footer -->
                <div class="logo-footer2 text-center">
                    <a href="#" class="pulse"><img src="/packages/assets/images/home/home3/agrilogo.png" alt="" /></a>
                </div>
                <div class="bottom-footer2 text-center">
                    <ul class="menu-footer2 list-inline-block">
                        <li><a href="#" class="white">Accueil</a></li>
                        <li><a href="#" class="white">Centre d'assistance</a></li>
                        <li><a href="#" class="white">Termes & Conditions</a></li>
                        <li><a href="#" class="white">Notre blog</a></li>
                        <li><a href="#" class="white">A propos</a></li>
                        <li><a href="#" class="white">Nous contacter</a></li>
                    </ul>
                    <p class="copyright2 desc white">Agribusiness © 2019 . Tous droits réservés.</p>
                    <p class="design2 desc white">Design par <a href="#" class="color">nh-itc.com</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <div class="wishlist-mask">
        <div class="wishlist-popup">
            <span class="popup-icon color"><i class="fa fa-bullhorn" aria-hidden="true"></i></span>
            <p class="wishlist-alert">"Fruit Product" was added to wishlist</p>
            <div class="wishlist-button">
                <a href="#">Continue Shopping (<span class="wishlist-countdown">10</span>)</a>
                <a href="#">Go To Shopping Cart</a>
            </div>
        </div>
    </div>
    <!-- End Wishlist Mask -->
    <a href="#" class="scroll-top round"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
<!--<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_four"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_one"></div>
        </div>
    </div>
</div>
<!-- End Preload -->
</div>
<script type="text/javascript" src="/packages/assets/js/libs/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/packages/assets/js/libs/bootstrap.min.js"></script>
<script type="text/javascript" src="/packages/assets/js/libs/jquery.fancybox.js"></script>
<script type="text/javascript" src="/packages/assets/js/libs/jquery-ui.min.js"></script>
<script type="text/javascript" src="/packages/assets/js/libs/owl.carousel.min.js"></script>
<script type="text/javascript" src="/packages/assets/js/libs/jquery.jcarousellite.min.js"></script>
<script type="text/javascript" src="/packages/assets/js/libs/jquery.elevatezoom.js"></script>
<script type="text/javascript" src="/packages/assets/js/libs/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="/packages/assets/js/libs/slick.js"></script>
<script type="text/javascript" src="/packages/assets/js/libs/popup.js"></script>
<script type="text/javascript" src="/packages/assets/js/libs/timecircles.js"></script>
<script type="text/javascript" src="/packages/assets/js/libs/wow.js"></script>
<script type="text/javascript" src="/packages/assets/js/theme.js"></script>
</body>
</html>
