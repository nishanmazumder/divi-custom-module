<?php
if (!class_exists('ET_Builder_Element')) {
    return;
}
// require_once ( DIFL_MAIN_DIR . '/includes/utils/df_utls.php');

// // Get require files
// if (function_exists('get_rating_box_require_files')) get_rating_box_require_files();

class DIFL_RatingBox extends ET_Builder_Module
{
    public $slug       = 'difl_ratingbox';
    public $vb_support = 'on';
    use DF_UTLS;

    protected $module_credits = array(
        'module_uri' => '',
        'author'     => 'DiviFlash',
        'author_uri' => '',
    );

    public function init()
    {
        $this->name = esc_html__('Rating box', 'divi_flash');
        $this->main_css_element = "%%order_class%%";
        $this->icon_path        =  DIFL_ADMIN_DIR_PATH . 'img/module-icons/advanced-heading.svg';
    }

    public function get_settings_modal_toggles()
    {
        return array(
            'general'   => array(
                'toggles'      => array(
                    'rating'      => esc_html__('Rating', 'divi_flash'),
                    'content'      => esc_html__('Content', 'divi_flash'),
                ),
            ),
            'advanced'   => array(
                'toggles'   => array(
                    'design_rating_box'            => esc_html__('Rating Box Wrapper', 'divi_flash'),
                    'design_rating'                => esc_html__('Rating', 'divi_flash'),
                    'design_title'                 => esc_html__('Title', 'divi_flash'),
                    'design_content'               => esc_html__('Content', 'divi_flash'),
                    // 'custom_borders'        => esc_html__('Custom border', 'divi_flash'),
                    // 'custom_spacing'        => esc_html__('Custom Spacing', 'divi_flash')
                )
            ),
        );
    }

    /**
     *
     * All fields
     *
     * @return array
     *
     */


    public function get_fields()
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

        // Return all values
        return array_merge($rating, $title, $content, $designs, $rating_box_wrapper_bg, $rating_box_bg, $rating_bg, $rating_title_bg, $rating_content_bg);
    }

    /**
     *
     * Advanced fields configuration
     *
     * @return array
     *
     */

    public function get_advanced_fields_config()
    {
        $advanced_fields = array();

        // Disable text field
        $advanced_fields['text'] = false;
        // $advanced_fields['filters'] = false;

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
            //     'label'    => esc_html__('Image Shadow', 'divi_flash'),
            //     'css' => array(
            //         'main' => "%%order_class%% .featured-box-image img",
            //         'hover' => "%%order_class%% .featured-box-image:hover img",
            //     ),
            //     'tab_slug'        => 'advanced',
            //     'toggle_slug'     => 'nm_image',
            // ),
        );

        $advanced_fields['filters'] = array(
            'child_filters_target' => array(
                'label'    => esc_html__('Filter', 'divi_flash'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'filter',
                'css' => array(
                    'main' => '%%order_class%% .df-rating-box-wrapper',
                    'hover' => '%%order_class%% .df-rating-box-wrapper:hover .df-rating-box-wrapper'
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

    /**
     *
     * Custom css fields
     *
     * @return array
     *
     */

    public function get_custom_css_fields_config()
    { {/* <div className="df-rating-box-wrapper">
                <div className="df-rating-wrapper">
                    <div className="df-rating-icon">
                        <span className="et-pb-icon">{rating}</span>
                    </div>
                    <div className="df-rating-title">{title}</div>
                </div>
                <div className="df-rating-description">{content}</div>
            </div> */
        }

        return [];
    }

    /**
     *
     * Render
     *
     * @return array
     *
     */

    public function render($attrs, $content = null, $render_slug)
    {
        return "render";
    }

    /**
     *
     * Render Css
     *
     * @return array
     *
     */

    public function render_css($render_slug)
    {
        //  background
        $this->df_process_color(array(
            'render_slug'       => $render_slug,
            'slug'              => 'rating_box_wrapper_bg',
            'selector'          => "%%order_class%% .df-rating-box-wrapper",
            'hover'             => '%%order_class%% .df-rating-box-wrapper:hover .df-rating-box-wrapper'
        ));
    }
} //Class


// function get_rating_box_require_files()
// {
//     // Get Fields
//     include_once plugin_dir_path(__FILE__) .  '/inc/get-fields.php';

//     // Get Advanced fields configuration
//     include_once plugin_dir_path(__FILE__) .  '/inc/get-adv-fields-config.php';
// }

new DIFL_RatingBox;
