<?php
/**
* Template Name: Work
*
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

<section

class="page-header page-header--work bg-effect--<?php echo $backgroundEffect ?> imagebg <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?>"
data-overlay="<?php echo $imageOverlay ?>"
>

<?php

if( !empty($image) ):

  // vars
  $url = $image['url'];
  $alt = $image['alt'];

  ?>
  <div class="background-image-holder" >
    <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
  </div>
<?php endif; ?>

<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-8">

      <h1 class="page-title" data-aos="fadein" data-aos-delay="150"><?php the_title(); ?></h1>
      <hr class="short">
      <p class="lead" data-aos="fadein" data-aos-delay="200">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

    </div>
  </div>
</div>



</section>



<section class="work-tiles" >

  <?php if( have_rows('work_tiles') ):?>

  <?php while ( have_rows('work_tiles') ) : the_row();?>

  <?php $posts = get_sub_field('project'); if( $posts ): ?>

  <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

  <?php setup_postdata($post); ?>

    <div class="project-thumb project-thumb--<?php the_sub_field('tile_size'); ?> hover-element" data-aos="fade-up" data-aos-delay="300">
      <a href="<?php the_permalink(); ?>" >
        <div class="hover-element__initial" >
          <?php
          $workImage = get_field('background_image_background_image');

          if( !empty($workImage) ):

            // vars
            $url = $workImage['url'];
            $alt = $workImage['alt'];

            ?>
            <div class="background-image-holder" >
              <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
            </div>
          <?php endif; ?>
        </div>
        <div class="project-thumb__title">
          <h4><?php the_field('client'); ?></h4>
          <p class="lead"><?php the_field('one_liner'); ?></span>
          </div>
          <div class="hover-element__reveal" data-overlay="9">

          </div>
        </a>
      </div>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
  <?php endif; ?>

<?php  endwhile;?>

<?php  else :?>


<?php  endif;

?>




    </section>

    <?php get_footer();
