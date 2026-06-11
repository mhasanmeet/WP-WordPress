<?php

/**
 * Show sale badge as discount amount (e.g. "Save 50") instead of percentage (e.g. "-10%").
 * 
 * Put the code into theme (or child theme's) functions.php
 */

add_filter('woodmart_product_label_output', 'woodmart_child_sale_badge_as_amount', 10, 1);
function woodmart_child_sale_badge_as_amount($output)
{
  global $product;

  if (! $product || ! $product->is_on_sale()) {
    return $output;
  }

  $discount_amount = 0.0;

  if ($product->is_type('variable')) {
    $prices = $product->get_variation_prices();
    if (! empty($prices['regular_price']) && ! empty($prices['sale_price'])) {
      foreach ($prices['regular_price'] as $key => $regular_price) {
        $sale_price = isset($prices['sale_price'][$key]) ? (float) $prices['sale_price'][$key] : 0;
        $regular_price = (float) $regular_price;
        if ($sale_price > 0 && $sale_price < $regular_price) {
          $diff = $regular_price - $sale_price;
          if ($diff > $discount_amount) {
            $discount_amount = $diff;
          }
        }
      }
    }
  } elseif ($product->is_type('simple') || $product->is_type('external') || $product->is_type('variation')) {
    $regular_price = (float) $product->get_regular_price();
    $sale_price    = (float) $product->get_sale_price();
    if ($regular_price > 0 && $sale_price >= 0) {
      $discount_amount = $regular_price - $sale_price;
    }
  }

  if ($discount_amount <= 0) {
    return $output;
  }

  $save_label = '<span class="onsale product-label">' . sprintf(__('Save %s', 'woodmart'), wc_price($discount_amount)) . '</span>';

  // Replace the sale badge in the labels array (percentage or "Sale" text).
  foreach ($output as $index => $html) {
    if (strpos($html, 'onsale product-label') !== false) {
      $output[$index] = $save_label;
      break;
    }
  }

  return $output;
}