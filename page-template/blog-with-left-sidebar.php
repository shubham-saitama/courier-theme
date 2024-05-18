<?php
/**
 * Template Name:Blog with Left Sidebar
 */

get_header();

?>

<?php do_action('vw_courier_serivce_pro_before_blog'); ?>

<div id="blog-left-sidebar">
	<div class="">
		<div class="middle-align">
			<div class="row">
				<?php
				/**
				 * Template Name:Blog With Left And Right Sidebar
				 */

				get_header();
				get_template_part('template-parts/banner');
				?>
				<?php do_action('vw_courier_serivce_pro_before_blog'); ?>
				<main id="maincontent" role="main">
					<div id="blog-right-sidebar">
						<div class="container">
							<div class="content_page row">
								<div class="col-lg-3 col-md-12 col-12">
									<?php dynamic_sidebar('services-sidebar'); ?>
								</div>
								<div class="col-lg-9 col-md-12 col-12">
									<div class="row">
										<?php
										$args = array(
											'post_type' => 'post',
											// Fetch posts
											'posts_per_page' => 5,
											// Number of posts to display
											'order' => 'DESC',
											// Display posts in descending order
											'orderby' => 'date' // Order posts by date
										);
										$query = new WP_Query($args);

										if ($query->have_posts()):
											while ($query->have_posts()):
												$query->the_post();
												?>
												<div class="blog-card"
													style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
													<div class="date-box">
														<?php $post_month = get_the_date('M'); ?>
														<?php $post_date = get_the_date('d'); ?>
														<div class="day">
															<?php echo $post_date ?>
														</div>
														<div class="month">
															<?php echo $post_month ?>
														</div>
													</div>
													<div class="blog-card-content">

														<div class="info-bar">
															<p><i class="<?php echo get_theme_mod('vw_courier_serivce_pro_blog_author'); ?>"
																	aria-hidden="true"> </i>
																<?php the_author(); ?>
															</p>
															<p>
																<i
																	class="<?php echo get_theme_mod('vw_courier_serivce_pro_blog_comment_icon'); ?>"></i>
																<?php comments_number(); ?>
															</p>
															<p><i
																	class="<?php echo get_theme_mod('vw_courier_serivce_pro_blog_fright_icon'); ?>"></i>Road
																Freight</p>
														</div>
														<a href="<?php the_permalink(); ?>">
															<h5>
																<?php the_title(); ?>
															</h5>
														</a>
													</div>
												</div>

												<?php
											endwhile;
											wp_reset_postdata();
										else:
											echo "No posts found.";
										endif;
										?>
									</div>
								</div>

								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</main>
				<?php do_action('vw_courier_serivce_pro_after_blog'); ?>
				<?php get_footer(); ?>
			</div>
		</div>
	</div>
</div>

<?php do_action('vw_courier_serivce_pro_after_blog'); ?>

<?php get_footer(); ?>