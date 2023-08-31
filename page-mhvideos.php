<?php
/*
Template Name:  Maternal Health Videos
 */
get_header();

if (have_posts()): while (have_posts()): the_post();

        ?>

<div id="hero" class="science alternate alt1">

	<div class="bg parallaxed" data-parallax="scroll"
		data-image-src="<?php echo mThumbImage($hero_image, 1440, 900); ?>"></div>

	<div class="wrapper">

		<div class="caption black">

			<h2>Maternal Health Videos</h2>

		</div><!-- caption -->

	</div><!-- wrapper -->

	<div class="decal"></div>

</div><!-- hero -->


<style>
#main.operations .departments .tablinks {
	margin-bottom: 0 !important
}

#main.operations .departments {
	padding: 0;
	background: initial;
	overflow: hidden;
}
</style>

<div id="primary" class="content-area">
	<main id="main" class="site-main operations">


		<div id="departments" class="departments">



			<div class="tablinks">

				<a href="<?php bloginfo("url");?>/themes/maternal-health-about/">About</a>
				<a href="<?php bloginfo("url");?>/themes/maternal-health-profiles/">Profiles</a>
				<a href="<?php bloginfo("url");?>/themes/maternal-health-research-and-programs/">Research & Programs</a>
				<a href="<?php bloginfo("url");?>/themes/maternal-health-blogs/">Blogs</a>
				<a href="<?php bloginfo("url");?>/themes/maternal-health-videos/" class="current">Others</a>

			</div><!-- links -->

			<div class="pages">

				<div class="page">

					<div class="wrapper">
						<main id="main" class="site-main opportunitieslist">

							<div class="wrapper">

								<div class="container l2">

									<div class="list">


										<div class="error">

											<span class="icon"></span>
											<span class="text">No data found</span>

										</div><!-- error -->

									</div><!-- list -->

								</div><!-- end container -->

							</div><!-- wrapper -->

						</main><!-- #main -->
					</div>
				</div>
			</div>

		</div><!-- departments -->

</div><!-- container -->

</main><!-- #main -->
</div><!-- #primary -->

<?php

    endwhile;endif;

get_footer();

?>