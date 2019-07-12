<?php
/**
 * Created by PhpStorm.
 * User: faya
 * Date: 22/04/2019
 * Time: 09:58
 */
return array(
    'table' => array(
        'mshop_product' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

            $table = $schema->getTable( 'mshop_product' );

            $table->addColumn( 'producteur', 'string', array('length' => 255 ) );

            $table->addIndex( array( 'producteur' ), 'prodowner' );


            $table->addForeignKeyConstraint( 'users', array( 'producteur' ), array( 'email' ),
                array( 'onUpdate' => 'RESTRICT', 'onDelete' => 'RESTRICT' ), 'prodowner' );

            return $schema;
        },

        'mshop_product_list_type' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

            $table = $schema->getTable( 'mshop_product_list_type' );

            return $schema;
        },
        'mshop_product_type' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

            $table = $schema->getTable( 'mshop_product_type' );

            return $schema;
        },
        'mshop_product_list' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

            $table = $schema->getTable( 'mshop_product_list' );

            return $schema;
        },
        'mshop_product_property_type' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

            $table = $schema->getTable( 'mshop_product_property_type' );

            return $schema;
        },
        'mshop_product_property' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

            $table = $schema->getTable( 'mshop_product_property' );

            return $schema;
        },
    ),
);
