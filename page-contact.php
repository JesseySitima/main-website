<?php

/*
  Template Name: Contact
*/

get_header();

if(have_posts()) : while(have_posts()) : the_post();


	?>

	<div id="hero" class="vacancieslist alternate alt2">

		<div class="wrapper">

			<div class="caption black">

				<h2>Contact us</h2>

			</div><!-- caption -->

		</div><!-- wrapper -->

		<div class="decal"></div>

	</div><!-- hero -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main contact">

			<div class="contactDetails">

				<div class="container l3">

					<div class="block address">

						<h3>Address</h3>

						<p>Queen Elizabeth Central Hospital <br/>
							College of Medicine, P.O. Box 30096 <br/>
							Chichiri, Blantyre 3 <br/>
							Malawi, C. Africa</p>

						<a href="" class="map" target="_blank">

							<span class="arrow"></span>
							<span class="text">Open Map</span>

						</a>

					</div><!-- block -->


					<div class="block tel">

						<h3>Contact</h3>

						<ul>

							<li>

								<span class="label">T.</span>
								<span class="text">+265 (0)1812423</span>

							</li>

              <li>

                <span class="label">T.</span>
                <span class="text">+265 (0)1811918</span>

              </li>

						</ul>

					</div><!-- block -->

					<div class="clear"></div>

					<span class="line"></span>

				</div><!-- container -->

			</div><!-- contact details -->

      <div class="enquiriesForm">



        <div class="container l3">


          <div class="right wrapper">

            <h3>Enquiries</h3>

            <div class="form">

              <?php gravity_form(1, false, false, false, "");?>

            </div><!-- form -->

          </div><!-- wrapper -->

          <div class="clear"></div>

        </div><!-- container -->

        <div class="decal" data-aos="fade-up" data-aos-offset="200"></div>

        <div class="map">

          <div id="mapArea"></div>

        </div><!-- map -->

      </div><!-- enquiriesForm -->

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php

endwhile; endif;


get_footer();

?>