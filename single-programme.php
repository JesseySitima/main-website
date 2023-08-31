<?php


get_header();

if(have_posts()) : while(have_posts()) : the_post();

    $programme_number = get_field("programme_number");

    $hero_image = get_field("hero_image");
    $hero_caption = get_field("hero_caption");

    $programme_lead = get_field("programme_lead");
    $programme_lead_email = get_field("programme_lead_email");

    $intro = get_field("intro");

    $areas = get_field("areas");
    $deliverables = get_field("deliverables");

    $area_labels = array(
        "Epidemiology and Public Health",
        "Immunology",
        "Pathogens and Pathogenesis",
        "Behaviour and Health",
        "Vaccines",
        "Lung Heath",
        "Paediatrics and Child Health"
     );

?>

	<div id="hero" class="programme">

    <div class="bg parallaxed" data-parallax="scroll" data-image-src="<?php echo mThumbImage($hero_image, 1440, 900);?>"></div>

		<div class="wrapper">

			<div class="caption">

				<h2><?php echo nl2br($hero_caption);?></h2>

			</div><!-- caption -->

		</div><!-- wrapper -->

		<div class="decal"></div>

	</div><!-- hero -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main programme">

            <div class="subnav">

                <div class="container">

                    <div class="wrapper">

                        <?php

                        $args = array(
                            "post_type" => "programme",
                            "post_status" => "publish",
                            "meta_key" => "programme_number",
                            "orderby" => "meta_value_num",
                            "order" => "ASC"
                        );

                        $query = new WP_Query($args);

                        $count = 1;
                        if($query->have_posts()) : while($query->have_posts()) : $query->the_post();

                            $number = get_field("programme_number");

                        ?>

                        <a href="<?php the_permalink();?>" <?php if($programme_number == $number):?>class="current"<?php endif;?>>Theme <?php echo $count;?></a>

                        <?php

	                        $count++;

                        endwhile; endif;

                        wp_reset_query();

                        ?>

                        <a href="<?php bloginfo("url");?>/researchgroups/">Research</a>

                    </div><!-- wrapper -->

                </div><!-- end container -->

            </div><!-- subnav -->

            <div class="main">

                <div class="container l0">

                    <aside class="leadDetails">

                        <div class="profile">

                            <span class="title">Programme Lead</span>

                            <span class="name"><?php echo $programme_lead;?></span>

                        </div><!-- profile -->

                        <?php if($programme_lead_email):?>
                            <a href="mailto:<?php echo $programme_lead_email;?>" class="email">

                                <span class="icon"></span>
                                <span class="text">Email</span>

                            </a>
                        <?php endif;?>

                    </aside><!-- lead details -->

                    <div class="info">

                      <!--
                        <div class="title">

                            <h2><?php the_title();?></h2>

                        </div><!-- title -->

                        <?php if($intro):?>
                        <div class="intro">

                            <?php echo formatContent($intro);?>

                        </div><!-- intro -->
                        <?php endif;?>

                        <div class="articleContent">

                            <?php the_content();?>

                        </div><!-- article content -->

                        <?php if($areas):?>
                        <div class="areas">

                            <div class="table">

                                <div class="wrap">

                                    <div class="headings">

                                        <div class="right">

                                            <span class="text">Theme <?php echo $programme_number;?></span>

                                        </div><!-- right -->

                                        <div class="clear"></div>

                                    </div><!-- headings -->

                                    <div class="data">

                                        <?php

                                        foreach ($areas as $key => $area):

                                        ?>

                                        <div class="row">

                                            <div class="left">

                                                <span class="label"><?php echo $area_labels[$key];?></span>

                                            </div><!-- left -->

                                            <div class="right">

                                                <div class="inner">

                                                    <span class="block <?php echo $area["block_1"];?>"></span>
                                                    <span class="block <?php echo $area["block_2"];?>"></span>
                                                    <span class="block <?php echo $area["block_3"];?>"></span>
                                                    <span class="block <?php echo $area["block_4"];?>"></span>
                                                    <span class="block <?php echo $area["block_5"];?>"></span>
                                                    <span class="block <?php echo $area["block_6"];?>"></span>
                                                    <span class="block <?php echo $area["block_7"];?>"></span>

                                                </div><!-- inner -->

                                            </div><!-- right -->

                                        </div><!-- row -->

                                        <?php endforeach;?>


                                    </div><!-- data -->

                                </div><!-- wrap -->

                            </div><!-- table -->

                            <div class="key">

                                <span class="icon"></span>
                                <span class="text">Theme <?php echo $programme_number;?> track record of excellence (blue rectangles) and prioritised research areas (yellow lozenges).</span>

                            </div><!-- key -->

                        </div><!-- areas -->
                        <?php endif;?>

                        <?php if($deliverables):?>

                            <div class="accordion">

                                <?php

                                foreach ($deliverables as $deliverable):

                                    ?>

                                    <div class="block">

                                        <div class="outer">

                                            <div class="wrap">

                                                <div class="left">

                                                    <span class="icon"></span>

                                                    <span class="text"><?php echo $deliverable["title"];?></span>

                                                </div><!-- left -->

                                                <span class="arrow"></span>

                                                <div class="clear"></div>

                                            </div><!-- wrap -->

                                        </div><!-- outer -->

                                        <div class="details">

                                            <div class="inner">

                                                <?php echo $deliverable["text"];?>

                                            </div><!-- inner -->

                                        </div><!-- details -->

                                    </div><!-- block -->

                                    <?php

                                endforeach;

                                ?>


                            </div><!-- accordion -->

                        <?php endif;?>

                    </div><!-- info -->

                    <div class="clear"></div>

                </div><!-- container -->

            </div><!-- info -->

		</main><!-- #main -->
	</div><!-- #primary -->


	<?php

endwhile; endif;


get_footer();

?>