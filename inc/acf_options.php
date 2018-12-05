<?php 
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'ACF Pre Footer',
		'menu_title'	=> 'ACF Pre Footer',
		'menu_slug' 	=> 'acf-pre-footer',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}
?>