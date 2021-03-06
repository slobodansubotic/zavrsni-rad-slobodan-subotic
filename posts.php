<?php
include "header.php";

$query = "SELECT posts.id, posts.author, posts.title, posts.body, posts.created_at, users.first_name, users.last_name
          FROM posts
          LEFT JOIN users ON posts.author = users.id
          ORDER BY created_at DESC";
$posts = $getPosts($query);
?>

<div class="col-sm-8 blog-main">
  <?php foreach ($posts as $post) { ?>
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
        by <a href=""><?php echo htmlspecialchars($post["first_name"] . " " . $post["last_name"]); ?></a></p>
      <p>
        <?php echo htmlspecialchars($post["body"]); ?>
      </p>
    </div><!-- /.blog-post -->
  <?php } ?>

  <nav class="blog-pagination">
    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
  </nav>
</div><!-- /.blog-main -->

<?php include "sidebar.php"; ?>
<?php include "footer.php"; ?>