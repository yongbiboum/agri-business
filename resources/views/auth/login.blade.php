<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Agribusiness est une plateforme collaborative d'échange de produits agricoles, de connaissances et d'outils et materiels du domaine agricole d'investissement agricole et d'accompagnement dans la gestion  qui fait intervenir agriculteurs,entrepreneurs,producteurs agricoles, exportateurs, grossistes , revendeurs , agro industries, entrepreneurs et particuliers de tous bords interressés par la production agricole particulièrement en afrique " />
    <meta name="keywords" content="Agribusiness,agriculture,africa" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name='revisit-after' content='1 days' />
    <title>Agri Business | Login</title>
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
    <link rel="stylesheet" href="/packages/assets/css/intlTelInput.css">

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
                                <li><a href="/login"><span class="color"><i class="fa fa-key"></i></span>Connexion - Inscription</a></li>
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
                                <a href="/">Accueil</a>
                            </li>
                            <li><a href="/list">Nos produits</a></li>
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
    <div id="content">
        <div class="content-page">
            <div class="container">
                <div class="shop-banner banner-adv line-scale zoom-image">
                    <a href="#" class="adv-thumb-link"><img src="/packages/assets/images/inscrition.png" /></a>
                    <div class="banner-info">
                        <h2 class="title30 color">Connexion/Inscription</h2>
                        <div class="bread-crumb white"><a href="#" class="white">Accueil</a><span></span></div>
                    </div>
                </div>
                <!-- ENd Banner -->
                <div class="register-content-box">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-ms-12">
                            <div class="check-billing">

                                <div class="form-my-account">
                                    <form class="block-login" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <h2 class="title24 title-form-account">Connexion</h2>
                                        <p>
                                            <label for="email">Adresse e-mail <span class="required">*</span></label>
                                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   id="email"  name="email"
                                                   value="{{ old('email') }}" required autocomplete="email" autofocus
                                            />
                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                             </span>
                                            @endif

                                        </p>
                                        <p>
                                            <label for="password">Mot de passe <span class="required">*</span></label>
                                            <input id="password" type="password" name="password"
                                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                   required autocomplete="current-password"
                                            />
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </p>
                                        <p>
                                            <input type="submit" class="register-button" value="Se connecter">
                                        </p>
                                        <div class="table create-account">
                                            <div class="text-left">
                                                <p>
                                                    <input type="checkbox"  name="remember" id="remember" /> <label for="remember"
                                                        {{ old('remember') ? 'checked' : '' }}>
                                                        Se souvenir de moi</label>
                                                </p>
                                            </div>
                                            @if (Route::has('password.request'))
                                            <div class="text-right">
                                                <a href="<?= route('password.request')?>" class="color">Mot de passe oublié?</a>
                                            </div>
                                            @endif
                                        </div>
                                        <h2 class="title18 social-login-title">Se connecter avec </h2>
                                        <div class="social-login-block table text-center">
                                            <div class="social-login-btn">
                                                <a href="#" class="login-goo-link">Google</a>
                                            </div>
                                        </div>
                                    </form>

                                    <form class="block-register" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <h2 class="title24 title-form-account">Inscription</h2>
                                        <p>
                                            <label>Civilité</label>
                                            <select class="form-control" name="civilite" required>
                                                <option value="Mr">Monsieur</option>
                                                <option value="Mme">Madame</option>
                                                <option value="Mlle">Mademoiselle</option>
                                            </select></p>
                                        <p>
                                        <p>
                                            <label for="name">Nom utilisateur <span class="required">*</span></label>
                                            <input type="text" id="name"  class="form-control"
                                                   name="name" required  />

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </p>
                                        <p>
                                            <label for="email">Adresse e-mail <span class="required">*</span></label>
                                            <input type="email" id="email"
                                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" value="{{ old('email') }}" required />
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </p>

                                            <input type="hidden" name="role" value="client" />

                                        <p>
                                            <label for="password">Mot de passe <span class="required">*</span></label>
                                            <input id="password" type="password"
                                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                   name="password" required />
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $errors->first('password') }}</strong>
                                                 </span>
                                            @endif
                                        </p>
                                        <p>
                                            <label for="password-confirm">Confirmer mot de passe <span class="required">*</span></label>
                                            <input id="password-confirm" type="password"
                                                   class="form-control"
                                                   name="password_confirmation" required />

                                        </p>
                                        <p>
                                            <label for="contact">Téléphone <span class="required">*</span></label>
                                            <input type="tel" id="phone"
                                                   class="form-control"
                                                   name="contact" required />
                                        </p>

                                        <p>
                                            <label>Date de Naissance</label>
                                            <input type="date" min="1919-12-31" class="form-control"  name="naissance">
                                        </p>
                                        <p>
                                            <label>Compagnie</label>
                                            <input type="text" class="form-control" name="compagnie">
                                          </p>
                                        <p>
                                            <label>Profession</label>
                                            <select class="form-control" name="profession" required>
                                                <option value="industriel">Industriel</option>
                                                <option value="grossiste">Grossiste</option>
                                                <option value="revendeur">Revendeur</option>
                                                <option value="particulier">Particulier</option>
                                                <option value="exportateur">Exportateur</option>
                                                <option value="autres">Autres ...</option>
                                            </select>
                                        </p>

                                        <p>
                                            <input type="submit" class="register-button" name="register" value="Valider">
                                        </p>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-ms-12">
                            <div class="check-address">
                                <div class="form-my-account check-register text-center">
                                    <h2 class="title24 title-form-account">Inscription</h2>
                                    <p class="desc"> S'inscrire dans notre plateforme vous donne droit à un accès à une interface d'administration
                                        de vos commandes (Historique, tracking des livraisons, produits préférés etc.), à des infos en temps réel sur
                                        l'évolution des bonnes pratiques de l'agribusiness en afrique et dans le monde.</p>
                                    <a href="#" class="shop-button bg-color login-to-register" data-login="Se connecter" data-register="S'inscrire">Inscription</a>
                                    <p class="desc title12 silver"><i>Cliquez ici pour switcher entre inscription/connexion</i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content Pages -->
    </div>
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
<script src="/packages/assets/js/intlTelInput.js"></script>
<script src="/packages/assets/js/utils.js"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input);
</script>

</body>
</html>
