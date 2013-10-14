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
        <a class="left text-center" data-filter=".cano">
          <span aria-hidden="true" class="icon-noun_project_7403"></span>
          <span class="nome">Cano</span>
        </a>
        <a class="left text-center" data-filter=".torneira">
          <span aria-hidden="true" class="icon-noun_project_7230"></span>
          <span class="nome">Torneira</span>
        </a>
        <a class="left text-center" data-filter=".tinta">
          <span aria-hidden="true" class="icon-noun_project_6007"></span>
          <span class="nome">Tinta</span>
        </a>
        <a class="left text-center">
          <span aria-hidden="true" class="icon-noun_project_4679"></span>
          <span class="nome">Tomada</span>
        </a>
        <a class="left text-center" data-filter=".chuveiro">
          <span aria-hidden="true" class="icon-noun_project_1322"></span>
          <span class="nome">Chuveiro</span>
        </a>
        <a class="left text-center">
          <span aria-hidden="true" class="icon-noun_project_7403"></span>
          <span class="nome">Cano</span>
        </a>
        <a class="left text-center">
          <span aria-hidden="true" class="icon-noun_project_7230"></span>
          <span class="nome">Torneira</span>
        </a>
        <a class="left text-center">
          <span aria-hidden="true" class="icon-noun_project_6007"></span>
          <span class="nome">Tinta</span>
        </a>
        <a class="left text-center">
          <span aria-hidden="true" class="icon-noun_project_4679"></span>
          <span class="nome">Tomada</span>
        </a>
        <a class="left text-center">
          <span aria-hidden="true" class="icon-noun_project_1322"></span>
          <span class="nome">Chuveiro</span>
        </a>
        <a class="left text-center">
          <span aria-hidden="true" class="icon-noun_project_7403"></span>
          <span class="nome">Cano</span>
        </a>
        <a class="left text-center">
          <span aria-hidden="true" class="icon-noun_project_7230"></span>
          <span class="nome">Torneira</span>
        </a>
        <a class="left text-center">
          <span aria-hidden="true" class="icon-noun_project_6007"></span>
          <span class="nome">Tinta</span>
        </a>
        <a class="left text-center">
          <span aria-hidden="true" class="icon-noun_project_4679"></span>
          <span class="nome">Tomada</span>
        </a>
        <a class="left text-center">
          <span aria-hidden="true" class="icon-noun_project_4679"></span>
          <span class="nome">Tomada</span>
        </a>
        <a class="left text-center">
          <span aria-hidden="true" class="icon-noun_project_4679"></span>
          <span class="nome">Tomada</span>
        </a>
        <img src="<?php bloginfo('template_url'); ?>/img/divider.png" alt="">
      </div>
      <div class="large-2 columns busca text-left">
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
  </section>

<?php get_footer(); ?>