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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		'css/style.css',
		'css/ionicons.min.css',
        'css/font-awesome.min.css',
        'css/emoji.css',
        'https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i',
        ['images/favicon.png','type'=>'image/png'],
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/bootstrap-filestyle.min.js',
        'js/masonry.pkgd.min.js',
        'js/jquery.sticky-kit.min.js',
        'js/jquery.scrollbar.min.js',
        'js/script.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
