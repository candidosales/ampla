<?php get_header(); ?>
<body class="paused">
  
  <?php include "menu.php"; ?>

  <section class="row full-width ajusta-height pattern minheight scroll-bar">
    <div id="options" class="row collapse nav-categorias hide-for-small hide-categorias">
      <div id="filters" class="large-10 columns categorias option-set slideLeft2 animated">
        <a class="left text-center selected" data-filter="*">
          <span aria-hidden="true" class="icon-grid"></span>
          <span class="nome">Ver todos</span>
        </a>
         <?php  

          $args = array(
          'orderby' => 'name',
          'parent' => 0,
          'taxonomy' => 'tipo_produto'
          );
          
          $categories = get_categories( $args );
          for ($i=0; $i < sizeof($categories); $i++) { 
          
        ?>
        
        <a  class="left text-center" data-filter=".<?php  echo $categories[$i]->slug; ?>">
          <img src="<?php bloginfo('template_url'); ?>/img/cat_img/<?php  echo $categories[$i]->slug; ?>.png" alt="">
          <span class="nome"><?php  echo $categories[$i]->name; ?></span>
        </a>
        
        <?php  }?>
      </div>
      <div class="large-2 columns busca text-left">
        <img src="<?php bloginfo('template_url'); ?>/img/divider.png" alt="">
        <input class="search" type="search" placeholder="Buscar" title="Enter para buscar">
      </div>
    </div>
    <div class="large-12 columns text-center busca show-for-small show-categorias">
      <button>Categorias</button>
      <input type="text" class="search" placeholder="Buscar">
    </div>
    <div class="row collapse lista-ofertas">
      <div class="large-11 large-centered columns lista-produtos">
        <ul id="products"  class="large-block-grid-4 small-block-grid-2">
          <?php  $produtos = new WP_Query(array(
                'showposts' => 60,
                'post_type' => 'produto'));

                if($produtos->have_posts()){ 

                  while($produtos->have_posts()) { 
                    $produtos->the_post(); 
                    $terms = get_the_terms( get_the_ID(), 'tipo_produto');
                    foreach ( $terms as $term ) {
                      $slug = $term->slug;
                    }
            ?>
          <li class="item <?php echo $slug; ?>">
            <a href="<?php the_permalink() ?>">
              <div class="bloco-produto">
                <div class="img-produto text-center">
                  <?php if ( has_post_thumbnail() ) {            
                         the_post_thumbnail('produto-thumb'); 
                  } ?>  
                </div>
                <div class="bloco-preco off-stars text-center">
                  <span class="cifrao">R$</span>
                  <span class="preco"><?php echo get_post_meta(get_the_ID(), 'preco', true) ?></span>
                  <span class="a-vista text-center">À VISTA</span>  
                </div>   
                <div class="detalhes">
                  <p class="titulo"><?php the_title(); ?></p>
                  <p class="pagamento"><?php echo get_post_meta(get_the_ID(), 'pagamento', true) ?></p>
                </div>
              </div>
            </a>
          </li>
           <?php

                  }
                } ?>
        </ul>
      </div>
    </div>
    <ul class="side-menu categorias large-block-grid-3 small-bock-grid-3" id="filters">
      <a class="close-side-menu">&#215;</a>
      <li>
        <a class=" text-center" data-filter="*">
          <span aria-hidden="true" class="icon-grid"></span>
          <span class="nome">Todos</span>
        </a>
      </li>
      <?php  

          $args = array(
          'orderby' => 'name',
          'parent' => 0,
          'taxonomy' => 'tipo_produto'
          );
          
          $categories = get_categories( $args );
          for ($i=0; $i < sizeof($categories); $i++) { 
          
        ?>
          <li>
            <a  class=" text-center" data-filter=".cano">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/cat_img/<?php  echo $categories[$i]->slug; ?>-branca.png" alt="">
              <span class="nome"><?php  echo $categories[$i]->name; ?></span>
            </a>  
          </li>

      <?php  }?>
    </ul>
  </section>

<?php get_footer(); ?>