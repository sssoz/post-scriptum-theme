<?php

$GLOBALS['BODY_ID'] = 'all-reports';
get_header();

?>

<main id="main" class="container-fluid">
  <h1><?php echo get_queried_object()->labels->name ?></h1>
  <hr/>
  <section class="container">
    <div class="cards">

      <?php
      $args = array(
        'post_type' => 'comptes-rendus',
        'post_status' => 'publish',
      );
      $loop = new WP_Query( $args );
      if ( $loop -> have_posts() ) : while ( $loop -> have_posts() ) : $loop -> the_post(); ?>

      <article class="card card-report col-md-4 col-sm-6" id="post-<?php the_ID(); ?>">
          <div class="meta meta-author"><?php the_field( "article_author" ); ?></div>
          <div class="meta meta-affiliation"><?php the_field( "article_affiliation" ); ?></div>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      </article>

      <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no pages matched your criteria.' ); ?></p>
      <?php endif; ?>

    </div>
  </section>
</main>

<?php get_footer(); ?>
