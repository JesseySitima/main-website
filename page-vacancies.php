<?php

/*
  Template Name: Vacancies
*/

get_header();



?>

	<div id="hero" class="vacancieslist alternate alt1">

		<div class="wrapper">

			<div class="caption black">

				<h2>Work with us</h2>

			</div><!-- caption -->

		</div><!-- wrapper -->

		<div class="decal"></div>

	</div><!-- hero -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main vacancieslist">

			<div class="wrapper">

				<div class="container l2">


            <p class="note">Please email <a href="mailto:vacancies@mlw.mw">vacancies@mlw.mw</a> for further information</p>

						<div class="list">

							<?php

							$args = array(
								"post_type" => "vacancies",
								"posts_per_page" => 20,
								"post_status" => "publish"
							);

							$vacancies = new WP_Query($args);

							if($vacancies->have_posts()):

								while($vacancies->have_posts()): $vacancies->the_post();

									$location = get_field("location");
									$type = get_field("type");

									?>

									<div class="vacancy" data-aos="fade-up" data-aos-duration="700">

										<div class="inner">

											<h3><?php the_title();?></h3>

											<div class="right">

												<span class="meta"><?php echo $type;?></span>

												<a href="<?php the_permalink();?>" class="button pink apply">

													<span class="arrow"></span>

													<span class="text">More details</span>

												</a>

												<div class="clear"></div>

											</div><!-- right -->

											<div class="clear"></div>

										</div><!-- inner -->

									</div><!-- vacancy -->

									<?php
								endwhile;

							else:

								?>

                <div class="error">

                  <span class="icon"></span>
                  <span class="text">No vacancies available at the moment</span>

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
									'total' => $media->max_num_pages
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