<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$backgroundImage = get_field('background_image');

$image = $backgroundImage['background_image'];
$imageOverlay = $backgroundImage['image_overlay'];
$backgroundEffect = $backgroundImage['background_effect'];
$invertColours = $backgroundImage['invert_colours'];
?>
<?php while ( have_posts() ) : the_post(); ?>
<section id="sub-header"

class="page-header page-header--work bg-effect--<?php echo $backgroundEffect ?> imagebg <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?>"
data-overlay="5"
>

<?php

if( !empty($image) ):

  // vars
  $url = $image['url'];
  $alt = $image['alt'];

  ?>
  <div class="background-image-holder">
    <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
  </div>
<?php endif; ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12 col-md-12 ">
    <h6 class="subTitle"><?php global $wp_query;
    $category_detail =  get_the_category($wp_query->post->ID); foreach($category_detail as $cd){
  echo $cd->cat_name;
  } ?></h6>

      <h3 class="page-title"><?php the_title(); ?></h3>


    </div>
  </div>
</div>



</section>
<!-- oi -->
    <?php get_template_part( 'page-templates/postblocks' ); ?>

<?php endwhile; // end of the loop. ?>


<section class="bg--light">
    <div class="container" id="main" tabindex="-1"> 
      <div class="row py-3">
        <div class="col-12">
          <h6 class="subTitle">More News</h6>
        </div>
      </div>

    <?php /* Start the Loop */ ?>

    <div class="row">
      <?php
        //for use in the loop, list 5 post titles related to first tag on current post
        $args=array(
        'post__not_in' => array($post->ID),
        'category__in' => wp_get_post_categories( $post->ID ),
        'posts_per_page'=>3,
        );
        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) :
        while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<article class="col-sm-6 col-md-4 blog-tile">
					<div class="blog-tile--inner">
					<a href="<?php the_permalink(); ?>" class="">
						<div class="blog-tile__thumb ">
							<?php
							$backgroundImage = get_field('background_image_background_image');

							if( !empty($backgroundImage) ):

								// vars
								$url = $backgroundImage['url'];
								$alt = $backgroundImage['alt'];

								$size = '600x400';
								$thumb = $backgroundImage['sizes'][ $size ];
								$width = $backgroundImage['sizes'][ $size . '-width' ];
								$height = $backgroundImage['sizes'][ $size . '-height' ];

								?>
								<div class="background-image-holder ">
									<img class="" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
								</div>
							<?php endif; ?>
						</div>
						<div class="blog-tile__details">
							<h6><?php $category_detail = get_the_category();
							foreach($category_detail as $cd){
								echo $cd->cat_name;
								}
							?>
							</h6>
							<h5><?php the_title(); ?></h5>
							<a class="btn btn--link" style="padding:0; width:100%; display:flex; justify-content: space-between;align-items: center;" href="<?php the_permalink(); ?>">Read <i class="fas fa-arrow-right"></i></a>

						</div>
					</a>
							</div>

        </article>
        <?php
        endwhile;
        endif;
        wp_reset_query();
      ?>
              </div>
              </div>
      </section>


<?php get_footer(); ?>
