<?php

include_once('startup.php');
include_once('model.php');

//подключаемся к БД
startup();

//Извлекаем все статьи
$articles = articles_all();

//кодировку
header('Content-type: text/html; charset=utf-8');

//вывод в шаблон
include('theme/editor.php');

include('theme/editor.php');

include('theme/editor.php');

include('theme/editor.php');
