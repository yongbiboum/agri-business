

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
    ?>
    <p class="desc silver pull-left">Résultats 1–9 sur <?= $catnombre ?></p>
    <ul class="wrap-sort-view list-inline-block pull-right">
        <li>
            <div class="sort-bar">
                <span class="inline-block">Trié par :</span>
                <div class="select-box border radius6 inline-block">
                    <select class="radius6">
                        <option value="">Nouveautés</option>
                        <option value="">Prix croissant</option>
                        <option value="">Prix décroissant</option>
                        <option value="">Notes</option>
                    </select>
                </div>
            </div>
        </li>
        <li>
            <div class="view-bar">
                <a class="grid-view active" href="#"></a>
                <a class="list-view" href="#"></a>
            </div>
        </li>
    </ul>
</div>
