<?php

use HISQ\Theme;

require_once 'functions/setup.php';
require_once 'functions/helper.php';

new HISQ\Theme\setup("development");

//allow access to front end helper functions
$f = new HISQ\Theme\Frontend\functions();






/*************************************************************************** Thumbnail size */

//add_image_size( 'featured', 707, 450, true );




/**************************************************************************** CUSTOM */


function formatContent($content){

	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);

	return $content;

}

function mThumbImage($url, $width="", $height="", $align = "t"){

	$image = get_bloginfo("template_url")."/functions/libs/mthumb.php?src=".$url."&zc=1&a=".$align;

	if(!empty($width) || $width == "0") $image .= "&w=".$width;

	if(!empty($height) || $height == "0") $image .= "&h=".$height;

	return $image;

}

function trimString($string, $limit){

	//remove html tags
	$new_string = strip_tags($string);

	//trim the string
	$new_string = substr($new_string, 0 , $limit);

	//append ellipses if the original string is longer than the length specified
	if(strlen($string) > $limit){
		$new_string .= "...";
	}

	return $new_string;

}

/*
* Embed a youtube iframe
*
* @param $video. Meta value
* @param #callApi. True to return just the video id. false to echo iframe embed html
*/
function embed_youtube($video, $callApi = true){

	$width = "552";
	$height = "312";

	if(!$callApi){


		//check if youtube video url
		if (preg_match('![?&]{1}v=([^&]+)!', $video . '&', $v)){
			$video_id = $v[1];
			echo '<iframe src="http://www.youtube.com/embed/'.$video_id.'?wmode=opaque&rel=0" frameborder="0" allowfullscreen></iframe>';
		}
		//check if youtube video ID
		else if(!preg_match('/[a-zA-Z]+:\/\/[0-9a-zA-Z;.\/?:@=_#&%~,+$]+/', $video, $v)){
			$video_id = $video;
			echo '<iframe src="http://www.youtube.com/embed/'.$video_id.'?wmode=opaque&rel=0" frameborder="0" allowfullscreen></iframe>';
		}
		//check if youtube embed url
		else if(strpos($video, 'embed') !== false){
			echo '<iframe  src="'.$video.'?wmode=opaque&rel=0" frameborder="0" allowfullscreen></iframe>';
		}
		else{

			//

			$input = preg_match('~https?://(?:[0-9A-Z-]+\.)?(?:youtu\.be/|youtube(?:-nocookie)?\.com\S*[^\w\s-])([\w-]{11})(?=[^\w-]|$)(?![?=&+%\w.-]*(?:[\'"][^<>]*>|</a>))[?=&+%\w.-]*~ix',
				$video,$match);

			$video_id = $match[1];

			echo '<iframe src="http://www.youtube.com/embed/'.$video_id.'?wmode=opaque&rel=0" frameborder="0" allowfullscreen></iframe>';

		}

	}
	else{

		//check if youtube video url
		if (preg_match('![?&]{1}v=([^&]+)!', $video . '&', $v)){
			$video_id = $v[1];

		}
		//check if youtube video ID
		else if(!preg_match('/[a-zA-Z]+:\/\/[0-9a-zA-Z;.\/?:@=_#&%~,+$]+/', $video, $v)){
			$video_id = $video;

		}
		else{

			$input = preg_match('~https?://(?:[0-9A-Z-]+\.)?(?:youtu\.be/|youtube(?:-nocookie)?\.com\S*[^\w\s-])([\w-]{11})(?=[^\w-]|$)(?![?=&+%\w.-]*(?:[\'"][^<>]*>|</a>))[?=&+%\w.-]*~ix',
				$video,$match);

			$video_id = $match[1];

		}

		return $video_id;

	}

}

add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
	return "<button class='button pink  gform_button' id='gform_submit_button_{$form['id']}'><span class='icon'></span><span class='text'>Send Enquiry</span></button>";
}


add_action( 'wp_ajax_nopriv_student_profile_action', 'student_profile_action' );
add_action( 'wp_ajax_student_profile_action', 'student_profile_action' );

