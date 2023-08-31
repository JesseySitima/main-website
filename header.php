<?php

global $post, $f;

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="shortcut icon" href="<?php bloginfo("url");?>/favicon.ico?v=2" />

	<!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
        <![endif]-->


	<?php wp_head();?>

</head>

<body <?php body_class();?>>

	<!-- Website by Hellosquare || hellosquare.co.za  -->
	<div id="root"></div>

	<!--[if lt IE 9]>
      <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->

	<div id="page" class="preload loaded">

		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'default');?></a>

		<header id="site-header" class="site-header">

			<div class="container">

				<?php
the_custom_logo();
if (is_front_page() && is_home()):
?>
				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
						rel="home"><?php bloginfo('name');?></a></h1>
				<?php
else:
?>
				<p class="site-title">
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name');?></a>

					<span class="name">Malawi-Liverpool-Wellcome<br />Clinical Research-Programme</span>

				</p>
				<?php
endif;
?>

				<div id="site-navigation" class="action">

					<nav>

						<ul>

							<?php

/*
$args = array(

"menu" => "Navigation",
"container" => "", //remove the div wrapper
"items_wrap" => '%3$s' // remove the ul wrapper

);

wp_nav_menu($args);
 */

?>

							<li class="dropdown">

								<a href="#"
									class="toggle <?php if (is_page_template("page-about.php")): ?>active<?php endif;?>">About
									us</a>

								<ul class="sub">

									<li><a href="<?php bloginfo("url");?>/about/">Overview</a></li>
									<li class="submenu">
										<a href="<?php bloginfo("url");?>/training/#">Mission</a>

										<ul>

											<li>

												<a href="<?php bloginfo("url");?>/researchgroups/">Conduct excellent
													research</a>

											</li>

											<li>

												<a href="<?php bloginfo("url");?>/training/#students">Train the next
													generation of scientists</a>

											</li>

										</ul>

									</li>
									<li><a href="<?php bloginfo("url");?>/about/#description">Director's Welcome</a>
									</li>
									<li><a href="<?php bloginfo("url");?>/about/#governance">Governance</a></li>
									<li><a href="<?php bloginfo("url");?>/about/#achievements">Achievements</a></li>
									<li><a href="<?php bloginfo("url");?>/about/#partners">Partners</a></li>

								</ul>

							</li>

							<li>

								<a href="<?php bloginfo("url");?>/news-events/">News & Events</a>

							</li>


							<li class="dropdown">

								<a href="#"
									class="toggle <?php if (is_page_template("page-research.php")): ?>active<?php endif;?>">Research</a>

								<ul class="sub">

									<?php

$args = array(

    "menu" => "Research",
    "container" => "", //remove the div wrapper
    "items_wrap" => '%3$s', // remove the ul wrapper

);

wp_nav_menu($args);

