<?php

// Настройки подключения к БД.
$hostname = 'localhost';	
$username = 'root'; 
$password = '';
$dbName   = 'test6';

// Настройка дат
date_default_timezone_set('Europe/Moscow');

// Языковая настройка.
setlocale(LC_ALL, 'ru_RU.UTF-8'); // Устанавливаем нужную локаль (для дат, денег, запятых и пр.)
mb_internal_encoding('UTF-8'); // Устанавливаем кодировку строк

// Подключение к БД.
mysql_connect($hostname, $username, $password) or die('No connect with data base'); 
mysql_query('SET NAMES utf8'); // Устанавливаем нужную кодировку для БД
mysql_select_db($dbName) or die('No DB');

// Постраничная навигация
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$articles_per_page = 10;
$skip = ($page-1) * $articles_per_page;
$result = mysql_query("SELECT * FROM articles 
						ORDER BY id_article 
						LIMIT $skip, $articles_per_page");

if (!$result)
	die ("DB error: " . mysql_error());

while ($row = mysql_fetch_assoc($result)) {
	echo $row['id_article'] . '<br>';
	echo $row['title'] . '<br>';
	echo $row['content'] . '<hr>';
}

// Вставка статьи
$result = mysql_query('INSERT INTO articles (title, content)
						VALUES ("Новая статья", "Новый текст")');

if (!$result)
	die ("DB error: " . mysql_error());
else
	echo 'Статей добавлено: ' . mysql_affected_rows() . ' ID: ' . mysql_insert_id();

