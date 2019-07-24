<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package MShop
 * @subpackage Customer
 */

namespace Aimeos\MShop\Customer\Item\Address;

/**
 * Interface for provider common address DTO objects used by the shop.
 * @package MShop
 * @subpackage Customer
 */
class Myproject
    extends \Aimeos\MShop\Common\Item\Address\Standard
    implements \Aimeos\MShop\Customer\Item\Address\Iface
{
    /**
     * Returns the item type
     *
     * @return string Item type, subtypes are separated by slashes
     */
    public function getResourceType()
    {
        return 'customer/address';
    }
}
