<?php

/**
 * TODO
 * 	- Add developement page for us, when we set site to liev automatcally allow th site to be indexed and ask for a google anayitics code.
 *
 */

include 'libs/vendor/autoload.php';
include 'hisqplugins.php';
include 'posttypes.php';
include 'theme.php';
//include 'widgets.php';
include 'functions.php';

//add Post Types
$p = array(
  "slug"=> 'components',
  "options" => array(
    'labels' => array(
      'name'                => __( 'Components'),
      'singular_name'       => __( 'Component'),
      'menu_name'           => __( 'Components'),
      'parent_item_colon'   => __( 'Parent Component'),
      'all_items'           => __( 'All Components'),
      'view_item'           => __( 'View Component'),
      'add_new_item'        => __( 'Add New Component'),
      'add_new'             => __( 'Add Component'),
      'edit_item'           => __( 'Edit Component'),
      'update_item'         => __( 'Update Component'),
      'search_items'        => __( 'Search Component'),
      'not_found'           => __( 'Not Found'),
      'not_found_in_trash'  => __( 'Not found in Trash'),
    ),
    'public' => false,
    'has_archive' => false,
    'rewrite' => array('slug' => 'components'),
    'supports' => array( 'title', 'editor', 'thumbnail' )
  ),
);

$post_types->addPostType($p);


$l = array(
	"slug"=> 'component-type',
	"post_type"=> 'components',
	"options" => array(
    'hierarchical' => true,
    'labels' => array(
		  'name' => _x( 'Component Type', 'taxonomy general name' ),
		  'singular_name' => _x( 'Component Type', 'taxonomy singular name' ),
		  'search_items' =>  __( 'Component Types' ),
		  'all_items' => __( 'All Component Types' ),
		  'parent_item' => __( 'Parent Component Type' ),
		  'parent_item_colon' => __( 'Parent Component Type:' ),
		  'edit_item' => __( 'Edit Component Type' ),
		  'update_item' => __( 'Update Component Type' ),
		  'add_new_item' => __( 'Add New Component Type' ),
		  'new_item_name' => __( 'New Component Type Name' ),
		  'menu_name' => __( 'Component Types' ),
		),
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'component-type' ),
  ),
);

$post_types->addCustomTaxonomy($l);



$p = array(
	"slug"=> 'research',
	"options" => array(
		'labels' => array(
			'name'                => __( 'Articles'),
			'singular_name'       => __( 'Article'),
			'menu_name'           => __( 'Research'),
			'parent_item_colon'   => __( 'Parent Article'),
			'all_items'           => __( 'All Articles'),
			'view_item'           => __( 'View Article'),
			'add_new_item'        => __( 'Add New Article'),
			'add_new'             => __( 'Add Article'),
			'edit_item'           => __( 'Edit Article'),
			'update_item'         => __( 'Update Article'),
			'search_items'        => __( 'Search Article'),
			'not_found'           => __( 'Not Found'),
			'not_found_in_trash'  => __( 'Not found in Trash'),
		),
		'public' => false,
		'has_archive' => false,
		'rewrite' => array('slug' => 'research'),
		'supports' => array( 'title', 'editor', 'thumbnail' )
	),
);

$post_types->addPostType($p);


$p = array(
	"slug"=> 'students',
	"options" => array(
		'labels' => array(
			'name'                => __( 'Students'),
			'singular_name'       => __( 'Student'),
			'menu_name'           => __( 'Students'),
			'parent_item_colon'   => __( 'Parent Student'),
			'all_items'           => __( 'All Student'),
			'view_item'           => __( 'View Student'),
			'add_new_item'        => __( 'Add New Student'),
			'add_new'             => __( 'Add Student'),
			'edit_item'           => __( 'Edit Student'),
			'update_item'         => __( 'Update Student'),
			'search_items'        => __( 'Search Student'),
			'not_found'           => __( 'Not Found'),
			'not_found_in_trash'  => __( 'Not found in Trash'),
		),
		'public' => false,
		'has_archive' => false,
		'rewrite' => array('slug' => 'students'),
		'supports' => array( 'title', 'editor' )
	),
);

$post_types->addPostType($p);

//initialize theme

$theme->start($plugins,$post_types);
$theme->addMenu("Main Menu");


?>