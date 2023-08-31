
function inView(elem){

    var docViewTop = jQuery(window).scrollTop();
    var docViewBottom = docViewTop + jQuery(window).height();

    var elemTop = elem.offset().top;
    var elemBottom = elemTop + elem.height();


    //calculate percentage if the element is on screen
    if(((elemTop <= docViewBottom) && (elemBottom >= docViewTop))){

      return true;
    }else{
      return false;
    }

}

function getVerticalCentralPercentage(elem,dir)
{
    var docViewTop = jQuery(window).scrollTop();
    var docViewBottom = docViewTop + jQuery(window).height();
    var docViewMiddle = docViewTop + (jQuery(window).height()/2);

    var elemTop = elem.offset().top;
    var elemBottom = elemTop + elem.height();
    var elemMiddle = elemTop + (elem.height()/2);


    closestToEdge = elemMiddle;

    absDif  = ((Math.abs(closestToEdge-docViewMiddle))-0.25)*1.3333;

    opacity = 0.4-(absDif/jQuery(window).height());

    if(opacity < 0){
      opacity = 0;
    }

    return opacity;

}

function getCLoserNumber(a,b,c){

   if (Math.abs(c - a) < Math.abs(c - b)) 
       return a;
   else
      return b;
}

/********************************************************************** PAGE TRANSITION */

  function isExternal(url) {
    var match = url.match(/^([^:\/?#]+:)?(?:\/\/([^\/?#]*))?([^?#]+)?(\?[^#]*)?(#.*)?/);
    if (typeof match[1] === "string" && match[1].length > 0 && match[1].toLowerCase() !== location.protocol) return true;
    if (typeof match[2] === "string" && match[2].length > 0 && match[2].replace(new RegExp(":("+{"http:":80,"https:":443}[location.protocol]+")?$"), "") !== location.host) return true;
    return false;
  }