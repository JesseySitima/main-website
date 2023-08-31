<?php
/*
Template Name: Maternal Health Profiles
 */

get_header();

if (have_posts()): while (have_posts()): the_post();

        ?>

<div id="hero" class="science alternate alt1">

	<div class="bg parallaxed" data-parallax="scroll"
		data-image-src="<?php echo mThumbImage($hero_image, 1440, 900); ?>"></div>

	<div class="wrapper">

		<div class="caption black">

			<h2>Maternal Health Profiles</h2>

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
				<a href="<?php bloginfo("url");?>/themes/maternal-health-profiles/" class="current">Profiles</a>
				<a href="<?php bloginfo("url");?>/themes/maternal-health-research-and-programs/">Research & Programs</a>
				<a href="<?php bloginfo("url");?>/themes/maternal-health-blogs/">Blogs</a>
				<a href="<?php bloginfo("url");?>/themes/maternal-health-videos/">Others</a>

			</div><!-- links -->

		</div><!-- departments -->

	</main> <!-- Links -->

	<?php
        $paged = get_query_var('paged') ?? 1;
        $args = array(
            "post_type" => "mhprofiles",
            "post_status" => "publish",
            "posts_per_page" => -1,
            "paged" => $paged,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()):
        ?>


	<main id="main" class="site-main researchlist">

		<div class="articles">

			<div class="container l0">

				<div class="list"><br><br><br>
					<?php
        while ($query->have_posts()):
            $query->the_post();
            $feat_image = get_field("images");
            $featured_image = ($feat_image) ? $feat_image : get_bloginfo("template_url") . "/library/img/no-image-small.png";
            ?>
					<article class="post" data-aos="fade-up" data-aos-offset="100">

						<a href="<?php the_permalink();?>">
							<div class="image">
								<img src="<?=mThumbImage($featured_image, 410, 300);?>" alt="" />
							</div><!-- image -->

							<div class="info">
								<div class="articleTitle">
									<h3><?=get_field('full_name');?></h3>
								</div><!-- article title -->
								<div class="bottom">

									<div class="inner">

										<div class="researchBy">

											<span class="label"><?=get_field('description')?></span>

										</div><!-- researchBy -->

										<div class="view">

											<span class="arrow"></span>

											<span class="text">Read More ...</span>

										</div>

									</div>

								</div>
							</div><!-- info -->
						</a>
					</article>

					<?php
        endwhile;
        ?>

				</div><!-- list -->

				<?php if (1 == 2): ?>
				<div class="pagination">

					<div class="inner">


						<?php
        $big = 999999999;

        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $query->max_num_pages,
        ));
        ?>

					</div>

				</div><!-- pagination -->

				<div class="action">

					<a href="" class="button red loadMore">

						<span class="text">Load More</span>

					</a>

				</div><!-- action -->
				<?php endif;?>

			</div><!-- end container -->


		</div><!-- intro -->


	</main><!-- #main -->

	<?php else: ?>
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
											<span class="text">No profiles available</span>

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