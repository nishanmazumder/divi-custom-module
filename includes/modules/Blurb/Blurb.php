<?php

class NM_BLURB extends ET_Builder_Module
{

	public $slug       = 'nm_divi_blurb';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://www.bdsoftcreation.com',
		'author'     => 'Nishan M',
		'author_uri' => 'https://www.bdsoftcreation.com',
	);

	public function init()
	{
		$this->name = esc_html__('NM-Blurb', 'nmdivi-divi-custom-mod');

		// icon
		$this->icon = "Icon";

		// Modal Toggle
		$this->settings_modal_toggles = [
			'general' => [
				'toggles' => [
					'title' => esc_html__('Title', 'nmdivi-divi-custom-mod'),
					'content' => esc_html__('Content', 'nmdivi-divi-custom-mod'),
					'image' => esc_html__('Image', 'nmdivi-divi-custom-mod'),
					'button' => esc_html__('Button', 'nmdivi-divi-custom-mod')
				]
			],

			'advanced' => [
				'toggles' => [
					'title' => esc_html__('Title', 'nmdivi-divi-custom-mod'),
					'content' => esc_html__('Content', 'nmdivi-divi-custom-mod'),
					'image' => esc_html__('Image', 'nmdivi-divi-custom-mod'),
					'button' => esc_html__('Button', 'nmdivi-divi-custom-mod')
				]
			]
		];
	}

	public function get_advanced_fields_config()
	{
		$advanced_fields = array();

		$advanced_fields['fonts'] = array(
			'title'   => array(
				'label'         => esc_html__('Title', 'nmdivi-divi-custom-mod'),
				'toggle_slug'   => 'title',
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

			'content'   => array(
                'label'         => esc_html__('Content', 'divi_flash'),
                'toggle_slug'   => 'content',
                'sub_toggle'  => 'body',
                'line_height' => array(
                    'default' => '1em',
                ),
                'font_size' => array(
                    'default' => '14px',
                ),
                'css'      => array(
                    'main' => "%%order_class%% .featured-box-text",
                    'hover' => "%%order_class%% .featured-box-text",
                    'important' => 'all',
                ),
            ),
		);

		return $advanced_fields;
	}



	public function get_fields()
	{
		return array(
			'nm_title' => array(
				'label'           => esc_html__('Title', 'nmdivi-divi-custom-mod'),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__('', 'nmdivi-divi-custom-mod'),
				'toggle_slug'     => 'content',
			),
			'nm_content' => array(
				'label'           => esc_html__('Content', 'nmdivi-divi-custom-mod'),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__('', 'nmdivi-divi-custom-mod'),
				'toggle_slug'     => 'content',
			),
			'nm_img' => array(
				'label'           => esc_html__('Image', 'nmdivi-divi-custom-mod'),
				'type'            => 'upload',
				'upload_button_text' => esc_attr__('Upload an image', 'et_builder'),
				'choose_text'        => esc_attr__('Choose an Image', 'et_builder'),
				'update_text'        => esc_attr__('Set As Image', 'et_builder'),
				'option_category' => 'basic_option',
				'description'     => esc_html__('', 'nmdivi-divi-custom-mod'),
				'toggle_slug'     => 'image',
			),
			'nm_btn' => array(
				'label'           => esc_html__('Button Label', 'nmdivi-divi-custom-mod'),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__('', 'nmdivi-divi-custom-mod'),
				'toggle_slug'     => 'button',
			),
			'nm_btn_url' => array(
				'label'           => esc_html__('Button Link', 'nmdivi-divi-custom-mod'),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__('', 'nmdivi-divi-custom-mod'),
				'toggle_slug'     => 'button',
			),
			'button_url_new_window' => array(
				'default'         => 'off',
				'default_on_front' => true,
				'label'           => esc_html__('Url Mode', 'dicm-divi-custom-modules'),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__('In The Same Window', 'dicm-divi-custom-modules'),
					'on'  => esc_html__('In The New Tab', 'dicm-divi-custom-modules'),
				),
				'toggle_slug'     => 'button',
				'description'     => esc_html__('', 'dicm-divi-custom-modules'),
			),
		);
	}

	public function render($attrs, $content = null, $render_slug)
	{


		// Content
		$title = $this->props['nm_title'];
		$content = $this->props['content'];

		//Image
		$img = $this->props['nm_img'];

		//Button
		$btn_txt = $this->props['nm_btn'];
		$btn_url = $this->props['nm_btn_url'];

		// $button = $this->render_button([
		// 	'button_text'      => $btn_txt,
		// 	'button_url'       => $btn_url,
		// ]);

		$output = sprintf(
			'        <div class="test featured-box featured-box-default">
			<div class="featured-box-image">
			  <div class="image-mask">
				<img src="%3$s" alt="Tree Plantation System" />
			  </div>
			</div>
			<div class="featured-box-content">
			  <h3 class="featured-box-title">
				<span>%1$s</span>
			  </h3>
			  <div class="featured-box-text">%2$s</div>
			  <div class="featured-box-button">
				<a class="featured-box-readmore display-inline-block" href="%4$s">
				%5$s
				</a>
			  </div>
			</div>
		  </div>',
			esc_html__($title),
			esc_html__($content),
			$img,
			esc_url($btn_url),
			esc_html__($btn_txt)
		);

		return $output;
	}
}

new NM_BLURB;
