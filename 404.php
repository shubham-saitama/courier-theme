<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package vw-courier-serivce-pro
 */
	get_header();
	get_template_part( 'template-parts/banner' );

	if( get_theme_mod('vw_courier_serivce_pro_404_page_bgcolor','') ) {
	 $error_page_back = 'background-color:'.esc_attr(get_theme_mod('vw_courier_serivce_pro_404_page_bgcolor','')).';';
  }elseif( get_theme_mod('vw_courier_serivce_pro_404_page_bgimage','') ){
	 $error_page_back = 'background-image:url(\''.esc_url(get_theme_mod('vw_courier_serivce_pro_404_page_bgimage')).'\')';
	}else{
	 $error_page_back='';
	}
	$img_bg = get_theme_mod('vw_courier_serivce_pro_404_page_bg_attachment');
?>
<section class="content_page error-page <?php echo esc_attr($img_bg); ?>" style="<?php echo esc_attr($error_page_back);?>">
	<div class="container">
		<div class="row text-center justify-content-center">
			<div class="col-md-8 tablet-error">
			<img class="errorimg" src="<?php echo esc_html(get_theme_mod('vw_courier_serivce_pro_error_temp_bg_images')); ?>">
				<div class="page-content error_bgs mt-4">
					<?php if ( get_theme_mod('vw_courier_serivce_pro_404_page_heading') != ''): ?>
						<h2 class="error-heading mb-4">
							<?php echo esc_html(get_theme_mod('vw_courier_serivce_pro_404_page_heading')); ?>
						</h2>
					<?php endif; ?>
					<?php if ( get_theme_mod('vw_courier_serivce_pro_404_page_content') != ''): ?>
						<p class="error-para mt-3">
							<?php echo esc_html(get_theme_mod('vw_courier_serivce_pro_404_page_content')); ?>
						</p>
					<?php endif; ?>
				 <?php if ( get_theme_mod('vw_courier_serivce_pro_404_page_button_text') != ''): ?>
					 <a  class="btn black mt-3" href="<?php echo esc_url( home_url() ); ?>">
						 <?php echo esc_html(get_theme_mod('vw_courier_serivce_pro_404_page_button_text')); ?>
					 </a>
				 <?php endif; ?>
		   <div class="clearfix"></div>
	   </div>
	</div>
</div>
</div>
</section>
<?php get_footer(); ?>
