<?php
/**
 * Template to show the content of blog
 *
 * @package vw_courier_serivce_pro
 */
$about_section = get_theme_mod('vw_courier_serivce_pro_latest_blog_and_news_enable');
if ('Disable' == $about_section) {
  return;
}
if (get_theme_mod('vw_courier_serivce_pro_latest_blog_and_news_bgcolor', '')) {
  $about_backg = 'background-color:' . esc_attr(get_theme_mod('vw_courier_serivce_pro_latest_blog_and_news_bgcolor', '')) . ';';
} elseif (get_theme_mod('vw_courier_serivce_pro_latest_blog_and_news_bgimage', '')) {
  $about_backg = 'background-image:url(\'' . esc_url(get_theme_mod('vw_courier_serivce_pro_latest_blog_and_news_bgimage')) . '\')';
} else {
  $about_backg = '';
}
$img_bg = get_theme_mod('vw_courier_serivce_pro_latest_blog_and_news_bgimage');

?>



<section id="blog-news" style="<?php echo esc_attr($about_backg); ?>" class="<?php echo esc_attr($img_bg); ?>  section-space">
  <div class="container">
    <div class="row">
      <?php if (get_theme_mod('vw_courier_serivce_pro_blog_heading_tagline') != false && get_theme_mod('vw_courier_serivce_pro_blog_heading') != false) { ?>
        <div class="heading text-center">
          <div class="heading-tagline">
            <?php echo get_theme_mod('vw_courier_serivce_pro_blog_heading_tagline'); ?>
          </div>
          <h2>
            <?php echo get_theme_mod('vw_courier_serivce_pro_blog_heading'); ?>
          </h2>
        </div>
      <?php } ?>
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
            <div class="blog-card" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
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
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><p><i class="<?php echo get_theme_mod('vw_courier_serivce_pro_blog_author'); ?>" aria-hidden="true"> </i><?php the_author(); ?></p></a>
                  <p>
                    <i class="<?php echo get_theme_mod('vw_courier_serivce_pro_blog_comment_icon'); ?>"></i>
                    <?php comments_number(); ?>
                  </p>
                  <p><i class="<?php echo get_theme_mod('vw_courier_serivce_pro_blog_fright_icon'); ?>"></i>
                  <?php
                  // Check if the post has tags
                  $post_tags = get_the_tags();
                    if ($post_tags) {
                        echo '<p>';
                        foreach ($post_tags as $tag) {
                            // Generate the link to view all posts with this tag
                            $tag_link = get_tag_link($tag);
                            // Display the tag as a link
                            echo '<a href="' . esc_url($tag_link) . '">' . $tag->name . '</a>';
                            // Add a comma and space after each tag (except the last one)
                            if ($tag !== end($post_tags)) {
                                echo ', ';
                            }
                        }

                        echo '</p>';
                    } 
                    ?></p>
                </div>
                <a href="<?php the_permalink(); ?>"><h5>
                <?php the_title(); ?>
                </h5></a>
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
</section>