<?php

/* =================================================================================================================== */

// CASE RESULTS CUSTOM POST

function catalanowins_create_posttype_case_results() {
 
    register_post_type( 'case-results',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Case Results' ),
                'singular_name' => __( 'Case Result' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'case-results'),
            'show_in_rest' => true,
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'catalanowins_create_posttype_case_results' );

/* =================================================================================================================== */

/*
* CASE RESULTS CUSTOM POST DETAILS
*/
 
function catalanowins_custom_post_type_case_results() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Case Results', 'Post Type General Name', 'catalanowins' ),
            'singular_name'       => _x( 'Case Result', 'Post Type Singular Name', 'catalanowins' ),
            'menu_name'           => __( 'Case Results', 'catalanowins' ),
            'parent_item_colon'   => __( 'Parent Case Result', 'catalanowins' ),
            'all_items'           => __( 'All Case Results', 'catalanowins' ),
            'view_item'           => __( 'View Case Result', 'catalanowins' ),
            'add_new_item'        => __( 'Add New Case Result', 'catalanowins' ),
            'add_new'             => __( 'Add New', 'catalanowins' ),
            'edit_item'           => __( 'Edit Case Result', 'catalanowins' ),
            'update_item'         => __( 'Update Case Result', 'catalanowins' ),
            'search_items'        => __( 'Search Case Result', 'catalanowins' ),
            'not_found'           => __( 'Not Found', 'catalanowins' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'catalanowins' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'case-results', 'catalanowins' ),
            'description'         => __( 'Case Results', 'catalanowins' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'category' ),            
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,            
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        );
         
        // Registering your Custom Post Type
        register_post_type( 'case-results', $args );
     
}
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
add_action( 'init', 'catalanowins_custom_post_type_case_results', 0 );

/* =================================================================================================================== */

// ATTORNEYS / TEAM CUSTOM POST

function catalanowins_create_posttype_team() {
 
    register_post_type( 'team-member',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Attorneys / Team Members' ),
                'singular_name' => __( 'Attorney / Team Member' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'team-member'),
            'show_in_rest' => true,
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'catalanowins_create_posttype_team' );

/* =================================================================================================================== */

/*
* ATTORNEYS / TEAM CUSTOM POST DETAILS
*/
 
function catalanowins_custom_post_type_team() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Attorneys / Team Members', 'Post Type General Name', 'catalanowins' ),
            'singular_name'       => _x( 'Attorney / Team Member', 'Post Type Singular Name', 'catalanowins' ),
            'menu_name'           => __( 'Attorneys / Team Members', 'catalanowins' ),
            'parent_item_colon'   => __( 'Parent Attorney / Team Member', 'catalanowins' ),
            'all_items'           => __( 'All Attorneys / Team Members Results', 'catalanowins' ),
            'view_item'           => __( 'View Attorney / Team Member', 'catalanowins' ),
            'add_new_item'        => __( 'Add New Attorney / Team Member', 'catalanowins' ),
            'add_new'             => __( 'Add New', 'catalanowins' ),
            'edit_item'           => __( 'Edit Attorney / Team Member', 'catalanowins' ),
            'update_item'         => __( 'Update Attorney / Team Member', 'catalanowins' ),
            'search_items'        => __( 'Search Attorney / Team Member', 'catalanowins' ),
            'not_found'           => __( 'Not Found', 'catalanowins' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'catalanowins' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'team-member', 'catalanowins' ),
            'description'         => __( 'team-member', 'catalanowins' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),          
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'menu_icon'           => 'dashicons-businessman',            
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        );
         
        // Registering your Custom Post Type
        register_post_type( 'team-member', $args );
     
}
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
add_action( 'init', 'catalanowins_custom_post_type_team', 0 );

/* =================================================================================================================== */

// FAQ CUSTOM POST

function catalanowins_create_posttype_faq() {
 
    register_post_type( 'faq-answers',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'FAQ' ),
                'singular_name' => __( 'FAQ' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'faq-answers'),
            'show_in_rest' => true,
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'catalanowins_create_posttype_faq' );

/* =================================================================================================================== */

