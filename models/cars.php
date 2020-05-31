<?php
  require_once "connect.php";


  class cars
  {
    public function getCar($id)
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query = "SELECT * FROM cars WHERE id_car = '$id'";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      return $result;
      mysqli_close($connection);
    }


    public function getCars ()
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query ="SELECT * FROM cars WHERE nomer NOT IN (SELECT nomerCar FROM avtopark WHERE nomerCar = cars.nomer)";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      return $result;
      mysqli_close($connection);
    }

    public function getAllCars()
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query ="SELECT * FROM cars";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      return $result;
      mysqli_close($connection);
    }

    public function insertCar ($marka,$model,$nomer, $year)
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query ="SELECT * FROM cars where nomer = '$nomer'";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      $count = mysqli_num_rows($result);
      if ($count == 0)
      {
        $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
        $query ="INSERT INTO cars (marka, model, nomer, year) VALUES ('$marka','$model','$nomer', '$year')";
        $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
        return $result;
      }
      else
      {
        $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
        $query ="UPDATE cars SET marka='$marka', model='$model', year='$year' WHERE nomer ='$nomer'";
        $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
        return $result;
        mysqli_close($connection);
      };
    }

    public function updateCar($id, $marka,$model,$nomer, $year)
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query = "UPDATE cars SET marka='$marka', model='$model', nomer ='$nomer', year='$year' WHERE id_car = '$id'";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      return $result;
      mysqli_close($connection);
    }

    public function deleteCar($id)
    {
      $connection = new mysqli('localhost', 'root', '', 'avtopark_db');
      $query = "DELETE FROM cars WHERE id_car = '$id'";
      $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
      return $result;
      mysqli_close($connection);
    }

  }

?>
