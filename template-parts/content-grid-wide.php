<?php
/**
 * Template part for displaying posts.

 * Edit:
 * Flipped order of header and content
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shapely
 */

?>
	<div class="row">
		<article id="post-<?php the_ID(); ?>" class="post-content post-grid-wide col-md-12">
			
			<div class="entry-content">
				<h2 class="post-title">
					<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo wp_trim_words( get_the_title(), 9 ); ?></a>
				</h2>

				<div class="entry-meta">
					<?php
					shapely_posted_on_no_cat(); ?><!-- post-meta -->
				</div>

				<?php
				the_content( sprintf(
				             /* translators: %s: Name of current post. */
					             wp_kses( __( 'Read more %s <span class="meta-nav">&rarr;</span>', 'shapely' ), array( 'span' => array( 'class' => array() ) ) ),
					             the_title( '<span class="screen-reader-text">"', '"</span>', false )
				             ) );

				wp_link_pages( array(
					               'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'shapely' ),
					               'after'  => '</div>',
				               ) );
				?>
			</div><!-- .entry-content -->
			<header class="entry-header nolist">
				<?php
				$category = get_the_category();
				$image    = '<img class="wp-post-image" alt="" src="' . get_template_directory_uri() . '/assets/images/placeholder_wide.jpg" />';
				if ( has_post_thumbnail() ) {
					$layout = ( function_exists( 'shapely_get_layout_class' ) ) ? shapely_get_layout_class() : '';
					$size   = 'shapely-featured';

					if ( $layout == 'full-width' ) {
						$size = 'shapely-full';
					}
					$image = get_the_post_thumbnail( get_the_ID(), $size );
				}
				$allowed_tags = array(
					'img'      => array(
						'data-srcset' => true,
						'data-src'    => true,
						'srcset'      => true,
						'sizes'       => true,
						'src'         => true,
						'class'       => true,
						'alt'         => true,
						'width'       => true,
						'height'      => true
					),
					'noscript' => array()
				);
				?>
				<a href="<?php echo esc_url( get_the_permalink() ); ?>">
					<?php echo wp_kses( $image, $allowed_tags ); ?>
				</a>

				<?php if ( isset( $category[0] ) ): ?>
				<span class="shapely-category">
					<a href="<?php echo esc_url( get_category_link( $category[0]->term_id ) ); ?>">
						<?php echo esc_html( $category[0]->name ); ?>
					</a>
				</span>
				<?php endif; ?> 
			</header><!-- .entry-header -->
		</article><!-- #post-## -->
	</div>
<?php
