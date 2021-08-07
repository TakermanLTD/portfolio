<?php
/**
||-> CPT - [testimonial]
*/
function niva_testimonial_custom_post() {
    register_post_type('Testimonial', array(
                        'label' => __('Testimonials','sweetthemes'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'rewrite' => array('slug' => 'testimonial', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-format-status',
                        'supports' => array('title','editor','thumbnail','author','excerpt'),
                        'labels' => array (
                            'name' => __('Testimonials','sweetthemes'),
                            'singular_name' => __('Testimonial','sweetthemes'),
                            'menu_name' => __('ST Testimonials','sweetthemes'),
                            'add_new' => __('Add Testimonial','sweetthemes'),
                            'add_new_item' => __('Add New Testimonial','sweetthemes'),
                            'edit' => __('Edit','sweetthemes'),
                            'edit_item' => __('Edit Testimonial','sweetthemes'),
                            'new_item' => __('New Testimonial','sweetthemes'),
                            'view' => __('View Testimonial','sweetthemes'),
                            'view_item' => __('View Testimonial','sweetthemes'),
                            'search_items' => __('Search Testimonials','sweetthemes'),
                            'not_found' => __('No Testimonials Found','sweetthemes'),
                            'not_found_in_trash' => __('No Testimonials Found in Trash','sweetthemes'),
                            'parent' => __('Parent Testimonial','sweetthemes'),
                            )
                        ) 
                    ); 
}
add_action('init', 'niva_testimonial_custom_post');
/**
||-> CPT - [client]
*/
function connection_client_custom_post() {
    register_post_type('Clients', array(
                        'label' => __('Clients','sweetthemes'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'publicly_queryable' => false,
                        'rewrite' => array('slug' => 'client', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-businessman',
                        'supports' => array('title','editor','thumbnail','author','excerpt'),
                        'labels' => array (
                            'name' => __('Clients','sweetthemes'),
                            'singular_name' => __('Client','sweetthemes'),
                            'menu_name' => __('ST Clients','sweetthemes'),
                            'add_new' => __('Add Client','sweetthemes'),
                            'add_new_item' => __('Add New Client','sweetthemes'),
                            'edit' => __('Edit','sweetthemes'),
                            'edit_item' => __('Edit Client','sweetthemes'),
                            'new_item' => __('New Client','sweetthemes'),
                            'view' => __('View Client','sweetthemes'),
                            'view_item' => __('View Client','sweetthemes'),
                            'search_items' => __('Search Clients','sweetthemes'),
                            'not_found' => __('No Clients Found','sweetthemes'),
                            'not_found_in_trash' => __('No Clients Found in Trash','sweetthemes'),
                            'parent' => __('Parent Client','sweetthemes'),
                            )
                        ) 
                    ); 
}
add_action('init', 'connection_client_custom_post');
/**
||-> CPT - [member]
*/
function niva_members_custom_post() {
    register_post_type('member', array(
                        'label' => __('Members','sweetthemes'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'rewrite' => array('slug' => 'member', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-businessman',
                        'supports' => array('title','editor','thumbnail','author','excerpt'),
                        'labels' => array (
                            'name' => __('Members','sweetthemes'),
                            'singular_name' => __('Member','sweetthemes'),
                            'menu_name' => __('ST Members','sweetthemes'),
                            'add_new' => __('Add Member','sweetthemes'),
                            'add_new_item' => __('Add New Member','sweetthemes'),
                            'edit' => __('Edit','sweetthemes'),
                            'edit_item' => __('Edit Member','sweetthemes'),
                            'new_item' => __('New Member','sweetthemes'),
                            'view' => __('View Member','sweetthemes'),
                            'view_item' => __('View Member','sweetthemes'),
                            'search_items' => __('Search Members','sweetthemes'),
                            'not_found' => __('No Members Found','sweetthemes'),
                            'not_found_in_trash' => __('No Members Found in Trash','sweetthemes'),
                            'parent' => __('Parent Member','sweetthemes'),
                            )
                        ) 
                    ); 
}
add_action('init', 'niva_members_custom_post');
/**
||-> CPT - [member] category
*/
function niva_members_category_custom_post() {
    
    $labels = array(
        'name'                       => _x( 'Categories', 'Taxonomy General Name', 'sweetthemes' ),
        'singular_name'              => _x( 'Members', 'Taxonomy Singular Name', 'sweetthemes' ),
        'menu_name'                  => __( 'Members Categories', 'sweetthemes' ),
        'all_items'                  => __( 'All Items', 'sweetthemes' ),
        'parent_item'                => __( 'Parent Item', 'sweetthemes' ),
        'parent_item_colon'          => __( 'Parent Item:', 'sweetthemes' ),
        'new_item_name'              => __( 'New Item Name', 'sweetthemes' ),
        'add_new_item'               => __( 'Add New Item', 'sweetthemes' ),
        'edit_item'                  => __( 'Edit Item', 'sweetthemes' ),
        'update_item'                => __( 'Update Item', 'sweetthemes' ),
        'view_item'                  => __( 'View Item', 'sweetthemes' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'sweetthemes' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'sweetthemes' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'sweetthemes' ),
        'popular_items'              => __( 'Popular Items', 'sweetthemes' ),
        'search_items'               => __( 'Search Items', 'sweetthemes' ),
        'not_found'                  => __( 'Not Found', 'sweetthemes' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'mt-member-category', array( 'member' ), $args );
}
add_action( 'init', 'niva_members_category_custom_post' );



/**
||-> CPT - [Project]
*/
function st_projects_custom_post() {
    register_post_type('st_projects', array(
                        'label' => __('Projects','sweetthemes'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'rewrite' => array('slug' => 'project', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-performance',
                        'supports' => array('title','editor','thumbnail','author','excerpt', 'comments'),
                        'labels' => array (
                            'name' => __('Projects','sweetthemes'),
                            'singular_name' => __('Project','sweetthemes'),
                            'menu_name' => __('ST Projects','sweetthemes'),
                            'add_new' => __('Add Project','sweetthemes'),
                            'add_new_item' => __('Add New Project','sweetthemes'),
                            'edit' => __('Edit','sweetthemes'),
                            'edit_item' => __('Edit Project','sweetthemes'),
                            'new_item' => __('New Project','sweetthemes'),
                            'view' => __('View Project','sweetthemes'),
                            'view_item' => __('View Project','sweetthemes'),
                            'search_items' => __('Search Project','sweetthemes'),
                            'not_found' => __('No Projects Found','sweetthemes'),
                            'not_found_in_trash' => __('No Projects Found in Trash','sweetthemes'),
                            'parent' => __('Parent Project','sweetthemes'),
                            )
                        ) 
                    ); 
}
add_action('init', 'st_projects_custom_post');
/**
||-> CPT - [Project] Category
*/
function sweetthemes_projects_category() {
    
    $labels = array(
        'name'                       => _x( 'Categories', 'Taxonomy General Name', 'sweetthemes' ),
        'singular_name'              => _x( 'Categories', 'Taxonomy Singular Name', 'sweetthemes' ),
        'menu_name'                  => __( 'Categories', 'sweetthemes' ),
        'all_items'                  => __( 'All Items', 'sweetthemes' ),
        'parent_item'                => __( 'Parent Item', 'sweetthemes' ),
        'parent_item_colon'          => __( 'Parent Item:', 'sweetthemes' ),
        'new_item_name'              => __( 'New Item Name', 'sweetthemes' ),
        'add_new_item'               => __( 'Add New Item', 'sweetthemes' ),
        'edit_item'                  => __( 'Edit Item', 'sweetthemes' ),
        'update_item'                => __( 'Update Item', 'sweetthemes' ),
        'view_item'                  => __( 'View Item', 'sweetthemes' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'sweetthemes' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'sweetthemes' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'sweetthemes' ),
        'popular_items'              => __( 'Popular Items', 'sweetthemes' ),
        'search_items'               => __( 'Search Items', 'sweetthemes' ),
        'not_found'                  => __( 'Not Found', 'sweetthemes' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => array( 'slug' => 'cat-project' ),
    );
    register_taxonomy( 'st-projects-category', array( 'st_projects' ), $args );
}
add_action( 'init', 'sweetthemes_projects_category' );



/**
||-> CPT - [Services Slider]
*/
function services_slider_custom_post() {
    register_post_type('st_services', array(
                        'label' => __('Services slider','sweetthemes'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'publicly_queryable' => false,
                        'rewrite' => array('slug' => 'services', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-businessman',
                        'supports' => array('title','editor','thumbnail','author','excerpt'),
                        'labels' => array (
                            'name' => __('Services slider','sweetthemes'),
                            'singular_name' => __('Services slider','sweetthemes'),
                            'menu_name' => __('ST Services slider','sweetthemes'),
                            'add_new' => __('Add Service','sweetthemes'),
                            'add_new_item' => __('Add New Service','sweetthemes'),
                            'edit' => __('Edit','sweetthemes'),
                            'edit_item' => __('Edit Service','sweetthemes'),
                            'new_item' => __('New Service','sweetthemes'),
                            'view' => __('View Service','sweetthemes'),
                            'view_item' => __('View Service','sweetthemes'),
                            'search_items' => __('Search Services','sweetthemes'),
                            'not_found' => __('No Services Found','sweetthemes'),
                            'not_found_in_trash' => __('No Services Found in Trash','sweetthemes'),
                            'parent' => __('Parent Service','sweetthemes'),
                            )
                        ) 
                    ); 
}
add_action('init', 'services_slider_custom_post');

/**
||-> CPT - [jobs]
*/
function niva_job_custom_post() {
    register_post_type('Jobs', array(
                        'label' => __('Jobs','sweetthemes'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'publicly_queryable' => false,
                        'rewrite' => array('slug' => 'job', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-format-status',
                        'supports' => array('title','editor','author'),
                        'labels' => array (
                            'name' => __('Jobs','sweetthemes'),
                            'singular_name' => __('Job','sweetthemes'),
                            'menu_name' => __('ST Jobs','sweetthemes'),
                            'add_new' => __('Add Job','sweetthemes'),
                            'add_new_item' => __('Add New Job','sweetthemes'),
                            'edit' => __('Edit','sweetthemes'),
                            'edit_item' => __('Edit Job','sweetthemes'),
                            'new_item' => __('New Job','sweetthemes'),
                            'view' => __('View Job','sweetthemes'),
                            'view_item' => __('View Job','sweetthemes'),
                            'search_items' => __('Search Jobs','sweetthemes'),
                            'not_found' => __('No Jobs Found','sweetthemes'),
                            'not_found_in_trash' => __('No Jobs Found in Trash','sweetthemes'),
                            'parent' => __('Parent Job','sweetthemes'),
                            )
                        ) 
                    ); 
}
add_action('init', 'niva_job_custom_post');
?>