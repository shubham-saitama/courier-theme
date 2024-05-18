<?php
/**
 * Template Name:About Us Template
 *
 *
 */

get_header();
get_template_part('template-parts/banner');

$licount = get_theme_mod('vw_courier_serivce_pro_brand_list_length');
$ClientCount = get_theme_mod('vw_courier_serivce_pro_client_length');
?>
<div class="section-wrap">
  <?php echo get_template_part('template-parts/home/section-aboutUs'); ?>
</div>


<section class="distribution-overview section-space">
  <div class="container">
    <div class="row justify-content-between">
      <?php for ($i = 1; $i <= 4; $i++) { ?>
        <div class="dist-card col-lg-3">
          <div class="dist-icon">
            <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_overview_image' . $i); ?>" alt="Overview Icon">
          </div>
          <span>
            <?php echo get_theme_mod('vw_courier_serivce_pro_overview_count' . $i); ?>
          </span>
          <p>
            <?php echo get_theme_mod('vw_courier_serivce_pro_overview_title' . $i); ?>
          </p>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
<section class="ouur-mission section-space">
  <div class="container">
    <div class="row align-items-center">
      <div class="mission-left col-lg-7 col-md-7 col-12">
        <h3>
          <?php echo get_theme_mod('vw_courier_serivce_pro_mission_heading'); ?>
        </h3>
        <p class="text-bold">
          <?php echo get_theme_mod('vw_courier_serivce_pro_mission_bold_text'); ?>
        </p>
        <p class="text-normal">
          <?php echo get_theme_mod('vw_courier_serivce_pro_mission_text'); ?>
        </p>
      </div>
      <div class="mission-right col-lg-5 col-md-5 col-12">
        <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_aboutus_inner_mission_img'); ?>"
          alt="Our mission Image">
      </div>
    </div>
  </div>
</section>

<section class="thebest section-space">
  <div class="container">
    <div class="best-bg-wrapper"
      style="background-image:url(<?php echo get_theme_mod('vw_courier_serivce_pro_aboutus_inner_best_bgimg'); ?>);">
      <div class="row align-items-center">
        <div class="best-left col-lg-6 12 col-12">
          <div class="tagline">
            <?php echo get_theme_mod('vw_courier_serivce_pro_best_heading_tagline'); ?>
          </div>
          <h3 class="left">
            <?php echo get_theme_mod('vw_courier_serivce_pro_best_heading'); ?>
          </h3>
          <p class="best-text">
            <?php echo get_theme_mod('vw_courier_serivce_pro_best_text'); ?>
          </p>
        </div>
        <div class="best-right col-lg-6 col-md-12 col-12">
          <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_aboutus_inner_best_img'); ?>"
            alt="Best section image">
        </div>
      </div>
    </div>
  </div>
</section>
<section class="thebrand section-space">
  <div class="container">
    <div class="row align-items-center justify-content-between">
      <div class="brand-left col-lg-5 col-md-12 col-12">
        <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_brand_image'); ?>" alt="Brand section image">
      </div>
      <div class="brand-right col-lg-6 col-md-12 col-12">
        <div class="h3">
          <?php echo get_theme_mod('vw_courier_serivce_pro_brand_heading'); ?>
        </div>
        <div class="para">
          <?php echo get_theme_mod('vw_courier_serivce_pro_brand_text'); ?>
        </div>
        <div class="brand-ul">
          <ul class="brand-list"></ul>
          <?php for ($i = 1; $i <= $licount; $i++) { ?>
            <li class="list-item">
              <?php echo get_theme_mod('vw_courier_serivce_pro_brand_list_' . $i); ?>
            </li>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="thebrand reverse section-space">
  <div class="container">
    <div class="row align-items-center justify-content-between flex-row-reverse">
      <div class="brand-left col-lg-5 col-md-12 col-12">
        <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_security_image'); ?>" alt="Brand section image">
      </div>
      <div class="brand-right col-lg-6 col-md-12 col-12">
        <div class="h3">
          <?php echo get_theme_mod('vw_courier_serivce_pro_security_heading'); ?>
        </div>
        <div class="para">
          <?php echo get_theme_mod('vw_courier_serivce_pro_security_text'); ?>
        </div>
        <div class="para">
          <?php echo get_theme_mod('vw_courier_serivce_pro_security1_text'); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="clientandPratners section-space">
  <div class="container">
    <div class="row">
      <div class="client-heading">
        <h3>
          <?php echo get_theme_mod('vw_courier_serivce_pro_client_heading'); ?>
        </h3>
      </div>
      <div class="owl-carousel">
        <?php for ($i = 1; $i <= $ClientCount; $i++) { ?>
          <div class="client-logo">
            <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_client_image' . $i); ?>" alt="Client Image">
          </div>
        <?php } ?>
      </div>

    </div>
  </div>
</section>
<?php get_footer(); ?>