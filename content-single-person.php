<?php
/**
 * @package Game Changers
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
	
	<?php
		$people = '';
	    if( have_rows('related_people') ):
            // loop through the rows of data
            while ( have_rows('related_people') ) : the_row();
                // display a sub field value

                $person = get_sub_field('person');
                $people .= $person->ID.',';
            endwhile;
            echo '<hr /><h2>Related People</h2>';
            echo do_shortcode('[people_grid ids="'.$people.'"]');
        else :
            // no rows found
        endif;
    
	?>
	<hr />
	<div class="center">
		<h2>Recommend a Game Changer</h2>
			<p>Do you know a member of the Davidson community — alumnus or alumna, faculty or staff member, current student — who has championed positive change — in family, community or world? If so, we invite you to nominate a game changer. Davidson will follow up to tell the story.</p>
￼￼￼￼￼￼￼</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
