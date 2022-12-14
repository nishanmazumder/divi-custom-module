<?php

/**
 *
 * Get fields
 *
 * @return array
 *
 */

trait GET_ALL_FIELDS
{
    static function get_fields()
    {
        $rating = [
            'enable_rating'  => array(
                'label'             => esc_html__('Icon Enable', 'divi_flash'),
                'description'     => esc_html__('Rating box icon enable or disable.', 'divi_flash'),
                'type'              => 'yes_no_button',
                'options'           => array(
                    'off' => esc_html__('Off', 'divi_flash'),
                    'on'  => esc_html__('On', 'divi_flash')
                ),
                'default'           => 'off',
                'toggle_slug'       => 'rating',
            ),
            'rating_active'          => array(
                'label'             => esc_html__('Active Rating Icon', 'divi_flash'),
                'description'     => esc_html__('Active rating Icon.', 'divi_flash'),
                'type'              => 'select_icon',
                'class'             => array('et-pb-font-icon'),
                'toggle_slug'       => 'rating',
                'show_if'         => array(
                    'enable_rating'     => 'on'
                )
            ),
            // 'rating_inactive'          => array(
            //     'label'             => esc_html__('Inactive Rating Icon', 'divi_flash'),
            //     'description'     => esc_html__('Inactive rating box Icon.', 'divi_flash'),
            //     'type'              => 'select_icon',
            //     'class'             => array('et-pb-font-icon'),
            //     'toggle_slug'       => 'rating',
            //     'show_if'         => array(
            //         'enable_rating'     => 'on'
            //     )
            // ),
            'rating_scale_type' => array(
                'label'           => esc_html__('Rating Scale Type', 'divi_flash'),
                'description'     => esc_html__('Choose Rating Scale Type', 'divi_flash'),
                'type'            => 'select',
                'options'         => array(
                    '5' => esc_html__('0-5', 'divi_flash'),
                    '10'  => esc_html__('0-10', 'divi_flash'),
                ),
                'option_category' => 'basic_option',
                'toggle_slug'     => 'rating',
            ),

            'rating_value_5' => array(
                'label'             => esc_html__('Rating Value', 'divi_flash'),
                'description'     => esc_html__('Set active rating value.', 'divi_flash'),
                'type'              => 'range',
                'default'           => '5',
                'range_settings'    => array(
                    'min'  => '1',
                    'max'  => '5',
                    'step' => '0.5'
                ),
                'toggle_slug'     => 'rating',
                'show_if'         => array(
                    'rating_scale_type'     => '5'
                )
            ),
            'rating_value_10' => array(
                'label'             => esc_html__('Rating Value', 'divi_flash'),
                'description'     => esc_html__('Set active rating value.', 'divi_flash'),
                'type'              => 'range',
                'default'           => '10',
                'range_settings'    => array(
                    'min'  => '1',
                    'max'  => '10',
                    'step' => '0.5'
                ),
                'toggle_slug'     => 'rating',
                'show_if'         => array(
                    'rating_scale_type'     => '10'
                )
            ),
            'rating_display_type' => array(
                'label'           => esc_html__('Rating Display Type', 'divi_flash'),
                'description'     => esc_html__('Choose Rating Display Type', 'divi_flash'),
                'type'            => 'select',
                'options'         => array(
                    'block' => esc_html__('Block', 'divi_flash'),
                    'inline'  => esc_html__('Inline', 'divi_flash'),
                ),
                'option_category' => 'basic_option',
                'toggle_slug'     => 'rating',
            ),

            'rating_placement_up_down' => array(
                'label'           => esc_html__('Rating Placement', 'divi_flash'),
                'description'     => esc_html__('Choose Rating Alignment', 'divi_flash'),
                'type'            => 'select',
                'options'         => array(
                    'up' => esc_html__('Up', 'divi_flash'),
                    'down'  => esc_html__('Down', 'divi_flash'),
                ),
                'default'           => 'up',
                'option_category' => 'basic_option',
                'toggle_slug'     => 'rating',
                'show_if'         => array(
                    'rating_display_type'     => 'block'
                )
            ),

            'rating_placement_left_right' => array(
                'label'           => esc_html__('Rating Placement', 'divi_flash'),
                'description'     => esc_html__('Choose Rating Alignment', 'divi_flash'),
                'type'            => 'select',
                'options'         => array(
                    'left' => esc_html__('Left', 'divi_flash'),
                    'right'  => esc_html__('Right', 'divi_flash'),
                ),
                'default'           => 'left',
                'option_category' => 'basic_option',
                'toggle_slug'     => 'rating',
                'show_if'         => array(
                    'rating_display_type'     => 'inline'
                )
            ),

            'enable_rating_number'  => array(
                'label'             => esc_html__('Show Rating number', 'divi_flash'),
                'description'     => esc_html__('Show Rating number or text.', 'divi_flash'),
                'type'              => 'yes_no_button',
                'options'           => array(
                    'off' => esc_html__('Off', 'divi_flash'),
                    'on'  => esc_html__('On', 'divi_flash')
                ),
                'default'           => 'off',
                'toggle_slug'       => 'rating',
            ),
        ];

        $title = [
            'enable_title'  => array(
                'label'             => esc_html__('Title Enable', 'divi_flash'),
                'description'     => esc_html__('Rating box title enable or disable.', 'divi_flash'),
                'type'              => 'yes_no_button',
                'options'           => array(
                    'off' => esc_html__('Off', 'divi_flash'),
                    'on'  => esc_html__('On', 'divi_flash')
                ),
                'default'           => 'off',
                'toggle_slug'       => 'content',
            ),
            'title' => array(
                'label'           => esc_html__('Title', 'divi_flash'),
                'description'     => esc_html__('Rating box title.', 'divi_flash'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'toggle_slug'     => 'content',
                'show_if'         => array(
                    'enable_title'     => 'on'
                )
            ),

        ];

        $content = [
            'enable_content'  => array(
                'label'             => esc_html__('Content Enable', 'divi_flash'),
                'description'     => esc_html__('Rating box content enable or disable.', 'divi_flash'),
                'type'              => 'yes_no_button',
                'options'           => array(
                    'off' => esc_html__('Off', 'divi_flash'),
                    'on'  => esc_html__('On', 'divi_flash')
                ),
                'default'           => 'off',
                'toggle_slug'       => 'content',
            ),
            'content' => array(
                'label'           => esc_html__('Content', 'divi_flash'),
                'type'            => 'tiny_mce',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Rating box description.', 'divi_flash'),
                'toggle_slug'     => 'content',
                'show_if'         => array(
                    'enable_content'     => 'on'
                )
            ),
        ];

        $rating_box_wrapper_bg = $this->df_add_bg_field(array(
            'label'                 => 'Rating Box Wrapper Background',
            'key'                   => 'rating_box_wrapper_bg',
            'toggle_slug'           => 'design_rating_box',
            'tab_slug'              => 'advanced'
        ));

        $rating_box_bg = $this->df_add_bg_field(array(
            'label'                 => 'Rating Box Background',
            'key'                   => 'rating_box_bg',
            'toggle_slug'           => 'design_rating',
            'tab_slug'              => 'advanced'
        ));

        $rating_bg = $this->df_add_bg_field(array(
            'label'                 => 'Rating Background',
            'key'                   => 'rating_bg',
            'toggle_slug'           => 'design_rating',
            'tab_slug'              => 'advanced'
        ));

        $rating_title_bg = $this->df_add_bg_field(array(
            'label'                 => 'Rating Title Background',
            'key'                   => 'rating_title_bg',
            'toggle_slug'           => 'design_title',
            'tab_slug'              => 'advanced'
        ));

        $rating_content_bg = $this->df_add_bg_field(array(
            'label'                 => 'Rating Content Background',
            'key'                   => 'rating_content_bg',
            'toggle_slug'           => 'design_content',
            'tab_slug'              => 'advanced'
        ));



        $designs = [
            'rating_active_color' => array(
                'label'           => esc_html__('Active Rating color', 'divi_flash'),
                'description'     => esc_html__('Add rating active color.', 'divi_flash'),
                'type'            => 'color-alpha',
                'hover'           => 'tabs',
                'option_category' => 'basic_option',
                'toggle_slug'     => 'design_rating',
                'tab_slug'        => 'advanced'
            ),

            'rating_inactive_color' => array(
                'label'           => esc_html__('Inactive Rating color', 'divi_flash'),
                'description'     => esc_html__('Add rating inactive color.', 'divi_flash'),
                'type'            => 'color-alpha',
                'hover'           => 'tabs',
                'option_category' => 'basic_option',
                'toggle_slug'     => 'design_rating',
                'tab_slug'        => 'advanced'
            ),

            'rating_icon_spacing' => array(
                'label'             => esc_html__('Rating icon spacing', 'divi_flash'),
                'description'     => esc_html__('Add space between rating icon.', 'divi_flash'),
                'type'              => 'range',
                'default'           => '18px',
                'allowed_units'     => array('px'),
                'range_settings'    => array(
                    'min'  => '0',
                    'max'  => '100',
                    'step' => '1'
                ),
                'responsive'        => true,
                // 'mobile_options'    => true,
                'toggle_slug'       => 'design_rating',
                'tab_slug'          => 'advanced',
            ),

            'rating_number_size' => array(
                'label'             => esc_html__('Rating icon size', 'divi_flash'),
                'description'     => esc_html__('Add rating number or text size.', 'divi_flash'),
                'type'              => 'range',
                'default'           => '18px',
                'allowed_units'     => array('px'),
                'range_settings'    => array(
                    'min'  => '0',
                    'max'  => '100',
                    'step' => '1'
                ),
                'responsive'        => true,
                // 'mobile_options'    => true,
                'toggle_slug'       => 'design_rating',
                'tab_slug'          => 'advanced',
            ),

            // 'rating_alignment' => array(
            //     'label'           => esc_html__('Rating Alignment', 'divi_flash'),
            //     'description'     => esc_html__('Set Rating Alignment.', 'divi_flash'),
            //     'type'            => 'align',
            //     'option_category' => 'basic_option',
            //     'tab_slug'        => 'advanced',
            //     'toggle_slug'     => 'setting_rating',
            // ),
        ];
    }
}
