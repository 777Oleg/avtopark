<?php
  require_once "connect.php";


  class Avtopark
  {

    public function getAvtopark($id)
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query ="SELECT * FROM avtopark where id_apark = '$id'";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      return $result;
    }

    public function getAllAvtopark ()
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query ="SELECT * FROM avtopark";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      return $result;
    }

    public function insertAvtopark($name, $address, $time_work, $nomerCar, $marka, $id_driver, $driver)
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query ="SELECT * FROM avtopark where name = '$name' and address = '$address' and nomerCar = '$nomerCar'";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      $count = mysqli_num_rows($result);
      if ($count == 0)
      {
        $query = "INSERT INTO avtopark (name, address, time_work, nomerCar, marka, id_driver, driver)
        VALUES ('$name', '$address','$time_work', '$nomerCar', '$marka', '$id_driver', '$driver')";
        $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
        return $result;
        mysqli_close($connection);

      }
      else
      {
        $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
        $query ="UPDATE avtopark SET time_work='$time_work', nomerCar='$nomerCar', marka='$marka', id_driver='$id_driver', driver='$driver'
        WHERE name ='$name' AND address ='$address'";
        $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
        return $result;
        mysqli_close($connection);
      }
    }


    public function updateAvtopark($id, $name, $address, $time_work, $nomerCar, $marka, $id_driver, $driver)
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query ="UPDATE avtopark SET name ='$name', address ='$address', time_work='$time_work', nomerCar='$nomerCar', marka='$marka', id_driver='$id_driver', driver='$driver'
      WHERE id_apark = '$id'";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      return $result;
      mysqli_close($connection);
    }

    public function deleteAvtopark($id)
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query ="DELETE FROM avtopark WHERE id_apark = '$id'";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      mysqli_close($connection);
      return $result;
    }
  }

?>
