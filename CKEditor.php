<?php

namespace khuyennv\ckeditor5;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\widgets\InputWidget;

/**
 * CKEditor renders a CKEditor5 js plugin for classic editing.
 * @package khuyennv\ckeditor5
 */
class CKEditor extends InputWidget
{
    public $clientOptions = [
        'language'=> 'en',
        'toolbar' => [
            'items' => [
		'heading',
		'|',
		'bold',
		'italic',
		'link',
		'bulletedList',
		'numberedList',
		'|',
		'indent',
		'outdent',
		'|',
		'imageUpload',
		'blockQuote',
		'insertTable',
		'mediaEmbed',
		'undo',
		'redo',
		'fontSize',
		'fontFamily',
		'fontColor',
		'fontBackgroundColor',
		'highlight',
		'imageInsert',
		'alignment'
            ],
        ]
    ];
    
    public $toolbar;
    
    public $uploadUrl;
    
    public $value;
    
    /**
     * @inheritdoc
     */
    
    public function init()
    {
        parent::init();
       // $this->initOptions();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->hasModel()) {
            echo Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textarea($this->name, $this->value, $this->options);
        }
        $this->registerAssets($this->getView());
        $this->registerPlugin();

    }

    /**
     * Registers CKEditor plugin
     */
    protected function registerPlugin()
    {
        if (!empty($this->value)){
            $this->value = "editor.setData('{$this->value}');";
        }
        if (!empty($this->toolbar)) {
            $this->clientOptions['toolbar'] = $this->toolbar;
        }
        if (!empty($this->uploadUrl)) {
            $this->clientOptions['ckfinder'] = ['uploadUrl' => $this->uploadUrl];
        }
        $clientOptions = Json::encode($this->clientOptions);

        $js = new JsExpression(
            "ClassicEditor.create( document.querySelector( '#{$this->options['id']}' ), {$clientOptions} ).then(
                editor=>{
                    console.log( editor );
                    {$this->value}
                    CKEditor.set('{$this->options['id']}',editor);
                }
            ).catch( error => {console.error( error );} );"
        );
        
        $replacejs = new JsExpression(
            "CKEditor.replace=(element)=>{
                ClassicEditor.create( document.querySelector( '#'+element ), {$clientOptions} ).then( 
                    editor=>{
                        CKEditor.set(element,editor);
                    }
            ).catch( error => {console.error( error );} );}"
        );
        
        $this->view->registerJs($js);
        $this->view->registerJs($replacejs);
    }

    protected function registerAssets($view)
    {
        Assets::register($view);
    }
}