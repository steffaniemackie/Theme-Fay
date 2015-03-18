<?php
add_theme_support('post-thumbnails');
add_theme_support('menus');
add_theme_support('custom-header');
add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );


register_sidebar(array('name' => 'Post Sidebar'));


/////This is how to add a Post Type (In the sidebar of the Dashboard)
function slideshow_post_type(){
    $args = array(
        'public' => true, 
        'label' => 'Slides',
        'supports' => array('title', 'editor', 'thumbnail','excerpt'), 
        'menu_position' => 2
    
    );
	

    
register_post_type('slides', $args);
    
}

add_action('init', 'slideshow_post_type');




add_action('init', 'create_gallery_type');
function create_gallery_type() {
register_post_type('gallery', 
		array(	
			'labels' => array(
			'name' => 'Gallery',
			'singular_name' => 'Era',
			'add_new' => 'Create Gallery',
			'edit_item' => 'Edit Gallery',
			'add_new_item' => 'Add Gallery'
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 4,
			'hierarchical' => true,
			'capability_type' => 'post',
			'supports' => array(
			'title',
			'excerpt',
			'author',
			'thumbnail',

)
)
);
flush_rewrite_rules();
}





add_action('init', 'create_gallery_taxonomy');
function create_gallery_taxonomy(){
	register_taxonomy('filter', 'gallery', 
		array(
			'hierarchical' => true, 
			'labels' => array(
				'name' => 'Filter', 
				'singlular_name' => 'Filter'
			)
		)
	);
	flush_rewrite_rules();
}





/////This is how to add a Widget 

register_sidebar(array('name' => 'Footer Area', 'before_widget' => '<aside id="%1$s" class="footerbox %2$s">'));

register_sidebar(array('name' => 'Contact Area', 'before_widget' => '<aside id="%1$s" class="contactarea %2$s">'));



?>