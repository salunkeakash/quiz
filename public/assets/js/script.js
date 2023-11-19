// sticky navbar
var navbar = document.getElementById("navbar");
var sticky = navbar ? navbar.offsetTop : 0;
function myFunction() {
  if (window.pageYOffset > sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

if (navbar) {
  window.onscroll = function () { myFunction() };
}
