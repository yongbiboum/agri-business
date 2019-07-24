<?php

return [
    'product' => [
        'manager' => [
            'name' => 'Product',
            'lists' => array(
                'type' => array(
                    'standard' => array(
                        'delete' => array(
                            'ansi' => '
							DELETE FROM "mshop_product_list_type"
							WHERE :cond AND siteid = ?
						'
                        ),
                        'insert' => array(
                            'ansi' => '
							INSERT INTO "mshop_product_list_type" (
								"code", "domain", "label", "pos", "status",
								"mtime", "editor", "siteid", "ctime"
							) VALUES (
								?, ?, ?, ?, ?, ?, ?, ?, ?
							)
						'
                        ),
                        'update' => array(
                            'ansi' => '
							UPDATE "mshop_product_list_type"
							SET "code" = ?, "domain" = ?, "label" = ?, "pos" = ?,
								"status" = ?, "mtime" = ?, "editor" = ?
							WHERE "siteid" = ? AND "id" = ?
						'
                        ),
                        'search' => array(
                            'ansi' => '
							SELECT mprolity."id" AS "product.lists.type.id", mprolity."siteid" AS "product.lists.type.siteid",
								mprolity."code" AS "product.lists.type.code", mprolity."domain" AS "product.lists.type.domain",
								mprolity."label" AS "product.lists.type.label", mprolity."status" AS "product.lists.type.status",
								mprolity."mtime" AS "product.lists.type.mtime", mprolity."editor" AS "product.lists.type.editor",
								mprolity."ctime" AS "product.lists.type.ctime", mprolity."pos" AS "product.lists.type.position"
							FROM "mshop_product_list_type" AS mprolity
							:joins
							WHERE :cond
							GROUP BY mprolity."id", mprolity."siteid", mprolity."code", mprolity."domain",
								mprolity."label", mprolity."status", mprolity."mtime", mprolity."editor",
								mprolity."ctime", mprolity."pos" /*-columns*/ , :columns /*columns-*/
							/*-orderby*/ ORDER BY :order /*orderby-*/
							LIMIT :size OFFSET :start
						'
                        ),
                        'count' => array(
                            'ansi' => '
							SELECT COUNT(*) AS "count"
							FROM (
								SELECT DISTINCT mprolity."id"
								FROM "mshop_product_list_type" AS mprolity
								:joins
								WHERE :cond
								LIMIT 10000 OFFSET 0
							) AS list
						'
                        ),
                        'newid' => array(
                            'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                            'mysql' => 'SELECT LAST_INSERT_ID()',
                            'oracle' => 'SELECT mshop_product_list_type_seq.CURRVAL FROM DUAL',
                            'pgsql' => 'SELECT lastval()',
                            'sqlite' => 'SELECT last_insert_rowid()',
                            'sqlsrv' => 'SELECT SCOPE_IDENTITY()',
                            'sqlanywhere' => 'SELECT @@IDENTITY',
                        ),
                    ),
                ),
                'standard' => array(
                    'aggregate' => array(
                        'ansi' => '
						SELECT "key", COUNT("id") AS "count"
						FROM (
							SELECT DISTINCT :key AS "key", mproli."id" AS "id"
							FROM "mshop_product_list" AS mproli
							:joins
							WHERE :cond
							/*-orderby*/ ORDER BY :order /*orderby-*/
							LIMIT :size OFFSET :start
						) AS list
						GROUP BY "key"
					'
                    ),
                    'delete' => array(
                        'ansi' => '
						DELETE FROM "mshop_product_list"
						WHERE :cond AND siteid = ?
					'
                    ),
                    'getposmax' => array(
                        'ansi' => '
						SELECT MAX( "pos" ) AS pos
						FROM "mshop_product_list"
						WHERE "siteid" = ? AND "parentid" = ? AND "typeid" = ?
							AND "domain" = ?
					'
                    ),
                    'insert' => array(
                        'ansi' => '
						INSERT INTO "mshop_product_list" (
							"parentid", "typeid", "domain", "refid", "start", "end",
							"config", "pos", "status", "mtime", "editor", "siteid", "ctime"
						) VALUES (
							?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
						)
					'
                    ),
                    'update' => array(
                        'ansi' => '
						UPDATE "mshop_product_list"
						SET "parentid" = ?, "typeid" = ?, "domain" = ?, "refid" = ?, "start" = ?, "end" = ?,
							"config" = ?, "pos" = ?, "status" = ?, "mtime" = ?, "editor" = ?
						WHERE "siteid" = ? AND "id" = ?
					'
                    ),
                    'updatepos' => array(
                        'ansi' => '
						UPDATE "mshop_product_list"
						SET "pos" = ?, "mtime" = ?, "editor" = ?
						WHERE "siteid" = ? AND "id" = ?
					'
                    ),
                    'move' => array(
                        'ansi' => '
						UPDATE "mshop_product_list"
						SET "pos" = "pos" + ?, "mtime" = ?, "editor" = ?
						WHERE "siteid" = ? AND "parentid" = ? AND "typeid" = ?
							AND "domain" = ? AND "pos" >= ?
					'
                    ),
                    'search' => array(
                        'ansi' => '
						SELECT mproli."id" AS "product.lists.id", mproli."parentid" AS "product.lists.parentid",
							mproli."siteid" AS "product.lists.siteid", mproli."typeid" AS "product.lists.typeid",
							mproli."domain" AS "product.lists.domain", mproli."refid" AS "product.lists.refid",
							mproli."start" AS "product.lists.datestart", mproli."end" AS "product.lists.dateend",
							mproli."config" AS "product.lists.config", mproli."pos" AS "product.lists.position",
							mproli."status" AS "product.lists.status", mproli."mtime" AS "product.lists.mtime",
							mproli."editor" AS "product.lists.editor", mproli."ctime" AS "product.lists.ctime"
						FROM "mshop_product_list" AS mproli
						:joins
						WHERE :cond
						GROUP BY mproli."id", mproli."parentid", mproli."siteid", mproli."typeid",
							mproli."domain", mproli."refid", mproli."start", mproli."end",
							mproli."config", mproli."pos", mproli."status", mproli."mtime",
							mproli."editor", mproli."ctime" /*-columns*/ , :columns /*columns-*/
						 /*-orderby*/ ORDER BY :order /*orderby-*/
						LIMIT :size OFFSET :start
					'
                    ),
                    'count' => array(
                        'ansi' => '
						SELECT COUNT(*) AS "count"
						FROM (
							SELECT DISTINCT mproli."id"
							FROM "mshop_product_list" AS mproli
							:joins
							WHERE :cond
							LIMIT 10000 OFFSET 0
						) AS list
					'
                    ),
                    'newid' => array(
                        'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                        'mysql' => 'SELECT LAST_INSERT_ID()',
                        'oracle' => 'SELECT mshop_product_list_seq.CURRVAL FROM DUAL',
                        'pgsql' => 'SELECT lastval()',
                        'sqlite' => 'SELECT last_insert_rowid()',
                        'sqlsrv' => 'SELECT SCOPE_IDENTITY()',
                        'sqlanywhere' => 'SELECT @@IDENTITY',
                    ),
                ),
            ),
            'property' => array(
                'type' => array(
                    'standard' => array(
                        'delete' => array(
                            'ansi' => '
							DELETE FROM "mshop_product_property_type"
							WHERE :cond AND siteid = ?
						'
                        ),
                        'insert' => array(
                            'ansi' => '
							INSERT INTO "mshop_product_property_type" (
								"code", "domain", "label", "pos", "status",
								"mtime", "editor", "siteid", "ctime"
							) VALUES (
								?, ?, ?, ?, ?, ?, ?, ?, ?
							)
						'
                        ),
                        'update' => array(
                            'ansi' => '
							UPDATE "mshop_product_property_type"
							SET "code" = ?, "domain" = ?, "label" = ?, "pos" = ?,
								"status" = ?, "mtime" = ?, "editor" = ?
							WHERE "siteid" = ? AND "id" = ?
						'
                        ),
                        'search' => array(
                            'ansi' => '
							SELECT mproprty."id" AS "product.property.type.id", mproprty."siteid" AS "product.property.type.siteid",
								mproprty."code" AS "product.property.type.code", mproprty."domain" AS "product.property.type.domain",
								mproprty."label" AS "product.property.type.label", mproprty."status" AS "product.property.type.status",
								mproprty."mtime" AS "product.property.type.mtime", mproprty."editor" AS "product.property.type.editor",
								mproprty."ctime" AS "product.property.type.ctime", mproprty."pos" AS "product.property.type.position"
							FROM "mshop_product_property_type" mproprty
							:joins
							WHERE :cond
							GROUP BY mproprty."id", mproprty."siteid", mproprty."code", mproprty."domain",
								mproprty."label", mproprty."status", mproprty."mtime", mproprty."editor",
								mproprty."ctime", mproprty."pos" /*-columns*/ , :columns /*columns-*/
							/*-orderby*/ ORDER BY :order /*orderby-*/
							LIMIT :size OFFSET :start
						'
                        ),
                        'count' => array(
                            'ansi' => '
							SELECT COUNT(*) AS "count"
							FROM (
								SELECT DISTINCT mproprty."id"
								FROM "mshop_product_property_type" mproprty
								:joins
								WHERE :cond
								LIMIT 10000 OFFSET 0
							) AS list
						'
                        ),
                        'newid' => array(
                            'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                            'mysql' => 'SELECT LAST_INSERT_ID()',
                            'oracle' => 'SELECT mshop_product_property_type_seq.CURRVAL FROM DUAL',
                            'pgsql' => 'SELECT lastval()',
                            'sqlite' => 'SELECT last_insert_rowid()',
                            'sqlsrv' => 'SELECT SCOPE_IDENTITY()',
                            'sqlanywhere' => 'SELECT @@IDENTITY',
                        ),
                    ),
                ),
                'standard' => array(
                    'delete' => array(
                        'ansi' => '
						DELETE FROM "mshop_product_property"
						WHERE :cond AND siteid = ?
					'
                    ),
                    'insert' => array(
                        'ansi' => '
						INSERT INTO "mshop_product_property" (
							"parentid", "typeid", "langid", "value",
							"mtime", "editor", "siteid", "ctime"
						) VALUES (
							?, ?, ?, ?, ?, ?, ?, ?
						)
					'
                    ),
                    'update' => array(
                        'ansi' => '
						UPDATE "mshop_product_property"
						SET "parentid" = ?, "typeid" = ?, "langid" = ?,
							"value" = ?, "mtime" = ?, "editor" = ?
						WHERE "siteid" = ? AND "id" = ?
					'
                    ),
                    'search' => array(
                        'ansi' => '
						SELECT mpropr."id" AS "product.property.id", mpropr."parentid" AS "product.property.parentid",
							mpropr."siteid" AS "product.property.siteid", mpropr."typeid" AS "product.property.typeid",
							mpropr."langid" AS "product.property.languageid", mpropr."value" AS "product.property.value",
							mpropr."mtime" AS "product.property.mtime", mpropr."editor" AS "product.property.editor",
							mpropr."ctime" AS "product.property.ctime"
						FROM "mshop_product_property" AS mpropr
						:joins
						WHERE :cond
						GROUP BY mpropr."id", mpropr."parentid", mpropr."siteid", mpropr."typeid",
							mpropr."langid", mpropr."value", mpropr."mtime", mpropr."editor",
							mpropr."ctime" /*-columns*/ , :columns /*columns-*/
						/*-orderby*/ ORDER BY :order /*orderby-*/
						LIMIT :size OFFSET :start
					'
                    ),
                    'count' => array(
                        'ansi' => '
						SELECT COUNT(*) AS "count"
						FROM (
							SELECT DISTINCT mpropr."id"
							FROM "mshop_product_property" AS mpropr
							:joins
							WHERE :cond
							LIMIT 10000 OFFSET 0
						) AS list
					'
                    ),
                    'newid' => array(
                        'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                        'mysql' => 'SELECT LAST_INSERT_ID()',
                        'oracle' => 'SELECT mshop_product_property_seq.CURRVAL FROM DUAL',
                        'pgsql' => 'SELECT lastval()',
                        'sqlite' => 'SELECT last_insert_rowid()',
                        'sqlsrv' => 'SELECT SCOPE_IDENTITY()',
                        'sqlanywhere' => 'SELECT @@IDENTITY',
                    ),
                ),
            ),
            'type' => array(
                'standard' => array(
                    'delete' => array(
                        'ansi' => '
						DELETE FROM "mshop_product_type"
						WHERE :cond AND siteid = ?
					'
                    ),
                    'insert' => array(
                        'ansi' => '
						INSERT INTO "mshop_product_type" (
							"code", "domain", "label", "pos", "status",
							"mtime", "editor", "siteid", "ctime"
						) VALUES (
							?, ?, ?, ?, ?, ?, ?, ?, ?
						)
					'
                    ),
                    'update' => array(
                        'ansi' => '
						UPDATE "mshop_product_type"
						SET "code" = ?, "domain" = ?, "label" = ?, "pos" = ?,
							"status" = ?, "mtime" = ?, "editor" = ?
						WHERE "siteid" = ? AND "id" = ?
					'
                    ),
                    'search' => array(
                        'ansi' => '
						SELECT mproty."id" AS "product.type.id", mproty."siteid" AS "product.type.siteid",
							mproty."code" AS "product.type.code", mproty."domain" AS "product.type.domain",
							mproty."label" AS "product.type.label", mproty."status" AS "product.type.status",
							mproty."mtime" AS "product.type.mtime", mproty."editor" AS "product.type.editor",
							mproty."ctime" AS "product.type.ctime", mproty."pos" AS "product.type.position"
						FROM "mshop_product_type" AS mproty
						:joins
						WHERE :cond
						GROUP BY mproty."id", mproty."siteid", mproty."code", mproty."domain",
							mproty."label", mproty."status", mproty."mtime", mproty."editor",
							mproty."ctime" /*-columns*/ , :columns /*columns-*/
						/*-orderby*/ ORDER BY :order /*orderby-*/
						LIMIT :size OFFSET :start
					'
                    ),
                    'count' => array(
                        'ansi' => '
						SELECT COUNT(*) AS "count"
						FROM (
							SELECT DISTINCT mproty."id"
							FROM "mshop_product_type" AS mproty
							:joins
							WHERE :cond
							LIMIT 10000 OFFSET 0
						) AS list
					'
                    ),
                    'newid' => array(
                        'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                        'mysql' => 'SELECT LAST_INSERT_ID()',
                        'oracle' => 'SELECT mshop_product_type_seq.CURRVAL FROM DUAL',
                        'pgsql' => 'SELECT lastval()',
                        'sqlite' => 'SELECT last_insert_rowid()',
                        'sqlsrv' => 'SELECT SCOPE_IDENTITY()',
                        'sqlanywhere' => 'SELECT @@IDENTITY',
                    ),
                ),
            ),
            'standard' => [
                'delete' => [
                    'ansi' => '
					DELETE FROM "mshop_product"
					WHERE :cond AND siteid = ?
				'
                ],
                'insert' => [
                    'ansi' => '
					INSERT INTO "mshop_product" (
						"typeid", "code", "label", "status", "start", "end",
						"config", "target", "editor", "mtime", "ctime", "siteid","note","unite",
						"localite", "position", "producteur_id","variete",
					) VALUES (
						?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
					)
				'
                ],
                'update' => [
                    'ansi' => '
					UPDATE "mshop_product"
					SET "typeid" = ?, "code" = ?, "label" = ?, "status" = ?, "start" = ?, "end" = ?,
					"config" = ?, "target" = ?, "editor" = ?, "mtime" = ?, "ctime" = ?,"producteur_id" = ?,
					"position" = ?, "localite" = ?, "unite" = ?, "note" = ?, "variete", 
					WHERE "siteid" = ? AND "id" = ?
				'
                ],
                'search' => [
                    'ansi' => '
					SELECT mpro."id" AS "product.id", mpro."siteid" AS "product.siteid",
						mpro."typeid" AS "product.typeid", mpro."code" AS "product.code",
						mpro."label" AS "product.label", mpro."config" AS "product.config",
						mpro."start" AS "product.datestart", mpro."end" AS "product.dateend",
						mpro."status" AS "product.status", mpro."ctime" AS "product.ctime",
						mpro."mtime" AS "product.mtime", mpro."editor" AS "product.editor",
						mpro."target" AS "product.target", mpro."producteur_id" AS "product.producteur_id",
						mpro."position" AS "product.position", mpro."localite" AS "product.localite",
						mpro."unite" AS "product.unite", mpro."note" AS "product.note", mpro."variete" AS "product.variete", upro."name" AS "users.name",
						upro."email" AS "users.email", upro."pseudo" AS "users.pseudo"
					FROM "mshop_product" AS mpro  
				    JOIN "users" AS upro ON mpro."producteur_id" = upro."id"
				    :joins
					WHERE :cond
					GROUP BY mpro."id", mpro."siteid", mpro."typeid", mpro."code",
						mpro."label", mpro."config", mpro."start", mpro."end",
						mpro."status", mpro."ctime", mpro."mtime", mpro."editor",
						mpro."target", mpro."producteur_id", mpro."position",mpro."localite",
						mpro."unite", mpro."note", mpro."variete", upro."name", upro."email",upro."pseudo"
						/*-columns*/ , :columns /*columns-*/
					/*-orderby*/ ORDER BY :order /*orderby-*/
					LIMIT :size OFFSET :start
				'
                ],
                'count' => [
                    'ansi' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT DISTINCT mpro."id"
						FROM "mshop_product" AS mpro
						:joins
						WHERE :cond
						LIMIT 10000 OFFSET 0
					) AS list
				'
                ],
                'newid' => [
                    'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                    'mysql' => 'SELECT LAST_INSERT_ID()',
                    'oracle' => 'SELECT mshop_product_seq.CURRVAL FROM DUAL',
                    'pgsql' => 'SELECT lastval()',
                    'sqlite' => 'SELECT last_insert_rowid()',
                    'sqlsrv' => 'SELECT SCOPE_IDENTITY()',
                    'sqlanywhere' => 'SELECT @@IDENTITY',
                ],
            ],
        ],
    ],
    'customer' => [
        'manager' => [
            'name' => 'Myproject',
            'address' => array(
                'laravel' => array(
                    'delete' => array(
                        'ansi' => '
						DELETE FROM "users_address"
						WHERE :cond AND siteid = ?
					',
                    ),
                    'insert' => array(
                        'ansi' => '
						INSERT INTO "users_address" (
							"parentid", "company", "vatid", "salutation", "title",
							"firstname", "lastname", "address1", "address2", "address3",
							"postal", "city", "state", "countryid", "langid", "telephone",
							"email", "telefax", "website", "longitude", "latitude", "flag",
							"pos", "mtime", "editor", "siteid", "ctime"
						) VALUES (
							?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
						)
					',
                    ),
                    'update' => array(
                        'ansi' => '
						UPDATE "users_address"
						SET "parentid" = ?, "company" = ?, "vatid" = ?, "salutation" = ?,
							"title" = ?, "firstname" = ?, "lastname" = ?, "address1" = ?,
							"address2" = ?, "address3" = ?, "postal" = ?, "city" = ?,
							"state" = ?, "countryid" = ?, "langid" = ?, "telephone" = ?,
							"email" = ?, "telefax" = ?, "website" = ?, "longitude" = ?, "latitude" = ?,
							"flag" = ?, "pos" = ?, "mtime" = ?, "editor" = ?, "siteid" = ?
						WHERE "id" = ?
					',
                    ),
                    'search' => array(
                        'ansi' => '
						SELECT lvuad."id" AS "customer.address.id", lvuad."parentid" AS "customer.address.parentid",
							lvuad."company" AS "customer.address.company", lvuad."vatid" AS "customer.address.vatid",
							lvuad."salutation" AS "customer.address.salutation", lvuad."title" AS "customer.address.title",
							lvuad."firstname" AS "customer.address.firstname", lvuad."lastname" AS "customer.address.lastname",
							lvuad."address1" AS "customer.address.address1", lvuad."address2" AS "customer.address.address2",
							lvuad."address3" AS "customer.address.address3", lvuad."postal" AS "customer.address.postal",
							lvuad."city" AS "customer.address.city", lvuad."state" AS "customer.address.state",
							lvuad."countryid" AS "customer.address.countryid", lvuad."langid" AS "customer.address.languageid",
							lvuad."telephone" AS "customer.address.telephone", lvuad."email" AS "customer.address.email",
							lvuad."telefax" AS "customer.address.telefax", lvuad."website" AS "customer.address.website",
							lvuad."longitude" AS "customer.address.longitude", lvuad."latitude" AS "customer.address.latitude",
							lvuad."flag" AS "customer.address.flag", lvuad."pos" AS "customer.address.position",
							lvuad."mtime" AS "customer.address.mtime", lvuad."editor" AS "customer.address.editor",
							lvuad."ctime" AS "customer.address.ctime", lvuad."siteid" AS "customer.address.siteid"
						FROM "users_address" AS lvuad
						:joins
						WHERE :cond
						GROUP BY lvuad."id", lvuad."parentid", lvuad."company", lvuad."vatid",
							lvuad."salutation", lvuad."title", lvuad."firstname", lvuad."lastname",
							lvuad."address1", lvuad."address2", lvuad."address3", lvuad."postal",
							lvuad."city", lvuad."state", lvuad."countryid", lvuad."langid",
							lvuad."telephone", lvuad."email", lvuad."telefax", lvuad."website",
							lvuad."longitude", lvuad."latitude", lvuad."flag", lvuad."pos",
							lvuad."mtime", lvuad."editor", lvuad."ctime"
						/*-orderby*/ ORDER BY :order /*orderby-*/
						LIMIT :size OFFSET :start
					',
                    ),
                    'count' => array(
                        'ansi' => '
						SELECT COUNT(*) AS "count"
						FROM (
							SELECT DISTINCT lvuad."id"
							FROM "users_address" AS lvuad
							:joins
							WHERE :cond
							LIMIT 10000 OFFSET 0
						) AS list
					',
                    ),
                    'newid' => array(
                        'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                        'mysql' => 'SELECT LAST_INSERT_ID()',
                        'oracle' => 'SELECT users_address.CURRVAL FROM DUAL',
                        'pgsql' => 'SELECT lastval()',
                        'sqlite' => 'SELECT last_insert_rowid()',
                        'sqlsrv' => 'SELECT SCOPE_IDENTITY()',
                        'sqlanywhere' => 'SELECT @@IDENTITY',
                    ),
                ),
            ),
            'lists' => array(
                'type' => array(
                    'laravel' => array(
                        'insert' => array(
                            'ansi' => '
							INSERT INTO "users_list_type"(
								"code", "domain", "label", "pos", "status",
								"mtime", "editor", "siteid", "ctime"
							) VALUES (
								?, ?, ?, ?, ?, ?, ?, ?, ?
							)
						',
                        ),
                        'update' => array(
                            'ansi' => '
							UPDATE "users_list_type"
							SET "code" = ?, "domain" = ?, "label" = ?, "pos" = ?,
								"status" = ?, "mtime" = ?, "editor" = ?
							WHERE "siteid" = ? AND "id" = ?
						',
                        ),
                        'delete' => array(
                            'ansi' => '
							DELETE FROM "users_list_type"
							WHERE :cond AND siteid = ?
						',
                        ),
                        'search' => array(
                            'ansi' => '
							SELECT lvulity."id" AS "customer.lists.type.id", lvulity."siteid" AS "customer.lists.type.siteid",
								lvulity."code" AS "customer.lists.type.code", lvulity."domain" AS "customer.lists.type.domain",
								lvulity."label" AS "customer.lists.type.label", lvulity."status" AS "customer.lists.type.status",
								lvulity."mtime" AS "customer.lists.type.mtime", lvulity."editor" AS "customer.lists.type.editor",
								lvulity."ctime" AS "customer.lists.type.ctime", lvulity."pos" AS "customer.lists.type.position"
							FROM "users_list_type" AS lvulity
							:joins
							WHERE :cond
							GROUP BY lvulity."id", lvulity."siteid", lvulity."code", lvulity."domain",
								lvulity."label", lvulity."status", lvulity."mtime", lvulity."editor",
								lvulity."ctime", lvulity."pos" /*-columns*/ , :columns /*columns-*/
							/*-orderby*/ ORDER BY :order /*orderby-*/
							LIMIT :size OFFSET :start
						',
                        ),
                        'count' => array(
                            'ansi' => '
							SELECT COUNT(*) AS "count"
							FROM (
								SELECT DISTINCT lvulity."id"
								FROM "users_list_type" AS lvulity
								:joins
								WHERE :cond
								LIMIT 10000 OFFSET 0
							) AS LIST
						',
                        ),
                        'newid' => array(
                            'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                            'mysql' => 'SELECT LAST_INSERT_ID()',
                            'oracle' => 'SELECT users_list_type.CURRVAL FROM DUAL',
                            'pgsql' => 'SELECT lastval()',
                            'sqlite' => 'SELECT last_insert_rowid()',
                            'sqlsrv' => 'SELECT SCOPE_IDENTITY()',
                            'sqlanywhere' => 'SELECT @@IDENTITY',
                        ),
                    ),
                ),
                'laravel' => array(
                    'aggregate' => array(
                        'ansi' => '
						SELECT "key", COUNT(DISTINCT "id") AS "count"
						FROM (
							SELECT :key AS "key", lvuli."id" AS "id"
							FROM "users_list" AS lvuli
							:joins
							WHERE :cond
							/*-orderby*/ ORDER BY :order /*orderby-*/
							LIMIT :size OFFSET :start
						) AS list
						GROUP BY "key"
					',
                    ),
                    'getposmax' => array(
                        'ansi' => '
						SELECT MAX( "pos" ) AS pos
						FROM "users_list"
						WHERE "siteid" = ?
							AND "parentid" = ?
							AND "typeid" = ?
							AND "domain" = ?
					',
                    ),
                    'insert' => array(
                        'ansi' => '
						INSERT INTO "users_list"(
							"parentid", "typeid", "domain", "refid", "start", "end",
						"config", "pos", "status", "mtime", "editor", "siteid", "ctime"
						) VALUES (
							?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
						)
					',
                    ),
                    'update' => array(
                        'ansi' => '
						UPDATE "users_list"
						SET "parentid"=?, "typeid" = ?, "domain" = ?, "refid" = ?, "start" = ?, "end" = ?,
							"config" = ?, "pos" = ?, "status" = ?, "mtime" = ?, "editor" = ?
						WHERE "siteid" = ? AND "id" = ?
					',
                    ),
                    'updatepos' => array(
                        'ansi' => '
						UPDATE "users_list"
							SET "pos" = ?, "mtime" = ?, "editor" = ?
						WHERE "siteid" = ? AND "id" = ?
					',
                    ),
                    'delete' => array(
                        'ansi' => '
						DELETE FROM "users_list"
						WHERE :cond AND siteid = ?
					',
                    ),
                    'move' => array(
                        'ansi' => '
						UPDATE "users_list"
							SET "pos" = "pos" + ?, "mtime" = ?, "editor" = ?
						WHERE "siteid" = ?
							AND "parentid" = ?
							AND "typeid" = ?
							AND "domain" = ?
							AND "pos" >= ?
					',
                    ),
                    'search' => array(
                        'ansi' => '
						SELECT lvuli."id" AS "customer.lists.id", lvuli."siteid" AS "customer.lists.siteid",
							lvuli."parentid" AS "customer.lists.parentid", lvuli."typeid" AS "customer.lists.typeid",
							lvuli."domain" AS "customer.lists.domain", lvuli."refid" AS "customer.lists.refid",
							lvuli."start" AS "customer.lists.datestart", lvuli."end" AS "customer.lists.dateend",
							lvuli."config" AS "customer.lists.config", lvuli."pos" AS "customer.lists.position",
							lvuli."status" AS "customer.lists.status", lvuli."mtime" AS "customer.lists.mtime",
							lvuli."editor" AS "customer.lists.editor", lvuli."ctime" AS "customer.lists.ctime"
						FROM "users_list" AS lvuli
						:joins
						WHERE :cond
						GROUP BY lvuli."id", lvuli."parentid", lvuli."siteid", lvuli."typeid",
							lvuli."domain", lvuli."refid", lvuli."start", lvuli."end",
							lvuli."config", lvuli."pos", lvuli."status", lvuli."mtime",
							lvuli."editor", lvuli."ctime" /*-columns*/ , :columns /*columns-*/
						/*-orderby*/ ORDER BY :order /*orderby-*/
						LIMIT :size OFFSET :start
					',
                    ),
                    'count' => array(
                        'ansi' => '
						SELECT COUNT(*) AS "count"
						FROM (
							SELECT DISTINCT lvuli."id"
							FROM "users_list" AS lvuli
							:joins
							WHERE :cond
							LIMIT 10000 OFFSET 0
						) AS list
					',
                    ),
                    'newid' => array(
                        'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                        'mysql' => 'SELECT LAST_INSERT_ID()',
                        'oracle' => 'SELECT users_list.CURRVAL FROM DUAL',
                        'pgsql' => 'SELECT lastval()',
                        'sqlite' => 'SELECT last_insert_rowid()',
                        'sqlsrv' => 'SELECT SCOPE_IDENTITY()',
                        'sqlanywhere' => 'SELECT @@IDENTITY',
                    ),
                ),
            ),
            'property' => array(
                'type' => array(
                    'laravel' => array(
                        'delete' => array(
                            'ansi' => '
							DELETE FROM "users_property_type"
							WHERE :cond AND siteid = ?
						'
                        ),
                        'insert' => array(
                            'ansi' => '
							INSERT INTO "users_property_type" (
								"code", "domain", "label", "pos", "status",
								"mtime", "editor", "siteid", "ctime"
							) VALUES (
								?, ?, ?, ?, ?, ?, ?, ?, ?
							)
						'
                        ),
                        'update' => array(
                            'ansi' => '
							UPDATE "users_property_type"
							SET "code" = ?, "domain" = ?, "label" = ?, "pos" = ?,
								"status" = ?, "mtime" = ?, "editor" = ?
							WHERE "siteid" = ? AND "id" = ?
						'
                        ),
                        'search' => array(
                            'ansi' => '
							SELECT lvuprty."id" AS "customer.property.type.id", lvuprty."siteid" AS "customer.property.type.siteid",
								lvuprty."code" AS "customer.property.type.code", lvuprty."domain" AS "customer.property.type.domain",
								lvuprty."label" AS "customer.property.type.label", lvuprty."status" AS "customer.property.type.status",
								lvuprty."mtime" AS "customer.property.type.mtime", lvuprty."editor" AS "customer.property.type.editor",
								lvuprty."ctime" AS "customer.property.type.ctime", lvuprty."pos" AS "customer.property.type.position"
							FROM "users_property_type" lvuprty
							:joins
							WHERE :cond
							GROUP BY lvuprty."id", lvuprty."siteid", lvuprty."code", lvuprty."domain",
								lvuprty."label", lvuprty."status", lvuprty."mtime", lvuprty."editor",
								lvuprty."ctime", lvuprty."pos" /*-columns*/ , :columns /*columns-*/
							/*-orderby*/ ORDER BY :order /*orderby-*/
							LIMIT :size OFFSET :start
						'
                        ),
                        'count' => array(
                            'ansi' => '
							SELECT COUNT(*) AS "count"
							FROM (
								SELECT DISTINCT lvuprty."id"
								FROM "users_property_type" lvuprty
								:joins
								WHERE :cond
								LIMIT 10000 OFFSET 0
							) AS list
						'
                        ),
                        'newid' => array(
                            'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                            'mysql' => 'SELECT LAST_INSERT_ID()',
                            'oracle' => 'SELECT users_property_type_seq.CURRVAL FROM DUAL',
                            'pgsql' => 'SELECT lastval()',
                            'sqlite' => 'SELECT last_insert_rowid()',
                            'sqlsrv' => 'SELECT SCOPE_IDENTITY()',
                            'sqlanywhere' => 'SELECT @@IDENTITY',
                        ),
                    ),
                ),
                'laravel' => array(
                    'delete' => array(
                        'ansi' => '
						DELETE FROM "users_property"
						WHERE :cond AND siteid = ?
					'
                    ),
                    'insert' => array(
                        'ansi' => '
						INSERT INTO "users_property" (
							"parentid", "typeid", "langid", "value",
							"mtime", "editor", "siteid", "ctime"
						) VALUES (
							?, ?, ?, ?, ?, ?, ?, ?
						)
					'
                    ),
                    'update' => array(
                        'ansi' => '
						UPDATE "users_property"
						SET "parentid" = ?, "typeid" = ?, "langid" = ?,
							"value" = ?, "mtime" = ?, "editor" = ?
						WHERE "siteid" = ? AND "id" = ?
					'
                    ),
                    'search' => array(
                        'ansi' => '
						SELECT lvupr."id" AS "customer.property.id", lvupr."parentid" AS "customer.property.parentid",
							lvupr."siteid" AS "customer.property.siteid", lvupr."typeid" AS "customer.property.typeid",
							lvupr."langid" AS "customer.property.languageid", lvupr."value" AS "customer.property.value",
							lvupr."mtime" AS "customer.property.mtime", lvupr."editor" AS "customer.property.editor",
							lvupr."ctime" AS "customer.property.ctime"
						FROM "users_property" AS lvupr
						:joins
						WHERE :cond
						GROUP BY lvupr."id", lvupr."parentid", lvupr."siteid", lvupr."typeid",
							lvupr."langid", lvupr."value", lvupr."mtime", lvupr."editor",
							lvupr."ctime" /*-columns*/ , :columns /*columns-*/
						/*-orderby*/ ORDER BY :order /*orderby-*/
						LIMIT :size OFFSET :start
					'
                    ),
                    'count' => array(
                        'ansi' => '
						SELECT COUNT(*) AS "count"
						FROM (
							SELECT DISTINCT lvupr."id"
							FROM "users_property" AS lvupr
							:joins
							WHERE :cond
							LIMIT 10000 OFFSET 0
						) AS list
					'
                    ),
                    'newid' => array(
                        'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                        'mysql' => 'SELECT LAST_INSERT_ID()',
                        'oracle' => 'SELECT users_property_seq.CURRVAL FROM DUAL',
                        'pgsql' => 'SELECT lastval()',
                        'sqlite' => 'SELECT last_insert_rowid()',
                        'sqlsrv' => 'SELECT SCOPE_IDENTITY()',
                        'sqlanywhere' => 'SELECT @@IDENTITY',
                    ),
                ),
            ),
            'lara' => array(
                'delete' => array(
                    'ansi' => '
					DELETE FROM "users"
					WHERE :cond
				',
                ),
                'insert' => array(
                    'ansi' => '
					INSERT INTO "users" (
						"siteid", "name", "company", "vatid", "salutation", "title",
						"firstname", "lastname", "address1", "address2", "address3",
						"postal", "city", "state", "countryid", "langid", "telephone",
						"telefax", "website", "email", "longitude", "latitude", "label",
						"birthday", "status", "vdate", "password",
						"updated_at", "editor", "created_at", "prenom", "civilite", "contact", "compagnie",
						"naissance", "profession", "pseudo"
					) VALUES (
						?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
					)
				',
                ),
                'update' => array(
                    'ansi' => '
					UPDATE "users"
					SET "siteid" = ?, "name" = ?, "company" = ?, "vatid" = ?,
						"salutation" = ?, "title" = ?, "firstname" = ?, "lastname" = ?,
						"address1" = ?, "address2" = ?, "address3" = ?, "postal" = ?,
						"city" = ?, "state" = ?, "countryid" = ?, "langid" = ?,
						"telephone" = ?, "telefax" = ?, "website" = ?, "email" = ?,
						"longitude" = ?, "latitude" = ?, "label" = ?, "birthday" = ?,
						"status" = ?, "vdate" = ?, "password" = ?, "updated_at" = ?, "editor" = ?,  "prenom" = ?,
						"civilite" = ?, "contact" = ?, "compagnie" = ?, "naissance" = ?, "profession" = ?, "pseudo" = ?
					WHERE "id" = ?
				',
                ),
                'search' => array(
                    'ansi' => '
					SELECT lvu."id" AS "customer.id", lvu."siteid" AS "customer.siteid",
						lvu."label" AS "customer.label", lvu."name" AS "customer.code",
						lvu."company" AS "customer.company", lvu."vatid" AS "customer.vatid",
						lvu."salutation" AS "customer.salutation", lvu."title" AS "customer.title",
						lvu."firstname" AS "customer.firstname", lvu."lastname" AS "customer.lastname",
						lvu."address1" AS "customer.address1", lvu."address2" AS "customer.address2",
						lvu."address3" AS "customer.address3", lvu."postal" AS "customer.postal",
						lvu."city" AS "customer.city", lvu."state" AS "customer.state",
						lvu."countryid" AS "customer.countryid", lvu."langid" AS "customer.languageid",
						lvu."telephone" AS "customer.telephone",lvu."telefax" AS "customer.telefax",
						lvu."website" AS "customer.website",lvu."email" AS "customer.email",
						lvu."longitude" AS "customer.longitude", lvu."latitude" AS "customer.latitude",
						lvu."birthday" AS "customer.birthday", lvu."status" AS "customer.status",
						lvu."vdate" AS "customer.dateverified", lvu."password" AS "customer.password",
						lvu."created_at" AS "customer.ctime", lvu."updated_at" AS "customer.mtime",
						lvu."editor" AS "customer.editor", lvu."prenom" AS "customer.prenom", lvu."civilite" AS "customer.civilite",
						lvu."contact" AS "customer.contact", lvu."compagnie" AS "customer.compagnie", lvu."naissance" AS "customer.naissance",
						lvu."profession" AS "customer.profession", lvu."pseudo" AS "customer.pseudo"
					FROM "users" AS lvu 
					:joins
					WHERE :cond
					GROUP BY lvu."id", lvu."siteid", lvu."label", lvu."name", lvu."company", lvu."vatid",
						lvu."salutation", lvu."title", lvu."firstname", lvu."lastname",
						lvu."address1", lvu."address2", lvu."address3", lvu."postal",
						lvu."city", lvu."state", lvu."countryid", lvu."langid",
						lvu."telephone", lvu."telefax", lvu."website", lvu."email",
						lvu."longitude", lvu."latitude", lvu."birthday", lvu."status",
						lvu."vdate", lvu."password", lvu."created_at", lvu."updated_at",
						lvu."editor", lvu."prenom", lvu."civilite", lvu."contact", lvu."compagnie", lvu."naissance", 
						lvu."profession", lvu."pseudo"
					/*-orderby*/ ORDER BY :order /*orderby-*/
					LIMIT :size OFFSET :start
				',
                ),
                'count' => array(
                    'ansi' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT DISTINCT lvu."id"
						FROM "users" AS lvu
						:joins
						WHERE :cond
						LIMIT 10000 OFFSET 0
					) AS list
				',
                ),
                'newid' => array(
                    'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                    'mysql' => 'SELECT LAST_INSERT_ID()',
                    'oracle' => 'SELECT users.CURRVAL FROM DUAL',
                    'pgsql' => 'SELECT lastval()',
                    'sqlite' => 'SELECT last_insert_rowid()',
                    'sqlsrv' => 'SELECT SCOPE_IDENTITY()',
                    'sqlanywhere' => 'SELECT @@IDENTITY',
                ),
            ),
        ],
    ],
];
