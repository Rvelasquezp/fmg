<?php if(get_field('404_page', 'options')){
	wp_redirect(get_field('404_page', 'options'));
} ?>