<?php


return array(
    'table' => array(

        'users' => function( \Doctrine\DBAL\Schema\Schema $schema ){
            $table = $schema->getTable('users');

            $table->addColumn( 'prenom', 'string', array('length' => 70) );
            $table->addColumn( 'civilite', 'string', array('length' => 70) );
            $table->addColumn( 'contact', 'string', array('length' => 50) );
            $table->addColumn( 'compagnie', 'string', array('length' => 70) );
            $table->addColumn( 'naissance', 'date', array( 'notnull' => false ) );
            $table->addColumn( 'profession', 'string', array( 'length' => 70 ) );
            $table->addColumn( 'pseudo', 'string', array( 'length' => 70 ) );


            return $schema;
        },

        'users_address' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {
            $table = $schema->getTable('users_address');
            return $schema;
        },
        'users_list_type' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {
            $table = $schema->getTable('users_list_type');
            return $schema;
        },
        'users_list' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {
            $table = $schema->getTable('users_list');
            return $schema;
        },
        'users_property_type' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {
            $table = $schema->getTable('users_property_type');
            return $schema;
        },
        'users_property' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {
            $table = $schema->getTable('users_property');
            return $schema;
        },

        'groups' => function ( \Doctrine\DBAL\Schema\Schema $schema ){

            $table = $schema->createTable('groups');

            $table->addColumn('id','integer', array('autoincrement' => true, 'unsigned' => true) );
            $table->addColumn('name','string',['length' => 50]);
            $table->addColumn('code','string',['length' => 100]);

            $table->setPrimaryKey(array('id'),'pk_gr_id');
            $table->addUniqueIndex(array('code'),'unique_code');

            return $schema;
        },

        'users_groups' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

            $table = $schema->createTable( 'users_groups' );

            $table->addColumn( 'id', 'integer', array( 'autoincrement' => true ) );
            $table->addColumn( 'siteid', 'integer', [] );
            $table->addColumn( 'user_id', 'integer', ['unsigned' => true] );
            $table->addColumn( 'group_id', 'integer', ['unsigned' => true] );



            $table->setPrimaryKey( array( 'id' ), 'pk_usgr_id' );

            $table->addUniqueIndex( array( 'user_id', 'group_id' ), 'unq_usgr_us_gr' );
            $table->addIndex( array( 'user_id' ), 'fk_usgr_id' );
            $table->addIndex( array( 'group_id' ), 'fk_usgr_gr' );

            $table->addForeignKeyConstraint( 'users', array( 'user_id' ), array( 'id' ),
                array( 'onUpdate' => 'CASCADE', 'onDelete' => 'CASCADE' ), 'fk_usgr_id' );

            $table->addForeignKeyConstraint( 'groups', array( 'group_id' ), array( 'id' ),
                array( 'onUpdate' => 'CASCADE', 'onDelete' => 'CASCADE' ), 'fk_usgr_gr' );

            return $schema;
        },

    ),
);
