<?php
/**
 * Template Name: Login Page
 */
get_header(); ?>

<main class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
  <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg">
    <div class="text-center">
      <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Welcome Back</h2>
      <p class="mt-2 text-sm text-gray-600">Please sign in to your account</p>
    </div>

    <form id="login-form" class="mt-8 space-y-6" method="post">
      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <input id="email" name="email" type="email" required
            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
            placeholder="Email address">
        </div>
        <div>
          <input id="password" name="password" type="password" required
            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
            placeholder="Password">
        </div>
      </div>

      <div id="login-message" class="text-sm text-center hidden"></div>

      <div>
        <button type="submit"
          class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Sign in
        </button>
      </div>
    </form>
  </div>
</main>

<?php get_footer(); ?>