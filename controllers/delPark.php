<?php
require "../models/avtopark.php";

$id = $_POST['id_park'];
$res = new Avtopark;
$res = $res->deleteAvtopark($id);
header('Location: http://avtopark.local/views/showAvtopark.php');
?>
