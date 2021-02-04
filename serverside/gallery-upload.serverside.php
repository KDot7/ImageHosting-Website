<?php

  if (isset($_POST['submit'])) {  #check to see if image was submmited or not

    $nfname = $_POST['fname']; #gets information from the fname input box

    if (empty($_POST['fname'])) { #checks to see if fname input box was left empty
      $nfname = "gallery";
    }
    else{
      $nfname = strtolower(str_replace(" ","_", $nfname)); #if the fname has any spaces than it replaces it with _
    }

    $nimgtitle = $_POST['ftitle'];
    $nimgdesc = $_POST['fdesc'];

    $file = $_FILES['file']; #The files super global gets the file input from the forum

    $fname = $file["name"]; #grabs the information from the array so we can set up error handling
    $ftype = $file["type"];
    $ftempname = $file["tmp_name"];
    $ferror = $file["error"];
    $fsize = $file["size"];

    $fext = explode(".", $fname); # gets the extension explode removes everything before period and only get items after it

    $fileAext = strtolower(end($fext)); # this variable is the actual extension and it makes the extension lower case and the array that was created by expolode it gets the last item

    $ftypeallowed = array("jpg", "jpeg", "png", "gif"); #this is the file types that are allowed for uploading

    if (in_array($fileAext, $ftypeallowed)) { #checks if the extension was valid
      if ($ferror === 0) { #0 means that there is no error
        if ($fsize < 6000000) { #checks if the file size is more than 20mb
          $imageFN = $nfname . "." . uniqid("", true) . "." . $fileAext; #true makes the id more than 13, this gets the name
          $fdest = "../images/gallery/". $imageFN; #tells it where to store the file and what to name it

          include_once "dbh.serverside.php";

          if (empty($nimgtitle) || empty($nimgdesc)) { #checks to see if the image title or description was left empty
            header("Location: ../gallery-upload.php?upload=empty"); #if any of them is empty it send them back to the upload page
            exit();
          }
          else{
            $sql = "SELECT * FROM gallery;"; #selects the gallery
            $stmt = mysqli_stmt_init($connect); #initializes the connection
            if (!mysqli_stmt_prepare($stmt, $sql)) { #this checks if the statement was not prepared
              echo "SQL statement has failed!";
            }
            else {
              mysqli_stmt_execute($stmt); #executes the prepared statement
              $result = mysqli_stmt_get_result($stmt);
              $rowcount = mysqli_num_rows($result);
              $setImageOrder = $rowcount + 1;

              $sql = "INSERT INTO gallery (tGallery, descGallery, imgNameGallery, orderGallery) VALUES (?, ?, ?, ?);";
              if (!mysqli_stmt_prepare($stmt, $sql)) { #this checks if the statement was not prepared
                echo "SQL statement has failed!";
              }
              else {
                mysqli_stmt_bind_param($stmt, "ssss", $nimgtitle, $nimgdesc, $imageFN, $setImageOrder);#pramater that we want to bind to the place holders
                mysqli_stmt_execute($stmt); #executes the statement

                move_uploaded_file($ftempname, $fdest); #uploades the files gets the temp name used and the destination it was in
                header("Location: ../gallery-main.php?upload=success"); #lead the user back to the gallery page
              }
            }
          }
        }
        else{
          echo "The file size you uploaded was ".$fsize." That is too big file size has to be less than 200000 kb";
          exit();
        }
      }
      else{
        echo "You have an error";
        exit();
      }
    }
    else {
      echo "You need to upload a proper file type, You uploaded ".$fileAext."Only Jpg, Png and GIF's are allowed";
      exit();
    }
  }
