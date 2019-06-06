<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package Client
 * @subpackage Html
 */


namespace Aimeos\Client\Html\Account\AccountAside;



class Factory
    extends \Aimeos\Client\Html\Common\Factory\Base
    implements \Aimeos\Client\Html\Common\Factory\Iface
{
    public static function createClient( \Aimeos\MShop\Context\Item\Iface $context, $name = null )
    {
        if( $name === null ) {
            $name = $context->getConfig()->get( 'client/html/account/accountaside/name', 'Standard' );
        }

        if( ctype_alnum( $name ) === false )
        {
            $classname = is_string( $name ) ? '\\Aimeos\\Client\\Html\\Account\\accountaside\\' . $name : '<not a string>';
            throw new \Aimeos\Client\Html\Exception( sprintf( 'Invalid characters in class name "%1$s"', $classname ) );
        }

        $iface = '\\Aimeos\\Client\\Html\\Iface';
        $classname = '\\Aimeos\\Client\\Html\\Account\\accountaside\\' . $name;

        $client = self::createClientBase( $context, $classname, $iface );
        $client = self::addClientDecorators( $context, $client, 'account/accountaside' );

        return $client->setObject( $client );
    }
}

