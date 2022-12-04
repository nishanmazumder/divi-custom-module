<?php

class NMDIVI_BLURB extends ET_Builder_Module
{

	public $slug       = 'nmdivi_blurb';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://www.bdsoftcreation.com',
		'author'     => 'Nishan M',
		'author_uri' => 'https://www.bdsoftcreation.com',
	);

	public function init()
	{
		$this->name = esc_html__('NM Blurb', 'nm_divi');

		// icon
		$this->icon = "Icon";

		// Main class


		// Modal Toggle
		$this->settings_modal_toggles = [
			'general' => [
				'toggles' => [
					'nm_title' => esc_html__('Title', 'nm_divi'),
					'nm_content' => esc_html__('Content', 'nm_divi'),
					'nm_img' => esc_html__('Image', 'nm_divi'),
					'nm_button' => esc_html__('Button', 'nm_divi')
				]
			],

			'advanced' => [
				'toggles' => [
					'nm_title' => esc_html__('Title', 'nm_divi'),
					'nm_content' => esc_html__('Content', 'nm_divi'),
					'nm_image' => esc_html__('Image', 'nm_divi'),
					'nm_button' => esc_html__('Button', 'nm_divi')
				]
			]
		];
	}

	///////////// Get advance filed config

	public function get_advanced_fields_config()
	{
		$advanced_fields = array();

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

		// $advanced_fields['background'] = array(
		// 	'has_background_color_toggle'   => false, // default. Warning: to be deprecated
		// 	'use_background_color'          => true, // default
		// 	'use_background_color_gradient' => true, // default
		// 	'use_background_image'          => true, // default
		// 	'use_background_video'          => true, // default
		// );

		// $advanced_fields['background'] = array(
		// 	'nm_title' => array(
		// 		'use_background_color'          => true,
		// 	)
		// );

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

		// $advanced_fields['background'] = array(
		// 	'nm_title_bg' => array(
		// 		'css'      => array(
		// 			'main' => "%%order_class%% .featured-box-readmore",
		// 			'hover' => "%%order_class%% .featured-box-readmore:hover",
		// 			'important' => 'all',
		// 		),
		// 	)
		// );

		$advanced_fields['margin_padding'] = array(
			'css'   => array(
				'important' => 'all'
			)
		);

		// $advanced_fields['image'] = array(
		// 	'label'         => esc_html__('Image', 'nm_divi'),
		// 	'toggle_slug'   => 'nm_image',
		// 	'tab_slug'        => 'advanced',
		// 	'css' => array(
		// 		'main' => array(
		// 			'%%order_class%% image-mask img',
		// 		)
		// 	),
		// );

		return $advanced_fields;
	}

	////////////////// Get all fields

	public function get_fields()
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
				'type'            => 'color',
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


		return array_merge($title, $content, $image, $button);
	}


	public function get_custom_css_fields_config()
	{

		// $title_bg = $this->props['nm_title_bg'];
		// $content_bg = $this->props['nm_content_bg'];

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
	public function nm_render_title()
	{
		return sprintf(
			'<h3 className="featured-box-title">
				<span>%1$s</span>
			</h3>',
			esc_html($this->props['nm_title'])
		);
	}
	public function nm_render_content()
	{
		return sprintf(
			'<div className="featured-box-text">
				%1$s
			</div>',
			esc_html($this->props['nm_content'])
		);
	}
	public function nm_render_button()
	{
		$btn_inline_block = $this->props['btn_inline_block'] === true ? 'display-inline-block' : '';

		// Render button
		$button = $this->render_button(array(
			'button_text'      => $this->props['nm_btn'],
			'button_url'       => $this->props['nm_btn_url'],
			'url_new_window'   => $this->props['nm_btn_url_new_window'],
			'button_classname'    => array('featured-box-readmore', $btn_inline_block),
		));

		return sprintf(
			'<div className="featured-box-button">
				%1$s
			</div>',
			$button
		);
	}


	///////////////////Render

	public function render($attrs, $content = null, $render_slug)
	{
		$this->render_css($render_slug);

		// ET_Builder_Element::set_style( $render_slug, array(
		// 	'selector'    => '%%order_class%% .featured-box-title',
		// 	'declaration' => sprintf(
		// 		'background-color: %1$s !important;',
		// 		esc_html($this->props['nm_title_bg'])
		// 	),
		// ) );

		// echo '<pre>';
		// print_r($this->props['nm_title_bg']);
		// exit;

		$output = sprintf(
			'<div class="featured-box featured-box-default">
				%1$s
				<div className="featured-box-content">
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

		return $output;
	}

	public function render_css($render_slug)
	{


		$title_bg = $this->props['nm_title_bg'];
		$content_bg = $this->props['nm_content_bg'];


		echo '<pre>';
		print_r($title_bg);
		// exit;

		if ('' !== $title_bg) {

			$test =  sprintf(
				'background-color: %1$s !important;',
				esc_html($title_bg)
			);

			print_r($test);

			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-title',
				'declaration' => sprintf(
					'background-color: %1$s !important;',
					esc_html($title_bg)
				),
			));
		}

		if (!empty($content_bg)) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-content',
				'declaration' => sprintf(
					'background-color: %1$s !important;',
					esc_html($content_bg)
				),
			));
		}
	}
}

new NMDIVI_BLURB;
