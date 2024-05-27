<?php

add_filter( 'wpcf7_autop_or_not', '__return_false' );


class Theme_Contact_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Theme_Contact_Widget';
	}

	public function get_title() {
		return esc_html__( 'Theme Contact Section', 'ts_story_theme' );
	}

	public function get_icon() {
		return 'eicon-elementor';
	}

	public function get_categories() {
		return [ 'theme-widget-category' ];
	}

	public function get_keywords() {
		return [ 'Theme', 'Contact Section' ];
	}

	protected function register_controls() {

//================ footer widget 2

		$this->start_controls_section(
			'footer_widget_2',
			[
				'label' => esc_html__( 'Cotact Section', 'pubhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'contact_form_shortcode',
			[
				'label' => esc_html__( 'Contact Form Shortcode', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			],
		);

		$this->add_control(
			'team_content_title',
			[
				'label' => esc_html__( 'Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'team_content_signature',
			[
				'label' => esc_html__( 'Signature', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'widget_2_title',
			[
				'label' => esc_html__( 'Widget Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'footer_widget_2_list_icon',
			[
				'label' => esc_html__( 'Icon', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'label_block' => true,
			],
		);
		$repeater->add_control(
			'footer_widget_2_list_name',
			[
				'label' => esc_html__( 'Label', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			],
		);
		$repeater->add_control(
			'footer_widget_2_list_link',
			[
				'label' => esc_html__( 'Link', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			],
		);
		$this->add_control(
			'footer_widget_2_repeater',
			[
				'label' => esc_html__( 'List Item', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'footer_widget_2_list_name' => 'About',
					],
				],
				'title_field' => '{{{ footer_widget_2_list_name }}}',
			]
		);

		$this->end_controls_section();



//================ footer Social
		$this->start_controls_section(
			'footer_social',
			[
				'label' => esc_html__( 'Social', 'pubhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'footer_social_list_icon',
			[
				'label' => esc_html__( 'Icon', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'label_block' => true,
			],
		);
		$repeater->add_control(
			'footer_social_list_link',
			[
				'label' => esc_html__( 'link', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			],
		);
		$this->add_control(
			'footer_social_repeater',
			[
				'label' => esc_html__( 'List Item', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$widget_2_title = $settings['widget_2_title'];
		$team_content_title = $settings['team_content_title'];
		$team_content_signature = $settings['team_content_signature'];
		$contact_form_shortcode = $settings['contact_form_shortcode'];
		?>

		<section class="contact-us py-4 bg-light overflow-hidden" id="section_2">
			<div class="container py-5">
				<div class="row gutters-40">
					<div class="col-md-5 contact-info-wrap">
						<div class="my-lg-5">
							<h2 class="display-3 w-100 font-extrabold text-signature mb-5"><?php echo $team_content_title;?><span class="signature text-white opacity-100"><?php echo $team_content_signature;?></span></h2>
						</div>
						<div class="contact-info-inner">
							<div class="bg-dark p-4 br-2 p-lg-5 mb-4 contact-wrap overflow-hidden position-relative">
								<div class="contact-detail-wrap">
									<h4 class="text-white mb-4"><?php echo $widget_2_title;?></h4>
									<?php 
										$footer_widget_2_repeater = $settings['footer_widget_2_repeater'];

										if($footer_widget_2_repeater) {
											foreach($footer_widget_2_repeater as $footer_widget_2) {
												$footer_widget_2_list_name = $footer_widget_2['footer_widget_2_list_name'];
												$footer_widget_2_list_link = $footer_widget_2['footer_widget_2_list_link'];
												?>
												<div class="d-flex mb-1 align-items-center flex-nowrap contact-item">
													<?php \Elementor\Icons_Manager::render_icon( $footer_widget_2['footer_widget_2_list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
													<a href="<?php echo $footer_widget_2_list_link;?>" class="ms-2 d-block text-white font-light"><?php echo $footer_widget_2_list_name;?></a>
												</div>
												<?php
											}
										}
									?>

									<ul class="social-handles mt-4 justify-content-start">
										<?php 
											$footer_social_repeater = $settings['footer_social_repeater'];

											if($footer_social_repeater) {
												foreach($footer_social_repeater as $footer_social) {
													$footer_social_list_icon = $footer_social['footer_social_list_icon'];
													$footer_social_list_link = $footer_social['footer_social_list_link'];
													?>
													<li>
														<a target="_blank" href="<?php echo  $footer_social_list_link;?>">
															<?php \Elementor\Icons_Manager::render_icon( $footer_social['footer_social_list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
														</a>
													</li>
													<?php
												}
											}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 py-lg-5 my-lg-0 offset-md-1 contact-form-wrap">
						<?php echo $contact_form_shortcode;?>
					</div>
				</div>
			</div>
		</section>


		<?php

	}
}