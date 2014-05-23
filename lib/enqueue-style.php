<?php
/*********************
Enqueue the proper CSS
if you use Sass.
*********************/
if( ! function_exists( 'famo_enqueue_style' ) ) {
	function famo_enqueue_style()
	{
		// foundation stylesheet
		wp_register_style( 'famo-stylesheet', get_stylesheet_directory_uri() . '/css/app.css', array(), '' );
        wp_register_style( 'cloud-typography', '//cloud.typography.com/7130292/659864/css/fonts.css', array(), '' );


		// Register style		
		wp_enqueue_style( 'famo-stylesheet' );
        wp_enqueue_style( 'cloud-typography' );

	}
}
add_action( 'wp_enqueue_scripts', 'famo_enqueue_style' );
?>
