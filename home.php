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
        $bg = 'background: url('.$img['url'].')';
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

      else : ?>

        <div class="jumbotron" style="height: 200px; background: #7a7a7a;"></div>

        <?php
      endif;
    ?>
  </section>

  <!-- Actualités récentes -->

  <section id="recent-news" class="container">
    <h2><a href="#" class="menu-option">Actualités</a></h2>
    <div class="row cards">

        ...

    </div>
    <hr/>
  </section>


  <section id="recent-issues" class="container">
    <h2><a href="#" class="menu-option">Parutions</a></h2>

    <!-- Avant-dernière parution -->
    <div class="row">

        ...

    </div>

    <!-- Parutions récentes -->
    <div class="row cards">

      ...

    </div>
  </section>

</main>

<?php get_footer(); ?>
