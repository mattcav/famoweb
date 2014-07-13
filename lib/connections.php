<?php
    // post 2 numeri
    function numeri_connection_types() {
        p2p_register_connection_type( array(
            'name' => 'post2numeri',
            'from' => 'post',
            'to' => 'numeri',
            'reciprocal' => true,
            'admin_box' => array(
                'show' => 'any',
                'context' => 'advanced'
              )
        ) );
    }
    add_action( 'p2p_init', 'numeri_connection_types' );
?>