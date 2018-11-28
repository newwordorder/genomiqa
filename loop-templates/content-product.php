<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

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
