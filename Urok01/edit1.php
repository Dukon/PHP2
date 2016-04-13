<?php
// Настройки подключения к БД.
$hostname = 'localhost';	
$username = 'root'; 
$password = '';
$dbName   = 'urok1';


// Настройка дат
date_default_timezone_set('Europe/Moscow');

// Языковая настройка.
setlocale(LC_ALL, 'ru_RU.UTF-8'); // Устанавливаем нужную локаль (для дат, денег, запятых и пр.)
mb_internal_encoding('UTF-8'); // Устанавливаем кодировку строк

// Подключение к БД.
mysql_connect($hostname, $username, $password) or die('No connect with data base'); 
mysql_query('SET NAMES utf8'); // Устанавливаем нужную кодировку для БД
mysql_select_db($dbName) or die('No DB');


// Удаление статьи
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$result = mysql_query("UPDATE articles 
						SET title = 'Привет!', content='Статья новее'
						WHERE id_article = 2 ");

if (!$result)
	die ("DB error: " . mysql_error());
else
	echo 'Статей удалено: ' . mysql_affected_rows() . ' ID: ' . mysql_insert_id();

