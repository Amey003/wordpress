<?php

if ( !defined( 'FW' ) ) {
    return;
}

if(function_exists('olympus_stunning_get_option_prefix')){
	function olympus_stunning_get_option_prefix() {
	    $prefix = '';
	    if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	        $prefix = 'woocommerce_';
	    } elseif ( function_exists( 'tribe_is_event_query' ) && tribe_is_event_query() ) {
	        $prefix = 'events_';
	    } elseif ( function_exists( 'bp_current_component' ) && bp_current_component() ) {
	        $prefix = 'buddypress_';
	    } elseif ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
	        $prefix = 'bbpress_';
	    } elseif( is_single() && get_post_type() == 'post' ){
            $prefix = 'single_post_';
        }

	    return $prefix;
	}
}

if(function_exists('olympus_stunning_get_option_prefix_visibility')){
	function olympus_stunning_get_option_prefix_visibility() {
	    $prefix = '';
	    if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	        $prefix = 'woocommerce_';
	    } elseif ( function_exists( 'tribe_is_event_query' ) && tribe_is_event_query() ) {
	        $prefix = 'events_';
	    } elseif ( function_exists( 'bp_current_component' ) && bp_current_component() ) {
	        $prefix = 'buddypress_';
	    } elseif ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
	        $prefix = 'bbpress_';
	    } elseif( is_single() && get_post_type() == 'post' ){
            $prefix = 'single_post_';
        }

	    return $prefix;
	}
}