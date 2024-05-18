<?php
/**
 * The Header for our theme.
 *
 * @package vw-courier-serivce-pro
 */
 $sticky_header="";
if ( get_theme_mod('vw_courier_serivce_pro_header_section_sticky',true) == "1" ) {

	$sticky_header="yes";
}else{

	$sticky_header="no";
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <?php wp_body_open(); ?>

  <header id="masthead" class="site-header">

    <!-- before header hook -->
    <?php do_action( 'vw_courier_serivce_pro_before_topbar' ); ?>
    <?php get_template_part('template-parts/header/top-bar'); ?>

    <?php
      $img_bg = get_theme_mod('vw_courier_serivce_pro_headerhomebg_attachment');
      if( get_theme_mod('vw_courier_serivce_pro_headerhomebg_color','') ) {
      $background_setting = 'background-color:'.esc_attr(get_theme_mod('vw_courier_serivce_pro_headerhomebg_color','')).';';
      }elseif( get_theme_mod('vw_courier_serivce_pro_headerhomebg_image','') ){
      $background_setting = 'background-image:url(\''.esc_url(get_theme_mod('vw_courier_serivce_pro_headerhomebg_image')).'\')';
      }else{
      $background_setting = '';
      }
    ?>
    <?php if ( get_theme_mod('vw_courier_serivce_pro_products_spinner_enable',true) == "1" ) { ?>
      <div class="eco-box">
        <!-- <div class="loading-window">
            <div class="car">
                <div class="strike"></div>
                <div class="strike strike2"></div>
                <div class="strike strike3"></div>
                <div class="strike strike4"></div>
                <div class="strike strike5"></div>
                <div class="car-detail spoiler"></div>
                <div class="car-detail back"></div>
                <div class="car-detail center"></div>
                <div class="car-detail center1"></div>
                <div class="car-detail front"></div>
                <div class="car-detail wheel"></div>
                <div class="car-detail wheel wheel2"></div>
            </div>
        </div> -->
          <img class="loader-inner" src="<?php echo esc_url(get_theme_mod( 'vw_courier_serivce_pro_spinner_image',get_template_directory_uri().'/assets/new-images/loaders.gif')); ?>">
      </div>
    <?php } ?>
    <a class="screen-reader-text skip-link" href="#maincontent" ><?php echo esc_html(get_theme_mod('vw_courier_serivce_pro_header_skip_link')); ?></a>

    <div id="header" class="Header <?php echo esc_attr($img_bg); ?>" style="<?php echo esc_attr($background_setting);  ?>">
      <?php
        do_action( 'vw_courier_serivce_pro_before_header' );
				 //get_template_part('template-parts/header/middle-header');
        get_template_part('template-parts/header/content-header');
      ?>
    </div>
  </header>
