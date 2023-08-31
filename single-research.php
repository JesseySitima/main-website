<?php

get_header();

if (have_posts()): while (have_posts()): the_post();

        $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

        $description = get_field("description");

        $lead_researcher = get_field("lead_researcher");
        $lead_researcher_image = get_field("profile_image", $lead_researcher);
        $lead_researcher_name = get_the_title($lead_researcher);

        $other_researchers = get_field("researchers");

        $related_research = get_field("related_research");

        $publications = get_field("publications");

        $title_length = strlen(get_the_title());

        ?>

<div id="hero" class="researchdetail alternate alt1">

	<div class="wrapper">

		<div class="caption">

			<span class="sub">Research</span>

			<h2 <?php if ($title_length > 30): ?>class="long" <?php endif;?>><?php the_title();?></h2>

		</div><!-- caption -->

	</div><!-- wrapper -->

	<div class="decal"></div>

</div><!-- hero -->

<div id="primary" class="content-area">
	<main id="main" class="site-main researchdetail">

		<div class="details">

			<div class="container l0">

				<aside class="left overview">

					<a href="<?php bloginfo("url");?>/research/" class="backTo">

						<span class="arrow"></span>
						<span class="text">Back to Research</span>

					</a>

					<div class="featuredImage">

						<img src="<?php echo mThumbImage($feat_image, 410, 351); ?>" alt="" />

					</div><!-- image -->

					<div class="researchers">

						<div class="researcher lead">

							<?php if ($lead_researcher_image) {?>

							<div class="profileImage">

								<img src="<?php echo mThumbImage($lead_researcher_image, 60, 60); ?>"
									alt="<?php echo $lead_researcher_name; ?>" />

							</div><!-- image -->
							<?php }?>

							<div class="profileInfo">

								<span class="title">Lead Researcher</span>

								<span class="name"
									data-id="<?php echo $lead_researcher; ?>"><?php echo $lead_researcher_name; ?></span>

							</div><!-- info -->

						</div><!-- lead -->

						<?php

    if ($other_researchers):

    ?>
						<div id="researcherSlider">
							<?php

    foreach ($other_researchers as $researcher) {

        if (!$researcher["researcher"]) {
            continue;
        }

        $researcher_image = (get_field("profile_image", $researcher["researcher"])) ? get_field("profile_image", $researcher["researcher"]) : get_bloginfo("template_url") . "/library/img/training/no-avatar.png";
        $researcher_image = mThumbImage($researcher_image, 60, 60);

        $researcher_name = get_the_title($researcher["researcher"]);

        ?>

							<div class="researcher">

								<div class="inner">

									<?php if ($researcher_image) {?>
									<div class="profileImage">

										<img src="<?php echo $researcher_image; ?>"
											alt="<?php echo $researcher_name; ?>" />

									</div><!-- image -->
									<?php }?>

									<div class="profileInfo">

										<span class="title">Researcher</span>

										<span class="name"
											data-id="<?php echo $researcher["researcher"]; ?>"><?php echo $researcher_name; ?></span>

									</div><!-- info -->

								</div><!-- inner -->

								<div class="action">

									<a href="#" class="viewStudent" data-id="<?php echo $researcher["researcher"]; ?>">

										<span class="arrow"></span>
										<span class="text">View Profile</span>

									</a>

								</div><!-- action -->

							</div><!-- researcher -->


							<?php

    }

    ?>
						</div><!-- researcher slider -->


						<?php if (count($other_researchers) > 1): ?>

						<div class="sliderControls">

							<a href="" class="control prev"></a>
							<a href="" class="control next"></a>

						</div>

						<?php endif;?>
						<?php endif;?>


					</div><!-- researchers -->


				</aside><!-- overview -->

				<div class="right info">

					<?php if ($description): ?>
					<div class="description">

						<?php echo formatContent($description); ?>

					</div><!-- $description -->
					<?php endif;?>

					<div class="articleContent">

						<?php the_content();?>

					</div><!-- article content -->

				</div><!-- info -->

				<div class="clear"></div>

			</div><!-- end container -->

		</div><!-- details -->

		<?php if ($related_research): ?>
		<div class="related">

			<div class="container l0">

				<h3>Related Research</h3>

				<div class="links">

					<?php

