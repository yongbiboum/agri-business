<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Agribusiness est une plateforme B2B de promotion du secteur agricole au travers de la vente des produits et de l'accompagnement des entrepreneurs agricoles de catégories rurales, industrielle urbains etc." />
    <meta name="keywords" content="Agribusiness,Agri-business, Agriculture, Afrique, Cameroun" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name='revisit-after' content='1 days' />
    <title>Agri Business | Accueil</title>
    @yield('aimeos_styles')
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
                                @if (Auth::user())
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/compte" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span class="color"><i class="fa fa-user-o"></i></span>{{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/compte">
                                           <span class="color"> <i class="fa fa-user-o"></i> Mon compte</span>
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="color">  <i class="fas fa-sign-out-alt"></i> Déconnexion</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                 @else
                                <li><a href="/login"><span class="color"><i class="fa fa-key"></i></span>Connexion</a></li>
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
                                <a href="/"><img class="image" src="/packages/assets/images/home/home2/agri.png" alt="" /></a>
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
                            <li><a href="<?= route('accueil_categorie',["f_param" => "categories"])?>">Nos produits</a></li>
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
                    <div class="banner-thumb">
                        <a href="#"><img src="/packages/assets/images/shop/slide.png" alt="" /></a>
                    </div>
                    <div class="banner-info animated" data-animated="bounceIn">
                        <div class="text-center white text-uppercase">
                            <h3 class="title30" style="color: #66cc33;">Au coeur de l'agribusiness africain</h3>
                            <h2 class="title120 font-bold animated" data-animated="flash"></h2>
                            <a href="#" class="btn-arrow white" style="background-color: green">Je suis un Producteur</a>
                            <a href="<?= route('accueil_categorie',["f_param" => "categories"])?>" class="btn-arrow white" style="background-color: red">Je suis un Client</a>
                        </div>
                    </div>
                </div>
                <div class="item-slider item-slider1">
                    <div class="banner-thumb">
                        <a href="#"><img src="/packages/assets/images/shop/slide01.jpg" alt="" /></a>
                    </div>
                    <div class="banner-info animated" data-animated="bounceIn">
                        <div class="text-center white text-uppercase">
                            <h3 class="title30" style="color: #66cc33;">Pour une agriculture de seconde génération</h3>
                            <h2 class="title120 font-bold animated" data-animated="flash"></h2>
                            <a href="#" class="btn-arrow white" style="background-color: green">Je suis un Producteur</a>
                            <a href="<?= route('accueil_categorie',["f_param" => "categories"])?>" class="btn-arrow white" style="background-color: red">Je suis un Client</a>
                        </div>
                    </div>
                </div>
                <div class="item-slider item-slider1">
                    <div class="banner-thumb"><a href="#"><img src="/packages/assets/images/shop/mais.png" alt="" /></a></div>
                    <div class="banner-info animated" data-animated="bounceIn">
                        <div class="text-center white text-uppercase">
                            <h3 class="title30" style="color: #66cc33;" >Une croissance exponentielle du secteur primaire</h3>
                            <h2 class="title120 font-bold animated" data-animated="flash"></h2>
                            <a href="#" class="btn-arrow white" style="background-color: green">Je suis un Producteur</a>
                            <a href="<?= route('accueil_categorie',["f_param" => "categories"])?>" class="btn-arrow white" style="background-color: red">Je suis un Client</a>
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

            <div class="container">
                <div class="decate-farmer">
                    <h2 class="text-center font-bold title30">Qui Sont Concernés Par La Plateforme  ?</h2>
                    <div class="decate-slider">
                        <div class="wrap-item" data-pagination="false" data-itemscustom="[[0,1],[990,2]]" data-autoplay="false">
                            <div class="item-decate">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="decate-thumb banner-adv zoom-out">
                                            <a href="#" class="adv-thumb-link">
                                                <img src="/packages/assets/images/home/home2/fille.png" alt="" />
                                                <img src="/packages/assets/images/home/home2/fille.png" alt="" />
                                               </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="decate-info">
                                            <h3 class="title18 font-bold"><a href="#">Agriculteurs, entrepreneurs agricoles</a></h3>
                                            <p class="color">En quête de marchés d'écoulement</p>
                                            <p class="desc">Born in Belmont, CA, Kathleen attended UC Riverside where she earned her B.S. </p>
                                            <div class="product-extra-link">
                                                <a href="/login" id="achat" class="addcart-link">Devenir producteur</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-decate">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="decate-thumb banner-adv zoom-out">
                                            <a href="#" class="adv-thumb-link">
                                                <img src="/packages/assets/images/shop/vendeurs.png" alt="" />
                                                <img src="/packages/assets/images/shop/vendeurs.png" alt="" />
                                               </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="decate-info">
                                            <h3 class="title18 font-bold"><a href="#">Agro-industries, revendeurs ...</a></h3>
                                            <p class="color">En quête de produits de qualité à des prix homologués</p>
                                            <p class="desc">Born in Belmont, CA, Kathleen attended UC Riverside where she earned her B.S. </p>
                                            <div class="product-extra-link">
                                                <a href="/list"  id="achat" class="addcart-link">Faire un achat</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-decate">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="decate-thumb banner-adv zoom-out">
                                            <a href="#" class="adv-thumb-link">
                                                <img src="/packages/assets/images/page/farm1-2.jpg" alt="" />
                                                <img src="/packages/assets/images/page/farm1-2.jpg" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="decate-info">
                                            <h3 class="title18 font-bold"><a href="#">Leonel Messi</a></h3>
                                            <p class="color">Chartered Financial Advisor</p>
                                            <p class="desc">Born in Belmont, CA, Kathleen attended UC Riverside where she earned her B.S. </p>
                                            <div class="social-network">
                                                <a href="#" class="float-shadow"><img src="/packages/assets/images/icon/icon-fb.png" alt=""></a>
                                                <a href="#" class="float-shadow"><img src="/packages/assets/images/icon/icon-tw.png" alt=""></a>
                                                <a href="#" class="float-shadow"><img src="/packages/assets/images/icon/icon-pt.png" alt=""></a>
                                                <a href="#" class="float-shadow"><img src="/packages/assets/images/icon/icon-gp.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-decate">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="decate-thumb banner-adv zoom-out">
                                            <a href="#" class="adv-thumb-link">
                                                <img src="/packages/assets/images/page/farm2-2.jpg" alt="" />
                                                <img src="/packages/assets/images/page/farm2-2.jpg" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="decate-info">
                                            <h3 class="title18 font-bold"><a href="#">Ariel Robbel</a></h3>
                                            <p class="color">Chartered Financial Advisor</p>
                                            <p class="desc">Born in Belmont, CA, Kathleen attended UC Riverside where she earned her B.S. </p>
                                            <div class="social-network">
                                                <a href="#" class="float-shadow"><img src="/packages/assets/images/icon/icon-fb.png" alt=""></a>
                                                <a href="#" class="float-shadow"><img src="/packages/assets/images/icon/icon-tw.png" alt=""></a>
                                                <a href="#" class="float-shadow"><img src="/packages/assets/images/icon/icon-pt.png" alt=""></a>
                                                <a href="#" class="float-shadow"><img src="/packages/assets/images/icon/icon-gp.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              </div>
            <!-- End List Adv -->

            <!-- End Product Best Sale -->
       <div class="container">
           <div class="product-price-off">
            <div class="container">
                @yield('aimeos_body')
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
                    <div class="banner-choise8 text-left"><a href="#" class="wobble-horizontal"><img src="/packages/assets/images/homme2.png" alt="" /></a></div>
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
                    <div class="banner-choise8 text-right " align="center"><a href="#" class="wobble-horizontal"><img src="/packages/assets/images/home/home2/choise2.png" alt="" /></a></div>
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
                                <a href="#" tabindex="0"><img src="/packages/assets/images/steve.png" alt=""></a>
                            </div>
                            <div class="client-info">
                                <h3 class="title18"><a href="#" class="color">STEVE YONG</a></h3>
                                <span class="white">Grossiste marché central</span>
                                <p class="desc white">“La plateforme d'agribusiness me permet d'avoir toujours en stock des produits de choix et m'a permis de booster mon chiffre d'affaire ”</p>
                            </div>
                        </div>
                        <div class="item-client2">
                            <div class="client-thumb">
                                <a href="#" tabindex="0"><img src="/packages/assets/images/borel.png" alt=""></a>
                            </div>
                            <div class="client-info">
                                <h3 class="title18"><a href="#" class="color">BOREL NDZOGANG</a></h3>
                                <span class="white">Agro industriel, jus natures</span>
                                <p class="desc white">“Grace à la plateforme j'ai des fruits frais toujours disponible pour la fabrication de mes jus, je suis à l'abris des ruprutres de stock et des frais de l'importation et des grossistes couteux ”</p>
                            </div>
                        </div>
                        <div class="item-client2">
                            <div class="client-thumb">
                                <a href="#" tabindex="0"><img src="/packages/assets/images/nelly.png" alt=""></a>
                            </div>
                            <div class="client-info">
                                <h3 class="title18"><a href="#" class="color">NELLY KOUGOUM</a></h3>
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
                            <a href="http://www.chococamtigerbrands.com/fr/" class="pulse-grow"><img src="/packages/assets/images/chococam.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="http://www.somdiaa.com/groupe/filiales/sosucam/" class="pulse-grow"><img src="/packages/assets/images/sosucam.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="polytechnique.cm" class="pulse-grow"><img src="/packages/assets/images/ensp.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="cicc.cm" class="pulse-grow"><img src="/packages/assets/images/cicc.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="http://www.lesbrasseriesducameroun.com/" class="pulse-grow"><img src="/packages/assets/images/sabc.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="http://www.chococamtigerbrands.com/fr/" class="pulse-grow"><img src="/packages/assets/images/chococam.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="http://www.somdiaa.com/groupe/filiales/sosucam/" class="pulse-grow"><img src="/packages/assets/images/sosucam.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="#" class="pulse-grow"><img src="/packages/assets/images/minader.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="http://www.lesbrasseriesducameroun.com/" class="pulse-grow"><img src="/packages/assets/images/sabc.png" alt="" /></a>
                        </div>
                        <div class="item-brand">
                            <a href="http://www.somdiaa.com/groupe/filiales/sosucam/" class="pulse-grow"><img src="/packages/assets/images/sosucam.png" alt="" /></a>
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
                                <p class="desc white">Excellence et la qualité de service dans le domaine agricole et la très grande  expertise de nos professionels
                                    font de nous un partenaire de choix et indispensable pour tout entrepreneur agricole ou acteur de ce marché.</p>
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
                    <p class="design2 desc white">Design par <a href="www.nh-itc.com" class="color">nh-itc.com</a></p>
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
@yield('aimeos_scripts')
</body>
</html>
