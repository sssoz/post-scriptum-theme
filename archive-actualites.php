<?php get_header(); ?>

<main id="main" class="container-fluid">
  <h1><?php echo get_queried_object()->labels->name ?></h1>
  <hr/>
  <section class="container">
    <div class="cards">

      <?php
      $args = array(
        'post_type' => 'actualites',
        'post_status' => 'publish',
      );
      $loop = new WP_Query( $args );
      if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>

      <article class="row" id="post-<?php the_ID(); ?>">
        <div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <h4 class="meta"><a href="<?php the_permalink(); ?>"><?php the_field( "news_subtitle" ); ?></a></h4>
          <div class="meta meta-date"><?= get_the_date() ?></div>
          <div class="img-container">
            <a href="<?php the_permalink(); ?>">
              <?php
                $image = get_field('news_img');
                if( !empty($image) ):
              ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive"/>
              <?php endif; ?>
            </a>
          </div>
          <hr/>
        </div>
      </article>

      <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no pages matched your criteria.' ); ?></p>
      <?php endif; ?>

    </div>
  </section>
</main>

<?php get_footer(); ?>
