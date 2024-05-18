<?php
/**
 * The Template for displaying all single Portfolio.
 *
 * @package vw-courier-serivce-pro
 */
get_header(); 
get_template_part( 'template-parts/banner' );?>
<?php do_action('vw_courier_serivce_pro_before_contact_title'); ?> 
<div class="container">
    <div class="row">
        <div id="author_single" class="col-lg-9 col-md-7">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="team_feature-box">
                        <img src="<?php the_post_thumbnail_url( 'full' ); ?>">
                    </div>
                <?php } ?>
                <div class="author_meta">
                    <?php if(get_post_meta($post->ID,'meta-designation',true)) { ?>
                        <p>
                            <i class="fas fa-user"></i>
                            <?php echo esc_html(get_post_meta($post->ID,'meta-designation',true)); ?></p>
                    <?php } ?>
                    <?php if(get_post_meta($post->ID,'meta-desig',true)) { ?>
                        <p class="email">
                            <i class="far fa-envelope"></i>
                            <?php echo esc_html(get_post_meta($post->ID,'meta-desig',true)); ?>
                        </p>
                    <?php } if(get_post_meta($post->ID,'meta-call',true)) { ?>
                        <p class="phone">
                            <i class="fas fa-phone"></i>
                            <?php echo esc_html(get_post_meta($post->ID,'meta-call',true)); ?>
                        </p>
                    <?php } ?>  
                </div>
                <div class="authorbox-content">
                    <div class="socialbox">                           
                      <?php if(get_post_meta($post->ID,'meta-facebookurl',true) || get_post_meta($post->ID,'meta-twitterurl',true) || get_post_meta($post->ID,'meta-googleplusurl',true) || get_post_meta($post->ID,'meta-linkdenurl',true)){?>
                          <?php if(get_post_meta($post->ID,'meta-facebookurl',true)){?>
                            <a class="" href="<?php echo esc_html(get_post_meta($post->ID,'meta-facebookurl',true)); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                          <?php } if(get_post_meta($post->ID,'meta-twitterurl',true)){?>
                            <a class="" href="<?php echo esc_html(get_post_meta($post->ID,'meta-twitterurl',true)); ?>" target="_blank"><i class="fab fa-twitter"></i></a>                              
                          <?php } if(get_post_meta($post->ID,'meta-linkdenurl',true)){?>
                            <a class="" href="<?php echo esc_html(get_post_meta($post->ID,'meta-linkdenurl',true)); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                          <?php } if(get_post_meta($post->ID,'meta-googleplusurl',true)){?>
                            <a class="" href="<?php echo esc_html(get_post_meta($post->ID,'meta-googleplusurl',true)); ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                          <?php }?>
                      <?php }?>
                    </div>
                  </div>
                  <div class="testimonial_des">
                     <p class="mt-3"><?php the_content();?></p>
                   </div>  
                <div class="clearfix"></div>
            <?php endwhile; // end of the loop. ?>
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
        <div class="col-lg-3 col-md-5" id="sidebar">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </div>  
    </div>    
    <div class="clearfix"></div>
</div>
<?php get_footer(); ?>