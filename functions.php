<?php

// load parent theme stylesheets

add_action( 'wp_enqueue_scripts', 'bmsg_enqueue_styles' );

function bmsg_enqueue_styles() {
    wp_enqueue_style( 'twenty-twenty-one-child-style', get_stylesheet_uri(),
        array( 'twenty-twenty-one-style' ), 
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}

//Add js scripts for the gallery and lightbox
add_action( 'wp_enqueue_scripts', 'bmsg_enqueue_scripts' );

function bmsg_enqueue_scripts() {

	wp_enqueue_script('masonry');
	//GALLLERY JS SCripts
    wp_enqueue_script( 'magnific', get_stylesheet_directory_uri() . '/js/magnific.js', array(), false, true );

    wp_enqueue_script( 'custom-lightbox.js', get_stylesheet_directory_uri() . '/js/custom-lightbox.js', array(), false, true );

}


// enqueue masonry from wp-includes to make a masonry style gallery

// function my_masonry(){
// 	wp_enqueue_script('masonry');
// }
// add_action('wp_enqueue_scripts', 'my_masonry');

function MasonOnLoad() { ?> 	
<!-- add masonry setting to the footer -->
  <script>
	(function( $ ) {
		"use strict";
		$(function() {
    			// set the container that Masonry will be inside of in a var
    			// adjust to match your own wrapper/container class/id name
   		 	var container = document.querySelector( '.gallery-content' );
    			//create empty var msnry
    			var msnry;
   		 	// initialize Masonry after all images have loaded
    			imagesLoaded( container, function() {
        			msnry = new Masonry( container, {
            		// adjust to match your own block wrapper/container class/id name
            		itemSelector: '.gallery-item'
        			});
    			});
		});
	}(jQuery));
//masonry for woo commerce
	(function( $ ) {
		"use strict";
		$(function() {
    			// set the container that Masonry will be inside of in a var
    			// adjust to match your own wrapper/container class/id name
   		 	var container = document.querySelector( 'ul.products' );
    			//create empty var msnry
    			var msnry;
   		 	// initialize Masonry after all images have loaded
    			imagesLoaded( container, function() {
        			msnry = new Masonry( container, {
            		// adjust to match your own block wrapper/container class/id name
            		itemSelector: 'li.entry.product',
								percentPosition: true
        			});
    			});
		});
	}(jQuery));
  </script>
<?php } // end function MasonOnLoad

add_action('wp_footer', 'MasonOnLoad'); 

//Add in the page that uses hooks to override the default woo stuff
require_once('woo-code.php');

function meks_which_template_is_loaded() {
  if ( is_super_admin() ) {
      global $template;
      print_r( $template );
    }
  }
 
//add_action( 'wp_footer', 'meks_which_template_is_loaded' );

	

//the function for making the date and cats and tags for the blog
	if ( ! function_exists( 'twenty_twenty_one_entry_meta_header' ) ) {
		/**
		 * Prints HTML with meta information for the categories, tags and comments.
		 * Footer entry meta is displayed differently in archives and single posts.
		 *
		 * @since Twenty Twenty-One 1.0
		 *
		 * @return void
		 */
		function twenty_twenty_one_entry_meta_header() {
	
			// Early exit if not a post.
			if ( 'post' !== get_post_type() ) {
				return;
			}
	
			// Hide meta information on pages.
			if ( ! is_single() ) {
	
				if ( is_sticky() ) {
					echo '<p>' . esc_html_x( 'Featured post', 'Label for sticky posts', 'twentytwentyone' ) . '</p>';
				}
	
				$post_format = get_post_format();
				if ( 'aside' === $post_format || 'status' === $post_format ) {
					echo '<p><a href="' . esc_url( get_permalink() ) . '">' . twenty_twenty_one_continue_reading_text() . '</a></p>'; // phpcs:ignore WordPress.Security.EscapeOutput
				}
	
				// Posted on.
				twenty_twenty_one_posted_on();
	
				// Edit post link.
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post. Only visible to screen readers. */
						esc_html__( 'Edit %s', 'twentytwentyone' ),
						'<span class="screen-reader-text">' . get_the_title() . '</span>'
					),
					'<span class="edit-link">',
					'</span><br>'
				);
	
				if ( has_category() || has_tag() ) {
	
					echo '<div class="post-taxonomies">';
	
					/* translators: Used between list items, there is a space after the comma. */
					$categories_list = get_the_category_list( __( ' ', 'twentytwentyone' ) );
					if ( $categories_list ) {
						printf(
							/* translators: %s: List of categories. */
							'<span class="cat-links">' . esc_html__( '%s', 'twentytwentyone' ) . ' </span>',
							$categories_list // phpcs:ignore WordPress.Security.EscapeOutput
						);
					}
	
					/* translators: Used between list items, there is a space after the comma. */
					$tags_list = get_the_tag_list( '', __( ' ', 'twentytwentyone' ) );
					if ( $tags_list ) {
						printf(
							/* translators: %s: List of tags. */
							'<span class="tags-links">' . esc_html__( '%s', 'twentytwentyone' ) . '</span>',
							$tags_list // phpcs:ignore WordPress.Security.EscapeOutput
						);
					}
					echo '</div>';
				}
			} else {
	
				echo '<div class="posted-by">';
				// Posted on.
				//twenty_twenty_one_posted_on();
				get_the_date('j-m-Y');
				// Posted by.
				twenty_twenty_one_posted_by('j-m-Y');
				// Edit post link.
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post. Only visible to screen readers. */
						esc_html__( 'Edit %s', 'twentytwentyone' ),
						'<span class="screen-reader-text">' . get_the_title() . '</span>'
					),
					'<span class="edit-link">',
					'</span>'
				);
				echo '</div>';
	
				if ( has_category() || has_tag() ) {
	
					echo '<div class="post-taxonomies">';
	
					/* translators: Used between list items, there is a space after the comma. */
					$categories_list = get_the_category_list( __( '', 'twentytwentyone' ) );
					if ( $categories_list ) {
						printf(
							/* translators: %s: List of categories. */
							'<span class="cat-links">' . esc_html__( 'Categorized as %s', 'twentytwentyone' ) . ' </span>',
							$categories_list // phpcs:ignore WordPress.Security.EscapeOutput
						);
					}
	
					/* translators: Used between list items, there is a space after the comma. */
					$tags_list = get_the_tag_list( '', __( ' ', 'twentytwentyone' ) );
					if ( $tags_list ) {
						printf(
							/* translators: %s: List of tags. */
							'<span class="tags-links">' . esc_html__( '%s', 'twentytwentyone' ) . '</span>',
							$tags_list // phpcs:ignore WordPress.Security.EscapeOutput
						);
					}
					echo '</div>';
				}
			}
		}
	}

	//menus
register_nav_menus( array(
	'primary' => esc_html__( 'Primary', 'twentytwentyone' ),
	//'mobile_top' => esc_html__( 'Mobile Top', 'smash_theme' ),
	//'mobile_bottom' => esc_html__( 'Mobile Bottom', 'smash_theme' ),
	'footer' => esc_html__( 'Footer', 'twentytwentyone' ),
	//'shop' => esc_html__( 'Shop', 'smash_theme' ),
) );

//CUSTOM FIELDS MENU ADDITIONS 
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Header Settings',
	// 	'menu_title'	=> 'Header',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Fields',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}
//add support for all types of posts
add_theme_support( 'post-formats', 
	array( 
		'aside', 
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat'
	) 
);
add_post_type_support( 'post', 'post-formats' );
add_post_type_support( 'page', 'post-formats' );
