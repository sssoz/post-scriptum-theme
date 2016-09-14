<?php get_header(); ?>

<main id="main" class="container-fluid">

  <!-- Dernière parution -->

  <section class="cover">
    <?php

      $args = array(
        'post_type' => 'parutions',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'offset' => 0,
      );
      $loop = new WP_Query( $args );

      if ( $loop->have_posts() ) :

        $loop->the_post();
        $img = get_field('series_photo');
        $bg_style = 'background: %s; '.
                    'background-repeat: no-repeat; '.
                    'background-position: center top; '.
                    'background-size: cover; ';
        $bg = sprintf($bg_style, $img ? 'url('.$img['url'].')' : 'black');
        ?>

        <div class="jumbotron text-center" style="<?= $bg ?>">
          <div class="jumbo-overlay">
            <div class="container jumbo-container">
              <div class="jumbo-latest">
                <div class="meta">Parution <span class="meta-number">n° <?= the_field('series_number') ?></span></div>
                <h1><a href="<?= the_permalink() ?>"><?= the_title() ?></a></h1>
                <div class="meta meta-date"><?= get_the_date('F Y') ?></div>
                <div class="nav-down">
                  <a href="#tagline">
                    <span class="icon-arrow-down"></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="tagline"><?php bloginfo('description'); ?></div>

        <?php

        wp_reset_postdata();

      else :

        ?>

        <div class="jumbotron" style="height: 200px; background: #7a7a7a;"></div>

        <?php

      endif;

    ?>
  </section>

  <!-- Actualités récentes -->

  <section id="recent-news" class="container">
    <?php

      $args = array(
        'post_type' => 'actualites',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'offset' => 0,
      );
      $loop = new WP_Query( $args );

      if ( $loop->have_posts() ) :

        ?>

        <h2><a href="#" class="menu-option">Actualités</a></h2>
        <div class="row cards">

          <?php
            while ( $loop->have_posts() ) :
              $loop->the_post();
              $img = get_field('news_img');
              ?>

              <article class="card card-news-main col-md-4 col-ms-6">
                <div class="img-container">
                  <a href="<?= the_permalink() ?>">
                    <img src="<?= $img['url']?>" class="img-responsive"/>
                  </a>
                </div>
                <div class="meta meta-subtitle"><?= the_field('news_subtitle'); ?></div>
                <h3><a href="<?= the_permalink() ?>"><?= the_title() ?></a></h3>
              </article>

              <?php
            endwhile;
          ?>

          <div class="col-xs-12 meta text-right">
            <small><em><a href="<?= home_url( '/actualites/' ) ?>">Voir toutes les actualités <span class="icon-arrow-right"></span></a></em></small>
          </div>

        </div>
        <hr/>

        <?php

        wp_reset_postdata();

      endif;

    ?>
  </section>

  <section id="recent-issues" class="container">
    <h2><a href="#" class="menu-option">Derniers numéros</a></h2>

    <!-- Avant-dernière parution -->

    <div class="row">
      <?php

        $args = array(
          'post_type' => 'parutions',
          'post_status' => 'publish',
          'posts_per_page' => 1,
          'offset' => 1,
        );
        $loop = new WP_Query( $args );

        if ( $loop->have_posts() ) :
            $loop->the_post();
            $img = get_field('series_photo');
            ?>

            <article class="clearfix">
              <div class="col-md-6">
                <a href="<?= the_permalink() ?>">
                  <img src="<?= $img['sizes']['large']?>" class="img-responsive"/>
                </a>
              </div>
              <div class="col-md-6">
                <div class="container">
                  <div class="meta">Parution <span class="meta-number">n° <?= the_field('series_number') ?></span></div>
                  <h3><a href="<?= the_permalink() ?>"><?= the_title() ?></a></h3>
                  <p>
                    <?= text_truncate(get_field('series_text'), 400) ?>
                    <em><a href="<?= the_permalink() ?>">Lire la suite...</a></em>
                  </p>
                  <div class="meta meta-date"><?= get_the_date('F Y') ?></div>
                </div>
              </div>
            </article>

            <?php

          wp_reset_postdata();

        endif;

      ?>
    </div>

    <!-- Parutions récentes -->

    <div class="row cards">
      <?php

        $args = array(
          'post_type' => 'parutions',
          'post_status' => 'publish',
          'posts_per_page' => 3,
          'offset' => 2,
        );
        $loop = new WP_Query( $args );

        if ( $loop->have_posts() ) :

          while ( $loop->have_posts() ) :
            $loop->the_post();
            $img = get_field('series_photo');
            ?>

            <article class="card card-issue-main col-sm-4 col-xs-12">
              <div class="img-container">
                <a href="<?= the_permalink() ?>">
                  <img src="<?= $img['sizes']['large']?>" class="img-responsive"/>
                </a>
              </div>
                <div class="meta">Parution <span class="meta-number">n° <?= the_field('series_number') ?></span></div>
                <h3><a href="<?= the_permalink() ?>"><?= the_title() ?></a></h3>
                <p class="meta meta-short_preview">
                  <?= text_truncate(get_field('series_text')) ?>
                </p>
              <div class="meta meta-date"><?= get_the_date('F Y') ?></div>
            </article>

            <?php
          endwhile;

          wp_reset_postdata();

        endif;

      ?>
    </div>

    <div class="col-xs-12 meta text-right">
      <small><em><a href="<?= home_url( '/parutions/' ) ?>">Voir toutes les parutions <span class="icon-arrow-right"></span></a></em></small>
    </div>
  </section>

</main>

<?php get_footer(); ?>
