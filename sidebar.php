<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package my_newtheme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area <?php echo get_theme_mod('part_sidebar'); ?>" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<div class="diveside">
	<?php echo get_theme_mod( 'banner_theme' ); ?>
	</div>
</aside><!-- #secondary -->
