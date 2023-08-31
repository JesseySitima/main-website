$ = jQuery;
jQuery(document).ready(function(e) {



	//run intial function
	init();

	/*********************************************************** CLICK CAPTURE */


	var scrollTop = 0;
	//handle maps click
	jQuery(document).on("click", ".respMenu", function(e) {
 
		page = jQuery("#page");

		if (!page.hasClass('menu')) {
			scrollTop = jQuery(document).scrollTop();
		}

		e.preventDefault();

		page.toggleClass("menu");

		if (!page.hasClass('menu')) {
			jQuery("html").scrollTop(scrollTop);
		}

	});

    $(document).on("click", "li.dropdown a.toggle", function(e) {
        var parent = $(this).parent();

        if(parent.hasClass("open")){

            parent.removeClass("open");

        }
        else{

            $("li.dropdown").removeClass("open");
            $("li.submenu").removeClass("open");
            $("li.menu-item-has-children").removeClass("open");

            parent.addClass("open");

        }

        return false;

    });

    $(document).on("click", "li.submenu > a, li.menu-item-has-children > a", function(e) {
        var parent = $(this).parent();

        if(parent.hasClass("open")){

            parent.removeClass("open");

        }
        else{

            $("li.submenu").removeClass("open");
            $("li.menu-item-has-children").removeClass("open");

            parent.addClass("open");

        }

        return false;

    });

    $(document).on("click", ".menu-toggle", function(e) {

        $("#page").addClass("showmenu");

        return false;

    });

    $(document).on("click", ".closeMenu", function(e) {

        $("#page").removeClass("showmenu");

        return false;

    });


    $(document).on("click", "header a.search-toggle", function(e) {

        $("#page").addClass("showsearch");

        setTimeout(function () {

            $("#searchBar").addClass("open");

        }, 400);

        return false;

    });

    $(document).on("click", "#searchBar a.closeSearch", function(e) {

        $("#searchBar").removeClass("open");
        $("#page").removeClass("showsearch");


        return false;

    });

    $(document).on("click", "#main .accordion .block .outer", function(e) {
		var parent = $(this).parent();

    	if(parent.hasClass("open")){

    		parent.removeClass("open");

		}
		else{

    		$("#main .accordion .block").removeClass("open");

            parent.addClass("open");

		}


    });

    $(document).on("click", "#main.training .opportunities .block.long .overflow", function(e) {

    	$(this).closest(".block").addClass("open");

    });

    $(document).on("click", "#main.about .partners .details .list .block .outer", function(e) {
        var parent = $(this).parent();
        var logo = $(this).data("image");

        if(parent.hasClass("open")){

            parent.removeClass("open");

        }
        else{

            $("#main.about .partners .details .list .block").removeClass("open");

            parent.addClass("open");

            /*
            setTimeout(function () {

                $("html, body").animate({
                    scrollTop:  (parent.offset().top - $("header").height() - 32)
                }, 500, "linear");

            }, 1100);
            */

        }


    });

    $(document).on("click", "#main.engagement .partners .wrapper .collaborators .logos img", function(e) {
        var id = $(this).data("id");

        $("#main.engagement .partners .wrapper .collaborators .logos img").removeClass("current");
        $(this).addClass("current");

        $("#main.engagement .partners .wrapper .collaborators .description").removeClass("current");
        $("#main.engagement .partners .wrapper .collaborators .description."+id).addClass("current");


    });



    $(document).on("click", "#main.news .action a.loadMore", function(e) {


        $("#main.news .list").infinitescroll("retrieve");

        return false;

    });

    $(document).on("click", "#main.researchlist .action a.loadMore", function(e) {


        $("#main.researchlist .list").infinitescroll("retrieve");

        return false;

    });

    $(document).on("click", "#main.search .action a.loadMore", function(e) {

        $("#main.search .list").infinitescroll("retrieve");

        return false;

    });

    $(document).on("focus", "#formSearchSite input[type='text']", function(e) {

        $(this).removeClass("error");

        return false;

    });

    $(document).on("submit", "#formSearchSite", function () {
        var search = $("#formSearchSite input[type='text']").val();

        if(!search){
            $("#formSearchSite input[type='text']").addClass("error");
            return false;
        }

    });


    $(".form input[type=text], .form input[type=email], .form textarea").each(function(){

        var value = $(this).val();

        if(value.length > 0){

            $(this).closest("li").addClass("focused");

        }

        $(this).focus(function(){

            $(this).closest("li").addClass("focused");

        });

        $(this).blur(function(){
            var value = $(this).val();

            var label = $(this).closest("label").text();

            if(value.length == 0){

                $(this).closest("li").removeClass("focused");

            }


        });

    });

    $(document).on("click", "#main.publications .filters .filter span.text", function(e) {
        var parent = $(this).closest(".filter");

        if(parent.hasClass("open")){

            parent.removeClass("open");

        }
        else{

            $("#main.publications .filters .filter").removeClass("open");

            parent.addClass("open");

        }


    });

    $(document).on("click", "#main.publications .filters .filter .dropdown.long .overflow", function(e) {

        $(this).closest(".dropdown").addClass("open");

    });

    $(document).on("click", "#main.publications .filters .filter .dropdown .inner span.value", function(e) {
        var field = $(this).data("type");
        var value = $(this).data("id");
        var url = $("input[name='url']").val();
        var params;


        //year
        if(field == "year"){
            var month = $("input[name='month']").val();
            var author = $("input[name='author']").val();

            params = "?yr="+value+"&";

            if(month){

                params = params+"mo="+month+"&";

            }

            if(author){

                params = params+"au="+author+"&";

            }

        }

        //month
        if(field == "month"){
            var year = $("input[name='year']").val();
            var author = $("input[name='author']").val();

            params = "?mo="+value+"&";

            if(year){

                params = params+"yr="+year+"&";

            }

            if(author){

                params = params+"au="+author+"&";

            }

        }

        //author
        if(field == "author"){
            var month = $("input[name='month']").val();
            var year = $("input[name='year']").val();

            params = "?au="+value+"&";

            if(year){

                params = params+"yr="+year+"&";

            }

            if(month){

                params = params+"mo="+month+"&";

            }


        }

        //Remove the last ampersand
        params = params.replace(/&+$/,'');

        window.location = url+params;


    });

    $(document).on("click", "#main.operations .departments aside.links .inner a", function(e) {
        var tab = $(this).data("id");

        $("#main.operations .departments aside.links .inner a").removeClass("current");
        $(this).addClass("current");

        $("#main.operations .departments .tabs .tab").removeClass("current");
        $("#main.operations .departments .tabs .tab."+tab).addClass("current");

        setupTeamMemberSliders();


        $("html, body").animate({
            scrollTop:  ($("#main.operations .departments .tabs").offset().top - $("header").height() - 32)
        }, 500);

        return false;

    });

    $(document).on("click", "#main.science .stories .links a", function(e) {
        var tab = $(this).data("tab");

        $("#main.science .stories .links a").removeClass("current");
        $(this).addClass("current");

        $("#main.science .stories .tabs .tab").removeClass("current");
        $("#main.science .stories .tabs .tab."+tab).addClass("current");

        return false;

    });


    $(document).on("click", "footer nav a.toTop", function(e) {

        $("html, body").animate({
            scrollTop: 0
        }, 500);

        return false;

    });

    $(document).on("click", "#students #studentSlider .profile .action a", function () {
        var post_id = $(this).data("id");

        if(post_id){

            $.ajax({

                url: my_ajax_object.ajax_url,
                method: "post",
                data: {
                    action: "student_profile_action",
                    post_id: post_id
                },
                dataType: "json",
                context: this,
                success: function(data){

                    console.log(data);

                    if (data) {

                        if (data.status == "0") {
                            var student = data.student;

                            $("#studentdetails img.profileImage").attr("src", student.image);
                            $("#studentdetails .wrapper .inner .top .meta h3").text(student.name);
                            $("#studentdetails .wrapper .inner .top .meta .bottom p.education").text(student.education);

                            $("#studentdetails .wrapper .inner .details").empty().html(student.bio);



                            if(student.email){

                                $("#studentdetails .wrapper .inner .top .meta .bottom ul li.email").addClass("show");
                                $("#studentdetails .wrapper .inner .top .meta .bottom ul li span.value a.profileEmail").attr("href", "mailto:"+student.email).text(student.email);
                            }

                            if(student.twitter){

                                $("#studentdetails .wrapper .inner .top .meta .bottom ul li.twitter").addClass("show");
                                $("#studentdetails .wrapper .inner .top .meta .bottom ul li span.value a.profileTwitter").text(student.twitter);
                            }

                            $("#page").addClass("studentopen");

                        }

                        if (data.status != "0") {

                            $.Message(data.message, "error");

                        }

                    }


                },
                error: function(data){

                    console.log(data);

                }

            });

        }

        return false;

    });

    $(document).on("click", "#studentdetails .wrapper a.closeStudent", function () {

        $("#page").removeClass("studentopen");

        return false;

    });



    $(document).on("click", "footer nav a.toTop", function(e) {

        $("html, body").animate({
            scrollTop: 0
        }, 500);

        return false;

    });

    $(document).on("click", "#main.researchdetail .researcher .action a, #main.researchdetail .researchers .researcher .profileInfo span.name", function () {
        var post_id = $(this).data("id");

        if(post_id){

            $.ajax({

                url: my_ajax_object.ajax_url,
                method: "post",
                data: {
                    action: "researcher_profile_action",
                    post_id: post_id
                },
                dataType: "json",
                context: this,
                success: function(data){

                    console.log(data);

                    if (data) {

                        if (data.status == "0") {
                            var researcher = data.researcher;

                            $("#researcherdetails img.profileImage").attr("src", researcher.image);
                            $("#researcherdetails .wrapper .inner .top .meta h3").text(researcher.name);

                            $("#researcherdetails .wrapper .inner .details").empty().html(researcher.bio);

                            $("#page").addClass("researcheropen");

                        }

                        if (data.status != "0") {

                            alert(data.message);

                        }

                    }


                },
                error: function(data){

                    console.log(data);

                }

            });

        }

        return false;

    });

    $(document).on("click", "#researcherdetails .wrapper a.closeResearcher", function () {

        $("#page").removeClass("researcheropen");

        return false;

    });

    /********************************************************************************************** defaults */

    //capture clicks on any elements except
    $(document).click(function(e) {

        if(!$(e.target).parents().andSelf().is("#main.publications .filters .filter")) {

            $("#main.publications .filters .filter").removeClass("open");

        }

        if(!$(e.target).parents().andSelf().is("li.dropdown")) {

            $("li.dropdown").removeClass("open");
            $("li.submenu").removeClass("open");

        }

    });

	/* window resize */
	jQuery(window).resize(function(e) {

		//close the mobile menu if window is resized
		//jQuery("#page").removeClass("menu");

		main();

	});

	/* window resize */
    jQuery(window).scroll(function(e) {
        var s = jQuery(window).scrollTop();

        if(s > 0){

            $("header").addClass("scrolled");

        }
        else{

            $("header").removeClass("scrolled");

        }

        if($(window).width() > 720){//desktop

            stickyHeader(s);

        }
        else{

            if($("#main").hasClass("vacanciesdetail")){

                if (($("#main.vacanciesdetail .wrapper .details").offset().top - $("header").height()) > s) {

                    $("#page").removeClass("sticky");

                }
                else {

                    $("#page").addClass("sticky");

                }


            }

        }





    });

	/*
	 * Main function. runs on init() and window.resize
	 * 
	 */
	function main() {
		var sHeight = jQuery(window).height();
		var sWidth = jQuery(window).width();

	}

	/*
	 * Main initialize function. runs on document.ready
	 * 
	 */
	function init() {

		main();

        setupTeamMemberSliders();

        setupIntroSlider();

        setupVisionSlider();

        setupStudentSlider();

        setupResearcherSlider();

        setupOperationsSlider();

        setupScienceSlider();

        /* Requested by client
        AOS.init({
            once: true
        });
        */

        if($(window).width() <= 1024){

            $("#hero .bg").removeClass("parallaxed");

        }

        if($(window).width() <= 750 && $("#main.vacanciesdetail .wrapper .asidespacer").length){

            $("#main.vacanciesdetail .wrapper .asidespacer").css({"height": $("#main.vacanciesdetail .wrapper aside").height()});

        }


        if($("#main.news").length){

            $("#main.news .list").infinitescroll({
                navSelector : '.pagination',
                nextSelector : '.next.page-numbers',
                itemSelector: '#main.news .list article.post',
                loading: {
                    finishedMsg: '',
                    img: 'data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==',
                    msg: null,
                    msgText: "<p>Loading the next set of posts...</p>"
                }
            });

        }

        if($("#main.researchlist").length){

            $("#main.researchlist .list").infinitescroll({
                navSelector : '.pagination',
                nextSelector : '.next.page-numbers',
                itemSelector: '#main.researchlist .list article.post',
                loading: {
                    finishedMsg: '',
                    img: 'data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==',
                    msg: null,
                    msgText: "<p>Loading the next set of posts...</p>"
                }
            });

        }

        if($("#main.search").length){

            $("#main.search .list").infinitescroll({
                navSelector : '.pagination',
                nextSelector : '.next.page-numbers',
                itemSelector: '#main.search .list article.post',
                loading: {
                    finishedMsg: '',
                    img: 'data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==',
                    msg: null,
                    msgText: "<p>Loading the next set of results...</p>"
                }
            });

        }

        if($("#mapArea").length){

            var map = new GMaps({
                div: '#mapArea',
                lat: -15.8047864,
                lng: 35.021984,
                zoom: 16,
                fullscreenControl: false,
                mapTypeControl: false
            });

            map.addMarker({
                lat: -15.8047864,
                lng: 35.021984,
                icon: "https://standbymode.com/development/malawi/wp-content/themes/malawi/library/img/contact/icon_marker.png"
            });

        }

    }

    /**
     * About slider on Home page
     */
    function setupIntroSlider() {

        $("#main.home .about .wrapper .imageSlider .slider").slick({
            dots: true,
            arrows: false,
            infinite: true,
            speed: 600,
            slidesToShow: 1,
            autoplay: true,
            autoplaySpeed: 6000,
        });

    }

    /**
     * Vision slider on Public engagement page
     */
    function setupVisionSlider() {

        $("#visionSlider").slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 600,
            slidesToShow: 1,
            autoplay: true,
            autoplaySpeed: 6000,
        });

    }

    /**
     * Team Members slider on Operations page
     *
     */
	function setupTeamMemberSliders() {
	    var tab = $("#main.operations .departments .tabs .tab.current");
        var slider_count = tab.find(".wrapper .team .member").length;

        if(slider_count > 1){

            if(tab.find(".slider").hasClass("slick-initialized")){
                tab.find(".slider").slick("unslick");
            }

            var $next = tab.find('.next');
            var $prev = tab.find('.prev');

            tab.find(".sliderfor").slick({
                //slidesToShow: 1.5,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                infinite: true,
                asNavFor: tab.find(".slidernav"),
                //centerMode: true,
                //centerPadding: '20%',
                nextArrow: $next,
                prevArrow: $prev
            });
            tab.find(".slidernav").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                asNavFor: tab.find(".sliderfor"),
                dots: false,
                arrows: false,
                centerMode: true,
                focusOnSelect: true,
                fade: true
            });

            tab.find(".sliderfor").on('afterChange', function(event, slick, currentSlide, nextSlide){
                var parent = $(this).closest(".team");

                currentSlide = currentSlide + 1;
                var current = (currentSlide < 10) ? ("0" + currentSlide) : currentSlide;

                parent.find("span.current").text(current);

            });

            $(document).on("click", "#main.operations .departments .tabs .tab.current .prev", function(e) {
                var parent = $(this).closest();

                tab.find(".sliderfor").slick("slickPrev");


                return false;

            });

            $(document).on("click", "#main.operations .departments .tabs .tab.current .next", function(e) {
                var parent = $(this).closest();
                var index = parent.data("index");

                tab.find(".sliderfor").slick("slickNext");

                return false;

            });

        }

    }

    /**
     * Student profiles slider on Training page
     */
    function setupStudentSlider() {

        $("#studentSlider").slick({
            dots: true,
            arrows: false,
            infinite: false,
            speed: 600,
            autoplay: true,
            autoplaySpeed: 8000,
            slidesToShow: 4.5,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        adaptiveHeight: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });


        $("#studentSlider").on('beforeChange', function(event, slick, currentSlide, nextSlide){

        });

        $("#studentSlider").on('afterChange', function(event, slick, currentSlide, nextSlide){
            var i = (currentSlide ? currentSlide : 0) + 1;
            var total = (slick.$dots[0].children.length);

            if(i == 1){
                $("#students .list").addClass("start");
            }

            if(i == total){
                $("#students .list").addClass("end");
            }

            if(i > 1){
                $("#students .list").removeClass("start");
            }

            if(i < total){
                $("#students .list").removeClass("end");
            }


        });

        $(document).on("click", "#students .list a.control.prev", function(e) {

            $("#studentSlider").slick("slickPrev");

            return false;

        });

        $(document).on("click", "#students .list a.control.next", function(e) {

            $("#studentSlider").slick("slickNext");

            return false;

        });

    }

    function setupResearcherSlider() {

        $("#researcherSlider").slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 600,
            autoplay: true,
            autoplaySpeed: 4000,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true
        });


        $(document).on("click", "#main.researchdetail .details aside.overview .researchers .sliderControls a.control.prev", function(e) {

            $("#researcherSlider").slick("slickPrev");

            return false;

        });

        $(document).on("click", "#main.researchdetail .details aside.overview .researchers .sliderControls a.control.next", function(e) {

            $("#researcherSlider").slick("slickNext");

            return false;

        });

    }


    /**
     * Operations slider
     */
    function setupOperationsSlider() {

        if($("#operationsSlider").length){
            $("#operationsSlider").slick({
                dots: true,
                arrows: false,
                infinite: true,
                speed: 600,
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 6000
            });
        }



    }

    /**
     * Operations slider
     */
    function setupScienceSlider() {

        if($("#scienceSlider").length){
            $("#scienceSlider").slick({
                dots: true,
                arrows: false,
                infinite: true,
                speed: 600,
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 6000
            });
        }

    }

    function stickyHeader(s){

        if($('.asideanchor').length && $(window).width() > 720){

            var bottomanchor = $(".bottomanchor").offset().top;
            var div_top = ($(window).width() > 720) ? $('.asideanchor').offset().top : ($('.asideanchor').offset().top - 0);
            var div_height = $("#main.vacanciesdetail .wrapper aside").height();

            var padding = 0;  // tweak here or get from margins etc

            if (s + div_height > bottomanchor -  $("header").height()){

				$('#main.vacanciesdetail .wrapper aside').css({top: (s + div_height - bottomanchor) * -1});

            }
            else if (s > (div_top - $("header").height())) {
                $("#page").addClass("sticky");

                $('#main.vacanciesdetail .wrapper aside').css({top: $("header").height()});


            } else {
                $("#page").removeClass("sticky");

                if($(window).width() <= 720){
                    $('#main.vacanciesdetail .wrapper aside').css({top: 0});
                }

            }

        }

    }

    $(window).unbind('.infscr');// remove auto trigger when scrolling

});

$(window).load(function () {

    $("#page").addClass("loaded");

});