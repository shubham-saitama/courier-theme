<?php
/**
 * The template for displaying index page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package vw-courier-serivce-pro
 */
get_header();
$background_img = get_theme_mod('vw_courier_serivce_pro_inner_page_banner_bgimage');
?>

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
<?php do_action( 'vw_courier_serivce_pro_after_defaulttitle' ); ?>
<div class="post-section">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<?php while ( have_posts() ) : the_post();
						if (has_post_thumbnail()) { // Check if the post has a featured image
							the_post_thumbnail(); // Display the featured image
						}
						the_content();
					endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>