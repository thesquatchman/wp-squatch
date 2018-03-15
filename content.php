<?php
/**
 * The default template for displaying content
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('pad'); ?>>
	<?php
		// Post thumbnail.
		the_post_thumbnail();
	?>

	<header class="entry-header">
		<?php
			if ( is_single() || is_page() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( is_single() || is_page() ) :
				the_content( sprintf(
					__( 'Continue reading %s', 'wp-squatch' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

			else :
				the_excerpt();
			endif;
			
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wp-squatch' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'wp-squatch' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php
		// Author bio. **** don't do this
		// if ( is_single() && get_the_author_meta( 'description' ) ) :
		// 	get_template_part( 'author-bio' );
		// endif;
	?>

	<?php 
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>


	<footer class="entry-footer">
		<?php do_action( 'wp_squatch_entry_meta'); ?>
		<?php the_tags( 'Tags: ', ', ', '<br />' ); ?>
		<?php edit_post_link( __( 'Edit', 'wp-squatch' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
