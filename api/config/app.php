<?php

/**
 * Main configuration file for the api application.
 */

$config = [
    'id' => 'api',

    'basePath' => dirname(__DIR__),
   	'vendorPath' => dirname(__DIR__, 2) . '/vendor',
    'runtimePath' => dirname(__DIR__, 2) . '/runtime/api',

    'controllerNamespace' => 'api\controllers',

    'bootstrap' => ['log'],

    'params' => require(__DIR__ . '/../../config/params.php'),
];

$config['bootstrap'][] = 'debug';
$config['modules']= [
    'debug' => [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
        'panels' => [
            'db' => [
                'class' => 'yii\debug\panels\DbPanel',
                'defaultOrder' => [
                    'seq' => SORT_ASC
                ],
                'defaultFilter' => [
                    'type' => 'SELECT'
                ]
            ],
        ],
    ],
];

return $config;

