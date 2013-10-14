$(document).foundation();

function getUrl(){

  var menus = new Array("home", "conheca-a-ampla", "equipe", "ofertas-da-semana", "produtos", "clube-do-profissional", "noticias");

  var pathArray = window.location.pathname.split( '/' );  
  var length = menus.length;
  for (var i = 0; i <= length; i++) {
    if (menus[i] == pathArray[2]){
      $(".top-bar-section ul li").eq(i).addClass("ativo");
    }else{
      $(".top-bar-section ul li").eq(i).removeClass("ativo");
    }
  };
}

function altura(){
  var height = screen.width;
  var x = 84.5;
  
  
  var altura = ($("body").height()*x)/100;
  return altura;
}

Array.prototype.unique=function(a){
  return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)<0
});

function get_filtros(){
  var itens = $("#filters a");
  var filtros = new Array();
  var item;

  for (var i = 0; i<itens.size(); i++){
    if (itens.eq(i).data("filter") !== undefined && itens.eq(i).data("filter") != '*'){
      item = itens.eq(i).data("filter").split(".");
      filtros.push(item[1]);
    }
  }
  return filtros;
}

$(document).ready(function() {

  getUrl();

  $(".busca > button").click(function(){
      $(".side-menu").animate({
        left: "0%"
      }, 500);
  });
  
  $(".close-side-menu").click(function(){
      $(".side-menu").animate({
      left: "-70%"
      }, 500);
  });

  function waitForIt(el, callback){
    el.on("mozAnimationEnd webkitAnimationEnd msAnimationEnd oAnimationEnd animationend mozAnimationEnd", callback);
  }
  
  $(".append-news").mouseover(function(){
      $(this).addClass('moveRight');
      $('.agrupa-revista').css('display','block').addClass('moveLeft').mouseleave(function() {
        $(this).removeClass('moveLeft');
        $('.append-news').removeClass('moveRight');
      });
  });
  
  $(".scroll-bar").slimScroll({
    height: altura(),
    size: '0.8em',
    alwaysVisible: true
  });
  
  //Filtro dos produtos
  var $container = $('#products');

  $container.imagesLoaded( function(){
    $container.isotope({
      itemSelector : '.item'
    });
  });

  $('#filters a').click(function(){
    $(".side-menu").animate({
      left: "-70%"
      }, 500);
    if ($(this).hasClass("selected")){
      $container.isotope({ filter: '*' });
    }else{
      var selector = $(this).attr('data-filter');
      $container.isotope({ filter: selector });
      return false;
    }
  });

  var $optionSets = $('#options .option-set'),
      $optionLinks = $optionSets.find('a');

  $optionLinks.click(function(){
    var $this = $(this);
    // don't proceed if already selected
    if ( $this.hasClass('selected') ) {
        $this.removeClass('selected');
    }else{
      var $optionSet = $this.parents('.option-set');
      $optionSet.find('.selected').removeClass('selected');
      $this.addClass('selected');
      
      return false;
    }
  });

 //Busca produtos pelo nome
  $(".search").bind('keyup', function(){
    var search = $(this).val().toLowerCase();
    var lista_produtos = $('#products li');
    var active_isotope;
    var get_class;
    var remove_class;
    var get_filters = get_filtros();

    if ((search.length > 2) && (search != '')){
      for (var i = 0; i < lista_produtos.size(); i++) {
        var titulo = lista_produtos.eq(i).find(".titulo").html().toLowerCase();
        if (titulo.indexOf(search) != -1){
          get_class = lista_produtos.eq(i).attr('class').split(' ');
          for(var j = 0; j<get_class.length; j++){
            for (var n = 0; n<get_filters.length; n++){
              if (get_class[j] == get_filters[n]){
                active_isotope = get_class[j]+'_search';
                lista_produtos.eq(i).removeClass(get_class[j]);
                lista_produtos.eq(i).addClass(active_isotope);
                $container.isotope({ filter: '.'+active_isotope });
                break;
              }
            }
          }
          break;
        }
      }
    }else{
      for (var i = 0; i < lista_produtos.size(); i++) {
        get_class = lista_produtos.eq(i).attr('class').split('_');
        for (var n=0; n<get_class.length; n++){
          if (get_class[n] == 'search'){
            get_class.splice(n,1);
            get_class = get_class[0];
            get_class = get_class.split(' ');
            remove_class = get_class[get_class.length-1];
            lista_produtos.eq(i).removeClass(remove_class+"_search");
            lista_produtos.eq(i).addClass(remove_class);
          }
        }
      }
      $container.isotope({ filter: '*'});
    }
  });

  enquire.register("screen and (max-width: 768px)", {
    match : function() {  
      $(".comments").remove();
      $(".hide-categorias").remove();
      $(".noticia-revista-ampla a div:first-child").remove();
      $(".noticia-revista-ampla a div:last-child").removeClass("large-9");
      $(".noticia-revista-ampla a div:last-child").addClass("large-12");
    },
    unmatch : function() {
    }
  });

  $(document).ready($("body").removeClass("paused"));
});