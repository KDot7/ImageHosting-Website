<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="example">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" type="text/css" href="css/Bootstrap.css">
    <link rel = "stylesheet" type="text/css" href="js/Bootstrap.js">
    <link rel="stylesheet" href="css.css">

    <title>Login</title>
  </head>
  <h1 style="text-align:center">Login</h1>
  <body class="login-background">
      <div class='container'>
        <form class ="forum-group" id="loginform" action="includes/login.inc.php" method="post">
          <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <label class="label control-label">Username:</label>
                <input type="text" class="form-control" name="uid" placeholder="Username">
                <label class="label control-label"> Password</label>
                <input type="password" class="form-control" name="puid" placeholder="Password">
                <input type ="checkbox"><p style="color:white">Remember Password </p>
                <br>
                <button class="btn btn-primary" type="Submit" name="login-submit">Login</button>
                <br><br>
                  <button action"signup.php" class="btn btn-primary" type="action">Signup</button>
          </form>
      </div>
    </body>
    <footer class="page-footer font-small blue">
      <div class="footer-copyright text-center py-3">
         Designed by Khabeer Azizi © 2019 Copyright
      </div>
    </html>
