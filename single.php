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

<?php get_footer(); ?>