?>

									<li><a href="<?php bloginfo("url");?>/researchgroups/">Research</a></li>
									<li><a href="<?php bloginfo("url");?>/publications/">Publications</a></li>
									<li><a href="<?php bloginfo("url");?>/policy-unit/">Policy Unit</a></li>



								</ul>

							</li>

							<li class="dropdown">

								<a href="#"
									class="toggle <?php if (is_page_template("page-training.php")): ?>active<?php endif;?>">Training</a>

								<ul class="sub">

									<li><a href="<?php bloginfo("url");?>/training/">Overview</a></li>
									<li class="submenu">
										<a href="<?php bloginfo("url");?>/training/#">Students</a>

										<ul>
											<li>

												<a
													href="<?php bloginfo("url");?>/training/student-profiles?al=masters">Master</a>

											</li>

											<li>

												<a
													href="<?php bloginfo("url");?>/training/student-profiles?al=phd">PhD</a>

											</li>

											<li>

												<a
													href="<?php bloginfo("url");?>/training/student-profiles?al=post-doctorate">Post-Doctorate</a>

											</li>

										</ul>

									</li>
									<li><a href="<?php bloginfo("url");?>/training/#operations-funding">Operations
											Funding Opportunities</a></li>
									<li><a href="<?php bloginfo("url");?>/training/#crosscutting">Crosscutting
											Opportunities</a></li>
									<li><a href="<?php bloginfo("url");?>/training/training-opportunities/">Training
											Opportunities</a></li>

								</ul>

							</li>

							<?php if (1 == 2): //hidden for now?>
							<li class="dropdown">

								<a href="#"
									class="toggle <?php if (is_page_template("page-public-engagement.php") || is_page_template("page-strategy.php")): ?>active<?php endif;?>">Public
									Engagement</a>

								<ul class="sub">

									<li><a href="<?php bloginfo("url");?>/public-engagement/">Overview</a></li>
									<li><a href="<?php bloginfo("url");?>/public-engagement/strategy/">Strategy</a></li>
									<li><a href="<?php bloginfo("url");?>/public-engagement/#partners">Partners &
											Collaborations</a></li>

								</ul>

							</li>
							<?php endif;?>

							<li class="dropdown operations">

								<a href="#"
									class="toggle <?php if (is_page_template("page-operations.php")): ?>active<?php endif;?>">Operations</a>

								<ul class="sub">

									<li><a href="<?php bloginfo("url");?>/operations/">Overview</a></li>

									<!--<li><a href="<?php bloginfo("url");?>/science-communication/">Science Communication</a></li>-->

									<li class="submenu">
										<a href="<?php bloginfo("url");?>/training/#">Departments</a>

										<ul>

											<?php

$args = array(

    "menu" => "Departments",
    "container" => "", //remove the div wrapper
    "items_wrap" => '%3$s', // remove the ul wrapper

);

wp_nav_menu($args);

?>

										</ul>

									</li>

									<li class="submenu">
										<a href="<?php bloginfo("url");?>/training/#">Research Support Units</a>

										<ul>

											<?php

$args = array(

    "menu" => "Research Support Units",
    "container" => "", //remove the div wrapper
    "items_wrap" => '%3$s', // remove the ul wrapper

);

wp_nav_menu($args);

?>

										</ul>

									</li>
									<li class="submenu">
										<a href="<?php bloginfo("url");?>/training/#">Field Sites</a>

										<ul>

											<?php

$args = array(

    "menu" => "Field Sites",
    "container" => "", //remove the div wrapper
    "items_wrap" => '%3$s', // remove the ul wrapper

);

wp_nav_menu($args);

?>

										</ul>

									</li>


								</ul>

							</li>

							<li>

								<a href="<?php bloginfo("url");?>/careers/">Careers</a>

							</li>

							<li class="dropdown">

								<a href="#"
									class="toggle <?php if (is_page_template("projects.php")): ?>active<?php endif;?>">Projects</a>

								<ul class="sub">

									<li><a href="<?php bloginfo("url");?>/creator-updates/">CREATOR</a></li>

								</ul>

							</li>

						</ul>

					</nav>
					<style type="text/css">
					#site-navigation a.social.youtube {
						background: url(../wp-content/themes/malawi/library/img/youtube.svg) no-repeat center/100%;
					}
					</style>

					<a class="menu-toggle"></a>

					<a href="<?php bloginfo("url");?>/contact/"
						class="contact <?php if (is_page_template("page-contact.php")): ?>current<?php endif;?>">Contact
						Us</a>

					<a href="" class="search-toggle"></a>
					<a href="https://web.facebook.com/MLWTrust" class="social facebook" target="_blank"></a>
					<a href="https://www.twitter.com/MlwTrust" class="social twitter" target="_blank"></a>
					<a href="https://www.youtube.com/channel/UCqASsPvvj27ir9wZC4fCjLA" class="social youtube"
						target="_blank"></a>

				</div><!-- action -->

				<div class="clear"></div>


			</div><!-- #site-navigation -->

		</header><!-- end header -->

		<!--//Bavigation menu -->
		<div id="navigation">

			<div class="inner">
				<a href="" class="closeMenu"></a>

				<nav>

					<div class="left">

						<ul>

							<li>

								<a href="<?php bloginfo("url");?>/">Home</a>

							</li>

							<li>

								<a href="<?php bloginfo("url");?>/about/">About us</a>

							</li>

							<li class="dropdown">

								<a href="<?php bloginfo("url");?>/researchgroups/">Research</a>


								<ul class="sub">

									<li><a href="<?php bloginfo("url");?>/research/">Overview</a></li>


									<?php

