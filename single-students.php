<?php

get_header();

if(have_posts()) : while(have_posts()) : the_post();
	global $post;


	$feat_image = get_field("image");
	$feat_image = ($feat_image) ? $feat_image : get_bloginfo("template_url")."/library/img/no-image-small.png";

	//$image = (get_field("image")) ? get_field("image") : get_bloginfo("template_url")."/library/img/training/no-avatar.png";
	//$feat_image = mThumbImage($feat_image, 400, 350);


	$education = get_field("education");
	$founded_by = get_field("founded_by");
	$email = get_field("email");



	?>

	<div id="hero" class="single alternate alt1">

		<div class="wrapper">

			<div class="caption">

				<span class="sub">Student</span>

				<h2><?php the_title();?></h2>

				<?php if($education):?>
					<div class="education">
						<?php echo formatContent($education);?>
					</div><!-- education -->
				<?php endif;?>

			</div><!-- caption -->

		</div><!-- wrapper -->

	</div><!-- hero -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main news single">

			<div class="details">

				<div class="container l0">

					<aside class="left">

						<a href="<?php bloginfo("url");?>/training/" class="backTo">

							<span class="arrow"></span>
							<span class="text">Back to Training</span>

						</a>

						<div class="featuredImage">

							<img src="<?php echo mThumbImage($feat_image, 410, 351);?>" alt=""/>

						</div><!-- image -->

						<div class="meta">

							<?php if($founded_by):?>
								<div class="bottom">

									<p>Funded by: <br/><?php echo $founded_by;?></p>

								</div><!-- bottom -->
							<?php endif;?>

							<span class="date">Email: <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></span>

						</div><!-- meta -->


					</aside>


					<div class="right info">

						<?php if($intro_paragraph):?>
							<div class="description">

								<?php echo formatContent($intro_paragraph);?>

							</div><!-- $description -->
						<?php endif;?>

						<div class="articleContent">

							<?php the_content();?>

						</div><!-- article content -->

					</div><!-- info -->

					<div class="clear"></div>

				</div><!-- container -->

			</div><!-- details -->

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php

endwhile; endif;


get_footer();

?>