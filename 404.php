<?php

	/*
		Template Name: 404
	*/

get_header();

	
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="container">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'default' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">

						<?php get_template_part( 'template-parts/content', 'none' ); ?>


					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</div><!-- .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();

?>
