<?php

/*
  Template Name: Publications
*/

get_header();

$current_year = date("Y");

$year = (isset($_GET["yr"]) && !empty($_GET["yr"])) ? $_GET["yr"] : $current_year;

$authors = get_terms([
	"taxonomy" => "publication-author",
	"hide_empty" => false,
]);


$args = array(
    "post_type" => "publication",
    "post_status" => "publish"
);


$args["meta_query"] = array(
    "relation" => "AND",
    array(
        "key" => "year",
        "value" => $year,
        "compare" => "="
    )
);

if(isset($_GET["mo"]) && !empty($_GET["mo"])){
    $month = $_GET["mo"];

    $args["meta_query"][] = array(
        "key" => "month",
        "value" => $month,
        "compare" => "="
    );

}

if(isset($_GET["au"]) && !empty($_GET["au"])){
    $author = $_GET["au"];

    $args["tax_query"] = array(
        array(
            "taxonomy" => "publication-author",
            "terms" => $author,
            "field" => "ID"
        )
    );

}



?>


	<div id="hero" class="publications alternate alt1">

		<div class="wrapper">

			<div class="caption black">

				<h2>Publications</h2>

			</div><!-- caption -->

		</div><!-- wrapper -->

		<div class="decal"></div>

	</div><!-- hero -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main publications">

        <div class="filters">


          <div class="container l1">

            <div class="wrapper right">

              <span class="label">Filter by.</span>

              <?php if(1 == 2): //REMOVED. Old publications didn't have a set author?>
              <div class="filter">

                <span class="text">Author</span>

                <div class="dropdown">

                  <div class="inner">

	                  <?php

	                  if($authors){

		                  foreach ($authors as $author){

			                  ?>
                            <span class="value" data-type="author" data-id="<?php echo $author->term_id;?>"><?php echo $author->name;?></span>
			                  <?php

		                  }

	                  }

	                  ?>

                  </div><!-- inner -->

                  <div class="overflow"></div>

                </div><!-- dropdown -->

              </div><!-- filter -->
              <?php endif;?>

              <div class="filter">

                <span class="text">Year</span>

                <div class="dropdown long">

                  <div class="inner">

	                  <?php

	                  for ($x = $current_year; $x >= ($current_year - 20); $x--){

	                    if($x == 2005) break;

		                  ?>
                            <span class="value" data-type="year" data-id="<?php echo $x;?>"><?php echo $x;?></span>
	                    <?php

                    }

                    ?>

                  </div><!-- inner -->

                  <div class="overflow"></div>

                </div><!-- dropdown -->

              </div><!-- filter -->

              <?php if(1 == 2): //REMOVED. Old publications didn't have a set month?>
              <div class="filter">

                <span class="text">Month</span>

                <div class="dropdown long">

                  <div class="inner">

                    <span class="value" data-type="month" data-id="January">January</span>
                    <span class="value" data-type="month" data-id="February">February</span>
                    <span class="value" data-type="month" data-id="March">March</span>
                    <span class="value" data-type="month" data-id="April">April</span>
                    <span class="value" data-type="month" data-id="May">May</span>
                    <span class="value" data-type="month" data-id="June">June</span>
                    <span class="value" data-type="month" data-id="July">July</span>
                    <span class="value" data-type="month" data-id="August">August</span>
                    <span class="value" data-type="month" data-id="September">September</span>
                    <span class="value" data-type="month" data-id="October">October</span>
                    <span class="value" data-type="month" data-id="November">November</span>
                    <span class="value" data-type="month" data-id="January">December</span>

                  </div><!-- inner -->

                  <div class="overflow"></div>

                </div><!-- dropdown -->

              </div><!-- filter -->
              <?php endif;?>


            </div><!-- wrapper -->

            <div class="clear"></div>

          </div><!-- end container -->

        </div><!-- filters -->

        <div class="years">

          <div class="container l1">

            <div class="wrapper">

	            <?php

	            for ($x = $current_year; $x >= ($current_year - 8); $x--){

		            ?>

                  <a href="<?php bloginfo("url");?>/publications/?yr=<?php echo $x;?>" <?php if($x == $year):?>class="current"<?php endif;?>><?php echo $x;?></a>

		            <?php

	            }

	            ?>

            </div><!-- wrapper -->

          </div><!-- end container -->

        </div><!-- years -->

        <div class="list">

          <div class="container l1">

              <?php


        $publications = new WP_Query($args);

        if($publications->have_posts()) {

          while ($publications->have_posts()) {
            $publications->the_post();

            global $post;


            $title = get_the_title();
            $details = get_field("details");


            $day = get_field("day");
            $month = get_field("month");
            $year = get_field("year");

            $link = get_field("link");

            $publication_number = get_field("publication_number");


            $types = '';
            foreach ( (array) wp_get_post_terms( $post->ID, 'publication-type') as $collection ) {
              if ( empty($collection->slug ) )
                continue;

              $types .=  $collection->name;
            }

            $author = '';
            foreach ( (array) wp_get_post_terms( $post->ID, 'publication-author') as $author ) {
              $author = $author->name;
              break;
            }


            ?>

                  <div class="publication">

                    <span class="icon"></span>

                    <div class="info">

                      <p><?php echo $title;?> <span class="details"><?php echo strip_tags($details);?></span></p>

                      <div class="bottom">

                        <div class="left">

                          <span class="date"><?php echo $day." ".$month." ".$year;?></span>

                          <span class="category"><?php echo $types;?></span>

                          <span class="author"><?php echo $author;?></span>

                          <?php if($publication_number):?>
                          <span class="number"><?php echo $publication_number;?></span>
                          <?php endif;?>

                        </div><!-- left -->

                        <a href="<?php echo $link;?>" class="right link" target="_blank"></a>

                        <div class="clear"></div>

                      </div><!-- bottom -->

                    </div><!-- info -->

                    <div class="clear"></div>

                  </div><!-- publication -->

            <?php

          }

        }
        else{

        ?>

            <div class="error">

              <span class="icon"></span>
              <span class="text">No publications available here</span>

            </div><!-- error -->

        <?php

        }

        ?>

          </div><!-- end container -->

        </div><!-- list -->

		</main><!-- #main -->
	</div><!-- #primary -->

<input type="hidden" name="url" value="<?php echo get_bloginfo("url");?>/publications/"/>
<input type="hidden" name="year" value="<?php echo $year;?>"/>
<input type="hidden" name="month" value="<?php echo (isset($_GET["mo"]) && !empty($_GET["mo"])) ? $_GET["mo"] : "";?>"/>
<input type="hidden" name="author" value="<?php echo (isset($_GET["au"]) && !empty($_GET["au"])) ? $_GET["au"] : "";?>"/>

<?php


get_footer();

?>