<?php
/**
 * Template Name: Login Page
 * Template Post Type: page
 */

get_header('auth'); ?>

<div class="relative bg-gray-100 flex min-h-screen flex-col items-center justify-center p-6 md:p-10">
  <div class="absolute top-4 left-4">
    <?php if (has_custom_logo()):
      the_custom_logo();
    endif; ?>
  </div>
  <div class="w-full max-w-sm md:max-w-4xl">
    <div class="flex flex-col gap-6">

      <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
        <div class="grid p-0 md:grid-cols-2">

          <div class="p-6 md:p-8 flex flex-col justify-center gap-6 w-full h-full min-h-[400px]">

            <div class="flex flex-col items-center text-center">
              <h1 class="text-2xl font-bold text-gray-900">
                <?php echo esc_html('Welcome Back'); ?>
              </h1>
              <p class="text-gray-500 text-balance text-sm">
                <?php echo esc_html('Please sign in to your account'); ?>
              </p>
            </div>

            <form id="login-form" class="flex flex-col gap-4">
              <?php wp_nonce_field('ajax_login_nonce', 'security_nonce'); ?>

              <input type="hidden" name="rememberme" value="forever">

              <div class="grid gap-3">
                <label class="text-sm font-medium leading-none" for="email">
                  <?php echo esc_html('Email'); ?>
                </label>
                <input id="email" name="email" type="text" required
                  class="flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                  placeholder="<?php echo esc_attr__('name@example.com'); ?>">
              </div>

              <div class="grid gap-3">
                <div class="flex items-center justify-between">
                  <label class="text-sm font-medium leading-none" for="password">
                    <?php echo esc_html('Password'); ?>
                  </label>
                </div>
                <input id="password" name="password" type="password" required
                  class="flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                  placeholder="••••••••">
              </div>

              <button type="submit" id="submit-btn"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md font-medium hover:bg-indigo-700 transition-colors flex items-center justify-center">
                <span id="btn-text"><?php echo esc_html('Sign in'); ?></span>
              </button>

              <div
                class="relative text-center text-sm after:absolute after:inset-0 after:top-1/2 after:z-0 after:flex after:items-center after:border-t after:border-gray-200">
                <span class="bg-white text-gray-500 relative z-10 px-2">
                  <?php echo esc_html('Or continue with'); ?>
                </span>
              </div>

              <button type="button" id="google-signin-btn"
                class="w-full flex items-center justify-center gap-2 border border-gray-300 py-2 px-4 rounded-md bg-white hover:bg-gray-50 transition-colors">
                <svg class="w-5 h-5" viewBox="0 0 48 48" aria-hidden="true">
                  <path fill="#FFC107"
                    d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                  </path>
                  <path fill="#FF3D00"
                    d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z">
                  </path>
                  <path fill="#4CAF50"
                    d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z">
                  </path>
                  <path fill="#1976D2"
                    d="M43.611,20.083L43.595,20L42,20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.002-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                  </path>
                </svg>
                <span class="text-sm font-medium">Google</span>
              </button>
            </form>

            <div id="login-message" class="text-sm text-center hidden p-2 rounded"></div>
          </div>

          <div class="bg-gray-100 relative hidden md:block">
            <img src="https://cdn.7tv.app/emote/01H07F15D00002ETD2HQRT8J3Z/4x.avif"
              alt="<?php echo esc_attr__('Login visual'); ?>" class="absolute inset-0 h-full w-full object-cover" />
          </div>
        </div>
      </div>

      <div class="text-center text-xs text-gray-500">
        <?php
        $allowed_html = array(
          'a' => array(
            'href' => array(),
            'class' => array()
          )
        );

        $terms_link = '<a href="' . esc_url(site_url('/terms')) . '" class="underline">Terms</a>';
        $privacy_link = '<a href="' . esc_url(site_url('/privacy')) . '" class="underline">Privacy Policy</a>';

        echo wp_kses(
          sprintf(
            __('By clicking continue, you agree to our %1$s and %2$s.'),
            $terms_link,
            $privacy_link
          ),
          $allowed_html
        );
        ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer('auth'); ?>