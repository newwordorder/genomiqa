<?php
  // check if the repeater field has rows of data
if( have_rows('posts_blocks') ) {
  // loop through the rows of data
  echo '<section>';

  while ( have_rows('posts_blocks') ) { the_row();
      // loop through the rows of data
      echo '<div class="p-4">';
         get_template_part( 'page-templates/blocks/postTextblock' );
         get_template_part( 'page-templates/blocks/image' );
        echo '</div>';
  }
  echo '</section>';

}



?>



