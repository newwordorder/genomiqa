<?php
/**
* Template Name: Page
*
*
* @package understrap
*/

get_header();

$headerType = get_field('image_or_video');

$image = get_field('background_image');
$imageOverlay = get_field('image_overlay');

$backgroundImage = get_field('background_image');

$image = $backgroundImage['background_image'];
$imageOverlay = $backgroundImage['image_overlay'];
$backgroundEffect = $backgroundImage['background_effect'];
$invertColours = $backgroundImage['invert_colours'];

$video = get_field('youtube_code');
$fallbackImage = get_field('fallback_image');
?>

<section id="sub-header"

class="page-header bg-effect--<?php echo $backgroundEffect ?> imagebg videobg <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?>"
data-overlay="<?php echo $imageOverlay ?>"
>

<?php if( $headerType == 'image' ): ?>

  <?php if( !empty($image) ):

    // vars
    $url = $image['url'];
    $alt = $image['alt'];

  ?>
    <div class="background-image-holder">
      <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
    </div>
  <?php endif; ?>
<?php endif; ?>
<?php if( $headerType == 'video' ): ?>

  <div class="youtube-background" data-video-url="<?php echo $video ?>"></div>

  <?php if( !empty($fallbackImage) ):

    // vars
    $url = $fallbackImage['url'];
    $alt = $fallbackImage['alt'];

  ?>
    <div class="background-image-holder">
      <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
    </div>
  <?php endif; ?>
<?php endif; ?>
<div class="container pos-vertical-center">
  <div class="row">
    <div class="col-md-10">

      <h6 class="h6 subTitle"><?php the_title(); ?></h6>
      <h1><?php echo get_field('subtitle'); ?></h1>

    </div>
  </div>
</div>



</section>

<?php get_template_part( 'page-templates/blocks' );
        get_template_part( 'page-templates/blocks/pre-footer-cta' );
        ?>

<?php get_footer();
