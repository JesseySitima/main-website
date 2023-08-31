<?php

/*
  Template Name: Training
*/

get_header();

if(have_posts()) : while(have_posts()) : the_post();

	$hero_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$hero_caption = nl2br(get_field("caption"));


	$intro = get_field("intro");
    $overview = get_field("overview");

?>

    <div id="hero" class="training">

      <div class="bg parallaxed" data-parallax="scroll" data-image-src="<?php echo mThumbImage($hero_image, 1440, 900);?>"></div>

        <div class="wrapper">

            <div class="caption">

              <h2><?php echo $hero_caption;?></h2>

            </div><!-- caption -->

        </div><!-- wrapper -->

        <div class="decal"></div>

    </div><!-- hero -->

    <div id="primary" class="content-area">
        <main id="main" class="site-main training">

            <div class="overview">

                <div class="container l0">

                    <div class="right wrapper">

                        <h2>Training at MLW</h2>

                        <?php if($intro):?>
                        <div class="intro">

                            <?php echo formatContent($intro);?>

                        </div><!-- intro -->
                        <?php endif;?>

                        <div class="articleContent">

                            <?php the_content();?>

                        </div><!-- article content -->

                        <h3>Current training opportunities</h3>

                        <?php if($overview):?>

                            <div class="accordion">

                                <?php

                                $count = 1;
                                foreach ($overview as $item):

                                    ?>

                                    <div class="block" data-aos="fade-up" data-aos-offset="200">

                                        <div class="outer">

                                            <div class="wrap">

                                                <div class="left">

                                                    <span class="icon"><?php echo sprintf("%02d", $count);?></span>

                                                    <span class="text"><?php echo $item["title"];?></span>

                                                </div><!-- left -->

                                                <span class="arrow"></span>

                                                <div class="clear"></div>

                                            </div><!-- wrap -->

                                        </div><!-- outer -->

                                        <div class="details">

                                            <div class="inner">

                                                <?php echo $item["text"];?>

                                            </div><!-- inner -->

                                        </div><!-- details -->

                                    </div><!-- block -->

                                    <?php

                                $count++;

                                endforeach;

                                ?>


                            </div><!-- accordion -->

                        <?php endif;?>

                    </div><!-- wrapper -->

                    <div class="clear"></div>

                </div><!-- container -->

            </div><!-- overview -->

            <div class="opportunities">

                <div class="container l1">

                    <h2>Research Training Opportunities</h2>

                    <div id="operations-funding" class="opportunity">

                        <div class="title">

                            <h3>Operations Funding <br/>Opportunities</h3>

                        </div><!-- title -->

                        <div class="blocks">

                            <div class="block" data-aos="fade-up" data-aos-offset="200">

                                <div class="wrap">

                                    <span class="number">01.</span>

                                    <div class="info">

                                        <div class="inner">

                                            <h4>Diploma courses</h4>

                                            <p>Funding for a maximum of 20 diplomas are included in departmental training plans, with Head of Department as budget holder.</p>

                                        </div><!-- inner -->

                                    </div><!-- info -->

                                </div><!-- inner -->

                            </div><!-- block -->

                            <div class="block long" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50">

                                <div class="wrap">

                                    <span class="number">02.</span>

                                    <div class="info">

                                        <div class="inner">

                                            <h4>Bachelor and master’s degree</h4>

                                            <p>Calls for applications to support bachelor and master’s degrees will be put out for applicants to compete through a centralized screening process. Total funding of £30k for 5 Bachelors courses and £75k for 5 Masters courses has been set aside for these courses.</p>

                                        </div><!-- inner -->

                                        <div class="overflow"></div>

                                    </div><!-- info -->

                                </div><!-- inner -->

                            </div><!-- block -->

                        </div><!-- blocks -->

                    </div><!-- opportunity -->

                    <div id="crosscutting" class="opportunity">

                        <div class="title">

                            <h3>Crosscutting <br/>Opportunities </h3>

                        </div><!-- title -->

                        <div class="blocks">

                            <div class="block" data-aos="fade-up" data-aos-offset="200">

                                <div class="wrap">

                                    <span class="number">01.</span>

                                    <div class="info">

                                        <div class="inner">

                                            <h4>Leadership and Management Training</h4>

                                            <p>Individuals from both operations and research can apply for participation in these courses run by experienced external development experts twice a year for the next 3 years.</p>

                                        </div><!-- inner -->

                                    </div><!-- info -->

                                </div><!-- inner -->

                            </div><!-- block -->

                            <div class="block" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50">

                                <div class="wrap">

                                    <span class="number">02.</span>

                                    <div class="info">

                                        <div class="inner">

                                            <h4>General Courses</h4>

                                            <p>Short cross cutting courses held centrally are offered to both academic and operational staff.</p>

                                        </div><!-- inner -->

                                    </div><!-- info -->

                                </div><!-- inner -->

                            </div><!-- block -->

                            <div class="block" data-aos="fade-up" data-aos-offset="200" data-aos-delay="100">

                                <div class="wrap">

                                    <span class="number">03.</span>

                                    <div class="info">

                                        <div class="inner">

                                            <h4>Emergent short courses</h4>

                                            <p>Applications for funding on emergent short courses are made to the training committee and individual applications are reviewed and funded after approval.</p>

                                        </div><!-- inner -->

                                    </div><!-- info -->

                                </div><!-- inner -->

                            </div><!-- block -->


                        </div><!-- blocks -->

                    </div><!-- opportunity -->



                </div><!-- end container -->

            </div><!-- opportunities -->

        </main><!-- #main -->
    </div><!-- #primary -->



  <div id="students">

    <div class="title">

      <div class="container l1">

        <h2>Meet Some of Our Students</h2>

      </div><!-- container -->

    </div><!-- title -->

    <div class="list start">

      <div id="studentSlider">

          <?php

          $args = array(
              "post_type" => "students",
              "posts_per_page" => -1,
              "post_status" => "publish"
          );

          $students = new WP_Query($args);

          if($students->have_posts()) : while($students->have_posts()) : $students->the_post();
            global $post;

            $image = (get_field("image")) ? get_field("image") : get_bloginfo("template_url")."/library/img/training/no-avatar.png";
	          $image = mThumbImage($image, 115, 115);

	          $education = get_field("education");
	          $founded_by = get_field("founded_by");

          ?>

        <div class="profile">

          <div class="image">

            <img src="<?php echo $image;?>"/>

          </div><!-- image -->

          <div class="details">

            <div class="inner">

              <h3><?php the_title();?></h3>

              <?php if($education):?>
              <div class="education">
	              <?php echo formatContent($education);?>
              </div><!-- education -->
              <?php endif;?>

	            <?php if($founded_by):?>
              <div class="bottom">

                <p>Funded by: <br/><?php echo $founded_by;?></p>

              </div><!-- bottom -->
              <?php endif;?>

            </div><!-- inner -->

          </div><!-- details -->

          <div class="action">

            <a href="#" class="viewResearcher" data-id="<?php echo $post->ID;?>">

              <span class="arrow"></span>
              <span class="text">View Profile</span>

            </a>

          </div><!-- action -->

        </div><!-- profile -->

        <?php

        endwhile; endif;

        wp_reset_query();

        ?>

      </div><!-- student slider -->

      <a href="" class="control prev"></a>
      <a href="" class="control next"></a>

    </div><!-- list -->

  </div><!-- students -->

    <div id="studentdetails">

      <div class="wrapper">

        <a href="" class="closeStudent"></a>

        <div class="inner">

          <div class="top">

            <div class="image">

              <img src="" class="profileImage"/>

            </div><!-- image -->

            <div class="meta">

              <h3 class="profileName"></h3>

              <div class="bottom">

                <p class="education"></p>

                <ul>

                  <li class="email">

                    <span class="label">Email</span>
                    <span class="value"><a href="mailto:" class="profileEmail"></a></span>

                  </li>

                  <li class="twitter">

                    <span class="label">Twitter</span>
                    <span class="value"><a href="" target="_blank" class="profileTwitter"></a></span>

                  </li>

                  <li class="linkedin">

                    <span class="label">LinkedIn</span>
                    <span class="value"><a href="" target="_blank" class="profileLinkedIn"></a></span>

                  </li>

                </ul>

              </div><!-- bottom -->

            </div><!-- meta -->

          </div><!-- top -->

          <div class="details">


          </div><!-- details -->

        </div><!-- inner -->

      </div><!-- wrapper -->

    </div><!-- student details -->


    <?php

endwhile; endif;


get_footer();

?>