<?php
add_action( 'init', 'register_taxonomy_occhio_di_bue' );

function register_taxonomy_occhio_di_bue() {

    $labels = array( 
        'name' => _x( 'Occhi di bue', 'occhio_di_bue' ),
        'singular_name' => _x( 'Occhio di bue', 'occhio_di_bue' ),
        'search_items' => _x( 'Search Occhi di bue', 'occhio_di_bue' ),
        'popular_items' => _x( 'Popular Occhi di bue', 'occhio_di_bue' ),
        'all_items' => _x( 'All Occhi di bue', 'occhio_di_bue' ),
        'parent_item' => _x( 'Parent Occhio di bue', 'occhio_di_bue' ),
        'parent_item_colon' => _x( 'Parent Occhio di bue:', 'occhio_di_bue' ),
        'edit_item' => _x( 'Edit Occhio di bue', 'occhio_di_bue' ),
        'update_item' => _x( 'Update Occhio di bue', 'occhio_di_bue' ),
        'add_new_item' => _x( 'Add New Occhio di bue', 'occhio_di_bue' ),
        'new_item_name' => _x( 'New Occhio di bue', 'occhio_di_bue' ),
        'separate_items_with_commas' => _x( 'Separate occhi di bue with commas', 'occhio_di_bue' ),
        'add_or_remove_items' => _x( 'Add or remove occhi di bue', 'occhio_di_bue' ),
        'choose_from_most_used' => _x( 'Choose from the most used occhi di bue', 'occhio_di_bue' ),
        'menu_name' => _x( 'Occhi di bue', 'occhio_di_bue' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'occhio_di_bue', array('post'), $args );
}
?>