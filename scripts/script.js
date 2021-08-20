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

const commmentFormValidation = () => {
  const form = document.forms["add-comment"];
  
  form.classList.add("was-validated");

  if (form.checkValidity() === false) {
    return false;
  }
};
