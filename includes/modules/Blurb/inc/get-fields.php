<?php

/**
 *
 * Get fields
 *
 * @return array
 *
 */

trait GET_FIELDS
{
    static function get_fields()
    {

        $image = array(
            'nm_img' => array(
                'label'           => esc_html__('Image', 'nm_divi'),
                'type'            => 'upload',
                'upload_button_text' => esc_attr__('Upload an image', 'nm_divi'),
                'choose_text'        => esc_attr__('Choose an Image', 'nm_divi'),
                'update_text'        => esc_attr__('Set As Image', 'nm_divi'),
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_img',
            ),
            'nm_img_alt_text' => array(
                'label'                 => esc_html__('Image Alt Text', 'nm_divi'),
                'description'           => esc_html__('This defines the HTML ALT text. A short description of your image can be placed here.', 'divi_flash'),
                'type'                  => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'           => 'nm_img'
            ),
            'nm_img_align' => array(
                'label'           => esc_html__('Image Alignment', 'nm_divi'),
                'type'            => 'text_align',
                'options'         => et_builder_get_text_orientation_options(array('justified')),
                'toggle_slug'     => 'nm_image',
                'mobile_options'    => true,
                'tab_slug'        => 'advanced'
            ),
            'nm_img_width' => array(
                'label'             => esc_html__('Image Width', 'nm_divi'),
                'type'              => 'range',
                'toggle_slug'       => 'nm_image',
                'tab_slug'          => 'advanced',
                'default'           => '100%',
                'allowed_units'     => array('%'),
                'range_settings'    => array(
                    'min'  => '0',
                    'max'  => '100',
                    'step' => '1'
                ),
                'responsive'        => true,
                'mobile_options'    => true,
                'description'     => esc_html__('', 'nm_divi')
            ),
            'nm_img_bg' => array(
                'label'           => esc_html__('Image Background', 'nm_divi'),
                'type'            => 'color-alpha',
                'hover'           => 'tabs',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_image',
                'tab_slug'        => 'advanced'
            )
        );

        $badge = array(
            'nm_badge_enable'  => array(
                'label'             => esc_html__('Badge Enable', 'nm_divi'),
                'type'              => 'yes_no_button',
                'options'           => array(
                    'off' => esc_html__('Off', 'nm_divi'),
                    'on'  => esc_html__('On', 'nm_divi')
                ),
                'default'           => 'off',
                'toggle_slug'       => 'nm_badge',
            ),
            'nm_badge' => array(
                'label'           => esc_html__('Badge', 'nm_divi'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_badge',
                'show_if'         => array(
                    'nm_badge_enable'     => 'on'
                )
            ),
            'nm_badge_bg' => array(
                'label'           => esc_html__('Badge Background', 'nm_divi'),
                'type'            => 'color-alpha',
                'hover'           => 'tabs',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_badge',
                'tab_slug'        => 'advanced'
            ),
            'nm_badge_icon_active'  => array(
                'label'             => esc_html__('Use Icon', 'nm_divi'),
                'type'              => 'yes_no_button',
                'options'           => array(
                    'off' => esc_html__('Off', 'nm_divi'),
                    'on'  => esc_html__('On', 'nm_divi')
                ),
                'default'           => 'off',
                'tab_slug'            => 'advanced' ,
                'toggle_slug'       => 'nm_badge',
            ),
            'nm_badge_icon' => array(
				'label'               => esc_html__( 'Icon', 'divi_flash' ),
				'type'                => 'select_icon',
                'class'                 => array('et-pb-font-icon'),
                'default'               => '5',
				'toggle_slug'         => 'nm_badge',
                'tab_slug'            => 'advanced' ,
				'description'         => esc_html__( '', 'nm_divi' ),
                'show_if'         => array(
                    'nm_badge_icon_active'     => 'on'
                )
            ),
            'nm_badge_icon_size' => array(
                'label'             => esc_html__('Icon Size', 'nm_divi'),
                'type'              => 'range',
                'toggle_slug'       => 'nm_badge',
                'tab_slug'          => 'advanced',
                'default'           => '18px',
                'allowed_units'     => array('px'),
                'range_settings'    => array(
                    'min'  => '0',
                    'max'  => '100',
                    'step' => '1'
                ),
                // 'responsive'        => true,
                // 'mobile_options'    => true,
                'description'     => esc_html__('', 'nm_divi'),
                'show_if'         => array(
                    'nm_badge_icon_active'     => 'on'
                )
            ),
            'nm_badge_space' => array(
                'label'             => esc_html__('Badge padding', 'nm_divi'),
                'toggle_slug'       => 'nm_badge',
                'tab_slug'          => 'advanced',
                'type'              => 'custom_margin',
                'hover'             => 'tabs',
                'responsive'        => true,
                'mobile_options'    => true
            ),
            'nm_badge_move_top_bottom' => array(
                'label'             => esc_html__('Move top/bottom', 'nm_divi'),
                'type'              => 'range',
                'toggle_slug'       => 'nm_badge',
                'tab_slug'          => 'advanced',
                'default'           => '45%',
                'allowed_units'     => array('%'),
                'range_settings'    => array(
                    'min'  => '0',
                    'max'  => '100',
                    'step' => '1'
                ),
                // 'responsive'        => true,
                // 'mobile_options'    => true,
                'description'     => esc_html__('', 'nm_divi'),
            ),
            'nm_badge_move_left_right' => array(
                'label'             => esc_html__('Move left/right', 'nm_divi'),
                'type'              => 'range',
                'toggle_slug'       => 'nm_badge',
                'tab_slug'          => 'advanced',
                'default'           => '90%',
                'allowed_units'     => array('%'),
                'range_settings'    => array(
                    'min'  => '0',
                    'max'  => '100',
                    'step' => '1'
                ),
                // 'responsive'        => true,
                // 'mobile_options'    => true,
                'description'     => esc_html__('', 'nm_divi'),
            ),
        );

        $title = array(
            'nm_title' => array(
                'label'           => esc_html__('Title', 'nm_divi'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_content',
            ),
            'nm_title_bg' => array(
                'label'           => esc_html__('Title Background', 'nm_divi'),
                'type'            => 'color-alpha',
                'hover'           => 'tabs',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_title',
                'tab_slug'        => 'advanced'
            )
        );

        $subtitle = array(
            'nm_subtitle_active'  => array(
                'label'             => esc_html__('Enable Subtitle', 'nm_divi'),
                'type'              => 'yes_no_button',
                'options'           => array(
                    'off' => esc_html__('Off', 'nm_divi'),
                    'on'  => esc_html__('On', 'nm_divi')
                ),
                'default'           => 'off',
                'toggle_slug'       => 'nm_content',
            ),
            'nm_sub_title' => array(
                'label'           => esc_html__('Sub title', 'nm_divi'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_content',
                'show_if'         => array(
                    'nm_subtitle_active'     => 'on'
                )
            ),
            'nm_sub_title_bg' => array(
                'label'           => esc_html__('Sub title Background', 'nm_divi'),
                'type'            => 'color-alpha',
                'hover'           => 'tabs',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_sub_title',
                'tab_slug'        => 'advanced',
                'show_if'         => array(
                    'nm_subtitle_active'     => 'on'
                )
            )
        );

        $content = array(
            'nm_content' => array(
                'label'           => esc_html__('Content', 'nm_divi'),
                'type'            => 'tiny_mce',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_content',
                'dynamic_content' => 'text'
            ),

            'nm_content_bg' => array(
                'label'           => esc_html__('Content Background', 'nm_divi'),
                'type'            => 'color-alpha',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_content',
                'tab_slug'        => 'advanced',
                'hover'           => 'tabs',
            ),
        );

        $button = array(
            'nm_btn' => array(
                'label'           => esc_html__('Button Label', 'nm_divi'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_button',
            ),
            'nm_btn_url' => array(
                'label'           => esc_html__('Button Link', 'nm_divi'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_button',
            ),
            'nm_btn_url_new_window' => array(
                'default'         => 'off',
                'default_on_front' => true,
                'label'           => esc_html__('Url Open', 'nm_divi'),
                'type'            => 'select',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('In The Same Window', 'nm_divi'),
                    'on'  => esc_html__('In The New Tab', 'nm_divi'),
                ),
                'toggle_slug'     => 'nm_button',
                'description'     => esc_html__('', 'nm_divi'),
            ),
            'nm_btn_full_width'  => array(
                'label'             => esc_html__('Enable Button Fullwidth', 'nm_divi'),
                'type'              => 'yes_no_button',
                'options'           => array(
                    'off' => esc_html__('Off', 'divi_flash'),
                    'on'  => esc_html__('On', 'divi_flash')
                ),
                'default'           => 'off',
                'toggle_slug'       => 'nm_button',
                'tab_slug'        => 'advanced'
            ),
            'nm_btn_bg' => array(
                'label'           => esc_html__('Button Wrapper Background', 'nm_divi'),
                'type'            => 'color-alpha',
                'hover'           => 'tabs',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_button',
                'tab_slug'        => 'advanced'
            ),
        );

        $content_box = [
            'nm_content_box_bg' => array(
                'label'           => esc_html__('Content wrapper background', 'nm_divi'),
                'type'            => 'color-alpha',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_box',
                'tab_slug'        => 'advanced'
            ),
            'nm_content_box_width' => array(
                'label'             => esc_html__('Content wrapper width', 'nm_divi'),
                'type'              => 'range',
                'toggle_slug'       => 'nm_box',
                'tab_slug'          => 'advanced',
                'default'           => '50%',
                'default'           => '100%',
                'allowed_units'     => array('%'),
                'range_settings'    => array(
                    'min'  => '0',
                    'max'  => '100',
                    'step' => '5'
                ),
                'responsive'        => true,
                'mobile_options'    => true,
                'description'     => esc_html__('', 'nm_divi')
            ),
            // 'nm_content_box_height' => array(
            //     'label'             => esc_html__('Content wrapper height', 'nm_divi'),
            //     'type'              => 'range',
            //     'toggle_slug'       => 'nm_box',
            //     'tab_slug'          => 'advanced',
            //     'default'           => '400px',
            //     'allowed_units'     => array('px'),
            //     'range_settings'    => array(
            //         'min'  => '0',
            //         'max'  => '400',
            //         'step' => '10'
            //     ),
            //     // 'responsive'        => true,
            //     // 'mobile_options'    => true,
            //     'description'     => esc_html__('', 'nm_divi')
            // ),
            'nm_content_box_overlap'  => array(
                'label'             => esc_html__('Content wrapper overlap', 'nm_divi'),
                'type'              => 'yes_no_button',
                'options'           => array(
                    'off' => esc_html__('Off', 'divi_flash'),
                    'on'  => esc_html__('On', 'divi_flash')
                ),
                'default'           => 'off',
                'toggle_slug'       => 'nm_box',
                'tab_slug'        => 'advanced'
            ),
            'nm_content_box_move_top_bottom' => array(
                'label'             => esc_html__('Move top/bottom', 'nm_divi'),
                'type'              => 'range',
                'toggle_slug'       => 'nm_box',
                'tab_slug'          => 'advanced',
                'default'           => '50%',
                'allowed_units'     => array('%'),
                'range_settings'    => array(
                    'min'  => '0',
                    'max'  => '100',
                    'step' => '1'
                ),
                'responsive'        => true,
                'mobile_options'    => true,
                'description'     => esc_html__('', 'nm_divi'),
                'show_if'         => array(
                    'nm_content_box_overlap'     => 'on'
                )
            ),

            'nm_content_box_move_left_right' => array(
                'label'             => esc_html__('Move left/right', 'nm_divi'),
                'type'              => 'range',
                'toggle_slug'       => 'nm_box',
                'tab_slug'          => 'advanced',
                'default'           => '50%',
                'allowed_units'     => array('%'),
                'range_settings'    => array(
                    'min'  => '0',
                    'max'  => '100',
                    'step' => '1'
                ),
                'responsive'        => true,
                'mobile_options'    => true,
                'description'     => esc_html__('', 'nm_divi'),
                'show_if'         => array(
                    'nm_content_box_overlap'     => 'on'
                )
            ),
        ];

        $custom_space = [
            'nm_content_box_space' => array(
                'label'             => esc_html__('Content wrapper padding', 'nm_divi'),
                'toggle_slug'       => 'custom_spacing',
                'tab_slug'          => 'advanced',
                'sub_toggle'        => 'wrapper',
                'type'              => 'custom_margin',
                'hover'             => 'tabs',
                'responsive'        => true,
                'mobile_options'    => true
            ),
            'nm_content_box_space_margin' => array(
                'label'             => esc_html__('Content wrapper margin', 'nm_divi'),
                'toggle_slug'       => 'custom_spacing',
                'tab_slug'          => 'advanced',
                'sub_toggle'        => 'wrapper',
                'type'              => 'custom_margin',
                'hover'             => 'tabs',
                'responsive'        => true,
                'mobile_options'    => true
            ),
            'nm_img_space' => array(
                'label'             => esc_html__('Image padding', 'nm_divi'),
                'toggle_slug'       => 'custom_spacing',
                'tab_slug'          => 'advanced',
                'sub_toggle'        => 'content',
                'type'              => 'custom_margin',
                'hover'             => 'tabs',
                'responsive'        => true,
                'mobile_options'    => true
            ),
            'nm_img_margin' => array(
                'label'             => esc_html__('Image margin', 'nm_divi'),
                'toggle_slug'       => 'custom_spacing',
                'tab_slug'          => 'advanced',
                'sub_toggle'        => 'content',
                'type'              => 'custom_margin',
                'hover'             => 'tabs',
                'responsive'        => true,
                'mobile_options'    => true
            ),

            'nm_title_space' => array(
                'label'             => esc_html__('Title padding', 'nm_divi'),
                'toggle_slug'       => 'custom_spacing',
                'tab_slug'          => 'advanced',
                'sub_toggle'        => 'content',
                'type'              => 'custom_margin',
                'hover'             => 'tabs',
                'responsive'        => true,
                'mobile_options'    => true
            ),
            'nm_title_space_margin' => array(
                'label'             => esc_html__('Title margin', 'nm_divi'),
                'toggle_slug'       => 'custom_spacing',
                'tab_slug'          => 'advanced',
                'sub_toggle'        => 'content',
                'type'              => 'custom_margin',
                'hover'             => 'tabs',
                'responsive'        => true,
                'mobile_options'    => true
            ),
            'nm_sub_title_space' => array(
                'label'             => esc_html__('Sub Title padding', 'nm_divi'),
                'toggle_slug'       => 'custom_spacing',
                'tab_slug'          => 'advanced',
                'sub_toggle'        => 'content',
                'type'              => 'custom_margin',
                'hover'             => 'tabs',
                'responsive'        => true,
                'mobile_options'    => true
            ),
            'nm_sub_title_margin' => array(
                'label'             => esc_html__('Sub Title margin', 'nm_divi'),
                'toggle_slug'       => 'custom_spacing',
                'tab_slug'          => 'advanced',
                'sub_toggle'        => 'content',
                'type'              => 'custom_margin',
                'hover'             => 'tabs',
                'responsive'        => true,
                'mobile_options'    => true
            ),
            'nm_content_space' => array(
                'label'             => esc_html__('Content padding', 'nm_divi'),
                'toggle_slug'       => 'custom_spacing',
                'tab_slug'          => 'advanced',
                'sub_toggle'        => 'content',
                'type'              => 'custom_margin',
                'hover'             => 'tabs',
                'responsive'        => true,
                'mobile_options'    => true
            ),
            'nm_content_space_margin' => array(
                'label'             => esc_html__('Content margin', 'nm_divi'),
                'toggle_slug'       => 'custom_spacing',
                'tab_slug'          => 'advanced',
                'sub_toggle'        => 'content',
                'type'              => 'custom_margin',
                'hover'             => 'tabs',
                'responsive'        => true,
                'mobile_options'    => true
            ),
            'nm_button_space' => array(
                'label'             => esc_html__('Button padding', 'nm_divi'),
                'toggle_slug'       => 'custom_spacing',
                'tab_slug'          => 'advanced',
                'sub_toggle'        => 'content',
                'type'              => 'custom_margin',
                'hover'             => 'tabs',
                'responsive'        => true,
                'mobile_options'    => true
            ),
            'nm_button_space_margin' => array(
                'label'             => esc_html__('Button margin', 'nm_divi'),
                'toggle_slug'       => 'custom_spacing',
                'tab_slug'          => 'advanced',
                'sub_toggle'        => 'content',
                'type'              => 'custom_margin',
                'hover'             => 'tabs',
                'responsive'        => true,
                'mobile_options'    => true
            ),

        ];

        // Return all values
        return array_merge($image, $badge, $title, $subtitle, $content, $button, $content_box, $custom_space);
    }
}
