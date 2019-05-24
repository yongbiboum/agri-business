<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2018
 */

$enc = $this->encoder();
$params = $this->get( 'listParams', [] );
$catPath = $this->get( 'listCatPath', [] );

if( $this->param( 'f_catid' ) !== null )
{
    $target = $this->config( 'client/html/catalog/tree/url/target' );
    $cntl = $this->config( 'client/html/catalog/tree/url/controller', 'catalog' );
    $action = $this->config( 'client/html/catalog/tree/url/action', 'tree' );
    $config = $this->config( 'client/html/catalog/tree/url/config', [] );
}
else
{
    $target = $this->config( 'client/html/catalog/lists/url/target' );
    $cntl = $this->config( 'client/html/catalog/lists/url/controller', 'catalog' );
    $action = $this->config( 'client/html/catalog/lists/url/action', 'list' );
    $config = $this->config( 'client/html/catalog/lists/url/config', [] );
}

$optTarget = $this->config( 'client/jsonapi/url/target' );
$optCntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );
$optAction = $this->config( 'client/jsonapi/url/action', 'options' );
$optConfig = $this->config( 'client/jsonapi/url/config', [] );


$classes = '';
foreach( (array) $this->get( 'listCatPath', [] ) as $cat )
{
    $catConfig = $cat->getConfig();
    if( isset( $catConfig['css-class'] ) ) {
        $classes .= ' ' . $catConfig['css-class'];
    }
}

$textTypes = $this->config( 'client/html/catalog/lists/head/text-types', array( 'short', 'long' ) );


$quoteItems = [];
if( $catPath !== [] && ( $catItem = end( $catPath ) ) !== false ) {
    $quoteItems = $catItem->getRefItems( 'text', 'quote', 'default' );
}

$pagination = '';
if( $this->get( 'listProductTotal', 0 ) > 1 && $this->config( 'client/html/catalog/lists/pagination/enable', true ) == true )
{

    $pagination = $this->partial(
        $this->config( 'client/html/catalog/lists/partials/pagination', 'catalog/lists/pagination-standard.php' ),
        array(
            'params' => $params,
            'size' => $this->get( 'listPageSize', 9 ),
            'total' => $this->get( 'listProductTotal', 0 ),
            'current' => $this->get( 'listPageCurr', 0 ),
            'prev' => $this->get( 'listPagePrev', 0 ),
            'next' => $this->get( 'listPageNext', 0 ),
            'last' => $this->get( 'listPageLast', 0 ),
        )
    );
}

?>

    <div class="col-md-9 col-sm-8 col-xs-12" data-jsonurl="<?= $enc->attr( $this->url( $optTarget, $optCntl, $optAction, [], [], $optConfig ) ); ?>" >
        <div class="main-content-shop">
             <?php include('stagelist-body-standard.php'); ?>
            <div class="product-grid-view">
                <div class="row">
                    <?php include( 'items-body-standard.php' ); ?>
                </div>
            </div>
        </div>
        <?php //include('pagination-standard.php') ?>
    </div>






