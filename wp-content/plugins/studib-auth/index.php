<?php
/**
 * Plugin Name: Studib Auth
 * Description: Custom Authentication API for Studib.
 * Version: 1.0.0
 * Author: khoa.tran
 */

if (!defined('ABSPATH')) {
  exit;
}

require_once plugin_dir_path(__FILE__) . 'login.php';

add_action('rest_api_init', function () {
  register_rest_route('auth/v1', '/login', [
    'methods' => 'POST',
    'callback' => 'handle_login',
    'permission_callback' => '__return_true', // Anyone can try to login
  ]);
});