

<div class="col-md-3 col-sm-4 col-xs-12">
    <aside class="sidebar-left sidebar-shop">
        <div class="" >
        <img width="75px" height="75px" src="/packages/assets/images/shop/user.png" alt="" class="">
        </div>
            <div class="widget widget-category">
        <h2 class="title18 title-widget font-bold" ><a href="/compte" class=""><?= Auth::user()->name?></a></h2>
         <ul class="list-none wg-list-cat">

<?php if (Auth::user()->role =="client"):?>
             <li>
                 <a href="<?=route("commandes")?>"><img src="/packages/assets/images/shop/commande.png" alt="" class="">
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
<?php elseif (Auth::user()->role=="producteur") : ?>
    <li>
        <a href="<?=route("producteur_composant",['composant' => 'ventes'])?>"><img src="/packages/assets/images/shop/historique.png" alt="" class="">
            Mes Ventes
        </a>
    </li>
    <li>
        <a href="<?=route("producteur_composant",['composant' => 'produits'])?>"><img src="/packages/assets/images/shop/commande.png" alt="" class="">
            Mes produits
        </a>
    </li>
    <li>
        <a href="<?=route("producteur_composant",['composant' => 'soumission'])?>"><img src="/packages/assets/images/shop/hand.png" alt="" class="">
            Soumettre un produit
        </a>
    </li>
    <li>
        <a href="<?=route("producteur_composant",['composant'=>'infos'])?>"><img src="/packages/assets/images/shop/infos.png" alt="" class="">
            Informations personnelles</a>
    </li>
    <li>
        <a href="<?=route("producteur_composant",['composant' => 'promotion'])?>"><img src="/packages/assets/images/shop/reduction.png" alt="" class="">
            Promouvoir un produit
        </a>
    </li>
    <li>
        <a href="<?=route("logout")?>"><img src="/packages/assets/images/shop/logout.png" alt="" class="">
            Se Déconnecter
        </a>
    </li>



<?php else:?>
<?php endif ;?>
         </ul>
    </div>
    </aside>
</div>
