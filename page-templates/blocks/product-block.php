<?php  // Products Blog

if( get_row_layout() == 'product_block' ):?>
<?php 
    $posts = get_sub_field('product_block_product_block');
if( $posts ): ?>
 <div class="container space-below--<?php echo $spaceBelow ?>">
      <div class="row justify-content-center">

    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <div class="col-lg-4  feature-column">
        <div class="product">
            <div class="product--tile" style="background: url('<?php echo get_the_post_thumbnail_url( $post->ID ); ?>'); background-size:cover;" data-overlay="4">
                <?php the_title( sprintf( '<h5 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                '</a></h5>' ); ?>
                <h2 class="entry-subtitle"><?php echo get_field('subtitle'); ?></h2>

            </div>
            <a class="product--button" href="<?php echo get_permalink(); ?>">
                        <p>Learn more <i class="far fa-arrow-right"></i></p>
        </a>

        </div>
        </div>
    <?php endforeach; ?>
    </div>
    </div>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
<?php endif; ?>
