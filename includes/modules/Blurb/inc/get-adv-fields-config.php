<?php

/**
 *
 * Get advanced fields configuration
 *
 * @return array
 *
 */

trait GET_ADV_FIELDS_CONFIG
{
    static function get_adv_fields_config()
    {
        $advanced_fields = array();

        // Disable text field
        $advanced_fields['text'] = false;

        $advanced_fields['fonts'] = array(
            'nm_badge'   => array(
                'label'         => esc_html__('Badge', 'nm_divi'),
                'toggle_slug'   => 'nm_badge',
                'tab_slug'        => 'advanced',
                'line_height' => array(
                    'default' => '1em',
                ),
                'font_size' => array(
                    'default' => '24px',
                ),
                'font-weight' => array(
                    'default' => 'bold'
                ),
                'css'      => array(
                    'main' => " %%order_class%% .featured-box-badge",
                    'hover' => "%%order_class%% .featured-box-badge:hover",
                    'important' => 'all',
                ),
                // 'header_level' => array(
                //     'default' => 'h3',
                // ),
            ),

            // Title
            'nm_title'   => array(
                'label'         => esc_html__('Title', 'nm_divi'),
                'toggle_slug'   => 'nm_title',
                'tab_slug'        => 'advanced',
                'line_height' => array(
                    'default' => '1em',
                ),
                'font_size' => array(
                    'default' => '24px',
                ),
                'font-weight' => array(
                    'default' => 'bold'
                ),
                'css'      => array(
                    'main' => " %%order_class%% .featured-box-title",
                    //'hover' => "%%order_class%% .featured-box-title:hover .featured-box-title",
                    'hover' => "%%order_class%% .featured-box-title:hover",
                    'important' => 'all',
                ),
                'header_level' => array(
                    'default' => 'h3',
                ),
            ),

            // Subtitle
            'nm_sub_title'   => array(
                'label'         => esc_html__('Sub Title', 'nm_divi'),
                'toggle_slug'   => 'nm_sub_title',
                'tab_slug'        => 'advanced',
                'line_height' => array(
                    'default' => '1em',
                ),
                'font_size' => array(
                    'default' => '20px',
                ),
                'font-weight' => array(
                    'default' => 'normal'
                ),
                'css'      => array(
                    'main' => " %%order_class%% .featured-box-subtitle",
                    //'hover' => "%%order_class%% .featured-box-title:hover .featured-box-title",
                    'hover' => "%%order_class%% .featured-box-subtitle:hover",
                    'important' => 'all',
                ),
                'header_level' => array(
                    'default' => 'h5',
                ),
            ),

            // Content
            'nm_content'   => array(
                'label'         => esc_html__('Content', 'nm_divi'),
                'toggle_slug'   => 'nm_content',
                'sub_toggle'  => 'body',
                'line_height' => array(
                    'default' => '1em',
                ),
                'font_size' => array(
                    'default' => '14px',
                ),
                'css'      => array(
                    'main' => "%%order_class%% .featured-box-text",
                    'hover' => "%%order_class%% .featured-box-text:hover",
                    'important' => 'all',
                ),
            ),
        );

        $advanced_fields['button']['nm_button'] = array(
            'label' => esc_html__('Button', 'nm_divi'),
            'toggle_slug'   => 'nm_button',
            'tab_slug'        => 'advanced',
            'css'            => array(
                'main'      => '%%order_class%% a.featured-box-readmore',
                'alignment' => '%%order_class%% .featured-box-button',
                'important' => 'all',
            ),
            'box_shadow'     => array(
                'css' => array(
                    'main' => '%%order_class%% a.featured-box-readmore',
                    'important' => 'all',
                ),
            ),
            'margin_padding' => array(
                'css' => array(
                    'main'      => "%%order_class%% a.featured-box-readmore",
                    'important' => 'all',
                ),
            ),
            'use_alignment'  => true,
        );

        // $advanced_fields['button']['nm_badge'] = array(
        //     'label' => esc_html__('Badge', 'nm_divi'),
        //     'toggle_slug'   => 'nm_badge',
        //     'tab_slug'        => 'advanced',
        //     'css'            => array(
        //         'main'      => '%%order_class%% span.featured-box-badge',
        //         'alignment' => '%%order_class%% span.featured-box-badge',
        //         'important' => 'all',
        //     ),

        //     // 'use_alignment'  => true,
        // );

        $advanced_fields['borders'] = array(
            'default'               => array(),

            'nm_box'         => array(
                'css'               => array(
                    'main'  => array(
                        'border_radii' => "%%order_class%% .featured-box-content",
                        'border_radii_hover' => "%%order_class%% .featured-box-content:hover .featured-box-content",
                        'border_styles' => "%%order_class%% .featured-box-content",
                        'border_styles_hover' => "%%order_class%% .featured-box-content:hover .featured-box-content",
                    )
                ),
                // 'label'    => esc_html__('Title Border', 'nm_divi'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_box',
            ),

            'nm_badge'         => array(
                'css'               => array(
                    'main'  => array(
                        'border_radii' => "%%order_class%% .featured-box-badge",
                        'border_radii_hover' => "%%order_class%% .featured-box-badge:hover .featured-box-badge",
                        'border_styles' => "%%order_class%% .featured-box-badge",
                        'border_styles_hover' => "%%order_class%% .featured-box-badge:hover .featured-box-badge",
                    )
                ),
                // 'label'    => esc_html__('Title Border', 'nm_divi'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_badge',
            ),

            'nm_title'         => array(
                'css'               => array(
                    'main'  => array(
                        'border_radii' => "%%order_class%% .featured-box-title",
                        'border_radii_hover' => "%%order_class%% .featured-box-title:hover .featured-box-title",
                        'border_styles' => "%%order_class%% .featured-box-title",
                        'border_styles_hover' => "%%order_class%% .featured-box-title:hover .featured-box-title",
                    )
                ),
                // 'label'    => esc_html__('Title Border', 'nm_divi'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_title',
            ),

            'nm_sub_title'         => array(
                'css'               => array(
                    'main'  => array(
                        'border_radii' => "%%order_class%% .featured-box-subtitle",
                        'border_radii_hover' => "%%order_class%% .featured-box-subtitle:hover .featured-box-subtitle",
                        'border_styles' => "%%order_class%% .featured-box-subtitle",
                        'border_styles_hover' => "%%order_class%% .featured-box-subtitle:hover .featured-box-subtitle",
                    )
                ),
                // 'label'    => esc_html__('Title Border', 'nm_divi'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_sub_title',
            ),

            'nm_content'         => array(
                'css'               => array(
                    'main'  => array(
                        'border_radii' => "%%order_class%% .featured-box-text",
                        'border_radii_hover' => "%%order_class%% .featured-box-text:hover .featured-box-text",
                        'border_styles' => "%%order_class%% .featured-box-text",
                        'border_styles_hover' => "%%order_class%% .featured-box-text:hover .featured-box-text",
                    )
                ),
                // 'label'    => esc_html__('Title Border', 'nm_divi'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_content',
            ),

            'nm_image'         => array(
                'css'               => array(
                    'main'  => array(
                        'border_radii' => "%%order_class%% .featured-box-image img",
                        'border_radii_hover' => "%%order_class%% .featured-box-image:hover img",
                        'border_styles' => "%%order_class%% .featured-box-image img",
                        'border_styles_hover' => "%%order_class%% .featured-box-image:hover img",
                    )
                ),
                'label'    => esc_html__('Image Border', 'nm_divi'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_image',
            ),

            'nm_image_box'         => array(
                'css'               => array(
                    'main'  => array(
                        'border_radii' => "%%order_class%% .featured-box-image",
                        'border_radii_hover' => "%%order_class%% .featured-box-image:hover",
                        'border_styles' => "%%order_class%% .featured-box-image",
                        'border_styles_hover' => "%%order_class%% .featured-box-image:hover",
                    )
                ),
                'label'    => esc_html__('Image wrapper border', 'nm_divi'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_image',
            ),

            'nm_button'         => array(
                'css'               => array(
                    'main'  => array(
                        'border_radii' => "%%order_class%% .featured-box-button",
                        'border_radii_hover' => "%%order_class%% .featured-box-button:hover",
                        'border_styles' => "%%order_class%% .featured-box-button",
                        'border_styles_hover' => "%%order_class%% .featured-box-button:hover",
                    )
                ),
                'label'    => esc_html__('Button Container Border', 'nm_divi'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_button',
            ),
        );

        $advanced_fields['box_shadow'] = array(
            'default'               => true,

            'nm_content_box'             => array(
                'label'    => esc_html__('Content wrapper Shadow', 'nm_divi'),
                'css' => array(
                    'main' => "%%order_class%% .featured-box-content",
                    'hover' => "%%order_class%% .featured-box-content:hover .featured-box-content",
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_box',
            ),

            'nm_img_box'             => array(
                'label'    => esc_html__('Image Box Shadow', 'nm_divi'),
                'css' => array(
                    'main' => "%%order_class%% .featured-box-image",
                    'hover' => "%%order_class%% .featured-box-image:hover .featured-box-image",
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_image',
            ),

            'nm_img'             => array(
                'label'    => esc_html__('Image Shadow', 'nm_divi'),
                'css' => array(
                    'main' => "%%order_class%% .featured-box-image img",
                    'hover' => "%%order_class%% .featured-box-image:hover img",
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_image',
            ),

            'nm_badge'             => array(
                'label'    => esc_html__('Badge Box Shadow', 'nm_divi'),
                'css' => array(
                    'main' => "%%order_class%% .featured-box-badge",
                    'hover' => "%%order_class%% .featured-box-badge:hover .featured-box-badge",
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_badge',
            ),

            'nm_title'             => array(
                'label'    => esc_html__('Title Box Shadow', 'nm_divi'),
                'css' => array(
                    'main' => "%%order_class%% .featured-box-title",
                    'hover' => "%%order_class%% .featured-box-title:hover .featured-box-title",
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_title',
            ),

            'nm_sub_title'             => array(
                'label'    => esc_html__('Sub Title Box Shadow', 'nm_divi'),
                'css' => array(
                    'main' => "%%order_class%% .featured-box-subtitle",
                    'hover' => "%%order_class%% .featured-box-subtitle:hover .featured-box-subtitle",
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_sub_title',
            ),

            'nm_content'             => array(
                'label'    => esc_html__('Content Box Shadow', 'nm_divi'),
                'css' => array(
                    'main' => "%%order_class%% .featured-box-text",
                    'hover' => "%%order_class%% .featured-box-text:hover .featured-box-text",
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_content',
            ),

            'nm_btn'             => array(
                'label'    => esc_html__('Button Box Shadow', 'nm_divi'),
                'css' => array(
                    'main' => "%%order_class%% .featured-box-button",
                    'hover' => "%%order_class%% .featured-box-button:hover .featured-box-button",
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_button',
            ),

        );

        $advanced_fields['filters'] = array(
            'child_filters_target' => array(
                'label'    => esc_html__('Image filter', 'nm_divi'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_image',
                'css' => array(
                    'main' => '%%order_class%% .featured-box-image img',
                    'hover' => '%%order_class%% .featured-box-image:hover .featured-box-image img'
                ),
            ),
        );

        $advanced_fields['margin_padding'] = array(
            'css'   => array(
                'important' => 'all'
            )
        );

        return $advanced_fields;
    }
}
