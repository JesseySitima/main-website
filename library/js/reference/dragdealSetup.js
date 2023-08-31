
  var slider;
  var sliderPosition;


  function init(){


    main();

    if(jQuery('#dragSlider')[0]){

      var width = 0;


      jQuery('#dragSlider #drag .item').each(function(i, obj) {
          
          jQuery(this).css({"float":"left"});

          width += jQuery(this).outerWidth( true );

      });

      jQuery('#dragSlider #drag .item').parent().css({"width":(width)+"px"});

      slider = new Dragdealer('dragSliderContainer');
      
    
      jQuery('#dragSlider').addClass('active');

    }

  }


  //handle the custom slider
  jQuery(document).on("click tap","#dragSlider .next",function(e) {

    if(jQuery('#dragSliderContainer')[0]){

      var x = slider.getValue()[0];
      
      var numEl = jQuery('#dragSliderContainer #drag .item').length;
      var elWidth = jQuery('#dragSliderContainer #drag .item').outerWidth();
      var containerWidth = jQuery('#dragSliderContainer').outerWidth();
      var elPerContainer = Math.floor(containerWidth / elWidth);

      //calculate what percetage the slider must move (the amount that items that fit in the parent container before overflowing)
      //Theminus is because thats the runn off that doesnt need to get to the starting position
      var step = elPerContainer / (numEl - elPerContainer)

      console.log(elPerContainer);
      console.log(numEl);
      console.log(step);

      if(jQuery(this).text() == 'More'){
        x += step;
      }else{
        x -= step;
        step = -step;
      }

      //used to go straight to the end if the end is in the next half a step
      nextStep = (step*0.5);

      if(x+nextStep >= 1){
        x = 1;
        jQuery(this).text("Previous");
        jQuery(this).addClass("reverse");
      }else if(x+nextStep <= 0){
        x = 0;
        jQuery(this).text("More");
        jQuery(this).removeClass("reverse");
      }

      slider.setValue(x, 0, false);

    }

    return false;

  });


    var maxheight = 0;
    jQuery('#dragSlider .item').css({"height":"auto"});
    jQuery('#dragSlider .item').each(function() {
      maxheight = (jQuery(this).height() > maxheight ? jQuery(this).height() : maxheight);
    })
    jQuery('#dragSlider .item').height(maxheight);
    maxheight = 0;


    scrollSlider();