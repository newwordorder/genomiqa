<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

?>

<footer id="footer">
		<div class="container text-center">

				<div class="row">
						<div class="col-sm-2">
							<a href="<?php echo get_home_url(); ?>" id="" class="footer__logo">
								<img class="footer__logo" src="<?php bloginfo('template_directory'); ?>/img/logo--black.svg" alt="Logo">
							</a>
						</div>
						<div class="col-sm-4">
								<p>© Copyright genomiQa PTY LTD </p>
						</div>
						<div class="col-sm-6 d-flex justify-content-end">
								<p class="px-2"><a href="#">Privacy & data Policy</a></p>
								<p class="px-2"><a href="#">Terms & Conditions</a></p>

						</div>
				</div>
</footer>





<?php wp_footer(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/header.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/flickity.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/fontawesome-all.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/parallax.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/typed.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/smooth-scroll.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/ytplayer.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/aos.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/slider.js"></script>

<script>
$('body').on('mouseenter mouseleave','.dropdown',function(e){
  var _d=$(e.target).closest('.dropdown');
  if (e.type === 'mouseenter')_d.addClass('show');
  setTimeout(function(){
    _d.toggleClass('show', _d.is(':hover'));
    $('[data-toggle="dropdown"]', _d).attr('aria-expanded',_d.is(':hover'));
  },300);
});</script>

<script>
	AOS.init();
</script>

</body>

</html>
