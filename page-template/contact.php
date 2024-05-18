<?php
/**
 * Template Name: Contact
*/
get_header(); get_template_part( 'template-parts/banner' );

$img_bg = get_theme_mod('vw_courier_serivce_pro_contact_page_image_bg');
if( get_theme_mod('vw_courier_serivce_pro_contact_page_bg_color','') ) {
  $contactpage_backg = 'background-color:'.esc_attr(get_theme_mod('vw_courier_serivce_pro_contact_page_bg_color','')).';';
}elseif( get_theme_mod('vw_courier_serivce_pro_contact_page_bg_image','') ){
  $contactpage_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_courier_serivce_pro_contact_page_bg_image')).'\')';
}else{
  $contactpage_backg = '';
}
$img_bg = get_theme_mod('vw_courier_serivce_pro_contact_page_image_bg_setting');

if( get_theme_mod('vw_courier_serivce_pro_contact_page_form_color','') ) {
  $contactpageform_backg = 'background-color:'.esc_attr(get_theme_mod('vw_courier_serivce_pro_contact_page_form_color','')).';';
}elseif( get_theme_mod('vw_courier_serivce_pro_contact_page_form_bg_image','') ){
  $contactpageform_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_courier_serivce_pro_contact_page_form_bg_image')).'\')';
}else{
  $contactpageform_backg = '';
}
?>
<?php do_action('vw_courier_serivce_pro_before_contact_title'); ?>
<section id="contact-page" class="<?php echo esc_attr($img_bg); ?>" style="<?php echo esc_attr($contactpage_backg); ?>">
  	<div class="container">
      <div class="row">
          <div class="col-md-6">
              <div class="contactpage-details" class="<?php echo esc_attr($img_bg); ?>" style="<?php echo esc_attr($contactpageform_backg); ?>">
                  <?php if(get_theme_mod('vw_courier_serivce_pro_contactpage_form_title') != ''){ ?>
                    <h3 class=""><?php echo esc_html(get_theme_mod('vw_courier_serivce_pro_contactpage_form_title')); ?></h3>
                  <?php } ?>
                  <?php if(get_theme_mod('vw_courier_serivce_pro_contactpage_form_subtitle') != ''){ ?>
                    <p class=""><?php echo esc_html(get_theme_mod('vw_courier_serivce_pro_contactpage_form_subtitle')); ?></p>
                  <?php } ?>
                  <div class="contact_location_details">
                     <div class="contactpage-icon mb-2">
                      <?php if(get_theme_mod('vw_courier_serivce_pro_contactpage_call') != ''){ ?>
                              <i class="<?php echo esc_html(get_theme_mod('vw_courier_serivce_pro_contactpage_call_icon')); ?> phone"></i>
                          <span class="ps-2">
                                <a href="tel:<?php echo esc_html( get_theme_mod('vw_courier_serivce_pro_contactpage_call') ); ?>"><?php echo esc_html( get_theme_mod('vw_courier_serivce_pro_contactpage_call') ); ?></a>
                          </span>
                      <?php } ?>
                    </div>
                    <div class="contactpage-icon mb-2">
                      <?php if(get_theme_mod('vw_courier_serivce_pro_contactpage_address') != ''){ ?>
                        <i class="<?php echo esc_html(get_theme_mod('vw_courier_serivce_pro_contactpage_address_icon')); ?> address"></i>
                        <span class="ps-2">
                        <a href="mailto:<?php echo esc_url( get_theme_mod( 'vw_courier_serivce_pro_contactpage_address' ) ); ?>" target="_blank">
                          <?php echo esc_html(get_theme_mod('vw_courier_serivce_pro_contactpage_address'));?>
                        </a>
                        </span>
                    <?php } ?>
                    </div>
                  </div>
                  <div class="contactpage_map pt-2">
                    <?php do_action('vw_courier_serivce_pro_before_map'); ?>
                      <section class="google-map text-center p-0" id="map">
                        <?php if ( get_theme_mod('vw_courier_serivce_pro_address_latitude',true) != "" && get_theme_mod('vw_courier_serivce_pro_address_longitude',true) != "" ) {?>
                          <embed width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo esc_attr(get_theme_mod('vw_courier_serivce_pro_address_latitude')); ?>,<?php echo esc_attr(get_theme_mod('vw_courier_serivce_pro_address_longitude')); ?>&hl=es;z=14&amp;output=embed"></embed>
                        <?php }?>
                      </section>
                    <?php do_action('vw_courier_serivce_pro_after_map'); ?>
                  </div>
              </div>
            </div>
              <div class="col-md-6">
        	   	<div class="contac_form">
                <?php echo do_shortcode(get_theme_mod('vw_courier_serivce_pro_contact_us_section_shortcode')); ?>
      		      </div>
  	         </div>
      </div>
  </div>
</section>
<?php do_action('vw_courier_serivce_pro_before_footer'); ?>

<?php get_footer(); ?>
