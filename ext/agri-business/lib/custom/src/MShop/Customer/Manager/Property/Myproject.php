<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2018
 * @package MShop
 * @subpackage Customer
 */


namespace Aimeos\MShop\Customer\Manager\Property;


/**
 * Default property manager implementation.
 *
 * @package MShop
 * @subpackage Customer
 */
class Myproject
    extends \Aimeos\MShop\Customer\Manager\Property\Standard
{
    private $searchConfig = array(
        'customer.property.id' => array(
            'code' => 'customer.property.id',
            'internalcode' => 'lvupr."id"',
            'internaldeps'=>array( 'LEFT JOIN "users_property" AS lvupr ON ( lvupr."parentid" = lvu."id" )' ),
            'label' => 'Property ID',
            'type' => 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
            'public' => false,
        ),
        'customer.property.parentid' => array(
            'code' => 'customer.property.parentid',
            'internalcode' => 'lvupr."parentid"',
            'label' => 'Property parent ID',
            'type' => 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
            'public' => false,
        ),
        'customer.property.siteid' => array(
            'code' => 'customer.property.siteid',
            'internalcode' => 'lvupr."siteid"',
            'label' => 'Property site ID',
            'type' => 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
            'public' => false,
        ),
        'customer.property.typeid' => array(
            'code' => 'customer.property.typeid',
            'internalcode' => 'lvupr."typeid"',
            'label' => 'Property type ID',
            'type' => 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
            'public' => false,
        ),
        'customer.property.value' => array(
            'code' => 'customer.property.value',
            'internalcode' => 'lvupr."value"',
            'label' => 'Property value',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.property.languageid' => array(
            'code' => 'customer.property.languageid',
            'internalcode' => 'lvupr."langid"',
            'label' => 'Property language ID',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.property.ctime' => array(
            'code' => 'customer.property.ctime',
            'internalcode' => 'lvupr."ctime"',
            'label' => 'Property create date/time',
            'type' => 'datetime',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
            'public' => false,
        ),
        'customer.property.mtime' => array(
            'code' => 'customer.property.mtime',
            'internalcode' => 'lvupr."mtime"',
            'label' => 'Property modify date',
            'type' => 'datetime',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
            'public' => false,
        ),
        'customer.property.editor' => array(
            'code' => 'customer.property.editor',
            'internalcode' => 'lvupr."editor"',
            'label' => 'Property editor',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
            'public' => false,
        ),
    );


    public function cleanup( array $siteids )
    {
        $path = 'mshop/customer/manager/property/submanagers';
        foreach( $this->getContext()->getConfig()->get( $path, [] ) as $domain ) {
            $this->getObject()->getSubManager( $domain )->cleanup( $siteids );
        }

        $this->cleanupBase( $siteids, 'mshop/customer/manager/property/laravel/delete' );
    }

    public function getSearchAttributes( $withsub = true )
    {
        $path = 'mshop/customer/manager/property/submanagers';

        return $this->getSearchAttributesBase( $this->searchConfig, $path, ['type'], $withsub );
    }

    public function getSubManager( $manager, $name = null )
    {
        return $this->getSubManagerBase( 'customer', 'property/' . $manager, ( $name === null ? 'Myproject' : $name ) );
    }


    protected function getConfigPath()
    {
        return 'mshop/customer/manager/property/laravel/';
    }

    protected function getSearchConfig()
    {
        return $this->searchConfig;
    }
}
