<?php
/**
 * Created by PhpStorm.
 * User: faya
 * Date: 18/04/2019
 * Time: 15:24
 */

namespace Aimeos\MShop\Customer\Item;

class Myproject extends Standard implements Iface
{

    private $myvalues;


    public function __construct( \Aimeos\MShop\Common\Item\Address\Iface $address,
                                 array $values = [], array $listItems = [], array $refItems = [], $salt = null,
                                 \Aimeos\MShop\Common\Item\Helper\Password\Iface $helper = null, array $addresses = [], array $propItems = [])
    {
        parent::__construct($address, $values, $listItems, $refItems, $salt, $helper, $addresses, $propItems );

        $this->myvalues = $values;

    }

    public function getPrenom()
    {
        if( isset( $this->myvalues['customer.prenom'] ) ) {
            return (string) $this->myvalues['customer.prenom'];
        }
        return '';
    }

    public function setPrenom( $val )
    {
        if( (string) $val !== $this->getPrenom() )
        {
            $this->myvalues['customer.prenom'] = (string) $val;
            $this->setModified();
        }
        return $this;
    }

    public function getCivilite()
    {
        if( isset( $this->myvalues['customer.civilite'] ) ) {
            return (string) $this->myvalues['customer.civilite'];
        }
        return '';
    }

    public function setCivilite( $val )
    {
        if( (string) $val !== $this->getCivilite() )
        {
            $this->myvalues['customer.civilite'] = (string) $val;
            $this->setModified();
        }
        return $this;
    }

    public function getContact()
    {
        if( isset( $this->myvalues['customer.contact'] ) ) {
            return (string) $this->myvalues['customer.contact'];
        }
        return '';
    }

    public function setContact( $val )
    {
        if( (string) $val !== $this->getContact() )
        {
            $this->myvalues['customer.contact'] = (string) $val;
            $this->setModified();
        }
        return $this;
    }

    public function getCompagnie()
    {
        if( isset( $this->myvalues['customer.compagnie'] ) ) {
            return (string) $this->myvalues['customer.compagnie'];
        }
        return '';
    }

    public function setCompagnie( $val )
    {
        if( (string) $val !== $this->getCompagnie() )
        {
            $this->myvalues['customer.compagnie'] = (string) $val;
            $this->setModified();
        }
        return $this;
    }

    public function getNaissance()
    {
        if( isset( $this->myvalues['customer.naissance'] ) ) {
            return (string) $this->myvalues['customer.naissance'];
        }
        return '';
    }

    public function setNaissance( $val )
    {
        if( (string) $val !== $this->getNaissance() )
        {
            $this->myvalues['customer.naissance'] = (string) $val;
            $this->setModified();
        }
        return $this;
    }

    public function getProfession()
    {
        if( isset( $this->myvalues['customer.profession'] ) ) {
            return (string) $this->myvalues['customer.profession'];
        }
        return '';
    }

    public function setProfession( $val )
    {
        if( (string) $val !== $this->getProfession() )
        {
            $this->myvalues['customer.profession'] = (string) $val;
            $this->setModified();
        }
        return $this;
    }
    public function getPseudo()
    {
        if( isset( $this->myvalues['customer.pseudo'] ) ) {
            return (string) $this->myvalues['customer.pseudo'];
        }
        return '';
    }

    public function setPseudo( $val )
    {
        if( (string) $val !== $this->getPseudo() )
        {
            $this->myvalues['customer.pseudo'] = (string) $val;
            $this->setModified();
        }
        return $this;
    }
    public function fromArray( array $list )
    {
        $unknown = [];
        $list = parent::fromArray( $list );

        foreach( $list as $key => $value )
        {
            switch( $key )
            {
                case 'customer.prenom': $this->setPrenom( $value ); break;
                case 'customer.civilite' : $this->setCivilite($value);break;
                case 'customer.contact' : $this->setContact($value);break;
                case 'customer.compagnie' : $this->setCompagnie($value);break;
                case 'customer.naissance' : $this->setNaissance($value);break;
                case 'customer.profession' : $this->setProfession($value);break;
                case 'customer.pseudo' : $this->setPseudo($value);break;

                default: $unknown[$key] = $value;
            }
        }

        return $unknown;
    }

    public function toArray( $private = false )
    {
        $list = parent::toArray( $private );

        if( $private === true ) {
            $list['customer.prenom'] = $this->getPrenom();
            $list['customer.civilite'] = $this->getCivilite();
            $list['customer.contact'] = $this->getContact();
            $list['customer.compagnie'] = $this->getCompagnie();
            $list['customer.naissance'] = $this->getNaissance();
            $list['customer.profession'] = $this->getProfession();
            $list['customer.pseudo'] = $this->getPseudo();
        }

        return $list;
    }
}
