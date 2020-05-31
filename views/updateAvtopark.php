<?php
  require_once 'header.php';
  require_once "../models/cars.php";
  require_once "../models/drivers.php";
  require_once "../models/avtopark.php";

  $temp = new cars;
  $r = $temp->getAllCars();
  $drivers = new drivers;
  $result = $drivers->getAllDrivers();
  $id = $_POST['id_park'];
  $park = new Avtopark;
  $park = $park->getAvtopark($id);
  $park = mysqli_fetch_array($park);


?>


  <div class="container">
   <div class="row">

   <div class="col-md-offset-3 col-md-6">
     <form class="form-horizontal" action = "../controllers/updateAvtopark.php" method="post">
       <span class="heading">Добавить автопарк</span>
        <input type="hidden" name = "id_park" value = "<? echo $id ?>" >
       <div class="form-group">
         <input type="text" name = "name" class="form-control" placeholder="Название" value = "<? echo $park['name'] ?>" required>
       </div>
       <div class="form-group">
         <input type="text" name = "address" class="form-control" placeholder="Адрес" value = "<? echo $park['address'] ?>" required>
       </div>
       <div class="form-group">
         <input type="text" name = "time_work" class="form-control" placeholder="Время работы" value = '<? echo $park['time_work'] ?>' required>
       </div>
       <div class="form-group">
       <select size="1" name = "nomerCar" class="form-control" onchange="getText(this)">
            <option disabled>Выберите машину</option>
            <?php
                while ($res = mysqli_fetch_array($r)) {
                    if ($park['nomerCar'] === $res['nomer'])
                    {
                      echo "<option selected value = ". $res['nomer'] .">". $res['marka'] ." ". $res['model'] ."</option>";
                    }
                    else
                    {
                        echo "<option value = ". $res['nomer'] .">". $res['marka'] ." ". $res['model'] ."</option>";
                    }

                }
            ?>
        </select>

        <input type = 'hidden' id = "nameCar" name = "marka" value = "<? echo $park['marka']; ?>" >
        </div>

        <div class="form-group">
        <select size="1" name = "idDriver" class="form-control" onchange="getDriver(this)">
         <option selected disabled>Выберите водителя</option>
          <?php
            while ($res = mysqli_fetch_array($result)) {
              if ($park['id_driver'] == $res['id'])
              {
                echo "<option selected value = '". $res['id'] ."'>". $res['name'] ." ". $res['surname'] ."</option>";
              }
              else
              {
                echo "<option value = ". $res['id'] .">". $res['name'] ." ". $res['surname'] ."</option>";
              }
            }
           ?>
         </select>
         <input type = 'hidden' id = "nameDriver" name = "driver" value = "<? echo $park['driver']; ?>" >
         </div>

       <div class="form-group">
         <button type="submit" class="btn btn-default">Сохранить</button>
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
