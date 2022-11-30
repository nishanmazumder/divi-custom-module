<?php

class NMDIVI_HelloWorld extends ET_Builder_Module {

	public $slug       = 'nmdivi_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://www.bdsoftcreation.com',
		'author'     => 'Nishan M',
		'author_uri' => 'https://www.bdsoftcreation.com',
	);

	public function init() {
		$this->name = esc_html__( 'Hello World', 'nmdivi-divi-custom-mod' );
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'nmdivi-divi-custom-mod' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'nmdivi-divi-custom-mod' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new NMDIVI_HelloWorld;
