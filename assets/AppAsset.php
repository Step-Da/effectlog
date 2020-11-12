<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * Основной пакет активов приложения.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/mapCard.css',
        'css/loader.css',
        'css/logList.css'
    ];
    public $js = [
        'js/JQuery.js',
        'js/load.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
