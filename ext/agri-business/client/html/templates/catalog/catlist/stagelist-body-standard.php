

<?php if(!empty($this->catalogProducts))  ?>

    <?php
    $s="s";
    $productItems = $this->catalogProducts;
    $text='';
    $prods = collect($productItems)->count();
    $code = $this->code;
    ?>
<h2 class="title30 color text-center"><?= $code ;?>  </h2>
<div class="shop-pagibar clearfix">
    <p class="desc silver pull-left"> <?= $prods ;?> Résultat<?php if ($prods > (int)'1'): ?><?=$s;?><?php endif ;?> </p>
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
