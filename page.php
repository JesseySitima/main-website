<?php

  /*
    Template Name: Default Page
  */

get_header();

if(have_posts()) : while(have_posts()) : the_post();


	$hero_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

?>

  <div id="hero" class="alternate alt2">

    <div class="wrapper">

      <div class="caption black">

        <h2><?php the_title();?></h2>

      </div><!-- caption -->

    </div><!-- wrapper -->

    <div class="decal"></div>

  </div><!-- hero -->

  <div id="primary" class="content-area">
    <main id="main" class="site-main default">

      <div class="container l1">

        <div class="articleContent">

          <?php the_content();?>

        </div><!-- article content -->

      </div><!-- end container -->

    </main><!-- #main -->
  </div><!-- #primary -->

	<?php

endwhile; endif;


get_footer();

?>