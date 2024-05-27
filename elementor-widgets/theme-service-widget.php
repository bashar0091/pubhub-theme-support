<?php
class Theme_Service_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Theme_Service_Widget';
	}

	public function get_title() {
		return esc_html__( 'Service Section', 'ts_story_theme' );
	}

	public function get_icon() {
		return 'eicon-elementor';
	}

	public function get_categories() {
		return [ 'theme-widget-category' ];
	}

	public function get_keywords() {
		return [ 'Theme', 'Service Section' ];
	}

	protected function register_controls() {
		
		$this->start_controls_section(
			'award_content',
			[
				'label' => esc_html__( 'Award Section Content', 'pubhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'service_title',
			[
				'label' => esc_html__( 'Service Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'service_signature',
			[
				'label' => esc_html__( 'Service Signature', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'service_accordion_title',
			[
				'label' => esc_html__( 'Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			],
		);
		$repeater->add_control(
			'service_accordion_content',
			[
				'label' => esc_html__( 'Content', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label_block' => true,
			],
		);
		$this->add_control(
			'service_accordion_list',
			[
				'label' => esc_html__( 'Accordion List', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'service_accordion_title' => 'Digital & Print Placements',
					],
				],
				'title_field' => '{{{ service_accordion_title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$service_title = $settings['service_title'];
		$service_signature = $settings['service_signature'];

		?>

		<section class="py-5 bg-light">
			<div class="container py-lg-5">
				<h2 class="display-3 font-extrabold text-signature mb-5">
					<?php echo $service_title;?>
					<span class="signature text-white opacity-100"><?php echo $service_signature;?></span>
				</h2>
				<div class="accordion" id="accordionServices">
					<?php 
						$service_accordion_list = $settings['service_accordion_list'];
						
						if( $service_accordion_list ) {
							$i = 0;
							foreach($service_accordion_list as $service_accordion  ) {
								$i++;

								$service_accordion_title = $service_accordion['service_accordion_title'];
								$service_accordion_content = $service_accordion['service_accordion_content'];
								?>
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseService_<?php echo $i;?>" aria-expanded="true" aria-controls="collapseService_<?php echo $i;?>">
											<div class="accordion-title">
												<span class="accordion-title-default"><?php echo $service_accordion_title;?></span>
												<span class="accordion-title-hover text-white"><?php echo $service_accordion_title;?></span>
											</div>
											<span class="font-signature"><?php echo $service_accordion_title;?></span>
										</button>
									</h2>
									<div id="collapseService_<?php echo $i;?>" class="accordion-collapse collapse" data-bs-parent="#accordionServices">
										<div class="accordion-body">
											<p>
												<?php
													echo $service_accordion_content;
												?>
											</p>
										</div>
									</div>
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