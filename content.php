<?php
/**
 * @package Game Changers
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

		?>
		<img src="<?php echo $url; ?>" class="feature_image" />
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_excerpt( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'game-changers' ), 
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'game-changers' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php game_changers_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>


</article><!-- #post-## -->
