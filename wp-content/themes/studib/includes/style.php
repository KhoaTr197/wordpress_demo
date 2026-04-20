<?php
/**
 * Add Preconnect for Google Fonts
 */
function studib_google_fonts_resource_hints($urls, $relation_type)
{
  // Only add hints if our font is actually enqueued
  if (wp_style_is('studib-jetbrains-mono', 'queue') && 'preconnect' === $relation_type) {
    $urls[] = array(
      'href' => 'https://fonts.googleapis.com',
    );
    $urls[] = array(
      'href' => 'https://fonts.gstatic.com',
      'crossorigin' => 'anonymous',
    );
  }
  return $urls;
}
add_filter('wp_resource_hints', 'studib_google_fonts_resource_hints', 10, 2);

add_action('wp_enqueue_scripts', function () {
  /**
   * Enqueue the JetBrains Mono Font
   */
  $font_url = 'https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap';
  wp_enqueue_style('studib-font', $font_url, array(), null);

  wp_enqueue_script('tailwind-cdn', 'https://cdn.tailwindcss.com');
});