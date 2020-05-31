<?php
session_start();
  require_once "../models/drivers.php";
  require_once "../models/managers.php";


  if ((isset($_POST['login'])) and (isset($_POST['password'])))
  {
    $log = $_POST['login'];
    $pass = md5($_POST['password']);
    $manager = new Managers;
    $result = $manager->getManager($log, $pass);
    $count = mysqli_num_rows($result);
    if ($count == 0)
      {
        $driver = new Drivers;
        $result = $driver->getDrivers($log, $pass);
        $count = mysqli_num_rows($result);
        if ($count == 0)
          {
            $_SESSION['error'] = "Неверная пара Логин и Пароль. Попробуйте снова!";

            header('Location: http://avtopark.local/index.php');
            exit;
          }
      }

          $row = mysqli_fetch_array($result);

          $_SESSION['id'] = $row['id'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['surname'] = $row['surname'];
          $_SESSION['login'] = $row['login'];
          $_SESSION['authorized'] = true;

          header('Location: http://avtopark.local/views/showAvtopark.php');
          exit;


  }
  else echo "Error";
?>
