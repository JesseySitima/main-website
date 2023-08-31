<?php
/**
 * This file is for setting up the wordpress configuration
 */

namespace HISQ\Theme;

class setup{

  function __construct($env = "production") {

    $helper = new helper();

    $helper->require_multi(
          'backend/config.php',
          'backend/posttypes.php',
          'backend/styling.php',
          'backend/wordpress_funtionality.php',
          'backend/widgets.php',
          'frontend/functions.php',
          'frontend/wordpress_funtionality.php',
          'frontend/css_and_js.php'
        );

    if($helper->require_backend_development_files($env)){
      //load plugin requires only if the 
      $helper->require_multi(
            'backend/libs/tgm/vendor/autoload.php',
            'backend/plugins.php'
          );
    }


    if($helper->require_backend_development_files($env)){
      //check if required plugins are running only if the project is in development and the user is in the back end
      $plugins = new Backend\plugins();
    }

    //Configure wordpress data structure (Cusotm post types and Taxonomies)
    $config = new Backend\config();

    $wordpress_backend_funtionality = new Backend\wordpress_funtionality();
    $wordpress_frontend_funtionality = new Frontend\wordpress_funtionality();

    if(is_admin()){
      //apply backend styling only if the user is in the backend
      $styling = new Backend\styling();
    }

    //Load the sites css and js
    $css_and_js = new Frontend\css_and_js();

  }


}




?>