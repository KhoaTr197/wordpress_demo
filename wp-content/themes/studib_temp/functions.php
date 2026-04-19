<?php

/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme SaaS Startup for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'saas_startup_register_required_plugins', 0);
function saas_startup_register_required_plugins()
{
  $plugins = array(
    array(
      'name' => 'Superb Addons',
      'slug' => 'superb-blocks',
      'required' => false,
    ),
  );

  $config = array(
    'id' => 'saas-startup',
    'default_path' => '',
    'menu' => 'tgmpa-install-plugins',
    'has_notices' => true,
    'dismissable' => true,
    'dismiss_msg' => '',
    'is_automatic' => true,
    'message' => '',
  );

  tgmpa($plugins, $config);
}

add_theme_support('wp-block-styles');

function saas_startup_block_editor()
{
  add_editor_style('/assets/css/block-editor.css');
  add_editor_style(get_stylesheet_directory_uri() . '/assets/css/block-editor.css');

}
add_action('admin_init', 'saas_startup_block_editor');



function saas_startup_remove_parent_tgmpa()
{
  remove_action('tgmpa_register', 'idea_flow_register_required_plugins', 0);
}
add_action('after_setup_theme', 'saas_startup_remove_parent_tgmpa', 0);

function studib_register_ctp()
{
  // Task
  $task_labels = array(
    'name' => 'Tasks',
    'singular_name' => 'Task',
    'add_new' => 'Add New Task',
    'add_new_item' => 'Add New Task',
    'edit_item' => 'Edit Task',
    'all_items' => 'All Tasks',
  );
  $task_args = array(
    'labels' => $task_labels,
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-list-view',
    'supports' => array('title', 'editor', 'custom-fields'),
    'show_in_rest' => true, // Kích hoạt Gutenberg editor
    'rewrite' => array('slug' => 'tasks'),
  );
  register_post_type('studib_task', $task_args);

  // Event
  $event_labels = array(
    'name' => 'Events',
    'singular_name' => 'Event',
    'add_new' => 'Add New Event',
    'add_new_item' => 'Add New Event',
    'edit_item' => 'Edit Event',
    'all_items' => 'All Events',
  );
  $event_args = array(
    'labels' => $event_labels,
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-calendar-alt',
    'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
    'show_in_rest' => true, // Kích hoạt Gutenberg editor
    'rewrite' => array('slug' => 'events'),
  );
  register_post_type('studib_event', $event_args);

  // Note
  $note_labels = array(
    'name' => 'Notes',
    'singular_name' => 'Note',
    'add_new' => 'Add New Note',
    'add_new_item' => 'Add New Note',
    'edit_item' => 'Edit Note',
    'all_items' => 'All Notes',
  );
  $note_args = array(
    'labels' => $note_labels,
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-edit',
    'supports' => array('title', 'editor'),
    'show_in_rest' => true, // Kích hoạt Gutenberg editor
    'rewrite' => array('slug' => 'notes'),
  );
  register_post_type('studib_note', $note_args);
}
do_action("init", "studib_register_cpt");

function studib_register_block_variant()
{
  // Button
  register_block_style(
    'core/button',
    array(
      'name' => 'primary',
      'label' => __("Primary", "SaaS Startup"),
    )
  );
}
add_action("init", "studib_register_block_variant");

function studib_display_tasks_shortcode()
{
  $args = array(
    'post_type' => 'studib_task', // Thay bằng slug của bạn
    'posts_per_page' => 5,
  );

  $query = new WP_Query($args);
  $output = '<div class="task-list">';

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $output .= '<h2>' . get_the_title() . '</h2>';
      $output .= '<div>' . get_the_excerpt() . '</div>';
    }
    wp_reset_postdata();
  } else {
    $output .= 'Không có task nào.';
  }

  $output .= '</div>';
  return $output;
}
add_shortcode('tasks', 'studib_display_tasks_shortcode');


add_shortcode('custom_signup_form', 'render_mock_signup_form');
function render_mock_signup_form()
{
  ob_start(); ?>
  <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
    <input type="hidden" name="action" value="mock_signup_action">

    <label>Username: <input type="text" name="username" required></label><br><br>
    <label>Password: <input type="password" name="password" required></label><br><br>
    <button type="submit">Create Account</button>
  </form>
  <?php return ob_get_clean();
}


add_shortcode('custom_login_form', 'render_mock_login_form');
function render_mock_login_form()
{
  ob_start(); ?>
  <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
    <input type="hidden" name="action" value="mock_login_action">

    <?php if (isset($_GET['status']) && $_GET['status'] == 'signup_success'): ?>
      <p style="color: green;">Sign up successful! Please log in.</p>
    <?php endif; ?>
    <?php if (isset($_GET['status']) && $_GET['status'] == 'login_failed'): ?>
      <p style="color: red;">Invalid mock credentials!</p>
    <?php endif; ?>

    <label>Username: <input type="text" name="username" required></label><br><br>
    <label>Password: <input type="password" name="password" required></label><br><br>
    <button type="submit">Login</button>
  </form>
  <?php return ob_get_clean();
}