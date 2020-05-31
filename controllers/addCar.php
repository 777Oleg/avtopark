<?php
    require "../models/cars.php";

    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $nomer = $_POST['nomer'];
    $year = $_POST['year'];
    $car = new cars;

    if (isset($_POST['id_car']) and ($_POST['id_car'] != ''))
    {
      $id = $_POST['id_car'];
      $result = $car->updateCar($id, $marka, $model, $nomer, $year);
    }
    else {
      $result = $car->insertCar($marka, $model, $nomer, $year);
    }

    header('Location: http://avtopark.local/views/showCars.php');
    exit;
?>
