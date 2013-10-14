<?php get_header(); ?>
<body class="paused">
  <?php include "menu.php"; ?>
  <section class="row full-width large-centered menu-conteudo minheight">
    <ul class="large-block-grid-3 small-block-grid-1">
       <?php  $filial = new WP_Query(array(
                'showposts' => 3,
                'post_type' => 'filial'));

                if($filial->have_posts()){ 

                  while($filial->have_posts()) { 
                    $filial->the_post(); 
                    $image = get_field('imagem_1');

            ?>
      <li class="bloco conheca-ampla" style="background: url(<?php echo $image['sizes']['large'] ?>);">
        <a href="<?php the_permalink(); ?>">
          <div class="fundo-transparente red"></div>
          <div class="bola conheca-bola"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt=""><br><?php the_title(); ?></div>
        </a>
      </li>
  <?php
   }
 } ?>

    </ul>
  </section>
  
<?php get_footer(); ?>