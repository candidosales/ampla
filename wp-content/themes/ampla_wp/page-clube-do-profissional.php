<?php include "register-professional.php"; ?>
<?php include "send-email.php"; ?>
<?php get_header();  ?>
<body>
  
  <?php include "menu.php"; ?>

  <section class="row full-width ajusta-height pattern minheight scroll-bar">
            <?php if(isset($registerSent) && $registerSent == 1) { ?>
              <div data-alert class="alert-box success">
                <!-- Your content goes here -->
                <p>Obrigado, você foi cadastrado com sucesso.</p>
                <a href="#" class="close">&times;</a>
              </div>
            <?php } if(isset($emailSent) && $emailSent == true) { ?>
              <div data-alert class="alert-box success">
                <!-- Your content goes here -->
                <p>Obrigado, e-mail enviado com sucesso.</p>
                <a href="#" class="close">&times;</a>
              </div>
            <?php } if(isset($emailSent) && $emailSent == false){ ?>
                <div data-alert class="alert-box">
                  <!-- Your content goes here -->
                  <p>Desculpa, não foi possível enviar o e-mail.</p>
                  <a href="#" class="close">&times;</a>
                </div>
              <?php  } if(isset($hasError) || isset($captchaError)) { ?>
                <div data-alert class="alert-box">
                  <!-- Your content goes here -->
                  <p>Desculpa, ocorreu alguns erros no preenchimento.</p>
                  <a href="#" class="close">&times;</a>
                </div>
              <?php } ?>

    <div class="large-12 columns large-centered clube-fale">

      <div class="section-container vertical-tabs" data-section="vertical-tabs">

        <section class="clube-prof">
          <div class="title shadow-left text-center" data-section-title>
            <a href="#">
              <img src="<?php bloginfo('template_url'); ?>/img/clube.png" alt="">
              <h3>Clube Profissional</h3>
            </a>
          </div>
          <div class="content shadow-left" data-section-content>
            <span>Participe do maior clube de profissionais de Teresina, aqui você terá acesso  às principais dicas e eventos da construção civil.</span>
            <form action="<?php the_permalink(); ?>" method="post" id="professionalForm" class="row custom">
              <div class="large-6 columns">
                <label>Nome</label>
                <input type="text" name="nome" id="nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome'];?>" required />              </div>
              <div class="large-6 columns">
                <label>E-mail</label>
                <input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" required />
              </div>
              <div class="large-6 columns">
                <label>Data de Nascimento</label>
                <input type="date" name="data_nasc" value="<?php if(isset($_POST['data_nasc'])) echo $_POST['data_nasc'];?>" required>
              </div>
              <div class="large-6 columns">
                <label>Sexo</label>
                <label for="radio1">
                  <input name="sexo" type="radio" id="radio1" style="display:none;" value="m" checked>
                  <span class="custom radio"></span> Masculino
                  <input name="sexo" type="radio" id="radio1" style="display:none;" value="f">
                  <span class="custom radio" style="margin-left: 10%;"></span> Feminino
                </label>
              </div>
              <hr>
              <div class="large-6 columns">
                <label>Telefone</label>
                <input type="text" name="telefone" id="telefone" value="<?php if(isset($_POST['telefone'])) echo $_POST['telefone'];?>" required />
              </div>
              <div class="large-6 columns">
                <label>Profissão</label>
                <select id="profissao" name="profissao" class="medium">
                  <option value="pedreiro" selected>Pedreiro</option>
                  <option value="mestre_de_obra">Mestre de Obra</option>
                  <option value="eletricista">Eletricista</option>
                </select>
              </div>
              <div class="large-12 columns">
                <label>É cliente Ampla?</label>
                <label for="radio1" style="margin-top: 5%;">
                  <input name="cliente" type="radio" id="radio1" style="display:none;" value="1" checked>
                  <span class="custom radio"></span> Sim
                  <input name="cliente" type="radio" id="radio1" style="display:none;" value="0">
                  <span class="custom radio" style="margin-left: 10%;"></span> Não
                </label>
              </div>
              <div class="large-12 columns">
                <label>Deseja receber novidades do Clube Profissional?</label>
                <label for="checkbox1"><input type="checkbox" name="email_marketing" id="checkbox1" CHECKED value="1"  style="display: none;"><span class="custom checkbox"></span> Sim</label>
              </div>
              <div class="large-12 columns">
                <input type="submit" value="Enviar" class="enviar">
              </div>
              <input type="hidden" name="submitted-professional" id="submitted-professional" value="true" />
            </form>
          </div>
        </section>

        <section class="fale-ampla">
          <div class="title text-center" data-section-title>
            <a href="#">
              <img src="<?php bloginfo('template_url'); ?>/img/fale-conosco.png" alt="">
              <h3>Fale Conosco</h3>
            </a>
          </div>

          <div class="content" data-section-content>
            <span>
              Entre em contato e tire suas dúvidas, responderemos o mais rápido possível
            </span>
            <form action="<?php the_permalink(); ?>" id="contactForm" method="post" class="row custom">
              <div class="large-6 columns">
                <label>Nome</label>
                <input type="text" name="nome" id="nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome'];?>" required />
                <?php if($nameError != '') { ?>
                  <span class="error"><?=$nameError;?></span>
                <?php } ?>
              </div>
              <div class="large-6 columns">
                <label>E-mail</label>
                <input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" required/>
                <?php if($emailError != '') { ?>
                  <span class="error"><?=$emailError;?></span>
                <?php } ?>
              </div>
              <div class="large-12 columns">
                <label for="">Mensagem</label>
                <textarea placeholder="Digite sua mensagem aqui" name="mensagem">
                  <?php if(isset($_POST['mensagem'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['mensagem']); } else { echo $_POST['mensagem']; } } ?>
                </textarea>
                <?php if($commentError != '') { ?>
                  <span class="error"><?=$commentError;?></span>
                <?php } ?>
              </div>
              <div class="large-6 columns">
                <label>Telefone</label>
                <input type="text" name="telefone" required>
              </div>
              <div class="large-12 columns">
                <label>É cliente Ampla?</label>
                <label for="radio1">
                  <input name="cliente" type="radio" id="radio1" style="display:none;" value="Sim" checked>
                  <span class="custom radio"></span> Sim
                  <input name="cliente" type="radio" id="radio1" style="display:none;" value="Não">
                  <span class="custom radio" style="margin-left: 10%;"></span> Não
                </label>
              </div>
              <div class="large-12 columns">
                <input type="submit" value="Enviar" class="enviar"> 
              </div>
              <input type="hidden" name="submitted" id="submitted" value="true" />
            </form>
          </div>
        </section>

      </div>

    </div>

  </section>

<?php get_footer(); ?>