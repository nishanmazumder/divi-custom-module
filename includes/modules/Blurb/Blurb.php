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
		$this->name = esc_html__('NM-Blurb', 'nm_divi');

		// icon
		$this->icon = "Icon";

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
					'alignment'   => "%%order_class%% .featured-box-button",
					'hover' => "%%order_class%% .featured-box-readmore:hover",
					'important' => 'all',
				)
			),
		);

		$advanced_fields['button']['nm_button'] = array(
			'label'          => esc_html__( 'Button', 'addons-for-divi' ),
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
		// 	'nm_button' => array(
		// 		'label'         => esc_html__('Button Background', 'nm_divi'),
		// 		'toggle_slug'   => 'nm_button',
		// 		'tab_slug'        => 'advanced',
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



	public function get_fields()
	{
		return array(
			'nm_title' => array(
				'label'           => esc_html__('Title', 'nm_divi'),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__('', 'nm_divi'),
				'toggle_slug'     => 'nm_title',
			),
			'nm_content' => array(
				'label'           => esc_html__('Content', 'nm_divi'),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__('', 'nm_divi'),
				'toggle_slug'     => 'nm_content',
			),
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
			'nm_btn' => array(
				'label'           => esc_html__('Button Label', 'nm_divi'),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__('', 'nm_divi'),
				'toggle_slug'     => 'nm_btn',
			),
			'nm_btn_url' => array(
				'label'           => esc_html__('Button Link', 'nm_divi'),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__('', 'nm_divi'),
				'toggle_slug'     => 'nm_btn',
			),
			'nm_btn_url_new_window' => array(
				'default'         => 'off',
				'default_on_front' => true,
				'label'           => esc_html__('Url Open', 'dicm-divi-custom-modules'),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__('In The Same Window', 'dicm-divi-custom-modules'),
					'on'  => esc_html__('In The New Tab', 'dicm-divi-custom-modules'),
				),
				'toggle_slug'     => 'nm_btn',
				'description'     => esc_html__('', 'dicm-divi-custom-modules'),
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
			$this->props['nm_img']
		);
	}
	public function nm_render_tile()
	{
		return sprintf(
			'<h3 className="featured-box-title">
				<span>%1$s</span>
			</h3>',
			$this->props['nm_title']
		);
	}
	public function nm_render_content()
	{
		return sprintf(
			'<div className="featured-box-text">
				%1$s
			</div>',
			$this->props['content']
		);
	}
	public function nm_render_button()
	{
		$btn_inline_block = $this->prop['btn_inline_block'] === true ? 'display-inline-block' : '';

		// Render button
		$button = $this->render_button(array(
			'button_text'      => $this->props['button_text'],
			'button_url'       => $this->props['button_url'],
			'url_new_window'   => $this->props['button_url_new_window'],
			'button_classname'    => array('featured-box-readmore', $btn_inline_block),
		));

		return sprintf(
			'<div className="featured-box-button">
				%1$s
			</div>',
			$button
		);
	}

	public function render($attrs, $content = null, $render_slug)
	{
		$output = sprintf(
			'<div class="test featured-box featured-box-default">
				%1$s
				<div className="featured-box-content">
					%2$s
					%3$s
					%4$s
			  	</div>
		  	</div>',
			$this->nm_render_image(),
			$this->nm_render_tile(),
			$this->nm_render_content(),
			$this->nm_render_button()
		);

		return $output;
	}
}

new NM_BLURB;
