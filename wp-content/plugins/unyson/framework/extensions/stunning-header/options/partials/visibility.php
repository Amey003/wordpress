<?php

if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$prefix = '';
if(function_exists('olympus_stunning_get_option_prefix_visibility')){
    $prefix = olympus_stunning_get_option_prefix_visibility();
}
$header_stunning_visibility = "yes";
if (class_exists('Olympus_Options')) {
    $olympus = Olympus_Options::get_instance();
    $header_stunning_visibility = $olympus->get_option( "{$prefix}header-stunning-visibility", "yes", $olympus::SOURCE_SETTINGS );
}

$options = array(
    'type'    => 'radio',
    'value'   => $header_stunning_visibility,
    'label'   => esc_html__( 'Show stunning header', 'crum-ext-stunning-header' ),
    'choices' => array(
        'default' => esc_html__( 'Default', 'crum-ext-stunning-header' ),
        'yes'     => esc_html__( 'Yes', 'crum-ext-stunning-header' ),
        'no'      => esc_html__( 'No', 'crum-ext-stunning-header' ),
    ),
    
    'inline'  => true,
);
