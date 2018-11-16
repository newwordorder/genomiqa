<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
?>

<section id="sub-header"

class="page-header page-header--work bg--dark" >


<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 text-center">

      <h1 class="page-title">News</h1>

    </div>
  </div>
</div>



</section>
<div class="wrapper blog-feed" id="index-wrapper">

	<div class="container" id="content" tabindex="-1">




				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<div class="row">

					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-sm-6 col-md-4 text-center blog-tile">

							<a href="<?php the_permalink(); ?>" class="">
                  <div class="blog-tile__thumb rounded">
						          <?php
						          $workImage = get_field('background_image_background_image');

						          if( !empty($workImage) ):

						            // vars
                        $url = $workImage['url'];
                        $alt = $workImage['alt'];

                        $size = '600x400';
                        $thumb = $workImage['sizes'][ $size ];
                        $width = $workImage['sizes'][ $size . '-width' ];
                        $height = $workImage['sizes'][ $size . '-height' ];

						            ?>
                        <div class="background-image-holder ">
						              <img class="rounded" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
                        </div>
						          <?php endif; ?>
                    </div>

										<h3><?php the_title(); ?></h3>
										<?php the_excerpt(); ?>
                    <a class="link" href="<?php the_permalink(); ?>">Read</a>
								</a>


					</div>

					<?php endwhile; ?>

					</div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>


			<!-- The pagination component -->
			<?php understrap_pagination(); ?>




</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
