<?php 

$GLOBALS['CUSTOM_TITLE'] = clean_title( get_the_title() );

get_header(); 

$affiliation = get_field('article_affiliation');
$abstract_fr = get_field('abstract_fr');
$abstract_en = get_field('abstract_en');
$references  = get_field('article_references');

?>

<main id="main" class="container-fluid">

<?php if ( have_posts() ) : the_post(); ?>

  <section class="row">
    <article>
      <header class="container-fluid">
        <h1 class="page-title"><?= clean_title( get_the_title() ) ?></h1>
        <h2 class="meta article-subtitle"><?= get_field('article_subtitle')  ?></h2>
        <div class="meta"><?= get_field('article_author') ?><?= ($affiliation ? "<br> $affiliation" : "") ?></div>
      </header>

      <hr/>

      <aside id="article-toc-container" class="col-md-3">
        <nav id="article-toc" class="col-md-3"></nav>
      </aside>

      <div id="article-content" class="col-md-6">
        <div class="text-center">
          <p class="meta"><small><em>Cet article est apparu dans notre parution n° <?= get_field('series_number') ?>.</em></small></p>
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

        <?= get_field('article_text') ?>

        <hr />

        <?php if ($references) : ?>
          <h3 id="bibliographie">Références</h3>
          <?= get_field('article_references') ?>
        <?php endif; ?>


      </div>
    </article>
  </section>

<?php endif; ?>

</main>

<?php get_footer(); ?>
