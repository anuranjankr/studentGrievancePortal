// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var s_navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = s_navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    s_navbar.classList.add("sticky")
  } else {
    s_navbar.classList.remove("sticky");
  }
}
