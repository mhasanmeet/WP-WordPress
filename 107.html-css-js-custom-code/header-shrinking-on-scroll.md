## Elementor header Shrinking on Scroll

Here we shrink Logo, Menu and CTA button

* We need to have Elementor Pro
* Templates > Theme Builder > Header > Add a new header Container
* Get a minimal nice menu header, like [WP Header](../105-elementor-json-templates-and-desings/wp-header.json)
* In header container, the top and bottom padding must be have = 15px (in code we shirt it in 12px)
* We need to have header container a class, let's name it = shrinker
* Next, in logo we need to have a css class, let's name it = shrinking-logo
* Next we have to make it sticky, In Navbar Container's advance option Motion Effects, **Sticky = top**, we make sticky only on desktop screen
* Then, Effects offset should be = 60 (as your perspective, after 60px it will shrink)
* Then input these codes

```css

/* Shrinker header section */
.shrinker{
    /* background: transparent; */
    transition: all .3s linear!important;
    -webkit-animation: all .3s linear!important;
    -moz-animation: all .3s linear!important;
}

.shrinker.elementor-sticky--effects{
    /* background: #fff; //we can add any color here */
    margin-top: -6px!important;
    margin-bottom: -6px!important;
    transition: all .3s linear !important;
    -webkit-animation: all .3s linear!important;
    -moz-animation: all .3s linear!important;
}

/* Shrinking Logo */
.shrinking-logo img {
	width: 214px!important;
	transition: all .3s linear!important;
	-webkit-transition: all .3s linear!important;
	-moz-transition: all .3s linear!important;
}

.shrinker.elementor-sticky--effects img {
	width: 180px!important;
	transition: all .3s linear!important;
	-webkit-transition: all .3s linear!important;
	-moz-transition: all .3s linear!important;
}

/* shrinking menu */
.shrinker.elementor-sticky--effects ul li a {
	font-size: .9rem!important;
	transition: all .3s linear!important;
	-webkit-transition: all .3s linear!important;
	-moz-transition: all .3s linear!important;
}

/* shrinking menu */
.shrinker.elementor-sticky--effects ul li a {
	font-size: .9rem!important;
	transition: all .3s linear!important;
	-webkit-transition: all .3s linear!important;
	-moz-transition: all .3s linear!important;
}

/* shrinking button */
.shrinker.elementor-sticky--effects .elementor-button {
	padding: 10px 22px!important;
	transition: all .3s linear!important;
	-webkit-transition: all .3s linear!important;
	-moz-transition: all .3s linear!important;
}

/* Tablet and Mobile Menu Shrinking */

@media screen and (max-width: 1024px) {
	/* shrinking background */
	
.shrinker.elementor-sticky--effects 3
	background: #fff;
	padding-top: 2px!important;
	padding-bottom: 2px!important;
	box-shadow: 0px 6px 30px -4px rgba(0,0,0,.05);
}
	
	/* shrinking image */

.shrinker.elementor-sticky--effects img {
	width: 100px!important;
}
	
	/* shrinking menu */

.shrinker.elementor-sticky--effects ul li a {
	font-size: 1.2rem!important;
}

/* shrinking button */

.shrinker.elementor-sticky--effects .elementor-button {
	padding: 10px 32px!important;
}
}

/* End Of Shrinking Sticky Menu */

```

