<?php get_header(); ?>
<body class="paused">
  
  <?php include "menu.php"; ?>

  <section class="row full-width ajusta-height pattern noticias minheight scroll-bar">
    <div class="large-12 large-centered columns revista-ampla shadow">
        <span aria-hidden="true" class="icon-newspaper"></span>
        <span class="roboto-slab">Revista <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt=""></span>
        <hr class="margem">
        <div class="large-block-grid-4">
          <?php 

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                  'posts_per_page' => 8,
                  'paged' => $paged,
                  'post_type' => 'post'
                );

                query_posts($args);
                 //new WP_Query(array());

                if ( have_posts() ) { 
                while (have_posts() ) { the_post(); ?>
          <li>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php if ( has_post_thumbnail() ) {            
                         the_post_thumbnail('noticias-thumb'); 
                  } ?>
            </a> 
              <h6 class="text-center">
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
              </a>
              </h6>
              <span class="categoria text-center"><?php echo get_the_category_list( '-', '', get_the_ID()); ?></span>
             
          </li>
          <?php } 
        } ?>
        </div>
        <div class="pagination-centered">
          <ul class="pagination">
            <li class="arrow "><?php next_posts_link( 'Mais antigos &raquo; ' ); ?></li>
            <li class="arrow"><?php previous_posts_link( '&laquo; Mais recentes' ); ?></li>
          </ul>
        </div>
    </div>
  </section>

<?php get_footer(); ?>