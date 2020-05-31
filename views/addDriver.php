<?php
session_start();

  require_once "header.php";
  require_once "../models/drivers.php";
  $id = $_POST['id_driver'];
  $driver = new drivers;
  $driver = $driver->getDriver($id);
  $driver = mysqli_fetch_array($driver);

?>


  <div class="container">
   <div class="row">

   <div class="col-md-offset-3 col-md-6">
   <form class="form-horizontal" action = "../controllers/addDriver.php" method="post">
   <span class="heading">Добавить водителя</span>
   <div class="form-group">
     <input type="hidden" name = "id_driver"  value="<? echo $id; ?>">
     <input type="text" name = "name" class="form-control" placeholder="Имя" value="<? echo $driver['name']; ?>">
   </div>
   <div class="form-group">
     <input type="text" name = "surname" class="form-control" placeholder="Фамилия" value="<? echo $driver['surname']; ?>">
   </div>
   <div class="form-group">
     <input type="text" name = "login" class="form-control" placeholder="Логин" value="<? echo $driver['login']; ?>" required>
   </div>
   <div class="form-group">
     <input type="password" name = "password" class="form-control" placeholder="Пароль" required>
   </div>
   <div class="form-group">
     <button type="submit" class="btn btn-default">Добавить</button>
   </div>
   </form>


   </div><!-- /.row -->
  </div><!-- /.container -->
</div>
<?php require_once 'footer.php'; ?>
