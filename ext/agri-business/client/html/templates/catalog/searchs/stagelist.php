

<?php if(($this->catalogProducts)!="no")  ?>

    <?php

$productItems = $this->catalogProducts;
$text='';
$prods = (int)collect($productItems)->count();
$s="s";
?>
<div class="shop-pagibar clearfix">
    <p class="desc silver pull-left"> <?= $prods ;?> Résultat<?php if ($prods > (int)'1'): ?> <?= $s ;?> <?php endif ;?> </p>
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
    </ul>
</div>
