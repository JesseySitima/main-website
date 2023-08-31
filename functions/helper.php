<?php
/**
 * This file is for setting up the wordpress configuration
 */

namespace HISQ\Theme;

class helper{

  function __construct() {



  }

  function require_backend_development_files($env){
      return ($env == "development" && is_admin()) ? true : false;
  }

  function require_multi($files) {
    $files = func_get_args();
    foreach ( $files as $file ) require_once( $file );

  }

}




?>