if (1 == 2) {

    $args = array(
        "post_type" => "theme",
        "post_status" => "publish",
        "meta_key" => "programme_number",
        "orderby" => "meta_value_num",
        "order" => "ASC",
    );

    $query = new WP_Query($args);

    if ($query->have_posts()): while ($query->have_posts()): $query->the_post();

            $number = get_field("programme_number");

            ?>

									<li><a href="<?php the_permalink();?>">Theme <?php echo $number; ?></a></li>

									<?php

        endwhile;endif;

    wp_reset_query();

}

?>

								</ul>

							</li>

							<li class="dropdown">

								<a href="<?php bloginfo("url");?>/training/">Training</a>

								<ul class="sub">

									<li><a href="<?php bloginfo("url");?>/training/">Overview</a></li>
									<li><a href="<?php bloginfo("url");?>/training/#operations-funding">Operations
											Funding Opportunities</a></li>
									<li><a href="<?php bloginfo("url");?>/training/#crosscutting">Crosscutting
											Opportunities</a></li>

								</ul>

							</li>

							<li>

								<a href="<?php bloginfo("url");?>/operations/">Operations</a>

							</li>

						</ul>

					</div><!-- left -->

					<div class="right">

						<ul>

							<?php if (1 == 2): //hidden for now?>
							<li class="dropdown">

								<a href="<?php bloginfo("url");?>/public-engagement/">Public Engagement</a>

								<ul class="sub">

									<li><a href="<?php bloginfo("url");?>/public-engagement/">Overview</a></li>
									<li><a href="<?php bloginfo("url");?>/public-engagement/strategy/">Strategy</a></li>
									<li><a href="<?php bloginfo("url");?>/public-engagement/#partners">Partners &
											Collaborations</a></li>

								</ul>


							</li>
							<?php endif;?>

							<!--
                  <li>

                    <a href="<?php bloginfo("url");?>/science-communication/">Science Communication</a>

                  </li>
                  -->

							<li>

								<a href="<?php bloginfo("url");?>/news-events/">News & Events</a>

							</li>

							<li>

								<a href="<?php bloginfo("url");?>/careers/">Careers</a>

							</li>

							<li>

								<a href="<?php bloginfo("url");?>/contact/">Contact us</a>

							</li>

						</ul>

					</div><!-- right -->

					<div class="clear"></div>

				</nav><!-- end navigation -->

				<div class="contactDetails">

					<div class="block address">

						<p><a href="https://goo.gl/maps/LN4ioF1MYYThewMq5" target="_blank">Queen Elizabeth Central
								Hospital <br />
								College of Medicine <br />
								P.O. Box 30096, Chichiri <br />
								Blantyre 3 <br />
								Malawi, C. Africa</a></p>

					</div><!-- address -->

					<div class="block phone">

						<p><a href="tel:+2651812444">+265 1 812 444</a></p>

					</div><!-- address -->

				</div><!-- contact details -->

			</div><!-- inner -->

		</div><!-- end navigation -->

		<div id="navigationoverlay"></div>



		<div id="searchBar">

			<div class="container l1">

				<div class="inner">

					<div id="searchSiteWrapper" class="form">

						<form id="formSearchSite" method="get" action="<?php bloginfo("url");?>/search-results/">

							<input type="text" name="search" placeholder="Search our site" />

							<button type="submit" class="button red">
								<span class="text">Search</span>
							</button>

							<div class="clear"></div>

						</form>

					</div><!-- search articles wrapper -->

					<a href="" class="closeSearch"></a>

				</div><!-- inner -->

			</div><!-- contaienr -->

		</div><!-- search bar -->