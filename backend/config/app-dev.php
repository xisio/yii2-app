<?php

/**
 * Main configuration file for the backend application.
 *
 * Develop environment.
 */

$config = array_merge(require(__DIR__ . '/app.php'), [
    'components' => array_merge(
        require __DIR__ . '/../../config/components.php', // common config
        require __DIR__ . '/../../config/components-dev.php', // common config (env overrides)
        require __DIR__ . '/components.php' // backend specific config
    ),
]);
$config['language'] = 'en';
// enable Gii module
$config['bootstrap'][] = 'gii';
$config['bootstrap'][] = 'debug';
$config['modules']= [
    'gii' => [
        'class' => yii\gii\Module::class,
        // add ApiGenerator to Gii module
        'generators' => require __DIR__ . '/../../config/gii-generators.php',
        'allowedIPs' => ['*'],
    ],
    'gridview' => [
        'class' => '\kartik\grid\Module',
        // see settings on http://demos.krajee.com/grid#module
    ],
    'datecontrol' => [
        'class' => '\kartik\datecontrol\Module',
        // see settings on http://demos.krajee.com/datecontrol#module
    ],
    // If you use tree table
    'treemanager' =>  [
        'class' => '\kartik\tree\Module',
        // see settings on http://demos.krajee.com/tree-manager#module
    ],
    'rbac' => [
        'class' => 'yii2mod\rbac\Module',
    ],
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
    'user' => [
        'class' => Da\User\Module::class,
        'administratorPermissionName' => 'admin',
        'administrators' => ['admin'],
        'routes' => [
            '<id:\d+>' => 'profile/show',
            '<action:(login|logout)>' => 'security/<action>',
            '<action:(register|resend)>' => 'registration/<action>',
            'confirm/<id:\d+>/<code:[A-Za-z0-9_-]+>' => 'registration/confirm',
            'forgot' => 'recovery/request',
            'recover/<id:\d+>/<code:[A-Za-z0-9_-]+>' => 'recovery/reset',
            'settings/<action:\w+>' => 'settings/<action>',
            'permission/<action>' => 'permission/<action>',
            'role/<action>' => 'permission/<action>',
            'role/<action>' => 'permission/<action>',
            'rule/<action>' => 'rule/<action>',
        ],
    ],
];
return $config;
