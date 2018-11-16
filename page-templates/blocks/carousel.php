<?php // CAROUSEL

if( get_row_layout() == 'carousel' ):

  $arrows = get_sub_field('arrows');
  $paging = get_sub_field('paging');
  $autoplay = get_sub_field('autoplay');
  $timing = get_sub_field('timing');
  $width = get_sub_field('width');
  $spaceBelow = get_sub_field('space_below');


?>



<div class="container space-below--<?php echo $spaceBelow ?>">
  <div class="row justify-content-center">
    <div class="col-md-8">

        <?php echo $textBlock ?>

    </div>
  </div>
</div>


<?php endif; // end carousel block ?>
