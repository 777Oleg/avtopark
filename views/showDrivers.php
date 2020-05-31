<?php
session_start();

  require_once "header.php";
  require_once "../models/drivers.php";

  $temp = new drivers;
  $r = $temp->getAllDrivers();
?>



<div class="">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Фамилия</th>
      <th scope="col">Username</th>
      <?php
        if ($_SESSION['type_user'] == 'Manager')
        {
          echo "<th scope='col'>Option</th>";
        }
      ?>

    </tr>
  </thead>

  <?php
  while ($result = mysqli_fetch_array($r)) {
    echo "<tr><td>". $result['id'] ."</td>";
    echo "<td>". $result['name'] ."</td>";
    echo "<td>". $result['surname'] ."</td>";
    echo "<td>". $result['login'] ."</td>";
    if ($_SESSION['type_user'] == 'Manager'){
      echo "<td>
            <form method='post' action='addDriver.php'>
              <input type = 'hidden' name = 'id_driver' value = '" . $result['id'] . "'/>
              <button type='submit' name ='submit'   class='btn btn-danger'>
              Edit</button>
            </form>
            <form method='post' action='../controllers/delDriver.php'>
              <input type = 'hidden' name = 'id_driver' value = '" . $result['id'] . "'/>
              <button type='submit' name = 'submit' class='btn btn-default'>
              Delete</button></form></td>";
    }
  }
  ?>


</table>
</div>
<?php
if ($_SESSION['type_user'] == 'Manager')
{
    echo "<a style = 'float: right;' href='addDriver.php'>Добавить Водителя</a>";
}
?>


<?php require_once "footer.php"?>
