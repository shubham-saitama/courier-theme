<?php
/**
 * Template Name:Support Page Template
 *
 *
 */

get_header();
// get_template_part('template-parts/banner');

if (get_theme_mod('vw_courier_serivce_pro_contactus_page_bgcolor', '')) {
    $about_page_back = 'background-color:' . esc_attr(get_theme_mod('vw_courier_serivce_pro_contactus_page_bgcolor', '')) . ';';
} elseif (get_theme_mod('vw_courier_serivce_pro_contactus_page_bgimage', '')) {
    $about_page_back = 'background-image:url(\'' . esc_url(get_theme_mod('vw_courier_serivce_pro_contactus_page_bgimage')) . '\')';
} else {
    $about_page_back = '';
}

$supportContactForm = get_theme_mod('vw_courier_serivce_pro_contactus_form');
$faqCount = get_theme_mod('vw_courier_serivce_pro_faq_count', 5); // Number of FAQ questions to display
get_template_part('template-parts/banner'); 

?>



<section class="support-page" style="<?php echo $about_page_back ?>">
    <div class="container">
        <div class="row">
            <div class="middle-content">
                <?php the_content(); ?>
            </div>
            <div class="contactus-section">
                <div class="row">
                    <div class="support-contact-info col-lg-6">
                        <h3><?php echo get_theme_mod('vw_courier_serivce_pro_contactus_contact_sectionheading'); ?></h3>
                        <p><?php echo get_theme_mod('vw_courier_serivce_pro_contactus_contact_section_desc'); ?></p>
                        <div class="map">
                            <iframe
                                src="https://maps.google.com/maps?q=<?php echo get_theme_mod('vw_courier_serivce_pro_contactus_latitude'); ?>,<?php echo get_theme_mod('vw_courier_serivce_pro_contactus_longitude'); ?>&hl=en&z=20&amp;output=embed"
                                frameborder="0">
                            </iframe>
                        </div>
                    </div>
                    <div class="contact col-lg-6">
                        <div class="support-form-wrapper">
                            <?php echo do_shortcode($supportContactForm); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq-right col-lg-12 col-md-12 col-12 my-5">
                <h2 class="left "><?php echo get_theme_mod('vw_courier_serivce_pro_faq_heading_tagline'); ?></h2>
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
                                <?php echo esc_html($faqQuestion); ?> <i class="fas fa-chevron-down"></i>
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
    </div>
</section>




<?php get_footer(); ?>