<?php include "header.php"; ?>
<body>
  
  <?php include "menu.php"; ?>

  <section class="row full-width ajusta-height pattern noticias minheight scroll-bar">
    <div class="large-12 columns revista-ampla shadow">
      <?php 
              if (have_posts()){ 
                while (have_posts()) {
                the_post();
                 ?>
        <div class="large-1 columns">
          <a href="<?php bloginfo('url')?>/noticias"><span aria-hidden="true" class="icon-reply"></span></a>
        </div>
        <div class="large-11 columns">
          <h4 class="text-center"><?php the_title(); ?></h4>
        </div>
        <div class="large-12 columns text-center">
          <span aria-hidden="true" class="icon-user"></span>
          <span class="nome">por  <?php echo get_the_author(); ?> </span>
          <span aria-hidden="true" class="icon-calendar"></span>
          <span class="nome">Publicado em <?php the_time('j/m/Y'); ?> </span>
          <hr>
        </div>
        <div class="large-2 columns text-center">
          <span class="share">Compartilhe</span>
          <ul class="large-block-grid-1 text-center">
            <li>
              <a href="http://twitter.com/home?status=Lendo <?php the_title(); ?>: <?php the_permalink(); ?>" title="Clique para enviar essa página para o twitter" target="_blank">
                <img src="<?php bloginfo('template_url'); ?>/img/twitter.png" alt="">
              </a>
            </li>
            <li>
              <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>">
                <img src="<?php bloginfo('template_url'); ?>/img/facebook.png" alt="Compartilhar no seu facebook" target="_blank">
              </a>
            </li>
            <li>
              <a href="mailto:emaildoseuamigo@email.com?subject=<?php the_title()?>&body=<?php the_permalink()?>">
                <img src="<?php bloginfo('template_url'); ?>/img/email.png" alt="">
              </a>
            </li>
          </ul>
        </div>
        <div class="large-10 columns materia text-justify">
          <?php the_content('Read Full Article'); ?>
        </div>
                <?php 
      }
    }
  ?>
    </div>
  </section>

<?php include "footer.php"; ?>