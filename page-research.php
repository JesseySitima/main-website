<?php

/*
Template Name: Research
 */

get_header();

if (have_posts()): while (have_posts()): the_post();

        $hero_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        $hero_caption = nl2br(get_field("caption"));

        $intro = get_field("intro_text");

        ?>


<div id="hero" class="research">

	<div class="bg parallaxed" data-parallax="scroll"
		data-image-src="<?php echo mThumbImage($hero_image, 1440, 900); ?>"></div>

	<div class="wrapper">

		<div class="caption">

			<h2><?php echo $hero_caption; ?></h2>

		</div><!-- caption -->

	</div><!-- wrapper -->

	<div class="decal"></div>

</div><!-- hero -->

<div id="primary" class="content-area">
	<main id="main" class="site-main researchlist">

		<?php if (1 == 2): ?>
		<div class="subnav">

			<div class="container">

				<div class="wrapper">

					<?php

        $args = array(
            "post_type" => "programme",
            "post_status" => "publish",
            "meta_key" => "programme_number",
            "orderby" => "meta_value_num",
            "order" => "ASC",
        );

        $query = new WP_Query($args);

        $count = 1;
        if ($query->have_posts()): while ($query->have_posts()): $query->the_post();

                $number = get_field("programme_number");

                ?>

					<a href="<?php the_permalink();?>">Theme <?php echo $count; ?></a>

					<?php

                $count++;

            endwhile;endif;

        wp_reset_query();

        ?>

					<a href="" class="current">Research</a>

				</div><!-- wrapper -->

			</div><!-- end container -->

		</div><!-- subnav -->
		<?php endif;?>

		<div class="intro">




			<div class="container l0">

				<div class="wrapper">

					<!--<h2><?php echo $intro[0]["intro_paragraph"]; ?></h2> -->
					<h2>Research Groups</h2>

					<?php echo formatContent($intro[0]["details"]); ?>

				</div><!-- wrapper -->

			</div><!-- end container -->

		</div><!-- intro -->

		<div class="articles">

			<div class="container l0">


				<div class="list">

					<?php

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        "post_type" => "research",
        "post_status" => "publish",
        "posts_per_page" => -1,
        "paged" => $paged,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()): while ($query->have_posts()): $query->the_post();

            $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

            $researchers = get_field("lead_researcher");
            $researchers = get_the_title($researchers);

            $other_researchers = get_field("researchers");

            if ($other_researchers && 1 == 2) { //REMOVED

                foreach ($other_researchers as $key => $researcher) {
                    $name = get_the_title($researcher["researcher"]);

                    if ($key !== key($other_researchers)) {

                        $researchers = $researchers . " & " . $name;
                    } else {

                        $researchers = $researchers . ", " . $name;

                    }

                }

            }

            ?>

					<article class="post" data-aos="fade-up" data-aos-offset="200">

						<a href="<?php the_permalink();?>">

							<div class="image">

								<img src="<?php echo mThumbImage($feat_image, 410, 351); ?>" alt="" />

							</div><!-- image -->

							<div class="info">

								<div class="articleTitle">

									<h3><?php the_title();?></h3>

								</div><!-- article title -->

								<div class="bottom">

									<div class="inner">

										<div class="researchBy">

											<span class="label">Research by.</span>

											<span class="text"><?php echo $researchers; ?></span>

										</div><!-- researchBy -->

										<div class="view">

											<span class="arrow"></span>

											<span class="text">View Research</span>

										</div>

									</div>

								</div><!-- bottom -->

							</div><!-- info -->

						</a>

					</article>

					<?php endwhile;endif;?>

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
</div><!-- #primary -->

<?php

endwhile;endif;

get_footer();

?>