<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class GulpAsset extends AssetBundle
{
    public $basePath = '@webroot/build';
    public $baseUrl = '@web/build';
    public $css = [
        'styles/main.min.css',
    ];
    public $js = [
        'js/main.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
