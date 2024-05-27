<?php
class Theme_Approach_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Theme_Approach_Widget';
	}

	public function get_title() {
		return esc_html__( 'Approach Section', 'ts_story_theme' );
	}

	public function get_icon() {
		return 'eicon-elementor';
	}

	public function get_categories() {
		return [ 'theme-widget-category' ];
	}

	public function get_keywords() {
		return [ 'Theme', 'Approach Section' ];
	}

	protected function register_controls() {
		
		$this->start_controls_section(
			'approach_content',
			[
				'label' => esc_html__( 'Approach Section Content', 'pubhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'approach_content_title',
			[
				'label' => esc_html__( 'Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'approach_content_signature',
			[
				'label' => esc_html__( 'Signature', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'approach_content_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'approach_content_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'approach_content_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'approach_list_title',
			[
				'label' => esc_html__( 'Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			],
		);
		$repeater->add_control(
			'approach_list_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
			],
		);
		$repeater->add_control(
			'approach_animation_time',
			[
				'label' => esc_html__( 'Animation Time', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			],
		);
		$this->add_control(
			'approach_list',
			[
				'label' => esc_html__( 'Process List', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'approach_list_title' => 'Authenticity Over Hype',
					],
				],
				'title_field' => '{{{ approach_list_title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$approach_content_title = $settings['approach_content_title'];
		$approach_content_signature = $settings['approach_content_signature'];
		$approach_content_sub_title = $settings['approach_content_sub_title'];
		$approach_content_btn_text = $settings['approach_content_btn_text'];
		$approach_content_btn_link = $settings['approach_content_btn_link'];

		?>

		<section class="bg-light background-overlay-dark rounded-top py-5">
			<div class="container pt-lg-5">
				<div class="row align-items-center">
					<div class="col-xl-4 mb-5 mb-xl-0">
						<h2 class="display-3 text-white font-extrabold text-signature mb-4">
							<?php echo $approach_content_title;?>
							<span class="signature opacity-01"><?php echo $approach_content_signature;?></span>
						</h2>
						<p class="text-white mb-4 opacity-75"><?php echo $approach_content_sub_title;?></p>
						<div class="d-flex">
							<a href="<?php echo $approach_content_btn_link;?>" class="btn btn-outline-grad btn-arrow btn-arrow-bordered"><?php echo $approach_content_btn_text;?></a>
						</div>
					</div>
					<div class="col-xl-6 offset-xl-2">
						<div class="row w-100">
							<div class="col-sm-6 mt-5">
								<?php 
									$approach_list = $settings['approach_list'];
									
									if( $approach_list ) {
										foreach(array_slice($approach_list, 0, 2) as $approach_list_item  ) {

											$approach_list_title = $approach_list_item['approach_list_title'];
											$approach_list_sub_title = $approach_list_item['approach_list_sub_title'];
											$approach_animation_time = $approach_list_item['approach_animation_time'];
											?>
											<div class="card border-0 card-fold mb-4" data-aos="slide-up" data-aos-duration="<?php echo $approach_animation_time;?>">
												<h4 class="font-bold mb-3">
													<?php echo $approach_list_title;?>
												</h4>
												<div class="opacity-75 mb-4">
													<p><?php echo $approach_list_sub_title;?></p>
												</div>
											</div>
											<?php
										}
									}
								?>
							</div>
							<div class="col-sm-6">
								<?php 
									$approach_list = $settings['approach_list'];
									
									if( $approach_list ) {
										foreach(array_slice($approach_list, 2, 2) as $approach_list_item  ) {

											$approach_list_title = $approach_list_item['approach_list_title'];
											$approach_list_sub_title = $approach_list_item['approach_list_sub_title'];
											$approach_animation_time = $approach_list_item['approach_animation_time'];
											?>
											<div class="card border-0 card-fold mb-4" data-aos="slide-up" data-aos-duration="<?php echo $approach_animation_time;?>">
												<h4 class="font-bold mb-3">
													<?php echo $approach_list_title;?>
												</h4>
												<div class="opacity-75 mb-4">
													<p><?php echo $approach_list_sub_title;?></p>
												</div>
											</div>
											<?php
										}
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php

	}
}