<?php

// Remove columns: SKU, Stock, Price, Product Brand from admin product list
add_filter('manage_edit-product_columns', 'my_remove_product_columns', 20);

function my_remove_product_columns($columns)
{
  unset($columns['sku']);
  unset($columns['is_in_stock']);
  unset($columns['price']);
  unset($columns['taxonomy-product_brand']);
  return $columns;
}