<?php

/*
Template Name: Operations
 */

get_header();

if (have_posts()): while (have_posts()): the_post();

        $intro = get_field("intro");

        $department = "Departments";

        if (isset($_GET["dep"]) && !empty($_GET["dep"])) {
            $department = urldecode($_GET["dep"]);

            if ($department != "Research Support Units" && $department != "Field Sites") {
                $department = "Departments";
            }

        }

        ?>


		<div id="hero" class="operations">

			<div class="wrapper">

				<div class="slider">

					<div id="operationsSlider">

						<div class="slide">
							<img src="<?php bloginfo("template_url");?>/library/img/operations/slider/1-operations.jpg" />
						</div><!-- slide -->

						<div class="slide">
							<img src="<?php bloginfo("template_url");?>/library/img/operations/slider/2-operations.jpg" />
						</div><!-- slide -->

						<div class="slide">
							<img src="<?php bloginfo("template_url");?>/library/img/operations/slider/3-operations.jpg" />
						</div><!-- slide -->

						<div class="slide">
							<img src="<?php bloginfo("template_url");?>/library/img/operations/slider/4-operations.jpg" />
						</div><!-- slide -->

					</div><!-- operations slider -->

				</div><!-- slider -->

				<div class="caption">

					<h2>Operations</h2>

				</div><!-- caption -->

			</div><!-- wrapper -->

			<div class="decal"></div>

		</div><!-- hero -->

		<div id="primary" class="content-area">
			<main id="main" class="site-main operations">

				<div class="about">

					<div class="container l2">

						<?php if ($intro): ?>
						<div class="intro">

							<?php echo formatContent($intro); ?>

						</div><!-- intro -->
						<?php endif;?>

					<div class="articleContent right">

						<p class="first">We support and engage with:</p>

						<?php the_content();?>

					</div><!-- support -->

					<div class="clear"></div>


				</div><!-- container -->

			</div><!-- about -->


			<div class="container">

				<div id="departments" class="departments">

					<div class="tablinks">

						<a href="<?php bloginfo("url");?>/operations/?dep=Departments#departments" data-tab="departments"
							<?php if ($department == "Departments"): ?>class="current" <?php endif;?>>Departments</a>
					<a href="<?php bloginfo("url");?>/operations/?dep=<?php echo urlencode("Research Support Units"); ?>#departments"
						data-tab="research" <?php if ($department == "Research Support Units"): ?>class="current"
						<?php endif;?>>Research Support Units</a>
					<a href="<?php bloginfo("url");?>/operations/?dep=<?php echo urlencode("Field Sites"); ?>#departments"
						data-tab="sites" <?php if ($department == "Field Sites"): ?>class="current" <?php endif;?>>Field
						Sites</a>

				</div><!-- links -->

				<div class="pages">

					<div class="page">

						<h2><?php echo $department; ?></h2>

						<div class="wrapper">


							<?php

$args = array(
    "post_type" => "departments",
    "post_status" => "publish",
    "meta_field" => "category",
    "meta_value" => $department,
);

$departments = new WP_Query($args);

?>

							<aside class="links">

								<div class="inner">

									<?php

if ($departments->have_posts()) {

    $count = 1;
    while ($departments->have_posts()) {
        $departments->the_post();

        global $post;

        ?>
									<a href="" data-id="tab<?php echo $count; ?>"
										class="<?php if (!isset($_GET["did"]) && $count == 1): ?>current<?php endif;?> <?php if (isset($_GET["did"]) && $_GET["did"] == $post->ID): ?>current<?php endif;?> <?php if ($post->ID == 3127): ?>indent<?php endif;?>"><?php the_title();?></a>
									<?php

        $count++;

    }

}

?>

								</div><!-- inner -->

							</aside>

							<div class="tabs">

								<?php

