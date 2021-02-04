<?php

if (isset($_POST['login-submit'])) {

require 'dph.inc.php';

$mailuid = $_POST['uid'];
$password = $_POST['puid'];

if (empty($mailuid || $password)) {
  header('Location:../login.php?error=emptyfields');
  exit();
}
  else{
    $sql = 'SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;';
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

      header('Location:../login.php?error=sqlerror3');
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, 'ss', $mailuid, $mailuid); #checks for user or email
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {  #sees if the hash of the passwords match
        $paucheck = password_verify($password, $row['puidUsers']); #gets the user input password and compares to password hash stored on SQLiteDatabase
        if ($paucheck == false) {
          $message = "wrong answer";
          header('Location:../login.php?error=wrongpassword');
          echo "<script type='text/javascript'>alert('$message');</script>";
          exit();
        }
        else if ($paucheck == true) { #right username and password
          session_start();
          $_SESSION['userId'] = $row['idUsers'];
          $_SESSION['userUid'] = $row['uidUsers'];
          header('Location:../gallery-main.php?login=success');
          exit();
    }
      }
      else{
        header('Location:../login.php?error=nouser');
        exit();
      }
    }
  }
}

else {
  header('Location:../signup.php');
  exit();
}
?>
