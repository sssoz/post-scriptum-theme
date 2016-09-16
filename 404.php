<?php get_header(); ?>

<main id="main" class="container-fluid">
  <h1>Page introuvable</h1>
  <hr>
  <section class="container">

    <p style="margin-bottom: 2em;">
      Désolé, cette page est introuvable.
    </p>

    <?php
      $match_uri = preg_match('/.*\/(.*)$/', $_SERVER['REQUEST_URI'], $matches);
      if ($match_uri) {

        // Build Regexp with initial query

        $split = preg_replace('/[-_]/', ' ', $matches[1]);
        $split = explode(' ', $split);
        $i=0;
        foreach ($split as $part) {
          if (strlen($part) <= 3)
            unset( $split[$i] );
          $i++;
        }
        $split = implode(' ', $split);
        $split = substr($split, 0, 25);
        $split = trim($split);
        $split = preg_replace('/\s+/', '.*', $split);

        $total_matches = 0;
        $last_match_permalink = null;

        // Search in series

        $args = array(
          'post_type' => 'parutions',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'offset' => 0,
        );
        $loop = new WP_Query( $args );

        if ( $loop->have_posts() ) {
          $matching_series = '';

          while ( $loop->have_posts() ) {
            $loop->the_post();
            if ( preg_match("/$split/", get_the_permalink()) ) {
              if (!$matching_series) {
                $matching_series .= '<p><strong>Parutions similaires : </strong></p>';
              }
              $matching_series .= '<p><a href="'.get_the_permalink().'">'.get_the_title().'</a></p>';
              $total_matches++;
              $last_match_permalink = get_the_permalink();
            }
          }

          echo $matching_series;
          wp_reset_postdata();
        }

        // Search in posts

        $args = array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'offset' => 0,
        );
        $loop = new WP_Query( $args );

        if ( $loop->have_posts() ) {
          $matching_posts = '';

          while ( $loop->have_posts() ) {
            $loop->the_post();
            if ( preg_match("/$split/", get_the_permalink()) ) {
              if (!$matching_posts) {
                $matching_posts .= '<p><strong>Articles similaires : </strong></p>';
              }
              $matching_posts .= '<p><a href="'.get_the_permalink().'">'.get_the_title().'</a></p>';
              $total_matches++;
              $last_match_permalink = get_the_permalink();
            }
          }

          echo $matching_posts;
          wp_reset_postdata();
        }

        if ($total_matches == 1) {
          ?>

          <script>window.location.replace("<?= $last_match_permalink ?>");</script>

          <?php
        }

      } // endif $match_uri
    ?>
        
  </section>
</main>

<?php get_footer(); ?>
