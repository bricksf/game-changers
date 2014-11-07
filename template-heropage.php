<?php
/*
Template Name: Game Changers Hero
*/

get_header();

?>
    
    <?php
        // check if the repeater field has rows of data
        $hero_image = get_field('hero_image');
        $position = get_field('hero_position');

        echo '<div class="hero" style="background-image:url('.get_field('hero_image').');"><div class="content-area"><div class="text-block '.$position[0].'"><p>'.get_field('hero_text').'</p></div></div></div>';

    ?>

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