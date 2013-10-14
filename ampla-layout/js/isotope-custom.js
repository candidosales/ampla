var $container = $('#products');

  $container.imagesLoaded( function(){
    $container.isotope({
      itemSelector : '.item'
    });
  });

  $('#filters a').click(function(){
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