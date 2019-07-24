<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2018
 * @package MShop
 * @subpackage Customer
 */

namespace Aimeos\MShop\Customer\Manager\Property\Type;


/**
 * Default customer property type manager
 *
 * @package MShop
 * @subpackage Customer
 */
class Myproject
    extends \Aimeos\MShop\Customer\Manager\Property\Type\Standard
{
    private $searchConfig = array(
        'customer.property.type.id' => array(
            'code' => 'customer.property.type.id',
            'internalcode' => 'lvuprty."id"',
            'internaldeps' => array( 'LEFT JOIN "users_property_type" AS lvuprty ON ( lvupr."typeid" = lvuprty."id" )' ),
            'label' => 'Property type ID',
            'type' => 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
            'public' => false,
        ),
        'customer.property.type.siteid' => array(
            'code' => 'customer.property.type.siteid',
            'internalcode' => 'lvuprty."siteid"',
            'label' => 'Property type site ID',
            'type' => 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
            'public' => false,
        ),
        'customer.property.type.label' => array(
            'code' => 'customer.property.type.label',
            'internalcode' => 'lvuprty."label"',
            'label' => 'Property type label',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.property.type.code' => array(
            'code' => 'customer.property.type.code',
            'internalcode' => 'lvuprty."code"',
            'label' => 'Property type code',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.property.type.domain' => array(
            'code' => 'customer.property.type.domain',
            'internalcode' => 'lvuprty."domain"',
            'label' => 'Property type domain',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.property.type.status' => array(
            'code' => 'customer.property.type.status',
            'internalcode' => 'lvuprty."status"',
            'label' => 'Property type status',
            'type' => 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
        ),
        'customer.property.type.position' => array(
            'code' => 'customer.property.type.position',
            'internalcode' => 'lvuprty."pos"',
            'label' => 'Property type position',
            'type' => 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
        ),
        'customer.property.type.ctime' => array(
            'code' => 'customer.property.type.ctime',
            'internalcode' => 'lvuprty."ctime"',
            'label' => 'Property type create date/time',
            'type' => 'datetime',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
            'public' => false,
        ),
        'customer.property.type.mtime' => array(
            'code' => 'customer.property.type.mtime',
            'internalcode' => 'lvuprty."mtime"',
            'label' => 'Property type modify date',
            'type' => 'datetime',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
            'public' => false,
        ),
        'customer.property.type.editor' => array(
            'code' => 'customer.property.type.editor',
            'internalcode' => 'lvuprty."editor"',
            'label' => 'Property type editor',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
            'public' => false,
        ),
    );

    public function cleanup( array $siteids )
    {
        $path = 'mshop/customer/manager/property/type/submanagers';
        foreach( $this->getContext()->getConfig()->get( $path, [] ) as $domain ) {
            $this->getObject()->getSubManager( $domain )->cleanup( $siteids );
        }

        $this->cleanupBase( $siteids, 'mshop/customer/manager/property/type/laravel/delete' );
    }


    public function getSearchAttributes( $withsub = true )
    {
        $path = 'mshop/customer/manager/property/type/submanagers';

        return $this->getSearchAttributesBase( $this->searchConfig, $path, [], $withsub );
    }

    public function getSubManager( $manager, $name = null )
    {
        return $this->getSubManagerBase( 'customer', 'property/type/' . $manager, ( $name === null ? 'Myproject' : $name ) );
    }


    protected function getConfigPath()
    {
        return 'mshop/customer/manager/property/type/laravel/';
    }

    protected function getSearchConfig()
    {
        return $this->searchConfig;
    }
}
