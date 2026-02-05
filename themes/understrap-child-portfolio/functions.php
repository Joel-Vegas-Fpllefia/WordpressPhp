<?php
defined('ABSPATH') || exit;
add_action('wp_enqueue_scripts', 'portfolio_child_enqueue_assets', 20);
function portfolio_child_enqueue_assets() {
  wp_enqueue_style(
    'understrap-parent',
    get_template_directory_uri() . '/style.css'
  );

  wp_enqueue_style(
    'portfolio-child',
    get_stylesheet_uri(),
    ['understrap-parent'],
    wp_get_theme()->get('Version')
  );
}
