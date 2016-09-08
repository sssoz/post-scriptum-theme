<?php get_header(); ?>

<main id="main" class="container-fluid">
  <h1><?php echo get_queried_object()->labels->name ?></h1>
  <hr/>
  <section class="container">
    <div class="cards row">

      <?php
      $args = array(
        'post_type' => 'parutions',
        'post_status' => 'publish',
      );
      $loop = new WP_Query( $args );
      if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>

      <article class="card card-issues col-lg-3 col-md-4 col-sm-6" id="post-<?php the_ID(); ?>">

        <?php
            $img = get_field('series_photo');
            $bg_style = 'background: %s; '.
                        'background-repeat: no-repeat; '.
                        'background-size: cover; ';
            $bg = sprintf($bg_style, $img ? 'url('.$img['sizes']['large'].')' : 'black');
        ?>
        <div class="img-container">
          <a href="<?= the_permalink() ?>">
            <div style="width: 100%; height: 175px; <?= $bg ?>"></div>
            <?php if ( $overlay = get_field('overlay_text') ) : ?>
                <div class="img-banner-overlay"><?= $overlay ?></div>
            <?php endif; ?>
          </a>
        </div>
        <div class="meta">Parution <span class="meta-number">n° <?= the_field('series_number') ?></span></div>
        <h3><a href="<?= the_permalink() ?>"><?= the_title() ?></a></h3>
        <p class="meta meta-short_preview">
          <?php 
            $text = strip_tags(get_field('series_text'));
            $text = wordwrap($text, 140);
            $text = explode("\n", $text);
            echo $text[0] . '...';
          ?>
        </p>
        <div class="meta meta-date"><?= get_the_date('F Y') ?></div>

      </article>

      <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no pages matched your criteria.' ); ?></p>
      <?php endif; ?>

    </div>
  </section>
</main>

<?php get_footer(); ?>
