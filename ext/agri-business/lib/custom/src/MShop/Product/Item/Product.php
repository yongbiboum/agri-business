<?php
/**
 * Created by PhpStorm.
 * User: faya
 * Date: 18/04/2019
 * Time: 15:24
 */

namespace Aimeos\MShop\Product\Item;

class Product extends Standard
{

    private $myvalues;

    public function __construct( array $values, array $listItems = [],
                                 array $refItems = [], array $propItems = [])
    {
        parent::__construct( $values, $listItems ,
            $refItems , $propItems );
        $this->myvalues = $values;

    }

    public function getProducteurId()
    {
        if( isset( $this->myvalues['product.producteur_id'] ) ) {
            return (int) $this->myvalues['product.producteur_id'];
        }
        return 0;
    }

    public function setProducteurId( $val )
    {
        if( (int) $val !== $this->getProducteurId() )
        {
            $this->myvalues['product.producteur_id'] = (int) $val;
            $this->setModified();
        }
        return $this;
    }

    public function getPosition()
    {
        if( isset( $this->myvalues['product.position'] ) ) {
            return (string) $this->myvalues['product.position'];
        }
        return '';
    }

    public function setPosition( $val )
    {
        if( (string) $val !== $this->getPosition() )
        {
            $this->myvalues['product.position'] = (string) $val;
            $this->setModified();
        }
        return $this;
    }

    public function getLocalite()
    {
        if( isset( $this->myvalues['product.localite'] ) ) {
            return (string) $this->myvalues['product.localite'];
        }
        return '';
    }

    public function setLocalite( $val )
    {
        if( (string) $val !== $this->getLocalite() )
        {
            $this->myvalues['product.localite'] = (string) $val;
            $this->setModified();
        }
        return $this;
    }

    public function getUnite()
    {
        if( isset( $this->myvalues['product.unite'] ) ) {
            return (string) $this->myvalues['product.unite'];
        }
        return '';
    }

    public function setUnite( $val )
    {
        if( (string) $val !== $this->getUnite() )
        {
            $this->myvalues['product.unite'] = (string) $val;
            $this->setModified();
        }
        return $this;
    }

    public function getNote()
    {
        if( isset( $this->myvalues['product.note'] ) ) {
            return (int) $this->myvalues['product.note'];
        }
        return 0 ;
    }

    public function setNote( $val )
    {
        if( (int) $val !== $this->getNote() )
        {
            $this->myvalues['product.note'] = (int) $val;
            $this->setModified();
        }
        return $this;
    }
    public function getVariete()
    {
        if( isset( $this->myvalues['product.variete'] ) ) {
            return (string) $this->myvalues['product.variete'];
        }
        return '';
    }

    public function setVariete( $val )
    {
        if( (string) $val !== $this->getVariete() )
        {
            $this->myvalues['product.variete'] = (string) $val;
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
                case 'product.producteur_id': $this->setProducteurId( $value ); break;
                case 'product.position' : $this->setPosition($value);break;
                case 'product.localite' : $this->setLocalite($value);break;
                case 'product.unite' : $this->setUnite($value);break;
                case 'product.note' : $this->setNote($value);break;
                case 'product.variete' : $this->setVariete($value);break;

                default: $unknown[$key] = $value;
            }
        }

        return $unknown;
    }

    public function toArray( $private = false )
    {
        $list = parent::toArray( $private );

        if( $private === true ) {
            $list['product.producteur_id'] = $this->getProducteurId();
            $list['product.position'] = $this->getPosition();
            $list['product.localite'] = $this->getLocalite();
            $list['product.unite'] = $this->getUnite();
            $list['product.note'] = $this->getNote();
            $list['product.variete'] = $this->getVariete();
        }

        return $list;
    }
}
