<?php
//$pageActuelle = url()->current();
$cat = request('f_cat');
//$catid = !is_null($this->catId)? $this->catId:1 ;
$catid = request('id');
$f_item = request("f_items");

?>
<?php if(!is_null($cat)) :
    $manager = \Aimeos\MShop\Factory::createManager( $this->context, 'catalog' );
    $cateid = $catid;
    $cate = $manager->getItem($cateid,['media','text','price']);
    $media = $cate->getRefItems('media');



    //dd($cate->getLabel());
    ?>
<div class="shop-banner banner-adv line-scale zoom-image">
    <a href="#" class="adv-thumb-link"><img src="<?= asset(collect($media)->last()->getUrl())?>" alt="" /></a>
    <div class="banner-info">
        <h2 class="title30 color">Plateforme Marchande</h2>
        <div class="bread-crumb black"><a href="/list" class="black">Marché</a><span><?= $cate->getLabel()?></span></div>
    </div>
</div>

    <?php elseif($f_item):
    $manager = \Aimeos\MShop\Factory::createManager( $this->context, 'catalog' );
    $f_cate =  $manager->getItem($f_item,['media','text','price']);
    $f_media = $f_cate->getRefItems('media');

    ?>
<div class="shop-banner banner-adv line-scale zoom-image">
    <a href="#" class="adv-thumb-link"><img src="<?= asset(collect($f_media)->last()->getUrl())?>" alt="" /></a>
    <div class="banner-info">
        <h2 class="title30 color">Plateforme Marchande</h2>
        <div class="bread-crumb white"><a href="/list" class="white">Marché</a><a style="color: white;" href="#">Catégories</a><span><?= $f_cate->getLabel() ?></span></div>
    </div>
</div>
    <?php else: ?>
<div class="shop-banner banner-adv line-scale zoom-image">
    <a href="#" class="adv-thumb-link"><img src="/packages/assets/images/shop/marche.png" alt="" /></a>
    <div class="banner-info">
        <h2 class="title30 color">Plateforme Marchande</h2>
        <div class="bread-crumb white"><a href="/list" class="white">Marché</a><span>Catégories</span></div>
    </div>
</div>

    <?php endif; ?>
