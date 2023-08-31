<?php
/*
Template Name:  Maternal Health Blogs
 */

get_header();

if (have_posts()): while (have_posts()): the_post();

        ?>

<div id="hero" class="science alternate alt1">

	<div class="wrapper">

		<div class="caption black">

			<h2>Maternal Health Blogs</h2>

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
				<a href="<?php bloginfo("url");?>/themes/maternal-health-blogs/" class="current">Blogs</a>
				<a href="<?php bloginfo("url");?>/themes/maternal-health-videos/">Others</a>

			</div><!-- links -->

		</div>

	</main>

	<?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
            "post_type" => "maternalhealth-blogs",
            "post_status" => "publish",
            "order" => "ASC",
        );

        $blogs = new WP_Query($args);

        if ($blogs->have_posts()):
        ?>

	<main id="main" class="site-main news">

		<div class="container l0">

			<br><br>

			<div class="list">

				<?php

        while ($blogs->have_posts()):
            $blogs->the_post();

            $featured_image = get_field("image");

            $featured_image = ($featured_image) ? $featured_image : get_bloginfo("template_url") . "/library/img/no-image-small.png";

            ?>
				<article class="post" data-aos="fade-up" data-aos-offset="200">


					<div class="image">

						<a href="<?php the_permalink();?>">

							<img src="<?php echo mThumbImage($featured_image, 410, 350); ?>"
								alt="<?php get_field("title");?>" />

						</a>

					</div><!-- image -->

					<div class="info">

						<div class="meta">

							<span class="category"><?="Blog"?></span>
							<span class="separator"></span>
							<span class="date"><?=get_the_date("d F Y");?></span>

						</div><!-- meta -->

						<h3><a href="<?php the_permalink();?>"><?=trimString(get_field("description"), 125);?></a></h3>

						<a href="<?php the_permalink();?>" class="button pink">

							<span class="arrow"></span>

							<span class="text">Read More</span>

						</a>

					</div><!-- info -->


				</article>

				<?php

        endwhile;

        ?>

			</div><!-- list -->

			<div class="pagination">

				<div class="inner">


					<?php

        $big = 999999999;

        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $blogs->max_num_pages,
        ));
        ?>

				</div>

			</div><!-- pagination -->

			<div class="action">

				<a href="" class="button red loadMore">

					<span class="text">Load More</span>

				</a>

			</div><!-- action -->

		</div><!-- container -->

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
											<span class="text">No articles available</span>

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
	<?php endif;?>
</div><!-- #primary -->

<?php

endwhile;endif;

get_footer();

?>