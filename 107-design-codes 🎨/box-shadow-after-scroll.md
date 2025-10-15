# Elementor Box Shadow after scroll JavaScript code

* Have a Navbar: Create a navbar on top
* CSS ID: In Navbar Container's advance option css ID, put a ID, such as **"header-scroll"**
* Navbar Sticky: In Navbar Container's advance option Motion Effects, **Sticky = top**, we make sticky only on desktop screen
* Need to check header menu container background, bg color and z-index
* Then, go to dashboard > Elementor > Custom Code > Add a new custom code > Add this custom code bellow in "body-end" > Press update > In condition, Include "Entire Site"

```html
<!-- Box shadow after scroll -->
<script>
  var navbar = document.getElementById('header-scroll');
  window.onscroll = function() {
    if (window.scrollY > 22) {
      navbar.style.boxShadow = 'rgba(149, 157, 165, 0.2) 0px 8px 24px';
    } else {
      navbar.style.boxShadow = 'none'; /* adjust this value to the height of you header */
    }
  };
</script>
```
