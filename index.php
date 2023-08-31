<?php

/*
Template Name: News/Blog
 */

get_header();

$latest_post_id = array();
?>

<div id="hero" class="science alternate alt1">

	<div class="wrapper">

		<div class="caption black">

			<h2>News & Events</h2>

		</div><!-- caption -->

	</div><!-- wrapper -->

	<div class="decal"></div>

</div><!-- hero -->

<div id="primary" class="content-area">
	<main id="main" class="site-main news">

		<div class="container l0">

			<?php

$args = array(
    "post_type" => "post",
    "post_status" => "publish",
    "posts_per_page" => 1,
);

$featured = new WP_Query($args);

if ($featured->have_posts()) {

    ?>

			<div class="featured">

				<h2>Latest Stories</h2>

				<?php

    while ($featured->have_posts()) {
        $featured->the_post();

        global $post;

        $featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

        $featured_image = ($featured_image) ? $featured_image : get_bloginfo("template_url") . "/library/img/no-image-big.png";

        $type = get_field("type");

        $latest_post_id[] = $post->ID;

        ?>

				<article class="post" data-aos="fade-up" data-aos-offset="200">

					<div class="image">

						<a href="<?php the_permalink();?>">

							<img src="<?php echo mThumbImage($featured_image, 410, 350); ?>"
								alt="<?php the_title();?>" />

						</a>
					</div><!-- image -->
					<div class="info">

						<div class="meta">

							<span class="category"><?php echo $type; ?></span>
							<span class="separator"></span>
							<span class="date"><?php echo get_the_date("d F Y"); ?></span>

						</div><!-- meta -->

						<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>

						<p><?php echo trimString(get_the_content(), 125); ?></p>

						<a href="<?php the_permalink();?>" class="button red">

							<span class="arrow"></span>

							<span class="text">Read More</span>

						</a>

					</div><!-- info -->

					<div class="clear"></div>


				</article>


				<?php

    }

    ?>

			</div><!-- featured -->

			<?php

}

wp_reset_query();

?>


			<div class="list">

				<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    "post_type" => "post",
    "post_status" => "publish",
    "posts_per_page" => 9,
    "post__not_in" => $latest_post_id,
    "paged" => $paged,
);

$posts = new WP_Query($args);

if ($posts->have_posts()): while ($posts->have_posts()): $posts->the_post();

        $featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

        $featured_image = ($featured_image) ? $featured_image : get_bloginfo("template_url") . "/library/img/no-image-small.png";

        $type = get_field("type");

        ?>
						<article class="post" data-aos="fade-up" data-aos-offset="200">


							<div class="image">

								<a href="<?php the_permalink();?>">

									<img src="<?php echo mThumbImage($featured_image, 410, 350); ?>"
										alt="<?php the_title();?>" />

								</a>

							</div><!-- image -->

							<div class="info">

								<div class="meta">

									<span class="category"><?php echo $type; ?></span>
									<span class="separator"></span>
									<span class="date"><?php echo get_the_date("d F Y"); ?></span>

								</div><!-- meta -->

								<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>

								<a href="<?php the_permalink();?>" class="button pink">

									<span class="arrow"></span>

									<span class="text">Read More</span>

								</a>

							</div><!-- info -->


						</article>

						<?php

    endwhile;endif;

?>

			</div><!-- list -->

			<div class="pagination">

				<div class="inner">


					<?php
global $wp_query;

$big = 999999999;

echo paginate_links(array(
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $posts->max_num_pages,
));
?>

				</div>

			</div><!-- pagination -->

			<div class="action">

				<a href="" class="button red loadMore">

					<span class="text">Load More</span>

				</a>

			</div><!-- action -->


		</div><!-- end container -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();

?>