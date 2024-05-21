<?php

/**
 * Core theme file.
 *
 * @package  abc Headless
 * @author   Ronny Wieckardt
 */
add_action('after_setup_theme', 'headless_theme_setup');
add_action('after_setup_theme', 'headless_text_domain');
add_action('after_setup_theme', 'headless_register_menus');

// Disable default gallery styles
add_filter('use_default_gallery_style', '__return_false');
// Remove break tags from galleries
add_filter('the_content', 'headless_remove_brs_from_galleries', 11, 2);
// Disable Gutenberg editor
add_filter('use_block_editor_for_post', '__return_false', 10);
// Disable Gutenberg editor for widgets
add_filter('use_widgets_block_editor', '__return_false');


/**
 * Registers Menus
 *
 * @hooked 		after_setup_theme
 * @since 		1.0.0
 */
function headless_register_menus()
{
  register_nav_menus(array(
    'main'     => esc_html__('Main', 'headless'),
    'social'   => esc_html__('Social', 'headless'),
    'footer'   => esc_html__('Footer', 'headless')
  ));
} // headless_register_menus()

/**
 * Removes the random br tags from WordPress galleries.
 * 
 * @hooked 		the_content
 * @since 		1.0.2
 * @param 		mixed 		$output 		The post content.
 * @param 		mixed 						The modified post content.
 */
function headless_remove_brs_from_galleries($output)
{

  return preg_replace('/\<br[^\>]*\>/', '', $output);
} // headless_remove_brs_from_galleries()

/*
 * Make theme available for translation.
 * Translations can be filed in the /languages/ directory.
 *
 * @hooked 		after_setup_theme
 * @since 		1.0.0
 */
function headless_text_domain()
{

  load_theme_textdomain('headless', get_template_directory() . '/languages');
} // headless_text_domain()

/**
 * Sets up basic items needed for the theme to work.
 * 
 * @hooked 		after_setup_theme
 * @since 		1.0.0
 */
function headless_theme_setup()
{

  add_theme_support('post-thumbnails');
} // headless_theme_setup()


/**
 * Disable Gutenberg editor for post types
 * 
 * @hooked 		after_setup_theme
 * @since 		1.0.0
 */
function headless_disable_block_editor()
{
  remove_post_type_support('post', 'editor');
  remove_post_type_support('page', 'editor');
} // headless_disable_block_editor()