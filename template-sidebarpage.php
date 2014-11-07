<?php
/*
Template Name: Game Changers Sidebar
*/

get_header();

?>
    
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
        <main id="main" class="site-main sidebar-layout padding" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-## -->

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
        <div id="secondary" class="widget-area sidebar" role="complementary">
        <?php 
        if(get_field('sidebar')){
            echo get_field('sidebar');
        }
        ?>
        </div>
    </div><!-- #primary -->

<?php get_footer(); ?>