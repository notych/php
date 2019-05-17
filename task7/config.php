<?php

define(TEMPLATE, 'templates/index.php');
define(EMAIL, 'notych.sasha@gmail.com');
define(STYLE_ERROR, 'style="color: red"');
define(SELECT, serialize (array(
    'Выберите тему',
    'Сообщение администратору',
    'Предложение'
    ,'Жалоба'
)));
define(HTML_VALUE, serialize (array(
   '%NAME_STYLE%'=>'',
   '%NAME_ERROR%'=>'',
   '%NAME_VALUE%'=>'',
   '%EMAIL_STYLE%'=>'',
   '%EMAIL_ERROR%'=>'',
   '%EMAIL_VALUE%'=>'',
   '%SUBJECT_STYLE%'=>'',
   '%SUBJECT_ERROR%'=>'',
   '%MESSAGE_STYLE%'=>'', 
   '%MESSAGE_ERROR%'=>'', 
   '%MESSAGE_VALUE%'=>'',
   '%MAIL%'=>''
)));	


