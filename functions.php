<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ( ! isset( $content_width ) ) {
    $content_width = 660;
}

function ps_setup() {
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');

    // Register Custom Navigation Walker
    require_once('wp_bootstrap_navwalker.php');
    register_nav_menus(array(
      'primary' => __( 'Primary Menu', 'post-scriptum' ),
    ));
}
add_action('after_setup_theme', 'ps_setup');

function ps_scripts() {
  /* add styles */
  wp_enqueue_style( 'bootstrap-core', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'custom', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'custom-extra', get_template_directory_uri() . '/style-extra.css' );

  /* add scripts */
  wp_enqueue_script( 'colourbrightness', get_template_directory_uri() . '/js/jquery.colourbrightness.min.js', array('jquery'), true );
  wp_enqueue_script( 'smoothstate', get_template_directory_uri() . '/js/jquery.smoothState.js', array('jquery'), true );
  wp_enqueue_script( 'jquery-toc', get_template_directory_uri() . '/js/jquery.toc.min.js', array('jquery'), true );
  wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), true );
}
add_action('wp_enqueue_scripts', 'ps_scripts');

function text_truncate($text, $words=140) {
  $new = strip_tags($text);
  $new = preg_replace("/\n/", " ", $new);
  $new = wordwrap($new, $words);
  $new = explode("\n", $new);

  if ( isset($new[0]) )
    return $new[0] . '...';
  return '';
}

function clean_title($title) {
  return preg_replace('/^\[.*\]\s*/', '', $title);
}

$GLOBALS['parse_references_top_count'] = 1;

function parse_references_top($content) {
  $template = 
    '<span id="note-top-%s"></span>'.
    '<a href="#note-%s">'.
      '%s'.
    '</a>';

  $content = preg_replace_callback(
    '/(\[\d{1,2}\])/', 
    function($match) use ($template) {
      $count = &$GLOBALS['parse_references_top_count'];
      $text = sprintf($template, $count, $count, $match[0]);
      $count++;
      return $text;
    },
    $content
  );

  return $content;
}

$GLOBALS['parse_references_bottom_count'] = 1;

function parse_references_bottom($content) {
  $template = 
    '<span id="note-%s"></span>'.
    '<a href="#note-top-%s">'.
      '%s'.
    '</a>';

  $content = preg_replace_callback(
    '/(\[\d{1,2}\])/', 
    function($match) use ($template) {
      $count = &$GLOBALS['parse_references_bottom_count'];
      $text = sprintf($template, $count, $count, $match[0]);
      $count++;
      return $text;
    },
    $content
  );

  return $content;
}

