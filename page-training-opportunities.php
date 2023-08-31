<?php

/*
  Template Name: Training Opportunities
*/

get_header();



$category = "Research Trainings";

if(isset($_GET["cat"]) && !empty($_GET["cat"])){
	$category = urldecode($_GET["cat"]);

	if($category != "Operational Trainings"){
	  $category = "Research Trainings";
	}

}


?>

	<div id="hero" class="opportunitieslist alternate alt1">

		<div class="wrapper">

			<div class="caption black">

				<h2>Training Opportunities</h2>

			</div><!-- caption -->

		</div><!-- wrapper -->

		<div class="decal"></div>

	</div><!-- hero -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main opportunitieslist">

      <div class="subnav">

        <div class="container">

          <div class="wrapper">

            <a href="<?php bloginfo("url");?>/training/training-opportunities/?cat=<?php echo urlencode("Research Trainings");?>" data-tab="sites" <?php if($category == "Research Trainings"):?>class="current"<?php endif;?>>Research Trainings</a>
            <a href="<?php bloginfo("url");?>/training/training-opportunities/?cat=<?php echo urlencode("Operational Trainings");?>" data-tab="sites" <?php if($category == "Operational Trainings"):?>class="current"<?php endif;?>>Operational Trainings</a>

          </div>

        </div>

      </div><!-- subnav -->

			<div class="wrapper">

				<div class="container l2">

					<div class="list">

						<?php

						$args = array(
							"post_type" => "opportunities",
							"posts_per_page" => 20,
							"post_status" => "publish",
              "meta_field" => "category",
              "meta_value" => $category
						);

						$opportunities = new WP_Query($args);

						if($opportunities->have_posts()):

							while($opportunities->have_posts()): $opportunities->the_post();

								$file = get_field("file_download");

								?>

								<div class="opportuity" data-aos="fade-up" data-aos-duration="700">

									<div class="inner">

										<h3><?php the_title();?></h3>

										<div class="right">

											<a href="<?php echo $file;?>" class="button pink apply" target="_blank">

												<span class="arrow"></span>

												<span class="text">Download</span>

											</a>

											<div class="clear"></div>

										</div><!-- right -->

										<div class="clear"></div>

									</div><!-- inner -->

								</div><!-- opportuity -->

								<?php
							endwhile;

						else:

							?>

							<div class="error">

								<span class="icon"></span>
								<span class="text">No opportunities available at the moment</span>

							</div><!-- error -->

							<?php

						endif;

						?>


					</div><!-- list -->

					<div class="pagination">

						<div class="numbers">


							<?php
							$big = 999999999;

							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $opportunities->max_num_pages
							) );
							?>

						</div>

					</div><!-- pagination -->

				</div><!-- end container -->

			</div><!-- wrapper -->



		</main><!-- #main -->
	</div><!-- #primary -->

<?php



get_footer();

?>