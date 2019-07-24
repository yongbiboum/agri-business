<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2011
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package MShop
 * @subpackage Product
 */


namespace Aimeos\MShop\Customer\Manager;


class Myproject extends Standard
{
    private $searchConfig = array(


        'customer.id' => array(
            'label' => 'Customer ID',
            'code' => 'customer.id',
            'internalcode' => 'lvu."id"',
            'type' => 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
            'public' => false,
        ),
        'customer.code' => array(
            'label' => 'Customer username',
            'code' => 'customer.code',
            'internalcode' => 'lvu."name"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR
        ),
        'customer.label' => array(
            'label' => 'Customer label',
            'code' => 'customer.label',
            'internalcode' => 'lvu."label"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR
        ),
        'customer.salutation' => array(
            'label' => 'Customer salutation',
            'code' => 'customer.salutation',
            'internalcode' => 'lvu."salutation"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.company'=> array(
            'label' => 'Customer company',
            'code' => 'customer.company',
            'internalcode' => 'lvu."company"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.vatid'=> array(
            'label' => 'Customer VAT ID',
            'code' => 'customer.vatid',
            'internalcode' => 'lvu."vatid"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.title' => array(
            'label' => 'Customer title',
            'code' => 'customer.title',
            'internalcode' => 'lvu."title"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.firstname' => array(
            'label' => 'Customer firstname',
            'code' => 'customer.firstname',
            'internalcode' => 'lvu."firstname"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.lastname' => array(
            'label' => 'Customer lastname',
            'code' => 'customer.lastname',
            'internalcode' => 'lvu."lastname"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.address1' => array(
            'label' => 'Customer address part one',
            'code' => 'customer.address1',
            'internalcode' => 'lvu."address1"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.address2' => array(
            'label' => 'Customer address part two',
            'code' => 'customer.address2',
            'internalcode' => 'lvu."address2"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.address3' => array(
            'label' => 'Customer address part three',
            'code' => 'customer.address3',
            'internalcode' => 'lvu."address3"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.postal' => array(
            'label' => 'Customer postal',
            'code' => 'customer.postal',
            'internalcode' => 'lvu."postal"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.city' => array(
            'label' => 'Customer city',
            'code' => 'customer.city',
            'internalcode' => 'lvu."city"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.state' => array(
            'label' => 'Customer state',
            'code' => 'customer.state',
            'internalcode' => 'lvu."state"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.languageid' => array(
            'label' => 'Customer language',
            'code' => 'customer.languageid',
            'internalcode' => 'lvu."langid"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.countryid' => array(
            'label' => 'Customer country',
            'code' => 'customer.countryid',
            'internalcode' => 'lvu."countryid"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.telephone' => array(
            'label' => 'Customer telephone',
            'code' => 'customer.telephone',
            'internalcode' => 'lvu."telephone"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.email' => array(
            'label' => 'Customer email',
            'code' => 'customer.email',
            'internalcode' => 'lvu."email"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.telefax' => array(
            'label' => 'Customer telefax',
            'code' => 'customer.telefax',
            'internalcode' => 'lvu."telefax"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.website' => array(
            'label' => 'Customer website',
            'code' => 'customer.website',
            'internalcode' => 'lvu."website"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.longitude' => array(
            'label' => 'Customer longitude',
            'code' => 'customer.longitude',
            'internalcode' => 'lvu."longitude"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.latitude' => array(
            'label' => 'Customer latitude',
            'code' => 'customer.latitude',
            'internalcode' => 'lvu."latitude"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.birthday' => array(
            'label' => 'Customer birthday',
            'code' => 'customer.birthday',
            'internalcode' => 'lvu."birthday"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.password'=> array(
            'label' => 'Customer password',
            'code' => 'customer.password',
            'internalcode' => 'lvu."password"',
            'type' => 'string',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.status'=> array(
            'label' => 'Customer status',
            'code' => 'customer.status',
            'internalcode' => 'lvu."status"',
            'type' => 'integer',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT
        ),
        'customer.dateverified'=> array(
            'label' => 'Customer verification date',
            'code' => 'customer.dateverified',
            'internalcode' => 'lvu."vdate"',
            'type' => 'date',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.ctime'=> array(
            'label' => 'Customer creation time',
            'code' => 'customer.ctime',
            'internalcode' => 'lvu."created_at"',
            'type' => 'datetime',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.mtime'=> array(
            'label' => 'Customer modification time',
            'code' => 'customer.mtime',
            'internalcode' => 'lvu."updated_at"',
            'type' => 'datetime',
            'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.editor'=> array(
            'label'=>'Customer editor',
            'code'=>'customer.editor',
            'internalcode' => 'lvu."editor"',
            'type'=> 'string',
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_STR,
        ),
        'customer.prenom'=> array(
            'code'=>'customer.prenom',
            'internalcode'=>'lvu."prenom"',
            'label'=>'Prenom',
            'type'=> 'string', // integer, float, etc.
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_STR, // _INT, _FLOAT, etc.
        ),
        'customer.civilite'=> array(
            'code'=>'customer.civilite',
            'internalcode'=>'lvu."civilite"',
            'label'=>'Civilite',
            'type'=> 'string', // integer, float, etc.
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_STR, // _INT, _FLOAT, etc.
        ),
        'customer.contact'=> array(
            'code'=>'customer.contact',
            'internalcode'=>'lvu."contact"',
            'label'=>'Contact',
            'type'=> 'string', // integer, float, etc.
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_STR, // _INT, _FLOAT, etc.
        ),
        'customer.compagnie'=> array(
            'code'=>'customer.compagnie',
            'internalcode'=>'lvu."compagnie"',
            'label'=>'Compagnie',
            'type'=> 'string', // integer, float, etc.
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_STR, // _INT, _FLOAT, etc.
        ),
        'customer.naissance'=> array(
            'code'=>'customer.naissance',
            'internalcode'=>'lvu."naissance"',
            'label'=>'Naissance',
            'type'=> 'datetime', // integer, float, etc.
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_STR, // _INT, _FLOAT, etc.
        ),
        'customer.profession'=> array(
            'code'=>'customer.profession',
            'internalcode'=>'lvu."profession"',
            'label'=>'Profession',
            'type'=> 'string', // integer, float, etc.
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_STR, // _INT, _FLOAT, etc.
        ),
        'customer.pseudo'=> array(
            'code'=>'customer.pseudo',
            'internalcode'=>'lvu."pseudo"',
            'label'=>'Pseudo',
            'type'=> 'string', // integer, float, etc.
            'internaltype'=> \Aimeos\MW\DB\Statement\Base::PARAM_STR, // _INT, _FLOAT, etc.
        ),
    );

    private $date;
    private $salt;
    private $helper;
    private $addressManager;

    public function cleanup( array $siteids )
    {
        $path = 'mshop/customer/manager/submanagers';
        $default = ['address', 'lists', 'property'];

        foreach( $this->getContext()->getConfig()->get( $path, $default ) as $domain ) {
            $this->getObject()->getSubManager( $domain )->cleanup( $siteids );
        }
    }

    public function deleteItems( array $ids )
    {
        $path = 'mshop/customer/manager/lara/delete';
        $this->deleteItemsBase( $ids, $path, false );
    }

    public function getSearchAttributes( $withsub = true )
    {
        $path = 'mshop/customer/manager/submanagers';
        $default = ['address', 'lists', 'property'];

        return $this->getSearchAttributesBase( $this->searchConfig, $path, $default, $withsub );
    }

    public function searchItems( \Aimeos\MW\Criteria\Iface $search, array $ref = [], &$total = null )
    {
        $dbm = $this->getContext()->getDatabaseManager();
        $dbname = $this->getResourceName();
        $conn = $dbm->acquire( $dbname );
        $map = [];

        try
        {
            $level = \Aimeos\MShop\Locale\Manager\Base::SITE_ALL;
            $cfgPathSearch = 'mshop/customer/manager/lara/search';
            $cfgPathCount = 'mshop/customer/manager/lara/count';
            $required = array( 'customer' );

            $results = $this->searchItemsBase( $conn, $search, $cfgPathSearch, $cfgPathCount, $required, $total, $level );
            while( ( $row = $results->fetch() ) !== false ) {
                $map[ $row['customer.id'] ] = $row;
            }

            $dbm->release( $conn, $dbname );
        }
        catch( \Exception $e )
        {
            $dbm->release( $conn, $dbname  );
            throw $e;
        }

        $addrItems = [];
        if( in_array( 'customer/address', $ref, true ) ) {
            $addrItems = $this->getAddressItems( array_keys( $map ), 'customer' );
        }

        $propItems = [];
        if( in_array( 'customer/property', $ref, true ) ) {
            $propItems = $this->getPropertyItems( array_keys( $map ), 'customer' );
        }

        return $this->buildItems( $map, $ref, 'customer', $addrItems, $propItems );
    }

    public function saveItem( \Aimeos\MShop\Common\Item\Iface $item, $fetch = true )
    {
        self::checkClass( '\\Aimeos\\MShop\\Customer\\Item\\Iface', $item );

        if( !$item->isModified() )
        {
            $item = $this->savePropertyItems( $item, 'customer', $fetch );
            $item = $this->saveAddressItems( $item, 'customer', $fetch );
            return $this->saveListItems( $item, 'customer', $fetch );
        }

        $context = $this->getContext();

        $dbm = $context->getDatabaseManager();
        $dbname = $this->getResourceName();
        $conn = $dbm->acquire( $dbname );

        try
        {
            $id = $item->getId();
            $date = date( 'Y-m-d H:i:s' );
            $billingAddress = $item->getPaymentAddress();

            if( $id === null )
            {
                $path = 'mshop/customer/manager/lara/insert';
            }
            else
            {
                $path = 'mshop/customer/manager/lara/update';
            }

            $stmt = $this->getCachedStatement( $conn, $path );

            $stmt->bind( 1, $context->getLocale()->getSiteId(), \Aimeos\MW\DB\Statement\Base::PARAM_INT );
            $stmt->bind( 2, $item->getLabel() );
            $stmt->bind( 3, $item->getCode() );
            $stmt->bind( 4, $billingAddress->getCompany() );
            $stmt->bind( 5, $billingAddress->getVatID() );
            $stmt->bind( 6, $billingAddress->getSalutation() );
            $stmt->bind( 7, $billingAddress->getTitle() );
            $stmt->bind( 8, $billingAddress->getFirstname() );
            $stmt->bind( 9, $billingAddress->getLastname() );
            $stmt->bind( 10, $billingAddress->getAddress1() );
            $stmt->bind( 11, $billingAddress->getAddress2() );
            $stmt->bind( 12, $billingAddress->getAddress3() );
            $stmt->bind( 13, $billingAddress->getPostal() );
            $stmt->bind( 14, $billingAddress->getCity() );
            $stmt->bind( 15, $billingAddress->getState() );
            $stmt->bind( 16, $billingAddress->getCountryId() );
            $stmt->bind( 17, $billingAddress->getLanguageId() );
            $stmt->bind( 18, $billingAddress->getTelephone() );
            $stmt->bind( 19, $billingAddress->getEmail() );
            $stmt->bind( 20, $billingAddress->getTelefax() );
            $stmt->bind( 21, $billingAddress->getWebsite() );
            $stmt->bind( 22, $billingAddress->getLongitude() );
            $stmt->bind( 23, $billingAddress->getLatitude() );
            $stmt->bind( 24, $item->getBirthday() );
            $stmt->bind( 25, $item->getStatus(), \Aimeos\MW\DB\Statement\Base::PARAM_INT );
            $stmt->bind( 26, $item->getDateVerified() );
            $stmt->bind( 27, $item->getPassword() );
            $stmt->bind( 28, $date ); // Modification time
            $stmt->bind(29 , $item->getPrenom() );
            $stmt->bind(30 , $item->getCivilite() );
            $stmt->bind(31 , $item->getContact() );
            $stmt->bind(32 , $item->getCompagnie() );
            $stmt->bind(33 , $item->getNaissance() );
            $stmt->bind(34 , $item->getProfession() );
            $stmt->bind(35 , $item->getPseudo() );
            $stmt->bind(36, $context->getEditor() );


            if( $id !== null ) {
                $stmt->bind( 37, $id, \Aimeos\MW\DB\Statement\Base::PARAM_INT );
                $billingAddress->setId( $id ); // enforce ID to be present
                $item->setId( $id );
            } else {
                $stmt->bind( 37, $date ); // Creation time
            }

            $stmt->execute()->finish();

            if( $id === null )
            {
                $path = 'mshop/customer/manager/lara/newid';
                $item->setId( $this->newId( $conn, $path ) );
            }

            $dbm->release( $conn, $dbname );
        }
        catch( \Exception $e )
        {
            $dbm->release( $conn, $dbname );
            throw $e;
        }

        $this->addGroups( $item );

        $item = $this->savePropertyItems( $item, 'customer', $fetch );
        $item = $this->saveAddressItems( $item, 'customer', $fetch );
        return $this->saveListItems( $item, 'customer', $fetch );
    }


    public function getSubManager( $manager, $name = null )
    {
        return $this->getSubManagerBase( 'customer', $manager, ( $name === null ? 'Myproject' : $name ) );
    }
    protected function createItemBase( array $values = [], array $listItems = [], array $refItems = [],
                                       array $addresses = [], array $propItems = [] )
    {
        if( !isset( $this->addressManager ) ) {
            $this->addressManager = $this->getObject()->getSubManager( 'address' );
        }
        $address = $this->addressManager->createItem();
        $helper = $this->getPasswordHelper();

        $values['customer.siteid'] = $this->getContext()->getLocale()->getSiteId();

        return new \Aimeos\MShop\Customer\Item\Myproject( $address, $values, $listItems, $refItems,
            $this->salt, $helper, $addresses, $propItems );
    }

    protected function getPasswordHelper()
    {
        if( $this->helper ) {
            return $this->helper;
        }

        $config = $this->getContext()->getConfig();

        $name = $config->get( 'mshop/customer/manager/password/name', 'Standard' );

        $options = $config->get( 'mshop/customer/manager/password/options', [] );

        if( ctype_alnum( $name ) === false )
        {
            $classname = is_string( $name ) ? '\\Aimeos\\MShop\\Common\\Item\\Helper\\Password\\' . $name : '<not a string>';
            throw new \Aimeos\MShop\Exception( sprintf( 'Invalid characters in class name "%1$s"', $classname ) );
        }

        $classname = '\\Aimeos\\MShop\\Common\\Item\\Helper\\Password\\' . $name;

        if( class_exists( $classname ) === false ) {
            throw new \Aimeos\MShop\Exception( sprintf( 'Class "%1$s" not available', $classname ) );
        }

        $helper = new $classname( $options );

        self::checkClass( '\\Aimeos\\MShop\\Common\\Item\\Helper\\Password\\Iface', $helper );

        $this->helper = $helper;

        return $helper;
    }
}
