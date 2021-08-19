<?php
$query = "SELECT id, title FROM posts ORDER BY created_at DESC LIMIT 5";
$posts = $getPosts($query);
?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
  <div class="sidebar-module sidebar-module-inset">
    <h4>Latest posts</h4>
    <br>
    <?php foreach ($posts as $post) { ?>
      <p class="latest-title">
        <a href="single-post.php?id=<?php echo $post["id"]; ?>">
          <?php echo htmlspecialchars($post["title"]); ?>
        </a>
      </p>
    <?php } ?>
  </div>
</aside><!-- /.blog-sidebar -->