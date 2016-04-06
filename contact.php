<?php
/*
Template Name: contact
 */
get_header(); ?>

	<div class="contact-around">
		<main >
						<?php 
			if (have_posts()) : 
			while (have_posts()) : the_post(); 
			?>	
			<section class="contact-area">
				<div class="contact-text col-md-3 col-lg-3">
					<h2>
							<?php the_title() ?> 
					</h2>
					<?php the_content(); ?>	
				</div>	
				<div class="col-md-6 col-lg-6 hidden-xs hidden-sm">		
					  <?php 
	          if (has_post_thumbnail()) :
	           ?>
            <?php the_post_thumbnail(full) ?> 
            <?php endif ?>
                </div>
	            <aside class="col-md-3 col-lg-3">
				<h3>name</h3> 
				<p class="number"><span></span> <?php echo ot_get_option( 'number' ); ?></p> 
				<p class="about"><?php echo ot_get_option( 'about' ); ?></p> 
				<p class="email"><span></span><?php echo ot_get_option( 'email' ); ?></p> 
				</aside>
			</section> 
			<section class="sidebar-sidebar col-md-8 col-lg-8">
			<?php dynamic_sidebar( 'contact_sidebar1' ); ?>
			</section>
			<?php endwhile; 
			else : 
			echo "<p>No content found</p>
					"; 
			endif; 
			?>
	</main>
	<!-- #main -->	
	</div>
<?php
get_footer();