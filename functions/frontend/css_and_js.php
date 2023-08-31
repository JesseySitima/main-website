<?php
namespace HISQ\Theme\Frontend;

class css_and_js{

  private $css,$js,$version,$max;

  function __construct() {

	  $this->version = 4;

  	/*
    $this->css = filemtime(get_template_directory().'/library/css/main.css');
    $this->js = filemtime(get_template_directory().'/library/js/main.js');
    $this->version = get_option("script_and_style_last_update_version",1);
    $this->max = max($this->css,$this->js);

    //SCRIPT AND STYLES VERSION
    if(get_option("script_and_style_last_update")){
      $this->lastModified = get_option("script_and_style_last_update");

      if($this->lastModified < $this->max){
        $this->version++;
        //update_option( "script_and_style_last_update", $this->max, true );
        //update_option( "script_and_style_last_update_version", $this->version, true );
      }
    }else{
      add_option("script_and_style_last_update",$this->max);
      add_option("script_and_style_last_update_version",$this->version);
    }


    add_filter('style_loader_tag', array($this, 'editCssTags'), 999, 2);
  	*/


	  add_action( 'wp_enqueue_scripts', array($this,'loadStyles') );
	  add_action( 'wp_enqueue_scripts', array($this,'loadScripts') );

  }


  /*************************************************************************** ENQUEUE STYLES */


  function loadStyles() {
    global $version;

	//slick
	wp_register_style( 'slickcss', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css',array(),$this->version);
	wp_enqueue_style( 'slickcss' );



	  /* Requested by client
	//slick
	wp_register_style( 'aoscss', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css',array(),$this->version);
	wp_enqueue_style( 'aoscss' );
	  */


	//main style
  wp_register_style( 'main_style', get_template_directory_uri() . "/library/css/main.css",array(),$this->version);
  wp_enqueue_style( 'main_style' );

  //fonts
  wp_register_style( 'fonts_style', get_template_directory_uri() . "/library/fonts/stylesheet.css",array(),$this->version);
  wp_enqueue_style( 'fonts_style' );

  if(current_user_can('administrator')) {
	//admin only styles
	wp_register_style( 'admin_style', get_template_directory_uri() . "/library/css/admin.css");
	wp_enqueue_style( 'admin_style' );

  }

}


/*************************************************************************** ASYNC CSS */

  //if you use this be  sure to set up inline critical css


  function editCssTags (string $html, string $handle): string {

      $dom = new \DOMDocument();
      $dom->loadHTML($html);
      $tag = $dom->getElementById($handle . '-css');
      $tag->setAttribute('media', 'print');
      $tag->setAttribute('onload', "this.media='all'");
      $tag->removeAttribute('type');
      $tag->removeAttribute('id');
      $html = $dom->saveHTML($tag);

      return $html;
  }

  /*************************************************************************** ENQUEUE SCRIPTS */

  function loadScripts() {

    wp_enqueue_script("jquery");
    global $version;

	wp_register_script( 'slickjs', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'),$this->version,'in_footer');
	wp_enqueue_script( 'slickjs' );


	  wp_register_script( 'infinitescroll', get_template_directory_uri() . '/library/js/vendor/infinitescroll.js', array(), $this->version);
	  wp_enqueue_script( 'infinitescroll' );

	  wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/library/js/main.js', array('jquery'), "1.0.5", true);
	  wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

          //AIzaSyBgJBXuuPwXmH6u0OtaUa5yUj4xW405oy4
          
	  wp_register_script( 'gmapsapi', 'https://maps.google.com/maps/api/js?key=AIzaSyDgZsH9VVQMCJHj-tk96fDDT49RRy20Zc4', array('jquery'),$this->version,'in_footer');
	  wp_enqueue_script( 'gmapsapi' );

	  wp_register_script( 'gmaps', 'https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.min.js', array('jquery'),$this->version,'in_footer');
	  wp_enqueue_script( 'gmaps' );


		/*
	wp_register_script( 'main_script', get_template_directory_uri() . '/library/js/main.js', array(),$this->version,'in_footer');
	wp_enqueue_script( 'main_script' );

	  wp_localize_script( 'main_script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		*/


	//parallax.js
	wp_register_script( 'parallaxjs', 'https://cdnjs.cloudflare.com/ajax/libs/parallax.js/1.5.0/parallax.min.js',array(),$this->version);
	wp_enqueue_script( 'parallaxjs' );



	  wp_register_script( 'aos', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js',array(),$this->version);
	  wp_enqueue_script( 'aos' );




    //limit which pages javascript loads on
    //if(is_archive()){


    //}


  }

}
