<?php
$query = "SELECT id, author, text, post_id FROM comments WHERE post_id = $post_id";
$comments = $getPosts($query);
?>

<button id="comments-button" class="btn btn-default">Hide comments</button>

<ul id="comments" class="comments-list">
  <hr>
  <?php foreach ($comments as $comment) { ?>
    <li>
      <p><em><?php echo htmlspecialchars($comment["author"]); ?></em></p>
      <p class="comment-content"><?php echo htmlspecialchars($comment["text"]); ?></p>
      <hr>
    </li>
  <?php } ?>
</ul>
