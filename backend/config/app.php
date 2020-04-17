<?php

/**
 * Main configuration file for the backend application.
 */

return [
    'id' => 'backend',
    'homeUrl' =>  '/site/index',
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(__DIR__, 2) . '/vendor',
    'runtimePath' => dirname(__DIR__, 2) . '/runtime/backend',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@upload' => '@backend/uploads',
    ],
    'controllerNamespace' => 'backend\controllers',

    'bootstrap' => ['log'],

    'params' => array_merge(require(__DIR__ . '/../../config/params.php'),[
        'icon-framework' => \kartik\icons\Icon::FAS,  // Font Awesome Icon framework
    ]
    ),
    'modules' =>  [
        'user' => [
            'class' => Da\User\Module::class,
            'enableGdprCompliance' => false,
            'enableAutoLogin' => true,
            'administratorPermissionName' => 'admin',
            'administrators' => 'admin'
        ],
    ],
];
