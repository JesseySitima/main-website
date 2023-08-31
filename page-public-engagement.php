<?php

/*
  Template Name: Public Engagement
*/

get_header();


if(have_posts()) : while(have_posts()) : the_post();


	$hero_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

	$about_image = get_field("image");

	$intro = get_field("intro");
	$slider = get_field("slider");
	$collaborators = get_field("collaborators");

?>

	<div id="hero" class="engagement" >

		<div class="bg parallaxed" data-parallax="scroll" data-image-src="<?php echo mThumbImage($hero_image, 1440, 900);?>"></div>

		<div class="wrapper">

			<div class="caption">

				<h2>Science Communication <br/>Department was established in <br/>2008 with an initial specific objective <br/>of championing PR for MLW.</h2>

			</div><!-- caption -->

		</div><!-- wrapper -->

		<div class="decal"></div>

	</div><!-- hero -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main engagement">

        <div class="about">

          <div class="container l0">

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

            <div class="image">

              <img src="<?php echo mThumbImage($about_image, 502, 452);?>"/>

            </div><!-- image -->

            <div class="clear"></div>

          </div><!-- end container -->

        </div><!-- about -->

        <div class="vision">

          <div class="bg"></div>

          <div id="visionSlider">

              <?php

              foreach ($slider as $slide) {

                  ?>

                  <div class="slide">

                      <div class="image">

                        <img src="<?php echo mThumbImage($slide["image"], 515, 467);?>" alt=""/>

                      </div><!-- image -->

                      <div class="details">

                          <div class="inner">

                              <div class="title">

                                  <h3><?php echo $slide["heading"]; ?></h3>

                              </div><!-- title -->

                              <div class="articleContent">

                                  <p class="first"><?php echo $slide["intro"]; ?></p>

                                  <?php echo formatContent($slide["text"]); ?>

                              </div><!-- articleContent -->

                          </div><!-- inner -->

                      </div><!-- details -->

                      <div class="clear"></div>

                  </div><!-- slide -->

                  <?php

              }

              ?>

          </div><!-- vision slider -->

        </div><!-- vision -->

        <div class="breaker">

          <div class="container">

            <div class="bg"></div>

            <div class="wrapper">

              <h3>The initial Science Communication <br/>Strategy was developed in 2008 after a <br/>situation analysis was undertaken. </h3>

              <a href="<?php bloginfo("url");?>/public-engagement/strategy/" class="button white">

                <span class="arrow"></span>

                <span class="text">View Strategy</span>

              </a>

            </div><!-- wrapper -->

          </div><!-- container -->

        </div><!-- breaker -->

        <div id="partners" class="partners">

          <div class="container l0">

            <div class="right wrapper">

              <h3>Partners and Collaborators</h3>

              <div class="intro">

                <p>Collaborations with our local and international partners are integral to our success.</p>

              </div><!-- intro -->

              <?php if($collaborators):?>
              <div class="collaborators">

                <div class="logos">

                  <div class="list">

	                  <?php

	                  $count = 1;
	                  foreach ($collaborators as $collaborator):

		                  ?>
                        <img src="<?php echo $collaborator["logo"];?>" data-id="col<?php echo $count;?>" class="<?php if($count == 1):?>current<?php endif;?>"/>
		                  <?php
		                  $count++;

	                  endforeach;

	                  ?>

                  </div>

                </div><!-- logos -->

	              <?php

	              $count = 1;
	              foreach ($collaborators as $collaborator):

		              ?>
                  <div class="description col<?php echo $count;?> <?php if($count == 1):?>current<?php endif;?>">

                    <h4><?php echo $collaborator["name"];?></h4>

                    <p><?php echo $collaborator["short_description"];?></p>

                  </div><!-- description -->
		              <?php
		              $count++;

	              endforeach;

	              ?>

              </div><!-- collaborations -->


              <?php endif;?>

              <div class="international">

                <div class="image">

                  <img src="<?php bloginfo("template_url");?>/library/img/engagement/ethox_logo.png" alt="International Partners"/>

                </div><!-- image -->

                <div class="description">

                  <h4>International Partnerships</h4>

                  <p>Global Health Bioethics Network, funded through a Wellcome Trust Strategic Award and supporting ethics practice and research across the MOPs.  GHBN supports a PhD project on the Purpose, Relevance and Benefits of Community Engagement (Deborah Nyirenda) and a postdoctoral position (Kate Gooding, Behaviour and Health Group).</p>

                </div><!-- description -->

                <div class="clear"></div>

              </div><!-- mbc -->

            </div><!-- wrapper -->

            <div class="clear"></div>

          </div><!-- container -->

        </div><!-- partners -->


		</main><!-- #main -->
	</div><!-- #primary -->

<?php

endwhile; endif;


get_footer();

?>

