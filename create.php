<?php
include "header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $connection = mysqli_connect("localhost", "root", "", "blog");

  if (!$connection) {
    echo "Connection failed: " . mysqli_connect_error();
  }

  $title = mysqli_real_escape_string($connection, $_POST["title"]);
  $author = mysqli_real_escape_string($connection, $_POST["author"]);
  $content = mysqli_real_escape_string($connection, $_GET["content"]);

  $query = "INSERT INTO posts (title, body, author) VALUES ('$title', '$content', '$author')";

  if (mysqli_query($connection, $query)) {
    header("Location: posts.php");
  } else {
    echo "Query error: " . mysqli_error($connection);
  }
}
?>

<div class="col-8">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="add-post" onsubmit="return formValidation('add-post')" novalidate>
    <fieldset class="add-post">
      <legend>Add new post</legend>
      <div class="form-group">
        <input type="text" name="title" placeholder="Post title" class="form-control" required>
        <div class="invalid-feedback">Title is required.</div>
      </div>

      <div class="form-group">
        <input type="text" name="author" placeholder="Author's name" class="form-control" required>
        <div class="invalid-feedback">Author's name is required.</div>
      </div>

      <div class="form-group">
        <textarea name="content" rows="8" placeholder="Write your post" class="form-control" required></textarea>
        <div class="invalid-feedback">Post content is required.</div>
      </div>

      <input type="submit" name="submit" value="Add post" class="btn btn-default">
    </fieldset>
  </form>
</div>

<?php include "sidebar.php"; ?>
<?php include "footer.php"; ?>