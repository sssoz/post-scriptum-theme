<?php

$GLOBALS['BODY_ID'] = 'issue';
get_header();

?>

<main id="main" class="container-fluid">

<?php if ( have_posts() ) : 
  the_post(); 
  $img = get_field('series_photo');
  $bg_style = 'background: %s; '.
              'background-repeat: no-repeat; '.
              'background-position: center top; '.
              'background-size: cover; ';
  $bg = sprintf($bg_style, $img ? 'url('.$img['url'].')' : 'black');
  ?>

  <section>
    <div class="cover">
      <div class="jumbotron text-center" style="<?= $bg ?>">
        <div class="jumbo-overlay">
          <div class="container jumbo-container">
            <div class="jumbo-latest">
              <div class="meta">Parution <span class="meta-number">n° <?= get_field('series_number') ?></span></div>
              <h1 class="page-title"><a href="#article-intro"><?= the_title() ?></a></h1>
              <div class="meta meta-date"><?= get_the_date('F Y') ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="article-intro">
    <article class="col-md-6 col-md-offset-3 single-col">
      <h2><?= get_field('presentation_author') ?></h2>
      <div><?= get_field('series_text') ?></div>
    </article>

    <nav class="col-md-6 col-md-offset-3 single-col">
      <h2>Table des matières</h2>
      <ol class="toc">

        <li class="toc-item">
          <div class="meta">
            <div class="meta-author">__ author __</div>
            <div class="meta-affiliation">__ affiliation __</div>
          </div>
          <a href="#" class="article-title_group">
            <h3 class="article-title">__ article title __</h3>
            <div class="article-subtitle"></div>
          </a>
        </li>

        <li class="toc-item">
          <div class="meta">
            <div class="meta-author">__ author __</div>
            <div class="meta-affiliation">__ affiliation __</div>
          </div>
          <a href="#" class="article-title_group">
            <h3 class="article-title">__ article title __</h3>
            <div class="article-subtitle"></div>
          </a>
        </li>

      </ol>
    </nav>

  </section>

<?php endif; ?>

</main>

<?php get_footer(); ?>
