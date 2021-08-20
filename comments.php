<?php
$query = "SELECT id, author, text, post_id FROM comments WHERE post_id = $post_id";
$comments = $getPosts($query);
?>

<button id="comments-button" class="btn btn-default">Hide comments</button>

<div id="comments">
  <form action="create-comment.php?id=<?php echo $post["id"]; ?>" method="POST" name="add-comment" onsubmit="return formValidation('add-comment')" novalidate>
    <fieldset class="add-comment">
      <legend>Add new comment</legend>
      <div class="form-group">
        <input type="text" name="author" placeholder="Your name" class="form-control" required>
        <div class="invalid-feedback alert alert-danger">Name is required.</div>
      </div>

      <div class="form-group">
        <textarea name="comment" rows="3" placeholder="Your comment" class="form-control" required></textarea>
        <div class="invalid-feedback alert alert-danger">Comment is required.</div>
      </div>

      <input type="submit" name="submit" value="Add comment" class="btn btn-default">
    </fieldset>
  </form>

  <ul class="comments-list">
    <hr>
    <?php foreach ($comments as $comment) { ?>
      <li>
        <p><em><?php echo htmlspecialchars($comment["author"]); ?></em></p>
        <p class="comment-content"><?php echo htmlspecialchars($comment["text"]); ?></p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $post_id); ?>" method="POST">
          <input type="hidden" name="comment-id" value="<?php echo $comment["id"]; ?>">
          <input type="submit" value="Delete" class="btn btn-default">
        </form>
        <hr>
      </li>
    <?php } ?>
  </ul>
</div>