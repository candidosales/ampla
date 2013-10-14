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
        <ul class="large-block-grid-1 small-block-grid-1 busca">
          <h5><?php printf( __( 'Busca por: %s'), '<i>' . get_search_query() . '</i>' ); ?></h5>
          <?php while ( have_posts() ) : the_post(); ?>
            <li>
              <a href="<?php the_permalink();?>">
                <span class="categoria">
                  <?
                    $categorias = get_the_category();
                  ?>
                </span>
                <span class="data"><? the_time("d/m/Y \à\s G:i") ?></span>
                <span class="manchete"><? the_title(); ?></span>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
        <?php else : ?>
        	<h3><?php printf( __( 'Busca por: %s'), '<i>' . get_search_query() . '</i>' ); ?></h3>
        	<h6>Nenhuma notícia encontrada</h6>
        <?php endif; ?>
    </div>
  </section>

<?php get_footer(); ?>