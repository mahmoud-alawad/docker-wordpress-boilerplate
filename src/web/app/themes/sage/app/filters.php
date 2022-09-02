<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

 
/**
 * add nav menu items classes @see https://developer.wordpress.org/reference/hooks/nav_menu_css_class/
 */
add_filter('nav_menu_css_class',function($classes , $item,$args){
	if (isset($args->add_li_classes)) {
		$classes[]  = $args->add_li_classes;
	}
	return $classes;
},1,3);
 /**
  * load ACF
  */
add_filter('acf/load_field', function($field){
	return $field;
});
 

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'redirect'		=> false
	));	
}


/**
 * include head & footer scripts 
 */
add_action('wp_head',function(){
	echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
	echo get_field('head_scripts','options');
});
add_action('wp_footer',function(){
	echo get_field('footer_scripts','options');
});