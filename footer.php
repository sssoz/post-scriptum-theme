<footer id="footer">
  <hr/>
  <div class="container-fluid">
    <h2>
      <a href="<?php echo esc_url( home_url() ); ?>" class="logo"><span class="logo-bg"></span></a>
    </h2>
    <div class="row">
      <div class="col-md-4">
        <p class="meta">Une initiative des étudiants du département de littérature comparée de l'Université de Montréal</p>
        <p class="meta"><?php echo date('Y'); ?></p>
        <div>
          <ul>
          </ul>
        </div>
      </div>
      <div class="col-md-6 col-md-offset-2 text-right">
        <p><em>N'hésitez pas à nous écrire&nbsp;:</em><br/>
          <span class="meta"><a href="mailto:redaction@post-scriptum.org">redaction@post-scriptum.org</a></span>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 text-center">
        <a href="#header">Retourner en haut</a>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
<script>
$(document).ready(function(){
  $('.page-header').colourBrightness();
  $('#article-toc').toc();
  $('#cover').smoothState();
});
</script>
</body>
</html>
