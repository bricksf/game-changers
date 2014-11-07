<?php
/*
Template Name: Game Changers Hompage
*/

get_header();

?>
    
    <div class="slick">
    <?php
        // check if the repeater field has rows of data
        if( have_rows('homepage_slide') ):
            // loop through the rows of data
            while ( have_rows('homepage_slide') ) : the_row();
                // display a sub field value
                $position = get_sub_field('text_position');
                echo '<div class="slick-slide" style="background-image:url('.get_sub_field('slider_image').');"><div class="content-area"><div class="text-block '.$position[0].'"><p>'.get_sub_field('slider_text').'</p><a href="'.get_sub_field('slider_link').'" class="link">Read More</a></div></div></div>';
            endwhile;
        else :
            // no rows found
        endif;
    ?>
    </div>

    <div id="primary" class="content-area">
        <main id="main" class="site-main padding" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-## -->

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>