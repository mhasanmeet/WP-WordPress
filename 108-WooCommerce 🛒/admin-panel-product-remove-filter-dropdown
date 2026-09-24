//Remove Filter by "product type, Stock Status, Product Brand" dropdown
add_action("admin_head", "rtbd_hide_product_type_filter");
function rtbd_hide_product_type_filter(){
    global $current_screen;
    ?>
    <style>
        #dropdown_product_type,
        #dropdown_stock_status,
        select[name="product_type"],
        select[name="stock_status"],
        select[name="product_brand"]{
            display: none !important;
        }
    </style>
    <?php
}
