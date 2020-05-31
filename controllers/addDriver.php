<?php
    require "../models/drivers.php";

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    
    $driver = new drivers;

    if (isset($_POST['id_driver']) and ($_POST['id_driver'] != ''))
    {
        $id = $_POST['id_driver'];
        $result = $driver->updateDriver($id, $name, $surname, $login, $password);
    }
    else
    {
        $result = $driver->addDriver($name, $surname, $login, $password);
    }

    header('Location: http://avtopark.local/views/showDrivers.php');
    exit;
?>
