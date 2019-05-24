<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2018
 */

$enc = $this->encoder();
$phrase = $enc->attr( $this->param( 'f_search' ) );
$name = $enc->attr( $this->formparam( 'f_search' ) );
$hint = $this->translate( 'client', 'Please enter at least three characters' );


$suggestTarget = $this->config( 'client/html/catalog/suggest/url/target' );
$suggestController = $this->config( 'client/html/catalog/suggest/url/controller', 'catalog' );

$suggestAction = $this->config( 'client/html/catalog/suggest/url/action', 'suggest' );

$suggestConfig = $this->config( 'client/html/catalog/suggest/url/config', [] );

$suggestUrl = $enc->attr( $this->url( $suggestTarget, $suggestController, $suggestAction, [], [], $suggestConfig ) );


?>
<?php $this->block()->start( 'catalog/filter/search' ); ?>

		<input onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''"
                type="text"
			name="<?= $name; ?>" value="Recherche "
			data-url="<?= $suggestUrl; ?>" data-hint="<?= $hint; ?>"
		/><!--
		--><!--
		--><input type="submit"  value=""   />


<?php $this->block()->stop(); ?>
<?= $this->block()->get( 'catalog/filter/search' ); ?>
