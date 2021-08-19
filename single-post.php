<?php
include "header.php";
$post_id = $_GET["id"];

$query_post = "SELECT id, author, title, body, created_at FROM posts WHERE id = $post_id LIMIT 1";
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
      by <a href="#"><?php echo htmlspecialchars($post["author"]); ?></a></p>
    <p>
      <?php echo htmlspecialchars($post["body"]); ?>
    </p>
  </div><!-- /.blog-post -->

  <?php include "comments.php" ?>
</div><!-- /.blog-main -->

<?php include "sidebar.php"; ?>
<?php include "footer.php"; ?>