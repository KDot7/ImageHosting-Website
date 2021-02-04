<?php
#sets a connection with the database

$sname = "localhost"; #sername
$username = "root";
$password = "";
$dbname = "gallery";

$connect = mysqli_connect($sname, $username, $password, $dbname);
