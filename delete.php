<?php
if (isset($_POST['delete'])) {
  include_once 'serverside/dbh.serverside.php';
  $stmt = mysqli_stmt_init($connect);
  $id = $_GET['id'];
  $sql = "DELETE FROM gallery WHERE idGallery=$id";
  if (mysqli_query($connect, $sql)) {
    echo "Record deleted successfully";
    header("Location: gallery-main.php?upload=success");
} else {
    echo "Error deleting record: " . mysqli_error($connect);
}

  exit();
}
// else {
//   mysqli_stmt_execute($stmt, $sql);
// }
