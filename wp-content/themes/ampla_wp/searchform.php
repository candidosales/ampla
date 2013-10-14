<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="row collapse">
    <div class="small-9 large-5 columns push-5">
      <input type="text" placeholder="Busque uma notícia" required="required" name="s" id="s">
    </div>
    <div class="small-3 large-2 columns">
      <input class="postfix radius" value="Buscar" type="submit" id="searchsubmit">
    </div>
  </div>
</form>