yii2-ckeditor5-full-ru
==============
Полная и русская версия ckeditor5 для yii2

Установка
------------
Предпочтительный способ установки этого расширения — через [composer](http://getcomposer.org/download/).

Либо вставьте
```
 "nigabrein/yii2-ckeditor5-full-ru": "*"
```
в раздел require вашего файла `composer.json`.

Использование
-----
После установки расширения просто используйте его в своем коде:

путь
```
use nigabrein\ckeditor5\CKEditor;
```

Виджет 1
```
<?= $form->field($model, 'text')->widget(CKEditor::className(), 
    [
        'toolbar' => [
            'SourceEditing', 
                '|', 'undo', 'redo',
                '|', 'heading',
                '|', 'bold', 'italic',
                '|', 'alignment:left', 'alignment:right', 'alignment:center',
                '|', 'link', 'uploadImage', 'blockQuote', 'insertTable',
                '|', 'bulletedList', 'numberedList',
                '|', 'removeFormat',
        ],
        'uploadUrl' => '/someUpload.php',
    ]
); ?>
```

Виджет 2
```
 <?= $form->field($model_create, 'name')->widget(CKEditor::className(), 
    [
        'toolbar' => [
            'bold', 'italic','link','removeFormat',
        ],
    ]
); ?>
```
Функции
```
'uploadUrl' => 'site/upload', //this will be the url where you want to ckeditor send the post request with file data

'toolbar' => [
  'Sourceediting',
  '|', 'heading', 
  '|',
  'bold', 
  'italic', 
  'link',
  'bulletedList',
  'numberedList',
  'blockQuote',
  '|',
  'indent',
  'outdent',
  '|',
  'imageUpload',
  'insertTable',
  'mediaEmbed',
  'undo',
  'redo',
  'exportPdf',
  'exportWord',
  'fontSize',
  'fontFamily',
  'fontColor',
  'fontBackgroundColor',
  'highlight',
  'imageInsert',
  'alignment',
  'alignment:left', 
  'alignment:right', 
  'alignment:center',
  'code',
  'removeFormat'
],
```

Прочее
```
<?= $form->field($model, 'content')->widget(CKEditor::className(),[
  'clientOptions' => [
    'language' => 'en',
    'uploadUrl' => 'upload',   //url for upload files
    'uploadField' => 'image',  //field name in the upload form
  ]
]); ?>
```
