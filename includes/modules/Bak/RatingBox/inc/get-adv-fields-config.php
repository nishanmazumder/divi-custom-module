<?php

/**
 *
 * Get advanced fields configuration
 *
 * @return array
 *
 */

trait GET_RATING_ADV_FIELDS_CONFIG
{
    static function get_adv_fields_config()
    {
        $advanced_fields = array();

        // Disable text field
        $advanced_fields['text'] = false;
        $advanced_fields['filters'] = false;

        $advanced_fields['fonts'] = [

            // Rating Icon
            'rating'   => array(
                'label'         => esc_html__('Rating Icon', 'divi_flash'),
                'toggle_slug'   => 'design_rating',
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
                    'main' => "%%order_class%%",
                    'hover' => "%%order_class%% .featured-box-title:hover",
                    'important' => 'all',
                )
            ),

            // Title
            'title'   => array(
                'label'         => esc_html__('Title', 'divi_flash'),
                'toggle_slug'   => 'design_title',
                'tab_slug'        => 'advanced',
                'line_height' => array(
                    'default' => '1em',
                ),
                'font_size' => array(
                    'default' => '22px',
                ),
                'font-weight' => array(
                    'default' => 'normal'
                ),
                'css'      => array(
                    'main' => "",
                    'hover' => "%%order_class%% .featured-box-title:hover",
                    'important' => 'all',
                )
            ),

            // Content
            'content'   => array(
                'label'         => esc_html__('Content', 'divi_flash'),
                'toggle_slug'   => 'design_content',
                'tab_slug'        => 'advanced',
                'line_height' => array(
                    'default' => '1em',
                ),
                'font_size' => array(
                    'default' => '18px',
                ),
                'css'      => array(
                    'main' => "%%order_class%% .featured-box-text",
                    'hover' => "%%order_class%% .featured-box-text:hover",
                    'important' => 'all',
                ),
            ),
        ];

        $advanced_fields['borders'] = array(
            'default'               => array(),
            'rating'         => array(
                'css'               => array(
                    'main'  => array(
                        'border_radii' => "%%order_class%% .featured-box-content",
                        'border_radii_hover' => "%%order_class%% .featured-box-content:hover .featured-box-content",
                        'border_styles' => "%%order_class%% .featured-box-content",
                        'border_styles_hover' => "%%order_class%% .featured-box-content:hover .featured-box-content",
                    )
                ),
                'label'    => esc_html__('Rating Border', 'divi_flash'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'design_rating',
            ),
            'title'         => array(
                'css'               => array(
                    'main'  => array(
                        'border_radii' => "%%order_class%% .featured-box-content",
                        'border_radii_hover' => "%%order_class%% .featured-box-content:hover .featured-box-content",
                        'border_styles' => "%%order_class%% .featured-box-content",
                        'border_styles_hover' => "%%order_class%% .featured-box-content:hover .featured-box-content",
                    )
                ),
                'label'    => esc_html__('Title Border', 'divi_flash'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'design_title',
            ),
            'content'         => array(
                'css'               => array(
                    'main'  => array(
                        'border_radii' => "%%order_class%% .featured-box-text",
                        'border_radii_hover' => "%%order_class%% .featured-box-text:hover .featured-box-text",
                        'border_styles' => "%%order_class%% .featured-box-text",
                        'border_styles_hover' => "%%order_class%% .featured-box-text:hover .featured-box-text",
                    )
                ),
                'label'    => esc_html__('Content Border', 'divi_flash'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'design_content',
            ),

            // 'nm_image'         => array(
            //     'css'               => array(
            //         'main'  => array(
            //             'border_radii' => "%%order_class%% .featured-box-image img",
            //             'border_radii_hover' => "%%order_class%% .featured-box-image:hover img",
            //             'border_styles' => "%%order_class%% .featured-box-image img",
            //             'border_styles_hover' => "%%order_class%% .featured-box-image:hover img",
            //         )
            //     ),
            //     'label'    => esc_html__('Image Border', 'divi_flash'),
            //     'tab_slug'        => 'advanced',
            //     'toggle_slug'     => 'nm_image',
            // ),
        );

        $advanced_fields['box_shadow'] = array(
            'default'               => true,

            'rating'             => array(
                'label'    => esc_html__('Rating Shadow', 'divi_flash'),
                'css' => array(
                    'main' => "%%order_class%% .featured-box-content",
                    'hover' => "%%order_class%% .featured-box-content:hover .featured-box-content",
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'design_rating',
            ),

            'title'             => array(
                'label'    => esc_html__('Title Box Shadow', 'divi_flash'),
                'css' => array(
                    'main' => "%%order_class%% .featured-box-title",
                    'hover' => "%%order_class%% .featured-box-title:hover .featured-box-title",
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'design_title',
            ),

            'content'             => array(
                'label'    => esc_html__('Content Box Shadow', 'divi_flash'),
                'css' => array(
                    'main' => "%%order_class%% .featured-box-text",
                    'hover' => "%%order_class%% .featured-box-text:hover .featured-box-text",
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'design_content',
            ),

            // 'nm_img'             => array(
            //     'label'    => esc_html__('Image Shadow', 'nm_divi'),
            //     'css' => array(
            //         'main' => "%%order_class%% .featured-box-image img",
            //         'hover' => "%%order_class%% .featured-box-image:hover img",
            //     ),
            //     'tab_slug'        => 'advanced',
            //     'toggle_slug'     => 'nm_image',
            // ),
        );

        $advanced_fields['margin_padding'] = array(
            'css'   => array(
                'important' => 'all'
            )
        );

        return $advanced_fields;
    }
}
