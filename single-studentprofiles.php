<?php

get_header();

if(have_posts()) : while(have_posts()) : the_post();
  global $post;


	$feat_image = get_field("student_photo");
	$feat_image = ($feat_image) ? $feat_image : get_bloginfo("template_url")."/library/img/no-image-small.png";

	?>

  <div id="hero" class="single alternate alt1">

    <div class="wrapper">

      <div class="caption">

        <span class="sub"> <?= ucfirst(get_field("student_research_group")) ?></span>

        <h2><?php the_title(); ?></h2>

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

              <img src="<?= mThumbImage($feat_image, 410, 351);?>" alt=""/>

            </div><!-- image -->

            <div class="meta">

              <span class="category"><?= ucfirst(get_field('student_academic_level')) . ' Student' ?></span>
              <br>
              <span class="icon email"></span>
              <span class="date"><?= get_field('student_email'); ?></span><br>
              <span class="icon location"></span>
              <span class="date"><?= get_field('student_location'); ?></span>
            </div><!-- meta -->


          </aside>

          <div class="right info">
            <div class="articleContent">
              <h3>Overview</h3>
  			        <?= get_field("student_about"); ?>
                <hr>
              <h3>Projects</h3>
                <?= get_field('student_projects'); ?>
            </div><!-- article content -->

          </div><!-- info -->

          <div class="clear"></div>

        </div><!-- container -->

      </div><!-- details -->

      <div class="related">

        <div class="container l0">

          <h2>Some Student's Profiles</h2>

          <div class="list">

	          <?php

	          $args = array(
		          "post_type" => "student-profiles",
              "post_status" => "publish",
		          "posts_per_page" => 5,
              "orderby" => "rand",
	          );

	          $news = new WP_Query($args);

	          if($news->have_posts()):
              while($news->have_posts()):
                
                $news->the_post();
                
               /* if (the_title()==the_title())
                  continue;*/

		            $featured_image = get_field("student_photo");
                $featured_image = ($featured_image) ? $featured_image : get_bloginfo("template_url")."/library/img/no-image-small.png";

		        ?>
              
                  <article class="post">

                    <div class="image">

                      <a href="<?php the_permalink();?>">

                        <img src="<?= mThumbImage($featured_image, 205, 175);?>" alt="<?php the_title();?>"/>

                      </a>

                    </div><!-- image -->

                    <div class="info">

                      <div class="meta">

                        <span class="category"><?= ucfirst(get_field("student_academic_level"));?></span>
                        <span class="separator"></span>
                        <span class="date"><?= get_the_date("d F, Y");?></span>

                      </div><!-- meta -->

                      <p><a href="<?php the_permalink();?>"><?php the_title(); ?></a></p>

                      <a href="<?php the_permalink();?>" class="button pink">

                        <span class="arrow"></span>

                        <span class="text">View profile</span>

                      </a>

                    </div><!-- info -->
                  </article>

		        <?php

	          endwhile;
          
          endif;

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