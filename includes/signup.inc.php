<?php
if (isset($_POST['signup-submit'])){ #checks if the submit button has been pressed

}
  require 'dph.inc.php';

  $username = $_POST['userid'];
  $email = $_POST['mailid'];
  $password = $_POST['puid'];
  $rpassword = $_POST['ppuid'];

  if (empty($username) || empty($email) || empty($password) || empty($rpassword)) { #checks if anything was left empty
    header('Location:../signup.php?error=emptyfields&userid='.$username."&mail=".$email);
    exit();
  }

  else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username )) {
    header('Location:../signup.php?error=invalidmailuserid='.$username);
    exit();
  }

  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location:../signup.php?error=invalidmail&userid='.$username);
    exit();
    }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username )) {
    header('Location:../signup.php?error=invalidmail&mail='.$email);
    exit();
    }

  else if ($password !== $rpassword) {
    header('Location:../signup.php?error=passwordcheck&userid='.$username."&mail=".$email);
    exit();
  }

  else {
    $sql= "SELECT uidUsers FROM users WHERE uidUsers=?";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

      header('Location:../signup.php?error=sqlerror1');
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        header('Location:../signup.php?error=usertaken&mail='.$email);
        exit();
      }
      else {
        $sql= "INSERT INTO users (uidUsers,emailUsers,puidUsers) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {

          header('Location:../signup.php?error=sqlerror2');
          exit();
        }
        else {
          $hashedpuid = password_hash($password, PASSWORD_DEFAULT);


          mysqli_stmt_bind_param($stmt, "sss", $username, $email,$hashedpuid);
          mysqli_stmt_execute($stmt);
          header('Location:../login.php?signup=success');
          exit();
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
  }
