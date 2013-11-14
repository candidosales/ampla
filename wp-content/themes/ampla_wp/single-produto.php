<?php get_header(); ?>
<body>
  
  <?php include "menu.php"; ?>

  <section class="row full-width ajusta-height pattern minheight scroll-bar">
    <div class="row collapse lista-ofertas">
      <a href="<?php bloginfo('url')?>/produtos" class="voltar show-for-medium-up"><span aria-hidden="true" class="icon-reply"></span></a>
      <div class="large-11 large-centered columns detalha-produto">
              <?php 
              if (have_posts()){ 
                while (have_posts()) {
                the_post();
                 ?>

        <div class="large-4 columns">

          <div class="row collapse">

            <div class="large-12 columns detalha-produto-imagem shadow">

              <div class="large-9 columns">
                <?php if ( has_post_thumbnail() ) { 
                  the_post_thumbnail('produto-thumb'); 
                } ?>
              </div>
              
              <div class="large-3 columns detalha-produto-share text-center">
                <ul class="small-block-grid-3 large-block-grid-1">
                  <h6>Indique</h6>
                  <li> <a href="http://twitter.com/home?status=Produto Ampla: <?php the_title(); ?>: <?php the_permalink(); ?>" title="Clique para enviar essa página para o twitter" target="_blank">
                          <img src="<?php bloginfo('template_url'); ?>/img/twitter.png" alt="">
                        </a>
                  </li>
                  <li>
                    <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>">
                      <img src="<?php bloginfo('template_url'); ?>/img/facebook.png" alt="">
                    </a>
                  </li>
                  <li>
                    <a href="mailto:emaildoseuamigo@email.com?subject=<?php the_title()?>&body=<?php the_permalink()?>">
                      <img src="<?php bloginfo('template_url'); ?>/img/email.png" alt="">
                    </a>
                  </li>
                </ul>
              </div>

              <div class="detalha-produto-preco off-stars bloco-preco text-center">
                <span class="cifrao">R$</span>
                <span class="preco"><?php echo get_post_meta(get_the_ID(), 'preco', true) ?></span>
                <span class="a-vista text-center">À VISTA</span>  
              </div> 

              <div class="large-12 columns detalha-produto-detalhes detalhes">
                <p class="titulo"><?php the_title(); ?></p>
                <p class="pagamento"><?php echo get_post_meta(get_the_ID(), 'pagamento', true) ?></p>
              </div>
            </div>

          </div>     
        </div>
        
        <div class="large-8 columns">
          <div class="detalha-descricao shadow">
            <p class="titulo">Descrição</p>
            <table class="text-left">
              <tbody>
                <tr>
                  <th><strong>Embalagem:</strong></th>
                  <td><?php echo get_post_meta(get_the_ID(), 'embalagem', true) ?></td>
                </tr>
                <tr>
                  <th><strong>Características:</strong></th>
                  <td><?php echo get_post_meta(get_the_ID(), 'caracteristica', true) ?></td>
                </tr>
                <tr>
                  <th><strong>Benefícios:</strong></th>
                  <td><?php echo get_post_meta(get_the_ID(), 'beneficio', true) ?></td>
                </tr>
                <tr>
                  <th><strong>Aplicação:</strong></th>
                  <td><?php echo get_post_meta(get_the_ID(), 'aplicacao', true) ?></td>
                </tr>
              </tbody>
            </table>

            <p class="titulo">Dimensões</p>
            <span class="item"><?php echo get_post_meta(get_the_ID(), 'dimensao', true) ?></span>
          </div>

          <div class="comments large-12 columns">
            <div class="comentarios shadow">
              <div id="fb-root"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=331303956987522";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>
              <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="auto" data-num-posts="10"></div>
            </div>
          </div>
        </div>
          <?php 
      }
    }
  ?>
      </div>
    </div>
  </section>

<?php get_footer(); ?>