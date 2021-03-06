<?php
if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

class Mfn_Helper {

	/**
	 * Initialises and connects the WordPress Filesystem
	 */

	public static function filesystem(){

		global $wp_filesystem;

		if( ! defined( 'FS_METHOD' ) ){
			define( 'FS_METHOD', 'direct' );
		}

		if( ! defined( 'FS_CHMOD_DIR' ) ){
			define( 'FS_CHMOD_DIR', ( 0755 & ~ umask() ) );
		}

		if( ! defined( 'FS_CHMOD_FILE' ) ){
			define( 'FS_CHMOD_FILE', ( 0644 & ~ umask() ) );
		}

		if( empty( $wp_filesystem ) ){
			require_once wp_normalize_path( ABSPATH .'/wp-admin/includes/file.php' );
		}

		WP_Filesystem();

		return $wp_filesystem;
	}

	public static function generate_css($mfn_styles, $post_id){

	  $wp_filesystem = self::filesystem();

		$upload_dir = wp_upload_dir();
		$path_be = wp_normalize_path( $upload_dir['basedir'] .'/buseguvideosuganda' );
		$path_css = wp_normalize_path( $path_be .'/css' );
		$path = wp_normalize_path( $path_css .'/post-'.$post_id.'.css' );

		if( ! file_exists( $path_be ) ){
			wp_mkdir_p( $path_be );
		}

		if( ! file_exists( $path_css ) ){
			wp_mkdir_p( $path_css );
		}
		$css = "/* Local Page Style */\n";
		foreach($mfn_styles as $st){
			$css .= $st;
		}

		$wp_filesystem->put_contents( $path, $css, FS_CHMOD_FILE );

	}

	/**
	 * Registration modal
	 */

	public static function the_modal_register(){

		?>

			<div class="mfn-register-now">
				<div class="inner-content">
					<div class="be">
						<img class="be-logo" src="<?php echo get_theme_file_uri( 'muffin-options/svg/others/be-gradient.svg' ); ?>" alt="Be">
					</div>
					<div class="info">
						<img alt="" src="<?php echo get_theme_file_uri( 'muffin-options/svg/others/register-now.svg' ); ?>" width="120">
						<h4>Please register the license<br />to get the access to Muffin Options</h4>
						<p class="">This page reload is required after theme registration</p>
						<a class="mfn-btn mfn-btn-green btn-large" href="admin.php?page=buseguvideosuganda" target="_blank"><span class="btn-wrapper">Register now</span></a>
					</div>
				</div>
			</div>

		<?php

	}

}
