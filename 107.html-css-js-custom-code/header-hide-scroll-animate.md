## Elementor Hide Header on Scroll and Show on Scroll Up

* Have a Navbar: Create a navbar on top
* CSS ID: In Navbar Container's advance option css ID, put a ID, such as **"header-hide"**
* Navbar Sticky: In Navbar Container's advance option Motion Effects, **Sticky = top**, we make sticky only on desktop screen
* 

<!-- Hide and Show Desktop Header -->
<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("header-hide").style.top = "0";
  } else {
    document.getElementById("header-hide").style.top = "-100px"; /* adjust this value to the height of your header */
  }
  prevScrollpos = currentScrollPos;
};
</script>

<style>
/* Show Hide Sticky Header Speed Control */
#header-hide {
	transition: all .4s ease!important;
}
</style>