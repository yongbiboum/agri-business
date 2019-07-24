<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2011
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package MShop
 * @subpackage Product
 */


namespace Aimeos\MShop\Product\Manager;


class Product extends Standard
{
    private $searchConfig = array(

        'product.producteur_id'=> array(
            'code'=>'product.producteur_id',
            'internalcode'=>'mpro."producteur_id"',
            'label'=>'Producteur',
            'type'=> 'integer', // integer, float, etc.
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_INT, // _INT, _FLOAT, etc.
        ),
        'product.localite'=> array(
            'code'=>'product.localite',
            'internalcode'=>'mpro."localite"',
            'label'=>'Localite',
            'type'=> 'string', // integer, float, etc.
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_STR, // _INT, _FLOAT, etc.
        ),
        'product.position'=> array(
            'code'=>'product.position',
            'internalcode'=>'mpro."position"',
            'label'=>'Position',
            'type'=> 'string', // integer, float, etc.
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_STR, // _INT, _FLOAT, etc.
        ),
        'product.unite'=> array(
            'code'=>'product.unite',
            'internalcode'=>'mpro."unite"',
            'label'=>'Unite',
            'type'=> 'string', // integer, float, etc.
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_STR, // _INT, _FLOAT, etc.
        ),
        'product.note'=> array(
            'code'=>'product.note',
            'internalcode'=>'mpro."note"',
            'label'=>'Note',
            'type'=> 'integer', // integer, float, etc.
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_INT, // _INT, _FLOAT, etc.
        ),

        'product.variete'=> array(
            'code'=>'product.variete',
            'internalcode'=>'mpro."variete"',
            'label'=>'Variete',
            'type'=> 'string', // integer, float, etc.
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_STR, // _INT, _FLOAT, etc.
        ),

        'product.siteid' => array(
            'code' => 'product.siteid',
            'internalcode' => 'mpro."siteid"',
            'label' => 'Site ID',
            'type' => 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
            'public' => false,
        ),
        'product.typeid' => array(
            'code' => 'product.typeid',
            'internalcode' => 'mpro."typeid"',
            'label' => 'Type ID',
            'type' => 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
            'public' => false,
        ),
        'product.label' => array(
            'code' => 'product.label',
            'internalcode' => 'mpro."label"',
            'label' => 'Label',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'product.code' => array(
            'code' => 'product.code',
            'internalcode' => 'mpro."code"',
            'label' => 'SKU',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'product.id' => array(
            'code' => 'product.id',
            'internalcode' => 'mpro."id"',
            'label' => 'ID',
            'type' => 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
        ),
        'product.datestart' => array(
            'code' => 'product.datestart',
            'internalcode' => 'mpro."start"',
            'label' => 'Start date/time',
            'type' => 'datetime',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'product.dateend' => array(
            'code' => 'product.dateend',
            'internalcode' => 'mpro."end"',
            'label' => 'End date/time',
            'type' => 'datetime',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'product.status' => array(
            'code' => 'product.status',
            'internalcode' => 'mpro."status"',
            'label' => 'Status',
            'type' => 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
        ),
        'product.config' => array(
            'code' => 'product.config',
            'internalcode' => 'mpro."config"',
            'label' => 'Config',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
            'public' => false,
        ),
        'product.target' => array(
            'code' => 'product.target',
            'internalcode' => 'mpro."target"',
            'label' => 'URL target',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
            'public' => false,
        ),
        'product.ctime' => array(
            'code' => 'product.ctime',
            'internalcode' => 'mpro."ctime"',
            'label' => 'Create date/time',
            'type' => 'datetime',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
            'public' => false,
        ),
        'product.mtime' => array(
            'code' => 'product.mtime',
            'internalcode' => 'mpro."mtime"',
            'label' => 'Modify date/time',
            'type' => 'datetime',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
            'public' => false,
        ),
        'product.editor' => array(
            'code' => 'product.editor',
            'internalcode' => 'mpro."editor"',
            'label' => 'Editor',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
            'public' => false,
        ),
        'product:has' => array(
            'code' => 'product:has()',
            'internalcode' => '( SELECT mpro_has."id" FROM mshop_product AS mpro_has
				WHERE mpro."id" = mpro_has."id" AND (
					SELECT COUNT(DISTINCT mproli_has."parentid")
					FROM "mshop_product_list" AS mproli_has
					JOIN "mshop_product_list_type" AS mprolity_has ON mproli_has."typeid" = mprolity_has."id"
					WHERE mpro."id" = mproli_has."parentid" AND :site
						AND mproli_has."domain" = $1 AND mprolity_has."code" = $2 AND mproli_has."refid" = $3
				) = 1
			)',
            'label' => 'Product list item, parameter(<domain>,<list type>,<reference ID>)',
            'type' => 'null',
            'internaltype' => 'null',
            'public' => false,
        ),
        'product:prop' => array(
            'code' => 'product:prop()',
            'internalcode' => '( SELECT mpro_has."id" FROM mshop_product AS mpro_has
				WHERE mpro."id" = mpro_has."id" AND (
					SELECT COUNT(DISTINCT mpropr_prop."parentid")
					FROM "mshop_product_property" AS mpropr_prop
					JOIN "mshop_product_property_type" AS mproprty_prop ON mpropr_prop."typeid" = mproprty_prop."id"
					WHERE mpro."id" = mpropr_prop."parentid" AND :site
						AND mproprty_prop."code" = $1 AND mpropr_prop."value" = $3
						AND ( mpropr_prop."langid" = $2 OR mpropr_prop."langid" IS NULL )
				) = 1
			)',
            'label' => 'Product has property item, parameter(<property type>,<language code>,<property value>)',
            'type' => 'null',
            'internaltype' => 'null',
            'public' => false,
        ),
        // @deprecated 2019.01, use product:has()
        'product.contains' => array(
            'code' => 'product.contains()',
            'internalcode' => '( SELECT COUNT(mproli_cs."parentid")
				FROM "mshop_product_list" AS mproli_cs
				WHERE mpro."id" = mproli_cs."parentid" AND :site
					AND mproli_cs."domain" = $1 AND mproli_cs."refid" IN ( $3 ) AND mproli_cs."typeid" = $2
					AND ( mproli_cs."start" IS NULL OR mproli_cs."start" <= \':date\' )
					AND ( mproli_cs."end" IS NULL OR mproli_cs."end" >= \':date\' ) )',
            'label' => 'Number of product list items, parameter(<domain>,<list type ID>,<reference IDs>)',
            'type' => 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
            'public' => false,
        ),
    );

    private $date;


    public function saveItem( \Aimeos\MShop\Common\Item\Iface $item, $fetch = true )
    {
        self::checkClass( '\\Aimeos\\MShop\\Product\\Item\\Iface', $item );

        if( !$item->isModified() )
        {
            $item = $this->savePropertyItems( $item, 'product', $fetch );
            return $this->saveListItems( $item, 'product', $fetch );
        }

        $context = $this->getContext();

        $dbm = $context->getDatabaseManager();
        $dbname = $this->getResourceName();
        $conn = $dbm->acquire( $dbname );

        try
        {
            $id = $item->getId();

            if( $id === null )
            {
                $path = 'mshop/product/manager/standard/insert';
            }
            else
            {
                $path = 'mshop/product/manager/standard/update';
            }

            $stmt = $this->getCachedStatement( $conn, $path );

            $stmt->bind( 1, $item->getTypeId(), \Aimeos\MW\DB\Statement\Base::PARAM_INT );
            $stmt->bind( 2, $item->getCode() );
            $stmt->bind( 3, $item->getLabel() );
            $stmt->bind( 4, $item->getStatus(), \Aimeos\MW\DB\Statement\Base::PARAM_INT );
            $stmt->bind( 5, $item->getDateStart() );
            $stmt->bind( 6, $item->getDateEnd() );
            $stmt->bind( 7, json_encode( $item->getConfig() ) );
            $stmt->bind( 8, $item->getTarget() );
            $stmt->bind( 9, $context->getEditor() );
            $stmt->bind( 10, date( 'Y-m-d H:i:s' ) ); // mtime
            $stmt->bind( 11, $item->getTimeCreated() );
            $stmt->bind( 12, $context->getLocale()->getSiteId(), \Aimeos\MW\DB\Statement\Base::PARAM_INT );
            $stmt->bind( 13, $item->getProducteurId(), \Aimeos\MW\DB\Statement\Base::PARAM_INT );
            $stmt->bind( 14, $item->getPosition());
            $stmt->bind( 15, $item->getLocalite());
            $stmt->bind( 16, $item->getUnite());
            $stmt->bind( 17, $item->getVariete());
            $stmt->bind( 18, $item->getNote(), \Aimeos\MW\DB\Statement\Base::PARAM_INT );


            if( $id !== null )
            {
                $stmt->bind( 19, $id, \Aimeos\MW\DB\Statement\Base::PARAM_INT );
                $item->setId( $id ); //so item is no longer modified
            }

            $stmt->execute()->finish();

            if( $id === null )
            {
                $path = 'mshop/product/manager/standard/newid';
                $item->setId( $this->newId( $conn, $path ) );
            }

            $dbm->release( $conn, $dbname );
        }
        catch( \Exception $e )
        {
            $dbm->release( $conn, $dbname );
            throw $e;
        }

        $item = $this->savePropertyItems( $item, 'product', $fetch );
        return $this->saveListItems( $item, 'product', $fetch );
    }

    public function searchItems( \Aimeos\MW\Criteria\Iface $search, array $ref = [], &$total = null )
    {
        $map = $typeIds = [];
        $context = $this->getContext();

        $dbm = $context->getDatabaseManager();
        $dbname = $this->getResourceName();
        $conn = $dbm->acquire( $dbname );

        try
        {
            $required = array( 'product' );

            $level = \Aimeos\MShop\Locale\Manager\Base::SITE_ALL;
            $level = $context->getConfig()->get( 'mshop/product/manager/sitemode', $level );


            $cfgPathSearch = 'mshop/product/manager/standard/search';


            $cfgPathCount = 'mshop/product/manager/standard/count';

            $results = $this->searchItemsBase( $conn, $search, $cfgPathSearch, $cfgPathCount, $required, $total, $level );

            while( ( $row = $results->fetch() ) !== false )
            {
                $config = $row['product.config'];

                if( $config && ( $row['product.config'] = json_decode( $config, true ) ) === null )
                {
                    $msg = sprintf( 'Invalid JSON as result of search for ID "%2$s" in "%1$s": %3$s', 'mshop_product.config', $row['product.id'], $config );
                    $this->getContext()->getLogger()->log( $msg, \Aimeos\MW\Logger\Base::WARN );
                }

                $map[$row['product.id']] = $row;
                $typeIds[$row['product.typeid']] = null;
            }

            $dbm->release( $conn, $dbname );
        }
        catch( \Exception $e )
        {
            $dbm->release( $conn, $dbname );
            throw $e;
        }

        if( !empty( $typeIds ) )
        {
            $typeManager = $this->getObject()->getSubManager( 'type' );
            $typeSearch = $typeManager->createSearch();
            $typeSearch->setConditions( $typeSearch->compare( '==', 'product.type.id', array_keys( $typeIds ) ) );
            $typeSearch->setSlice( 0, $search->getSliceSize() );
            $typeItems = $typeManager->searchItems( $typeSearch );

            foreach( $map as $id => $row )
            {
                if( isset( $typeItems[$row['product.typeid']] ) )
                {
                    $map[$id]['product.type'] = $typeItems[$row['product.typeid']]->getCode();
                    $map[$id]['product.typename'] = $typeItems[$row['product.typeid']]->getName();
                }
            }
        }

        $propItems = [];
        if( in_array( 'product/property', $ref, true ) ) {
            $propItems = $this->getPropertyItems( array_keys( $map ), 'product' );
        }

        return $this->buildItems( $map, $ref, 'product', $propItems );
    }

    protected function createItemBase( array $values = [], array $listItems = [],
                                       array $refItems = [], array $propertyItems = [] )
    {
        return new \Aimeos\MShop\Product\Item\Product( $values, $listItems, $refItems, $propertyItems );
    }
}
