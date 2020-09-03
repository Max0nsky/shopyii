<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',    
        'css/style.css',
        'css/responsive.css',
        'css/custom.css'
    ];
    public $js = [
        'js/jquery-3.2.1.min.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/jquery.superslides.min.js',
        'js/images-loded.min.js',
        'js/isotope.min.js',
        'js/baguetteBox.min.js',
        'js/form-validator.min.js',
        'js/contact-form-script.js',
        'js/custom.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
