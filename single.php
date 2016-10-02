<?php

$title_clean        = clean_title( get_the_title() );
$series_number      = get_field('series_number');
$affiliation        = get_field('article_affiliation');
$abstract_fr        = get_field('abstract_fr');
$abstract_en        = get_field('abstract_en');
$references         = get_field('article_references');
$references_title   = get_field('article_references_title');

// Get series permalink
$series_id = series_get_id( $series_number );
$series_permalink = get_post_permalink( $series_id );

// Set page title
$GLOBALS['CUSTOM_TITLE'] = $title_clean;

get_header();

?>

<main id="main" class="container-fluid">

<?php if ( have_posts() ) : the_post(); ?>

  <section class="row">
    <article>
      <header class="container-fluid">
        <h1 class="page-title"><?= $title_clean ?></h1>
        <h2 class="meta article-subtitle"><?= get_field('article_subtitle')  ?></h2>
        <div class="meta"><?= get_field('article_author') ?><?= ($affiliation ? "<br> $affiliation" : "") ?></div>
      </header>

      <hr/>

      <aside id="article-toc-container" class="col-md-3">
        <nav id="article-toc" class="col-md-3"></nav>
      </aside>

      <div id="article-content" class="col-md-6">
        <div class="text-center">
          <a href="<?= $series_permalink ?>">
            <p class="meta"><small><em>N° <?= $series_number ?></em></small></p>
          </a>
          <div id="share-menu">
            <div id="share-menu-content">
              <a href="#" class="share-fb">
                <span class='icon-facebook'></span>
              </a>
              <a href="#" class="share-twitter" target="_blank">
                <span class='icon-twitter'></span>
              </a>
              <a href="#" class="print-pdf" target="_blank">
                <span class='icon-print'></span>
              </a>
            </div>
          </div>
        </div>

        <?php if ($abstract_fr) : ?>
          <p><strong>RÉSUMÉ</strong></p>
          <p><em><?= $abstract_fr ?></em></p>
        <?php endif; ?>

        <?php if ($abstract_en) : ?>
          <p><strong>ABSTRACT</strong></p>
          <p><em><?= $abstract_en ?></em></p>
        <?php endif; ?>

        <hr />

        <?= parse_references_top( get_field('article_text') ) ?>

        <hr />

        <?php if ($references) : ?>
          <?php if ($references_title) : ?>
            <h3 id="bibliographie"><?= $references_title ?></h3>
          <?php else : ?>
            <h3 id="bibliographie">Références</h3>
          <?php endif; ?>

          <?= parse_references_bottom( $references ) ?>
        <?php endif; ?>


      </div>
    </article>
  </section>

<?php endif; ?>

</main>

<?php get_footer(); ?>
