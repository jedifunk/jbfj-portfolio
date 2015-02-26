<?php
/* Plugin Name: JBFJ Portfolio
 * Author: Bryce Flory
 * Author URI: bryceflory.com
 * Version: 0.2
 * Description: Custom Portfolio Management Plugin
 */
 
// set constants
define( 'JBFJ_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'JBFJ_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once( JBFJ_PLUGIN_PATH . '/lib/jbfj-portfolio-loops.php' );
 
// CPT for my projects
function register_cpt_project() {

    $labels = array( 
        'name' => _x( 'Projects', 'project' ),
        'singular_name' => _x( 'Project', 'project' ),
        'add_new' => _x( 'Add New', 'project' ),
        'add_new_item' => _x( 'Add New Project', 'project' ),
        'edit_item' => _x( 'Edit Project', 'project' ),
        'new_item' => _x( 'New Project', 'project' ),
        'view_item' => _x( 'View Project', 'project' ),
        'search_items' => _x( 'Search Projects', 'project' ),
        'not_found' => _x( 'No projects found', 'project' ),
        'not_found_in_trash' => _x( 'No projects found in Trash', 'project' ),
        'parent_item_colon' => _x( 'Parent Project:', 'project' ),
        'menu_name' => _x( 'Projects', 'project' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,   
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'thumbnail' ),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-art',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'project', $args );
}
add_action( 'init', 'register_cpt_project' );