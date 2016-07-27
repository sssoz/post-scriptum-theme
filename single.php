<?php get_header(); ?>

<main id="main" class="container-fluid">
  <h1><?= get_the_title(); ?></h1>
  <hr/>
  <article class="col-md-6 col-md-offset-3 single-col">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; else : ?>
      <p><?php _e( 'Sorry, no pages matched your criteria.' ); ?></p>
    <?php endif; ?>
  </article>
</main>

<?php get_footer(); ?>
