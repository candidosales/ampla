<?php get_header(); ?>
<body>
  
  <?php include "menu.php"; ?>


  <section class="row collapse full-width conheca-filial ajusta-height minheight scroll-bar">
    <div class="large-11 large-centered columns">
      <?php 
              if (have_posts()){ 
                while (have_posts()) {
                the_post();

                $latLog = get_post_meta(get_the_ID(), 'latitude', true).','.get_post_meta(get_the_ID(), 'longitude', true);
                $imagem_1 = get_field('imagem_1');
                $imagem_2 = get_field('imagem_2');
                $imagem_3 = get_field('imagem_3');
                $imagem_4 = get_field('imagem_4');
                $imagem_5 = get_field('imagem_5');
                 ?>
      <div class="large-4 columns">
        <img src="<?php echo $imagem_1['sizes']['filial-thumb-2']; ?>" alt="" style="height: 33.87em;">
      </div>
      <div class="large-8 column content-filial">
        <ul class="clearing-thumbs" data-clearing>
          <li><a href="<?php echo $imagem_2['sizes']['filial-thumb-3'] ?>"><img src="<?php echo $imagem_2['sizes']['thumbnail'] ?>" alt=""></a></li>
          <li><a href="<?php echo $imagem_3['sizes']['filial-thumb-3'] ?>"><img src="<?php echo $imagem_3['sizes']['thumbnail'] ?>" alt=""></a></li>
          <li><a href="<?php echo $imagem_4['sizes']['filial-thumb-3'] ?>"><img src="<?php echo $imagem_4['sizes']['thumbnail'] ?>" alt=""></a></li>
          <li><a href="<?php echo $imagem_5['sizes']['filial-thumb-3'] ?>"><img src="<?php echo $imagem_5['sizes']['thumbnail'] ?>" alt=""></a></li>  
        </ul>
        <ul class="large-block-grid-2">
          <li>
            <img src="http://maps.googleapis.com/maps/api/staticmap?center=<?php echo $latLog ?>&maptype=roadmap&markers=color:red%7Clabel:A%7C<?php echo $latLog ?>&zoom=16&size=400x300&sensor=false" style="width: 400px; height: 300px;" />
          </li>
          <li class="contato-filial">
            <div class="yellow-white columns">
              <div class="large-12 columns text-center">
                <h4><?php the_title();?></h4>
              </div>
              <div class="large-2 columns  text-center">
                <span aria-hidden="true" class="icon-location"></span>
              </div>
              <div class="large-10 columns text-left">
                <p><?php echo get_post_meta(get_the_ID(), 'endereco', true) ?></p>
              </div>
              <div class="large-2 columns  text-center">
                <span aria-hidden="true" class="icon-clock"></span>
              </div>
              <div class="large-10 columns text-left">
                <p><?php echo get_post_meta(get_the_ID(), 'horario', true) ?></p>
              </div>
              <div class="large-2 columns text-center">
                <br>
                <span aria-hidden="true" class="icon-phone"></span>
              </div>
              <div class="large-10 columns text-left">
                <br>
                <p><?php echo get_post_meta(get_the_ID(), 'telefone', true) ?></p>
              </div>
            </div>
          </li>
        </ul>
      </div>
                      <?php 
      }
    }
  ?>
    </div>
  </section>

<?php get_footer(); ?>