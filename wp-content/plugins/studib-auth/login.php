<?php
function handle_login(WP_REST_Request $request)
{
  $email = sanitize_email($request['email']);
  $password = $request['password'];

  if (empty($email) || empty($password)) {
    return new WP_Error('missing_fields', 'Please enter email and password', ['status' => 400]);
  }

  $nonce = $request->get_header('X-WP-Nonce');
  if (!wp_verify_nonce($nonce, 'wp_rest')) {
    return new WP_Error('security_fail', 'Invalid security token', ['status' => 403]);
  }

  $creds = [
    'user_login' => $email,
    'user_password' => $password,
    'remember' => true,
  ];

  $user = wp_signon($creds, is_ssl());

  if (is_wp_error($user)) {
    return new WP_Error('login_failed', 'Invalid email or password', ['status' => 401]);
  }

  return rest_ensure_response([
    'success' => true,
    'message' => 'Login successful! Redirecting...',
    'user_id' => $user->ID
  ]);
}