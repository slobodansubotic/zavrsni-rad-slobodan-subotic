<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  echo "Connection failed: " . mysqli_connect_error();
}