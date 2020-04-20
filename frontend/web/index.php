<?php

require(__DIR__ . '/../../config/env.php');

$config = require(__DIR__ . '/../config/app-' . YII_ENV . '.php');

require(__DIR__ . '/../functions.php');
$app = new yii\web\Application($config);
$app->run();
