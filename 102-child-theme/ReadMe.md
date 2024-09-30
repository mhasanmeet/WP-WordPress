# Create Child Theme
A child theme is a sub-theme that inherits the look, feel, and functions of the parent or main installed theme. We can create or install it just like any other theme, but it relies on the parent/main theme to control its core functionality.

A WordPress child theme gives you a safe way to customize your WordPress theme’s code. If you want to make direct edits to your theme’s CSS, HTML, or PHP, you should absolutely use a WordPress child theme. Otherwise, you might lose your changes to the next updates of main/parent theme.

## Requirements for create a child theme
* Create a child theme folder in WordPress `theme` folder
* Inside child theme folder, Create `style.css` css file for child theme. And put these css `comment` to this file
```css
/*
    Theme Name: Astra Child
    Theme URI: https://wpastra.com/
    Template: astra
    Author: Mahmudul Hasan from Codegnet
    Author URI: https://codegnet.com/mhasan
    Description: Child Theme
    Version: 0.0.1.1702567108
    Updated: 2023-12-14 15:18:28
*/
```
* Inside child theme folder, Having an image, name as `screenshot.png` or `screenshot.jpg`
* Inside child theme folder, we can add `functions.php` file for add our custom JS and PHP functionality.
* We can add custom JS functionality to our theme, for this we can add JS file inside the child theme folder, name as `custom.js` or any name


## Create child theme by plugin
* Child theme wizard
* WP child theme generator
* WPS child theme generator

----
## Read
* [Hubspot WordPress create child theme](https://blog.hubspot.com/website/wordpress-create-child-theme)