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