<?php 

$posts = get_field('related_products');

if( $posts ): ?>
<section class="bg--image space--lg" style="background-image:url('http://genomiqa.local/wp-content/uploads/2018/11/bg.png');">
 
<div class="container space-below--<?php echo $spaceBelow ?>">
<div class="row">
    <div class="col-12">
        <h6 class="subTitle">The Full Picture</h6>
        <h4>Other products and services</h4>
    </div>
</div>
      <div class="row justify-content-center">

    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <div class="col-md-6  feature-column">
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
    </section>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>