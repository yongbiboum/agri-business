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

            $table->addColumn( 'producteur_id', 'integer', array('unsigned' => true ) );

            $table->addColumn('note','integer', [] );

            $table->addColumn('unite','string', array('length' => 50, 'default' => 'KG' ) );

            $table->addColumn('localite','string', array('length' => 255 ) );

            $table->addColumn('position','string', array('length' => 255 ) );

            $table->addColumn('variete','string', array('length' => 255 ) );

            $table->addIndex( array( 'producteur_id' ), 'fk_mspr_prod' );

            $table->addForeignKeyConstraint( 'users', array( 'producteur_id' ), array( 'id' ),
                array('onUpdate' => 'CASCADE', 'onDelete' => 'CASCADE' ), 'fk_mspr_prod' );

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
        'mshop_product_rate' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

            $table = $schema->createTable('mshop_product_rate');

            $table->addColumn('id', 'integer', array( 'autoincrement' => true, 'unsigned' => true ));
            $table->addColumn('rating', 'integer', []);
            $table->addColumn('user_id', 'integer', ['unsigned' => true]);
            $table->addColumn('product_id', 'integer', []);

            $table->setPrimaryKey( array( 'id' ), 'pk_msprra_id' );

            $table->addUniqueIndex( array( 'user_id', 'product_id' ), 'unq_msprra_us_pro' );

            $table->addIndex( array( 'user_id' ), 'fk_msprra_us' );
            $table->addIndex( array( 'product_id' ), 'fk_msprra_pro' );

            $table->addForeignKeyConstraint( 'users', array( 'user_id' ), array( 'id' ),
                array( 'onUpdate' => 'CASCADE', 'onDelete' => 'CASCADE' ), 'fk_msprra_us' );

            $table->addForeignKeyConstraint( 'mshop_product', array( 'product_id' ), array( 'id' ),
                array( 'onUpdate' => 'CASCADE', 'onDelete' => 'CASCADE' ), 'fk_msprra_pro' );

            return $schema;
        },
        'mshop_product_soumission' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

            $table = $schema->createTable('mshop_product_soumission');

            $table->addColumn('id', 'integer', array( 'autoincrement' => true , 'unsigned' => true) );
            $table->addColumn('siteid', 'integer',[] );
            $table->addColumn('label', 'string',['length' => 50] );
            $table->addColumn('start', 'datetime',array( 'notnull' => false ) );
            $table->addColumn('end', 'datetime',array( 'notnull' => false ) );
            $table->addColumn('status', 'smallint',[] );
            $table->addColumn('user_id', 'integer', ['unsigned' => true]);
            $table->addColumn('prix', 'decimal',  array( 'precision' => 12, 'scale' => 2 ));
            $table->addColumn('stock', 'decimal',  array( 'precision' => 12, 'scale' => 2 ));
            $table->addColumn('details', 'string', ['length' => 255]);
            $table->addColumn('detail', 'string', ['length' => 255]);
            $table->addColumn('localite', 'string', ['length' => 255]);
            $table->addColumn('position', 'string', ['length' => 255]);
            $table->addColumn('unite', 'string', ['length' => 50 , 'default' => 'KG']);
            $table->addColumn( 'devise', 'string', array('length' => 255 ) );


            $table->setPrimaryKey( array( 'id' ), 'pk_msprso_id' );

            $table->addIndex( array( 'user_id' ), 'fk_msprso_us' );

            $table->addForeignKeyConstraint( 'users', array( 'user_id' ), array( 'id' ),
                array( 'onUpdate' => 'CASCADE', 'onDelete' => 'CASCADE' ), 'fk_msprso_us' );

            return $schema;
        },
    ),
);
