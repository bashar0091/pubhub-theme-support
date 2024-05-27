<?php
class Theme_Process_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Theme_Process_Widget';
	}

	public function get_title() {
		return esc_html__( 'Process Section', 'ts_story_theme' );
	}

	public function get_icon() {
		return 'eicon-elementor';
	}

	public function get_categories() {
		return [ 'theme-widget-category' ];
	}

	public function get_keywords() {
		return [ 'Theme', 'Process Section' ];
	}

	protected function register_controls() {
		
		$this->start_controls_section(
			'process_content',
			[
				'label' => esc_html__( 'Award Section Content', 'pubhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'process_title',
			[
				'label' => esc_html__( 'Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'process_bg_img',
			[
				'label' => esc_html__( 'Background Image', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'process_list_icon',
			[
				'label' => esc_html__( 'Icon', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'label_block' => true,
			],
		);$repeater->add_control(
			'process_list_title',
			[
				'label' => esc_html__( 'Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			],
		);
		$repeater->add_control(
			'process_list_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
			],
		);
		$repeater->add_control(
			'process_animation_time',
			[
				'label' => esc_html__( 'Animation Time', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			],
		);
		$this->add_control(
			'process_list',
			[
				'label' => esc_html__( 'Process List', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'process_list_title' => 'Listen',
					],
				],
				'title_field' => '{{{ process_list_title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$process_title = $settings['process_title'];
		$process_bg_img = esc_url($settings['process_bg_img']['url']);

		?>

		<section class="our-process bg-dark py-5">
			<div class="container py-lg-5">
				<h2 class="display-3 text-white font-extrabold text-signature"><?php echo $process_title;?></h2>
			</div>
			<div class="container py-lg-5">
				<div class="py-4 py-lg-5 our-process-items" data-aos="process-line">
					<div class="row">

						<?php 
							$process_list = $settings['process_list'];
							
							if( $process_list ) {
								foreach($process_list as $process_list_item  ) {

									$process_list_title = $process_list_item['process_list_title'];
									$process_list_sub_title = $process_list_item['process_list_sub_title'];
									$process_animation_time = $process_list_item['process_animation_time'];
									?>
									<div class="col-lg-3 col-md-6 mb-4">
										<div class="process-item">
											<div class="process-item">
												<div class="icon-container" data-aos="zoom-in" data-aos-delay="<?php echo $process_animation_time;?>" data-aos-duration="800">
													<?php \Elementor\Icons_Manager::render_icon( $process_list_item['process_list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
												</div>
												<div class="content">
													<h2 class="text-white" data-aos="flip-down" data-aos-delay="<?php echo $process_animation_time;?>" data-aos-duration="1000"><?php echo $process_list_title;?> <span class="text-grad">.</span></h2>
													<div data-aos="fade-left" data-aos-delay="0" data-aos-duration="6000" class="text-white">
														<div class="opacity-75"><p><?php echo $process_list_sub_title;?></p></div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php
								}
							}
						?>

					</div>
				</div>
			</div>

			<?php 
				if(!empty($process_bg_img)) {
					echo '<img src="'.$process_bg_img.'" alt="Logo" class="our-process-logo" />';
				}
			?>
			
		</section>

		<?php

	}
}