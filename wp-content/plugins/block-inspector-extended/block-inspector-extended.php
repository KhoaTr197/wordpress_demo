<?php
/**
 * Plugin Name: Block Inspector Extension
 * Description: Extends more functionality of the current Block Inspector.
 * Version: 1.0
 */

function my_plugin_enqueue_block_editor_assets()
{
  // Radius Extension
  wp_enqueue_script(
    'my-radius-js',
    plugins_url('radius-extension.js', __FILE__),
    array('wp-blocks'),
    '1.0',
    true
  );
}

// Ensure this only loads in the admin editor
add_action('enqueue_block_editor_assets', 'my_plugin_enqueue_block_editor_assets');

// Add the CSS class to the block output on the front-end
add_filter('render_block', 'my_plugin_apply_radius_class', 10, 2);
function my_plugin_apply_radius_class($block_content, $block)
{
  if ($block['blockName'] === 'core/button' && !empty($block['attrs']['radiusVariant'])) {
    $class_to_add = esc_attr($block['attrs']['radiusVariant']);
    // This targets the <a> tag inside the button block wrapper
    $block_content = str_replace('wp-block-button__link', 'wp-block-button__link ' . $class_to_add, $block_content);
  }
  return $block_content;
}