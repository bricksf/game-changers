<?php
	$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
	require_once ($parse_uri[0] . 'wp-load.php');
?>
<?php 
$args = array(
    'post_type' => 'people',
    'post_status' => 'publish',
    'posts_per_page' => $_GET['posts_per_page'],
    'paged' => $_GET['page']
);

// define loop
$loop = new WP_Query( $args );

    $i = 0;

while ($loop->have_posts()) : $loop->the_post();

        $active = '';
        $url = get_field('grid_image');
        //$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
        if($i==0){
            $active = ' active';
        }
        $post_terms = '';
        $post_terms_query = wp_get_post_terms( get_the_ID(), 'group' );
        foreach ( $post_terms_query as $term ) {
            $post_terms = $term->slug;
        }

        $items .= '<div class="block-4 person '.$post_terms.'">'."\r\n";
        $items .= '
        <div class="flip-container">'.
            '<a href="'.get_permalink().'" class="flipper">'.
                '<div class="front">'.
                '<img src="'.$url.'" />'.
                '</div>'.
                '<div class="back"><div class="pad">'.
                '<h3>'.get_the_title().'</h3>'.
                get_field('person_title').
                '</div></div>'.
            '</a>'.
        '</div>';
        $items .= '</div>'."\r\n";
        $i++;
    endwhile;
    wp_reset_query();
    if($items != ''){
        echo $items;
    }else{
        echo '';
    }


?>


