<?php
class Theme_Cta_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Theme_Cta_Widget';
	}

	public function get_title() {
		return esc_html__( 'Call To action', 'ts_story_theme' );
	}

	public function get_icon() {
		return 'eicon-elementor';
	}

	public function get_categories() {
		return [ 'theme-widget-category' ];
	}

	public function get_keywords() {
		return [ 'Theme', 'Call To action' ];
	}

	protected function register_controls() {
		//================ footer bottom menu
		$this->start_controls_section(
			'cta_content',
			[
				'label' => esc_html__( 'CTA Content', 'pubhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'cta_content_title',
			[
				'label' => esc_html__( 'CTA Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'cta_content_sub_title',
			[
				'label' => esc_html__( 'CTA Sub Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'cta_button_text',
			[
				'label' => esc_html__( 'CTA Button Text', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'cta_button_link',
			[
				'label' => esc_html__( 'CTA Button Link', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'cta_bg_img',
			[
				'label' => esc_html__( 'CTA Background Image', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$cta_content_title = $settings['cta_content_title'];
		$cta_content_sub_title = $settings['cta_content_sub_title'];
		$cta_button_text = $settings['cta_button_text'];
		$cta_button_link = $settings['cta_button_link'];
		$cta_bg_img = esc_url($settings['cta_bg_img']['url']);
		
		?>

		<section class="bg-light lets-talk">
			<div class="container">
				<div class="bg-fade rounded-4 p-4 p-md-5 position-relative overflow-hidden isolation">
					<div class="px-lg-5">
						<h2 class="display-1 text-white font-extrabold text-signature mb-0" data-aos="fade-in">
							<?php echo $cta_content_title?>
							<span class="signature opacity-01"><?php echo $cta_content_title?></span>
						</h2>
						<p class="text-white h4 mb-5" data-aos="fade-in"><?php echo $cta_content_sub_title?></p>
						<div class="d-flex" data-aos="zoom-out">
							<?php 
								if(!empty($cta_button_text)) {
									echo '
									<a class="btn btn-lg btn-white btn-arrow btn-arrow-bordered btn-send" href="'.$cta_button_link.'">
										<span>' . $cta_button_text . '</span>
									</a>
									';
								}
							?>
						</div>
						<?php
							if(!empty($cta_bg_img)) {
								echo '<img src="'.$cta_bg_img.'" alt="Logo" class="lets-talk-logo" />';
							}
						?>
					</div>
				</div>
			</div>
		</section>

		<?php

	}
}