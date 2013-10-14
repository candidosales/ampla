<?php get_header(); ?>
<body class="paused">
  <section class="menu-conteudo maxheight">
    <ul class="large-block-grid-5 small-block-grid-1">
      <li class="bloco conheca animated bounceBottom1">
        <a href="<?php bloginfo('url')?>/conheca-a-ampla" class="fundo-branco">
          <div class="fundo-transparente red"></div>
          <div class="bola ajuste-img">Conheça<img src="<?php bloginfo('template_url'); ?>/img/logo-name.png" alt=""></div>
        </a>
      </li>
      <li class="bloco equipe animated bounceBottom2">
        <a href="<?php bloginfo('url')?>/equipe" class="fundo-branco">
          <div class="fundo-transparente yellow-strong"></div>
          <div class="bola">Equipe de<br>Vendas</div>
        </a>
      </li>
      <li class="bloco ofertas animated bounceBottom3">
        <a href="<?php bloginfo('url')?>/ofertas" class="fundo-branco">
          <div class="fundo-transparente yellow"></div>
          <div class="bola">Ofertas da<br>Semana</div>
        </a>
      </li>
      <li class="bloco produtos animated bounceBottom4">
        <a href="<?php bloginfo('url')?>/produtos" class="fundo-branco">
          <div class="fundo-transparente yellow-light"></div>
          <div class="bola ajuste">Produtos</div>
        </a>
      </li>
      <li class="bloco clube hide-for-small animated bounceBottom5">
        <a href="<?php bloginfo('url')?>/clube-do-profissional" class="fundo-branco">
            <div class="fundo-transparente yellow-white"></div>
            <div class="bola">Clube do <br> Profissional</div>
        </a>

          <div class="append-news">
            <a href="">
            <span aria-hidden="true" class="icon-newspaper"></span>
            Revista <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="">
            </a>
          </div>

        <div class="agrupa-revista">
          <div>
            <div class="row collapse noticias-revista-ampla">
              <?php 
                $posts = new WP_Query(array(
                'showposts' => 4,
                'post_type' => 'post'));

                if ( $posts->have_posts() ) { 
                while ( $posts->have_posts() ) { $posts->the_post(); ?>
              <div class="large-12 columns noticia-revista-ampla">
                <a href="<?php the_permalink()?>">
                  <div class="large-3 columns">
                    <?php if ( has_post_thumbnail() ) {         
                         the_post_thumbnail('noticias-thumb-1'); 
                  } ?>
                  </div>
                  <div class="large-9 columns text-left">
                    <h6><?php the_title()?></h6>
                    <p><?php echo substr(get_the_excerpt(), 0,30); ?> ...</p>
                  </div>
                </a>
              </div>
                  <?php

                  }
                } ?>
            </div>
            <div class="large-12 columns">
              <a href="<?php bloginfo('url'); ?>/noticias" class="mais">Mais notícias</a>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </section>

<?php get_footer(); ?>