<?php

// Add in admin icons from Font Awesome for custom post types
add_action('admin_head', 'post_type_include_iconsset');

function post_type_include_iconsset() {
	echo '<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"  rel="stylesheet">';
}

?>