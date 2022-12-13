<?php
if ( ! class_exists( 'ET_Builder_Element' ) ) {
	return;
}
// require_once ( DIFL_MAIN_DIR . '/includes/utils/df_utls.php');

// Get require files
if (function_exists('get_rating_box_require_files')) get_rating_box_require_files();

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
                    'design_rating'                => esc_html__('Rating', 'divi_flash'),
                    'design_title'                 => esc_html__('Title', 'divi_flash'),
                    'design_content'                 => esc_html__('Content', 'divi_flash'),
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
        return (new class
        {
            use GET_ALL_FIELDS;
        }
        )::get_fields();
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
        return (new class
        {
            use GET_RATING_ADV_FIELDS_CONFIG;
        }
        )::get_adv_fields_config();
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

         {/* <div className="df-rating-box-wrapper">
                <div className="df-rating-wrapper">
                    <div className="df-rating-icon">
                        <span className="et-pb-icon">{rating}</span>
                    </div>
                    <div className="df-rating-title">{title}</div>
                </div>
                <div className="df-rating-description">{content}</div>
            </div> */}

        return [

        ];
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
} //Class


function get_rating_box_require_files()
{
    // Get Fields
    include_once plugin_dir_path(__FILE__) .  '/inc/get-fields.php';

    // Get Advanced fields configuration
    include_once plugin_dir_path(__FILE__) .  '/inc/get-adv-fields-config.php';
}

new DIFL_RatingBox;
