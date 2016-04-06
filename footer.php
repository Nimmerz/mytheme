<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package my_newtheme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="copy col-md-8 col-lg-8 col-xs-12 col-sm-12">  
      <p><?php echo ot_get_option('sample_text');?></p>
    </div>
    <div class="copy col-md-4 col-lg-4 col-xs-12 col-sm-12">
    <?php my_simone_social_menu(); ?>
    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
