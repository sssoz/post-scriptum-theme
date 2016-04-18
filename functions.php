<?php

    if ( ! isset( $content_width ) ) {
        $content_width = 660;
    }

    function ps_setup() {

        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');

        // Register Custom Navigation Walker
        require_once('wp_bootstrap_navwalker.php');
        register_nav_menus( array(
          'primary' => __( 'Primary Menu', 'post-scriptum' ),
          ) );
    }

    add_action('after_setup_theme', 'ps_setup');

    function ps_scripts() {

      /* add styles */
      wp_enqueue_style( 'bootstrap-core', get_template_directory_uri() . '/css/bootstrap.min.css' );
      wp_enqueue_style( 'custom', get_template_directory_uri() . '/style.css' );

      /* add scripts */
      wp_enqueue_script( 'jquery-toc', get_template_directory_uri() . '/js/jquery.toc.min.js', array('jquery'), true );
      wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), true );

    }

    add_action('wp_enqueue_scripts', 'ps_scripts');

 ?>
