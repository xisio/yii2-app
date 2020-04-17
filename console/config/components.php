<?php

/**
 * component configuration overrides for the console application.
 */

return [
    'log' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets' => [
            [
                'class' => yii\log\FileTarget::class,
                'levels' => ['error', 'warning'],
                'logFile' => '@logs/console-app.error.log',
                'logVars' => [],
            ],
            [
                'class' => yii\log\FileTarget::class,
                'levels' => ['info'],
                'logFile' => '@logs/console-app.info.log',
                'logVars' => [],
                'except' => [
                    'yii\db\*',
                ],
            ],
        ],
    ],
	'i18n' => [
	    'translations' => [
		'yii' => [
		    'class' => 'yii\i18n\PhpMessageSource',
		    'basePath' => '@app/messages'
		],
		'*' => [
		    'class' => 'yii\i18n\PhpMessageSource'
		],
	    ],
	],
	'user' => [
            'class' => 'yii\web\User',
            'identityClass' => '\Da\User\Model\User',
            'enableSession' => false,

        //'enableAutoLogin' => true,
        ],

];
