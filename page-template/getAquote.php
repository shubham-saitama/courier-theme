<?php
/**
 * Template Name:Get A Quote Template
 *
 *
 */

get_header();
// get_template_part('template-parts/banner');

if (get_theme_mod('vw_courier_serivce_pro_getAquote_bgcolor', '')) {
  $about_page_back = 'background-color:' . esc_attr(get_theme_mod('vw_courier_serivce_pro_getAquote_bgcolor', '')) . ';';
} elseif (get_theme_mod('vw_courier_serivce_pro_getAquote_bgimage', '')) {
  $about_page_back = 'background-image:url(\'' . esc_url(get_theme_mod('vw_courier_serivce_pro_getAquote_bgimage')) . '\')';
} else {
  $about_page_back = '';
}
$img_bg = get_theme_mod('vw_courier_serivce_pro_getAquote_bg_attachment');

if (get_theme_mod('vw_courier_serivce_pro_getAquote_bgcolor', '')) {
  $getAquote_back = 'background-color:' . esc_attr(get_theme_mod('vw_courier_serivce_pro_getAquote_bgcolor', '')) . ';';
} elseif (get_theme_mod('vw_courier_serivce_pro_getAquote_bgimage', '')) {
  $getAquote_back = 'background-image:url(\'' . esc_url(get_theme_mod('vw_courier_serivce_pro_getAquote_bgimage')) . '\')';
} else {
  $getAquote_back = '';
}
$team_bg = get_theme_mod('vw_courier_serivce_pro_getAquote_bg_attachment');
$quotecontactForm = get_theme_mod('vw_courier_serivce_pro_getaquote_from_shortcode');
get_template_part('template-parts/banner'); ?>
<section class="getAquote">
  <div class="container">
    <div class="row">
      <div class="getaquote-header heading">
        <div class="heading-tagline">
          <?php echo get_theme_mod('vw_courier_serivce_pro_getaquote_page_heading_tag'); ?>
        </div>
        <h2 class="">
          <?php echo get_theme_mod('vw_courier_serivce_pro_getaquote_page_heading'); ?>
        </h2>
      </div>
      <div class="get-in-touch-options">
        <div class="GetInTouchrow">
          <div class="contact-option ">
            <div class="contact-icon">
              <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_getaquote_icon1'); ?>" alt="get in touch icons">
            </div>
            <div class="contact-info">
              <p class="contact-label">
                <?php echo get_theme_mod('vw_courier_serivce_pro_getaquote_telephone'); ?>
              </p>
              <a href="" class="contact1">
                <?php echo get_theme_mod('vw_courier_serivce_pro_getaquote_telephone_number'); ?>
              </a>

              <a href="" class="contact2">
                <?php echo get_theme_mod('vw_courier_serivce_pro_getaquote_telephone_number2'); ?>
              </a>
            </div>
          </div>
          <div class="contact-option ">
            <div class="contact-icon">
              <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_getaquote_icon2'); ?>" alt="get in touch icons">
            </div>
            <div class="contact-info">
              <p class="contact-label">
                <?php echo get_theme_mod('vw_courier_serivce_pro_getaquote_email'); ?>
              </p>
              <a href="" class="contact2">
                <?php echo get_theme_mod('vw_courier_serivce_pro_getaquote_email_id'); ?>
              </a>
            </div>
          </div>
          <div class="contact-option ">
            <div class="contact-icon">
              <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_getaquote_icon3'); ?>" alt="get in touch icons">
            </div>
            <div class="contact-info">
              <p class="contact-label">
                <?php echo get_theme_mod('vw_courier_serivce_pro_getaquote_address'); ?>
              </p>
              <a href="" class="contact1">
                <?php echo get_theme_mod('vw_courier_serivce_pro_getaquote_office_address'); ?>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

<section class="freequote section-space">
  <div class="container">
    <div class="row">
      <div class="quote-heading text-center">
        <h4>
          <?php echo get_theme_mod('vw_courier_serivce_pro_getaquote_from_heading'); ?>
        </h4>
        <span class="quoteTagline">
          <?php echo get_theme_mod('vw_courier_serivce_pro_getaquote_from_heading_tagline'); ?>
        </span>
      </div>
      <div class="form-wrapper">
        <?php echo do_shortcode($quotecontactForm); ?>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>