<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package my_newtheme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<h3 class="style list"><?php echo ot_get_option('sample_text1');?></h3>
		<main id="main" class="site-main" role="main">
			
						<?php 
			if (have_posts()) : 
			while (have_posts()) : the_post(); 
			?>	
			<section>

				<div class="date">
					<p class="number">
						<?php the_time('j'); ?>
						<span class="month"><?php the_time('F'); ?></span>
						</p>
				</div>
				<div class="article">
					<h2>
						<a href="<?php the_permalink() ?>
							">
							<?php the_title() ?></a>
					</h2>
					<div class="article-block">
					<p class="comments">
						<a href="<?php the_permalink() ?>
							#comments">
							<?php comments_number('no comments', '1 comment', '% comments'); ?></a>
					</p>
					<p class="category">
						<?php the_category(','); ?>
					</p>
					</div>	
					<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
				</div>
			</section>
			<?php endwhile; 
			else : 
			echo "<p>No content found</p>
					"; 
			endif; 
			?>
	<?php the_posts_pagination( $args ); ?>		
	</main>
	<!-- #main -->	
	</div><!-- #primary -->	
<?php
get_sidebar();
get_footer();