function catalanowins_custom_post_type_faq() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'FAQs', 'Post Type General Name', 'catalanowins' ),
            'singular_name'       => _x( 'FAQ', 'Post Type Singular Name', 'catalanowins' ),
            'menu_name'           => __( 'FAQs', 'catalanowins' ),
            'parent_item_colon'   => __( 'Parent FAQ', 'catalanowins' ),
            'all_items'           => __( 'All FAQs', 'catalanowins' ),
            'view_item'           => __( 'View FAQ', 'catalanowins' ),
            'add_new_item'        => __( 'Add New FAQ', 'catalanowins' ),
            'add_new'             => __( 'Add New', 'catalanowins' ),
            'edit_item'           => __( 'Edit FAQ', 'catalanowins' ),
            'update_item'         => __( 'Update FAQ', 'catalanowins' ),
            'search_items'        => __( 'Search FAQ', 'catalanowins' ),
            'not_found'           => __( 'Not Found', 'catalanowins' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'catalanowins' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'faq-answers', 'catalanowins' ),
            'description'         => __( 'faq-answers', 'catalanowins' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor'),          
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'category' ),      
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,            
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        );
         
        // Registering your Custom Post Type
        register_post_type( 'faq-answers', $args );
     
}
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
add_action( 'init', 'catalanowins_custom_post_type_faq', 0 );

/* =================================================================================================================== */

// PRACTICE AREAS CUSTOM POST

function catalanowins_create_posttype_practice() {
 
    register_post_type( 'practice-areas',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Practice Areas' ),
                'singular_name' => __( 'Practice Area' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'practice-areas'),
            'show_in_rest' => true,
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'catalanowins_create_posttype_practice' );

/* =================================================================================================================== */

function catalanowins_custom_post_type_practice() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Practice Areas', 'Post Type General Name', 'catalanowins' ),
            'singular_name'       => _x( 'Practice Area', 'Post Type Singular Name', 'catalanowins' ),
            'menu_name'           => __( 'Practice Areas', 'catalanowins' ),
            'parent_item_colon'   => __( 'Parent Practice Area', 'catalanowins' ),
            'all_items'           => __( 'All Practice Areas', 'catalanowins' ),
            'view_item'           => __( 'View Practice Area', 'catalanowins' ),
            'add_new_item'        => __( 'Add New Practice Area', 'catalanowins' ),
            'add_new'             => __( 'Add New', 'catalanowins' ),
            'edit_item'           => __( 'Edit Practice Area', 'catalanowins' ),
            'update_item'         => __( 'Update Practice Area', 'catalanowins' ),
            'search_items'        => __( 'Search Practice Area', 'catalanowins' ),
            'not_found'           => __( 'Not Found', 'catalanowins' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'catalanowins' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'practice-areas', 'catalanowins' ),
            'description'         => __( 'practice-areas', 'catalanowins' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),          
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'category' ),      
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,            
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        );
         
        // Registering your Custom Post Type
        register_post_type( 'practice-areas', $args );
     
}
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
add_action( 'init', 'catalanowins_custom_post_type_practice', 0 );

/* =================================================================================================================== */

// OFFICE LOCATIONS CUSTOM POST

function catalanowins_create_posttype_office() {
 
    register_post_type( 'areas-we-serve',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Office Locations' ),
                'singular_name' => __( 'Office Location' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'areas-we-serve'),
            'show_in_rest' => true,
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'catalanowins_create_posttype_office' );

/* =================================================================================================================== */

/*
* OFFICE LOCATIONS CUSTOM POST DETAILS
*/
 
function catalanowins_custom_post_type_office() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Office Locations', 'Post Type General Name', 'catalanowins' ),
            'singular_name'       => _x( 'Office Location', 'Post Type Singular Name', 'catalanowins' ),
            'menu_name'           => __( 'Office Locations', 'catalanowins' ),
            'parent_item_colon'   => __( 'Parent Office Location', 'catalanowins' ),
            'all_items'           => __( 'All Office Locations Results', 'catalanowins' ),
            'view_item'           => __( 'View Office Location', 'catalanowins' ),
            'add_new_item'        => __( 'Add New Office Location', 'catalanowins' ),
            'add_new'             => __( 'Add New', 'catalanowins' ),
            'edit_item'           => __( 'Edit Office Location', 'catalanowins' ),
            'update_item'         => __( 'Update Office Location', 'catalanowins' ),
            'search_items'        => __( 'Search Office Location', 'catalanowins' ),
            'not_found'           => __( 'Not Found', 'catalanowins' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'catalanowins' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'areas-we-serve', 'catalanowins' ),
            'description'         => __( 'areas-we-serve', 'catalanowins' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),          
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'category' ), 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'menu_icon'           => 'dashicons-businessman',            
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        );
         
        // Registering your Custom Post Type
        register_post_type( 'areas-we-serve', $args );
     
}
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
add_action( 'init', 'catalanowins_custom_post_type_office', 0 );

/* =================================================================================================================== */

?>