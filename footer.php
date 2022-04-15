<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

			<section class="instagram-section">
					<?php echo do_shortcode(get_field('instagram_feed_shortcode','option')); ?>
			</section>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<?php //get_template_part( 'template-parts/footer/footer-widgets' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
    
		<?php if(get_field('frieze')) {
						$frieze = get_field('frieze'); ?>
			<section id="frieze" style="background: url(<?php echo $frieze; ?>) repeat center;">
			</section>
		<?php  } ?>

		<div class="site-info">
			<div class="site-name">
				<?php if ( has_custom_logo() ) : ?>
					<div class="site-logo"><?php the_custom_logo(); ?></div>
				<?php else : ?>
					<?php if ( get_bloginfo( 'name' ) && get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
						<?php if ( is_front_page() && ! is_paged() ) : ?>
							<?php bloginfo( 'name' ); ?>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div><!-- .site-name -->


		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-navigation">
				<ul class="footer-navigation-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'items_wrap'     => '%3$s',
							'container'      => false,
							'depth'          => 1,
							'link_before'    => '<span>',
							'link_after'     => '</span>',
							'fallback_cb'    => false,
						)
					);
					?>
				</ul><!-- .footer-navigation-wrapper -->
			</nav><!-- .footer-navigation -->
		<?php endif; ?>

			<div class="powered-by">
				<?php
				printf(
						/* translators: %s: WordPress. */
						esc_html__( 'Designed by %s', 'twentytwentyone' ),
						'<a href="' . esc_url( __( 'https://annssite.com/', 'twentytwentyone' ) ) . '">Ann Newcomer</a>'
					);
				printf(
					/* translators: %s: WordPress. */
					esc_html__( ' on a theme by %s.', 'twentytwentyone' ),
					'<a href="' . esc_url( __( 'https://wordpress.org/', 'twentytwentyone' ) ) . '">WordPress</a>'
				);
				?>
			</div><!-- .powered-by -->

		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->
<!-- Magnific Popup core JS file -->
<!-- <script src="https://merritt.dev.cc/wp-content/themes/twentytwentyone-child/js/magnific.js"></script> -->

<!-- <script src="https://merritt.dev.cc/wp-content/themes/twentytwentyone-child/js/custom-lightbox.js"></script> -->


<?php wp_footer(); ?>

</body>
</html>
