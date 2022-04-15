<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

    <header class="page-header alignwide gallery-archive-header">
      <?php //the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
      <!-- //need to add custom field here -->
      <h1 class="page-title">My Art</h1>
      <?php if ( $description ) : ?>
        <div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
      <?php endif; ?>
    </header><!-- .page-header -->

  <div class="gallery-archive-container">

    <?php while ( have_posts() ) : ?>
      <?php the_post(); ?>
      <?php get_template_part( 'template-parts/gallery-archive', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
    <?php endwhile; ?>

    <?php twenty_twenty_one_the_posts_navigation(); ?>
  </div><!-- /gallery-archive-container -->
	<footer class="entry-footer default-max-width">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->
<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

	<footer class="entry-footer">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->


<?php get_footer(); ?>
