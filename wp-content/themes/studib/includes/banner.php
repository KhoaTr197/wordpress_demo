<?php
function studib_add_header_banner()
{
  // Only show on the landing page
  if (is_front_page()) {
    echo '
      <div class="banner">
        Studib Beta v0.5 is out today!!
        <a href="dashboard/">Check it out</a>
      </div>
    ';
  }
}
add_action('wp_body_open', 'studib_add_header_banner');