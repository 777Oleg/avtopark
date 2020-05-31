<?php
session_start();
  require_once "connect.php";


  class Managers
  {

    public function getManager($log, $pass)
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query ="SELECT * FROM managers where login = '$log' and password = '$pass'";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      $_SESSION['type_user'] = 'Manager';
      return $result;
      mysqli_close($connection);
    }

  }

?>