if ($departments->have_posts()) {

    $count = 1;
    while ($departments->have_posts()) {
        $departments->the_post();

        $details = get_field("details");

        $mission = get_field("mission");
        $vision = get_field("vision");
        $core = get_field("core");
        $team = get_field("team");

        $team_members = get_field("team_members");

        //echo "<pre>";
        //var_dump($team_members);
        //echo "</pre>";

        ?>

								<div
									class="tab tab<?php echo $count; ?> <?php if (!isset($_GET["did"]) && $count == 1): ?>current<?php endif;?> <?php if (isset($_GET["did"]) && $_GET["did"] == $post->ID): ?>current<?php endif;?>">

									<div class="wrapper">

										<div class="details">

											<h3><?php the_title();?></h3>

											<?php

        if ($details) {

            ?>
											<div class="block">

												<div class="articleContent">

													<?php echo formatContent($details); ?>

												</div><!-- content -->

											</div><!-- block -->
											<?php

        }
        ?>


											<?php

        if ($mission) {

            ?>
											<div class="block">
Clinical Research Support Unit
Clinical
Statistical Support Unit
Laboratory
Data Management
												<h4>What is our Mission?</h4>

												<div class="articleContent">

													<?php echo formatContent($mission); ?>

												</div><!-- content -->

											</div><!-- block -->
											<?php

        }
        ?>

											<?php

        if ($vision) {

            ?>
											<div class="block">

												<h4>What is our vision?</h4>

												<div class="articleContent">

													<?php echo formatContent($vision); ?>

												</div><!-- content -->

											</div><!-- block -->
											<?php

        }
        ?>

											<?php

        if ($core) {

            ?>
											<div class="block">

												<h4>What is our Core business?</h4>

												<div class="articleContent">

													<?php echo formatContent($core); ?>

												</div><!-- content -->

											</div><!-- block -->
											<?php

        }
        ?>

											<?php

        if ($team) {

            ?>
											<div class="block">

												<h4>Who is in our team?</h4>

												<div class="articleContent">

													<?php echo formatContent($team); ?>

												</div><!-- content -->

											</div><!-- block -->
											<?php

        }
        ?>


										</div><!-- details -->

										<?php if ($team_members) {?>

										<div class="team">

											<div class="wrap">

												<div class="slider sliderfor slider-for-<?php echo $count; ?>">
													<?php

            foreach ($team_members as $member) {

                ?>
													<div class="member">
														<img
															src="<?php echo mThumbImage($member["image"], 289, 322); ?>" />
													</div>
													<?php

            }

            ?>

												</div>

											</div><!-- wrapp -->

											<div class="slideControls controls<?php echo $count; ?>"
												data-index="<?php echo $count; ?>">

												<?php

            if (count($team_members) > 1) {

                ?>
												<div class="paginate">

													<span class="current">01</span>
													<span class="separator">of</span>
													<span
														class="total"><?php echo sprintf("%02d", count($team_members)); ?></span>

												</div><!-- paginate -->


												<div class="arrows">

													<a href="" class="prev"></a>
													<a href="" class="next active"></a>

												</div><!-- arrows -->

												<?php

            }

            ?>


												<div class="clear"></div>

											</div><!-- slideControls -->
											<div class="slider slidernav slider-nav-<?php echo $count; ?> meta">
												<?php

            foreach ($team_members as $member) {

                ?>
												<div>

													<ul>

														<li>

															<span class="label">Name</span>
															<span class="value"><?php echo $member["name"]; ?></span>

														</li>

														<?php if ($member["position"]): ?>
														<li>

															<span class="label">Position</span>
															<span class="value"><?php echo $member["position"]; ?></span>

														</li>
														<?php endif;?>

														<?php if ($member["email"]): ?>
														<li>

															<span class="label">Email</span>
															<span class="value"><?php echo $member["email"]; ?></span>

														</li>
														<?php endif;?>

													</ul>

												</div>
												<?php

            }

            ?>
											</div>



										</div><!-- team -->

										<?php }?>

										<div class="clear"></div>

									</div><!-- inner -->

								</div><!-- tab -->

								<?php

        $count++;

    }

}

?>

							</div><!-- tabs -->

							<div class="clear"></div>

						</div><!-- wrapper -->

					</div><!-- page -->

				</div><!-- pages -->


			</div><!-- departments -->

		</div><!-- container -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php

endwhile;endif;

get_footer();

?>