<?php

get_header();

if(have_posts()) : while(have_posts()) : the_post();
  global $post;


	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$feat_image = ($feat_image) ? $feat_image : get_bloginfo("template_url")."/library/img/no-image-small.png";


	$type = get_field("type");

	$intro_paragraph = get_field("intro_paragraph");

	?>

  <div id="hero" class="single alternate alt1">

    <div class="wrapper">

      <div class="caption">

        <span class="sub">News & Events</span>

        <h2><?php the_title();?></h2>

      </div><!-- caption -->

    </div><!-- wrapper -->

  </div><!-- hero -->

  <div id="primary" class="content-area">
    <main id="main" class="site-main news single">

      <div class="details">

        <div class="container l0">

          <aside class="left">

            <a href="<?php bloginfo("url");?>/news-events/" class="backTo">

              <span class="arrow"></span>
              <span class="text">Back to News & Events</span>

            </a>

            <div class="featuredImage">

              <img src="<?php echo mThumbImage($feat_image, 410, 351);?>" alt=""/>

            </div><!-- image -->

            <div class="meta">

              <span class="category"><?php echo $type;?></span>
              <span class="separator"></span>
              <span class="date"><?php echo get_the_date("d F Y");?></span>

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

      <div class="related">

        <div class="container l0">

          <h2>Related News</h2>

          <div class="list">

	          <?php

	          $args = array(
		          "post_type" => "post",
		          "post_status" => "publish",
		          "posts_per_page" => 3,
              "orderby" => "rand",
	            "category__in" => wp_get_post_categories($post->ID)
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

	          wp_reset_query();

	          ?>

            <div class="clear"></div>

          </div><!-- list -->

        </div><!-- container -->

      </div><!-- related -->

    </main><!-- #main -->
  </div><!-- #primary -->

	<?php

endwhile; endif;


get_footer();

?>