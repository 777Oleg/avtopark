<?php
if (isset($_SESSION['authorized'])){
  header('Location: views/showAvtopark.php');
  exit;
}
session_start();


?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title>header</title>
 </head>
 <body>
<form action = "/controllers/vhod.php" method = "post">
  <fieldset class="form-group">
    <label for="first_name">Имя</label>
    <input type="text" name = "login" class="form-control" id="first_name" name="first_name" required>
  </fieldset>
  <fieldset class="form-group">
    <label for="last_name">Фамилия</label>
    <input type="password" name = "password" class="form-control" id="last_name" name="last_name" required>
  </fieldset>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>


<? if (isset($_SESSION['error']))
  {
  echo "<div class='form-group' style = 'background-color:red; text-align: center;'><h3>".$_SESSION['error']."</h3></div>";
  }
  session_unset($_SESSION['error']);
?>

<?php require_once "views/footer.php";?>
