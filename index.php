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
     	
			<?php 
		$args = array(
			'post_type' => 'slides',
			'orderby' => 'menu_order',
			'post_per_page' => -1	
		);

		$slides = new WP_Query( $args );

		if ( $slides->have_posts() ) : ?> 
			<div class="flexslider hidden-xs hidden-sm">
			  <ul class="slides">
			 <?php while ( $slides->have_posts() ) : $slides->the_post();?>
			    <li>
			      <?php the_post_thumbnail( 'slides' ); ?> 
			      <div>
			      <h2><?php the_title() ?></h2>
			      <?php the_content(); ?>
			      </div>
			    </li>
			  <?php endwhile; ?>  
			  </ul>
			</div>
		<?php endif; ?>
			

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
					<?php the_excerpt(); ?>	
					<a href="<?php the_permalink() ?>
						" class="my-btn">Continue Reading <i class="fa fa-angle-right"></i>
					</a>
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
