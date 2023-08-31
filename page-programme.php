<?php

/*
  Template Name: Programme
*/

get_header();

if(have_posts()) : while(have_posts()) : the_post();

?>

	<div id="hero" class="programme">

		<div class="bg"></div>

		<div class="wrapper">

			<div class="caption">

				<h2>Lorem ipsum dolor sit <br/>ameton sectetur adipisicing <br/>elitsed do eiusmod </h2>

			</div><!-- caption -->

		</div><!-- wrapper -->

		<div class="decal"></div>

	</div><!-- hero -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main programme">



		</main><!-- #main -->
	</div><!-- #primary -->


<?php

endwhile; endif;


get_footer();

?>