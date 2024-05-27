<?php
class Theme_Brand_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Theme_Brand_Widget';
	}

	public function get_title() {
		return esc_html__( 'Brand Section', 'ts_story_theme' );
	}

	public function get_icon() {
		return 'eicon-elementor';
	}

	public function get_categories() {
		return [ 'theme-widget-category' ];
	}

	public function get_keywords() {
		return [ 'Theme', 'Brand Section' ];
	}

	protected function register_controls() {
		
		$this->start_controls_section(
			'brand_content',
			[
				'label' => esc_html__( 'Brand Section Content', 'pubhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'brand_content_image',
			[
				'label' => esc_html__( 'Image', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			],
		);
		$this->add_control(
			'brand_slider',
			[
				'label' => esc_html__( 'Brand Sldier', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<section id="trusted_by" class="trusted_by overflow-hidden bg-light py-5">
			<div class="container-fluid py-lg-5">
				<div class="row ticker">
					
					<?php 
						$brand_slider = $settings['brand_slider'];
						
						if( $brand_slider ) {
							foreach($brand_slider as $brand_slider_item  ) {

								$brand_content_image = esc_url($brand_slider_item['brand_content_image']['url']);
								?>
								<div class="col-lg-3 col-md-4 col-6 text-center pe-5">
									<img src="<?php echo $brand_content_image;?>" alt="Men's Journal" class="img-fluid m-auto" />
								</div>
								<?php
							}
						}
					?>
					
				</div>
			</div>
		</section>

		<?php

	}
}