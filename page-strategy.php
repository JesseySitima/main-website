<?php

/*
  Template Name: Strategy
*/

get_header();

if(have_posts()) : while(have_posts()) : the_post();

	$about_image = get_field("image");
	$intro = get_field("intro");


	$community_public_engagement = get_field("community_public_engagement");
	$media_engagement = get_field("media_engagement");
	$internal_external_communications = get_field("internal_external_communications");

	$col1_length = count($community_public_engagement);
	$col2_length = count($media_engagement);
	$col3_length = count($media_engagement);

	$row_length = 0;

	if($col1_length > $col2_length){
		$row_length = $col1_length;
	}
	else{
		$row_length = $col2_length;
	}

	if($row_length < $col3_length){
		$row_length = $col3_length;
	}

?>

	<div id="hero" class="strategy  alternate alt3">

		<div class="wrapper">

			<div class="caption black">

				<span class="sub">Public Engagement</span>

				<h2>Strategy</h2>

			</div><!-- caption -->

		</div><!-- wrapper -->

    <div class="decal"></div>

	</div><!-- hero -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main strategy">

			<div class="about">

				<div class="bg"></div>

				<div class="container">

					<div class="image">

						<img src="<?php echo mThumbImage($about_image, 502, 452);?>"/>

					</div><!-- image -->

					<div class="details">

						<?php if($intro):?>
							<div class="intro">

								<?php echo formatContent($intro);?>

							</div><!-- intro -->
						<?php endif;?>

						<div class="articleContent">

							<?php the_content();?>

						</div><!-- article content -->

					</div><!-- details -->

					<div class="clear"></div>


				</div><!-- end container -->

			</div><!-- about -->

			<div class="objectives">

				<div class="container l0">

					<div class="top">

						<h2>Community and Public Engagement Department Strategy</h2>

						<h3>Head of Department</h3>

					</div><!-- top -->

					<div class="data desktop">

						<div class="row headings">

							<div class="col first">Community & Public Engagement</div>
							<div class="col second">Media Engagement</div>
							<div class="col third">Internal & External Communications</div>

						</div><!-- row -->

						<div class="row subheadings">

							<div class="col first">Specific Objectives</div>
							<div class="col second">Specific Objectives</div>
							<div class="col third">Specific Objectives</div>

						</div><!-- row -->

						<?php

						for($x = 0; $x < $row_length; $x++) {

						?>

						<div class="row">

							<div class="col first">

								<div class="articleContent">

									<?php echo formatContent($community_public_engagement[$x]["text"]);?>

								</div><!-- articleContent -->

							</div><!-- col -->

							<div class="col second">

								<div class="articleContent">

									<?php echo formatContent($media_engagement[$x]["text"]);?>

								</div><!-- articleContent -->

							</div><!-- col -->


							<div class="col third">

								<div class="articleContent">

									<?php echo formatContent($internal_external_communications[$x]["text"]);?>

								</div><!-- articleContent -->

							</div><!-- col -->

						</div><!-- row -->

						<?php

						}

						?>

					</div><!-- data -->

          <div class="data mobile">

            <div class="col">

              <div class="row headings">Community & Public Engagement</div>

              <div class="row subheadings">Specific Objectives</div>

              <?php

              for($x = 0; $x < $row_length; $x++) {

              ?>
              <div class="row">

                <div class="articleContent">

	                <?php echo formatContent($community_public_engagement[$x]["text"]);?>

                </div><!-- articleContent -->

              </div>
              <?php

              }

              ?>

            </div><!-- col -->

            <div class="col">

              <div class="row headings">Media Engagement</div>

              <div class="row subheadings">Specific Objectives</div>

	            <?php

	            for($x = 0; $x < $row_length; $x++) {

		            ?>
                  <div class="row">

                    <div class="articleContent">

			            <?php echo formatContent($media_engagement[$x]["text"]);?>

                    </div><!-- articleContent -->

                  </div>
		            <?php

	            }

	            ?>

            </div><!-- col -->

            <div class="col">

              <div class="row headings">Internal & External Communications</div>

              <div class="row subheadings">Specific Objectives</div>

	            <?php

	            for($x = 0; $x < $row_length; $x++) {

		            ?>
                  <div class="row">

                    <div class="articleContent">

			            <?php echo formatContent($internal_external_communications[$x]["text"]);?>

                    </div><!-- articleContent -->

                  </div>
		            <?php

	            }

	            ?>

            </div><!-- col -->


            <div class="clear"></div>


          </div>

          <div class="bottom">

						<span class="arrow leftarrow"></span>

						<span class="text">Monitoring and Evaluation</span>

						<span class="arrow rightarrow"></span>

					</div><!-- bottom -->

				</div><!-- container -->

			</div><!-- objectives -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

endwhile; endif;


get_footer();

?>