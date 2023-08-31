<?php
/*
Template Name: Student Profiles
 */

get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
        $hero_image = wp_get_attachment_url(get_post_thumbnail_id(60));
        ?>
<div id="hero" class="research">
	<div class="bg parallaxed" data-parallax="scroll" data-image-src="<?=mThumbImage($hero_image, 1440, 900);?>"></div>
	<div class="wrapper">

		<div class="caption">

			<h2 style="text-transform: capitalize; color: 999 !important;">
				<?=$_GET['al'];?> Students
			</h2>

		</div><!-- caption -->

	</div><!-- wrapper -->
	<div class="decal"></div>
</div><!-- hero -->

<style>
#main.researchlist .articles .list article {
	height: 515px !important;
}
</style>
<div id="primary" class="content-area">

	<main id="main" class="site-main researchlist">

		<div class="articles">

			<div class="container l0">

				<div class="list"><br>
					<?php
        $paged = get_query_var('paged') ?? 1;
        $args = array(
            "post_type" => "student-profiles",
            "post_status" => "publish",
            "meta_field" => "academic_level",
            "meta_value" => $_GET['al'],
            "posts_per_page" => -1,
            "paged" => $paged,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
                $feat_image = get_field("student_photo");
                $featured_image = ($feat_image) ? $feat_image : get_bloginfo("template_url") . "/library/img/no-image-small.png";

                ?>

					<article class="post" data-aos="fade-up" data-aos-offset="100">

						<a href="<?php the_permalink();?>">
							<div class="image">
								<img src="<?=mThumbImage($featured_image, 410, 300);?>" alt="" />
							</div><!-- image -->

							<div class="info">
								<div class="articleTitle">
									<h3><?php the_title();?></h3>
								</div><!-- article title -->
								<div class="bottom">

									<div class="inner">

										<div class="researchBy">

											<span class="label"><?=get_field('student_cadre')?></span>

											<!-- <span class="text"><?=get_field('student_program')?></span> -->

										</div><!-- researchBy -->

										<div class="view">

											<span class="arrow"></span>

											<span class="text">View Profile</span>

										</div>

									</div>

								</div>
							</div><!-- info -->
						</a>
					</article>

					<?php
            endwhile;
        else:
        ?>

					<div id="primary" class="content-area">
						<main id="main" class="site-main opportunitieslist">

							<div class="subnav">

								<div class="container">

									<div class="wrapper">

										<a href="<?php bloginfo("url");?>/training/student-profiles?al=masters"
											class="<?=($_GET['al'] == 'masters' ? 'current' : null)?>"
											data-tab="sites">Masters</a>
										<a href="<?php bloginfo("url");?>/training/student-profiles?al=phd"
											class="<?=($_GET['al'] == 'phd' ? 'current' : null)?>"
											data-tab="sites">PhD</a>
										<a href="<?php bloginfo("url");?>/training/student-profiles?al=post-doctorate"
											class="<?=($_GET['al'] == 'post-doctorate' ? 'current' : null)?>"
											data-tab="sites">Post-Doctorate</a>

									</div>

								</div>

							</div><!-- subnav -->

							<div class="wrapper">

								<div class="container l2">

									<div class="list">


										<div class="error">

											<span class="icon"></span>
											<span class="text">No <?=$_GET['al']?> students available at the
												moment</span>

										</div><!-- error -->



									</div><!-- list -->

									<div class="pagination">

										<div class="numbers">



										</div>

									</div><!-- pagination -->

								</div><!-- end container -->

							</div><!-- wrapper -->



						</main><!-- #main -->
					</div>
					<?php
    endif;?>

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
endwhile;
endif;
get_footer();