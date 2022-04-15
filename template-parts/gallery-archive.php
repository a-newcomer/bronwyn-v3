<?php
/**
 * Template part for displaying custom gallery posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- <header class="entry-header"> -->
		<!-- <?php //if ( is_singular() ) : ?>
			<?php //the_title( '<h1 class="entry-title gallery-title default-max-width">', '</h1>' ); ?>
		<?php //else : ?>
			<?php //the_title( sprintf( '<h2 class="entry-title gallery-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php //endif; ?> 

	</header>--><!-- .entry-header-->

	<div class="entry-content gallery-archive-content">
		<?php //twenty_twenty_one_post_thumbnail(); ?>
    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
		<?php  ?>
    <div class="gallery-feat-image" style="background-image: url('<?php echo $backgroundImg[0]; ?>'); " >

    </div>

		<?php //twenty_twenty_one_post_thumbnail(); ?>
    <?php the_title( sprintf( '<h3 class="entry-title gallery-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		<?php
		// the_content(
		// 	twenty_twenty_one_continue_reading_text()
		// );
    the_excerpt(); ?>

    <?php
		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
			)
		);

		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->