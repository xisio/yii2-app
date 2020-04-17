<?php

/**
 * General application components that are used in web and console application.
 *
 * Included by api/config/app.php, console/config/app.php and backend/config/app.php
 */

return [
    'cache' => [
        'class' => yii\caching\FileCache::class,
        'cachePath' => '@root/runtime/cache',
    ],
    'db' => [
        'class' => yii\db\Connection::class,
        'dsn' => 'sqlite:@root/runtime/database.sqlite',
        'charset' => 'utf8',
    ],
    'authManager' => [
        'class' => 'yii\rbac\DbManager',
        'defaultRoles' => ['guest']
        // uncomment if you want to cache RBAC items hierarchy
        // 'cache' => 'cache',
	],
	'i18n' => [
		'translations' => [
			'*' => [
				'class' => 'yii\i18n\PhpMessageSource',
				'basePath' => '@common/messages',
				'sourceLanguage' => 'en',
				'forceTranslation' => true,
			],
		]
	],
];
