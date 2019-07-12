<?php
/**
 * Created by PhpStorm.
 * User: faya
 * Date: 05/07/2019
 * Time: 14:32
 */

class Myproject extends Standard
{
    private $myvalues;



    public function __construct( array $values, ... )

    {

        parent::__construct( $values, ... )

        $this->myvalues = $values;

    }



    public function getMyId()

    {

        if( isset( $this->myvalues['myid'] ) ) {

            return (string) $this->myvalues['myid'];

        }

        return '';

    }



    public function setMyId( $val )

    {

        if( (string) $val !== $this->getMyId() )

        {

            $this->values['myid'] = (string) $myid;

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

                case 'myid': $this->setMyId( $value ); break;

                default: $unknown[$key] = $value;

            }

        }



        return $unknown;

    }



    public function toArray( $private = false )

    {

        $list = parent::toArray( $private );



        if( $private === true ) {

            $list['myid'] = $this->getMyId();

        }



        return $list;

    }
}
