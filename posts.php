<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  echo "Connection failed: " . mysqli_connect_error();
}

$sql = "SELECT id, Author, Title, Body, Created_at FROM posts ORDER BY Created_at DESC";
$result = mysqli_query($conn, $sql);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);
?>

<?php include "header.php"; ?>

<div class="col-sm-8 blog-main">
  <?php foreach ($posts as $post) { ?>
    <div class="blog-post">
      <a href="">
        <h2 class="blog-post-title">
          <?php echo htmlspecialchars($post["Title"]); ?>
        </h2>
      </a>
      <p class="blog-post-meta">
        <?php
        $post_time = date_create($post["Created_at"]);
        echo date_format($post_time, "F j, Y, g:i a");
        ?>
        by <a href="#"><?php echo htmlspecialchars($post["Author"]); ?></a></p>
      <p>
        <?php echo htmlspecialchars($post["Body"]); ?>
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