<?php

namespace backend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $sourcePath= __DIR__;
    public $basePath = '';
    public $css = [
        'css/style.css',
        //['css/print.css', 'media' => 'print'],
    ];
    public $js = [
        'js/multi.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}


