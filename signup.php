<!DOCTYPE html>
<html>
<head>
  <title> Sign Up </title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" type="text/css" href="css/Bootstrap.css">
  <link rel = "stylesheet" type="text/css" href="js/Bootstrap.js">
  <link rel="stylesheet" href="css.css">
</head>
<body class='signup'>

    <h1 class="text-center">Sign up here</h1>
    <form action="includes/signup.inc.php" method="post" id="loginform">

      <label>Username</label>
      <input type = 'text' class="form-control" name = "userid">

      <label>Input Email</label>
      <input type = 'text' class="form-control" name = "mailid">

      <label> Password</label>
      <input type ="password" class="form-control" name = "puid">

      <label>Please Confirm your Password</label>
      <input type ="password" class="form-control" name = "ppuid">

      <button class="btn btn-outline-primary" type="Submit" name="signup-submit">Sign Up</button>
    </form>
      <form id="loginform" action="index.php" method="POST" >
</body>


<div class="footer">
  <p>Designed by Khabeer Azizi @ 2019</p>
</div>

</html>
