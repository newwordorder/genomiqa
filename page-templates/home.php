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


   /*  const images = [
      "https://images.unsplash.com/photo-1487235829740-e0ac5a286e1c?ixlib=rb-0.3.5&s=d7b2968dc15cecb41656e1fa50c9bbf0&auto=format&fit=crop&w=1648&q=80",
      "https://images.unsplash.com/photo-1494861895304-fb272971c078?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=863877d7e1253ce5b2d81e086f23ec52&auto=format&fit=crop&w=1650&q=80",
      "https://images.unsplash.com/photo-1529641484336-ef35148bab06?ixlib=rb-0.3.5&s=7933ac78162b72ea5702f717bce062bd&auto=format&fit=crop&w=1650&q=80",
      "https://images.unsplash.com/photo-1485368510545-b1f4bcd02d0d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=f6ffd2c4add9de6b941e7ba340de1e9b&auto=format&fit=crop&w=933&q=80",
      "https://images.unsplash.com/photo-1537210121222-17be6deceff3?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=3d16e3ffa80e431a6c7cb19d0f7c9cc6&auto=format&fit=crop&w=1650&q=80"
    ];

    const images2 = [
      "https://images.unsplash.com/photo-1508399181942-f208fb6ca712?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=c674ba755e328fd5d1876b329a483986&auto=format&fit=crop&w=1650&q=80",
      "https://images.unsplash.com/photo-1520418764023-b1ca3dc2793b?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e23e7cc85b2cee7d78e70a8c6b0aeb9d&auto=format&fit=crop&w=1650&q=80",
      "https://images.unsplash.com/photo-1496954649918-80cc4e7a8076?ixlib=rb-0.3.5&s=54bea203f92ea014425f59d88fff23ae&auto=format&fit=crop&w=1650&q=80",
      "https://images.unsplash.com/photo-1500575351013-6b9af18d7722?ixlib=rb-0.3.5&s=60b34ebcd4671fcb7a5fda314f4eccc6&auto=format&fit=crop&w=975&q=80",
      "https://images.unsplash.com/photo-1523895665936-7bfe172b757d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e1c286219e0a835e61e8582b8a622cf7&auto=format&fit=crop&w=1650&q=80"
    ];

    const content = ["<p>1</p>", "<p>2</p>", "<p>3</p>", "<p>4</p>", "<p>5</p>"];
 */
    const newSlider = slider({ images, images2, content });

    const body = document.querySelector("#slider");

    body.appendChild(newSlider);

    init();

  });
</script>



</section>

<?php get_template_part( 'page-templates/blocks' ); ?>

<?php get_footer();
