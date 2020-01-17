var signin = document.getElementById("signin");
var mainform = document.getElementById("mainform");

function dispMainform() {
    mainform.style.display = "block";
}
function hideMainform() {
    mainform.style.display = "none";
}

signin.addEventListener("mouseenter", dispMainform);
signin.addEventListener("click", hideMainform);
mainform.addEventListener("mouseleave", hideMainform);
