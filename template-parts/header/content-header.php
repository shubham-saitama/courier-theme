<?php

$header_widgets_section = get_theme_mod('vw_courier_serivce_pro_header_widgets_enable');
if ('Disable' == $header_widgets_section) {
  return;
}
if (get_theme_mod('vw_courier_serivce_pro_header_widgets_bgcolor', '')) {
  $background_setting = 'background-color:' . esc_attr(get_theme_mod('vw_courier_serivce_pro_header_widgets_bgcolor', '')) . ';';
} elseif (get_theme_mod('vw_courier_serivce_pro_header_bgimage', '')) {
  $background_setting = 'background-image:url(' . esc_attr(get_theme_mod('vw_courier_serivce_pro_header_bgimage', '')) . ');';
} else {
  $background_setting = '';
}

if (get_theme_mod('vw_logistics_servics_topbar_background_color', '')) {
  $background_setting2 = 'background-color:' . esc_attr(get_theme_mod('vw_logistics_servics_topbar_background_color', '')) . ';';
}  else {
  $background_setting2 = '';
}
$img_bg = get_theme_mod('vw_courier_serivce_pro_topbar_image_bg');
?>
<div id="vw-sticky-menu">
  <div class="container" style="<?php echo $background_setting ?>">
    <div class="row align-items-center justify-content-between">
      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-4">
        <div class="vw-logo" id="site-sticky-menu1">
          <?php
          $logo = get_theme_mod('custom_logo');
          if ($logo != '') {
            if (has_custom_logo()) {
              vw_courier_serivce_pro_the_custom_logo();
            }
          } else { ?>
            <?php if (get_theme_mod('vw_courier_serivce_pro_display_default_logo', true) != false) { ?>
              <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" target="_blank"><img
                  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/new-images/Logo.png"
                  alt="<?php bloginfo('name'); ?>" /></a>
            <?php } ?>
          <?php } ?>
          <div class="logo-text">
            <?php if (get_theme_mod('vw_courier_serivce_pro_display_title') != false) { ?>
              <h2><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                  <?php esc_attr(bloginfo('name')); ?>
                </a></h2>
            <?php }
            if (get_theme_mod('vw_courier_serivce_pro_display_tagline') != false) {
              $description = get_bloginfo('description', 'display');
              if ($description || is_customize_preview()): ?>
                <p>
                  <?php echo esc_html($description); ?>
                </p>
              <?php endif;
            }
            ?>
          </div>
        </div>
      </div>
      <div class="toggle-nav mobile-menu col-1">
        <div role="button" on="tap:sidebar1.toggle" tabindex="0" class="hamburger" id="open_nav"><span
            class="screen-reader-text">
            <?php echo esc_html('Menu', 'vw-courier-serivce-pro'); ?>
          </span>
          <i
            class="<?php echo esc_html(get_theme_mod('vw_courier_serivce_pro_res_open_menu_icon', 'fas fa-bars')); ?> menu-open"></i>
          <i class="fa fa-times menu-close"></i>
        </div>
      </div>
      <div class="row col-lg-10 col-md-12 col-6 align-items-center justify-content-end p-0 g-0">
        <section id="site_top" class="top_bar col-md-6 col-sm-6 col-6"
          style="<?php echo esc_attr($background_setting2); ?>">
          <div class="container container-full-width">
            <div class="row justify-content-between">
              <div class="col-xl-8 col-lg-8 col-md-12 align-self-center topbar-left">
                <div class="topbar-address">
                  <i class="<?php echo get_theme_mod('vw_courier_serivce_pro_topbar_left_icon_1'); ?>"
                    aria-hidden="true"></i>
                  <span class="topbar data"><a target="_blank"
                      href="<?php echo get_theme_mod('vw_courier_serivce_pro_topbar_left_link_1'); ?>"><?php echo get_theme_mod('vw_courier_serivce_pro_topbar_left_1'); ?></a></span>
                </div>
                <div class="topbar-mail">
                  <i class="<?php echo get_theme_mod('vw_courier_serivce_pro_topbar_left_icon_2'); ?>"
                    aria-hidden="true"></i><span class="topbar data"><a target="_blank"
                      href="<?php echo get_theme_mod('vw_courier_serivce_pro_topbar_left_link_2'); ?>"><?php echo get_theme_mod('vw_courier_serivce_pro_topbar_left_2'); ?></a></span>
                </div>
                <div class="topbar-timings">
                  <i class="<?php echo get_theme_mod('vw_courier_serivce_pro_topbar_left_icon_3'); ?>"
                    aria-hidden="true"></i>
                  <span class="topbar data"><a target="_blank"
                      href="<?php echo get_theme_mod('vw_courier_serivce_pro_topbar_left_link_3'); ?>"><?php echo get_theme_mod('vw_courier_serivce_pro_topbar_left_3'); ?></a></span>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-12 align-self-center topbar-text topbar-text-contact">
                <div class="justify-content-end d-flex after-line position-relative">
                  <div class="socialbox">

                    <?php
                    for ($i = 1; $i <= 4; $i++) {
                      $icon_class = get_theme_mod('vw_courier_serivce_pro_social_icons_' . $i);
                      $social_link = get_theme_mod('vw_courier_serivce_pro_social_icons_link_' . $i);
                      if (!empty($icon_class)) {
                        echo '<li><a target="_blank" href="' . esc_attr($social_link) . '"><i class="' . esc_attr($icon_class) . '"></i></a></li>';
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
        </section>

        <div class="col-xl-8 col-lg-7 col-md-0 col-sm-0 col-1 text-center">
          <div class="innermenubox">
            <div class="main-header">
              <div id="mySidenav" class="sidenav">
                <nav id="site-navigation" class="main-navigation">
                  <?php
                  wp_nav_menu(
                    array(
                      'theme_location' => 'primary',
                      'container_class' => 'menu clearfix',
                      'menu_class' => 'clearfix',
                      'items_wrap' => '<ul id="%1$s" class="%2$s primary_nav">%3$s</ul>',
                      'fallback_cb' => 'wp_page_menu',
                    )
                  );
                  ?>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="quote col-xl-3 col-lg-2 col-md-6 col-sm-6 col-8 p-0">
          <a href="<?php echo get_permalink(get_page_by_title('Get A Quote')); ?>">
            <?php echo get_theme_mod('vw_courier_serivce_pro_header_getQuote_button_text'); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

</div>