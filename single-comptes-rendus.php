<?php get_header(); ?>

<main id="main" class="container-fluid">
  <hr/>
  <article class="col-md-6 col-md-offset-3 single-col">
    <h1><?= get_the_title(); ?></h1>
    <h2 class="meta article-subtitle"><?= get_field('article_subtitle')  ?></h2>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="meta meta-author"><?php the_field('article_author'); ?></div>
      <div class="meta meta-affiliation"><?php the_field('article_affiliation'); ?></div>
      <div class="meta meta-date"><?= get_the_date(); ?></div>
      <br>
      <?php the_content(); ?>
    <?php endwhile; else : ?>
      <p><?php _e( 'Sorry, no pages matched your criteria.' ); ?></p>
    <?php endif; ?>
  </article>
</main>

<?php get_footer(); ?>
