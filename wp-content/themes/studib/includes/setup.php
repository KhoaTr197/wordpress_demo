<?php
function studib_child_enqueue_styles()
{
  // Load parent theme
  wp_enqueue_style(
    'parent-style',
    get_template_directory_uri() . '/style.css',
    array(),
    wp_get_theme('parent-theme-slug')->get('Version')
  );

  // Load child theme
  wp_enqueue_style(
    'child-style',
    get_stylesheet_uri(),
    array('parent-style'),
    wp_get_theme()->get('Version')
  );

  if (is_page('login')) {
    wp_enqueue_script('studib-auth-js', get_stylesheet_directory_uri() . '/assets/js/auth.js', [], '1.0', true);
    wp_localize_script('studib-auth-js', 'loginSettings', [
      'root' => esc_url_raw(rest_url()),
      'nonce' => wp_create_nonce('wp_rest'),
      'home' => home_url('/dashboard')
    ]);
  }
}
add_action('wp_enqueue_scripts', 'studib_child_enqueue_styles', 20);

function studib_force_login_template($template)
{
  // // Debugging block
  // echo '<pre>';
  // var_dump('Custom Template Found: ');
  // die('Filter is running!');

  if (is_page('login')) {
    $custom_template = locate_template('templates/page-login.php');

    if ($custom_template) {
      return $custom_template;
    }
  }
  return $template;
}
add_filter('template_include', 'studib_force_login_template', 99);

function studib_register_variants()
{
  register_block_style(
    'core/button',
    [
      'name' => 'primary',
      'label' => 'Primary',
    ]
  );

  register_block_style('core/post-terms', [
    'name' => 'pill',
    'label' => 'Pill',
  ]);
}
add_action('init', 'studib_register_variants');