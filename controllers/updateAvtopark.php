<?php
require "../models/avtopark.php";

$id = $_POST['id_park'];
$name = $_POST['name'];
$address = $_POST['address'];
$time_work = $_POST['time_work'];
$nomerCar = $_POST['nomerCar'];
$marka = $_POST['marka'];
$id_Driver = $_POST['idDriver'];
$driver = $_POST['driver'];
$park = new avtopark;
$result = $park->updateAvtopark($id, $name, $address, $time_work, $nomerCar, $marka, $id_Driver, $driver);
header('Location: http://avtopark.local/views/showAvtopark.php');
?>
