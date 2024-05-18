<?php
/**
 * Template to show the use
 *
 * @package vw_courier_serivce_pro
 */
$section_hide = get_theme_mod('vw_courier_serivce_pro_about_enable');
if ('Disable' == $section_hide) {
  return;
}
if (get_theme_mod('vw_courier_serivce_pro_about_bgcolor', '')) {
  $per_back = 'background-color:' . esc_attr(get_theme_mod('vw_courier_serivce_pro_about_bgcolor', '')) . ';';
} elseif (get_theme_mod('vw_courier_serivce_pro_about_bgimage', '')) {
  $per_back = 'background-image:url(\'' . esc_url(get_theme_mod('vw_courier_serivce_pro_about_bgimage')) . '\')';
} else {
  $per_back = '';
}
?>
<section id="About-us" class="section-space" style="<?php echo esc_attr($per_back); ?>">
  <div class="container">
    <div class="row align-item-center">
      <div class="col-lg-7 col-md-12 mb-5 col-sm-12">
        <div class="about-image-wrap">
          <div class="img-above-wrap">
            <img class="img-above" src="<?php echo get_theme_mod('vw_courier_serivce_pro_about_left_main_image'); ?>"
              alt="">
            <div class="years">
              <?php echo get_theme_mod('vw_courier_serivce_pro_about_years_of_service'); ?>
              <p><?php echo get_theme_mod('vw_courier_serivce_pro_about_years_of_service_text'); ?></p>
            </div>
          </div>
          <div class="img-below-wrap">
            <img class="img-below" src="<?php echo get_theme_mod('vw_courier_serivce_pro_about_left_image_below'); ?>"
              alt="">
          </div>

        </div>
      </div>
      <div class="col-lg-5 col-md-12 mb-5 col-sm-12">
        <div class="about-inner">
          <div class="about-header heading">
            <div class="heading-tagline">
              <?php echo get_theme_mod('vw_courier_serivce_pro_about_section_headding_tagline'); ?>
            </div>
            <h2 class="left">
              <?php echo get_theme_mod('vw_courier_serivce_pro_about_section_headding'); ?>
            </h2>
          </div>
          <p>
            <?php echo get_theme_mod('vw_courier_serivce_pro_about_section_text'); ?>
          </p>
          <div class="Achivement_block">
            <div class="box-wrapper">
              <div class="image">
                <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_about_achivement_icon1'); ?>" alt="">
              </div>
              <div class="text">
                <?php echo get_theme_mod('vw_courier_serivce_pro_about_achivement1'); ?>
              </div>
            </div>
            <div class="box-wrapper">
              <div class="image">
                <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_about_achivement_icon2'); ?>" alt="">
              </div>
              <div class="text">
                <?php echo get_theme_mod('vw_courier_serivce_pro_about_achivement2'); ?>
              </div>
            </div>
          </div>
          <li class="AchivementCheck">
            <i class="<?php echo get_theme_mod('vw_courier_serivce_pro_achivement_icon'); ?>" aria-hidden="true"></i>
            <?php echo get_theme_mod('vw_courier_serivce_pro_about_achivement_point1'); ?>
          </li>
          <li class="AchivementCheck">
            <i class="<?php echo get_theme_mod('vw_courier_serivce_pro_achivement_icon'); ?>" aria-hidden="true"></i>
            <?php echo get_theme_mod('vw_courier_serivce_pro_about_achivement_point2'); ?>
          </li>
          <a class="btn black"
            href="<?php echo get_permalink(get_page_by_title('About Us')); ?>"><?php echo get_theme_mod('vw_courier_serivce_pro_about_btn_text'); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>