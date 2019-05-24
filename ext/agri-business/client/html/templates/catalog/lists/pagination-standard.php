<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2018
 */

$enc = $this->encoder();

if( $this->get( 'params/f_catid' ) !== null )
{
    $listTarget = $this->config( 'client/html/catalog/tree/url/target' );
    $listController = $this->config( 'client/html/catalog/tree/url/controller', 'catalog' );
    $listAction = $this->config( 'client/html/catalog/tree/url/action', 'tree' );
    $listConfig = $this->config( 'client/html/catalog/tree/url/config', [] );
}
else
{
    $listTarget = $this->config( 'client/html/catalog/lists/url/target' );
    $listController = $this->config( 'client/html/catalog/lists/url/controller', 'catalog' );
    $listAction = $this->config( 'client/html/catalog/lists/url/action', 'list' );
    $listConfig = $this->config( 'client/html/catalog/lists/url/config', [] );
}

$sort = $this->config( 'client/html/catalog/lists/sort', 'relevance' );

$params = $this->get( 'params', [] );
$sort = $this->get( 'params/f_sort', $sort );
$sortname = ltrim( $sort, '-' );
$nameDir = $priceDir = '';

if( $sort === 'name' ) {
    $nameSort = $this->translate( 'client', '▼ Name' ); $nameDir = '-';
} else if( $sort === '-name' ) {
    $nameSort = $this->translate( 'client', '▲ Name' );
} else {
    $nameSort = $this->translate( 'client', 'Name' );
}

if( $sort === 'price' ) {
    $priceSort = $this->translate( 'client', '▼ Price' ); $priceDir = '-';
} else if( $sort === '-price' ) {
    $priceSort = $this->translate( 'client', '▲ Price' );
} else {
    $priceSort = $this->translate( 'client', 'Price' );
}


?>
<div class="pagibar text-center">
    <?php if( $this->last > 1 ) : ?>


        <a class="current-page"><?=  $this->current ?></a>
        <?php $url = $this->url( $listTarget, $listController, $listAction, array( 'l_page' => $this->next ) + $params, [], $listConfig ); ?>
        <a href="<?= $enc->attr( $url ); ?>"> <?=  $this->next ?> </a>

        <a class="next-page" ><i class="icon ion-ios-arrow-thin-right"></i></a>


    <?php endif; ?>

</div>


