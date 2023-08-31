<?php
/*
Template Name:  Maternal Health About
 */

get_header();

if (have_posts()):
    while (have_posts()):
        the_post();

        ?>

<div id="hero" class="science alternate alt1">

	<div class="bg parallaxed" data-parallax="scroll"
		data-image-src="<?php echo mThumbImage($hero_image, 1440, 900); ?>"></div>

	<div class="wrapper">

		<div class="caption black">

			<h2>Maternal Health About</h2>

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

				<a href="<?php bloginfo("url");?>/themes/maternal-health-about/" class="current">About</a>
				<a href="<?php bloginfo("url");?>/themes/maternal-health-profiles/">Profiles</a>
				<a href="<?php bloginfo("url");?>/themes/maternal-health-research-and-programs/">Research & Programs</a>
				<a href="<?php bloginfo("url");?>/themes/maternal-health-blogs/">Blogs</a>
				<a href="<?php bloginfo("url");?>/themes/maternal-health-videos/">Others</a>

			</div><!-- links -->

		</div><!-- departments -->

	</main> <!-- Links -->

	<?php

        $args = array(
            "post_type" => "maternalhealth-about",
            "post_status" => "publish",
            "posts_per_page" => 1,
        );

        $about = new WP_Query($args);

        if ($about->have_posts()):

            while ($about->have_posts()) {
                $about->the_post();

                global $post;

                $feat_image = get_field("theme_logo");

                $featured_image = ($feat_image) ? $feat_image : get_bloginfo("template_url") . "/library/img/no-image-big.png";

                ?>

	<main id="main" class="site-main about">

		<div id="description" class="description">

			<div class="container">

				<div class="wrapper">

					<div class="details">

						<div class="articleContent">

							<?=get_field("about");?>

						</div><!-- article content -->

					</div><!-- details -->

					<div class="video">

						<div class="image">

							<img src="<?php echo mThumbImage($featured_image, 502, 452); ?>" />

						</div><!-- image -->

					</div><!-- video -->

					<div class="clear"></div>


				</div>

			</div><!-- end container -->

		</div><!-- description -->
	</main><!-- #main -->

	<?php
            }
            wp_reset_query();

        else: ?>
	<main id="main" class="site-main operations">

		<div id="departments" class="departments">

			<div class="pages">

				<div class="page">

					<div class="wrapper">
						<main id="main" class="site-main opportunitieslist">

							<div class="wrapper">

								<div class="container l2">

									<div class="list">


										<div class="error">

											<span class="icon"></span>
											<span class="text">No about information found</span>

										</div><!-- error -->

									</div><!-- list -->

								</div><!-- end container -->

							</div><!-- wrapper -->

						</main><!-- #main -->
					</div>
				</div>
			</div>

		</div><!-- departments -->



	</main><!-- #main -->

	<?php endif?>

</div><!-- #primary -->

<?php

endwhile;endif;

get_footer();

?>