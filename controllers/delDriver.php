<?php
require "../models/drivers.php";

$id = $_POST['id_driver'];
$res = new drivers;
$res = $res->deleteDriver($id);
header('Location: http://avtopark.local/views/showDrivers.php');
?>
