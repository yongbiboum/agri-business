

<div class="col-md-3 col-sm-4 col-xs-12">
    <aside class="sidebar-left sidebar-shop">
        <div class="" align="center">
        <img width="75px" height="75px" src="/packages/assets/images/shop/user.png" alt="" class="">
        </div>
            <div class="widget widget-category">
        <h2 class="title18 title-widget font-bold" align="center"><a href="/compte" class=""><?= Auth::user()->name?></a></h2>
         <ul class="list-none wg-list-cat">


             <li>
                 <a href="<?=route("account_components",['composant'=>'commandes'])?>"><img src="/packages/assets/images/shop/commande.png" alt="" class="">
                        Mes Commandes
                 </a>
             </li>
             <li>
                 <a href="<?=route("account_components",['composant'=>'infos'])?>"><img src="/packages/assets/images/shop/infos.png" alt="" class="">
                     Mes Informations</a>
             </li>
             <li><a href="<?=route("account_components",['composant'=>'demandes'])?>"><img src="/packages/assets/images/shop/hand.png" alt="" class="">
                     Demander produit(s) </a></li>
             <li><a href="<?=route("account_components",['composant'=>'historique'])?>"><img src="/packages/assets/images/shop/historique.png" alt="" class="">
                     Historique Achats</a>
             </li>
             <li><a href="<?=route("account_components",['composant'=>'livraisons'])?>"><img src="/packages/assets/images/shop/livraison.png" alt="" class="">
                     Gestion livraisons</a>
             </li>
             <li><a href="<?=route("account_components",['composant'=>'favoris'])?>"><img src="/packages/assets/images/shop/favoris.png" alt="" class="">
                     Produits favoris</a></li>
             <li><a href="<?=route("account_components",['composant'=>'adresses'])?>"><img src="/packages/assets/images/shop/map.png" alt="" class="">
                     Mes Adresses</a></li>
             <li><a href="<?=route("account_components",['composant'=>'reductions'])?>"><img src="/packages/assets/images/shop/reduction.png" alt="" class="">
                     Mes Réductions</a></li>
             <li><a href="<?=route("logout")?>"><img src="/packages/assets/images/shop/logout.png" alt="" class="">
                     Se Déconnecter</a></li>


         </ul>
    </div>
    </aside>
</div>
