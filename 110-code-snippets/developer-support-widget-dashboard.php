<?php

/**
 * Developer Support Contact widget
 */
add_action('wp_dashboard_setup', function () {

  wp_add_dashboard_widget(
    'developer_support_widget',
    __('Developer Support Contact', 'twentytwentyfive'),
    function () {

      $dev_name  = 'Mahmudul Hasan';
      $dev_role  = 'Web Developer & Support Engineer';
      $email     = 'mhasan.meet@gmail.com';
      $whatsapp  = 'https://wa.me/8801682568271';
      $website   = 'https://mhasan.dev';

    ?>
      <div style="display:flex; gap:16px; align-items:flex-start;">

        <!-- Avatar / Logo -->
        <div>
          <img
            src="<?php echo esc_url(get_avatar_url($email, ['size' => 80])); ?>"
            alt="<?php echo esc_attr($dev_name); ?>"
            style="border-radius:50%;" />
        </div>

        <!-- Info -->
        <div style="flex:1;">
          <h3 style="margin:0;">
            <?php echo esc_html($dev_name); ?>
          </h3>

          <p style="margin:4px 0 12px; color:#646970;">
            <?php echo esc_html($dev_role); ?>
          </p>

          <p>
            <strong>Email:</strong><br>
            <a href="mailto:<?php echo esc_attr($email); ?>">
              <?php echo esc_html($email); ?>
            </a>
          </p>

          <p>
            <strong>Phone / WhatsApp:</strong><br>
            <a href="<?php echo esc_url($whatsapp); ?>" target="_blank">
              +880 1682-568271
            </a>
          </p>

          <p style="margin-top:12px;">
            <a href="mailto:<?php echo esc_attr($email); ?>" class="button button-primary">
              Email Support
            </a>

            <a href="<?php echo esc_url($whatsapp); ?>" target="_blank" class="button">
              WhatsApp
            </a>
          </p>

          <p style="margin-top:10px;">
            <a href="<?php echo esc_url($website); ?>" target="_blank">
              🌐 Visit Website
            </a>
          </p>
        </div>

      </div>
    <?php
    }
  );
});
