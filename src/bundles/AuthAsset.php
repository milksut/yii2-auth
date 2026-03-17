<?php

namespace portalium\auth\bundles;

use yii\web\AssetBundle;
use portalium\theme\bundles\AppAsset;

class AuthAsset extends AssetBundle
{
    public $sourcePath = '@vendor/portalium/yii2-auth/src/assets';

    public $css = [
        'css/auth.css',
    ];

    public $depends = [
        AppAsset::class,
    ];
    
    public $jsOptions = [
        'appendTimestamp' => true,
    ];

    public $publishOptions = [
        'forceCopy' => YII_DEBUG,
    ];
}
