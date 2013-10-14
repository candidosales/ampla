<?php include "header.php"; ?>
<body>
  
  <?php include "menu.php"; ?>

  <section class="row full-width ajusta-height pattern minheight scroll-bar">

    <div class="large-12 columns large-centered clube-fale">

      <div class="section-container vertical-tabs" data-section="vertical-tabs">

        <section class="clube-prof">
          <div class="title shadow-left text-center" data-section-title>
            <a href="#">
              <img src="img/clube.png" alt="">
              <h3>Clube Profissional</h3>
            </a>
          </div>
          <div class="content shadow-left" data-section-content>
            <span>Participe do maior clube de profissionais de Teresina, aqui você terá acesso  às principais dicas e eventos da construção civil.</span>
            
            <form action="" class="row custom">
              <div class="large-6 columns">
                <label>Nome</label>
                <input type="text" placeholder="Nome">
              </div>
              <div class="large-6 columns">
                <label>E-mail</label>
                <input type="email" placeholder="E-mail">
              </div>
              <div class="large-6 columns">
                <label>Data de Nascimento</label>
                <input type="date" placeholder="">
              </div>
              <div class="large-6 columns">
                <label>Sexo</label>
                <label for="radio1">
                  <input name="radio1" type="radio" id="radio1" style="display:none;">
                  <span class="custom radio"></span> Masculino
                  <input name="radio1" type="radio" id="radio1" style="display:none;">
                  <span class="custom radio" style="margin-left: 10%;"></span> Feminino
                </label>
              </div>
              <hr>
              <div class="large-6 columns">
                <label>Telefone</label>
                <input type="email" placeholder="E-mail">
              </div>
              <div class="large-6 columns">
                <label>Profissão</label>
                <select id="customDropdown1" class="medium">
                  <option>Pedreiro</option>
                  <option>Mestre de Obra</option>
                  <option>Eletricista</option>
                </select>
              </div>
              <div class="large-12 columns">
                <label>É cliente Ampla?</label>
                <label for="radio1" style="margin-top: 5%;">
                  <input name="radio1" type="radio" id="radio1" style="display:none;">
                  <span class="custom radio"></span> Sim
                  <input name="radio1" type="radio" id="radio1" style="display:none;">
                  <span class="custom radio" style="margin-left: 10%;"></span> Não
                </label>
              </div>
              <div class="large-12 columns">
                <label>Deseja receber novidades do Clube Profissional?</label>
                <label for="checkbox1"><input type="checkbox" id="checkbox1" CHECKED  style="display: none;"><span class="custom checkbox"></span> Sim</label>
              </div>
              <div class="large-12 columns">
                <input type="submit" value="Enviar" class="enviar">
              </div>
            </form>
          </div>
        </section>

        <section class="fale-ampla">
          <div class="title text-center" data-section-title>
            <a href="#">
              <img src="img/fale-conosco.png" alt="">
              <h3>Fale Conosco</h3>
            </a>
          </div>
          <div class="content" data-section-content>
            <span>
              Entre em contato e tire suas dúvidas, responderemos o mais rápido possível
            </span>
            
            <form action="" class="row custom">
              <div class="large-6 columns">
                <label>Nome</label>
                <input type="text" placeholder="Nome">
              </div>
              <div class="large-6 columns">
                <label>E-mail</label>
                <input type="email" placeholder="E-mail">
              </div>
              <div class="large-12 columns">
                <label for="">Mensagem</label>
                <textarea placeholder="Digite sua mensagem aqui"></textarea>
              </div>
              <div class="large-6 columns">
                <label>Telefone</label>
                <input type="email" placeholder="E-mail">
              </div>
              <div class="large-12 columns">
                <label>É cliente Ampla?</label>
                <label for="radio1">
                  <input name="radio1" type="radio" id="radio1" style="display:none;">
                  <span class="custom radio"></span> Sim
                  <input name="radio1" type="radio" id="radio1" style="display:none;">
                  <span class="custom radio" style="margin-left: 10%;"></span> Não
                </label>
              </div>
              <div class="large-12 columns">
                <label>Deseja receber novidades da Ampla?</label>
                <label for="checkbox1"><input type="checkbox" id="checkbox1" CHECKED  style="display: none;"><span class="custom checkbox"></span> Sim</label>
              </div>
              <div class="large-12 columns">
                <input type="submit" value="Enviar" class="enviar"> 
              </div>
            </form>
          </div>
        </section>

      </div>

    </div>

  </section>

  <?php include "footer.php"; ?>