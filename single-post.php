<?php
include "header.php";
$post_id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $connection = mysqli_connect("localhost", "root", "", "blog");

  if (!$connection) {
    echo "Connection failed: " . mysqli_connect_error();
  }

  $post_id_for_deletion = mysqli_real_escape_string($connection, $_POST["post-id"]);
  $comment_id = mysqli_real_escape_string($connection, $_POST["comment-id"]);

  $post_query = "DELETE FROM posts WHERE id = '$post_id_for_deletion'";
  $comment_query = "DELETE FROM comments WHERE id = '$comment_id'";

  if ($comment_id && mysqli_query($connection, $comment_query)) {
    header("Location: single-post.php?id=$post_id");
  } else {
    echo "Query error: " . mysqli_error($connection);
  }

  if ($post_id_for_deletion && mysqli_query($connection, $post_query)) {
    header("Location: posts.php");
  } else {
    echo "Query error: " . mysqli_error($connection);
  }
}

$query_post = "SELECT posts.id, posts.author, posts.title, posts.body, posts.created_at, users.first_name, users.last_name
          FROM posts
          LEFT JOIN users ON posts.author = users.id
          ORDER BY created_at DESC";
$post = $getPosts($query_post)[0];
?>

<div class="col-sm-8 blog-main">
  <div class="blog-post">
    <a href="single-post.php?id=<?php echo $post["id"]; ?>">
      <h2 class="blog-post-title">
        <?php echo htmlspecialchars($post["title"]); ?>
      </h2>
    </a>
    <p class="blog-post-meta">
      <?php
      $post_time = date_create($post["created_at"]);
      echo date_format($post_time, "F j, Y, g:i a");
      ?>
      by <a href="#"><?php echo htmlspecialchars($post["first_name"] . " " . $post["last_name"]); ?></a></p>
    <p>
      <?php echo htmlspecialchars($post["body"]); ?>
    </p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $post_id); ?>" method="POST">
      <input type="hidden" name="post-id" value="<?php echo $post_id; ?>">
      <input type="submit" value="Delete this post" class="btn btn-default" onclick="return confirm('Do you really want to delete this post?')">
    </form>
  </div><!-- /.blog-post -->

  <?php include "comments.php" ?>
</div><!-- /.blog-main -->

<?php include "sidebar.php"; ?>
<?php include "footer.php"; ?>