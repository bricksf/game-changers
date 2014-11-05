<?php
/**
 * The template for displaying all single posts.
 *
 * @package Game Changers
 */

get_header(); ?>

    <div class="feature">
    <?php
        // check if the repeater field has rows of data
    	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    	$force_right = '';
        if(get_field('force_right')){
            $force_right = 'force-right';
        }
        echo '<div class="feature-block" style="background-image:url('.$url.');"><div class="content-area"><div class="text-block '.$force_right.'"><p class="quote">'.get_field('person_quote').'</p><p><span class="name">'.get_the_title().'</span><br /><span class="title">'.get_field('person_title').'</span></p></div></div></div>';

    ?>
    </div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single-person' ); ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>