<?php
// Ensure direct access is blocked
if (!defined('ABSPATH')) {
    exit;
}


function register_projects_post_type() {
    $labels = array(
        'name'                  => _x('Projects', 'Post Type General Name', 'textdomain'),
        'singular_name'         => _x('Project', 'Post Type Singular Name', 'textdomain'),
        'menu_name'             => __('Projects', 'textdomain'),
        'name_admin_bar'        => __('Project', 'textdomain'),
        'archives'              => __('Project Archives', 'textdomain'),
        'attributes'            => __('Project Attributes', 'textdomain'),
        'parent_item_colon'     => __('Parent Project:', 'textdomain'),
        'all_items'             => __('All Projects', 'textdomain'),
        'add_new_item'          => __('Add New Project', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'new_item'              => __('New Project', 'textdomain'),
        'edit_item'             => __('Edit Project', 'textdomain'),
        'update_item'           => __('Update Project', 'textdomain'),
        'view_item'             => __('View Project', 'textdomain'),
        'view_items'            => __('View Projects', 'textdomain'),
        'search_items'          => __('Search Projects', 'textdomain'),
        'not_found'             => __('Not Found', 'textdomain'),
        'not_found_in_trash'    => __('Not Found in Trash', 'textdomain'),
        'featured_image'        => __('Featured Image', 'textdomain'),
        'set_featured_image'    => __('Set Featured Image', 'textdomain'),
        'remove_featured_image' => __('Remove Featured Image', 'textdomain'),
        'use_featured_image'    => __('Use as Featured Image', 'textdomain'),
        'insert_into_item'      => __('Insert into Project', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this Project', 'textdomain'),
        'items_list'            => __('Projects list', 'textdomain'),
        'items_list_navigation' => __('Projects list navigation', 'textdomain'),
        'filter_items_list'     => __('Filter Projects list', 'textdomain'),
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'projects'),
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'          => true, 
        'menu_icon'             => 'dashicons-portfolio',
    );

    register_post_type('project', $args);
}


add_action('init', 'register_projects_post_type');

// Register Custom Taxonomy: Project Category
function register_project_category_taxonomy() {
    $labels = array(
        'name'                       => _x('Project Categories', 'Taxonomy General Name', 'textdomain'),
        'singular_name'              => _x('Project Category', 'Taxonomy Singular Name', 'textdomain'),
        'menu_name'                  => __('Project Categories', 'textdomain'),
        'all_items'                  => __('All Categories', 'textdomain'),
        'parent_item'                => __('Parent Category', 'textdomain'),
        'parent_item_colon'          => __('Parent Category:', 'textdomain'),
        'new_item_name'              => __('New Category Name', 'textdomain'),
        'add_new_item'               => __('Add New Category', 'textdomain'),
        'edit_item'                  => __('Edit Category', 'textdomain'),
        'update_item'                => __('Update Category', 'textdomain'),
        'view_item'                  => __('View Category', 'textdomain'),
        'separate_items_with_commas' => __('Separate categories with commas', 'textdomain'),
        'add_or_remove_items'        => __('Add or remove categories', 'textdomain'),
        'choose_from_most_used'      => __('Choose from the most used', 'textdomain'),
        'popular_items'              => __('Popular Categories', 'textdomain'),
        'search_items'               => __('Search Categories', 'textdomain'),
        'not_found'                  => __('Not Found', 'textdomain'),
        'no_terms'                   => __('No categories', 'textdomain'),
        'items_list'                 => __('Categories list', 'textdomain'),
        'items_list_navigation'      => __('Categories list navigation', 'textdomain'),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true, // True for categories, false for tags
        'public'            => true,
        'show_admin_column' => true,
        'show_in_rest'      => true, // Enable Gutenberg editor
        'rewrite'           => array('slug' => 'project-category'),
    );

    register_taxonomy('project_category', array('project'), $args);
}

add_action('init', 'register_project_category_taxonomy');
