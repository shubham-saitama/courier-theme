<?php
/**
 * Template Name: Home Page
 */
get_header();
  //if ( ThemeWhizzie::get_the_suspension_status() == 'false' ) {
	$section_order ='';
	$section_order = explode( ',', get_theme_mod( 'vw_courier_serivce_pro_section_ordering_settings_repeater') );
    foreach( $section_order as $key => $value ){
	   if($value !=''){
	   		get_template_part('template-parts/home/'.$value);
        }
    }
 //}
get_footer(); ?>
