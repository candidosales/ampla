<?php get_header(); ?>
<body class="paused">
  
  <?php include "menu.php"; ?>

  <section class="row full-width ajusta-height content-equipe minheight large-centered scroll-bar">
    <ul class="large-block-grid-4 small-block-grid-1 content">
      <?php  $vendedor = new WP_Query(array(
                'showposts' => 60,
                'post_type' => 'vendedor'));

                if($vendedor->have_posts()){ 

                  while($vendedor->have_posts()) { 
                    $vendedor->the_post(); 
            ?>
      <li>
         <?php if ( has_post_thumbnail() ) { 
                  the_post_thumbnail('vendedor-produto-thumb'); 
                } ?>
        <div class="yellow-white large-12 columns text-left">
          <h4 class="nome"><?php the_title(); ?></h4>
          <span class="cargo"><?php echo get_post_meta(get_the_ID(), 'funcao', true) ?></span>
          <div class="large-12 columns text-left">
            <span aria-hidden="true" class="icon-location"></span> <span><?php echo get_post_meta(get_the_ID(), 'filial', true) ?></span>
          </div>
          <div class="large-12 columns text-left">
            <span aria-hidden="true" class="icon-phone"></span><span><?php echo get_post_meta(get_the_ID(), 'telefone', true) ?></span>
          </div>
          
        </div>
      </li>
                          <?php

                  }
                } ?>

    </ul>
  </section>

<?php get_footer(); ?>