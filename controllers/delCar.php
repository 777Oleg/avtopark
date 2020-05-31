<?php
require "../models/cars.php";

$id = $_POST['id_car'];
$res = new cars;
$res = $res->deleteCar($id);
header('Location: http://avtopark.local/views/showCars.php');
?>
