<?php get_header(); ?>

<main id="main" class="container-fluid">
  <h1><?php echo get_the_title(); ?></h1>
  <hr/>
  <section class="container">
    <div class="cards">
      <?php
      $args = array(
        'taxonomy' => 'parutions',
      );
      $loop = new WP_Query( $args );

      if ( $loop -> have_posts() ) : while ( $loop -> have_posts() ) : $loop -> the_post(); ?>
      <div class="card card-issues col-lg-3 col-md-4 col-sm-6">
        <div class="img-container">
          <a href="/post-scriptum/parutions/2015/12/12/parution.html">
          </a>
        </div>
        <div class="meta">Parution <span class="meta-number">n° 18.1</span></div>
        <h3><a href="/post-scriptum/parutions/2015/12/12/parution.html">Supplément aux Hygiènes de la création</a></h3>
        <p class="meta meta-short_preview">Pour poursuivre la réflexion sur les hygiènes de la création, proposée dans le numéro 18,...</p>
        <div class="meta meta-date"><?php the_date(); ?></div>
      </div>
    <?php endwhile; else : ?>
      <p><?php _e( 'Sorry, no pages matched your criteria.' ); ?></p>
    <?php endif; ?>
  </hr/>
  <div>
    <?php
    $taxonomy = 'issue';
    $term_args = array(
      'hide_empty' => false,
      'orderby' => 'issue_number',
      'order' => 'DESC'
    );
    $tax_terms = get_terms($taxonomy, $term_args);
    $issue_number = get_post_meta( get_the_ID(), 'issue_number', true );

    foreach ($tax_terms as $term) {
      echo '<p><a href="' . esc_attr(get_term_link($term, $taxonomy)) . '" title="' . $term->name . '" ' . '>' . $term->name . '</a>' . $issue_number .'</p>';
    }
    ?>

  </div>
</div>
</section>
</main>

<?php get_footer(); ?>
