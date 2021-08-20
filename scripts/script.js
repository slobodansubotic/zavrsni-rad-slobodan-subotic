const commentsButton = document.querySelector("#comments-button");
const comments = document.querySelector("#comments");
const activePageSegments = document.location.pathname.split("/");
const activePageSlug = activePageSegments[activePageSegments.length - 1];
const navigation = {
  home: document.querySelector("#home"),
  create: document.querySelector("#create"),
};
var areCommentsHidden = false;

const toggleComments = () => {
  areCommentsHidden = !areCommentsHidden;
  areCommentsHidden
    ? (commentsButton.innerHTML = "Show comments")
    : (commentsButton.innerHTML = "Hide comments");
  comments.classList.toggle("hidden");
};

const formValidation = (formName) => {
  const form = document.forms[formName];

  form.classList.add("was-validated");

  if (form.checkValidity() === false) {
    return false;
  }
};

activePageSlug === "index.php" || activePageSlug === "posts.php"
  ? navigation.home.classList.add("active")
  : navigation.home.classList.remove("active");
activePageSlug === "create.php"
  ? navigation.create.classList.add("active")
  : navigation.create.classList.remove("active");

if (commentsButton) commentsButton.onclick = toggleComments;
