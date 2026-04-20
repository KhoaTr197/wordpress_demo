<?php
add_action("wp_enqueue_scripts", function () {
  if (is_page('login')) {
    wp_enqueue_script(
      'studib-auth-js',
      get_stylesheet_directory_uri() . '/assets/js/auth.js',
      [],
      '1.0',
      true
    );

    wp_localize_script('studib-auth-js', 'loginSettings', [
      'root' => esc_url_raw(rest_url()),
      'nonce' => wp_create_nonce('wp_rest'),
      'home' => home_url('/dashboard')
    ]);
  }
});