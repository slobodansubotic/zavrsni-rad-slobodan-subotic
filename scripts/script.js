const commentsButton = document.querySelector("#comments-button");
const comments = document.querySelector("#comments");
var areCommentsHidden = false;

const toggleComments = () => {
  areCommentsHidden = !areCommentsHidden;
  areCommentsHidden
    ? (commentsButton.innerHTML = "Show comments")
    : (commentsButton.innerHTML = "Hide comments");
  comments.classList.toggle("hidden");
};

commentsButton.onclick = toggleComments;
