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

            // button
            'nm_button'   => array(
                'label'         => esc_html__('Button', 'nm_divi'),
                'toggle_slug'   => 'nm_button',
                'tab_slug'        => 'advanced',
                'line_height' => array(
                    'default' => '1em',
                ),
                'font_size' => array(
                    'default' => '18px',
                ),
                'css'      => array(
                    'main' => "%%order_class%% .featured-box-readmore",
                    'hover' => "%%order_class%% .featured-box-readmore:hover",
                    'important' => 'all',
                )
            ),
        );

        $advanced_fields['button']['nm_button'] = array(
            'label'          => esc_html__('Button', 'nm_divi'),
            'css'            => array(
                'main'      => '%%order_class%% .featured-box-readmore',
                'alignment' => '%%order_class%% .featured-box-button',
                'important' => 'all',
            ),
            'use_alignment'  => true,
            'box_shadow'     => array(
                'css' => array(
                    'main' => '%%order_class%% .featured-box-readmore',
                ),
            ),
            'borders'        => array(
                'css' => array(
                    'important' => 'all',
                ),
            ),
            'margin_padding' => array(
                'css' => array(
                    'important' => 'all',
                ),
            ),
        );

        $advanced_fields['borders'] = array(
            'default'               => array(),
            'nm_title'         => array(
                'css'               => array(
                    'main'  => array(
                        'border_radii' => "%%order_class%% .featured-box-title",
                        'border_radii_hover' => "%%order_class%% .featured-box-title",
                        'border_styles' => "%%order_class%% .featured-box-title",
                        'border_styles_hover' => "%%order_class%% .featured-box-title",
                    )
                ),
                'label'    => esc_html__('Title Border', 'nm_divi'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'nm_title',
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
