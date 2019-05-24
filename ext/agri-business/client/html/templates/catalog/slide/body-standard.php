
<?php ?>
<?php

//$pageActuelle = url()->current();
$catid = isset($this->catid)? $this->catid:1 ;
if($catid):
?>
<div class="shop-banner banner-adv line-scale zoom-image">
    <a href="#" class="adv-thumb-link"><img src="/packages/assets/images/shop/banner.jpg" alt="" /></a>
    <div class="banner-info">
        <h2 class="title30 color">Plateforme marchande</h2>
        <div class="bread-crumb white"><a href="#" class="white">Marché</a><span>Catégories</span></div>
    </div>
</div>
<?php else: ?>
<div class="shop-banner banner-adv line-scale zoom-image">
    <a href="#" class="adv-thumb-link"><img src="/packages/assets/images/shop/banner-grid.jpg" alt="" /></a>
    <div class="banner-info">
        <h2 class="title30 color">Shop</h2>
        <div class="bread-crumb white"><a href="#" class="white">Home</a><span>Grid view</span></div>
    </div>
</div>

    <?php endif; ?>
