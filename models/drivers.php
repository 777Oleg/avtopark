<?php
session_start();
  require_once "connect.php";


  class drivers
  {
    public function getDriver($id)
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query = "SELECT * FROM drivers WHERE id = '$id'";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      return $result;
      mysqli_close($connection);
    }

    public function getDrivers($log, $pass)
    {

      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query ="SELECT * FROM drivers WHERE login = '$log' AND password = '$pass'";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      $_SESSION['type_user'] = 'Driver';
      return $result;
      mysqli_close($connection);
    }

    public function addDriver($name, $surname, $login, $pass)
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query ="SELECT * FROM drivers where login = '$login'";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      $count = mysqli_num_rows($result);
      if ($count == 0)
      {
        $query = "INSERT INTO drivers (name, surname, login, password) VALUES ('$name', '$surname', '$login', '$pass')";
        $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
        mysqli_close($connection);
        return $result;
      }
      else return "Водитель с таким логином уже существует";


    }

    public function getAllDrivers ()
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query ="SELECT * FROM drivers";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      return $result;
    }

    public function updateDriver($id, $name, $surname, $login, $password)
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query ="UPDATE drivers SET name = '$name', surname = '$surname', login = '$login', password = '$password' WHERE id = '$id'";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      return $result;
      mysqli_close($connection);
    }

    public function deleteDriver($id)
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query ="DELETE FROM drivers WHERE id = '$id'";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      return $result;
      mysqli_close($connection);
    }

  }

?>
