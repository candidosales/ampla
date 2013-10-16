<?php get_header(); ?>
<body class="paused">
  
  <?php include "menu.php"; ?>

  <section class="row full-width ajusta-height pattern noticias minheight scroll-bar">
    <div class="large-12 large-centered columns revista-ampla shadow">
      <div class="row">
  	    <div class="large-3 columns">
  	        <span aria-hidden="true" class="icon-newspaper"></span>
  	        <span class="roboto-slab">Revista <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt=""></span>
  	    </div>
  	    <div class="large-7 columns">
  	    	<?php get_search_form();?>
  	    </div>
      </div>
	    <hr class="margem"> 
    	<?php if ( have_posts() ) : ?>
        <h5><?php printf( __( 'Resultado da busca por: %s'), '<i>' . get_search_query() . '</i>' ); ?></h5>
        <div class="large-block-grid-4">
          <?php while (have_posts() ) { the_post(); ?>
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
        <?php } ?>
        </div>
        <div class="pagination-centered">
          <ul class="pagination">
            <li class="arrow "><?php next_posts_link( 'Mais antigos &raquo; ' ); ?></li>
            <li class="arrow"><?php previous_posts_link( '&laquo; Mais recentes' ); ?></li>
          </ul>
        </div>
        <?php else : ?>
        	<h5><?php printf( __( 'Busca por: %s'), '<i>' . get_search_query() . '</i>' ); ?></h5>
        	<h6>Nenhuma notícia encontrada</h6>
        <?php endif; ?>
    </div>
  </section>

<?php get_footer(); ?>