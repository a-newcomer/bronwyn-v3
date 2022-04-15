<?php
/**
* The template for displaying archive pages
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>

<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
	<header class="page-header alignwide">
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	</header><!-- .page-header -->
<?php endif; ?>

<?php
if ( have_posts() ) { ?>
	<div class="archive-container flex-col-center cat-container">
		<?php // Load posts loop.
		while ( have_posts() ) {
			the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php // Don't show the title if the post-format is `aside` or `status`.
				$post_format = get_post_format();
				if ( 'aside' === $post_format || 'status' === $post_format ) {
					return;
				} ?>
					
				<div class="entry-meta">
					<?php twenty_twenty_one_entry_meta_header(); ?>
				</div>
					<!-- make this a bg image so I can shape it any way I like -->
				<?php twenty_twenty_one_post_thumbnail();	?>
				<div class="text-body">
					<header class="entry-header">
						<?php
						the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );
						
						?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_excerpt(); ?>
					</div><!-- .entry-content -->
				</div>

				<!-- <footer class="entry-footer default-max-width">
					<?php //twenty_twenty_one_entry_meta_footer(); ?>
				</footer>.entry-footer -->
				</article><!-- #post-${ID} -->

				<?php	}

		// Previous/next page navigation.
		twenty_twenty_one_the_posts_navigation(); ?>
	</div> 
	<?php
} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content-none' );

}

get_footer();
