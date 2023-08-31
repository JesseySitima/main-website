<?php

/*
  Template Name: Science Communication
*/

get_header();

if(have_posts()) : while(have_posts()) : the_post();

	$intro = get_field("intro");
	$our_aim = get_field("aim");


	$internal_external_communications_story = get_field("internal_external_communications_story");
	$media_engagement_story = get_field("media_engagement_story");
	$community_engagement_story = get_field("community_engagement_story");

	$impact = get_field("impact");


	?>


	<div id="hero" class="science">

		<div class="wrapper">

      <div class="slider">

        <div id="scienceSlider">

          <div class="slide">
            <img src="<?php bloginfo("template_url");?>/library/img/science/slider/1-science.jpg"/>
          </div><!-- slide -->

          <div class="slide">
            <img src="<?php bloginfo("template_url");?>/library/img/science/slider/2-science.jpg"/>
          </div><!-- slide -->

          <div class="slide">
            <img src="<?php bloginfo("template_url");?>/library/img/science/slider/3-science.jpg"/>
          </div><!-- slide -->

          <div class="slide">
            <img src="<?php bloginfo("template_url");?>/library/img/science/slider/4-science.jpg"/>
          </div><!-- slide -->

          <div class="slide">
            <img src="<?php bloginfo("template_url");?>/library/img/science/slider/5-science.jpg"/>
          </div><!-- slide -->

          <div class="slide">
            <img src="<?php bloginfo("template_url");?>/library/img/science/slider/6-science.jpg"/>
          </div><!-- slide -->

        </div><!-- operations slider -->

      </div><!-- slider -->

			<div class="caption">

				<h2>Science Communication</h2>

			</div><!-- caption -->

		</div><!-- wrapper -->

		<div class="decal"></div>

	</div><!-- hero -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main science">

			<div class="about">

				<div class="container l3">

					<div class="wrapper">

						<h3>We exist to</h3>

						<?php if($intro):?>
							<div class="intro">

								<?php echo formatContent($intro);?>

							</div><!-- intro -->
						<?php endif;?>

						<div class="articleContent ">

							<?php the_content();?>

						</div><!-- support -->

					</div><!-- wrapper -->

				</div><!-- end container -->

			</div><!-- about -->

			<div class="aim">

				<div class="bg">

					<div class="container l3"></div><!-- container -->

					<div class="overflow"></div>

				</div><!-- bg -->

				<div class="wrapper">

					<div class="container">

						<div class="image">

							<img src="<?php echo mThumbImage($our_aim[0]["image"], 566, 467);?>"/>

						</div><!-- image -->

						<div class="details">

							<div class="inner">

								<div class="title">

									<h3>Our aim</h3>

								</div><!-- title -->

								<div class="articleContent">

									<p class="first"><?php echo $our_aim[0]["intro"];?></p>

									<?php echo formatContent($our_aim[0]["text"]);?>

								</div><!-- article content -->

							</div><!-- inner -->

						</div><!-- details -->


						<div class="clear"></div>

					</div><!-- container -->

				</div><!-- container -->

			</div><!-- aim -->

			<div class="stories">

				<h2>Our Impact Stories</h2>

				<div class="links">

					<a href="" data-tab="communications">Internal and External Communications</a>
					<a href="" data-tab="media" class="current">Media Engagement</a>
					<a href="" data-tab="community">Community Engagement</a>

				</div><!-- links -->

				<div class="tabs">

					<div class="container l1">


						<div class="tab communications">

							<div class="image">

								<img src="<?php echo mThumbImage($internal_external_communications_story[0]["image"], 120, 120);?>"/>

							</div><!-- image -->

							<div class="details">

								<div class="block description">

									<div class="articleContent">

										<?php echo formatContent($internal_external_communications_story[0]["description"]);?>

									</div>

								</div><!-- description -->

								<div class="block objectives">

									<h3>Objectives of Internal and External Communication</h3>

									<div class="articleContent">

										<?php echo formatContent($internal_external_communications_story[0]["objectives"]);?>

									</div>

								</div><!-- description -->

								<div class="block activities">

									<h3>Some of the Activities</h3>

									<div class="articleContent">

										<?php echo formatContent($internal_external_communications_story[0]["activities"]);?>

									</div>

								</div><!-- description -->

							</div><!-- details -->

							<div class="clear"></div>

						</div><!-- tab -->

						<div class="tab media current">

							<div class="image">

								<img src="<?php echo mThumbImage($media_engagement_story[0]["image"], 120, 120);?>"/>

							</div><!-- image -->

							<div class="details">

								<div class="block description">

									<div class="articleContent">

										<?php echo formatContent($media_engagement_story[0]["description"]);?>

									</div>

								</div><!-- description -->

								<div class="block objectives">

									<h3>Objectives of Media Engagement</h3>

									<div class="articleContent">

										<?php echo formatContent($media_engagement_story[0]["objectives"]);?>

									</div>

								</div><!-- description -->

								<div class="block activities">

									<h3>Some of the Activities</h3>

									<div class="articleContent">

										<?php echo formatContent($media_engagement_story[0]["activities"]);?>

									</div>

								</div><!-- description -->

							</div><!-- details -->

							<div class="clear"></div>

						</div><!-- tab -->

						<div class="tab community">

							<div class="image">

								<img src="<?php echo mThumbImage($community_engagement_story[0]["image"], 120, 120);?>"/>

							</div><!-- image -->

							<div class="details">

								<div class="block description">

									<div class="articleContent">

										<?php echo formatContent($community_engagement_story[0]["description"]);?>

									</div>

								</div><!-- description -->

								<div class="block objectives">

									<h3>Objectives of Community Engagement</h3>

									<div class="articleContent">

										<?php echo formatContent($community_engagement_story[0]["objectives"]);?>

									</div>

								</div><!-- description -->

								<div class="block activities">

									<h3>Some of the Activities</h3>

									<div class="articleContent">

										<?php echo formatContent($community_engagement_story[0]["activities"]);?>

									</div>

								</div><!-- description -->

							</div><!-- details -->

							<div class="clear"></div>

						</div><!-- tab -->



					</div><!-- container -->

				</div><!-- tabs -->

			</div><!-- stories -->

      <?php

      if($impact) {

        $image = $impact[0]["image"];

      ?>

      <div class="impact">

        <div class="bg"></div>

        <div class="wrapper">

          <div class="container">

            <div class="image">

              <img src="<?php echo $image;?>" alt=""/>

            </div><!-- image -->

            <div class="details">

              <div class="inner">

                <div class="title">

                  <h3><?php echo $impact[0]["title"];?></h3>

                </div><!-- title -->

                <div class="articleContent">

                  <?php if($impact[0]["intro"]):?>
                  <p class="first"><?php echo $impact[0]["intro"];?></p>
                  <?php endif;?>

                  <?php echo formatContent($impact[0]["details"]);?>

                </div><!-- article content -->

              </div><!-- inner -->

            </div><!-- details -->


            <div class="clear"></div>

          </div><!-- container -->

        </div><!-- container -->

      </div><!-- impact -->

      <?php

      }

        ?>

      <?php if(1 == 2)://REMOVED BY CLIENT?>
      <div class="findings">

        <div class="container l3">

          <div class="main">

            <span class="title">The main findings include</span>

            <p>7847 SMS messages as well as Facebook comments were received. 397 calls were received of which 80% were from men. Most messages came from people aged between 26 and 40.   </p>

          </div><!-- main -->

          <div class="example">

            <div class="wrapper right">

              <div class="articleContent">

                <p><strong>Example 2:</strong>  We have conducted process evaluation throughout the implementation of the Samala Moyo Exhibition project using mixed methods including Focus Group Discussions, In-depth Interviews for both students and communities and used games after permanent exhibition tours. </p>

                <ul>

                  <li>The exposure to the health research environment at MLW by students is enough to inspire students to like science careers. “At first I wanted to be a soldier but now after my visit here at MLW I have changed my mind, I want to be a doctor, I will work hard in subjects like Biology, Mathematics and physical science” (Internship program -Anonymous)</li>

                </ul>

              </div><!-- articleContent -->

            </div><!-- wrapper -->

            <div class="clear"></div>

          </div><!-- example -->

          <div class="profiles">

            <div class="container l1">

              <div class="profile">

                <div class="image">

                  <img src="<?php echo mThumbImage(get_bloginfo("template_url")."/library/img/science/regina.png", 120, 120);?>"/>

                </div><!-- image -->

                <div class="details">

                  <div class="articleContent">

                    <p>Lead – <strong>Regina Geraldine Makwinja</strong> (Monitoring and Evaluation Coordinator) has a Bachelor’s Degree in Social Science with 7 years’ post graduate work experience in M&E. Regina has been instrumental in the development of an M&E strategy for Science Communication and has implemented M&E activities for the radio and exhibition projects using novel mixed methods.</p>

                  </div><!-- article content -->

                </div><!-- details -->

                <div class="clear"></div>

              </div><!-- profile -->

              <div class="profile leadership">

                <div class="image">

                  <img src="<?php echo mThumbImage(get_bloginfo("template_url")."/library/img/science/regina.png", 120, 120);?>"/>

                </div><!-- image -->

                <div class="details">

                  <h3>Leadership</h3>

                  <div class="articleContent">

                    <p><strong>Tamara Chipasula Makawa</strong> is the Head of Operations (Infrastructure and communication). She provides strategic leadership and oversight over several operations departments (Communication, Facilities, Field Sites and Health and Safety). </p>

                    <p>Her office ensures that the right processes and procedures are established within the four departments, risks are managed, quality promoted and good financial planning is adhered to in collaboration with the respective heads of departments. <br/>She has an MBA with a merit from the University of Essex UK, a Masters in Communication from the University of Essex in UK and a Bachelor’s degree in Communication from Nelson Mandela Metropolitan University in South Africa.</p>

                    <p>She has served for 10 years at MLW, initially establishing the Science Communication department and successfully building a grant portfolio of approximately GBP350, 000 for science communication work and later joining the Operations team working alongside the COO’s office to provide oversight of operations.  Tamara is a member of the MLW Senior Management Team. </p>

                  </div><!-- article content -->

                </div><!-- details -->

                <div class="clear"></div>

              </div><!-- profile -->



            </div><!-- container -->

          </div><!-- profiles -->

        </div><!-- container -->

      </div><!-- findings -->
        <?php endif;?>


		</main><!-- #main -->
	</div><!-- #primary -->

	<?php

endwhile; endif;


get_footer();

?>