<?php
/**
 * Template Name:Page with Left Sidebar
 */

get_header();

get_template_part('template-parts/banner'); ?>

<?php do_action('vw_courier_serivce_pro_before_page'); ?>
<section id="page-with-left-sidebar">
    <div class="container">
      <div class="middle-align">
        <div class="row">
          <div class="col-md-3" id="sidebar">
            <?php dynamic_sidebar('sidebar-2'); ?>
          </div>
          <div class="col-md-9 content_page">
              <?php while ( have_posts() ) : the_post(); ?>
                 <?php the_content();?>
                 <?php
                 //If comments are open or we have at least one comment, load up the comment template
                  if ( comments_open() || '0' != get_comments_number() )
                      comments_template();
                 ?>
               <?php endwhile; // end of the loop. ?>
           </div>
           <div class="clear"></div>
        </div>
      </div>
    </div>
</section>
<?php do_action('vw_courier_serivce_pro_after_page'); ?>

<?php get_footer(); ?>
