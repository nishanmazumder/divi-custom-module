<?php

class NM_TEXT_BLOCK extends ET_Builder_Module {

	public $slug       = 'nm_divi_text_block';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://www.bdsoftcreation.com',
		'author'     => 'Nishan M',
		'author_uri' => 'https://www.bdsoftcreation.com',
	);

	public function init() {
		$this->name = esc_html__( 'NM-Text-Block', 'nm_divi' );
	}

	public function get_fields() {
		return array(
			'nm_title' => array(
				'label'           => esc_html__( 'Title', 'nm_divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'nm_divi' ),
				'toggle_slug'     => 'main_content',
			),
			'content' => array(
				'label'           => esc_html__( 'Content', 'nm_divi' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'nm_divi' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$title = sprintf( '<h1>%1$s</h1>', $this->props['nm_title'] );
		$content = sprintf( '<p>%1$s</p>', $this->props['content'] );

		return $title.$content;
	}
}

new NM_TEXT_BLOCK;
