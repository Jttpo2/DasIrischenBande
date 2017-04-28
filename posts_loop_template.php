<?php
/**
 * @package Posts_in_Page
 * @author Eric Amundson <eric@ivycat.com> 
 * @copyright Copyright (c) 2017, IvyCat, Inc.
 * @license http://www.gnu.org/licenses/gpl-2.0.html

 * Modified to suit Shapely theme
 */ 
?>

<!-- NOTE: If you need to make changes to this file, copy it to your current theme's main
	directory so your changes won't be overwritten when the plugin is upgraded. -->

	<!-- Post Wrap Start-->
	<div class="post hentry ivycat-post container">

		<?php
		$layout_type = get_theme_mod( 'blog_layout_view', get_post_format() );

		// get_template_part( 'template-parts/layouts/blog', $layout_type );
		get_template_part( 'template-parts/content', 'grid-wide' );

		if ( function_exists( "shapely_pagination" ) ):
			shapely_pagination();
		endif;
		?>

	</div>
	<!-- // Post Wrap End -->
