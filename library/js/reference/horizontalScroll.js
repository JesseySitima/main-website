
  /*********************************************************************************** side scroll */

  function scrollSlider(){

    if(jQuery('#scrollSlide')[0]){
      if(typeof jQuery('#scrollSlide').offset().top != 'undefined'){

        var sWidth = jQuery(window).width();
        var sHeight = jQuery(window).outerHeight() - jQuery('header').outerHeight();
        var difference = Math.abs(sWidth - sHeight);

        
        jQuery('#scrollSlide .track .item .table').css({"height": sHeight + "px"});
        //jQuery('#scrollSlide .track .item .table .cell').css({"width": sWidth + "px"});

        w = 0;

        jQuery.each(jQuery('#scrollSlide .track .item'), function(index, item) {
            w += jQuery(this).width();
        });


        jQuery('#scrollSlide').css({"height": (w - difference)+"px"});

        jQuery(window).scroll(function(e){ 

          if(jQuery('#scrollSlide')[0]){
            if(typeof jQuery('#scrollSlide').offset().top != 'undefined'){

              safteyTop = jQuery('#scrollSlide').offset().top;
              safetyBottom = safteyTop + jQuery('#scrollSlide').outerHeight();
              scroll = jQuery(document).scrollTop() + jQuery('header').outerHeight();
              scrolledLeft = scroll - safteyTop;



              if(scroll > safteyTop && scroll < safetyBottom - sHeight){

                if(!jQuery('#scrollSlide .inner').hasClass('fixed')){
                  jQuery('#scrollSlide .inner').addClass('fixed');
                }

                jQuery('#scrollSlide .progress-wrap .bar').css({"width": ((scroll - safteyTop) / (safetyBottom - safteyTop - sHeight) * 100) + "%"});

                if(jQuery('#scrollSlide .inner').hasClass('absolute')){
                  jQuery('#scrollSlide .inner').removeClass('absolute');
                }

                if(jQuery('#scrollSlide .inner').hasClass('relative')){
                  jQuery('#scrollSlide .inner').removeClass('relative');
                }

              }else if(scroll > safetyBottom - sHeight){

                if(jQuery('#scrollSlide .inner').hasClass('fixed')){
                  jQuery('#scrollSlide .inner').removeClass('fixed');
                }

                if(!jQuery('#scrollSlide .inner').hasClass('absolute')){
                  jQuery('#scrollSlide .inner').addClass('absolute');
                }

                if(jQuery('#scrollSlide .inner').hasClass('relative')){
                  jQuery('#scrollSlide .inner').removeClass('relative');
                }

              }else if(scroll < safteyTop){

                if(!jQuery('#scrollSlide .inner').hasClass('relative')){
                  jQuery('#scrollSlide .inner').addClass('relative');
                }
                
                if(jQuery('#scrollSlide .inner').hasClass('absolute')){
                  jQuery('#scrollSlide .inner').removeClass('absolute');
                }

                if(jQuery('#scrollSlide .inner').hasClass('fixed')){
                  jQuery('#scrollSlide .inner').removeClass('fixed');
                }

              }

              /***** set active menu item (removed)

              active_item = 0;
              w = 0;
              i = 0;
              jQuery.each(jQuery('#scrollSlide .track .item'), function(index, item) {
                last = jQuery(this).width();
                w += last;
                i++;
                
                console.log(w + " - " + scrolledLeft + (last * 0.6) + " - " + i);

                if(w < scrolledLeft + (last * 0.6)){
                  active_item++;
                }
                
              });

              if(!jQuery('#scrollSlide .inner nav ul li').eq(active_item).find('a').hasClass('active')){
                jQuery('#scrollSlide .inner nav ul li').find('a').removeClass('active');
                jQuery('#scrollSlide .inner nav ul li').eq(active_item).find('a').addClass('active');
              }

              */



              /***** set scroll opsition */
              if(jQuery('#scrollSlide .inner .progress-wrap').css("display") != "none"){
                jQuery('#scrollSlide .track').scrollLeft(scrolledLeft);
              }else{
                jQuery('#scrollSlide .track').scrollLeft(0);
              }

            }
          }
          

        });

      }
    }

  }
