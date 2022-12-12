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
            'rating'          => array(
                'label'             => esc_html__( 'Rating Icon', 'divi_flash' ),
				'type'              => 'select_icon',
				'class'             => array( 'et-pb-font-icon' ),
				'toggle_slug'       => 'rating'
            ),
        ];

        $title = [
            'title' => array(
                'label'           => esc_html__('Title', 'divi_flash'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Rating box title.', 'divi_flash'),
                'toggle_slug'     => 'content',
            ),
        ];

        $content = [
            'content' => array(
                'label'           => esc_html__('Content', 'divi_flash'),
                'type'            => 'tiny_mce',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Rating box description.', 'divi_flash'),
                'toggle_slug'     => 'content'
            ),
        ];

        // Return all values
        return array_merge($rating, $title, $content);
    }
}
