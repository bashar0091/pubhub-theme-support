<?php
class Theme_Footer_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Theme_Footer_Widget';
	}

	public function get_title() {
		return esc_html__( 'Theme Footer', 'ts_story_theme' );
	}

	public function get_icon() {
		return 'eicon-elementor';
	}

	public function get_categories() {
		return [ 'theme-widget-category' ];
	}

	public function get_keywords() {
		return [ 'Theme', 'Footer' ];
	}

	protected function register_controls() {

//================ footer logo 
		$this->start_controls_section(
			'footer_content',
			[
				'label' => esc_html__( 'Footer Content', 'pubhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'footer_logo',
			[
				'label' => esc_html__( 'Footer Logo', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->end_controls_section();


//================ footer widget 1 
		$this->start_controls_section(
			'footer_widget_1',
			[
				'label' => esc_html__( 'Footer Widget 1', 'pubhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'widget_1_title',
			[
				'label' => esc_html__( 'Widget Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'footer_widget_1_list_name',
			[
				'label' => esc_html__( 'Label', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			],
		);
		$repeater->add_control(
			'footer_widget_1_list_link',
			[
				'label' => esc_html__( 'Link', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			],
		);
		$this->add_control(
			'footer_widget_1_repeater',
			[
				'label' => esc_html__( 'List Item', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'footer_widget_1_list_name' => 'About',
					],
				],
				'title_field' => '{{{ footer_widget_1_list_name }}}',
			]
		);

		$this->end_controls_section();


//================ footer widget 2
		$this->start_controls_section(
			'footer_widget_2',
			[
				'label' => esc_html__( 'Footer Widget 2', 'pubhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
				'label' => esc_html__( 'Footer Social', 'pubhub' ),
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



//================ footer bottom menu
		$this->start_controls_section(
			'footer_bottom_menu',
			[
				'label' => esc_html__( 'Footer bottom menu', 'pubhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'footer_bottom_menu_list_name',
			[
				'label' => esc_html__( 'Label', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			],
		);
		$repeater->add_control(
			'footer_bottom_menu_list_link',
			[
				'label' => esc_html__( 'Link', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			],
		);
		$this->add_control(
			'footer_bottom_menu_repeater',
			[
				'label' => esc_html__( 'List Item', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'footer_bottom_menu_list_name' => 'About',
					],
				],
				'title_field' => '{{{ footer_bottom_menu_list_name }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$footer_logo = esc_url($settings['footer_logo']['url']);
		
		?>

		<footer class="site-footer bg-dark text-white py-5">
			<div class="container pt-lg-5">
				<div class="row">
					<div class="col-md-5 pe-5 col-lg-6 col-xxl-7">
						<a href="<?php echo home_url();?>" class="footer-brand d-block mb-5 mb-lg-0">
							<img src="<?php echo $footer_logo;?>" alt class="img-fluid w-100" />
						</a>
					</div>
					<div class="col-md-7 col-lg-6 col-xxl-5">
						<div class="row">
							<div class="col-4 col-lg-6">
								<h4 class="text-white mb-4 mb-lg-5"><?php echo $settings['widget_1_title'];?></h4>
								<div class="menu-bottom-navigation-container">
									<ul id="footer-nav" class="footer-nav">
										<?php 
											$footer_widget_1_repeater = $settings['footer_widget_1_repeater'];

											if($footer_widget_1_repeater) {
												foreach($footer_widget_1_repeater as $footer_widget_1) {
													$footer_widget_1_list_name = $footer_widget_1['footer_widget_1_list_name'];
													$footer_widget_1_list_link = $footer_widget_1['footer_widget_1_list_link'];
													?>
													<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo home_url() . $footer_widget_1_list_link;?>"><?php echo $footer_widget_1_list_name;?></a></li>
													<?php
												}
											}
										?>
									</ul>
								</div>
							</div>
							<div class="col-6 col-lg-6">
								<h4 class="text-white mb-4 mb-lg-5"><?php echo $settings['widget_2_title'];?></h4>
								<ul class="footer-contact">
									<?php 
										$footer_widget_2_repeater = $settings['footer_widget_2_repeater'];

										if($footer_widget_2_repeater) {
											foreach($footer_widget_2_repeater as $footer_widget_2) {
												$footer_widget_2_list_name = $footer_widget_2['footer_widget_2_list_name'];
												$footer_widget_2_list_link = $footer_widget_2['footer_widget_2_list_link'];
												?>
												<li>
													<a href="<?php echo $footer_widget_2_list_link;?>">
														<?php \Elementor\Icons_Manager::render_icon( $footer_widget_2['footer_widget_2_list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
														<?php echo $footer_widget_2_list_name;?>
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
				<div class="row pt-4 pt-lg-5">
					<div class="col-md-6 col-lg-5 mb-5 mb-md-0">
						<ul class="social-handles justify-content-center justify-content-md-start">
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
					<div class="col-md-6 col-lg-7 ps-lg-5 d-flex flex-wrap align-items-center justify-content-between">
						<?php 
							$footer_bottom_menu_repeater = $settings['footer_bottom_menu_repeater'];

							if($footer_bottom_menu_repeater) {
								foreach($footer_bottom_menu_repeater as $footer_bottom_menu) {
									$footer_bottom_menu_list_name = $footer_bottom_menu['footer_bottom_menu_list_name'];
									$footer_bottom_menu_list_link = $footer_bottom_menu['footer_bottom_menu_list_link'];
									?>
									<a class="text-white font-small" href="<?php echo home_url() . $footer_bottom_menu_list_link; ?>"><?php echo $footer_bottom_menu_list_name; ?></a>
									<?php
								}
							}
						?>
					</div>
				</div>
			</div>
		</footer>

		<?php

	}
}