<?php
/**
 * Template part for displaying Testimonials
 *
 * @package vw_courier_serivce_pro
 */
$section_hide = get_theme_mod('vw_courier_serivce_pro_testimonial_enable');
if ('Disable' == $section_hide) {
    return;
}
if (get_theme_mod('vw_courier_serivce_pro_testimonial_bgcolor', '')) {
    $per_back = 'background-color:' . esc_attr(get_theme_mod('vw_courier_serivce_pro_testimonial_bgcolor', '')) . ';';
} elseif (get_theme_mod('vw_courier_serivce_pro_testimonial_bgimage', '')) {
    $per_back = 'background-image:url(\'' . esc_url(get_theme_mod('vw_courier_serivce_pro_testimonial_bgimage')) . '\')';
} else {
    $per_back = '';
}

?>
<section id="testimonials" class=" section-space" style="<?php echo esc_attr($per_back); ?>">
    <div class="container">
        <div class="services heading text-center">
            <div class="heading-tagline">
                <?php echo get_theme_mod('vw_courier_serivce_pro_testimonial_heading_tag_font_text'); ?>
            </div>
            <h2><?php echo get_theme_mod('vw_courier_serivce_pro_testimonial_heading_font_text'); ?></h2>
            <div class="row">
                <div class="owl-carousel">
                    <?php
                    // Custom WP_Query to retrieve testimonials
                    $args = array(
                        'post_type' => 'testimonials',
                        // Your custom post type name
                        'posts_per_page' => -1, // Show all testimonials
                    );

                    $testimonials_query = new WP_Query($args);

                    if ($testimonials_query->have_posts()):
                        while ($testimonials_query->have_posts()):
                            $testimonials_query->the_post();

                            // Get the custom fields
                            $customer_name = get_post_meta(get_the_ID(), '_customer_name', true);
                            $service_used = get_post_meta(get_the_ID(), '_service_used', true);

                            ?>

                            <div class="testimonial">
                                <div class="row">
                                    <!-- Display the post thumbnail -->
                                    <div class="testimonial-left col-lg-4 col-md-6 col-sm-12">
                                        <?php if (has_post_thumbnail()): ?>
                                            <div class="customer-image">
                                                <?php the_post_thumbnail('custom-thumbnail'); ?>
                                                <div class="customer-review">
                                                    <div class="chat-icon">
                                                        <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_testimonial_image_icon'); ?>"
                                                            alt="Testimonial Icons">

                                                    </div>
                                                    <?php echo get_theme_mod('vw_courier_serivce_pro_testimonial_image_icon_text'); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="testimonial-right col-lg-8 col-md-6 col-sm-12">
                                        <div class="testimonial-content">
                                            <?php the_content(); ?>
                                        </div>
                                        <!-- Display customer information -->
                                        <div class="client-info">
                                            <div class="client-info-inner">
                                                <h3 class="customer-name">
                                                    <?php echo esc_html($customer_name); ?>
                                                </h3>
                                                <p class="service-used">
                                                    <?php echo esc_html($service_used); ?>
                                                </p>
                                            </div>
                                            <div class="client-info-img">
                                                <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_testimonial_floating_image2'); ?>" alt="quote_img">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        <?php endwhile;
                        wp_reset_postdata(); // Reset the post data
                    else:
                        echo 'No testimonials found.';
                    endif;
                    ?>


                </div>
            </div>
        </div>
    </div>
</section>