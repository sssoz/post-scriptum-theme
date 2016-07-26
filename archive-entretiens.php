<?php get_header(); ?>

<main id="main" class="container-fluid">
  <h1><?php echo get_the_title(); ?></h1>
  <hr/>
  <section class="container">
    <div class="cards row">
      <?php
      $args = array(
        'category_name' => 'entretien',
      );
      $loop = new WP_Query( $args );
      if ( $loop -> have_posts() ) : while ( $loop -> have_posts() ) : $loop -> the_post(); ?>
      <article class="card card-interview col-md-3 col-sm-4" id="post-<?php the_ID(); ?>">
        <div style="width: 100%; height: 150px;">
          <img src="<?php the_field( "interview_photo" ); ?>" class="img-responsive"/>
        </div>
        <div class="card-interview-body">
          <h3><a href="#"><?php the_title(); ?></a></h3>
          <div class="meta meta-author"><?php the_field( "article_author" ); ?></div>
          <div class="meta meta-date"><?php the_time('M Y'); ?></div>
        </div>
      </article>
      <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no pages matched your criteria.' ); ?></p>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
