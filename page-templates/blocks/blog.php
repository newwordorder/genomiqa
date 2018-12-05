<?php // BLOG POSTS

if( get_row_layout() == 'blog_posts' ):

  
  $includePosts = get_sub_field('include_posts');
  $posts = get_sub_field('select_posts');

?>

<?php if( $includePosts == 'latest' ): ?>

<div class="container">
  <div class="row py-3">
        <div class="col-12">
          <h6 class="subTitle">Latest News</h6>
        </div>
      </div>

<div class="row">

  <?php
           // the query
           $the_query = new WP_Query( array(
              'posts_per_page' => 3,
           ));
        ?>

			<?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<article class="col-sm-6 col-md-4 blog-tile">
					<div class="blog-tile--inner">
					<a href="<?php the_permalink(); ?>" class="">
						<div class="blog-tile__thumb ">
							<?php
							$backgroundImage = get_field('background_image_background_image');

							if( !empty($backgroundImage) ):

								// vars
								$url = $backgroundImage['url'];
								$alt = $backgroundImage['alt'];

								$size = '600x400';
								$thumb = $backgroundImage['sizes'][ $size ];
								$width = $backgroundImage['sizes'][ $size . '-width' ];
								$height = $backgroundImage['sizes'][ $size . '-height' ];

								?>
								<div class="background-image-holder ">
									<img class="" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
								</div>
							<?php endif; ?>
						</div>
						<div class="blog-tile__details">
							<h6><?php $category_detail = get_the_category();
							foreach($category_detail as $cd){
								echo $cd->cat_name;
								}
							?>
							</h6>
							<h5><?php the_title(); ?></h5>
							<a class="btn btn--link" style="padding:0; width:100%; display:flex; justify-content: space-between;align-items: center;" href="<?php the_permalink(); ?>">Read <i class="fas fa-arrow-right"></i></a>

						</div>
					</a>
							</div>

        </article>

			<?php endwhile;

          // reset post data
          wp_reset_postdata();

      ?>
    <?php endif; ?>
			

    </div>
 </div> 
 
 <?php endif; ?>
 <?php if( $includePosts == 'select' ): ?>
  <div class="container">
  <div class="row py-3">
        <div class="col-12">
          <h6 class="subTitle">Important News</h6>
        </div>
      </div>
    <div class="row">
      <?php if( $posts ): ?>
        <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
          <?php setup_postdata($post); ?>

            	<article class="col-sm-6 col-md-4 blog-tile">
					<div class="blog-tile--inner">
					<a href="<?php the_permalink(); ?>" class="">
						<div class="blog-tile__thumb ">
							<?php
							$backgroundImage = get_field('background_image_background_image');

							if( !empty($backgroundImage) ):

								// vars
								$url = $backgroundImage['url'];
								$alt = $backgroundImage['alt'];

								$size = '600x400';
								$thumb = $backgroundImage['sizes'][ $size ];
								$width = $backgroundImage['sizes'][ $size . '-width' ];
								$height = $backgroundImage['sizes'][ $size . '-height' ];

								?>
								<div class="background-image-holder ">
									<img class="" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
								</div>
							<?php endif; ?>
						</div>
						<div class="blog-tile__details">
							<h6><?php $category_detail = get_the_category();
							foreach($category_detail as $cd){
								echo $cd->cat_name;
								}
							?>
							</h6>
							<h5><?php the_title(); ?></h5>
							<a class="btn btn--link" style="padding:0; width:100%; display:flex; justify-content: space-between;align-items: center;" href="<?php the_permalink(); ?>">Read <i class="fas fa-arrow-right"></i></a>

						</div>
					</a>
							</div>

        </article>

          <?php endforeach; ?>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
<?php endif; // end blog posts block ?>