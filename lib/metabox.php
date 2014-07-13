<?php

function pdf_metabox( $meta_boxes ) {
    $prefix = '_famo_'; // Prefix for all fields
    $meta_boxes['pdf'] = array(
        'id' => 'pdf',
        'title' => 'PDF rivista',
        'pages' => array('numeri'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
                    array(
                        'name' => 'File .pdf della rivista',
                        'desc' => 'Carica il file .pdf della rivista',
                        'id' => $prefix . 'pdf',
                        'type' => 'file'
                    ),
            ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'pdf_metabox' );


function extraCredits_metabox( $meta_boxes ) {
    $prefix = '_famo_'; // Prefix for all fields
    $meta_boxes['extraCredits'] = array(
        'id' => 'extraCredits',
        'title' => 'Extra Credits',
        'pages' => array('post'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
                    array(
                        'name' => 'Extra Credits',
                        'desc' => 'Aggiungi qui una riga di credits extra',
                        'id' => $prefix . 'extraCredits',
                        'type' => 'textarea'
                    ),
            ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'extraCredits_metabox' );


function palette_metabox( $meta_boxes ) {
    $prefix = '_famo_'; // Prefix for all fields
    $meta_boxes['palette'] = array(
        'id' => 'palette',
        'title' => 'Palette',
        'pages' => array('numeri'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'id'          => $prefix . 'palette_group',
                'type'        => 'group',
                'description' => 'aggiungi i colori della palette',
                'options'     => array(
                    'group_title'   => __( 'Colore {#}', 'famo' ), // since version 1.1.4, {#} gets replaced by row number
                    'add_button'    => __( 'Aggiungi colore', 'famo' ),
                    'remove_button' => __( 'Rimuovi colore', 'famo' ),
                    'sortable'      => true, // beta
                ),
                'fields'      => array(
                    array(
                        'name' => 'Codice hex',
                        'id'   => 'paletteColor',
                        'type' => 'text'
                    ),
                ),
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'palette_metabox' );

function vimeo_metabox( $meta_boxes ) {
    $prefix = '_famo_'; // Prefix for all fields
    $meta_boxes['vimeo'] = array(
        'id' => 'vimeo',
        'title' => 'Vimeo video ID',
        'pages' => array('numeri'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
                    array(
                        'name' => 'Vimeo - codice ID',
                        'desc' => 'Copiancolla qui il codice id di vimeo. Es. http://vimeo.com/85331524 => id = 85331524',
                        'id' => $prefix . 'vimeo',
                        'type' => 'text'
                    ),
            ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'vimeo_metabox' );


// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'metabox/init.php' );
    }
}

?>