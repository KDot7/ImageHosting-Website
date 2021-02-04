<?php

$servername ='localhost';
$dBUsername = 'root';
$dBPassword = '';
$dBName = 'login';

$connect = mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);

if (!$connect) {
  die('Connection has failed'.mysqli_connect_error()); #throws out the specific error if it fails
}
