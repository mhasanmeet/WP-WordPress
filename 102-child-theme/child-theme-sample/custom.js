// We can custom JS
// Here we add functionality header scroll hide 
var navbar = document.getElementById('header-scroll');
var topbar = document.getElementById('header-topbar');
window.onscroll = function() {
  if (window.scrollY > 22) {
		navbar.style.boxShadow = 'rgba(149, 157, 165, 0.2) 0px 8px 24px';
        topbar.style.display = "none";
  } else {
        navbar.style.boxShadow = 'none'; /* adjust this value to the height of you header */
        topbar.style.display = 'block';
  }
};