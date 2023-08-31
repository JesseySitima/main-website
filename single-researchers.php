<?php

get_header();

if (have_posts()): while (have_posts()): the_post();
        global $post;

        $feat_image = get_field("profile_image");
        $feat_image = ($feat_image) ? $feat_image : get_bloginfo("template_url") . "/library/img/no-image-small.png";

        ?>

<div id="hero" class="single alternate alt1">

	<div class="wrapper">

		<div class="caption">

			<span class="sub">Researcher</span>

			<h2><?php the_title();?></h2>

		</div><!-- caption -->

	</div><!-- wrapper -->

</div><!-- hero -->

<div id="primary" class="content-area">
	<main id="main" class="site-main news single">

		<div class="details">

			<div class="container l0">

				<aside class="left">

					<a href="<?php bloginfo("url");?>/researchgroups/" class="backTo">

						<span class="arrow"></span>
						<span class="text">Back to Research Groups</span>

					</a>

					<div class="featuredImage">

						<img src="<?php echo mThumbImage($feat_image, 410, 351); ?>" alt="" />

					</div><!-- image -->

				</aside>


				<div class="right info">

					<div class="articleContent">

						<?php the_content();?>

					</div><!-- article content -->

				</div><!-- info -->

				<div class="clear"></div>

			</div><!-- container -->

		</div><!-- details -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php

    endwhile;endif;

get_footer();

?>