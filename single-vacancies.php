<?php

/*
  Template Name: Default Page
*/

get_header();

if(have_posts()) : while(have_posts()) : the_post();

	$location = get_field("location");
	$type = get_field("type");

	$link = get_field("link");

	$job_description = get_field("job_description");
	$responsibilities = get_field("responsibilities");
	$requirements = get_field("requirements");

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
		<main id="main" class="site-main vacanciesdetail">

			<div class="container l0">

				<a href="<?php bloginfo("url");?>/careers/" class="backTo">

					<span class="arrow"></span>
					<span class="text">Back</span>

				</a>

				<div class="wrapper">

					<div class="asideanchor"></div>

          <div class="asidespacer"></div>

					<aside>

            <div class="inner">

              <h2><?php the_title();?></h2>

              <ul class="meta">

	              <?php if($location):?>
                    <li>

                      <span class="icon location"></span>
                      <span class="text"><?php echo $location;?></span>

                    </li>
	              <?php endif;?>

	              <?php if($type):?>
                    <li>

                      <span class="icon type"></span>
                      <span class="text"><?php echo $type;?></span>

                    </li>
	              <?php endif;?>

              </ul>

            </div><!-- inner -->

            <div class="actions">

              <a href="<?php the_permalink();?>" class="button red apply">

                <span class="arrow"></span>

                <span class="text">Apply</span>

              </a>

            </div>

					</aside>

					<div class="details">

						<div class="block">

							<div class="title">

								<h3>Job Description</h3>

							</div><!-- title -->

              <div class="articleContent">

				        <?php echo formatContent($job_description);?>

              </div><!-- articleContent -->


						</div><!-- block -->

            <div class="block">

              <div class="title">

                <h3>Responsibilities</h3>

              </div><!-- title -->

              <div class="articleContent">

	              <?php echo formatContent($responsibilities);?>

              </div><!-- articleContent -->



            </div><!-- block -->

            <div class="block">

              <div class="title">

                <h3>Requirements</h3>

              </div><!-- title -->

              <div class="articleContent">

	              <?php echo formatContent($requirements);?>

              </div><!-- articleContent -->

            </div><!-- block -->

            <div class="bottom">

              <span class="date">Posted on <?php echo get_the_date("M d, Y");?></span>

            </div><!-- bottom -->


					</div><!-- details -->

					<div class="clear"></div>

          <div class="bottomanchor"></div>

				</div><!-- wrapper -->

			</div><!-- end container -->

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php

endwhile; endif;


get_footer();

?>
