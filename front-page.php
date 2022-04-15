<?php
/**
 * Template Name: Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

  get_header();

  /* Start the Loop */
  while ( have_posts() ) :
    the_post(); ?>
    <?php 
      $boxes = get_field('top_main_section_images');
      if( $boxes ) { ?>
        <section id="front_page_hero">
          <?php foreach( $boxes as $box ) { 
            $bgImage = $box['background_image'];
            $link = $box['link'];
            ?>
              <?php if($link || $bgImage) : ?>
              <a href="<?php echo $link; ?>" class="fp-top-group-image flex-center" style="background: url(<?php echo $bgImage['url']; ?>) no-repeat center/cover;">
                <h3 class="ft-top-group-header"><?php echo $box['title']; ?></h3>
              </a>
              <?php endif; ?>

          <?php } ?>

          <?php 
            $image = get_field('full_logo');
            if( !empty( $image ) ): ?>
                <img class="full-logo" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
        </section>
    <?php  } ?>

    <?php if(get_field('frieze')) {
            $frieze = get_field('frieze'); ?>
      <section id="frieze" style="background: url(<?php echo $frieze; ?>) repeat center;">
      </section>
    <?php  } ?>
    
    <?php $first_announcement_image = get_field('first_announcement_image'); ?>
    <?php if(get_field('first_announcement_image')) { ?>
      <section id="front_page_announcement" class="flex-center"  style="background: url(<?php echo $first_announcement_image; ?>) no-repeat center/cover;">
          <div class="announcement-body" class="flex-col-center">
            <h2 class="announcement-title"><?php echo the_field('first_announcement_title'); ?></h2>
            <p class="announcement-text"><?php echo the_field('first_announcement_text'); ?></p>
                <!-- <a href="" class="announcement-picture" style="background: url(<?php //echo $first_announcement_image; ?>) no-repeat center/cover;">
              </a> -->

            <?php if(get_field('first_announcement_link')) : ?>
              <a href="<?php echo get_field('first_announcement_link'); ?>" class="announcement-btn button">Learn More</a>
            <?php endif; ?>
          </div>

      </section>
    <?php  } ?>

    <?php if(get_field('hide_products')== '0') : ?>
      <section id="front_page_products" class="woocommerce">
        <?php else : ?>

      <section id="front_page_products" class="woocommerce hide-div">
            <?php endif; ?>
            <?php if(get_field('featured_work_title')) : ?>
              <h2 class="fp-product-title fp-section-title">
                <?php echo get_field('featured_work_title') ?>
              </h2>
            <?php endif; ?>
            <?php if(get_field('featured_work_shortcode')) { ?>
                      <?php echo do_shortcode(get_field('featured_work_shortcode')); ?>
            <?php } ?>

        <!-- TO DO - MAKE A REAL, CHOOSABLE LOOP WITH THE BELOW PARAMETERS -->
          <?php
            //$products = get_field('choose_featured_work'); ?> 
                
        <!-- <?php //if( $products ): ?>
            <ul class="fp-products flex-row products" >
              <?php //foreach( $products as $product): ?>
                <li class="entry product fp-product" style="">
        
                <a href="<?php //echo get_post_permalink($product->ID); ?>" class="fp-product-image flex-center" style="background: url(<?php //echo get_the_post_thumbnail_url($product->ID, 'full'); ?>) no-repeat center/cover;">
                </a>
                  <?php 
                        //echo get_the_post_thumbnail_url($product->ID, 'full');
                        //echo get_the_post_thumbnail($product->ID, 'full');
                        // echo get_the_title($product->ID);
                        // echo $product->price;
                        // echo wc_price( $product->price );
                        // echo get_field('art_medium', $product->ID);
                        // echo get_field('art_size', $product->ID);
                        // echo get_field('number_available', $product->ID);
                    ?>
                </li>
        
          <?php //endforeach; ?>
              </ul>
        <?php //endif; ?> -->

      </section>

    <section id="front_page_announcement" class="about-me flex-center">
          <div class="announcement-body" class="flex-col-center">
            <h2 class="announcement-title"><?php echo the_field('bottom_announcement_title'); ?></h2>
            <p class="announcement-text"><?php echo the_field('bottom_announcement_text'); ?></p>
            <?php if(get_field('bottom_announcement_image')) {
            $bottom_announcement_image = get_field('bottom_announcement_image'); ?>
              <a href="" class="announcement-picture about-picture" style="background: url(<?php echo $bottom_announcement_image; ?>) no-repeat center/cover;"></a>
            <?php  } ?>
            <?php if(get_field('bottom_announcement_link')) : ?>
              <a href="<?php echo get_field('bottom_announcement_link'); ?>" class="announcement-btn button">Learn More</a>
            <?php endif; ?>
          </div>

    </section>

    <?php if(get_field('hide_categories') == '0') : ?>
      <section id="front_page_products_cats" class="">
    <?php else : ?>
      <section id="front_page_products_cats" class="hide-div">
    <?php endif; ?>
      <?php if(get_field('product_category_section_title')) { ?>
        <h2 class="fp-product-title fp-section-title"><?php echo the_field('product_category_section_title'); ?></h2>
      <?php  } ?>
      <?php echo do_shortcode('[product_categories number="4" orderby="date"  order="desc"]'); ?>
    </section>

    <?php if(get_field('hide_posts') == '0') : ?>
      <section id="fp-blog" class="">
    <?php else : ?>
      <section id="fp-blog" class="hide-div">
    <?php endif; ?>
      <?php if(get_field('post_section_title')) { ?>
        <h2 class="fp-blog-title fp-section-title"><?php echo the_field('post_section_title'); ?></h2>
      <?php  } ?>
        <?php
        $args = ['post_type'=> 'post', "numberposts" => 3];
        $posts = get_posts($args);

        if ( $posts ) : ?>
          <div class="fp-posts-holder">
            <?php 
            foreach ( $posts as $post ) : setup_postdata( $post );  ?>
                <article class="fp-post" ?>
                    <!-- //make this a bg image -->
                    <?php //the_post_thumbnail(); ?>
                    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
                    <?php  ?>
                    <a href="<?php the_permalink(); ?>" class="fp-post-link">
                      <div class="fp-post-image flex-col-center" style="background-image: url('<?php echo $backgroundImg[0]; ?>'); " >
                        <h4><?php the_title(); ?></h4>
                      </div>
                    </a>
                </article>


            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
          </div>
        <?php endif; ?>
    </section>

    <?php if(get_field('frieze')) {
            $frieze = get_field('frieze'); ?>
      <section id="frieze" style="background: url(<?php echo $frieze; ?>) repeat center;">
      </section>
    <?php  } ?>

   <?php 
    // If comments are open or there is at least one comment, load up the comment template.
    
  endwhile; // End of the loop.

  get_footer();