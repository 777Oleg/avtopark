<?php
  require_once 'header.php';
  require_once "../models/cars.php";
  require_once "../models/drivers.php";

  $temp = new cars;
  $r = $temp->getCars();
  $drivers = new drivers;
  $result = $drivers->getAllDrivers();
?>


  <div class="container">
   <div class="row">

   <div class="col-md-offset-3 col-md-6">
     <form class="form-horizontal" action = "../controllers/addAvtopark.php" method="post">
       <span class="heading">Добавить автопарк</span>
       <div class="form-group">
         <input type="text" name = "name" class="form-control" placeholder="Название" required>
       </div>
       <div class="form-group">
         <input type="text" name = "address" class="form-control" placeholder="Адрес" required>
       </div>
       <div class="form-group">
         <input type="text" name = "time_work" class="form-control" placeholder="Время работы" required>
       </div>
       <div class="form-group">
       <select size="1" name = "nomerCar" class="form-control" onchange="getText(this)">
            <option selected disabled>Выберите машину</option>
            <?php
                while ($res = mysqli_fetch_array($r)) {
                    echo "<option value = ". $res['nomer'] .">". $res['marka'] ." ". $res['model'] ."</option>";
                }
            ?>
        </select>

        <input type = 'hidden' id = "nameCar" name = "marka" value = "" >
        </div>

        <div class="form-group">
        <select size="1" name = "idDriver" class="form-control" onchange="getDriver(this)">
         <option selected disabled>Выберите водителя</option>
          <?php
            while ($res = mysqli_fetch_array($result)) {
                echo "<option value = ". $res['id'] .">". $res['name'] ." ". $res['surname'] ."</option>";
            }
           ?>
         </select>
         <input type = 'hidden' id = "nameDriver" name = "driver" value = "" >
         </div>

       <div class="form-group">
         <button type="submit" class="btn btn-default">Добавить</button>
       </div>
     </form>
    </div>

   </div><!-- /.row -->
  </div><!-- /.container -->
</div>
<?php require_once 'footer.php'; ?>

<script>
function getText(ddl) {
      document.getElementById('nameCar').value = ddl.options[ddl.selectedIndex].text;
}

function getDriver(ddl) {
      document.getElementById('nameDriver').value = ddl.options[ddl.selectedIndex].text;
}
</script>
