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
                    'design_rating_number'                => esc_html__('Rating Number', 'divi_flash'),
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
        $rating_box_wrapper_bg = $this->df_add_bg_field(array(
            'label'                 => 'Rating Box Wrapper Background',
            'key'                   => 'rating_box_wrapper_bg',
            'toggle_slug'           => 'design_rating_box',
            'tab_slug'              => 'advanced'
        ));

        $rating_box_bg = $this->df_add_bg_field(array(
            'label'                 => 'Rating Box Background (Icon & Title)',
            'key'                   => 'rating_box_bg',
            'toggle_slug'           => 'design_rating_box',
            'tab_slug'              => 'advanced'
        ));

        $rating_bg = $this->df_add_bg_field(array(
            'label'                 => 'Rating Background',
            'key'                   => 'rating_bg',
            'toggle_slug'           => 'design_rating',
            'tab_slug'              => 'advanced'
        ));

        $rating_bg = $this->df_add_bg_field(array(
            'label'                 => 'Rating Background',
            'key'                   => 'rating_bg',
            'toggle_slug'           => 'design_rating',
            'tab_slug'              => 'advanced'
        ));

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
            'rating_icon'          => array(
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
                'default'           => '5',
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
                // 'default'           => '5',
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
                // 'default'           => '10',
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

            'rating_color' => array(
                'label'           => esc_html__('Rating color', 'divi_flash'),
                'description'     => esc_html__('Add rating color.', 'divi_flash'),
                'type'            => 'color-alpha',
                'hover'           => 'tabs',
                'option_category' => 'basic_option',
                'toggle_slug'     => 'design_rating',
                'tab_slug'        => 'advanced'
            ),

            'rating_color_inactive' => array(
                'label'           => esc_html__('Inactive rating color', 'divi_flash'),
                'description'     => esc_html__('Add inactive rating color.', 'divi_flash'),
                'type'            => 'color-alpha',
                'hover'           => 'tabs',
                'option_category' => 'basic_option',
                'toggle_slug'     => 'design_rating',
                'tab_slug'        => 'advanced'
            ),

            // 'rating_active_color' => array(
            //     'label'           => esc_html__('Active Rating color', 'divi_flash'),
            //     'description'     => esc_html__('Add rating active color.', 'divi_flash'),
            //     'type'            => 'color-alpha',
            //     'hover'           => 'tabs',
            //     'option_category' => 'basic_option',
            //     'toggle_slug'     => 'design_rating',
            //     'tab_slug'        => 'advanced'
            // ),

            // 'rating_inactive_color' => array(
            //     'label'           => esc_html__('Inactive Rating color', 'divi_flash'),
            //     'description'     => esc_html__('Add rating inactive color.', 'divi_flash'),
            //     'type'            => 'color-alpha',
            //     'hover'           => 'tabs',
            //     'option_category' => 'basic_option',
            //     'toggle_slug'     => 'design_rating',
            //     'tab_slug'        => 'advanced'
            // ),
        ];

        $rating_title_bg = $this->df_add_bg_field(array(
            'label'                 => 'Rating Title Background',
            'key'                   => 'rating_title_bg',
            'toggle_slug'           => 'design_title',
            'tab_slug'              => 'advanced'
        ));

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

        $rating_content_bg = $this->df_add_bg_field(array(
            'label'                 => 'Rating Content Background',
            'key'                   => 'rating_content_bg',
            'toggle_slug'           => 'design_content',
            'tab_slug'              => 'advanced'
        ));

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

        // Return all values
        return array_merge($rating_box_wrapper_bg, $rating_box_bg, $rating_bg, $rating, $rating_title_bg, $title, $rating_content_bg, $content);
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

        // Disable fields
        $advanced_fields['text'] = false;

        $advanced_fields['fonts'] = [

            // Rating Icon
            'rating'   => array(
                'label'         => esc_html__('Rating icon', 'divi_flash'),
                'toggle_slug'   => 'design_rating',
                'tab_slug'        => 'advanced',
                'hide_font'        => 'false',
                'hide_font_size'        => 'false',
                'hide_line_height'        => 'false',
                'hide_text_color'        => 'false',
                'hide_text_align'        => 'false',
                'line_height'        => 'false',
                'text_color '        => 'false',
                'css'      => array(
                    'main' => "%%order_class%% .df-rating-icon .et-pb-icon",
                    'hover' => "%%order_class%% .df-rating-icon .et-pb-icon:hover",
                    'important' => 'all',
                )
            ),

            // Rating Icon
            'rating_number'   => array(
                'label'         => esc_html__('Rating icon number', 'divi_flash'),
                'toggle_slug'   => 'design_rating_number',
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
                    'main' => "%%order_class%% .df-rating-number",
                    'hover' => "%%order_class%% .df-rating-number:hover",
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
                    'main' => "%%order_class%% .df-rating-title",
                    'hover' => "%%order_class%% .df-rating-title:hover .df-rating-title",
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
                'font-weight' => array(
                    'default' => 'normal'
                ),
                'css'      => array(
                    'main' => "%%order_class%% .df-rating-content",
                    'hover' => "%%order_class%% .df-rating-content:hover",
                    'important' => 'all',
                ),
            ),
        ];

        $advanced_fields['borders'] = array(
            'default'               => array(),
            'rating'         => array(
                'css'               => array(
                    'main'  => array(
                        'border_radii' => "%%order_class%% .df-rating-icon",
                        'border_radii_hover' => "%%order_class%% .df-rating-icon:hover .df-rating-icon",
                        'border_styles' => "%%order_class%% .df-rating-icon",
                        'border_styles_hover' => "%%order_class%% .df-rating-icon:hover .df-rating-icon",
                    )
                ),
                'label'    => esc_html__('Rating', 'divi_flash'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'design_rating',
            ),
            'title'         => array(
                'css'               => array(
                    'main'  => array(
                        'border_radii' => "%%order_class%% .df-rating-title",
                        'border_radii_hover' => "%%order_class%% .df-rating-title:hover .df-rating-title",
                        'border_styles' => "%%order_class%% .df-rating-title",
                        'border_styles_hover' => "%%order_class%% .df-rating-title:hover .df-rating-title",
                    )
                ),
                'label'    => esc_html__('Title', 'divi_flash'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'design_title',
            ),
            'content'         => array(
                'css'               => array(
                    'main'  => array(
                        'border_radii' => "%%order_class%% .df-rating-content",
                        'border_radii_hover' => "%%order_class%% .df-rating-content:hover .df-rating-content",
                        'border_styles' => "%%order_class%% .df-rating-content",
                        'border_styles_hover' => "%%order_class%% .df-rating-content:hover .df-rating-content",
                    )
                ),
                'label'    => esc_html__('Content', 'divi_flash'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'design_content',
            ),
        );

        $advanced_fields['box_shadow'] = array(
            'default'               => true,

            'rating'             => array(
                'label'    => esc_html__('Rating', 'divi_flash'),
                'css' => array(
                    'main' => "%%order_class%% .df-rating-icon",
                    'hover' => "%%order_class%% .df-rating-icon:hover .df-rating-icon",
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'design_rating',
            ),

            'title'             => array(
                'label'    => esc_html__('Title', 'divi_flash'),
                'css' => array(
                    'main' => "%%order_class%% .df-rating-title",
                    'hover' => "%%order_class%% .df-rating-title:hover .df-rating-title",
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'design_title',
            ),

            'content'             => array(
                'label'    => esc_html__('Content', 'divi_flash'),
                'css' => array(
                    'main' => "%%order_class%% .df-rating-content",
                    'hover' => "%%order_class%% .df-rating-content:hover .df-rating-content",
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'design_content',
            ),

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
    {
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
        // Get all style
        $this->render_css($render_slug);

        // Display frontend
        $output = sprintf(
            '<div class="df-rating-box-wrapper">
                %1$s
                %2$s
            </div>',
            $this->render_rating_wrapper(),
            $this->render_content()
        );

        return $output;
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
        //  Rating box wrapper background
        $this->df_process_bg(array(
            'render_slug'       => $render_slug,
            'slug'              => 'rating_box_wrapper_bg',
            'selector'          => "%%order_class%% .df-rating-box-wrapper",
            'hover'             => '%%order_class%% .df-rating-box-wrapper:hover .df-rating-box-wrapper'
        ));

        //  Rating icon wrapper background
        $this->df_process_bg(array(
            'render_slug'       => $render_slug,
            'slug'              => 'rating_box_bg',
            'selector'          => "%%order_class%% .df-rating-wrapper",
            'hover'             => '%%order_class%% .df-rating-wrapper:hover .df-rating-wrapper'
        ));

        //  Rating icon background
        $this->df_process_bg(array(
            'render_slug'       => $render_slug,
            'slug'              => 'rating_bg',
            'selector'          => "%%order_class%% .df-rating-icon",
            'hover'             => '%%order_class%% .df-rating-icon:hover .df-rating-icon'
        ));

        //  Title background
        $this->df_process_bg(array(
            'render_slug'       => $render_slug,
            'slug'              => 'rating_title_bg',
            'selector'          => "%%order_class%% .df-rating-title",
            'hover'             => '%%order_class%% .df-rating-title:hover .df-rating-title'
        ));

        //  Content background
        $this->df_process_bg(array(
            'render_slug'       => $render_slug,
            'slug'              => 'rating_content_bg',
            'selector'          => "%%order_class%% .df-rating-content",
            'hover'             => '%%order_class%% .df-rating-content:hover .df-rating-content'
        ));

        // Rating color
        $this->df_process_color(array(
            'render_slug'       => $render_slug,
            'slug'              => 'rating_color_inactive',
            'type'              => 'color',
            'selector'          => '%%order_class%% .df-rating-icon .et-pb-icon',
            'hover'             => '%%order_class%% .df-rating-icon .et-pb-icon:hover',
            'important' => false,
        ));

        $this->df_process_color(array(
            'render_slug'       => $render_slug,
            'slug'              => 'rating_color',
            'type'              => 'color',
            'selector'          => '%%order_class%% span.df-rating-icon-fill::before, %%order_class%% span.df-rating-icon-fill',
            'hover'             => '%%order_class%% span.df-rating-icon-fill:hover::before, %%order_class%% span.df-rating-icon-fill'
        ));


        // icon font family
        // if (method_exists('ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon')) {
        //     $this->generate_styles(
        //         array(
        //             'utility_arg'    => 'icon_font_family',
        //             'render_slug'    => $render_slug,
        //             'base_attr_name' => 'rating_icon',
        //             'important'      => true,
        //             'selector'       => '%%order_class%% .et-pb-icon.df-rating-icon',
        //             'processor'      => array(
        //                 'ET_Builder_Module_Helper_Style_Processor',
        //                 'process_extended_icon'
        //             ),
        //         )
        //     );
        // }

        // echo '<pre>';
        // print_r($this->props['rating_icon']);
        // // print_r(et_pb_build_extended_font_icon_value(et_pb_process_font_icon($this->props['rating_icon']) ));
        // // print_r("Nishjan");
        // exit;

        // Add before icon
        // if ($this->props['enable_rating'] === 'on'  && !empty($this->props['rating_icon'])) {
        //     ET_Builder_Element::set_style($render_slug, array(
        // 		'selector' => '%%order_class%% .df-rating-icon span.df-rating-icon-fill:before',
        // 		'declaration' => sprintf(
        //             'content: "%1$s";',
        //             et_pb_process_font_icon($this->props['rating_icon'])

        //         )
        // 	));
        // }
    }

    // Render Rating & Rating Number & Title
    public function render_rating_wrapper()
    {

        // Rating Title
        $title = $this->props['enable_title'] === 'on' && !empty($this->props['title']) ? sprintf(
            '<div class="df-rating-title">%1$s</div>',
            $this->props['title']
        ) : "";

        // Rating
        $get_rating_icon = $this->props['enable_rating'] === 'on' ? html_entity_decode(et_pb_process_font_icon($this->props['rating_icon'])) : "&#xe031;";
        $rating_icon = '';
        $rating_number = '';

        $rating_scale_type = !empty($this->props['rating_scale_type']) ? intval($this->props['rating_scale_type']) : 5;

        $rating_value_5 = !empty($this->props['rating_value_5']) ? $this->props['rating_value_5'] : 5;
        $rating_value_10 = !empty($this->props['rating_value_10']) ? $this->props['rating_value_10'] : 10;

        $get_float_5 = explode('.', $rating_value_5);
        $get_float_10 = explode('.', $rating_value_10);

        // Display Rating Icon
        if ($rating_scale_type == 5) {
            for ($i = 1; $i <= $rating_scale_type; $i++) {
                if ($i <= $rating_value_5) {
                    $rating_active_class = 'df-rating-icon-fill';
                } else if ($i == $get_float_5[0] + 1 && isset($get_float_5[1]) && $get_float_5[1] != '' && $get_float_5[1] != 0) {
                    $rating_active_class = 'df-rating-icon-fill df-fill-' . $get_float_5[1];
                } else {
                    $rating_active_class = 'df-rating-icon-empty';
                }
                $rating_icon .= '<span class="et-pb-icon ' . $rating_active_class . '">' . $get_rating_icon . '</span>';
            }
        } elseif ($rating_scale_type == 10) {
            for ($i = 1; $i <= $rating_scale_type; $i++) {
                if ($i <= $rating_value_10) {
                    $rating_active_class = 'df-rating-icon-fill';
                } else if ($i == $get_float_10[0] + 1 && isset($get_float_10[1]) && $get_float_10[1] != '' && $get_float_10[1] != 0) {
                    $rating_active_class = 'df-rating-icon-fill df-fill-' . $get_float_10[1];
                } else {
                    $rating_active_class = 'df-rating-icon-empty';
                }
                $rating_icon .= '<span class="et-pb-icon ' . $rating_active_class . '">' . $get_rating_icon . '</span>';
            }
        } else {
            for ($i = 1; $i <= 5; $i++) {
                $rating_icon .= '<span class="et-pb-icon">' . $get_rating_icon . '</span>';
            }
        }

        // Show rating number
        $this->props['enable_rating_number'] === 'on' ?
            ($rating_scale_type === 5 ?
                $rating_number = sprintf(
                    '<span class="df-rating-number">( %1$s / %2$s )</span>',
                    $rating_value_5,
                    $rating_scale_type
                ) :

                $rating_number = sprintf(
                    '<span class="df-rating-number">( %1$s / %2$s )</span>',
                    $rating_value_10,
                    $rating_scale_type
                ))

            : "";

        return sprintf(
            '<div class="df-rating-wrapper">
                <div class="df-rating-icon">
                    %1$s
                    %2$s
                </div>
                %3$s
            </div>',
            $rating_icon,
            $rating_number,
            $title
        );
    }

    // Render rating content section
    public function render_content()
    {
        // Rating Content
        $content = $this->props['enable_content'] === 'on' && !empty($this->props['content']) ? sprintf(
            '<div class="df-rating-content">%1$s</div>',
            $this->props['content']
        ) : "";

        return $content;
    }

    // public function check_float_int_val($val)
    // {
    //     if (strval((float) $val) == $val) {
    //         return floatval($val);
    //     } else {
    //         return intval($val);
    //     }
    // }

    //////////////////////
    //////////////////////
    /////////////////////
} //Class


// function get_rating_box_require_files()
// {
//     // Get Fields
//     include_once plugin_dir_path(__FILE__) .  '/inc/get-fields.php';

//     // Get Advanced fields configuration
//     include_once plugin_dir_path(__FILE__) .  '/inc/get-adv-fields-config.php';
// }

new DIFL_RatingBox;
