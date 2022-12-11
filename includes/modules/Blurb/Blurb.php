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
					'nm_img' => esc_html__('Image', 'nm_divi'),
					'nm_content' => esc_html__('Content', 'nm_divi'),
					'nm_badge' => esc_html__('Badge', 'nm_divi'),
					'nm_button' => esc_html__('Button', 'nm_divi')
				]
			],

			// Advanced
			'advanced' => [
				'toggles' => [
					'nm_box' => esc_html__('Content wrapper', 'nm_divi'),
					'nm_title' => esc_html__('Title', 'nm_divi'),
					'nm_sub_title' => esc_html__('Sub Title', 'nm_divi'),
					'nm_content' => esc_html__('Content', 'nm_divi'),
					'nm_image' => esc_html__('Image', 'nm_divi'),
					'nm_button' => esc_html__('Button', 'nm_divi'),
					'nm_badge' => esc_html__('Badge', 'nm_divi'),
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
			// 'nm_content_wrapper_css' => array(
			// 	'label'    => esc_html__('Content Wrapper', 'nm_divi'),
			// 	'selector' => '%%order_class%% .featured-box-content span',
			// ),
			'nm_badge_css' => array(
				'label'    => esc_html__('Badge', 'nm_divi'),
				'selector' => '%%order_class%% .featured-box-badge',
			),
			'nm_title_css' => array(
				'label'    => esc_html__('Title', 'nm_divi'),
				'selector' => '%%order_class%% .featured-box-title span',
			),
			'nm_subtitle_css' => array(
				'label'    => esc_html__('Sub Title', 'nm_divi'),
				'selector' => '%%order_class%% .featured-box-subtitle',
			),
			'nm_content_css' => array(
				'label'    => esc_html__('Content', 'nm_divi'),
				'selector' => '%%order_class%% .featured-box-text p',
			),
			'nm_img_css' => array(
				'label'    => esc_html__('Image', 'nm_divi'),
				'selector' => '%%order_class%% .featured-box-image img',
			),
			'nm_btn_css' => array(
				'label'    => esc_html__('Button', 'nm_divi'),
				'selector' => '%%order_class%% .featured-box-button a',
			)
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
					%5$s
					%6$s
			  	</div>
		  	</div>',
			$this->nm_render_image(),
			$this->nm_render_badge(),
			$this->nm_render_title(),
			$this->nm_render_subtitle(),
			$this->nm_render_content(),
			$this->nm_render_button()
		);

		// Return render
		return $output;
	}

	// Render Css
	public function render_css($render_slug)
	{

		///////////////////////
		///// Image ///////////
		///////////////////////

		$img_width = $this->props['nm_img_width'];
		$img_align = $this->props['nm_img_align'];
		$image_bg = $this->props['nm_img_bg'];
		$image_space = $this->props['nm_img_space'];
		$image_margin = $this->props['nm_img_margin'];

		if ('' !== $img_width) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-image img',
				'declaration' => sprintf(
					'width: %1$s;',
					$img_width
				),
			));

			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-image',
				'declaration' => sprintf(
					'text-align: %1$s;',
					$img_align
				),
			));
		}

		if ('' !== $image_bg) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-image',
				'declaration' => sprintf(
					'background-color: %1$s;',
					$image_bg
				),
			));
		}

		// hover
		if (isset($this->props['nm_img_bg__hover'])) {
			if ('' !== $this->props['nm_img_bg__hover']) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => '%%order_class%% .featured-box-image:hover',
					'declaration' => sprintf(
						'background-color: %1$s;',
						$this->props['nm_img_bg__hover']
					),
				));
			}
		}

		// padding

		if ('' !== $image_space) {
			list($img_box_top_space, $img_box_right_space, $img_box_bottom_space, $img_box_left_space) = $this->get_custom_space($image_space);

			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-image',
				'declaration' => sprintf(
					'padding: %1$s %2$s %3$s %4$s;',
					$img_box_top_space,
					$img_box_right_space,
					$img_box_bottom_space,
					$img_box_left_space
				),
			));
		}

		// padding hover
		if (isset($this->props['nm_img_space__hover'])) {
			$image_space_hover = $this->props['nm_img_space__hover'];
			list($img_box_top_hover, $img_box_right_hover, $img_box_bottom_hover, $img_box_left_hover) = $this->get_custom_space($image_space_hover);

			if ('' !== $image_space_hover) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => '%%order_class%% .featured-box-image:hover',
					'declaration' => sprintf(
						'padding: %1$s %2$s %3$s %4$s;',
						$img_box_top_hover,
						$img_box_right_hover,
						$img_box_bottom_hover,
						$img_box_left_hover
					),
				));
			}
		}

		// margin

		if ('' !== $image_margin) {
			list($img_box_top_margin, $img_box_right_margin, $img_box_bottom_margin, $img_box_left_margin) = $this->get_custom_space($image_margin);
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-image',
				'declaration' => sprintf(
					'margin: %1$s %2$s %3$s %4$s;',
					$img_box_top_margin,
					$img_box_right_margin,
					$img_box_bottom_margin,
					$img_box_left_margin
				),
			));
		}

		// margin hover
		if (isset($this->props['nm_img_margin__hover'])) {
			$image_margin_hover = $this->props['nm_img_margin__hover'];
			list($img_box_top_margin_hover, $img_box_right_margin_hover, $img_box_bottom_margin_hover, $img_box_left_margin_hover) = $this->get_custom_space($image_margin_hover);

			if ('' !== $image_margin_hover) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => '%%order_class%% .featured-box-image:hover',
					'declaration' => sprintf(
						'margin: %1$s %2$s %3$s %4$s;',
						$img_box_top_margin_hover,
						$img_box_right_margin_hover,
						$img_box_bottom_margin_hover,
						$img_box_left_margin_hover
					),
				));
			}
		}

		///////////////////////
		///// Content Box /////
		///////////////////////

		$content_box_position_active = $this->props['nm_content_box_overlap'];
		$content_box_width = $this->props['nm_content_box_width'];
		$content_box_bg = $this->props['nm_content_box_bg'];
		$content_box_space = $this->props['nm_content_box_space'];
		$content_box_margin = $this->props['nm_content_box_space_margin'];
		$content_box_move_top_bottom = $this->props['nm_content_box_move_top_bottom'];
		$content_box_move_left_right = $this->props['nm_content_box_move_left_right'];

		if ('' !== $content_box_bg) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-content',
				'declaration' => sprintf(
					'background-color: %1$s;',
					$content_box_bg
				),
			));
		}

		// padding
		if ('' !== $content_box_space) {
			list($content_box_top_space, $content_box_right_space, $content_box_bottom_space, $content_box_left_space) = $this->get_custom_space($content_box_space);

			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-content',
				'declaration' => sprintf(
					'padding: %1$s %2$s %3$s %4$s;',
					$content_box_top_space,
					$content_box_right_space,
					$content_box_bottom_space,
					$content_box_left_space
				),
			));
		}

		//margin

		if ('' !== $content_box_margin) {
			list($content_box_top_margin, $content_box_right_margin, $content_box_bottom_margin, $content_box_left_margin) = $this->get_custom_space($content_box_margin);

			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-content',
				'declaration' => sprintf(
					'margin: %1$s %2$s %3$s %4$s !important;',
					$content_box_top_margin,
					$content_box_right_margin,
					$content_box_bottom_margin,
					$content_box_left_margin
				),
			));
		}

		// width
		if ('' !== $content_box_width) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-content',
				'declaration' => sprintf(
					'max-width: %1$s;',
					$content_box_width
				),
			));

			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-content',
				'declaration' => 'margin: auto;',
			));
		}

		// height
		// if ('' !== $content_box_height) {
		// 	ET_Builder_Element::set_style($render_slug, array(
		// 		'selector'    => '%%order_class%% .featured-box-content',
		// 		'declaration' => sprintf(
		// 			'max-height: %1$s;',
		// 			$content_box_height
		// 		),
		// 	));

		// 	// ET_Builder_Element::set_style($render_slug, array(
		// 	// 	'selector'    => '%%order_class%% .featured-box-content',
		// 	// 	'declaration' => 'position: absolute;',
		// 	// ));
		// }

		// position
		if ('on' === $content_box_position_active) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-content',
				'declaration' => 'position: absolute; top: 20%;'
			));

			// Top/Bottom
			if ('' !== $content_box_move_top_bottom) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => '%%order_class%% .featured-box-content',
					'declaration' => sprintf(
						'top: %1$s;',
						$content_box_move_top_bottom
					),
				));
			}


			// Left/Right
			if ('' !== $content_box_move_left_right) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => '%%order_class%% .featured-box-content',
					'declaration' => sprintf(
						'left: %1$s;',
						$content_box_move_left_right
					),
				));
			}

			// Right
			// if ('' !== $content_box_move_right) {
			// 	ET_Builder_Element::set_style($render_slug, array(
			// 		'selector'    => '%%order_class%% .featured-box-content',
			// 		'declaration' => sprintf(
			// 			'right: %1$s;',
			// 			$content_box_move_right
			// 		),
			// 	));
			// }
		}


		///////////////////////
		///// Badge ///////////
		///////////////////////

		$badge_enable = $this->props['nm_badge_enable'];
		$badge_bg = $this->props['nm_badge_bg'];
		$badge_icon_enable = $this->props['nm_badge_icon_active'];
		$badge_icon = $this->props['nm_badge_icon'];
		$badge_icon_size = $this->props['nm_badge_icon_size'];
		$badge_space = $this->props['nm_badge_space'];
		$badge_move_top_bottom = $this->props['nm_badge_move_top_bottom'];
		$badge_move_left_right = $this->props['nm_badge_move_left_right'];

		if ('on' === $badge_enable) {

			// Badge
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-badge',
				'declaration' => 'position: absolute; display: flex; background-color: #E09900; top: 45%; left: 90%; align-items: center;',
			));

			// Badge Icon
			if('on' === $badge_icon_enable){
				if('' !== $badge_icon && '' !== $badge_icon_size){
					ET_Builder_Element::set_style($render_slug, array(
						'selector'    => '%%order_class%% .featured-box-badge-icon',
						'declaration' => sprintf(
							'font-size: %1$s; margin-left: 5px;',
							$badge_icon_size
						),
					));
				}
			}else{
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => '%%order_class%% .featured-box-badge-icon',
					'declaration' => 'display: none;',
				));
			}

			// Top/Bottom
			if ('' !== $badge_move_top_bottom) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => '%%order_class%% .featured-box-badge',
					'declaration' => sprintf(
						'top: %1$s;',
						$badge_move_top_bottom
					),
				));
			}


			// Left/Right
			if ('' !== $badge_move_left_right) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => '%%order_class%% .featured-box-badge',
					'declaration' => sprintf(
						'left: %1$s;',
						$badge_move_left_right
					),
				));
			}
		} else {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-badge',
				'declaration' => 'display: none;',
			));
		}

		// padding
		if ('' !== $badge_space) {
			list($badge_top_space, $badge_right_space, $badge_bottom_space, $badge_left_space) = $this->get_custom_space($badge_space);

			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-badge',
				'declaration' => sprintf(
					'padding: %1$s %2$s %3$s %4$s;',
					$badge_top_space,
					$badge_right_space,
					$badge_bottom_space,
					$badge_left_space
				),
			));
		}

		if ('' !== $badge_bg) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-badge',
				'declaration' => sprintf(
					'background-color: %1$s;',
					$badge_bg
				),
			));
		}

		if (isset($this->props['nm_badge_bg__hover'])) {
			if ('' !== $this->props['nm_badge_bg__hover']) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => '%%order_class%% .featured-box-badge:hover',
					'declaration' => sprintf(
						'background-color: %1$s;',
						$this->props['nm_badge_bg__hover']
					),
				));
			}
		}

		// Badge Icon
		// if ('on' !== $badge_icon_enable) {

		// 	ET_Builder_Element::set_style($render_slug, array(
		// 		'selector'    => '%%order_class%% .featured-box-badge',
		// 		'declaration' => 'display: flex !important; align-items: center !important;'
		// 	));

		// }


		///////////////////////
		///// Title ///////////
		///////////////////////

		$title_bg = $this->props['nm_title_bg'];
		$title_space = $this->props['nm_title_space'];
		$title_margin = $this->props['nm_title_space_margin'];

		if ('' !== $title_bg) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-title',
				'declaration' => sprintf(
					'background-color: %1$s;',
					$title_bg
				),
			));
		}

		// hover bg
		if (isset($this->props['nm_title_bg__hover'])) {
			if ('' !== $this->props['nm_title_bg__hover']) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => '%%order_class%% .featured-box-title:hover',
					'declaration' => sprintf(
						'background-color: %1$s;',
						$this->props['nm_title_bg__hover']
					),
				));
			}
		}


		// padding

		if ('' !== $title_space) {
			list($title_top_space, $title_right_space, $title_bottom_space, $title_left_space) = $this->get_custom_space($title_space);

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

		if (isset($this->props['nm_title_space__hover'])) {
			$title_space_hover = $this->props['nm_title_space__hover'];
			list($title_top_space_hover, $title_right_space_hover, $title_bottom_space_hover, $title_left_space_hover) = $this->get_custom_space($title_space_hover);

			if ('' !== $title_space_hover) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => '%%order_class%% .featured-box-title:hover',
					'declaration' => sprintf(
						'padding: %1$s %2$s %3$s %4$s;',
						$title_top_space_hover,
						$title_right_space_hover,
						$title_bottom_space_hover,
						$title_left_space_hover
					),
				));
			}
		}



		if ('' !== $title_margin) {
			list($title_top_margin, $title_right_margin, $title_bottom_margin, $title_left_margin) = $this->get_custom_space($title_margin);

			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-title',
				'declaration' => sprintf(
					'margin: %1$s %2$s %3$s %4$s;',
					$title_top_margin,
					$title_right_margin,
					$title_bottom_margin,
					$title_left_margin
				),
			));
		}

		if (isset($this->props['nm_title_space_margin__hover'])) {
			$title_margin_hover = $this->props['nm_title_space_margin__hover'];
			list($title_top_margin_hover, $title_right_margin_hover, $title_bottom_margin_hover, $title_left_margin_hover) = $this->get_custom_space($title_margin_hover);

			if ('' !== $title_margin_hover) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => '%%order_class%% .featured-box-title:hover',
					'declaration' => sprintf(
						'margin: %1$s %2$s %3$s %4$s;',
						$title_top_margin_hover,
						$title_right_margin_hover,
						$title_bottom_margin_hover,
						$title_left_margin_hover
					),
				));
			}
		}



		///////////////////////
		///// Subtitle ////////
		///////////////////////

		$subtitle_active = $this->props['nm_subtitle_active'];
		$subtitle_bg = $this->props['nm_sub_title_bg'];
		$subtitle_space = $this->props['nm_sub_title_space'];
		$subtitle_margin = $this->props['nm_sub_title_margin'];

		if('on' !== $subtitle_active){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-subtitle',
				'declaration' => 'display: none;'
			));
		}

		if ('' !== $subtitle_bg) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-subtitle',
				'declaration' => sprintf(
					'background-color: %1$s;',
					$subtitle_bg
				),
			));
		}

		if (isset($this->props['nm_sub_title_bg__hover'])) {
			if ('' !== $this->props['nm_sub_title_bg__hover']) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => '%%order_class%% .featured-box-subtitle:hover',
					'declaration' => sprintf(
						'background-color: %1$s;',
						$this->props['nm_sub_title_bg__hover']
					),
				));
			}
		}


		if ('' !== $subtitle_space) {
			list($subtitle_top_space, $subtitle_right_space, $subtitle_bottom_space, $subtitle_left_space) = $this->get_custom_space($subtitle_space);

			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-subtitle',
				'declaration' => sprintf(
					'padding: %1$s %2$s %3$s %4$s;',
					$subtitle_top_space,
					$subtitle_right_space,
					$subtitle_bottom_space,
					$subtitle_left_space
				),
			));
		}

		// $subtitle_space_hover = $this->props['nm_sub_title_space__hover'];
		// $subtitle_margin_hover = $this->props['nm_sub_title_margin__hover'];


		if ('' !== $subtitle_margin) {
			list($subtitle_top_margin, $subtitle_right_margin, $subtitle_bottom_margin, $subtitle_left_margin) = $this->get_custom_space($subtitle_margin);

			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-subtitle',
				'declaration' => sprintf(
					'margin: %1$s %2$s %3$s %4$s;',
					$subtitle_top_margin,
					$subtitle_right_margin,
					$subtitle_bottom_margin,
					$subtitle_left_margin
				),
			));
		}

		///////////////////////
		///// Content /////////
		///////////////////////

		$content = $this->props['nm_content'];
		$content_bg = $this->props['nm_content_bg'];
		$content_space = $this->props['nm_content_space'];
		$content_margin = $this->props['nm_content_space_margin'];

		if ('' !== $content) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-text p',
				'declaration' => 'padding-bottom: 0px;',
			));
		}

		if ('' !== $content_bg) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-text',
				'declaration' => sprintf(
					'background-color: %1$s;',
					$content_bg
				),
			));
		}


		if (isset($this->props['nm_content_bg__hover'])) {
			if ('' !== $this->props['nm_content_bg__hover']) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => '%%order_class%% .featured-box-text:hover',
					'declaration' => sprintf(
						'background-color: %1$s;',
						$this->props['nm_content_bg__hover']
					),
				));
			}
		}


		if ('' !== $content_space) {
			list($content_top_space, $content_right_space, $content_bottom_space, $content_left_space) = $this->get_custom_space($content_space);

			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-text',
				'declaration' => sprintf(
					'padding: %1$s %2$s %3$s %4$s;',
					$content_top_space,
					$content_right_space,
					$content_bottom_space,
					$content_left_space
				),
			));
		}


		if ('' !== $content_margin) {
			list($content_top_margin, $content_right_margin, $content_bottom_margin, $content_left_margin) = $this->get_custom_space($content_margin);

			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-text',
				'declaration' => sprintf(
					'margin: %1$s %2$s %3$s %4$s;',
					$content_top_margin,
					$content_right_margin,
					$content_bottom_margin,
					$content_left_margin
				),
			));
		}

		///////////////////////
		///// Button /////////
		///////////////////////

		$button_bg = $this->props['nm_btn_bg'];
		$button_space = $this->props['nm_button_space'];
		$button_margin = $this->props['nm_button_space_margin'];

		if ('' !== $button_bg) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-button',
				'declaration' => sprintf(
					'background-color: %1$s;',
					$button_bg
				),
			));
		}

		if (isset($this->props['nm_btn_bg__hover'])) {
			if ('' !== $this->props['nm_btn_bg__hover']) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => '%%order_class%% .featured-box-button:hover',
					'declaration' => sprintf(
						'background-color: %1$s;',
						$this->props['nm_btn_bg__hover']
					),
				));
			}
		}


		if ('' !== $button_space) {
			list($button_top_space, $button_right_space, $button_bottom_space, $button_left_space) = $this->get_custom_space($button_space);

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


		if ('' !== $button_margin) {
			list($button_top_margin, $button_right_margin, $button_bottom_margin, $button_left_margin) = $this->get_custom_space($button_margin);

			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => '%%order_class%% .featured-box-button',
				'declaration' => sprintf(
					'margin: %1$s %2$s %3$s %4$s;',
					$button_top_margin,
					$button_right_margin,
					$button_bottom_margin,
					$button_left_margin
				),
			));
		}

		// self::set_style($this->slug, array(
		// 	'selector'    => '%%order_class%% .featured-box-title',
		// 	'declaration' => sprintf('background-color:%s;', $title_bg)
		// ));
	}



	public function get_transition_fields_css_props()
	{
		$fields = parent::get_transition_fields_css_props();

		// Background
		$image_bg = '%%order_class%% .featured-box-image';
		$title_bg = '%%order_class%% .featured-box-title';
		$subtitle_bg = '%%order_class%% .featured-box-title';
		$content_bg = '%%order_class%% .featured-box-text';
		$button_bg = '%%order_class%% .featured-box-button';

		// Margin/Padding

		$fields['nm_img_bg'] = array('background-color' => $image_bg);
		$fields['nm_title_bg'] = array('background-color' => $title_bg);
		$fields['nm_sub_title_bg'] = array('background-color' => $subtitle_bg);
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
					<img src="%1$s" alt="%2$s" />
				</div>
		  	</div>',
			esc_url($this->props['nm_img']),
			esc_html($this->props['nm_img_alt_text'])
		);
	}

	public function nm_render_badge()
	{

		if (isset($this->props['nm_badge_icon_active']) && '' !== $this->props['nm_badge_icon'])
			return sprintf(
				'<div class="featured-box-badge">%1$s<span class="et-pb-icon featured-box-badge-icon">%2$s</span></div>',
				esc_html($this->props['nm_badge']),
				esc_attr(et_pb_process_font_icon($this->props['nm_badge_icon']))
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

	// Subtitle block
	public function nm_render_subtitle()
	{
		return sprintf(
			'<h5 class="featured-box-subtitle">
				<span>%1$s</span>
			</h5>',
			esc_html($this->props['nm_sub_title'])
		);
	}

	// Content block
	public function nm_render_content()
	{
		return sprintf(
			'<div class="featured-box-text">
				%1$s
			</div>',
			$this->props['nm_content']
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
		// $btn_custom         = $this->props['custom_button'];
		// $btn_rel            = $this->props['button_rel'];
		$button_width = ("on" === $this->props['nm_btn_full_width']) ? "display-block" : "display-inline-block";

		// Render button
		$button = $this->render_button(array(
			'button_text'      => $btn_txt,
			'button_url'       => $btn_url,
			'url_new_window'   => $btn_target,
			// 'button_custom'    => $btn_custom,
			// 'button_rel'       => $btn_rel,
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
