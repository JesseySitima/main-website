<?php

/*
Template Name: Creator Update
 */

get_header();

$latest_post_id = array();
?>

<div id="hero" class="science alternate alt1">

	<div class="wrapper">

		<div class="caption black">

			<h2>CREATOR Updates</h2>

		</div><!-- caption -->

	</div><!-- wrapper -->

	<div class="decal"></div>

</div><!-- hero -->

<div id="primary" class="content-area">
	<main id="main" class="site-main news">

		<div class="container l0">
			<br><br>

			<div class="list">
				<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    "post_type" => "creator-updates",
    "post_status" => "publish",
    "posts_per_page" => 9,
    "paged" => $paged,
);

$posts = new WP_Query($args);

if ($posts->have_posts()):
    while ($posts->have_posts()):
        $posts->the_post();

        $featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

        $featured_image = ($featured_image) ? $featured_image : get_bloginfo("template_url") . "/library/img/no-image-small.png";

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

							<span class="category">Update</span>
							<span class="separator"></span>
							<span class="date"><?php echo get_the_date("d F Y"); ?></span>

						</div><!-- meta -->

						<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>

						<a href="<?php the_permalink();?>" class="button pink">

							<span class="arrow"></span>

							<span class="text">Read More</span>

						</a>

					</div><!-- info -->


				</article> <!-- post -->

				<?php

    endwhile;

    ?>

			</div><!-- list -->

			<div class="pagination">

				<div class="inner">


					<?php
    global $wp_query;

    if ($posts->max_num_pages > 6) {

        $big = 999999999;

        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $posts->max_num_pages,
        ));

    }
    ?>

				</div>

			</div><!-- pagination -->

			<div class="action">

				<a href="" class="button red loadMore">

					<span class="text">Load More</span>

				</a>

			</div><!-- action -->

			<?php else: ?>


			<div id="primary" class="content-area">
				<main id="main" class="site-main publications">

					<div class="list">

						<div class="container l1">


							<div class="error">

								<span class="icon"></span>
								<span class="text">No CREATOR updates available here</span>

							</div><!-- error -->


						</div><!-- end container -->

					</div><!-- list -->

				</main><!-- #main -->
			</div>

			<?php endif;?>

		</div><!-- end container -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();

?>