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
        );

        // Return all values
        return array_merge($title, $content, $image, $button);
    }
}
