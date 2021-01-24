<?php

if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$ext = fw_ext( 'stunning-header' );

$stunning_breadcrumbs_show = "yes";
$stunning_title_show = "yes";
$stunning_title_show_title = "";
$stunning_text = "";
if (class_exists('Olympus_Options')) {
    $olympus = Olympus_Options::get_instance();
    $stunning_breadcrumbs_show = $olympus->get_option( "bbpress_header-stunning-content/yes/stunning_breadcrumbs_show", "yes", $olympus::SOURCE_SETTINGS );
    $stunning_title_show = $olympus->get_option( "bbpress_header-stunning-content/yes/stunning_title_show/show", "yes", $olympus::SOURCE_SETTINGS );
    $stunning_title_show_title = $olympus->get_option( "bbpress_header-stunning-content/yes/stunning_title_show/yes/title", "", $olympus::SOURCE_SETTINGS );
    $stunning_text = $olympus->get_option( "bbpress_header-stunning-content/yes/stunning_text", "", $olympus::SOURCE_SETTINGS );
}

$options = apply_filters( 'crumina_options_stunning_header_styles', array(
    'stunning_breadcrumbs_show' => array(
        'label'        => esc_html__( 'Show breadcrumbs', 'crum-ext-stunning-header' ),
        'type'         => 'switch',
        'value'        => $stunning_breadcrumbs_show,
        'left-choice'  => array(
            'value' => 'no',
            'label' => esc_html__( 'No', 'crum-ext-stunning-header' ),
        ),
        'right-choice' => array(
            'value' => 'yes',
            'label' => esc_html__( 'Yes', 'crum-ext-stunning-header' ),
        ),
    ),
    'stunning_title_show'       => array(
        'type'         => 'multi-picker',
        'label'        => false,
        'desc'         => false,
        'picker'       => array(
            'show' => array(
                'label'        => esc_html__( 'Show title', 'crum-ext-stunning-header' ),
                'type'         => 'switch',
                'value'        => $stunning_title_show,
                'left-choice'  => array(
                    'value' => 'no',
                    'label' => esc_html__( 'No', 'crum-ext-stunning-header' ),
                ),
                'right-choice' => array(
                    'value' => 'yes',
                    'label' => esc_html__( 'Yes', 'crum-ext-stunning-header' ),
                ),
            ),
        ),
        'choices'      => array(
            'yes' => array(
                'title' => array(
                    'type'  => 'text',
                    'value' => $stunning_title_show_title,
                    'label' => esc_html__( 'Custom title text', 'crum-ext-stunning-header' ),
                    'desc'  => esc_html__( 'Show post title, if that empty', 'crum-ext-stunning-header' ),
                ),
            ),
        ),
        'show_borders' => false,
    ),
    'stunning_text'             => array(
        'type'  => 'textarea',
        'value' => $stunning_text,
        'label' => esc_html__( 'Text', 'crum-ext-stunning-header' ),
        'desc'  => esc_html__( 'This text will be displayed under the heading', 'crum-ext-stunning-header' ),
    ),
    'stunning_text_color'        => array(
        'type'  => 'color-picker',
        'label' => esc_html__( 'Text Color', 'crum-ext-stunning-header' ),
        'help'  => esc_html__( 'Click on field to choose color or clear field for default value', 'crum-ext-stunning-header' ),
        'value' => ''
    ),
    'stunning_text_align'        => array(
        'type'    => 'radio',
        'value'   => 'stunning-header--content-center',
        'label'   => esc_html__( 'Text align', 'crum-ext-stunning-header' ),
        'choices' => array(
            'stunning-header--content-left'   => esc_html__( 'Left', 'crum-ext-stunning-header' ),
            'stunning-header--content-center' => esc_html__( 'Center', 'crum-ext-stunning-header' ),
            'stunning-header--content-right'  => esc_html__( 'Right', 'crum-ext-stunning-header' ),
        ),
        'inline'  => true,
    ),
    'stunning_bg_color'          => array(
        'type'  => 'color-picker',
        'label' => esc_html__( 'Background Color', 'crum-ext-stunning-header' ),
        'desc'  => esc_html__( 'If you choose no image to display - that color will be set as background', 'crum-ext-stunning-header' ),
        'help'  => esc_html__( 'Click on field to choose color or clear field for default value', 'crum-ext-stunning-header' ),
        'value' => ''
    ),
    'stunning_bg_image'          => array(
        'type'    => 'background-image',
        'value'   => 'none',
        'label'   => esc_html__( 'Background image', 'crum-ext-stunning-header' ),
        'desc'    => esc_html__( 'Minimum size for background image is 1920x400px', 'crum-ext-stunning-header' ),
        'choices' => array(
            'none' => array(
                'icon' => $ext->locate_URI( '/static/img/bg-none.png' ),
                'css'  => array(
                    'background-image' => "none",
                ),
            ),
            'header-stunning-1' => array(
                'icon'  => $ext->locate_URI( '/static/img/header-stunning-thumb-1.png' ),
                'css'  => array(
                    'background-image'  => 'url("' . $ext->locate_URI( '/static/img/header-stunning-1.png' ) . '")',
                ),
            ),
            'header-stunning-2' => array(
                'icon'  => $ext->locate_URI( '/static/img/header-stunning-thumb-2.png' ),
                'css'  => array(
                    'background-image'  => 'url("' . $ext->locate_URI( '/static/img/header-stunning-2.png' ) . '")',
                ),
            ),
            'header-stunning-3' => array(
                'icon'  => $ext->locate_URI( '/static/img/header-stunning-thumb-3.png' ),
                'css'  => array(
                    'background-image'  => 'url("' . $ext->locate_URI( '/static/img/header-stunning-3.png' ) . '")',
                ),
            ),
            'header-stunning-4' => array(
                'icon'  => $ext->locate_URI( '/static/img/header-stunning-thumb-4.png' ),
                'css'  => array(
                    'background-image'  => 'url("' . $ext->locate_URI( '/static/img/header-stunning-4.png' ) . '")',
                ),
            ),
            'header-stunning-5' => array(
                'icon'  => $ext->locate_URI( '/static/img/header-stunning-thumb-5.png' ),
                'css'  => array(
                    'background-image'  => 'url("' . $ext->locate_URI( '/static/img/header-stunning-5.png' ) . '")',
                ),
            )
        )
    ),
    'stunning_bg_animate_picker' => array(
        'type'    => 'multi-picker',
        'label'   => false,
        'desc'    => false,
        'picker'  => array(
            'stunning_bg_animate' => array(
                'label'        => esc_html__( 'Animate background?', 'crum-ext-stunning-header' ),
                'desc'        => esc_html__( 'Background image will be moved while scrolling', 'crum-ext-stunning-header' ),
                'type'         => 'switch',
                'value'        => 'yes',
                'left-choice'  => array(
                    'value' => 'no',
                    'label' => esc_html__( 'No', 'crum-ext-stunning-header' ),
                ),
                'right-choice' => array(
                    'value' => 'yes',
                    'label' => esc_html__( 'Yes', 'crum-ext-stunning-header' ),
                ),
            ),
        ),
        'choices' => array(
            'yes' => array(
                'stunning_bg_animate_type' => array(
                    'type'    => 'radio',
                    'value'   => 'fixed',
                    'label'   => esc_html__( 'Animate type', 'crum-ext-stunning-header' ),
                    'choices' => array(
                        'right-to-left' => esc_html__( 'Right to left', 'crum-ext-stunning-header' ),
                        'left-to-right' => esc_html__( 'Left to right', 'crum-ext-stunning-header' ),
                        'fixed' => esc_html__( 'Fixed', 'crum-ext-stunning-header' ),
                    ),
                    'inline'  => true,
                )
            ),
            'no'  => array(
                'stunning_bg_cover' => array(
                    'type'         => 'switch',
                    'label'        => esc_html__( 'Expand background', 'crum-ext-stunning-header' ),
                    'desc'         => esc_html__( 'Don\'t repeat image and expand it to full section background', 'crum-ext-stunning-header' ),
                    'value'        => 'no',
                    'left-choice'  => array(
                        'value' => 'no',
                        'label' => esc_html__( 'No', 'crum-ext-stunning-header' ),
                    ),
                    'right-choice' => array(
                        'value' => 'yes',
                        'label' => esc_html__( 'Yes', 'crum-ext-stunning-header' ),
                    ),
                ),
            ),
        )
    ),
    'stunning_bottom_image'     => array(
        'type'        => 'upload',
        'label'       => esc_html__( 'Bottom image', 'crum-ext-stunning-header' ),
        'desc'        => esc_html__( 'Select one of images or upload your own pattern', 'crum-ext-stunning-header' ),
        'images_only' => true,
    ),
    'stunning_padding_top'       => array(
        'type'  => 'text',
        'value' => '',
        'label' => esc_html__( 'Padding from Top', 'crum-ext-stunning-header' ),
    ),
    'stunning_padding_bottom'    => array(
        'type'  => 'text',
        'value' => '',
        'label' => esc_html__( 'Padding from Bottom', 'crum-ext-stunning-header' ),
    ),
) );
