<?php
/**
 * Widgets area
 *
 * @package BuseguVideosuganda
 * @author Busegu Videos Uganda
 * @link https://buseguvideosuganda.com
 */

// class

$lines = mfn_opts_get('sidebar-lines');

$class = $lines;

if( 'lines-hidden' != $lines ){
	$class .= ' has-lines';
}

$class .= ' style-'. mfn_opts_get('sidebar-style','simple');

// output -----

$sidebar = mfn_sidebar();

if( isset( $sidebar['sidebar']['first'] ) ){
	echo '<div class="mcb-sidebar sidebar sidebar-1 four columns '. esc_attr( $class ) .'">';
		echo '<div class="widget-area">';
			echo '<div class="inner-wrapper-sticky clearfix">';
				dynamic_sidebar( $sidebar['sidebar']['first'] );
			echo '</div>';
		echo '</div>';
	echo '</div>';
}

if( isset( $sidebar['sidebar']['second'] ) ){
	echo '<div class="mcb-sidebar sidebar sidebar-2 four columns '. esc_attr( $class ) .'">';
		echo '<div class="widget-area">';
			echo '<div class="inner-wrapper-sticky clearfix">';
				dynamic_sidebar( $sidebar['sidebar']['second'] );
				echo '</div>';
		echo '</div>';
	echo '</div>';
}
