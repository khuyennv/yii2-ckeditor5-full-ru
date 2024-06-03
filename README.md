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
в раздел require вашего файла `composer.json`

Использование
-----
Путь
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
Конфликт стилей bootstrap5 и ckeditor5 - если поле ckeditor5 находиться в модальном окне bootstrap5 то не работает функция 'link' у ckeditor5.
Решение:
```
document.addEventListener("DOMContentLoaded", function() {
  var button = document.querySelector('button[crutch-ckeditor-btn="true"]');
  
  if (button) {
    button.addEventListener("click", function() {
        
      var element = document.querySelector('.ck-body-wrapper');
      if(element){
        //element.style.position = 'fixed';
        //element.style.zIndex = 1060;
          
        var modal = document.querySelector('div[crutch-ckeditor-modal="true"]');
        if(modal){
            modal.appendChild(element);
        }
      }
    });
  }
});

//crutch-ckeditor-btn="true" параметр на кнопку с модальным окном с ckeditor

//crutch-ckeditor-modal="true" параметр на модальное окно с ckeditor
```

Чтобы убрать с поля ckeditor5 логотип нужно скрыть ck-powered-by:
```
.ck.ck-powered-by a {
    display: none !important;
}
```
