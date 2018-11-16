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

				<div class="row justify-content-center">

						<div class="col-sm-8">
								<h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h1>
						</div>
				</div>

				<div class="row">
						<div class="col-sm-12">
							<a href="<?php echo get_home_url(); ?>" id="" class="footer__logo">
								<img class="footer__logo" src="<?php bloginfo('template_directory'); ?>/img/logo--white.svg" alt="Logo">
							</a>
						</div>
				</div>
				<div class="row">
						<div class="col-sm-12">
								<p>© Copyright New Life Wynyard | <a href="#">Privacy Policy</a> | <a href="#">Site by Rouleur</a> </p>
						</div>
						<div class="col-sm-3">

						</div>
						<div class="col-sm-3">

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

<script>
	AOS.init();
</script>

</body>

</html>
