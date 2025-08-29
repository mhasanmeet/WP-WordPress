# Elementor Pro Hack

Elementor pro can be hacked by [Pro Elements](https://proelements.org/) plugin

And elementor pro future updates also hacked by bellow code,

```php
//functions.php

add_filter( ‘elementor/editor/localize_settings’, function( $settings ) {
if ( ! isset( $settings[‘promotionWidgets’] ) ) {
$settings[‘promotionWidgets’] = [];
}
return $settings;
});
```

This code should be included in `functions.php` file in WordPress
