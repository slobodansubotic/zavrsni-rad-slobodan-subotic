<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$getPosts = function (string $query) use ($servername, $username, $password, $dbname): array {
  $connection = mysqli_connect($servername, $username, $password, $dbname);

  if (!$connection) {
    echo "Connection failed: " . mysqli_connect_error();
  }

  $result = mysqli_query($connection, $query);
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);
  mysqli_close($connection);

  return $posts;
};
