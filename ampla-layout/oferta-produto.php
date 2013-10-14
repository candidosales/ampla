<?php include "header.php"; ?>
<body>
  
  <?php include "menu.php"; ?>

  <section class="row full-width ajusta-height pattern minheight scroll-bar">
    
    
    <div class="row collapse lista-ofertas">
      <div class="large-11 large-centered columns detalha-produto">

        <div class="large-4 columns">
          <div class="row collapse">

            <div class="large-12 columns detalha-produto-imagem shadow">

              <div class="large-9 columns">
                <img src="img/produto-torneira.jpg" alt="">  
              </div>
              
              <div class="large-3 columns detalha-produto-share text-center hide-for-small">
                <ul class="small-block-grid-1">
                  <h6>Indique</h6>
                  <li><img src="img/twitter.png" alt=""></li>
                  <li><img src="img/facebook.png" alt=""></li>
                  <li><img src="img/email.png" alt=""></li>
                </ul>
              </div>

              <div class="detalha-produto-preco bloco-preco text-center">
                <span class="cifrao">R$</span>
                <span class="preco">9.989,90</span>
                <span class="a-vista text-center">À VISTA</span>  
              </div> 

              <div class="large-12 columns detalha-produto-detalhes detalhes">
                <p class="titulo">Misturador de Lavatório para Mesa Bica Baixa Targa Cromado Deca</p>
                <p class="pagamento">ou em até 2x de R$ 44,90</p>
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
                  <th>Embalagem</th>
                  <td>Lata</td>
                </tr>
                <tr>
                  <th>Características</th>
                  <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sapien turpis, sodales lobortis sem vitae, volutpat sodales purus. Morbi tristique quis quam id vulputate. Duis nec porttitor nibh. Cras rutrum elit sit amet lobortis vestibulum</td>
                </tr>
                <tr>
                  <th>Benefícios</th>
                  <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sapien turpis, sodales lobortis sem vitae, volutpat sodales purus.</td>
                </tr>
                <tr>
                  <th>Aplicação</th>
                  <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                </tr>
              </tbody>
            </table>

            <p class="titulo">Dimensões</p>
            <span class="item">Misturador de Lavatório para Mesa Bica Baixa Targa Cromado Deca</span>
            <span class="item">15cm x 10 cm</span>
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
              <div class="fb-comments" data-href="http://example.com" data-width="auto" data-num-posts="10"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include "footer.php"; ?>