$count = 1;
foreach ($related_research as $item) {

    if ($item["article"]) {

        ?>
					<div class="block block<?php echo $count; ?>">

						<a href="<?php echo get_permalink($item["article"]); ?>">

							<img
								src="<?php bloginfo("template_url");?>/library/img/research/linkblock<?php echo $count; ?>.png" />

							<div class="caption">

								<span class="text"><?php echo get_the_title($item["article"]); ?></span>

							</div><!-- caption -->


						</a>

					</div><!-- block 1 -->
					<?php
}

    $count++;

}

?>

					<div class="clear"></div>

				</div><!-- links -->

			</div><!-- end container -->

		</div><!-- related -->
		<?php endif;?>

		<div class="partnerships">

			<h3>Partnerships</h3>

			<div class="links">

				<div class="container l0">

					<div class="list">

						<a href="" target="_blank">

							<img src="<?php bloginfo("template_url");?>/library/img/research/logos/umcom.png" />

						</a>

						<a href="" target="_blank">

							<img src="<?php bloginfo("template_url");?>/library/img/research/logos/ull.png" />

						</a>

						<a href="" target="_blank">

							<img src="<?php bloginfo("template_url");?>/library/img/research/logos/cghr.png" />

						</a>

						<a href="" target="_blank">

							<img src="<?php bloginfo("template_url");?>/library/img/research/logos/lstm.png" />

						</a>

						<a href="" target="_blank">

							<img src="<?php bloginfo("template_url");?>/library/img/research/logos/wellcome.png" />

						</a>

					</div>

				</div><!-- container -->

			</div><!-- links -->

		</div><!-- partnerships -->

		<?php

if ($publications) {

    ?>

		<div class="publications">

			<div class="container l0">

				<div class="wrapper">

					<div class="top">

						<h3>Publications</h3>

						<a href="<?php bloginfo("url");?>/publications/" class="button red">

							<span class="arrow"></span>

							<span class="text">View More</span>

						</a>

						<div class="clear"></div>

					</div><!-- top -->

					<div class="list">

						<?php

    foreach ($publications as $publication) {

        $title = get_the_title($publication["publication"]);
        $details = get_field("details", $publication["publication"]);

        $day = get_field("day", $publication["publication"]);
        $month = get_field("month", $publication["publication"]);
        $year = get_field("year", $publication["publication"]);

        $link = get_field("link", $publication["publication"]);

        $types = '';
        foreach ((array) wp_get_post_terms($publication["publication"], 'publication-type') as $collection) {
            if (empty($collection->slug)) {
                continue;
            }

            $types .= $collection->name;
        }

        $author = '';
        foreach ((array) wp_get_post_terms($publication["publication"], 'publication-author') as $author) {
            $author = $author->name;
            break;
        }

        ?>

						<div class="publication">

							<span class="icon"></span>

							<div class="info">

								<p><?php echo $title; ?> <span class="details"><?php echo $details; ?></span></p>

								<div class="bottom">

									<div class="left">

										<span class="date"><?php echo $day . " " . $month . " " . $year; ?></span>

										<span class="category"><?php echo $types; ?></span>

										<span class="author"><?php echo $author; ?></span>

									</div><!-- left -->

									<a href="<?php echo $link; ?>" class="right link"></a>

									<div class="clear"></div>

								</div><!-- bottom -->

							</div><!-- info -->

							<div class="clear"></div>

						</div><!-- publication -->

						<?php

    }

    ?>

					</div><!-- list -->

				</div><!-- wrapper -->

			</div><!-- container -->

		</div><!-- publications -->

		<?php

}

?>

	</main><!-- #main -->
</div><!-- #primary -->


<div id="researcherdetails">

	<div class="wrapper">

		<a href="" class="closeResearcher"></a>

		<div class="inner">

			<div class="top">

				<div class="image">

					<img src="" class="profileImage" />

				</div><!-- image -->

				<div class="meta">

					<h3 class="profileName"></h3>

					<div class="details">


					</div><!-- details -->

				</div><!-- meta -->



			</div><!-- top -->

		</div><!-- inner -->

	</div><!-- wrapper -->

</div><!-- student details -->

<?php

endwhile;endif;

get_footer();

?>