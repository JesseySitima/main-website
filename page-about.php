<?php

/*
  Template Name: About
*/

get_header();

if(have_posts()) : while(have_posts()) : the_post();

	$hero_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$hero_caption = nl2br(get_field("caption"));

	$video_link = get_field("video_link");
	$video_image = (get_field("video_image")) ? get_field("video_image") : get_bloginfo("template_url")."/library/img/about/video.jpg";

	$governance = get_field("governance");

	$achievements = get_field("achievements");
	$partners = get_field("partners");

	$partners1 = array_slice($partners, 0, (count($partners)/2));
	$partners2 = array_slice($partners, (count($partners)/2));



	?>

<div id="hero" class="about">

  <div class="bg parallaxed" data-parallax="scroll" data-image-src="<?php echo mThumbImage($hero_image, 1440, 900);?>"></div>

	<div class="wrapper">

		<div class="caption black">

      <h2><?php echo $hero_caption;?></h2>

    </div><!-- caption -->

	</div><!-- wrapper -->

	<div class="decal"></div>

</div><!-- hero -->


<div id="primary" class="content-area">
	<main id="main" class="site-main about">

		<div id="description" class="description">

			<div class="container">

				<div class="wrapper">

					<div class="details">

						<span class="sub">About us</span>

						<h3>MLW began by focusing on priority health issues in
							Malawi and cerebral malaria was selected as the first
							major challenge.
						</h3>

						<div class="articleContent">

              <?php the_content();?>

            </div><!-- article content -->

						<!--<img src="<?php bloginfo("template_url");?>/library/img/about/signature.svg" class="signature"/>-->

					</div><!-- details -->

          <?php if($video_link):?>
          <div class="video">

            <a href="<?php echo $video_link;?>" target="_blank" class="openVideo">

              <div class="image">

                <img src="<?php echo mThumbImage($video_image, 502, 452);?>"/>

              </div><!-- image -->

              <div class="controls">

                <span class="icon"></span>
                <span class="text">Play video</span>

              </div><!-- controls -->

            </a>


            <div class="videoWrapper">
              <div id="videoObject"></div>
            </div>

            <script>
                // load  api
                var tag = document.createElement('script');
                tag.src = "//www.youtube.com/iframe_api";
                var firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                // make player array
                var player;

                function onYouTubeIframeAPIReady() {
                    player = new YT.Player('videoObject', {
                        height: '350',
                        width: '700',
                        videoId: '<?php echo embed_youtube($video_link);?>'
                    });
                }

                jQuery("body").on("click", ".openVideo", function(){

                    jQuery(".video").addClass("open");

                    player.playVideo();

                    return false;

                });

            </script>

          </div><!-- video -->
        <?php else :?>
          <div class="video">

              <div class="image">

                <img src="<?php echo mThumbImage($video_image, 502, 452);?>"/>

              </div><!-- image -->

          </div><!-- video -->
        <?php endif;?>

					<div class="clear"></div>

				</div>

			</div><!-- end container -->

		</div><!-- description -->

    <div id="governance" class="governance">


      <div class="container">

        <div class="wrapper">

          <h2>Governance</h2>

          <div class="articleContent">

            <?php echo formatContent($governance);?>

          </div><!-- article content -->

        </div><!-- wrapper -->

      </div><!-- container -->

    </div><!-- governance -->

		<div id="achievements" class="achievements">

			<div class="container">

				<div class="wrapper">

					<h2>Some of Our Achievements</h2>

					<?php if($achievements):?>

					<div class="accordion">

              <?php


              $arr1 = array_slice($achievements, 0, (count($achievements)/2));
              $arr2 = array_slice($achievements, (count($achievements)/2));

              ?>

            <div class="col">

                <?php

                foreach ($arr2 as $achievement):

	                ?>

                  <div class="block" data-aos="fade-up" data-aos-offset="200">

                    <div class="outer">

                      <div class="wrap">

                        <div class="left">

                          <span class="icon"></span>

                          <span class="text"><?php echo $achievement["title"];?></span>

                        </div><!-- left -->

                        <span class="arrow"></span>

                        <div class="clear"></div>

                      </div><!-- wrap -->

                    </div><!-- outer -->

                    <div class="details">

                      <div class="inner">

		                  <?php echo $achievement["text"];?>

                      </div><!-- inner -->

                    </div><!-- details -->

                  </div><!-- block -->

	                <?php

                endforeach;

                ?>

            </div><!-- left -->

            <div class="col">

	            <?php

	            foreach ($arr1 as $achievement):

		            ?>

                  <div class="block" data-aos="fade-up" data-aos-offset="200">

                    <div class="outer">

                      <div class="wrap">

                        <div class="left">

                          <span class="icon"></span>

                          <span class="text"><?php echo $achievement["title"];?></span>

                        </div><!-- left -->

                        <span class="arrow"></span>

                        <div class="clear"></div>

                      </div><!-- wrap -->

                    </div><!-- outer -->

                    <div class="details">

                      <div class="inner">

			              <?php echo $achievement["text"];?>

                      </div><!-- inner -->

                    </div><!-- details -->

                  </div><!-- block -->

		            <?php

	            endforeach;

	            ?>


            </div><!-- right -->

            <?php

            endif;

            ?>

          </div><!-- accordion -->

				</div><!-- wrapper -->

			</div><!-- container -->

		</div><!-- achievements -->

		<div id="partners" class="partners">

			<div class="container">

				<div class="wrapper">

					<div class="details" data-aos="fade-up" data-aos-offset="200">

						<div class="inner">

							<h2>Partners</h2>

							<div class="intro">

								<p>The MLW Programme is a longstanding partnership between the College of Medicine, the Liverpool School of Tropical Medicine (LSTM) and the University of Liverpool (UoL) core-funded by the Wellcome Trust.</p>

								<p>Here is how we work with our various partners:</p>

							</div><!-- intro -->

							<div class="list">

                <div class="col">


	                <?php


	                foreach ($partners1 as $partner):

		                ?>

                      <div class="block" >

                        <div class="outer">

                          <div class="wrap">

                            <div class="left">

                              <span class="icon"></span>

                              <span class="text"><?php echo $partner["title"];?></span>

                            </div><!-- left -->

                            <img src="<?php echo $partner["logo"];?>" class="logo"/>


                            <div class="clear"></div>

                          </div><!-- wrap -->

                        </div><!-- outer -->

                        <div class="info">



                          <div class="inner">

			                  <?php echo $partner["text"];?>

			                  <?php if($partner["link"]):?>

                                <a href="<?php echo $partner["link"];?>" class="visit" target="_blank">visit website</a>

			                  <?php endif;?>

                          </div><!-- inner -->

                        </div><!-- details -->

                      </div><!-- block -->

		                <?php

	                endforeach;

	                ?>

                </div>

                <div class="col">


	                <?php


	                foreach ($partners2 as $partner):

		                ?>

                      <div class="block" >

                        <div class="outer">

                          <div class="wrap">

                            <div class="left">

                              <span class="icon"></span>

                              <span class="text"><?php echo $partner["title"];?></span>

                            </div><!-- left -->

                            <img src="<?php echo $partner["logo"];?>" class="logo"/>


                            <div class="clear"></div>

                          </div><!-- wrap -->

                        </div><!-- outer -->

                        <div class="info">



                          <div class="inner">

			                  <?php echo $partner["text"];?>

			                  <?php if($partner["link"]):?>

                                <a href="<?php echo $partner["link"];?>" class="visit" target="_blank">visit website</a>

			                  <?php endif;?>

                          </div><!-- inner -->

                        </div><!-- details -->

                      </div><!-- block -->

		                <?php

	                endforeach;

	                ?>

                </div>


							</div><!-- list -->

						</div><!-- inner -->

					</div><!-- details -->

					<div class="clear"></div>

				</div><!-- wrapper -->

			</div><!-- container -->

		</div><!-- partners -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php

endwhile; endif;


get_footer();

?>
