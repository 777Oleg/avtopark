<?php
session_start();

  require_once "header.php";
  require_once "../models/cars.php";

  $temp = new cars;
  $r = $temp->getAllCars();
?>


<div class="">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Марка</th>
      <th scope="col">Модель</th>
      <th scope="col">Номер</th>
      <th scope="col">Год выпуска</th>
      <?php
        if ($_SESSION['type_user'] == 'Manager'){
          echo "<th scope='col'>Option</th>";
        }
       ?>

    </tr>
  </thead>

  <?php
  while ($result = mysqli_fetch_array($r)) {
    echo "<tr><td>". $result['id_car'] ."</td>";
    echo "<td>". $result['marka'] ."</td>";
    echo "<td>". $result['model'] ."</td>";
    echo "<td>". $result['nomer'] ."</td>";
    echo "<td>". $result['year'] ."</td>";
    if ($_SESSION['type_user'] == 'Manager'){
      echo "<td>
            <form method='post' action='addCar.php'>
              <input type = 'hidden' name = 'id_car' value = '" . $result['id_car'] . "'/>
              <button type='submit' name ='submit'   class='btn btn-danger'>
              Edit</button>
            </form>
            <form method='post' action='../controllers/delCar.php'>
              <input type = 'hidden' name = 'id_car' value = '" . $result['id_car'] . "'/>
              <button type='submit' name = 'submit' class='btn btn-default'>
              Delete</button></form></td>";
    }
  }
  ?>


</table>
</div>
<a style = "float: right;" href="addCar.php">Создать авто</a>

<?php require_once "footer.php"?>
