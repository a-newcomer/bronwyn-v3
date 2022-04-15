<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

add_action( 'wp_enqueue_scripts', function(){
	wp_enqueue_script( 'magnific', get_template_directory_uri() . '/js/magnific.js', array('jquery'), '1', true );
} );
	

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignwide">
		<?php the_title( '<h1 class="entry-title gallery-title">', '</h1>' ); ?>
		<?php //twenty_twenty_one_post_thumbnail(); ?>
	</header><!-- .entry-header -->

	<div class="gallery-content">
		<?php
		$images = get_field('gallery');
			//var_dump("first in array", $images[0]['id']);
			if($images): ?>
				<?php foreach($images as $image): ?>
					<a class="gallery-item" href="<?php echo $image['sizes']['large'];?>">
						<div class="gallery-item-inner">
							<img src="<?php echo $image['sizes']['large']; ?>">
							<h5 class="price"><?php echo get_field('price', $image['id']); ?></h5>
						</div>
				</a>

				<?php endforeach; ?>
			
			<?php endif;




		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
			)
		);
		?>
	</div><!-- .gallery-content -->
	
	<div class="entry-content">
		<?php	the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer default-max-width">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author-bio' ); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
