<?php
/**
 * The Template for displaying all single Service.
 * Template Name : Single services
 *
 * @package vw-courier-serivce-pro
 */
get_header();
$background_img = get_theme_mod('vw_courier_serivce_pro_inner_page_banner_bgimage');

$count = get_theme_mod('vw_courier_serivce_pro_single_service_list_length');
//get_template_part( 'template-parts/banner' );?>

<section id="service-single">
  <div class="container">
    <div class="row py-5">
      <div id="service_single" class="col-lg-9 col-md-12 col-12">
        <?php while (have_posts()):
          the_post(); ?>
          <div class="portfolio-image">
            <img src="<?php the_post_thumbnail_url('full'); ?>">
          </div>
          <h2 class="my-4">
            <?php echo the_title(); ?>
          </h2>
          <?php echo the_content(); ?>
          <div class="row">
            <div class="single-left-img col-lg-6 col-md-12 col-12">
              <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_single_service_img'); ?>"
                alt="Single Services Image">
            </div>
            <div class="single-servics-list  col-lg-6 col-md-12 col-12">
              <div class="title">
                <?php echo get_theme_mod('vw_courier_serivce_pro_single_service_list_title'); ?>
              </div>
              <ul class="featured-list">
                <?php for ($i = 1; $i <= $count; $i++) { ?>

                  <li>
                    <?php echo get_theme_mod('vw_courier_serivce_pro_single_services_list' . $i); ?>
                  </li>
                <?php } ?>
              </ul>
              <a class="submit-btn single-page" href="<?php echo get_permalink(get_page_by_title('Get A Quote')); ?>">
                <?php echo get_theme_mod('vw_courier_serivce_pro_single_service_btn_txt'); ?>
              </a>
            </div>
          </div>
          <div class="row my-5 with-gap px-4">
            <div class="counter-container col-lg-5 col-md-5 col-12">
              <div class="counter-img">
                <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_single_service_counter1_img'); ?>"
                  alt="counter img">
              </div>
              <div class="counter-info">
                <h5 class="counter-title">
                  <?php echo get_theme_mod('vw_courier_serivce_pro_single_service_counter1_title'); ?>
                </h5>
                <span class="counter-number">
                  <?php echo get_theme_mod('vw_courier_serivce_pro_single_service_counter1'); ?><i class="fa fa-plus"
                    aria-hidden="true"></i>
                </span>
                <p class="counter-txt">
                  <?php echo get_theme_mod('vw_courier_serivce_pro_single_service_counter1_text'); ?>
                </p>
              </div>
            </div>
            <div class="counter-container col-lg-5 col-md-5 col-12 ">
              <div class="counter-img">
                <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_single_service_counter2_img'); ?>"
                  alt="counter img">
              </div>
              <div class="counter-info">
                <h5 class="counter-title">
                  <?php echo get_theme_mod('vw_courier_serivce_pro_single_service_counter2_title'); ?>
                </h5>
                <span class="counter-number">
                  <?php echo get_theme_mod('vw_courier_serivce_pro_single_service_counter2'); ?> <i class="fa fa-plus"
                    aria-hidden="true"></i>
                </span>
                <p class="counter-txt">
                  <?php echo get_theme_mod('vw_courier_serivce_pro_single_service_counter2_text'); ?>
                </p>
              </div>
            </div>
          </div>
          <div class="services-last">
            <h3 class="mb-4 question">
              <?php echo esc_html(get_post_meta($post->ID, 'service_bottom_question', true)); ?>
                </h3>
            <p class="mb-4 answer">
              <?php echo esc_html(get_post_meta($post->ID, 'service_bottom_answer', true)); ?>
            </p>
          </div>
        </div>
        <div class="sidebar col-lg-3 col-md-12 col-12">
          <?php if (is_active_sidebar('services-sidebar')): ?>
            <div id="custom-services-sidebar" class="custom-services-sidebar">
              <?php dynamic_sidebar('services-sidebar'); ?>
              <div class="calling-widget mt-5">
                <div class="widget-img-wrap">
                  <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_single_service_widget_image'); ?>"
                    alt="widget-img">
                </div>
                <div class="widget-title">
                  <?php echo get_theme_mod('vw_courier_serivce_pro_single_service_widget_title'); ?>
                </div>
                <a href="tel:<?php echo get_theme_mod('vw_courier_serivce_pro_single_service_widget_number'); ?>">
                  <?php echo get_theme_mod('vw_courier_serivce_pro_single_service_widget_number'); ?>
                </a>
                <div class="call-us-txt">
                  <?php echo get_theme_mod('vw_courier_serivce_pro_single_service_widget_text'); ?>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
      <?php endwhile; // end of the loop. ?>
    </div>
    <div class="recent-posts">
      <?php if (get_theme_mod('vw_courier_serivce_pro_single_services_heading_tag') != false && get_theme_mod('vw_courier_serivce_pro_single_services_heading') != false) { ?>
        <div class="heading text-center">
          <div class="heading-tagline">
            <?php echo get_theme_mod('vw_courier_serivce_pro_single_services_heading_tag'); ?>
          </div>
          <h2>
            <?php echo get_theme_mod('vw_courier_serivce_pro_single_services_heading'); ?>
          </h2>
        </div>
      <?php } ?>
      <div class="related-posts section-space">
        <div class="owl-carousel latest-bg">
          <?php
          $args = array(
            'post_type' => 'services',
            // Replace 'services' with your actual custom post type name
            'posts_per_page' => -1,
            // Display all posts
            'order' => 'ASC', // Display posts in ascending order
          );

          $services_query = new WP_Query($args);

          if ($services_query->have_posts()) {
            while ($services_query->have_posts()) {
              $services_query->the_post();
              $icon_url = get_post_meta(get_the_ID(), 'services_icon', true); // Get the icon URL
              // Get the featured image URL
              $featured_image_url = get_the_post_thumbnail_url();
              $link = get_permalink();
              // Get other post content or meta information
              $title = get_the_title();
              $content = get_the_content();
              // Display the service card
              // Display the icon if available
          
              if ($featured_image_url) {
                echo '<div class="service-card"  style="background-image: url(' . ($featured_image_url) . ');">';
              }
              if ($icon_url) {
                echo '<div class="services-icon"><img src="' . esc_url($icon_url) . '" alt="Service Icon"></div>';
              }
              echo '<a href="'.esc_html($link).'"><h3>' . esc_html($title) . '</h3></a>';
              echo '</div>';

            }

            wp_reset_postdata(); // Reset the post data to the main query
          } else {
            echo 'No services found.';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer(); ?>