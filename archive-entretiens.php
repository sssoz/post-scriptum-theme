<?php

$GLOBALS['BODY_ID'] = 'all-interviews';
get_header();

?>

<main id="main" class="container-fluid">
  <h1><?php echo get_queried_object()->labels->name ?></h1>
  <hr/>
  <section class="container">
    <div class="cards row">

      <?php
      $args = array(
        'post_type' => ['post', 'entretiens'],
        'category_name' => 'entretiens',
        'post_status' => 'publish',
      );
      $loop = new WP_Query( $args );
      if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>

      <article class="card card-interview col-md-3 col-sm-4" id="post-<?php the_ID(); ?>">
        <?php
            $series_date = false;

            $img = get_field('interview_photo');
            $number = get_field('series_number');
            if (!$img && $number) {
              $id = series_get_id($number);
              $img = get_field('series_photo', $id);
              $series_date = get_the_date('F Y', $id);
            }

            $bg_style = 'background: %s; '.
                        'background-repeat: no-repeat; '.
                        'background-size: cover; ';
            $bg = sprintf($bg_style, $img ? 'url('.$img['sizes']['medium'].')' : 'black');
        ?>
        <a href="<?= the_permalink() ?>">
            <div style="width: 100%; height: 150px; <?= $bg ?>"></div>
        </a>
        <div class="card-interview-body">
          <h3><a href="<?= the_permalink() ?>"><?= clean_title( get_the_title() ); ?></a></h3>
          <div class="meta meta-author">Par <?php the_field( "article_author" ); ?></div>
          <div class="meta meta-date"><?= ($series_date ? $series_date : get_the_date('F Y')); ?></div>
        </div>
      </article>

      <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no pages matched your criteria.' ); ?></p>
      <?php endif; ?>

    </div>
  </section>
</main>

<?php get_footer(); ?>
