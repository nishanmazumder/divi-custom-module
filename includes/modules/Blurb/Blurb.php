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
					'content' => esc_html('Content', 'nmdivi-divi-custom-mod'),
					'image' => esc_html('Image', 'nmdivi-divi-custom-mod'),
					'button' => esc_html('Button', 'nmdivi-divi-custom-mod')
				]
			]
		];
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
				'upload_button_text' => esc_attr__( 'Upload an image', 'et_builder' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'et_builder' ),
				'update_text'        => esc_attr__( 'Set As Image', 'et_builder' ),
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
		);
	}

	public function render($attrs, $content = null, $render_slug)
	{
		$title = sprintf('<h1>%1$s</h1>', $this->props['nm_title']);
		$content = sprintf('<p>%1$s</p>', $this->props['content']);

		return $title . $content;
	}
}

new NM_BLURB;
