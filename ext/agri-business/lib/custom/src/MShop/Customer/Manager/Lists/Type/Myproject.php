<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package MShop
 * @subpackage Customer
 */


namespace Aimeos\MShop\Customer\Manager\Lists\Type;


/**
 * Laravel implementation of the customer list type class.
 *
 * @package MShop
 * @subpackage Customer
 */
class Myproject
    extends \Aimeos\MShop\Customer\Manager\Lists\Type\Standard
{
    private $searchConfig = array(
        'customer.lists.type.id' => array(
            'code'=>'customer.lists.type.id',
            'internalcode'=>'lvulity."id"',
            'internaldeps'=>array( 'LEFT JOIN "users_list_type" AS lvulity ON ( lvuli."typeid" = lvulity."id" )' ),
            'label'=>'Customer list type ID',
            'type'=> 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
            'public' => false,
        ),
        'customer.lists.type.siteid' => array(
            'code'=>'customer.lists.type.siteid',
            'internalcode'=>'lvulity."siteid"',
            'label'=>'Customer list type site ID',
            'type'=> 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
            'public' => false,
        ),
        'customer.lists.type.code' => array(
            'code'=>'customer.lists.type.code',
            'internalcode'=>'lvulity."code"',
            'label'=>'Customer list type code',
            'type'=> 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.lists.type.domain' => array(
            'code'=>'customer.lists.type.domain',
            'internalcode'=>'lvulity."domain"',
            'label'=>'Customer list type domain',
            'type'=> 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.lists.type.label' => array(
            'code'=>'customer.lists.type.label',
            'internalcode'=>'lvulity."label"',
            'label'=>'Customer list type label',
            'type'=> 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.lists.type.status' => array(
            'code'=>'customer.lists.type.status',
            'internalcode'=>'lvulity."status"',
            'label'=>'Customer list type status',
            'type'=> 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
        ),
        'customer.lists.type.position' => array(
            'code'=>'customer.lists.type.position',
            'internalcode'=>'lvulity."pos"',
            'label'=>'Customer list type position',
            'type'=> 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
        ),
        'customer.lists.type.ctime'=> array(
            'code'=>'customer.lists.type.ctime',
            'internalcode'=>'lvulity."ctime"',
            'label'=>'Customer list type create date/time',
            'type'=> 'datetime',
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.lists.type.mtime'=> array(
            'code'=>'customer.lists.type.mtime',
            'internalcode'=>'lvulity."mtime"',
            'label'=>'Customer list type modification date/time',
            'type'=> 'datetime',
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.lists.type.editor'=> array(
            'code'=>'customer.lists.type.editor',
            'internalcode'=>'lvulity."editor"',
            'label'=>'Customer list type editor',
            'type'=> 'string',
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
    );


    public function cleanup( array $siteids )
    {
        $path = 'mshop/customer/manager/lists/type/submanagers';
        foreach( $this->getContext()->getConfig()->get( $path, [] ) as $domain ) {
            $this->getObject()->getSubManager( $domain )->cleanup( $siteids );
        }

        $this->cleanupBase( $siteids, 'mshop/customer/manager/lists/type/laravel/delete' );
    }

   public function getSearchAttributes( $withsub = true )
    {
        $path = 'mshop/customer/manager/lists/type/submanagers';

        return $this->getSearchAttributesBase( $this->searchConfig, $path, [], $withsub );
    }

    public function getSubManager( $manager, $name = null )
    {
        return $this->getSubManagerBase( 'customer', 'lists/type/' . $manager, ( $name === null ? 'Myproject' : $name ) );
    }

    protected function getConfigPath()
    {
        return 'mshop/customer/manager/lists/type/laravel/';
    }

protected function getSearchConfig()
    {
        return $this->searchConfig;
    }
}
