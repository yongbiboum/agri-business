

<div class="shop-pagibar clearfix">
    <?php
    $catalogList = $this->catalogList ;
    $text='';

    $catnombre = (int)'0';

    ?>

    <?php foreach($catalogList as $id => $catalogItem):
        $manager = \Aimeos\MShop\Factory::createManager( $this->context, 'catalog' );
        $catid = $catalogItem->getId();
        $catalogItemId = $manager->getItem($catid,['media','text','price']);
        $bool = is_null($catalogItemId->getRefItems("text")) ? 0:1 ;
        $base = "no";

        if(!empty($catalogItemId->getRefItems("text"))) {
            $base = collect($catalogItemId->getRefItems("text"))->first()->getLabel();
        }

        if($base==="base")
        { $catnombre = (int)$catnombre + (int)'1';}

     endforeach;
      //  dd($catnombre)
    if($catnombre<(int)'9'):
    ?>
        <h2 class="title30 color text-center">Produits  </h2>
        <p class="desc silver pull-left">Résultats 1–<?= $catnombre ?> sur <?= $catnombre ?></p>
    <?php else:?>
        <h2 class="title30 color text-center">Produits  </h2>
    <p class="desc silver pull-left">Résultats 1–9 sur <?= $catnombre ?></p>
    <?php endif;?>
</div>
