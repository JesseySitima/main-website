<?php
/*
Template Name:  Maternal Health Research & Programs
 */

get_header();

if (have_posts()): while (have_posts()): the_post();

        ?>

<div id="hero" class="science alternate alt1">

	<div class="bg parallaxed" data-parallax="scroll"
		data-image-src="<?php echo mThumbImage($hero_image, 1440, 900); ?>"></div>

	<div class="wrapper">

		<div class="caption black">

			<h2>Maternal Health Research And Programs</h2>

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
				<a href="<?php bloginfo("url");?>/themes/maternal-health-research-and-programs/"
					class="current">Research & Programs</a>
				<a href="<?php bloginfo("url");?>/themes/maternal-health-blogs/">Blogs</a>
				<a href="<?php bloginfo("url");?>/themes/maternal-health-videos/">Others</a>

			</div><!-- links -->

		</div><!-- departments -->

	</main> <!-- Links -->

	<?php
        $args = array(
            "post_type" => "mh-researchprograms",
            "post_status" => "publish",
            "order" => "ASC",
        );

        $themes = new WP_Query($args);

        if ($themes->have_posts()):

        ?>

	<main id="main" class="site-main about">

		<div id="achievements" class="achievements">

			<div class="container">

				<div class="wrapper">

					<div class="accordion">

						<?php
        while ($themes->have_posts()):
            $themes->the_post();
            ?>

						<div class="col">

							<div class="block" data-aos="fade-up" data-aos-offset="200">

								<div class="outer">

									<div class="wrap">

										<div class="left">

											<span class="icon"></span>

											<span class="text"><?=get_field('title')?></span>

										</div><!-- left -->

										<!-- <span class="arrow"></span> -->

										<div class="clear"></div>

									</div><!-- wrap -->

								</div><!-- outer -->

							</div><!-- block -->

						</div><!-- left -->

						<?php endwhile;?>
					</div><!-- accordion -->
				</div><!-- wrapper -->
			</div><!-- container -->

		</div><!-- achievements -->


	</main><!-- #main -->
	<?php wp_reset_query();else: ?>
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
											<span class="text">No data available</span>

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