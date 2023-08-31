<?php

/*
  Template Name: Welcome
*/

get_header();

if(have_posts()) : while(have_posts()) : the_post();

	$hero_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

	$hero_caption = nl2br(get_field("caption"));


	$slider = get_field("slider");

$looking_for = get_field("looking_for");

$operational_support = get_field("operational_support");



?>

<div id="hero" class="home">

  <div class="bg parallaxed" data-parallax="scroll" data-image-src="<?php echo mThumbImage($hero_image, 1440, 900);?>"></div>

	<div class="wrapper">

		<div class="caption">

			<h2><?php echo $hero_caption;?></h2>

		</div><!-- caption -->

	</div><!-- wrapper -->

  <div class="decal"></div>

</div><!-- hero -->

  <div id="primary" class="content-area">
    <main id="main" class="site-main home">

      <div class="about">

        <div class="container">

            <div class="bg"></div>

            <?php if(1 == 2):?>
            <div id="introSlider">

	            <?php

	            foreach ($slider as $slide) {

		            ?>

                  <div class="slide">

                    <div class="details">

                        <div class="title">

                          <h3><?php echo $slide["title"]; ?></h3>

                        </div><!-- title -->

                        <div class="articleContent">

				            <?php echo formatContent($slide["text"]); ?>

                        </div><!-- articleContent -->

                        <a href="<?php echo $slide["learn_more_link"]; ?>" class="button red">

                          <span class="arrow"></span>

                          <span class="text">Learn More</span>

                        </a>

                    </div><!-- details -->

                    <div class="image">

                      <img src="<?php echo mThumbImage($slide["image"], 515, 467);?>" alt=""/>

                    </div><!-- image -->



                    <div class="clear"></div>

                  </div><!-- slide -->

		            <?php

	            }

	            ?>

            </div><!-- intro slider -->
            <?php endif;?>

            <div class="wrapper">

              <div class="details">

                <div class="title">

                  <h3>MLW is built around excellent laboratories, strategically located in the largest hospital in Malawi, Queen Elizabeth Central Hospital</h3>

                </div><!-- title -->

                <div class="articleContent">

                  <p>It is closely linked with the community and is an integral part of the College of Medicine. These relationships provide a unique opportunity replicated in few centres in Africa to study major health issues spanning both community and hospital.</p>

                </div><!-- articleContent -->

                <a href="<?php bloginfo("url");?>/about/" class="button red">

                  <span class="arrow"></span>

                  <span class="text">Learn More</span>

                </a>

                <a href="<?php bloginfo("url");?>/researchgroups/" class="button red">

                  <span class="arrow"></span>

                  <span class="text">Our Research</span>

                </a>

                <a href="<?php bloginfo("url");?>/training/" class="button red">

                  <span class="arrow"></span>

                  <span class="text">Training</span>

                </a>

              </div><!-- details -->

              <div class="imageSlider">

                <div class="slider">

	                <?php

	                foreach ($slider as $slide) {

	                ?>
                    <div class="image">

                      <img src="<?php echo mThumbImage($slide["image"], 515, 467);?>" alt=""/>

                    </div><!-- image -->
                  <?php

                  }

                  ?>



                </div><!-- slider -->

              </div><!-- image slider -->

              <div class="clear"></div>

            </div><!-- wrapper -->


        </div><!-- end container -->

      </div><!-- intro -->

      <div class="breaker">

        <div class="container">

          <div class="bg"></div>

          <div class="wrapper">

            <h3>We conduct impeccable research <br/>that lead to measurable results</h3>

            <a href="<?php bloginfo("url");?>" class="button white">

              <span class="arrow"></span>

              <span class="text">View Research</span>

            </a>

          </div><!-- wrapper -->

        </div><!-- container -->

      </div><!-- breaker -->

      <div class="information">

        <div class="container">

          <div class="wrapper">

            <h3>Looking for something <br/>in particular?</h3>

            <div class="list">

              <ul>

                <li>

                  <a href="<?php echo $looking_for[0]["link_to"];?>"><?php echo $looking_for[0]["link_text"];?></a>

                </li>

                <li>

                  <a href="<?php echo $looking_for[1]["link_to"];?>"><?php echo $looking_for[1]["link_text"];?></a>

                </li>

                <li>

                  <a href="<?php echo $looking_for[2]["link_to"];?>"><?php echo $looking_for[2]["link_text"];?></a>

                </li>

              </ul>

            </div><!-- list -->

            <div class="clear"></div>

          </div><!-- wrapper -->

        </div><!-- container -->

      </div><!-- info -->

      <div class="support">

        <div class="container l0">

          <div class="bg"></div>

          <div class="wrapper">

            <div class="details">

              <h3><?php echo $operational_support[0]["title"];?></h3>

              <p><?php echo $operational_support[0]["short_description"];?></p>

              <a href="<?php echo $operational_support[0]["link"];?>" class="button red">

                <span class="arrow"></span>

                <span class="text">Learn More</span>

              </a>

            </div><!-- details -->

            <div class="image">

              <img src="<?php echo $operational_support[0]["image"];?>" alt="Operational Support"/>

            </div><!-- image -->

            <div class="clear"></div>

          </div><!-- wrapper -->

        </div><!-- container -->

      </div><!-- support -->

      <div class="news">

        <div class="container l0">

          <h2>News</h2>

          <div class="wrapper">

            <div class="list">

	            <?php

              $args = array(
                  "post_type" => "post",
                  "post_status" => "publish",
                  "posts_per_page" => 3
              );

              $news = new WP_Query($args);

	            if($news->have_posts()) : while($news->have_posts()) : $news->the_post();

		            $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	              $featured_image = ($featured_image) ? $featured_image : get_bloginfo("template_url")."/library/img/no-image-small.png";


	              $type = get_field("type");

		            ?>

                  <article class="post">

                    <div class="image">

                      <a href="<?php the_permalink();?>">

                        <img src="<?php echo mThumbImage($featured_image, 410, 350);?>" alt="<?php the_title();?>"/>

                      </a>
                    </div><!-- image -->

                    <div class="info">

                      <div class="meta">

                        <span class="category"><?php echo $type;?></span>
                        <span class="separator"></span>
                        <span class="date"><?php echo get_the_date("d F Y");?></span>

                      </div><!-- meta -->

                      <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>

                      <a href="<?php the_permalink();?>" class="button pink">

                        <span class="arrow"></span>

                        <span class="text">Read More</span>

                      </a>

                    </div><!-- info -->


                  </article>

		            <?php

	            endwhile; endif;

	            ?>

              <div class="clear"></div>

            </div><!-- list -->

          </div><!-- wrapper -->

        </div><!-- container -->

      </div><!-- news -->

    </main><!-- #main -->

  </div><!-- #primary -->


	<?php

endwhile; endif;


get_footer();

?>


