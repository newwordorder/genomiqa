<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>

<?php
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div id="content" tabindex="-1">


			<!-- Do the left sidebar check -->
			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<h6 class="subTitle">Products</h6>
									<h2 class="page-title">What we analyse</h2>
								</div>
							</div>
						</div>
					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<section class="space--md" >
						<div class="container">
							<div class="row">
					<?php while ( have_posts() ) : the_post(); ?>
					

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content-product', get_post_format() );
						?>

					<?php endwhile; ?>
					</div>
					</div>
					</section>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>


		<!-- Do the right sidebar check -->

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
