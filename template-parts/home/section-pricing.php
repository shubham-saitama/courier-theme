<?php
/**
 * Template part for displaying Pricing section
 *
 * @package vw-logistics-pricing_sec
 */

$section_hide = get_theme_mod('vw_courier_serivce_pro_pricing_enabledisable');
if ('Disable' == $section_hide) {
    return;
}
if (get_theme_mod('vw_courier_serivce_pro_pricing_bg_color', '')) {
    $pricing_sec_back = 'background-color:' . esc_attr(get_theme_mod('vw_courier_serivce_pro_pricing_bg_color', '')) . ';';
} elseif (get_theme_mod('vw_courier_serivce_pro_pricing_bg_image', '')) {
    $pricing_sec_back = 'background-image:url(\'' . esc_url(get_theme_mod('vw_courier_serivce_pro_pricing_bg_image')) . '\')';
} else {
    $pricing_sec_back = '';
}
$feature_count1 = get_theme_mod('vw_courier_serivce_pro_package_features1');
$feature_count2 = get_theme_mod('vw_courier_serivce_pro_package_features2');

$img_bg = get_theme_mod('vw_courier_serivce_pro_pricing_sec_bgimage_setting');
?>
<section id="pricing_sec-us" class=" section-space" style="<?php echo esc_attr($pricing_sec_back); ?>"
    class="<?php echo esc_attr($img_bg); ?> section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-12 pricing-left">
                <div class="pricing-pack-wrapper">
                    <div class="pricing-card">
                        <div class="pack-top">
                            <div class="pack-innner">
                                <div class="pack-name">
                                    <h4>
                                        <?php echo get_theme_mod('vw_courier_serivce_pro_pricing_pack_name1'); ?>
                                    </h4>
                                </div>
                                <div class="pack-price">
                                    <?php echo get_theme_mod('vw_courier_serivce_pro_pricing_pack_price1'); ?><span><?php echo get_theme_mod('vw_courier_serivce_pro_pricing_pack_price_currency'); ?></span>
                                </div>
                            </div>
                            <div class="pack-wrap">
                                <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_pricing_pack_icon1'); ?>"
                                    alt="pack-icon">
                            </div>
                        </div>

                        <?php for ($i = 1; $i <= $feature_count1; $i++) { ?>
                            <p class="PriceCheck">
                                <i class="<?php echo get_theme_mod('vw_courier_serivce_pro_pricing_Feature1_' . $i); ?>" aria-hidden="true"></i>
                                <?php echo get_theme_mod('vw_courier_serivce_pro_feature' . $i); ?>
                            </p>
                        <?php } ?>
                        <a href="<?php echo get_theme_mod('vw_courier_serivce_pro_pricing_card_btn1_link'); ?>" target="_blank" class="submit-btn"><?php echo get_theme_mod('vw_courier_serivce_pro_pricing_card_btn1_text'); ?></a>
                    </div>
                    <div class="pricing-card dark">
                        <div class="pack-top">
                            <div class="pack-innner">
                                <div class="pack-name">
                                    <h4>
                                        <?php echo get_theme_mod('vw_courier_serivce_pro_pricing_pack_name2'); ?>
                                    </h4>
                                </div>
                                <div class="pack-price">
                                    <?php echo get_theme_mod('vw_courier_serivce_pro_pricing_pack_price2'); ?><span><?php echo get_theme_mod('vw_courier_serivce_pro_pricing_pack_price_currency'); ?></span>
                                </div>
                            </div>
                            <div class="pack-wrap">
                                <img src="<?php echo get_theme_mod('vw_courier_serivce_pro_pricing_pack_icon2'); ?>"
                                    alt="pack-icon">
                            </div>
                        </div>
                        <?php for ($i = 1; $i <= $feature_count2; $i++) { ?>
                            <p class="PriceCheck">
                                <i class="<?php echo get_theme_mod('vw_courier_serivce_pro_pricing_feature_icon' . $i); ?>" aria-hidden="true"></i>
                                <?php echo get_theme_mod('vw_courier_serivce_pro_feature_premium' . $i); ?>
                            </p>
                        <?php } ?>
                        <a href="<?php echo get_theme_mod('vw_courier_serivce_pro_pricing_card_btn2_link'); ?>" target="_blank" class="submit-btn dark"><?php echo get_theme_mod('vw_courier_serivce_pro_pricing_card_btn2_text'); ?></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-12 pricing-right">
                <div class="pricing_sec heading text-left">
                    <div class="heading-tagline">
                        <?php echo get_theme_mod('vw_courier_serivce_pro_pricing_section_heading_tag'); ?>
                    </div>
                    <h2 class="left">
                        <?php echo get_theme_mod('vw_courier_serivce_pro_pricing_section_heading'); ?>
                    </h2>
                </div>
                <p>
                    <?php echo get_theme_mod('vw_courier_serivce_pro_pricing_section_paragraph'); ?>
                </p>
                <p class="Pointcheck">
                <i class="<?php echo get_theme_mod('vw_courier_serivce_pro_pricing_section_points_icon'); ?>" aria-hidden="true"></i>
                    <?php echo get_theme_mod('vw_courier_serivce_pro_pricing_section_points1'); ?>
                </p>
                <p class="Pointcheck">
                <i class="<?php echo get_theme_mod('vw_courier_serivce_pro_pricing_section_points_icon'); ?>" aria-hidden="true"></i>
                    <?php echo get_theme_mod('vw_courier_serivce_pro_pricing_section_points2'); ?>
                </p>
            </div>
        </div>
    </div>
</section>