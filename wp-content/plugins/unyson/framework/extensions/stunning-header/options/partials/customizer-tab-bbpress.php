<?php

if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$ext = fw_ext( 'stunning-header' );

$options = array(
    'header-stunning-visibility' => apply_filters( 'crumina_options_stunning_header_visibility', $ext->get_options( 'partials/visibility' ) ),
    // 'header-stunning-content'  => array(
    //     'type'    => 'radio',
    //     'picker'  => 'header-stunning-visibility',
    //     'value'   => 'yes',
    //     'choices' => array(
    //         'yes' => esc_html__( 'Yes', 'crum-ext-stunning-header' ),
    //         'no' => esc_html__( 'No', 'crum-ext-stunning-header' ),
    //             $ext->get_options( 'partials/content' )
    //     ),
    //     'inline'  => true,
    // ),
    'header-stunning-customizer-picker' => array(
        'type'    => 'radio',
        'value'   => 'yes',
        'label'   => esc_html__( 'Yes', 'crum-ext-stunning-header' ),
        'choices' => array(
            'yes'     => esc_html__( 'Yes', 'crum-ext-stunning-header' ),
        ),
        'inline'  => true,
    ),
    'header-stunning-customizer'        => array(
        'type'    => 'multi-picker',
        'picker'  => 'header-stunning-customizer-picker',
        'choices' => array(
            'yes' => array(
                $ext->get_options( 'partials/styles-bbpress' )
            )
        )
    )
);
