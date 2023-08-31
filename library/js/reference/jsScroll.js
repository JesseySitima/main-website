  /********************************************************************************** infinite scroll */ 

  if(jQuery('main.archive .container')[0]){
    jQuery('main.archive .container').jscroll({
      path: '.load-more a',
      contentSelector: '.col-vs-4-12',
      nextSelector: '.load-more a',
      autoTrigger: false,
      callback: function(){
      },
    });
  }