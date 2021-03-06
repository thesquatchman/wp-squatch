<?php get_header(); ?>
		<main id="main" class="col row-sm just-between-md contained" role="main">
		<?php 
		if ( have_posts() ) : 
			// Start the loop.
			while ( have_posts() ) : the_post();

				
				get_template_part( 'content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'wp-squatch' ),
				'next_text'          => __( 'Next page', 'wp-squatch' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'wp-squatch' ) . ' </span>',
			) );

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content', 'none' );
	
		endif; 
		?>
		<?php if ( is_active_sidebar( 'sidebar' ) ) { ?>
				<aside id="sidebar" class="md4 pad">
					<?php dynamic_sidebar( 'sidebar' ); ?>
				</aside>
			<?php } ?>
		</main>
		
<?php get_footer(); ?>