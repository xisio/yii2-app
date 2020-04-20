<?php

/**
 * Main configuration file for the frontend application.
 */

return [
    'id' => 'frontend',
    'homeUrl' =>  '/site/index',
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(__DIR__, 2) . '/vendor',
    'runtimePath' => dirname(__DIR__, 2) . '/runtime/frontend',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@upload' => '@frontend/uploads',
    ],
    'controllerNamespace' => 'frontend\controllers',

    'bootstrap' => ['log'],

    'params' => array_merge(require(__DIR__ . '/../../config/params.php'),[
        'icon-framework' => \kartik\icons\Icon::FAS,  // Font Awesome Icon framework
    ]
    ),
    'modules' =>  [
        'user' => [
            'classMap' => [
                'User' => common\models\User::class,
            ],
            'class' => Da\User\Module::class,
            'enableGdprCompliance' => false,
            'enableAutoLogin' => true,
            'administratorPermissionName' => 'admin',
            'administrators' => 'admin'
        ],
    ],
];
