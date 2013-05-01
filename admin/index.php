<?php

  include_once("../data/db_config.php");
  
  mysql_connect($DB_HOST, $DB_USER, $DB_PASS) or die ("Не могу создать соединение");
  mysql_select_db($DB_NAME) or die(mysql_error());
  mysql_set_charset('utf-8');
  
  $q = "SELECT login,password FROM admin";
  $res = mysql_query($q) or die(mysql_error());
  $row = mysql_fetch_array($res);
  
  $login = $row['login'];
  $pass = md5($row['password']);
  
  if (($login == $_POST['login']) && ($pass == $_POST['password'])) echo "Введены правильные данные!"; 
  else echo '<p class="text-error">Вы ошиблись в наборе!</p>';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>РАДИО ХЗ | Админка</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <style type="text/css">
      body {
        padding-top: 11%;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
    </style>

  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Авторизация</h2>
        <input type="text" class="input-block-level" placeholder="Логин" name="login">
        <input type="password" class="input-block-level" placeholder="Пароль" name="password">
        <button class="btn btn-large btn-primary" type="submit">Войти</button>
      </form>

    </div> <!-- /container -->

  </body>
</html>