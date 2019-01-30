<?php if (get_sub_field('include_buttons') == 'yes') : ?>

  <?php if (have_rows('buttons')) : ?>
  <div class="buttons">
    <?php while (have_rows('buttons')) : the_row();
    $buttonText = get_sub_field('button_text');
    $linkType = get_sub_field('link_type');
    $url = get_sub_field('url');
    $pageUrl = get_sub_field('pageurl');
    $file = get_sub_field('file');
    $buttonStyle = get_sub_field('button_style');
    ?>

      <?php if ($linkType !== "file") : ?>
        <a href="<?php if ($linkType == "page") : echo $pageUrl;
                endif; ?>
                <?php if ($linkType == "url") : echo $url;
                endif; ?>" class="btn btn--<?php echo $buttonStyle ?>">
                <?php if ($buttonStyle == "outline") : echo '<span>';
                endif; ?>
                <?php echo $buttonText ?>
                <?php if ($buttonStyle == "outline") : echo '</span>';
                endif; ?> 
                <?php if ($buttonStyle == "link") : echo '<i class="far fa-arrow-right"></i>';
                endif; ?></a>
      <?php else : ?> 
      <form method="get" action="<?php echo $file; ?>">
        <button class="btn btn--<?php echo $buttonStyle ?>" type="submit">
        <?php if ($buttonStyle == "outline") : echo '<span>';
        endif; ?><?php echo $buttonText ?>
        <?php if ($buttonStyle == "outline") : echo '</span>';
        endif; ?>
        <?php if ($buttonStyle == "link") : echo '<i class="far fa-arrow-right"></i>';
        endif; ?></button>
      </form>
      <?php endif; ?>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>
<?php endif; ?>
