<?php
$server = 'localhost';
$username = 'root';
$password = '';

$link = mysqli_connect($server, $username, $password);


$db_name = 'single';
mysqli_select_db($link, $db_name);

mysqli_set_charset($link, 'utf8');

$result = mysqli_query($link, 'SELECT * FROM emps');

if ($result) {
	$emps = array();

	while ($row = mysqli_fetch_assoc($result)) {
		$emps[] = $row;
	}

	var_dump($emps);
}

//mysqli_query($link, 'INSERT INTO emps (`first_name`, `last_name`) VALUES ("Иван", "Иванов")');

mysqli_close($link);