function student_profile_action() {
	if($_REQUEST){
		$student_id = $_REQUEST["post_id"];
		$student_data = array();

		$args = array(
			"p" => $student_id,
			"post_type" => "students",
			"posts_per_page" => 1,
			"post_status" => "publish"
		);

		$students = new WP_Query($args);

		if($students->have_posts()){

			while($students->have_posts()){
				$students->the_post();
				global $post;

				$student_data["name"] = get_the_title();
				$student_data["bio"] = formatContent(get_the_content());

				$image = (get_field("image")) ? get_field("image") : get_bloginfo("template_url")."/library/img/training/no-avatar.png";
				$student_data["image"] = mThumbImage($image, 115, 115);

				$student_data["education"] = get_field("education");
				$student_data["founded_by"] = get_field("founded_by");

				$student_data["email"] = get_field("email");
				$student_data["twitter"] = get_field("twitter");


			}

		}



		echo json_encode(array(
			"status" => "0",
			"student" => $student_data
		));

	}
	else{

		echo json_encode(array(
			"status" => "1",
			"message" => "All fields required",
			"data" => $_REQUEST
		));

	}

	wp_die();

}

add_action( 'wp_ajax_nopriv_researcher_profile_action', 'researcher_profile_action' );
add_action( 'wp_ajax_researcher_profile_action', 'researcher_profile_action' );

function researcher_profile_action() {
	if($_REQUEST){
		$researcher_id = $_REQUEST["post_id"];
		$researcher_data = array();

		$args = array(
			"p" => $researcher_id,
			"post_type" => "researchers",
			"posts_per_page" => 1,
			"post_status" => "publish"
		);

		$researcher = new WP_Query($args);

		if($researcher->have_posts()){

			while($researcher->have_posts()){
				$researcher->the_post();
				global $post;

				$researcher_data["name"] = get_the_title();
				$researcher_data["bio"] = formatContent(get_the_content());

				$image = (get_field("profile_image")) ? get_field("profile_image") : get_bloginfo("template_url")."/library/img/training/no-avatar.png";
				$researcher_data["image"] = mThumbImage($image, 115, 115);

			}

			echo json_encode(array(
				"status" => "0",
				"researcher" => $researcher_data
			));

		}
		else{

			echo json_encode(array(
				"status" => "1",
				"message" => "Researcher not found",
				"args" => $args
			));

		}





	}
	else{

		echo json_encode(array(
			"status" => "1",
			"message" => "All fields required",
			"data" => $_REQUEST
		));

	}

	wp_die();

}


function searchResults($search = "", $paged){
	global $wpdb;

	if($search){

		$search = sanitize_text_field( $search );
		$search_terms = explode(" ", $search);


		//Search by post title
		$name__like = str_replace("'", "’", $search);
		$args = array(
			"fields" => "ids",
			"post_type" => "post",
			"post_status" => "publish",
			"_name__like" => "*".$name__like."*",
			//"s" => $name__like,
			"posts_per_page" => -1
		);

		//User has included an author in their search
		if(!empty($author_id)){
			$args["author__in"] = $author_id;
		}

		$q1 = new WP_Query($args);
		$q1 = ($q1->posts) ? $q1->posts : [];


		$post_ids = array_unique( array_merge( $q1) );



		if(!empty($post_ids)) {

			$args = array(
				"posts_per_page" => 8,
				"paged"          => $paged,
				"post_type"      => "post",
				"post__in"       => $post_ids
			);

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {

				while ( $query->have_posts() ) {
					global $post;
					$query->the_post();


					$category = get_the_category( $post->ID )[0]->name;

					$feat_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );

					$return[] = array(
						"ID"       => $post->ID,
						"title"    => get_the_title(),
						"type"     => $post->post_type,
						"link"     => get_permalink(),
						"date"     => get_the_date( "d.m.Y" ),
						"category" => $category,
						"image"    => $feat_image,
						"author"   => ( get_field( "author" ) ) ? get_field( "author" ) : ""
					);

				}

			}

		}


	}


}


?>