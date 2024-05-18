<?php
/**
 * The Template for displaying all single Team.
 *
 * @package vw-courier-serivce-pro
 */
get_header();
get_template_part( 'template-parts/banner' );
?>
<div class="container">
    <div id="project_single">
        <div class="row m-0">
            <?php while ( have_posts() ) : the_post();
            $data = get_post_meta( $post->ID);?>
                <div class="col-md-9 services_desc_box p-0">
                    <div class="posttype-box">
                        <img src="<?php the_post_thumbnail_url( 'full' ); ?>">
                        <p><?php the_content();?></p>
                    </div>
                    <div class="clearfix"></div>
                        <?php if(get_post_meta($post->ID,'meta-designation',true)!= ''){ ?>
                            <div class="mb-3"><strong><?php _e('Designation: ','vw-courier-serivce-pro');?></strong> <?php echo esc_html(get_post_meta($post->ID,'meta-designation',true)); ?></div>
                        <?php }?>
                        <?php if(get_post_meta($post->ID,'meta-desig',true)!= ''){ ?>
                            <div class="mb-3"><strong><?php _e('Email: ','vw-courier-serivce-pro');?></strong> <?php echo esc_html(get_post_meta($post->ID,'meta-desig',true)); ?></div>
                        <?php }?>
                        <?php if(get_post_meta($post->ID,'meta-call',true)!= ''){ ?>
                            <div class="mb-3"><strong><?php _e('Call: ','vw-courier-serivce-pro');?></strong><?php echo esc_html(get_post_meta($post->ID,'meta-call',true)); ?></div>
                        <?php } ?>
                        <div class="about-socialbox">
                          <?php if(get_post_meta($post->ID,'meta-tfacebookurl',true)) { ?>
                              <a class="text-center" href="<?php echo esc_html(get_post_meta($post->ID,'meta-tfacebookurl',true)); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                           <?php }
                          if(get_post_meta($post->ID,'meta-ttwitterurl',true)) { ?>
                              <a class="text-center" href="<?php echo esc_html(get_post_meta($post->ID,'meta-ttwitterurl',true)); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                          <?php }
                          if(get_post_meta($post->ID,'meta-tgoogleplusurl',true)) { ?>
                              <a class="text-center" href="<?php echo esc_html(get_post_meta($post->ID,'meta-tgoogleplusurl',true)); ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                           <?php }
                          if(get_post_meta($post->ID,'meta-tlinkdenurl',true)) { ?>
                               <a class="text-center" href="<?php echo esc_html(get_post_meta($post->ID,'meta-tlinkdenurl',true)); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                          <?php }
                              if(get_post_meta($post->ID,'meta-tinstagram',true)!= ''){ ?>
                              <a class="text-center" href="<?php echo esc_html(get_post_meta($post->ID,'meta-tinstagram',true)); ?>" target="_blank">
                                  <i class="fab fa-instagram align-middle" aria-hidden="true"></i>
                              </a>
                          <?php } if(get_post_meta($post->ID,'meta-pinterest',true)!= ''){ ?>
                              <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-pinterest',true)); ?>" target="_blank">
                                  <i class="fab fa-pinterest-p align-middle " aria-hidden="true"></i>
                              </a>
                          <?php } ?>
                        </div>
                    <div class="post_pagination mt-4">
                        <?php the_post_navigation( array(
                            'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'vw-courier-serivce-pro' ) . '</span> ' .
                                '<span class="screen-reader-text">' . __( 'Next post:', 'vw-courier-serivce-pro' ) . '</span> ' .
                                '<span class="post-title">%title</span>',
                            'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'vw-courier-serivce-pro' ) . '</span> ' .
                                '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-courier-serivce-pro' ) . '</span> ' .
                                '<span class="post-title">%title</span>',
                        ) );?>
                    </div>
                </div>
                <div class="col-md-3" id="sidebar">
                  <?php dynamic_sidebar('sidebar-1'); ?>
                </div>
            <?php endwhile; // end of the loop. ?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php get_footer(); ?>
