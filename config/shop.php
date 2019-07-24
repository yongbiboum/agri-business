<?php

return [

	'routes' => [
		// 'login' => ['middleware' => ['web']],
		// 'admin' => ['prefix' => 'admin', 'middleware' => ['web']],
		// 'jqadm' => ['prefix' => 'admin/{site}/jqadm', 'middleware' => ['web', 'auth']],
		// 'extadm' => ['prefix' => 'admin/{site}/extadm', 'middleware' => ['web', 'auth']],
		// 'jsonadm' => ['prefix' => 'admin/{site}/jsonadm', 'middleware' => ['web', 'auth']],
		// 'jsonapi' => ['prefix' => 'jsonapi', 'middleware' => ['web', 'api']],
		// 'account' => ['middleware' => ['web', 'auth']],
		// 'default' => ['middleware' => ['web']],
		// 'update' => [],
        'aimeos_shop_checkout' => ['middleware' => ['auth','client']],
	],

	'page' => [
	    'accueil' => ['catalog/shop'],
	    'account-prod' => [ 'account/accountlist','account/producteur','catalog/filter','account/accountaside','catalog/nav','catalog/logo','catalog/slide','catalog/footer','account/profile','account/subscription','account/history','account/favorite','account/watch','catalog/session' ],
        'account-index' => [ 'catalog/filter','account/accountlist','account/accountaside','catalog/nav','catalog/logo','catalog/slide','catalog/footer','account/profile','account/subscription','account/history','account/favorite','account/watch','basket/mini','catalog/session' ],
        'account-components' => [ 'catalog/filter','account/commandes','account/composants','account/accountaside','catalog/nav','catalog/logo','catalog/slide','catalog/footer','account/profile','account/subscription','account/history','account/favorite','account/watch','basket/mini','catalog/session' ],
        'basket-index' => [ 'basket/standard','catalog/logo','catalog/filter','basket/related','catalog/footer','catalog/slide','catalog/nav','basket/mini' ],
        'catalog-choose' => [ 'basket/mini','catalog/catlist','catalog/filter','catalog/footer','catalog/lists','catalog/logo','catalog/stage','catalog/slide','catalog/nav','catalog/categories' ],
        'catalog-count' => [ 'catalog/count' ],
        'catalog-detail' => [ 'basket/mini','catalog/logo','catalog/stage','catalog/footer','catalog/filter','catalog/detail','catalog/session','catalog/slide','catalog/nav' ],
        'catalog-list' => [ 'basket/mini','catalog/shop','catalog/filter','catalog/footer','catalog/logo','catalog/stage','catalog/slide','catalog/nav','catalog/categories' ],
        'catalog-stock' => [ 'catalog/stock' ],
        'catalog-suggest' => [ 'catalog/suggest' ],
        'catalog-tree' => [ 'basket/mini','catalog/filter','catalog/stage','catalog/lists' ],
        'checkout-confirm' => [ 'checkout/confirm' ],
        'checkout-index' => [ 'checkout/standard' ],
        'checkout-update' => [ 'checkout/update' ],
        'catalog-searchs' => ['basket/mini','catalog/searchs','catalog/filter','catalog/footer','catalog/logo','catalog/stage','catalog/slide','catalog/nav','catalog/categories' ],
	],

	/*
	'resource' => [
		'db' => [
			'adapter' => config('database.connections.mysql.driver', 'mysql'),
			'host' => config('database.connections.mysql.host', '127.0.0.1'),
			'port' => config('database.connections.mysql.port', '3306'),
			'socket' => config('database.connections.mysql.unix_socket', ''),,
			'database' => config('database.connections.mysql.database', 'forge'),
			'username' => config('database.connections.mysql.username', 'forge'),
			'password' => config('database.connections.mysql.password', ''),
			'stmt' => ["SET SESSION sort_buffer_size=2097144; SET NAMES 'utf8mb4'; SET SESSION sql_mode='ANSI'"],
			'limit' => 3, // maximum number of concurrent database connections
			'defaultTableOptions' => [
					'charset' => config('database.connections.mysql.charset'),
					'collate' => config('database.connections.mysql.collation'),
			],
		],
	],
	*/

	'admin' => [],

	'client' => [
		'html' => [
            'email' => [

                'from-email' => 'steveyong4@gmail.com',
                'from-name' => 'Agri-business',

            ],
		     'account'  => [
		        'favorite' => [
		            'decorators' => [
		              "global" => ["FavoriteDecorator"],
                    ],
                ],
                 'history' => [
                     'lists' => [

                         'decorators' =>  [
                             "global" => ["HistoryDecorator"],
                         ],
                     ],
                 ],
            ],
            'catalog' => [
                "detail" =>[
                    "decorators" => [
                        "global" => ["DetailDecorator"],
                    ],
                ],
                'categories' => [
                    'standard' => [
                        'subparts' => ['catsearch'],
                    ],
                ],
                'lists' => [
                    'standard' => [
                        'subparts' => ['promo','items','stagelist'],
                    ],
                    // 'size' => 9,
                ],
            ],
            'basket' => [
                'standard'=>[
                    'summary'=>[
                        'detail' => 'basket/standard/detail-standard.php',
                    ],
                    "decorators"=> [
                        "global" => ["BasketDecorator"],
                    ],
                ],
                'cache' => [
                    'enable' => false, // Disable basket content caching for development
                ],
            ],
			'common' => [
				'content' => [
					// 'baseurl' => config( 'app.url' ) . '/',
				],
				'template' => [
					// 'baseurl' => public_path( 'packages/aimeos/shop/themes/elegance' ),
				],
			],
		],
	],

	'controller' => [
	],

	'i18n' => [
	],

	'madmin' => [
		'cache' => [
			'manager' => [
				// 'name' => 'None', // Disable caching for development
			],
		],
		'log' => [
			'manager' => [
				'standard' => [
					// 'loglevel' => 7, // Enable debug logging into madmin_log table
				],
			],
		],
	],

	'mshop' => [
	],


	'command' => [
	],

	'frontend' => [
	],

	'backend' => [
	],

];
