<?php
get_header(); ?>

	<div id="primary1" class="content-area">
		<?php if (have_posts()) : ?> 
		<h3><?php single_cat_title() ?> - Gallery</h3> 
		<div class="wrap1"> 
		<?php while (have_posts()) : the_post(); ?> 
		<section class="images-bloger"> 
		<?php if (has_post_thumbnail()) : ?> 
		<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail(full) ?></a> 
		<?php endif ?> 
		<h2> 
		<a href="<?php the_permalink() ?>"><?php the_title() ?></a> 
		</h2> 
		<a href="<?php the_permalink() ?>" class="text"><?php the_excerpt(); ?></a> 
		</section> 
		<?php endwhile; ?> 
		</div> 
		<?php else : echo "<p>No content found</p>"; 
		endif; 
		?>
	<?php the_posts_pagination( $args ); ?>		
	 
	<!-- #main -->	
	</div><!-- #primary -->	
<?php
get_sidebar();
get_footer();
