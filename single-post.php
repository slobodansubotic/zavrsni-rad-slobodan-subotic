<?php
$post_id = $_GET["id"];

include "open-db-connection.php";

$sql_post = "SELECT id, author, title, body, created_at FROM posts WHERE id = $post_id";
$sql_comments = "SELECT id, author, text, post_id FROM comments WHERE post_id = $post_id";

$result = mysqli_query($conn, $sql_post);
$post = mysqli_fetch_assoc($result);

$result = mysqli_query($conn, $sql_comments);
$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

include "close-db-connection.php";
?>

<?php include "header.php"; ?>

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

  <p><strong>Comments:</strong></p>
  <hr>
  <ul class="comments-list">
    <?php foreach ($comments as $comment) { ?>
      <li>
        <p><em><?php echo $comment["author"]; ?></em></p>
        <p class="comment-content"><?php echo $comment["text"]; ?></p>
        <hr>
      </li>
    <?php } ?>
  </ul>
</div><!-- /.blog-main -->

<?php include "sidebar.php"; ?>
<?php include "footer.php"; ?>