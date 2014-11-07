<?php 

function people_grid_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'count' => '-1',
		'group' => 'human-rights',
		'gallery' => '',
		'style' => 'two',
		'shownav' => false,
		'ids' => ''
	), $atts ) );

	$items = '';
	$terms = get_terms('group');
	print_r($term);

	if($shownav){
	    $items .= '<ul class="people-select">';
	    $items .= '<li class="active"><a href="#all">All</a></li>';
	    foreach ( $terms as $term ) {
	    	$items .= '<li><a href="#' . $term->slug . '">' . $term->name . '</a></li>';
	    }
	    $items .=  '</ul>';
 	}

 	if($ids){
 		$post_ids = explode(",",$ids);
		$args=array(
			'post__in' => $post_ids,
			'post_type' => 'people',
			'post_status' => 'publish',
			'posts_per_page' => $count,
		);
	}else{
		$args=array(
			'post_type' => 'people',
			'post_status' => 'publish',
			'posts_per_page' => $count,
		);
	}	
	query_posts($args);


	$i = 0;
	$items .= '<div class="grid people-list">'."\r\n";

	query_posts($args);
	while (have_posts()) : the_post();
		$active = '';
		$url = get_field('grid_image');
		//$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		if($i==0){
			$active = ' active';
		}
		$post_terms_query = wp_get_post_terms( get_the_ID(), 'group' );
		foreach ( $post_terms_query as $term ) {
    		$post_terms = $term->slug;
     	}

		$items .= '<div class="block-4 person '.$post_terms.'">'."\r\n";
		$post_terms = '';
		$items .= '
		<div class="flip-container" ontouchstart="this.classList.toggle(\'hover\');">'.
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
	$items .= '</div>'."\r\n";


	return $items;

}

add_shortcode( 'people_grid', 'people_grid_shortcode' );



function blog_list_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'count' => '-1',
		'group' => 'venues',
		'gallery' => '',
		'style' => 'two'
	), $atts ) );

	$args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 5
	);
	query_posts($args);


	$i = 0;
	$items = '<div class="homepage-blog">'."\r\n";
	query_posts($args);
	while (have_posts()) : the_post();
		$active = '';
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		if($i==0){
			$active = ' active';
		}
		$items .= '<div class="blog-item">'."\r\n";
		$items .= '<div class="blog-image" style="background-image:url('.$url.');">'."\r\n";
		//$items .= '<img src="'.$url.'" />'."\r\n";
		$items .= '</div>'."\r\n";
		$items .= '<div class="body">';
		$items .= '<h4>'.get_the_title().'</h4>';
		$items .= '<time>'.get_the_date('F j, Y').'</time>';
		$items .= '<div class="excerpt">'.get_the_excerpt().'</div>';
		$items .= '</div>'."\r\n";
		$items .= '</div>'."\r\n";
		$i++;
	endwhile;
	wp_reset_query();
	$items .= '</ul>'."\r\n";


	return $items;

}

add_shortcode( 'blog_list', 'blog_list_shortcode' );




function slick_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'count' => '-1',
		'group' => 'venues',
		'gallery' => '',
		'style' => 'two'
	), $atts ) );

	$args=array(
		'post_type' => 'slide',
		'post_status' => 'publish',
		'posts_per_page' => $count,
		'group' => $group
	);
	query_posts($args);

	$i = 0;
	$slick = '<div class="touch-slider">'."\r\n";
	query_posts($args);
	while (have_posts()) : the_post();
		$active = '';
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		if($i==0){
			$active = ' active';
		}
		$slick .= '<div class="slick-item" style="background-image:url('.$url.');">'."\r\n";
		$slick .= '<div class="slick-details"><div class="container"><h3>'.get_the_title().'</h3>'.get_the_content().'</div></div>';
		$slick .= '</div>'."\r\n";
		$i++;
	endwhile;
	wp_reset_query();
	$slick .= '</div>'."\r\n";

	add_action('wp_footer', 'add_slick_js', 100);

	return $slick;

}

function add_slick_js(){

	$script = '<script>'."\r\n";
	$script .= "$( document ).ready(function() {
        $('.touch-slider').slick({
        	dots: true,
        	arrows: false,
        	autoplay: true,
  			autoplaySpeed: 6000,
        });
    });"."\r\n";
	$script .= '</script>';
	echo $script;

}

add_shortcode( 'slick', 'slick_shortcode' );



function blockquote_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'style' => 'two'
	), $atts ) );

	$output = '<div class="blockquote">'."\r\n";
	$output .= $content;
	$output .= '</div>'."\r\n";


	return $output;

}

add_shortcode( 'blockquote', 'blockquote_shortcode' );

function middle_block_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'style' => 'two'
	), $atts ) );

	$output = '<div class="middle-block">'."\r\n";
	$output .= $content;
	$output .= '</div>'."\r\n";


	return $output;

}

add_shortcode( 'middle_block', 'middle_block_shortcode' );


function fluid_video_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'code' => ''
	), $atts ) );

	$output = '<div class="videoWrapper">'."\r\n";
	$output .= '<iframe width="560" height="315" src="//www.youtube.com/embed/'.$code.'" frameborder="0" allowfullscreen></iframe>';
	$output .= '</div>'."\r\n";


	return $output;

}

add_shortcode( 'fluid_video', 'fluid_video_shortcode' );

function full_width_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'color' => '',
		'center' => true,
		'pad' => false,
		'watermark' => false
	), $atts ) );
	$centerClass = '';
	$colorClass = '';
	$padClass = '';
	$padStyle = '';
	$markClass = '';
	if($center === true){
		$centerClass = 'center';
	}
	if($color == 'gray'){
		$colorClass = 'graybg';
	}
	if($pad == 'true'){
		$padClass = 'pad';
	}elseif($pad == 'false' || $pad === false){
		$padClass = '';
	}else{
		$padClass = '';
		$padStyle = 'padding-top:'.$pad.';padding-bottom:'.$pad.';';

	}
	if($watermark){
		$markClass = 'watermark';
	}
	$output = '</div></article></main></div><div class="'.$centerClass.' '.$colorClass.' '.$padClass.' '.$markClass.'" style="'.$padStyle.'"><div class="content-area pad">'."\r\n";
	$output .= do_shortcode($content);
	$output .= '</div></div><div class="content-area"><main class="site-main squeeze" role="main"><article><div class="entry-content">'."\r\n";


	return $output;

}

add_shortcode( 'full_width', 'full_width_shortcode' );


function grid_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'divider' => false
	), $atts ) );
	$dividerClass = '';
	if($divider){
		$dividerClass = 'divider';
	}

	$output = '<div class="grid '.$dividerClass.'">'."\r\n";
	$output .= do_shortcode($content);
	$output .= '</div>'."\r\n";


	return $output;

}

add_shortcode( 'grid', 'grid_shortcode' );

function block_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'col' => 3,
	), $atts ) );
	$centerClass = '';
	$colorClass = '';


	$output = '<div class="block-'.$col.'">'."\r\n";
	$output .= do_shortcode($content);
	$output .= '</div>'."\r\n";

	return $output;

}

add_shortcode( 'block', 'block_shortcode' );

function button_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'text' => 'submit',
		'link' => '#',
		'style' => 'small',
		'color' => 'red'
	), $atts ) );
	$centerClass = '';
	$colorClass = '';


	$output = '<a href="'.$link.'" class="button '.$style.' '.$color.'">'.$text.'</a>';

	return $output;

}

add_shortcode( 'button', 'button_shortcode' );

?>