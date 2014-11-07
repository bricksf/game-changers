<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Game Changers
 */

get_header(); ?>
    <?php


if( have_rows('subnav') ):

    // loop through the rows of data
    $align_left = get_field('align_left');
    echo '<div class="content-area"><ul class="subnav '.$align_left[0].'">';
    while ( have_rows('subnav') ) : the_row();

        // display a sub field value
        echo '<li><a href="#'.get_sub_field('subnav_slug').'">'.get_sub_field('subnav_title').'</a></li>';

    endwhile;
    echo '</ul></div>';

else :

    // no rows found

endif;

        
    ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
