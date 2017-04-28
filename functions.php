<?php
// Enqueue child theme css
function my_theme_enqueue_styles() {

	$parent_style = 'shapely-style'; 

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css');
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version')
		);
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );



// No admin bar on top
show_admin_bar( true );

function get_page_header() {
	$sitename = get_bloginfo( 'name' );
	?>
	<h1 class="page-top site-title"><?php echo $sitename; ?></h1>
	<?php shapely_social_icons();
}

/**
* Removed author tag from posts
* Prints HTML with meta information for the current post-date/time and author.
*/
function shapely_posted_on_no_cat() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
		); ?>

		<ul class="post-meta">
			<li><span class="posted-on"><?php echo $time_string; ?></span></li>
		<!-- <li><span><?php echo esc_html__( 'by', 'shapely' ); ?> <a
					href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
					title="<?php echo esc_attr( get_the_author() ); ?>"><?php esc_html( the_author() ); ?></a></span>
				</li> -->
			</ul><?php
		}
		

		/* Allow shortcodes in widget areas */
		add_filter('widget_text', 'do_shortcode');
		?>
