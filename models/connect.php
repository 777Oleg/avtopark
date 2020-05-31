<?php
session_start();
$host = 'localhost'; // адрес сервера
$database = 'avtopark_db'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

$connection = new mysqli($host, $user, $password, $database);




?>
