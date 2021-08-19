<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$getPosts = function (string $query) use ($servername, $username, $password, $dbname): array {
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
  }

  $result = mysqli_query($conn, $query);
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);
  mysqli_close($conn);

  return $posts;
};
