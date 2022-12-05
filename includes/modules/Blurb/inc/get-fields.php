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
        $title = array(
            'nm_title' => array(
                'label'           => esc_html__('Title', 'nm_divi'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_title',
            ),
            'nm_title_bg' => array(
                'label'           => esc_html__('Title Background', 'nm_divi'),
                'type'            => 'color-alpha',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_title',
                'tab_slug'        => 'advanced'
            ),
            'nm_title_space' => array(
                'label'           => esc_html__('Title Space', 'nm_divi'),
                'type'            => 'margin_padding',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_title',
                'tab_slug'        => 'advanced'
            ),

        );

        $content = array(
            'nm_content' => array(
                'label'           => esc_html__('Content', 'nm_divi'),
                'type'            => 'tiny_mce',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_content',
            ),

            'nm_content_bg' => array(
                'label'           => esc_html__('Content Background', 'nm_divi'),
                'type'            => 'color',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_content',
                'tab_slug'        => 'advanced'
            ),
        );

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
            )
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
            'nm_btn_bg' => array(
                'label'           => esc_html__('Button Background', 'nm_divi'),
                'type'            => 'color-alpha',
                'option_category' => 'basic_option',
                'description'     => esc_html__('', 'nm_divi'),
                'toggle_slug'     => 'nm_button',
                'tab_slug'        => 'advanced'
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
        );

        $custom_space = [
            'nm_featured_box' => array(
                'label'             => esc_html__('Box Spacing', 'nm_divi'),
                'toggle_slug'       => 'custom_spacing',
                'tab_slug'          => 'advanced',
                'sub_toggle'        => 'wrapper',
                'type'              => 'custom_margin',
                'hover'             => 'tabs',
                'responsive'        => true,
                'mobile_options'    => true
            ),
            'nm_title_space' => array(
                'label'             => esc_html__('Title Spacing', 'nm_divi'),
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
        return array_merge($title, $content, $image, $button, $custom_space);
    }
}
