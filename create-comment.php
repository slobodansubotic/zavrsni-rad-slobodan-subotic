<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $connection = mysqli_connect("localhost", "root", "", "blog");

  if (!$connection) {
    echo "Connection failed: " . mysqli_connect_error();
  }

  $author = mysqli_real_escape_string($connection, $_POST["author"]);
  $comment = mysqli_real_escape_string($connection, $_POST["comment"]);
  $post_id = mysqli_real_escape_string($connection, $_GET["id"]);

  $query = "INSERT INTO comments (author, text, post_id) VALUES ('$author', '$comment', '$post_id')";

  if (mysqli_query($connection, $query)) {
    header("Location: single-post.php?id=$post_id");
  } else {
    echo "Query error: " . mysqli_error($connection);
  }
}
