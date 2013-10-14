	function init() {
    var totalItens = $(".carousel-parceiros li").size();
    var widthCarousel = $(".carousel-parceiros li img").width()*(totalItens-3);
    var carouselItem = widthCarousel/totalItens;

    var domPrefixes = 'Webkit Moz O ms Khtml'.split(' '),
        elm = document.getElementById( 'carouselParceiros' ),
        animation = false,
        animationstring = 'animation',
        transformation = false,
        transformstring = 'transform',
        keyframeprefix = '',
        pfx = '',
        moz = false,
        rotate = 0;

    if( elm.style.animationName ) { animation = true; }    

    if( animation === false ) {
      for( var i = 0; i < domPrefixes.length; i++ ) {
        if( elm.style[ domPrefixes[i] + 'AnimationName' ] !== undefined ) {
          if (domPrefixes[i] == 'Moz'){
            moz = true;
          }
          pfx = domPrefixes[ i ];
          animationstring = pfx + 'Animation';
          keyframeprefix = '-' + pfx.toLowerCase() + '-';
          animation = true;  
          break;          
        }
      }
    }

    if( transformation === false ) {
      for( var i = 0; i < domPrefixes.length; i++ ) {
        if( elm.style[ domPrefixes[i] + 'Transform' ] !== undefined ) {
          pfx = domPrefixes[ i ];
          transformstring = pfx + 'Transform';
          transformation = true;
          break;
        }
      }
    }
    
    if( animation === false ) {

    } else {
      var steps = (4*totalItens)-3;
      var timeSteps = 100/(2*(totalItens-1));
      var totalTime = timeSteps*totalItens;
      var totalSteps = 100/steps;
      var totalWidth = 91.66/(steps);
      
      var keyframes = '';
      var rules = '';

      elm.style[ animationstring ] = 'lista_parceiros '+totalTime.toFixed(2)+'s linear infinite';

      for (var i = 1; i <= steps; i++) {
        var newPercnt;
        var newLeft;

        newPercnt = i*totalSteps;
        newLeft = i*totalWidth;

        rules += newPercnt.toFixed(2)+'%{left:-'+newLeft.toFixed(2)+'%;}';
      };

      if (moz == false){
        var keyframes = '@' + keyframeprefix + 'keyframes lista_parceiros { '+rules+'}';
      }else{
        var keyframes = '@' + keyframeprefix + 'keyframes lista_parceiros { '+
                  'from {left:0px;}'+
                  'to {left: -'+widthCarousel+'px; }'+
                  '}';
      }
      
      var s = document.createElement( 'style' );
      s.innerHTML = keyframes;
      document.getElementsByTagName( 'head' )[ 0 ].appendChild( s );
  }
}

function getUrl(){

  var menus = new Array("conheca.php", "equipe.php", "ofertas.php", "produtos.php", "clube.php", "noticias.php");
  var pathArray = window.location.pathname.split( '/' );  

  for (var i = 0; i <= menus.length; i++) {
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

$(document).ready(function() {

  getUrl();

  init();

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
  
  $(".append-news a").mouseover(function(){
      $(".menu-conteudo ul li").eq(4).removeClass("clube");
      $(".menu-conteudo ul li div.agrupa-clube").animate({left: "5%"}, 100, function(){
          $(".menu-conteudo ul li div.agrupa-clube").addClass("hiden");
          $(".menu-conteudo ul li div.agrupa-revista").removeClass("hiden").animate({left: "0%"}, 600);
          $(".menu-conteudo ul li").eq(4).css("overflow", "overlay");
      });
  
  });
  
  $(".bloco.clube").mouseleave(function(){
      $(".menu-conteudo ul li div.agrupa-clube").css("left", "5%");
      $(".menu-conteudo ul li div.agrupa-revista").animate({left: "5%"}, 300, function(){
          $(".menu-conteudo ul li").eq(4).addClass("clube");
          $(".menu-conteudo ul li div.agrupa-revista").addClass("hiden");
          $(".menu-conteudo ul li div.agrupa-clube").removeClass("hiden").animate({left: "0%"}, 500);
          $(".menu-conteudo ul li").eq(4).css("overflow", "hidden");
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
  $(".search").change(function(){
    var value = $(this).val().toLowerCase();
    var itens = new Array();
    var produtos = $("#products > li");
    var categoria = "";

    for (var i=0; i<produtos.size(); i++){
      var titulo = "";
          titulo = $(produtos[i]).find(".titulo").html().toLowerCase();

      var teste = titulo.indexOf(value);

      if (teste != -1){

        var classes = produtos[i].getAttribute('class');
        classes = classes.split(" ");
        
        for (var j = 0; j < classes.length; j++){
          if (classes[j] == "item" || classes[j] == "isotope-item" || classes[j] == "isotope-hidden"){
            classes.splice(j, 1);
          }
        }
          itens.push(classes[0]);
      }
    }

    itens = itens.unique();
    
    $.each(itens, function(i, item){
      if (i==0 || i < itens.size()-1){
        categoria += "."+item;
      }else if (i > 0 && i < itens.size()-2){
        categoria += ", ."+item+", ";
      }
    });

    console.log(categoria);
    $container.isotope({ filter: categoria });
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
});