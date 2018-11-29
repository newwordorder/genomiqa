<?php // TEXT & TEXT BLOCK

if( get_row_layout() == 'text_and_text' ):

$text = get_sub_field('text_block');
$text2 = get_sub_field('text_block_2');

$layout = get_sub_field('layout');
$flipLayout = get_sub_field('flip_layout');
$spaceBelow = get_sub_field('space_below');


?>

  <div class="container space-below--<?php echo $spaceBelow ?>">
    <div class="row flippable <?php if( $flipLayout == 'yes' ): echo 'flippable--flip'; endif; ?>">
        <div class=" flippable__text <?php if( $flipLayout == 'yes' ): if( $layout == '1/3' ): echo 'col-md-9'; endif; ?> <?php if( $layout == '1/2' ): echo 'col-md-7'; endif; ?> <?php if( $layout == '2/3' ): echo 'col-md-5'; endif; else: if( $layout == '1/3' ): echo 'col-md-8'; endif; ?> <?php if( $layout == '1/2' ): echo 'col-md-6'; endif; ?> <?php if( $layout == '2/3' ): echo 'col-md-4'; endif; endif; ?>" >
            <?php echo $text ?>
        </div>
        <div class="<?php if( $layout == '1/3' ): echo 'col-md-4'; endif; ?> <?php if( $layout == '1/2' ): echo 'col-md-6'; endif; ?> <?php if( $layout == '2/3' ): echo 'col-md-8'; endif; ?> flippable__text">
            <?php echo $text2 ?>
        </div>
    </div>
  </div>

<?php endif; //end text_image row

?>
