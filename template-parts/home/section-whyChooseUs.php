<?php
/**
 * Template part for displaying Why Choose Us
 *
 * @package vw-courier-serivce-pro
 */

$section_hide = get_theme_mod('vw_courier_serivce_pro_whychooseus_enabledisable');
if ('Disable' == $section_hide) {
    return;
}
if (get_theme_mod('vw_courier_serivce_pro_whychooseus_bg_color', '')) {
    $services_back = 'background-color:' . esc_attr(get_theme_mod('vw_courier_serivce_pro_whychooseus_bg_color', '')) . ';';
} elseif (get_theme_mod('vw_courier_serivce_pro_whychooseus_bg_image', '')) {
    $services_back = 'background-image:url(\'' . esc_url(get_theme_mod('vw_courier_serivce_pro_whychooseus_bg_image')) . '\')';
} else {
    $services_back = '';
}
$img_bg = get_theme_mod('vw_courier_serivce_pro_whychooseus_bg_image');
?>
<section id="whyChooseUs" style="<?php echo esc_attr($services_back); ?>"
    class="<?php echo esc_attr($img_bg); ?> section-space">
    <div class="container">
        <div class="row justify-content-between">
            <div class="whyChooseUs-left col-lg-5 col-md-12 col-12">
                <div class="services heading text-left">
                    <div class="heading-tagline">

                        <?php echo get_theme_mod('vw_courier_serivce_pro_about_whychooseus_heading_tag'); ?>
                    </div>
                    <h2 class="left">
                        <?php echo get_theme_mod('vw_courier_serivce_pro_about_whychooseus_heading'); ?>
                    </h2>
                </div>
                <div class="choose-sec-main">
                    <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_whychooseus_main_image'); ?>" alt="">
                    <div class="choose-sec-vid-link">
                        <div class="vid-icon">
                            <a class="html5lightbox"
                                href="<?php echo get_theme_mod('vw_courier_serivce_pro_video_link'); ?>"> <i
                                    class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                        <p>
                            <?php echo get_theme_mod('vw_courier_serivce_pro_video_title'); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="whyChooseUs-right col-lg-6 mol-md-6 col-12">
                <p>
                    <?php echo get_theme_mod('vw_courier_serivce_pro_text_field1'); ?>
                </p>
                <p>
                    <?php echo get_theme_mod('vw_courier_serivce_pro_text_field2'); ?>
                </p>
                <p>
                    <?php echo get_theme_mod('vw_courier_serivce_pro_text_field3'); ?>
                </p>


                <div class="WhyChooseUs-counter-wrapper">
                    <div class="whyChooseUs-counter">
                        <p class="choose-counter-num counter" akhi="<?php echo get_theme_mod('vw_courier_serivce_pro_counter1_count'); ?>">
                            <?php echo get_theme_mod('vw_courier_serivce_pro_counter1_count'); ?>
                        </p>
                        <span>
                            <?php echo get_theme_mod('vw_courier_serivce_pro_counter1_title'); ?>
                        </span>

                    </div>
                    <div class="whyChooseUs-counter ">
                        <p class="choose-counter-num counter" akhi="<?php echo get_theme_mod('vw_courier_serivce_pro_counter2_count'); ?>">
                            <?php echo get_theme_mod('vw_courier_serivce_pro_counter2_count'); ?>
                        </p>
                        <span>
                            <?php echo get_theme_mod('vw_courier_serivce_pro_counter2_title'); ?>
                        </span>

                    </div>

                    <div class="whyChooseUs-counter">
                        <p class="choose-counter-num counter" akhi="<?php echo get_theme_mod('vw_courier_serivce_pro_counter3_count'); ?>">
                            <?php echo get_theme_mod('vw_courier_serivce_pro_counter3_count'); ?>
                        </p>
                        <span>
                            <?php echo get_theme_mod('vw_courier_serivce_pro_counter3_title'); ?>
                        </span>

                    </div>
                    <div class="whyChooseUs-counter ">
                        <p class="choose-counter-num counter " akhi="<?php echo get_theme_mod('vw_courier_serivce_pro_counter4_count'); ?>">
                            <?php echo get_theme_mod('vw_courier_serivce_pro_counter4_count'); ?>
                        </p>
                        <span>
                            <?php echo get_theme_mod('vw_courier_serivce_pro_counter4_title'); ?>
                        </span>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>