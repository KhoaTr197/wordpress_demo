<?php
// Link the parent theme and child theme styles
function studib_enqueue_assets()
{
  // Load parent styles
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

  // Load our custom block styles for the frontend and editor
  wp_enqueue_style(
    'studib-block-styles',
    get_stylesheet_directory_uri() . '/assets/css/blocks.css',
    array('parent-style'),
    wp_get_theme()->get('Version')
  );
}
add_action('enqueue_block_assets', 'studib_enqueue_assets');

// Register your "Primary" button style so it shows in the sidebar
function studib_register_button_variants()
{
  register_block_style(
    'core/button',
    array(
      'name' => 'primary',
      'label' => 'Primary',
    )
  );
}
add_action('init', 'studib_register_button_variants');