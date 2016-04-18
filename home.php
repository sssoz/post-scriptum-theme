  <?php get_header(); ?>
  <main id="main" class="container-fluid">
    <main id="home">
      <!-- Dernière parution -->
      <section class="cover">
        <div class="jumbotron text-center" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/img/cov-18.1.jpg')">
          <div class="jumbo-overlay">
            <div class="container jumbo-container">
              <div class="jumbo-latest">
                <div class="meta"><?php _e( 'Parution' ); ?> <span class="meta-number">n° 18.1</span></div>
                <h1><a href="/post-scriptum/parutions/2015/12/12/parution.html">Supplément aux Hygiènes de la création</a></h1>
                <div class="meta meta-date">December 2015</div>
                <div class="nav-down">
                  <a href="#tagline">
                    <span class="icon-arrow-down"></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="tagline"><?php bloginfo('description'); ?></div>
      </section>

      <!-- Actualités récentes -->
      <section id="recent-news" class="container">
        <h2><a href="/post-scriptum/actualites" class="menu-option"><?php _e( 'Actualités' ); ?></a></h2>
        <div class="row cards">
          <?php
          $args = array(
            'category_name' => 'actualite',
            'posts_per_page' => 3,
          );
          $loop = new WP_Query( $args );
          if ( $loop -> have_posts() ) : while ( $loop -> have_posts() ) : $loop -> the_post(); ?>
          <article class="card card-news-main col-md-4 col-ms-6" id="post-<?php the_ID(); ?>">
            <div class="img-container">
              <a href="<?php the_permalink(); ?>">
                <?php
                $image = get_field('news_img');
                if( !empty($image) ): ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive"/>
                <?php endif; ?>
              </a>
            </div>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="meta meta-subtitle"><?php the_field( "news_subtitle" ); ?></div>
          </article>
          <?php endwhile; else : ?>
            <p><?php _e( 'Sorry, no pages matched your criteria.' ); ?></p>
          <?php endif; ?>
          <div class="col-xs-12 meta text-right">
            <small><em><a href="actualites"><?php _e( 'Voir toutes les actualités' ); ?> <span class="icon-arrow-right"></span></a></em></small>
          </div>
        </div>
        <hr/>
      </section>
      <section id="recent-issues" class="container">
        <h2><a href="/post-scriptum/parutions" class="menu-option"><?php _e( 'Parutions' ); ?></a></h2>
        <!-- Avant-dernière parution -->
        <div class="row">
          <?php
          $taxonomy='issue';
          $terms=get_the_terms($post->ID,$taxonomy);
          echo "<pre>"; print_r($terms); echo "</pre>";
           ?>

           <?php
           $terms = get_the_terms( $post->ID , 'issue' );
           if($terms) {
	            foreach( $terms as $term ) {
		              echo $term->description;
	               }
               }
          ?>

          <p><?php the_field('issue_img', $term); ?></p>


          <?php
          $args = array(
            'taxonomy' => 'issues',
            'posts_per_page' => 1,
          );
          $loop = new WP_Query( $args );
          if ( $loop -> have_posts() ) : while ( $loop -> have_posts() ) : $loop -> the_post(); ?>


          <article class="clearfix">
            <div class="col-md-6">
              <a href="<?php the_permalink(); ?>">
                <?php
                $image = get_field('issue_img');
                if( !empty($image) ): ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive"/>
                <?php endif; ?>
              </a>
            </div>
            <div class="col-md-6">
              <div class="container">
                <div class="meta"><?php _e( 'Parution' ); ?> <strong><?php the_field( "issue_number" ); ?></strong></div>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p>Pour certains d’entre nous, penser à l’université relève d’une certaine pathologie. Sadisme, masochisme, schizophrénie, psychoses diverses qui vont parfois jusqu’à la narratologie ou, cela peut arriver aux meilleurs, d’inexplicables et pénibles épisodes de schématisme. Les spécialistes de la question nous prescriront : Encore trop de corps. Il faut exercer l’esprit plus régulièrement, éviter les courants d’air, et surtout favoriser l’élimination des toxines, des miasmes. Mais ces mêmes certains, incertains de l’efficacité des remèdes, commencent à douter du bien-fondé du diagnostic... <em><a href="/post-scriptum/parutions/2015/10/08/parution.html">Lire la suite...</a></em></p>
                <div class="meta meta-date"><?php the_time('M Y'); ?></div>
              </div>
            </div>
          </article>
          <?php endwhile; else : ?>
            <p><?php _e( 'Sorry, no pages matched your criteria.' ); ?></p>
          <?php endif; ?>
        </div>
        <!-- Parutions récentes -->
        <div class="row cards">

          <article class="card card-issue-main col-sm-4 col-xs-12">
            <div class="img-container">
              <a href="/post-scriptum/parutions/2015/09/01/parution.html">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/cov-17.jpg" class="img-responsive"/>
              </a>
            </div>
            <div class="meta">Parution <span class="meta-number">n° 17</span></div>
            <h3><a href="/post-scriptum/parutions/2015/09/01/parution.html">Amoureuses figures</a></h3>
            <p class="meta meta-short_preview">Les idées ne trônent pas au-dessus de nos têtes, pas plus qu’elles n’habitent dans nos têtes ; elles marchent au milieu de nous et s’approchent...</p>
            <div class="meta meta-date">September 2015</div>
          </article>

          <article class="card card-issue-main col-sm-4 col-xs-12">
            <div class="img-container">
              <a href="/post-scriptum/parutions/2015/08/08/parution.html">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/cov-16.jpg" class="img-responsive"/>
              </a>
            </div>
            <div class="meta">Parution <span class="meta-number">n° 16</span></div>
            <h3><a href="/post-scriptum/parutions/2015/08/08/parution.html">Grandeur de l'empire</a></h3>
            <p class="meta meta-short_preview">Pour marquer la reprise de la revue, après de longues années d’absence, la nouvelle équipe éditoriale a préparé un numéro éclaté, atypique, fonctionnant tantôt comme...</p>
            <div class="meta meta-date">August 2015</div>
          </article>

          <article class="card card-issue-main col-sm-4 col-xs-12">
            <div class="img-container">
              <a href="/post-scriptum/parutions/2015/07/01/parution.html">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/cov-15.jpg" class="img-responsive"/>
              </a>
            </div>
            <div class="meta">Parution <span class="meta-number">n° 15</span></div>
            <h3><a href="/post-scriptum/parutions/2015/07/01/parution.html">Le Piédestal et ses médiations</a></h3>
            <p class="meta meta-short_preview">Le piédestal est d’abord à comprendre dans son acception technique comme le socle d’une statue, donc un support qui participe de l’œuvre tout en se...</p>
            <div class="meta meta-date">July 2015</div>
          </article>

          <div class="col-xs-12 meta text-right">
            <small><em><a href="/post-scriptum/parutions">Voir toutes les parutions <span class="icon-arrow-right"></span></a></em></small>
          </div>
        </div>
      </section>
    </main>
    <?php get_footer(); ?>
  </main>
  <script>
  $(document).ready(function(){
    $('.page-header').colourBrightness();
    $('#article-toc').toc();
    $('#cover').smoothState();
  });
  </script>
  <?php wp_footer(); ?>
</body>
</html>
