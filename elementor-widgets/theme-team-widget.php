<?php
class Theme_Team_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Theme_Team_Widget';
	}

	public function get_title() {
		return esc_html__( 'Team Section', 'ts_story_theme' );
	}

	public function get_icon() {
		return 'eicon-elementor';
	}

	public function get_categories() {
		return [ 'theme-widget-category' ];
	}

	public function get_keywords() {
		return [ 'Theme', 'Team Section' ];
	}

	protected function register_controls() {
		
		$this->start_controls_section(
			'team_content',
			[
				'label' => esc_html__( 'Team Section Content', 'pubhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
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
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'team_member_name',
			[
				'label' => esc_html__( 'Name', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			],
		);
		$repeater->add_control(
			'team_member_designation',
			[
				'label' => esc_html__( 'Designation', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			],
		);
		$repeater->add_control(
			'team_member_info',
			[
				'label' => esc_html__( 'Info', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
			],
		);
		$repeater->add_control(
			'team_member_image',
			[
				'label' => esc_html__( 'Image', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			],
		);
		$this->add_control(
			'team_member_list',
			[
				'label' => esc_html__( 'Process List', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'team_member_name' => 'Hanna Shanar',
					],
				],
				'title_field' => '{{{ team_member_name }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$team_content_title = $settings['team_content_title'];
		$team_content_signature = $settings['team_content_signature'];

		?>

		<section class="bg-light py-5" id="section_2">
			<div class="container pt-lg-5">
				<h2 class="display-3 font-extrabold text-signature mb-4">
					<?php echo $team_content_title;?>
					<span class="signature text-white opacity-100"><?php echo $team_content_signature;?></span>
				</h2>
			</div>
			<div class="processes-container">
				<?php 
					$team_member_list = $settings['team_member_list'];
					
					if( $team_member_list ) {
						$i = 1;
						foreach($team_member_list as $team_member  ) {
							$i++;

							$team_member_name = $team_member['team_member_name'];
							$team_member_designation = $team_member['team_member_designation'];
							$team_member_info = $team_member['team_member_info'];
							$team_member_image = esc_url($team_member['team_member_image']['url']);
							?>
							<div class="process-section sticky-section">
								<div class="container py-5 pb-lg-0">
									<div class="row py-lg-5">
										<div class="col-xl-7">
											<div class="row h-100">
												<div class="col-lg-10">
													<div class="process-icon mb-4">
														<div class="icon-container"></div>
													</div>
													<h2 class="font-bold mb-4"><?php echo $team_member_name;?><span class="text-grad">.</span></h2>
													<div class="text-body">
														<h4><?php echo $team_member_designation;?></h4>
														<p>
															<?php echo $team_member_info;?>
														</p>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-5">
											<div class="card border-0 card-fold grad-fold-down mb-4 p-0" style="overflow:hidden">
												<img src="<?php echo $team_member_image;?>" alt="team">
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
		</section>


		<?php

	}
}