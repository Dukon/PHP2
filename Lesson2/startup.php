<?php

function startup()
{
	getDbConnect();

	//Языковая настройка
	setlocale(LC_ALL, 'ru_RU.UTF-8');
	
	mb_internal_encoding('UTF-8');

	//Открытие сессии
	session_start();
}

function getDbConnect()
{
	static $link;

	//настройки БД
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbName = 'lesson2';

	//только одно соединение с бд
	if ($link === null){
		//подключаемся к БД
		$link = mysqli_connect($hostname, $username, $password) or die ("No connect");
		mysqli_query($link, 'SET_NAMES utf-8');
		mysqli_set_charset($link, 'utf-8');
		mysqli_select_db($dbName) or die("No database");
	}
	return $link;
}

//null
mysqli_query(getDbConnect(),$sql1);

// 1
mysqli_query(getDbConnect(),$sql2);

mysqli_query(getDbConnect(),$sql3);

