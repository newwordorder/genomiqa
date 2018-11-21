<?php
/**
* Template Name: Home
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

$slider = get_field('slider');
?>

<section id="sub-header"

class="page-header page-header--home bg-effect--<?php echo $backgroundEffect ?> imagebg videobg <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?>"
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
<?php if(have_rows('slides')):

      $images_left = array();
      $images_right = array();
      $contents = array();

      while ( have_rows('slides') ) : the_row();

      $image_left = get_sub_field('image_left')['url'];
      array_push($images_left, $image_left);

      $image_right = get_sub_field('image_right')['url'];
      array_push($images_right, $image_right);

      $content = get_sub_field('content');
      array_push($contents, $content);

          endwhile; 
          endif; ?> 
<div class="container pos-vertical-center">
  <div class="row justify-content-center">
    <div class="col-md-12 text-center" id="slider">
    </div>
  </div>
</div>

<script>
  jQuery( document ).ready(function(){

    var images = <?php echo json_encode($images_left); ?>;
    var images2 = <?php echo json_encode($images_right); ?>;
    var content = <?php echo json_encode($contents); ?>;

    const newSlider = slider({ images, images2, content });

    const body = document.querySelector("#slider");

    body.appendChild(newSlider);

    init();

  });
</script>



</section>

<?php get_template_part( 'page-templates/blocks' ); ?>

<?php get_footer();
