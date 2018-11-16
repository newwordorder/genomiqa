<?php // CTA BLOCK

if( get_row_layout() == 'cta' ):

$layout = get_sub_field('layout');
$text = get_sub_field('text_block');

$spaceBelow = get_sub_field('text_image_space_below');


?>

  <div class="container space-below--<?php echo $spaceBelow ?>">

      <div class="row align-items-center justify-content-center">


          <?php if( $layout == 'horizontal' ): ?>

            <div class="col-md-8 cta__text">
                <?php echo $text ?>

            </div>
            <div class="col-md-4 cta__buttons">
                <?php get_template_part( 'page-templates/blocks/block-partials/buttons' ); ?>
            </div>

          <?php endif; // end horizontal ?>

          <?php if( $layout == 'vertical' ): ?>

            <div class="col-md-8 text-center">
                <?php echo $text ?>

                <?php get_template_part( 'page-templates/blocks/block-partials/buttons' ); ?>
            </div>

          <?php endif; // end vertical ?>

      </div>
    </div>

<?php endif;

?>
