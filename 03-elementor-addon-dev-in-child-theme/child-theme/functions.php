<?php

if (in_array('elementor/elementor.php', apply_filters("active_plugins", get_option('active_plugins')))) {
    
    require_once("elementor-addons/addons.php");

} else {
   
    // Add admin notice if elementor is not installed
    function my_custom_admin_notice(){
        ?>
            <div class="notice notice-warning">
                <p><?php echo "This theme requires elementor to be installed" ?></p>
            </div>
        <?php
    }

    add_action("admin_notices", "my_custom_admin_notice");
}


