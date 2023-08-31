/*
 jScroll - jQuery Plugin for Infinite Scrolling / Auto-Paging
 @see @link{https://jscroll.com}

 @copyright Philip Klauzinski
 @license Dual licensed under the MIT and GPL Version 2 licenses
 @author Philip Klauzinski (https://webtopian.com)
 @version 2.4.1
 @requires jQuery v1.8.0+
 @preserve

https://github.com/pklauzinski/jscroll
 
*/
(function(e){e.jscroll={defaults:{debug:!1,autoTrigger:!0,autoTriggerUntil:!1,loadingHtml:"<small>Loading...</small>",loadingFunction:!1,padding:0,nextSelector:"a:last",contentSelector:"",pagingSelector:"",callback:!1}};var q=function(a,g){var h=a.data("jscroll"),d=e.extend({},e.jscroll.defaults,"function"===typeof g?{callback:g}:g,h||{}),r="visible"===a.css("overflow-y"),m=a.find(d.nextSelector).first(),l=e(window),q=e("body"),k=r?l:a;m=e.trim(m.prop("href")+" "+d.contentSelector);var t=function(){a.find(".jscroll-inner").length||
a.contents().wrapAll('<div class="jscroll-inner" />')},u=function(b){if(d.pagingSelector)b.closest(d.pagingSelector).hide();else{var a=b.parent().not(".jscroll-inner,.jscroll-added").addClass("jscroll-next-parent").hide();a.length||b.wrap('<div class="jscroll-next-parent" />').parent().hide()}},n=function(){return k.unbind(".jscroll").removeData("jscroll").find(".jscroll-inner").children().unwrap().filter(".jscroll-added").children().unwrap()},w=function(){if(a.is(":visible")){t();var b=a.find("div.jscroll-inner").first(),
f=a.data("jscroll"),c=parseInt(a.css("borderTopWidth"),10);c=isNaN(c)?0:c;c=parseInt(a.css("paddingTop"),10)+c;var e=r?k.scrollTop():a.offset().top,g=b.length?b.offset().top:0;c=Math.ceil(e-g+k.height()+c);if(!f.waiting&&c+d.padding>=b.outerHeight())return p("info","jScroll:",b.outerHeight()-c,"from bottom. Loading next request..."),v()}},x=function(){var b=a.find(d.nextSelector).first();if(b.length)if(d.autoTrigger&&(!1===d.autoTriggerUntil||0<d.autoTriggerUntil)){u(b);var f=q.height()-a.offset().top;
f=a.height()<f?a.height():f;var c=0<a.offset().top-l.scrollTop()?l.height()-(a.offset().top-e(window).scrollTop()):l.height();f<=c&&w();k.unbind(".jscroll").bind("scroll.jscroll",function(){return w()});0<d.autoTriggerUntil&&d.autoTriggerUntil--}else k.unbind(".jscroll"),b.bind("click.jscroll",function(){u(b);v();return!1})},v=function(){var b=a.find("div.jscroll-inner").first(),f=a.data("jscroll");f.waiting=!0;b.append('<div class="jscroll-added" />').children(".jscroll-added").last().html('<div class="jscroll-loading" id="jscroll-loading">'+
d.loadingHtml+"</div>").promise().done(function(){d.loadingFunction&&d.loadingFunction()});return a.animate({scrollTop:b.outerHeight()},0,function(){var c=f.nextHref;b.find("div.jscroll-added").last().load(c,function(b,g){if("error"===g)return n();var h=e(this).find(d.nextSelector).first();f.waiting=!1;f.nextHref=h.prop("href")?e.trim(h.prop("href")+" "+d.contentSelector):!1;e(".jscroll-next-parent",a).remove();(h=a.data("jscroll"))&&h.nextHref?x():(p("warn","jScroll: nextSelector not found - destroying"),
n());d.callback&&d.callback.call(this,c);p("dir",f)})})},p=function(a){if(d.debug&&"object"===typeof console&&("object"===typeof a||"function"===typeof console[a]))if("object"===typeof a){var b=[],c;for(c in a)"function"===typeof console[c]?(b=a[c].length?a[c]:[a[c]],console[c].apply(console,b)):console.log.apply(console,b)}else console[a].apply(console,Array.prototype.slice.call(arguments,1))};a.data("jscroll",e.extend({},h,{initialized:!0,waiting:!1,nextHref:m}));t();(function(){var a=e(d.loadingHtml).filter("img").attr("src");
a&&((new Image).src=a)})();x();e.extend(a.jscroll,{destroy:n});return a};e.fn.jscroll=function(a){return this.each(function(){var g=e(this),h=g.data("jscroll");h&&h.initialized||q(g,a)})}})(jQuery);