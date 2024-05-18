<?php
/**
 * Template part for displaying FAQ Section
 *
 * @package vw_courier_serivce_pro
 */
$section_hide = get_theme_mod('vw_courier_serivce_pro_faq_enable');
if ('Disable' == $section_hide) {
    return;
}
if (get_theme_mod('vw_courier_serivce_pro_faq_bgcolor', '')) {
    $per_back = 'background-color:' . esc_attr(get_theme_mod('vw_courier_serivce_pro_faq_bgcolor', '')) . ';';
} elseif (get_theme_mod('vw_courier_serivce_pro_faq_bgimage', '')) {
    $per_back = 'background-image:url(\'' . esc_url(get_theme_mod('vw_courier_serivce_pro_faq_bgimage')) . '\')';
} else {
    $per_back = '';
}
$img_bg = get_theme_mod('vw_courier_serivce_pro_faq_bgimage');
$faqCount = get_theme_mod('vw_courier_serivce_pro_faq_count', 5); // Number of FAQ questions to display
?>
<section id="faq" class="<?php echo esc_attr($img_bg); ?> section-space" style="<?php echo esc_attr($per_back); ?>">
    <div class="container">
        <div class="services heading text-center">
            <div class="heading-tagline">
                <?php echo get_theme_mod('vw_courier_serivce_pro_faq_heading_tagline'); ?>
            </div>
            <h2>
                <?php echo get_theme_mod('vw_courier_serivce_pro_faq_heading'); ?>
            </h2>
        </div>
        <div class="row">
            <div class="faq-left  col-lg-6 col-md-6 col-12">
                <div class="faq-img-wrapper">
                    <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_faq_image'); ?>" alt="faq section image">
                </div>
                <div class="service-attributes">
                    <div class="attributes-container">
                        <div class="service-icon">
                            <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_faq_service_attribute1_icon'); ?>"
                                alt="">
                        </div>
                        <div class="service-attribute-info">
                            <p class="service-attribute-title">
                                <?php echo get_theme_mod('vw_courier_serivce_pro_faq_service_attribute1_title'); ?>
                            </p>
                            <p class="service-attribute-desc">
                                <?php echo get_theme_mod('vw_courier_serivce_pro_faq_service_attribute1_desc'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="attributes-container">
                        <div class="service-icon">
                            <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_faq_service_attribute2_icon'); ?>"
                                alt="">
                        </div>
                        <div class="service-attribute-info">
                            <p class="service-attribute-title">
                                <?php echo get_theme_mod('vw_courier_serivce_pro_faq_service_attribute2_title'); ?>
                            </p>
                            <p class="service-attribute-desc">
                                <?php echo get_theme_mod('vw_courier_serivce_pro_faq_service_attribute2_desc'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq-right col-lg-6 col-md-6 col-12">
                <div class="accordion-wrapper">
                    <?php
                    for ($i = 1; $i <= $faqCount; $i++) {
                        $faqQuestion = get_theme_mod('vw_courier_serivce_pro_faq' . $i);
                        $faqAnswer = get_theme_mod('vw_courier_serivce_pro_faq_answer' . $i);
                        ?>

                        <?php
                        if ($faqQuestion && $faqAnswer) {
                            ?>
                            <h3 class="accordion-click">
                                <?php echo esc_html($faqQuestion); ?> <i
                                    class="<?php echo get_theme_mod('vw_courier_serivce_pro_dropdown_icon_setting') ?>"></i>
                            </h3>
                            <div class="answer">
                                <?php echo esc_html($faqAnswer); ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
</section>