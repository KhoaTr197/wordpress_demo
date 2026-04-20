<?php
add_action('after_setup_theme', function () {
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }
});

$theme_includes = [
  'includes/banner.php',
  'includes/login.php',
  'includes/setup.php',
  'includes/style.php',
];

foreach ($theme_includes as $file) {
  $filepath = get_theme_file_path($file);
  if (file_exists($filepath)) {
    require_once $filepath;
  } else {
    error_log("Failed to load: " . $filepath);
  }
}