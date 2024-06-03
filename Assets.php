<?php
namespace nigabrein\ckeditor5;
use yii\web\AssetBundle;

class Assets extends AssetBundle
{
    public $sourcePath = '@vendor/nigabrein/yii2-ckeditor5-full-ru/assets/';
    public $css = [
    ];

    public $js = [
        'ckeditor.js',
        'ckeditor-collection.js'
    ];

    public $depends = [
    ];
}