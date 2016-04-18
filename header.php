<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title(' '); ?> | <?php bloginfo(' '); ?></title>
  <meta name="description" content="Revue de recherche interdisciplinaire en texte et médias">
  <meta name="keywords" content="Post-Scriptum, littérature comparée, ">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:image" content="http://www.post-scriptum.org/img/cover120x120.png" />
  <meta name="twitter:title" content="Post-Scriptum">
  <meta name="twitter:description" content="Revue de recherche interdisciplinaire en texte et médias">
  <meta name="theme-color" content="#000000">
  <!-- Open Graph data -->
  <meta property="og:title" content="Post-Scriptum" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="http://www.post-scriptum.org" />
  <meta property="og:image" content="http://www.post-scriptum.org/img/cover100x100.png" />
  <meta property="og:description" content="Revue de recherche interdisciplinaire en texte et médias" />
  <meta property="og:site_name" content="Post-Scriptum" />
  <!-- Favicons -->
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="img/favicon/mstile-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="img/favicon/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="img/favicon/http://apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="img/favicon/apple-touch-icon-152x152.png" />
  <link rel="icon" type="image/png" href="img/favicon/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="img/favicon/favicon-16x16.png" sizes="16x16" />
  <!-- <link rel="stylesheet" href="/post-scriptum/css/bootstrap.min.css">
  <link rel="stylesheet" href="/post-scriptum/css/style.css"> -->
  <link rel="canonical" href="http://www.post-scriptum.org/post-scriptum/">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header id="header" class="page-header container-fluid">
    <div class="row">
      <div class="col-md-4">
        <a href="<?php echo esc_url( home_url() ); ?>" class="logo"><span class="logo-bg"></span></a>
      </div>
      <nav class="col-md-8 text-right">
        <div class="menu collapse-navbar-collapse">
          <!-- <a href="/post-scriptum/parutions/" class="menu-option">Parutions</a>
          <a href="/post-scriptum/compte-rendus/" class="menu-option">Compte rendus</a>
          <a href="/post-scriptum/entretiens/" class="menu-option">Entretiens</a>
          <a href="/post-scriptum/actualites/" class="menu-option">Actualités</a>
          <a href="/post-scriptum/a-propos/" class="menu-option">À propos</a> -->
          <?php
          wp_nav_menu( array(
            'menu'              => 'primary',
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            // 'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav navbar-right',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
          );
          ?>
        </div>
      </nav>
    </div>
  </header>
