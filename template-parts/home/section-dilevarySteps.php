<?php
/**
 * Template part for displaying Steps Section
 *
 * @package vw-logistics-steps_sec
 */

$section_hide = get_theme_mod('vw_courier_serivce_pro_steps_enable');
if ('Disable' == $section_hide) {
    return;
}
if (get_theme_mod('vw_courier_serivce_pro_steps_bgcolor', '')) {
    $steps_sec_back = 'background-color:' . esc_attr(get_theme_mod('vw_courier_serivce_pro_steps_bgcolor', '')) . ';';
} elseif (get_theme_mod('vw_courier_serivce_pro_steps_bgimage', '')) {
    $steps_sec_back = 'background-image:url(\'' . esc_url(get_theme_mod('vw_courier_serivce_pro_steps_bgimage')) . '\')';
} else {
    $steps_sec_back = '';
}
$img_bg = get_theme_mod('vw_courier_serivce_pro_steps_sec_bgimage_setting');
?>
<section id="steps_sec-us" class=" section-space" style="<?php echo esc_attr($steps_sec_back); ?> ">
    <div class="container">
        <div class="steps_sec heading text-center">
            <div class="heading-tagline">
                <?php echo get_theme_mod('vw_courier_serivce_pro_steps_heading_tag'); ?>
            </div>
            <h2>
                <?php echo get_theme_mod('vw_courier_serivce_pro_steps_heading'); ?>
            </h2>
        </div>
        <div class="row justify-content-center g-0">
            <div class="steps-left col-lg-6 col-md-6 col-12">
                <div class="steps-container first">
                    <div class="top-step">
                        <div class="step-icon">
                            <div class="step-img-wrapper">
                                <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_step1_image'); ?>"
                                    alt="step-image">
                            </div>
                            <div class="step-number">
                                <?php echo get_theme_mod('vw_courier_serivce_pro_step_text_1') ?>
                            </div>
                        </div>
                        <div class="step-text">
                            <h4>
                                <?php echo get_theme_mod('vw_courier_serivce_pro_step1_title'); ?>
                                </h3>
                                <p>
                                    <?php echo get_theme_mod('vw_courier_serivce_pro_step1_desc'); ?>
                                </p>
                        </div>
                    </div>
                </div>
                <div class="steps-container sec">
                    <div class="bottom-step">
                        <div class="step-icon">
                            <div class="step-img-wrapper">
                                <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_step2_image'); ?>"
                                    alt="step-image">
                            </div>
                            <div class="step-number">
                                <?php echo get_theme_mod('vw_courier_serivce_pro_step_text_2') ?>
                            </div>
                        </div>
                        <div class="step-text">
                            <h4>
                                <?php echo get_theme_mod('vw_courier_serivce_pro_step2_title'); ?>
                                </h3>
                                <p>
                                    <?php echo get_theme_mod('vw_courier_serivce_pro_step2_desc'); ?>
                                </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="steps-right col-lg-6 col-md-6 col-12">
                <div class="steps-container third">
                    <div class="top-step">
                        <div class="step-icon">
                            <div class="step-img-wrapper">
                                <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_step3_image'); ?>"
                                    alt="step-image">
                            </div>
                            <div class="step-number">
                                <?php echo get_theme_mod('vw_courier_serivce_pro_step_text_3') ?>
                            </div>
                        </div>
                        <div class="step-text">
                            <h4>
                                <?php echo get_theme_mod('vw_courier_serivce_pro_step3_title'); ?>
                                </h3>
                                <p>
                                    <?php echo get_theme_mod('vw_courier_serivce_pro_step3_desc'); ?>
                                </p>
                        </div>
                    </div>
                </div>
                <div class="steps-container forth">
                    <div class="bottom-step">
                        <div class="step-icon">
                            <div class="step-img-wrapper">
                                <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_step4_image'); ?>"
                                    alt="step-image">
                            </div>
                            <div class="step-number">
                                <?php echo get_theme_mod('vw_courier_serivce_pro_step_text_4') ?>
                            </div>
                        </div>
                        <div class="step-text">
                            <h4>
                                <?php echo get_theme_mod('vw_courier_serivce_pro_step4_title'); ?>
                                </h3>
                                <p>
                                    <?php echo get_theme_mod('vw_courier_serivce_pro_step4_desc'); ?>
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>