<?php
// Get require files
if (function_exists('get_all_require_files')) get_all_require_files();
class NMDIVI_BLURB extends ET_Builder_Module
{
	public $slug       = 'nmdivi_blurb';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://www.bdsoftcreation.com',
		'author'     => 'Nishan M',
		'author_uri' => 'https://www.bdsoftcreation.com',
	);

	/**
	 *
	 * Init
	 *
	 * @since v1.0.0
	 *
	 */

	public function init()
	{
		// Name
		$this->name = esc_html__('NM Blurb', 'nm_divi');

		// Icon
		$this->icon = "Icon";

		// Main class
		$this->main_css_element = "%%order_class%%";
	}


	/**
	 *
	 * Modal configuration
	 *
	 * @return array
	 *
	 */

	public function get_settings_modal_toggles()
	{
		return [
			// General
			'general' => [
				'toggles' => [
					'nm_title' => esc_html__('Title', 'nm_divi'),
					'nm_content' => esc_html__('Content', 'nm_divi'),
					'nm_img' => esc_html__('Image', 'nm_divi'),
					'nm_button' => esc_html__('Button', 'nm_divi')
				]
			],

			// Advanced
			'advanced' => [
				'toggles' => [
					'nm_title' => esc_html__('Title', 'nm_divi'),
					'nm_image' => esc_html__('Image', 'nm_divi'),
					'nm_button' => esc_html__('Button', 'nm_divi'),
					'nm_content' => esc_html__('Content', 'nm_divi'),
					'custom_spacing'    => array(
						'title'             => esc_html__('Custom Spacing', 'nm_divi'),
						'tabbed_subtoggles' => true,
						'sub_toggles' => array(
							'wrapper'   => array(
								'name' => 'Wrapper',
							),
							'content'     => array(
								'name' => 'Content'
							)
						),
					)
				]
			]
		];
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
			use GET_FIELDS;
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
			use GET_ADV_FIELDS_CONFIG;
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
		return array(
			'nm_title_bg' => array(
				'label'    => esc_html__('Title', 'nm_divi'),
				'selector' => '%%order_class%% .featured-box-title',
			),
			'nm_content_bg' => array(
				'label'    => esc_html__('Content', 'nm_divi'),
				'selector' => '%%order_class%% .featured-box-content',
			),
		);
	}

	/**
	 *
	 * Render (frontend)
	 *
	 * @return array
	 *
	 */

	public function render($attrs, $content = null, $render_slug)
	{
		// Get all render css
		$this->render_css($render_slug);

		// Render
		$output = sprintf(
			'<div class="featured-box featured-box-default">
				%1$s
				<div class="featured-box-content">
					%2$s
					%3$s
					%4$s
			  	</div>
		  	</div>',
			$this->nm_render_image(),
			$this->nm_render_title(),
			$this->nm_render_content(),
			$this->nm_render_button()
		);

		// Return render
		return $output;
	}

	// Render Css
	public function render_css($render_slug)
	{
		$title_bg = $this->props['nm_title_bg'];
		$title_bg_hover = $this->props['nm_title_bg__hover'];
		$content_bg = $this->props['nm_content_bg'];
		$content_bg_hover = $this->props['nm_content_bg__hover'];
		$button_full_width = $this->props['nm_btn_full_width'];
		$button_bg = $this->props['nm_btn_bg'];
		$button_bg_hover = $this->props['nm_btn_bg__hover'];



		//custom space
		$title_space = $this->props['nm_title_space'];
		$content_space = $this->props['nm_content_space'];
		$button_space = $this->props['nm_button_space'];

		///// Title  /////
		if ('' !== $title_bg) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-title',
				'declaration' => sprintf(
					'background-color: %1$s;',
					$title_bg
				),
			));
		}

		if ('' !== $title_bg_hover) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-title:hover',
				'declaration' => sprintf(
					'background-color: %1$s;',
					$title_bg_hover
				),
			));
		}

		list($title_top_space, $title_right_space, $title_bottom_space, $title_left_space) = $this->get_custom_space($title_space);

		if ('' !== $title_space) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-title',
				'declaration' => sprintf(
					'padding: %1$s %2$s %3$s %4$s;',
					$title_top_space,
					$title_right_space,
					$title_bottom_space,
					$title_left_space
				),
			));
		}


		if ('' !== $title_bg_hover) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-title:hover',
				'declaration' => sprintf(
					'background-color: %1$s;',
					$title_bg_hover
				),
			));
		}

		///// Content /////
		if ('' !== $content_bg) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-text',
				'declaration' => sprintf(
					'background-color: %1$s;',
					$content_bg
				),
			));
		}

		if ('' !== $content_bg_hover) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-text:hover',
				'declaration' => sprintf(
					'background-color: %1$s;',
					$content_bg_hover
				),
			));
		}

		list($content_top_space, $content_right_space, $content_bottom_space, $content_left_space) = $this->get_custom_space($content_space);

		if ('' !== $content_space) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-content',
				'declaration' => sprintf(
					'padding: %1$s %2$s %3$s %4$s;',
					$content_top_space,
					$content_right_space,
					$content_bottom_space,
					$content_left_space
				),
			));
		}

		///// Button /////

		list($button_top_space, $button_right_space, $button_bottom_space, $button_left_space) = $this->get_custom_space($button_space);

		if ('' !== $button_space) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-button',
				'declaration' => sprintf(
					'padding: %1$s %2$s %3$s %4$s;',
					$button_top_space,
					$button_right_space,
					$button_bottom_space,
					$button_left_space
				),
			));
		}

		if ('' !== $button_bg) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-button',
				'declaration' => sprintf(
					'background-color: %1$s;',
					$button_bg
				),
			));
		}

		if ('' !== $button_bg_hover) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-button:hover',
				'declaration' => sprintf(
					'background-color: %1$s;',
					$button_bg_hover
				),
			));
		}

		// if('on' === $button_full_width){
		// 	ET_Builder_Element::set_style($render_slug, array(
		// 		'selector'    => '%%order_class%% .featured-box-button a',
		// 		'declaration' => sprintf(
		// 			'display: block;',
		// 			$button_bg
		// 		),
		// 	));
		// }

		// self::set_style($this->slug, array(
		// 	'selector'    => '%%order_class%% .featured-box-title',
		// 	'declaration' => sprintf('background-color:%s;', $title_bg)
		// ));
	}



	public function get_transition_fields_css_props()
	{
		$fields = parent::get_transition_fields_css_props();

		$title_bg = '%%order_class%% .featured-box-title';
		$content_bg = '%%order_class%% .featured-box-text';
		$button_bg = '%%order_class%% .featured-box-button';

		$fields['nm_title_bg'] = array('background-color' => $title_bg);
		$fields['nm_content_bg'] = array('background-color' => $content_bg);
		$fields['nm_btn_bg'] = array('background-color' => $button_bg);

		return $fields;
	}

	// Get custom space
	public function get_custom_space(string $space)
	{
		return explode('|', $space);
	}

	// Image block
	public function nm_render_image()
	{
		return sprintf(
			'<div class="featured-box-image">
				<div class="image-mask">
					<img src="%1$s" alt="Tree Plantation System" />
				</div>
		  	</div>',
			esc_url($this->props['nm_img'])
		);
	}

	// Title block
	public function nm_render_title()
	{
		return sprintf(
			'<h3 class="featured-box-title">
				<span>%1$s</span>
			</h3>',
			esc_html($this->props['nm_title'])
		);
	}

	// Content block
	public function nm_render_content()
	{
		return sprintf(
			'<div class="featured-box-text">
				%1$s
			</div>',
			esc_html($this->props['nm_content'])
		);
	}

	// Button block
	public function nm_render_button()
	{
		$btn_txt = $this->props['nm_btn'];
		$btn_url = $this->props['nm_btn_url'];
		//$btn_target = ("on" === $this->props['nm_btn_url_new_window']) ? "_blank" : "_self";
		$btn_target = $this->props['nm_btn_url_new_window'];
		$btn_icon = $this->props['nm_button_icon'];
		$btn_custom         = $this->props['custom_button'];
		$btn_rel            = $this->props['button_rel'];
		$button_width = ("on" === $this->props['nm_btn_full_width']) ? "display-block" : "display-inline-block";

		// Render button
		$button = $this->render_button(array(
			'button_text'      => $btn_txt,
			'button_url'       => $btn_url,
			'url_new_window'   => $btn_target,
			'button_custom'    => $btn_custom,
			'button_rel'       => $btn_rel,
			'custom_icon'      => $btn_icon,
			'has_wrapper'         => false,
			'button_classname'    => array('featured-box-readmore', $button_width),
		));

		return sprintf(
			'<div class="featured-box-button">
					%1$s
			</div>',
			$button
		);
	}
}

function get_all_require_files()
{
	// Get Fields
	include_once plugin_dir_path(__FILE__) .  'inc/get-fields.php';

	// Get Advanced fields configuration
	include_once plugin_dir_path(__FILE__) .  'inc/get-adv-fields-config.php';
}

new NMDIVI_BLURB;
