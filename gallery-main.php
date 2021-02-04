<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" type="text/css" href="css/Bootstrap.css">
  <link rel = "stylesheet" type="text/css" href="js/Bootstrap.js">
  <link rel="stylesheet" href="css.css">
</head>
<div class="background">
  <?php
  if (isset($_SESSION['userId'])) {
    echo "You are logged in as ".$_SESSION['userUid']."<br> " .'<a href="logout.php">Logout</a>';
  }
  else {
  }
  ?>
<div class="gallery-container">
  <?php
  if (isset($_SESSION['userId'])) {

  include_once 'serverside/dbh.serverside.php'; #connects to the database

  $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC"; #orders by the order we made and it goes by decending so newer images are alwase on the top
  $stmt = mysqli_stmt_init($connect);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement has failed!";
  }
  else {
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) { #i created a while loop that goes through the results and gets information i need
      echo '<a href="#">

      <div class = "gallery-upload card-img-top" style="background-image: url(images/gallery/'.$row["imgNameGallery"].');"></div>
      <br>
      <h3>'.$row["tGallery"].' </h3>
      <p>'.$row["descGallery"].' </p>
      <form method="post" action="delete.php?">
      </form>
      </a>';

    }



    }
  }
  else {
    echo "Sorry You are not logged in";
    header('Location:../login.php');
  }
   ?>
</div>


    <?php
    if (isset($_SESSION['userId'])) {
      echo '
      <div class="btn-group dropup">
        <button type="button" class="btn btn-danger btn-lg btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Upload Another Picture
        </button>
        <div class="dropdown-menu">
          <form action="serverside/gallery-upload.serverside.php" method="post" enctype="multipart/form-data">
          <input type="text" name="fname" placeholder="Input File name">
          <br>
          <input type="text" name="ftitle" placeholder="Input your image name">
          <br>
          <input type="text" name="fdesc" placeholder="Input an image description">
          <br>
          <input type="file" name="file">
          <br> <br>
          <button type="submit" name="submit">UPLOAD IMAGE</button>
        </form>
      </div>
      <footer class="page-footer font-small blue">
        <div class="footer-copyright text-center py-3">
           Designed by Khabeer Azizi © 2019 Copyright
        </div>
      ';

    }
    ?>
  </div>
</div>
</div>


</html>
