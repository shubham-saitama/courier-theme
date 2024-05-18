<?php
/**
 * The Template for displaying all single posts.
 *
 * @package vw-courier-serivce-pro
 */
get_header();
// get_template_part( 'template-parts/banner' );

?>
<?php while (have_posts()):
	the_post(); ?>
	<div class=" blog-single">
		<?php if (has_post_thumbnail()) { ?>
			<div class="single-post-img">
				<img src="<?php the_post_thumbnail_url('full'); ?>">
			</div>
		<?php } ?>
		<div class="container single-post  section-space" id="single-post-page">
			<div class="row justify-content-center">
				<div class="content_page col-lg-12 col-md-12 col-sm-12  mt-5">
					<div class="single-post">
						<span>
							<?php // echo get_the_category(); ?>
						</span>
						<div class="single-page-title text-lg-start text-md-start ">
							<h2>
								<?php echo get_the_title(); ?>
							</h2>
						</div>

						<ul class="d-flex text-lg-start  mb-4">
							<?php if (get_theme_mod('vw_courier_serivce_pro_post_general_settings_post_author', true) == "1") { ?>
								<li class="entry-author list-unstyled">
									<img class="single-author-image"
										src="<?php echo esc_url(get_avatar_url($current_user->ID)); ?>">
									<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
										<?php the_author(); ?>
									</a>
								</li>
							<?php } ?>

							<?php if (get_theme_mod('vw_courier_serivce_pro_post_general_settings_post_date', true) == "1") { ?>
								<li class="entry-date before-dot self-align-center">
									<?php echo esc_html(get_the_date('M d, Y')); ?>
								</li>
							<?php } ?>
							<?php if (get_theme_mod('vw_courier_serivce_pro_post_general_settings_post_comments', true) == "1") { ?>
								<li class="entry-comments">
									<a href="#comments">
										<?php comments_number(__('0 Comments', 'vw-courier-serivce-pro'), __('0 Comments', 'vw-courier-serivce-pro'), __('0 % Comments', 'vw-courier-serivce-pro')); ?>
									</a>
								</li>
							<?php } ?>
						</ul>
						<div class="single-post-content before-dot ">
							<div class="">
								<p class="mb-4">
									<?php echo esc_html(get_post_meta($post->ID, 'post_para_1', true)); ?>
								</p>
							</div>
							<div class="">
								<h4 class="mb-2 blog-que">
									<?php echo esc_html(get_post_meta($post->ID, 'post_que', true)); ?>
								</h4>
							</div>

							<div class="">
								<p class="mb-3">
									<?php echo esc_html(get_post_meta($post->ID, 'post_para_2', true)); ?>
								</p>
							</div>
						</div>
						<div class="row single-blog-img">
							<div class="col-md-6 my-5">
								<?php if (get_post_meta($post->ID, 'post_image_1', true)) { ?>
									<img src="<?php echo esc_html(get_post_meta($post->ID, 'post_image_1', true)); ?>"
										alt="Single Blog Image">
								<?php } ?>
							</div>
							<div class="col-md-6 my-5">
								<?php if (get_post_meta($post->ID, 'post_image_2', true)) { ?>
									<img src="<?php echo esc_html(get_post_meta($post->ID, 'post_image_2', true)); ?>"
										alt="Single Blog Image">
								<?php } ?>
							</div>
						</div>
						<div class="">
							<p class="mb-5">
								<?php echo esc_html(get_post_meta($post->ID, 'post_para_3', true)); ?>
							</p>
						</div>

					</div>
					<?php /* 	<div class="col-md-6">
																								  <?php if ( get_theme_mod('vw_courier_serivce_pro_post_general_settings_post_share',true) ) {
																										  if ( function_exists('vw_courier_serivce_pro_social_share') ) {
																											  vw_courier_serivce_pro_social_share();
																										  }
																									  }
																													  if(get_theme_mod('vw_courier_serivce_pro_tags', true)){ ?>
																														  <p class="col-md-6 post_tag">
																																  <?php
																																	  if( $tags = get_the_tags() ) {
																																			  echo '<span class="meta-sep"></span>';
																																			  foreach( $tags as $vw_tag ) {
																																				  $sep = ( $vw_tag === end( $tags ) ) ? '' : ' ';
																																				  echo '<a href="' . esc_url(get_term_link( $vw_tag, $vw_tag->taxonomy )) . '">#' . esc_html($vw_tag->name) . '</a>' . esc_html($sep);
																																			  }
																																  } ?>
																														  </p>
																												  <?php }

																													   if(get_theme_mod('vw_courier_serivce_pro_post_general_settings_post_category',true)=="1"){ ?>
																														  <div class="post_ctg font-weight-bold"><span><?php echo esc_html('Categories: ','vw-courier-serivce-pro'); ?></span><?php the_category();?></div>

																										  <?php }
																					   ?>
																						  </div>*/?>

				</div>
				<div class="single-post-comment col-lg-12 col-md-12 col-12 section-space">
					<?php
					if (comments_open() || '0' != get_comments_number()) {
						comments_template();
					}
					?>
				</div>
				<div class="recent-posts">
					<?php if (get_theme_mod('vw_courier_serivce_pro_single_blog_heading_tag') != false && get_theme_mod('vw_courier_serivce_pro_blog_heading') != false) { ?>
						<div class="heading text-center">
							<div class="heading-tagline">
								<?php echo get_theme_mod('vw_courier_serivce_pro_single_blog_heading_tag'); ?>
							</div>
							<h2>
								<?php echo get_theme_mod('vw_courier_serivce_pro_single_blog_heading'); ?>
							</h2>
						</div>
					<?php } ?>

					<div class="related-posts">
						<div class="owl-carousel latest-bg">
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
												<p><i class="fa fa-user" aria-hidden="true"> </i>Author:

													<?php the_author(); ?>
												</p>
												<p>
													<i class="fas fa-comment-alt"></i>
													<?php comments_number(); ?>
												</p>
												<p><i class="fa-solid fa-tag"></i>Road Freight</p>
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
				</div>
			</div>
		</div>
	</div>

	</div>
	</div>
<?php endwhile; // end of the loop. ?>

<?php get_footer();