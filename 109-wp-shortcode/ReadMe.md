## WordPress Short Code
WordPress shortcode is a powerful feature in WordPress

* A shortcode example 
`[shortcode_name]`

* We can add extra attribute if it is available by the shortcode 
`[shortcode_name id="id" title="title"]`

* Now create my own shortcode 
```php
function wxs_shortcode_hello_world(){
    echo "Hello World";
}

add_shortcode("hello_world", "wxs_shortcode_hello_world");
```

We can use this shortcode by `[hello_world]`

