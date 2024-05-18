<?php
/**
 * Template part for displaying services
 *
 * @package vw-courier-serivce-pro
 */

$section_hide = get_theme_mod('vw_courier_serivce_pro_our_services_enable');
if ('Disable' == $section_hide) {
  return;
}
if (get_theme_mod('vw_courier_serivce_pro_our_services_bgcolor', '')) {
  $services_back = 'background-color:' . esc_attr(get_theme_mod('vw_courier_serivce_pro_our_services_bgcolor', '')) . ';';
} elseif (get_theme_mod('vw_courier_serivce_pro_our_services_bgimage', '')) {
  $services_back = 'background-image:url(\'' . esc_url(get_theme_mod('vw_courier_serivce_pro_our_services_bgimage')) . '\')';
} else {
  $services_back = '';
}

?>
<section id="services-us" style="<?php echo esc_attr($services_back); ?>"
  class="section-space">
  <div class="container">
    <div class="services heading text-center">
      <div class="heading-tagline">
        <?php echo get_theme_mod('vw_courier_serivce_pro_our_services_sub_heading');?>
      </div>
      <h2><?php echo get_theme_mod('vw_courier_serivce_pro_our_services_heading'); ?></h2>
      <div class="row">
        <div class="owl-carousel ">
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
  </div>
</section>