<?php
add_action( 'init', 'register_cpt_numeri' );

function register_cpt_numeri() {

    $labels = array( 
        'name' => _x( 'Numero', 'numeri' ),
        'singular_name' => _x( 'Numeri', 'numeri' ),
        'add_new' => _x( 'Add New', 'numeri' ),
        'add_new_item' => _x( 'Add New numeri', 'numeri' ),
        'edit_item' => _x( 'Edit numeri', 'numeri' ),
        'new_item' => _x( 'New numeri', 'numeri' ),
        'view_item' => _x( 'View numeri', 'numeri' ),
        'search_items' => _x( 'Search numero', 'numeri' ),
        'not_found' => _x( 'No numero found', 'numeri' ),
        'not_found_in_trash' => _x( 'No numero found in Trash', 'numeri' ),
        'parent_item_colon' => _x( 'Parent numeri:', 'numeri' ),
        'menu_name' => _x( 'Numero', 'numeri' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'editor', 'thumbnail', 'author' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'numeri', $args );
}


// post
add_action( 'init', 'famoPost_init' );
function famoPost_init()
{
    add_post_type_support( 'post', 'page-attributes' );
}
?>