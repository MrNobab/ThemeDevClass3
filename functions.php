<?php


if(!function_exists('myThemeFunction')){
    
    function myThemeFunction(){
        
        add_theme_support('post-thumbnails');
        add_theme_support( 'post-formats',  array( 'aside', 'gallery', 'quote', 'image', 'video' ) );
        register_nav_menus( 

            array(
                'header-menu' => __('Header Menu', "mrTextDomain"),
                'extra-menu' => __('Extra Menu', 'mrTextDomain')
            )
            );


    }

    load_theme_textdomain( 'mrTextDomain', get_template_directory() . '/languages' );
}



//Add class on li tag

if(!function_exists('mrthemeliClassAdd')){
        function mrthemeliClassAdd($classes, $item, $args){
            if(isset($args->add_li_class)) {
                $classes[] = $args->add_li_class;
            }
            return $classes;
        }
    }
    add_filter('nav_menu_css_class', 'mrthemeliClassAdd', 1, 3);



// Add Class on Anchor (a) tag
if(!function_exists('add_additional_class_on_a')){
        function add_additional_class_on_a($classes, $item, $args){
            if (isset($args->add_a_class)) {
                $classes['class'] = $args->add_a_class;
            }
            return $classes;     
    }
    add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

}


if(!function_exists('mrTheme_custom_post_type')){
function mrTheme_custom_post_type() {
	register_post_type('services',
		array(
			'labels'      => array(
				'name'          => __('Services', 'mrTextDomain'),
				'singular_name' => __('Service', 'mrTextDomain'),
                'add_new' => __('New service', 'mrTextDomain'),
                'add_new_item' => __('Add New service', 'mrTextDomain'),
                'edit_item' => __('Edit service', 'mrTextDomain'),
                'new_item' => __('New service', 'mrTextDomain'),
                'not_found' => __('Oops! No Service(s) found !!! ', 'mrTextDomain'),
			),
				'public'      => true,
				'has_archive' => true,
                'can_export' => false,
		)
	);
}
}
add_action('init', 'mrTheme_custom_post_type');




add_action( 'after_setup_theme', 'myThemeFunction');




?>
