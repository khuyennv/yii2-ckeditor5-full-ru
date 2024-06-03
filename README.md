Полная и русская версия ckeditor5 для yii2

 "nigabrein/yii2-ckeditor5-full-ru": "*"

use nigabrein\ckeditor5\CKEditor;

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

 <?= $form->field($model_create, 'name')->widget(CKEditor::className(), 
    [
        'toolbar' => [
            'bold', 'italic','link','removeFormat',
        ],
    ]
); ?>

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

<?= $form->field($model, 'content')->widget(CKEditor::className(),[
  'clientOptions' => [
    'language' => 'en',
    'uploadUrl' => 'upload',   //url for upload files
    'uploadField' => 'image',  //field name in the upload form
  ]
]); ?>
