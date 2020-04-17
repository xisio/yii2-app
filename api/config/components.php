<?php

/**
 * component configuration overrides for the api application.
 */

return [
    'user' => [
        'enableSession' => false,
        'loginUrl' => null,
        'identityClass' => Da\User\Model\User::class,
    ],
    'request' => [
        'parsers' => [
            'application/json' => yii\web\JsonParser::class,
        ],
        'enableCookieValidation' => false,
    ],
    'response' => [
        'class' => yii\web\Response::class,
        'format' =>  yii\web\Response::FORMAT_JSON,
        'formatters' => [
            yii\web\Response::FORMAT_JSON => [
                'class' => \yii\web\JsonResponseFormatter::class,
                'prettyPrint' => YII_DEBUG,
            ],
        ],
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'enableStrictParsing' => true,
        'showScriptName' => false,
        'rules' => require(__DIR__ . '/url-rules.php'),
    ],
    'log' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets' => [
            [
                'class' => yii\log\FileTarget::class,
                'levels' => ['error', 'warning'],
                'logFile' => '@logs/api-app.error.log',
                'except' => [
                    'yii\web\HttpException*',
                ],
            ],
            [
                'class' => yii\log\FileTarget::class,
                'levels' => ['error', 'warning'],
                'logFile' => '@logs/api-http.error.log',
                'categories' => [
                    'yii\web\HttpException*',
                ],
            ],
            [
                'class' => yii\log\FileTarget::class,
                'levels' => ['info'],
                'logFile' => '@logs/api-app.info.log',
                'logVars' => [],
                'except' => [
                    'yii\db\*',
                ],
            ],
        ],
    ],
];
