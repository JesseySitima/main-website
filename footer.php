<?php

global $post, $f;

?>

<?php

if (is_page_template("welcome.php") || is_page_template("page-training.php")) {

    $image = get_field('bottom_banner_image', 7);

    ?>
<div id="banner" class="careers">

	<div class="container">

		<div class="wrapper">

			<div class="image" style="background-image: url(<?php echo $image; ?>);"></div>

			<div class="info">

				<div class="inner">

					<span class="sub">Careers</span>

					<h3>We’re always looking for talented and motivated staff to join our multidisciplinary team.</h3>

					<a href="<?php bloginfo("url");?>/careers/" class="button white">

						<span class="arrow"></span>

						<span class="text">Work With us</span>

					</a>

				</div><!-- inner -->

			</div><!-- info -->

			<div class="clear"></div>

		</div><!-- wrapper -->

	</div><!-- container -->

</div><!-- careers -->

<?php

}

?>

<?php

if (is_page_template("page-research.php") || is_singular("research")) {

    $image = get_field('bottom_banner_image', 33);

    ?>
<div id="banner" class="trainers">

	<div class="container">

		<div class="wrapper">

			<div class="image" style="background-image: url(<?php echo $image; ?>);"></div>

			<div class="info">

				<div class="inner">

					<span class="sub">Trainers</span>

					<h3>Learn more about our training opportunities.</h3>

					<a href="<?php bloginfo("url");?>/trainers/" class="button white">

						<span class="arrow"></span>

						<span class="text">View Training Opportunities</span>

					</a>

				</div><!-- inner -->

			</div><!-- info -->

			<div class="clear"></div>

		</div><!-- wrapper -->

	</div><!-- container -->

</div><!-- careers -->

<?php

}

?>


<?php

if (is_page_template("page-science.php")) {

    ?>
<div id="banner" class="news">

	<div class="container">

		<div class="wrapper">

			<div class="image"></div>

			<div class="info">

				<div class="inner">

					<span class="sub">News & Events</span>

					<h3>Read about our latest news & events.</h3>

					<a href="<?php bloginfo("url");?>/news/" class="button white">

						<span class="arrow"></span>

						<span class="text">View News & Events</span>

					</a>

				</div><!-- inner -->

			</div><!-- info -->

			<div class="clear"></div>

		</div><!-- wrapper -->

	</div><!-- container -->

</div><!-- careers -->

<?php

}

?>


<footer>
	<div class="container l0">

		<a href="" target="_blank" class="wellcome">

			<img src="<?php bloginfo("template_url");?>/library/img/wellcome-logo-white.png" />

		</a>

		<div class="links">

			<ul>

				<li>

					<a href="<?php bloginfo("url");?>/">Home</a>

				</li>

				<li>

					<a href="<?php bloginfo("url");?>/about/">About us</a>

				</li>

				<li>

					<a href="<?php bloginfo("url");?>/researchgroups/">Research</a>

				</li>

				<li>

					<a href="<?php bloginfo("url");?>/training/">Training</a>

				</li>

			</ul>

		</div>

		<nav>

			<ul>

				<li>&copy; <?php echo date("Y"); ?> Malawi Liverpool Wellcome Trust</li>

				<li><a href="<?php bloginfo("url");?>/contact/">Contact Us</a></li>

				<li><a href="<?php bloginfo("url");?>/privacy-policy/">Privacy Policy</a></li>

			</ul>

			<a href="" class="toTop"></a>

		</nav>


		<a href="https://www.hellosquare.co.za" target="_blank" class="siteBy">Web Design Durban</a>
		<a href="javascript:;" target="_blank"
			style="float: right; height: 30px; text-indent: -9999px; background-size: 100%; margin-top: 4px; padding-right: 25px;"
			id="DigiCertClickID_69F4u87E"></a>
		<script type="text/javascript">
		var __dcid = __dcid || [];
		__dcid.push({
			"cid": "DigiCertClickID_69F4u87E",
			"tag": "69F4u87E"
		});
		(function() {
			var cid = document.createElement("script");
			cid.async = true;
			cid.src = "//seal.digicert.com/seals/cascade/seal.min.js";
			var s = document.getElementsByTagName("script");
			var ls = s[(s.length - 1)];
			ls.parentNode.insertBefore(cid, ls.nextSibling);
		}());
		</script>
		<div class="clear"></div>

	</div><!-- /.container. -->
</footer><!-- end footer -->
</div><!-- end page -->

<?php $f->edit_link();?>
<input type="hidden" id="wpurl" value="<?php bloginfo(" url");?>" />
<?php wp_footer();?>
</body>

</html>