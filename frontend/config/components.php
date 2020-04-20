<?php

/**
 * component configuration overrides for the backend application.
 */

return [
    'request' => [
        'cookieValidationKey' => 'api1337', // TODO this should be dynamic
    ],

    'urlManager' => [
        'enablePrettyUrl' => true,
        'enableStrictParsing' => false,
        'showScriptName' => false,
        'rules' => require(__DIR__ . '/url-rules.php'),
    ],
    'log' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets' => [
            [
                'class' => yii\log\FileTarget::class,
                'levels' => ['error', 'warning'],
                'logFile' => '@logs/backend-app.error.log',
                'except' => [
                    'yii\web\HttpException*',
                ],
            ],
            [
                'class' => yii\log\FileTarget::class,
                'levels' => ['error', 'warning'],
                'logFile' => '@logs/backend-http.error.log',
                'categories' => [
                    'yii\web\HttpException*',
                ],
            ],
            [
                'class' => yii\log\FileTarget::class,
                'levels' => ['info'],
                'logFile' => '@logs/backend-app.info.log',
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
				'class' => 'yii\i18n\PhpMessageSource',
				'basePath' => '@backend/messages',
				'sourceLanguage' => 'de',
				'forceTranslation' => true,
			],
		],
	],
    'user' => [
	'identityClass' => Da\User\Model\User::class,
        'enableAutoLogin' => true,
	'enableSession' => true,
    ],
    'assetManager' => [
        'linkAssets' => true,
	'appendTimestamp' => true,
    ],
    'cache' => [
	'class' => 'yii\caching\FileCache',
    ],
   'view' => [
        'theme' => [
            'pathMap' => [
                '@Da/User/resources/views' => '@common/views/user'
            ]
        ]
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
