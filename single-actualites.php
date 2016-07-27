<?php 

$queried_object = get_queried_object();
$post_type = get_post_type_object($queried_object->post_type);

get_header(); 

?>

<main id="main" class="container-fluid">
  <h1><?= $post_type->labels->name ?></h1>
  <hr/>
  <article class="col-md-6 col-md-offset-3 single-col">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <header>
          <h2><?php the_title(); ?></h2>
          <h3 class="meta"><?php the_field('news_subtitle'); ?></h3>
      </header>
      <?php the_content(); ?>
    <?php endwhile; else : ?>
      <p><?php _e( 'Sorry, no pages matched your criteria.' ); ?></p>
    <?php endif; ?>
  </article>
</main>

<?php get_footer(); ?>
