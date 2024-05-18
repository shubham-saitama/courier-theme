<?php
/**
 * Template part for displaying order_tracking Section
 *
 * @package vw-logistics-order_tracking
 */

$section_hide = get_theme_mod('vw_courier_serivce_pro_order_tracking_enable');
if ('Disable' == $section_hide) {
    return;
}
if (get_theme_mod('vw_courier_serivce_pro_order_tracking_bgcolor', '')) {
    $order_tracking_back = 'background-color:' . esc_attr(get_theme_mod('vw_courier_serivce_pro_order_tracking_bgcolor', '')) . ';';
} elseif (get_theme_mod('vw_courier_serivce_pro_order_tracking_bgimage')) {
    $order_tracking_back = 'background-image:url(' . esc_url(get_theme_mod('vw_courier_serivce_pro_order_tracking_bgimage')) . ')';
} else {
    $order_tracking_back = '';
}
$img_bg = get_theme_mod('vw_courier_serivce_pro_order_tracking_bgimage_setting');
$trackingShortcode = get_theme_mod('vw_courier_serivce_pro_order_tracking_shortcode');
?>
<section id="order_tracking-us" class=" section-space" style="<?php echo esc_attr($order_tracking_back); ?>">
    <div class="container">
        <div class="order">
            <div class="row">
                <div class="tracking-your-order col-lg-2">
                    <?php echo get_theme_mod('vw_courier_serivce_pro_order_tracking_section_headding'); ?>
                </div>
                <div class="tracking-form col-lg-10">
                    <?php echo do_shortcode($trackingShortcode); ?>
                </div>
            </div>
        </div>
    </div>
</section>