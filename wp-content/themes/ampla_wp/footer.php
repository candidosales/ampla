  <div class="row full-width rodape ">
    <section class="large-12 columns hide-for-small bg-white">
        <div class="large-1 columns parceiros">
          Parceiros
        </div>
        <div class="large-11 columns lista_parceiros">
          <ul id="carouselParceiros" class="carousel-parceiros  slideRight1 animated">
            <?php
            $parceiro = new WP_Query(array(
                'showposts' => 18,
                'post_type' => 'publicidade',
                'tipo_publicidade' => 'parceiro')); 
              if($parceiro->have_posts()){ 
                  while($parceiro->have_posts()) { 
                    $parceiro->the_post(); 
            ?>
            <li>
              <?php
                if ( has_post_thumbnail() ) {            
                         the_post_thumbnail('publicidade-thumb'); 
                    } 
                ?>
            </li>
            <?php   }
                } ?>
          </ul>
        </div>
    </section>

    <footer class="large-12 columns">
      <div class="large-4 columns">
        <a href="" title="Facebook"><span aria-hidden="true" class="icon-facebook"></span></a>
        <a href="" title="Twitter"><span aria-hidden="true" class="icon-twitter"></span></a>
        <a href="">FALE CONOSCO</a>
      </div>
      <div class="large-2 columns hide-for-small">
        <!--
        <a href="">
          <span aria-hidden="true" class="icon-bubbles"></span>
          CHAT
        </a>
      -->
      </div>
    </footer>
  </div>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-15472644-30', 'amplaconstrucao.com');
  ga('send', 'pageview');

</script>
  <!--
  <script src="<?php bloginfo('template_url'); ?>/js/jquery-1.10.1.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/jquery-ui.min.js"></script> 
  <script src="<?php bloginfo('template_url'); ?>/js/foundation.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/vendor/custom.modernizr.js"></script>
  
  <script src="<?php bloginfo('template_url'); ?>/js/enquire.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/vendor/slimScroll/jquery.slimscroll.min.js"></script> 
  <script src="<?php bloginfo('template_url'); ?>/js/jquery.isotope.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>  -->
  <script src="<?php bloginfo('template_url'); ?>/js/ampla.min.js"></script>
  <?php wp_footer(); ?>
</body>
</html>
