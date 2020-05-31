<?php
session_start();

  require_once "header.php";
  require_once "../models/avtopark.php";

  $temp = new avtopark;
  $r = $temp->getAllAvtopark();
?>



<div class="">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Фамилия</th>
      <th scope="col">Username</th>
      <th scope="col">Номер авто</th>
      <th scope="col">Авто</th>
      <th scope="col">Водитель</th>

      <?php
        if ($_SESSION['type_user'] == 'Manager'){
          echo "<th scope='col'>Option</th>";
        }
       ?>

    </tr>
  </thead>

  <?php
  while ($result = mysqli_fetch_array($r)) {
    echo "<tr><td>". $result['id_apark'] ."</td>";
    echo "<td>". $result['name'] ."</td>";
    echo "<td>". $result['address'] ."</td>";
    echo "<td>". $result['time_work'] ."</td>";
    echo "<td>". $result['nomerCar'] ."</td>";
    echo "<td>". $result['marka'] ."</td>";
    echo "<td>". $result['driver'] ."</td>";
    if ($_SESSION['type_user'] == 'Manager'){
      echo "<td>
            <form method='post' action='updateAvtopark.php'>
              <input type = 'hidden' name = 'id_park' value = '" . $result['id_apark'] . "'/>
              <button type='submit' name ='submit'   class='btn btn-danger'>
              Edit</button>
            </form>
            <form method='post' action='../controllers/delPark.php'>
              <input type = 'hidden' name = 'id_park' value = '" . $result['id_apark'] . "'/>
              <button type='submit' name = 'submit' class='btn btn-default'>
              Delete</button>
            </form>
            </td>";
    }
  }
  ?>


</table>
</div>
<?php
if ($_SESSION['type_user'] == 'Manager'){
    echo "<a style = 'float: right;' href='addAvtopark.php'>Создать автопарк</a>";
}
?>


<?php require_once "footer.php"?>
