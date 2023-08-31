<?php

/*
 * Template Name: Search Results
 */


if(!isset($_GET["search"]) || empty($_GET["search"])){

	wp_redirect(get_bloginfo("url"));
	exit();

}

get_header();

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;



?>

<div id="hero" class="alternate alt2">

	<div class="wrapper">

		<div class="caption black">

			<h2><?php the_title();?></h2>

			<h3>&ldquo;<?php echo $_GET["search"];?>&rdquo;</h3>

		</div><!-- caption -->

	</div><!-- wrapper -->

	<div class="decal"></div>

</div><!-- hero -->

<div id="primary" class="content-area">
	<main id="main" class="site-main search">

		<div class="container l4">

			<div class="list">

			<?php

			$search = sanitize_text_field($_GET["search"]);
			$search = rtrim($search, "s");

			$args = array(
				"paged" => $paged,
				"post_type" => array("research", "programme", "vacancies", "opportunities", "post", "page", "students", "researchers"),
				"posts_per_page" => 8,
				"post_status" => "publish",
				//"orderby" => "rand",
				"s" => $search
			);

			$query = new WP_Query($args);

			if($query->have_posts()){

				while ($query->have_posts()){
					$query->the_post();

					global $post;
					$category = "";

					if($post->post_type == "post" && isset(get_the_category( $post->ID )[0]->name)) {

						$category = get_the_category( $post->ID )[0]->name;


						?>
						<article class="post">

							<div class="inner">

								<div class="meta">

									<span class="topic"><?php echo ($category != "Uncategorized") ? $category : "News/Events";?></span>

									<div class="clear"></div>

								</div><!-- meta -->

								<h3><a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a></h3>

								<div class="right">

									<a href="<?php echo get_permalink();?>" class="button pink apply">

										<span class="arrow"></span>

										<span class="text">Read More</span>

									</a>

									<div class="clear"></div>

								</div><!-- right -->

								<div class="clear"></div>


							</div><!-- inner -->

						</article>
						<?php
					}
					else{

						$template = get_post_meta(get_the_ID(), "_wp_page_template", true);

						if($template != "page-empty.php"){

							$category = get_post_type($post->ID);

							?>
							<article class="post">

								<div class="inner">

									<div class="meta">

										<span class="topic"><?php echo ($category != "Uncategorized") ? $category : "News/Events";?></span>

										<div class="clear"></div>

									</div><!-- meta -->

									<h3><a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a></h3>

									<div class="right">

										<a href="<?php echo get_permalink();?>" class="button pink apply">

											<span class="arrow"></span>

											<span class="text">Read More</span>

										</a>

										<div class="clear"></div>

									</div><!-- right -->

									<div class="clear"></div>


								</div><!-- inner -->

							</article>
							<?php

						}

					}

				}

			}

			else {

				?>

				<p class="error">No results found for "<?php echo $_GET["search"]; ?>".</p>

				<?php

			}
			?>


		</div><!-- list -->

		<?php if($query && $query->max_num_pages > 1):?>

			<div class="pagination">

				<div class="inner">


					<?php

					$big = 999999999;

					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $query->max_num_pages
					) );
					?>

				</div>

			</div><!-- pagination -->

			<div class="action">

				<a href="" class="button red loadMore">

					<span class="text">Load More</span>

				</a>

			</div><!-- action -->


		<?php endif;?>

		</div><!-- end container -->

</main><!-- #main -->
</div><!-- #primary -->
<?php

get_footer();

?>
