<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:400,700|Libre+Franklin:400,700" rel="stylesheet">
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>



	<!-- ******************* The Navbar Area ******************* -->
<div id="header" class="header" >

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

			<div class="" >
				<div class="header__inner">

				<a href="<?php echo get_home_url(); ?>" id="site-logo" class="header__logo">

					<img class="logo logo--white" src="<?php bloginfo('template_directory'); ?>/img/logo--white.svg" alt="New Life">
					<img class="logo logo--black" src="<?php bloginfo('template_directory'); ?>/img/logo--black.svg" alt="New Life">

				</a>

				<a id="toggleMenu" class="toggle-menu">
						<span class="line"></span>
						<span class="line"></span>
				</a>


				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'header__navigation',
						'container_id'    => 'headerNavDropdown',
						'menu_class'      => 'header-nav navigation',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
				</div>
			</div><!-- .container -->

	</div><!-- #header -->

<script>

(function($) {
		$(".toggle-menu").click(function () {
			$(".toggle-menu,.header-nav").toggleClass("is-active");
	});
})( jQuery );
</script>


	<div class="page">
