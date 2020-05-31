<?php
session_start();
if (!$_SESSION['authorized']){
  header('Location: http://avtopark.local/index.php');
  exit;
}
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
   <style>
   /* Demo Background */

   /* Form Style */
   .form-horizontal{
    background: #fff;
    padding-bottom: 40px;
    border-radius: 15px;
    text-align: center;
   }
   .form-horizontal .heading{
    display: block;
    font-size: 35px;
    font-weight: 700;
    padding: 35px 0;
    border-bottom: 1px solid #f0f0f0;
    margin-bottom: 30px;
   }
   .form-horizontal .form-group{
    padding: 0 40px;
    margin: 0 0 25px 0;
    position: relative;
   }
   .form-horizontal .form-control{
    background: #f0f0f0;
    border: none;
    border-radius: 20px;
    box-shadow: none;
    padding: 0 20px 0 45px;
    height: 40px;
    transition: all 0.3s ease 0s;
   }
   .form-horizontal .form-control:focus{
    background: #e0e0e0;
    box-shadow: none;
    outline: 0 none;
   }
   .form-horizontal .form-group i{
    position: absolute;
    top: 12px;
    left: 60px;
    font-size: 17px;
    color: #c8c8c8;
    transition : all 0.5s ease 0s;
   }
   .form-horizontal .form-control:focus + i{
    color: #00b4ef;
   }
   .form-horizontal .fa-question-circle{
    display: inline-block;
    position: absolute;
    top: 12px;
    right: 60px;
    font-size: 20px;
    color: #808080;
    transition: all 0.5s ease 0s;
   }
   .form-horizontal .fa-question-circle:hover{
    color: #000;
   }
   .form-horizontal .main-checkbox{
    float: left;
    width: 20px;
    height: 20px;
    background: #11a3fc;
    border-radius: 50%;
    position: relative;
    margin: 5px 0 0 5px;
    border: 1px solid #11a3fc;
   }
   .form-horizontal .main-checkbox label{
    width: 20px;
    height: 20px;
    position: absolute;
    top: 0;
    left: 0;
    cursor: pointer;
   }
   .form-horizontal .main-checkbox label:after{
    content: "";
    width: 10px;
    height: 5px;
    position: absolute;
    top: 5px;
    left: 4px;
    border: 3px solid #fff;
    border-top: none;
    border-right: none;
    background: transparent;
    opacity: 0;
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
   }
   .form-horizontal .main-checkbox input[type=checkbox]{
    visibility: hidden;
   }
   .form-horizontal .main-checkbox input[type=checkbox]:checked + label:after{
    opacity: 1;
   }
   .form-horizontal .text{
    float: left;
    margin-left: 7px;
    line-height: 20px;
    padding-top: 5px;
    text-transform: capitalize;
   }
   .form-horizontal .btn{

    font-size: 14px;
    color: #fff;
    background: #00b4ef;
    border-radius: 30px;
    padding: 10px 25px;
    border: none;
    text-transform: capitalize;
    transition: all 0.5s ease 0s;
   }
   @media only screen and (max-width: 479px){
    .form-horizontal .form-group{
    padding: 0 25px;
    }
    .form-horizontal .form-group i{
    left: 45px;
    }
    .form-horizontal .btn{
    padding: 10px 20px;
    }
   }
   </style>

   <div with = '100%' style = 'background-color:#66ccff; height: 100px;'>
     <div style = 'float:right; text-align: right; width: 45%;  margin: 15px;'>
       <h3>Вы вошли на сайт как <? echo $_SESSION['type_user'].": ".$_SESSION['name']." ".$_SESSION['surname'];?></h3>
       <a href="../controllers/exit.php">Выйти изи профиля</a>
     </div>
     <div style = 'width: 45%;  margin: 15px;'>
       <h1>Автопарк</h1>
     </div>
   </div>

   <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link" href="showAvtopark.php">Автопарк</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="showDrivers.php">Водители</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="showCars.php">Автомобили</a>
      </li>
    </ul>
