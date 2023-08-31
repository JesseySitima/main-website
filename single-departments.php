<?php

global $post;

$category = get_field("category", $post->ID);


wp_redirect(get_bloginfo("url")."/operations/?dep=".urlencode($category)."&did=".$post->ID."#departments");

exit();