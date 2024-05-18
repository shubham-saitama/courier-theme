<?php
/**
 * The Template for displaying all single team.
 *
 * @package vw-courier-serivce-pro
 */
get_header();
$background_img = get_theme_mod('vw_courier_serivce_pro_inner_page_banner_bgimage');
?>
<?php do_action('vw_courier_serivce_pro_before_contact_title'); ?>

<div class="title-box text-center banner-img" style="background-image:url(<?php echo esc_url($background_img); ?>)">
    <div class="banner-page-text container">
        <div class="row">
            <div class="col-lg-6 col-sm-3 col-6">
                <div class="above_title">
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                    <?php if (get_theme_mod('vw_courier_serivce_pro_site_breadcrumb_enable', true) != '') { ?>
                        <div class=" bradcrumbs">
                            <?php vw_courier_serivce_pro_the_breadcrumb(); ?>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
            <div class="col-lg-8">

            </div>
        </div>
    </div>
</div>
<div class="container single-testimonial-parent-div py-5">
    <div class="row">
        <div id="testimonial_single" class="col-md-9">
            <?php while (have_posts()):
                the_post(); ?>
                <?php if (has_post_thumbnail()) { ?>
                    <div class="row">
                        <div class="team_feature-box col-lg-6 col-md-12 col-12">
                            <img src="<?php the_post_thumbnail_url('full'); ?>">
                        </div>
                        <div class="client-info col-lg-6 ">
                            <?php $customer_name = get_post_meta(get_the_ID(), '_customer_name', true);
                            $service_used = get_post_meta(get_the_ID(), '_service_used', true); ?>
                            <p>
                                <?php echo esc_html($customer_name); ?>
                            </p>
                            <p>
                                <?php echo esc_html($service_used); ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>

                <?php get_post_meta('service_used'); ?>
                <?php the_content(); ?>
                <div class="clearfix"></div>
            <?php endwhile; // end of the loop. ?>
        </div>
        <div class="col-md-3" id="sidebar">
            <?php dynamic_sidebar('services-sidebar'); ?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php get_footer(); ?>