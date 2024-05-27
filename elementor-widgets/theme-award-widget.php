<?php
class Theme_Award_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Theme_Award_Widget';
	}

	public function get_title() {
		return esc_html__( 'Award Section', 'ts_story_theme' );
	}

	public function get_icon() {
		return 'eicon-elementor';
	}

	public function get_categories() {
		return [ 'theme-widget-category' ];
	}

	public function get_keywords() {
		return [ 'Theme', 'Award Section' ];
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
			'award_rotate_img',
			[
				'label' => esc_html__( 'Rotate Image', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'award_rotate_icon',
			[
				'label' => esc_html__( 'Rotate Icon', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'award_rotate_circle_icon',
			[
				'label' => esc_html__( 'Rotate Circle Icon', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'award_title',
			[
				'label' => esc_html__( 'Award Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'award_signature',
			[
				'label' => esc_html__( 'Award Signature', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$award_rotate_img = esc_url($settings['award_rotate_img']['url']);
		$award_rotate_icon = esc_url($settings['award_rotate_icon']['url']);
		$award_rotate_circle_icon = esc_url($settings['award_rotate_circle_icon']['url']);

		$award_title = $settings['award_title'];
		$award_signature = $settings['award_signature'];

		?>

		<section class="award-section bg-light background-overlay-dark overflow-hidden pt-5">
				<div class="container py-5">
					
					<div class="text-center my-md-4">
						<h2 class="display-3 text-white font-extrabold text-signature mb-5">
							<?php echo $award_title;?>
							<span class="signature opacity-01"><?php echo $award_signature;?></span>
						</h2>
					</div>
					<div class="row mb-5">
						<?php 
							$args = array(
								'post_type' => 'post',
								'posts_per_page' => -1,
								'category_name' => 'video',
							);

							$query = new WP_Query($args);

							if( $query->have_posts() ) {
								while( $query->have_posts() ) {
									$query->the_post();
								?>
								<div class="col-lg-6 mb-4">
									<div class="card h-100 award-featured-card p-0 border-0 bg-dark-light" data-aos="fade">

										<?php 
											$video_url = get_field('video_url');
											$embed_video_url = get_field('embed_video_url');

											if(!empty($embed_video_url)) {
												echo '<iframe width="100%" height="350px" src="'.$embed_video_url.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>';
											} else if(!empty($video_url)) {
												echo '<video width="100%" height="350px" poster="'.get_the_post_thumbnail_url().'" src="'.$video_url.'" controls></video>';
											}
										?>
									</div>
								</div>
								<?php
								}

								wp_reset_postdata();
							}
						?>
					</div>
				</div>
			</section>

		<?php

	}
}