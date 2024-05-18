<?php
/**
 * Template to show the content of Slider
 *
 * @package vw-courier-serivce-pro
 */

$section_hide = get_theme_mod('vw_courier_serivce_pro_slider_enabledisable');
if ('Disable' == $section_hide) { ?>
  <?php
  return;
}

if (get_theme_mod('vw_courier_serivce_pro_slider_bgcolor', '')) {
  $slider_back = 'background-color:' . esc_attr(get_theme_mod('vw_courier_serivce_pro_slider_bgcolor', '')) . ';';
} elseif (get_theme_mod('vw_courier_serivce_pro_slider_bgimage', '')) {
  $slider_back = 'background-image:url(\'' . esc_url(get_theme_mod('vw_courier_serivce_pro_slider_bgimage')) . '\')';
} else {
  $slider_back = '';
}
$img_bg = get_theme_mod('vw_courier_serivce_pro_slider_bgimage_setting');
$slideCount = get_theme_mod('vw_courier_serivce_pro_slide_number');
$bannerForm_shortcode = get_theme_mod('vw_courier_serivce_pro_cost_calcuator_shortcode');
$menu = get_theme_mod('vw_courier_serivce_pro_header_res_menu');
?>
<section id="slider" class="<?php echo esc_attr($img_bg); ?> section-space"
  style="<?php echo esc_attr($slider_back); ?> ">
  <div class="container-fluid p-0">
    <div class="row">
      <div class="owl-carousel text-center">
        <?php for ($i = 1; $i <= $slideCount; $i++) { ?>
          <div class="slider-attr-content">
            <img src="<?php echo esc_url(get_theme_mod('vw_courier_serivce_pro_slide_image' . $i)); ?>"
              alt="slider image">
          </div>
        <?php } ?>
      </div>
      <div class="banner-content">
        <div class="container">
          <div class="row align-items-center">
            <div class="banner-left col-lg-7 col-md-12 col-sm-12">
              <span class="banner-tag ">
                <?php echo get_theme_mod('vw_courier_serivce_pro_banner_tag'); ?>
              </span>
              <h1 class="banner-heading">
                <?php echo get_theme_mod('vw_courier_serivce_pro_slider_heading'); ?>
              </h1>
              <p class="slider-text">
                <?php echo get_theme_mod('vw_courier_serivce_pro_slider_text'); ?>
              </p>
              <a href="<?php echo get_permalink(get_page_by_title('Service')); ?>" class="btn">
                <?php echo get_theme_mod('vw_courier_serivce_pro_slider_btntext') ?>
              </a>
              <div class="dots-container">

              </div>

            </div>
            <div class="banner-form desktop">
              <?php echo do_shortcode($bannerForm_shortcode); ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<section class="banner-form-mobile">
  <div class="container">
    <div class="row">
      <div class="banner-form mobile">
        <?php echo do_shortcode($bannerForm_shortcode); ?>
      </div>
    </div>
  </div>
</section>
