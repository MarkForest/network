<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class RegisterAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		'css/style.css',
		'css/ionicons.min.css',
        'css/font-awesome.min.css',
        'https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i',
        'images/favicon.png',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/jquery.appear.min.js',
		'js/jquery.incremental-counter.js',
        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
