<?php
session_start();

require_once "header.php";
require_once "../models/cars.php";

$id = $_POST['id_car'];
$car = new Cars;
$car = $car->getCar($id);
$car = mysqli_fetch_array($car);
?>



  <div class="container">
   <div class="row">

   <div class="col-md-offset-3 col-md-6">
   <form class="form-horizontal" action = "../controllers/addCar.php" method="post">
   <span class="heading">Добавить машину</span>
   <div class="form-group">
     <input type="hidden" name = "id_car" value="<? echo $id; ?>">
     <input type="text" name = "marka" class="form-control" placeholder="марка" value="<? echo $car['marka']; ?>" required>
   </div>
   <div class="form-group">
     <input type="text" name = "model" class="form-control" placeholder="модель" value="<? echo $car['model']; ?>" required>
   </div>
   <div class="form-group">
     <input type="text" name = "nomer" class="form-control" placeholder="номер" value="<? echo $car['nomer']; ?>" required>
   </div>
   <div class="form-group">
     <input type="text" name = "year" class="form-control" placeholder="год выпуска" value="<? echo $car['year']; ?>">
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
