<?php
class Theme_Banner_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Theme_Banner_Widget';
	}

	public function get_title() {
		return esc_html__( 'Banner Section', 'ts_story_theme' );
	}

	public function get_icon() {
		return 'eicon-elementor';
	}

	public function get_categories() {
		return [ 'theme-widget-category' ];
	}

	public function get_keywords() {
		return [ 'Theme', 'Banner Section' ];
	}

	protected function register_controls() {
		
		$this->start_controls_section(
			'banner_content',
			[
				'label' => esc_html__( 'Banner Section Content', 'pubhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'banner_rotate_img',
			[
				'label' => esc_html__( 'Rotate Image', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'banner_rotate_icon',
			[
				'label' => esc_html__( 'Rotate Icon', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'banner_rotate_circle_icon',
			[
				'label' => esc_html__( 'Rotate Circle Icon', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'banner_video_url',
			[
				'label' => esc_html__( 'Banner Video Url', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
        
        $this->add_control(
			'banner_video_url_for_phone',
			[
				'label' => esc_html__( 'Banner Video Url For Phone', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
        
        $this->add_control(
			'popup_video_url',
			[
				'label' => esc_html__( 'Popup Window Open Url', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$banner_rotate_img = esc_url($settings['banner_rotate_img']['url']);
		$banner_rotate_icon = esc_url($settings['banner_rotate_icon']['url']);
		$banner_rotate_circle_icon = esc_url($settings['banner_rotate_circle_icon']['url']);

		$banner_video_url = $settings['banner_video_url'];
        $popup_video_url = $settings['popup_video_url'];
        
        $banner_video_url_for_phone = $settings['banner_video_url_for_phone'];

		?>

		<section class="hero-banner bg-dark">
			<video src="<?php echo $banner_video_url;?>" muted loop autoplay playsinline class="hero-video for_pc_video"></video>
            
            <video src="<?php echo $banner_video_url_for_phone;?>" muted loop autoplay playsinline class="hero-video for_phone_video"></video>
            
			<a href="<?php echo $popup_video_url;?>" class="section-blob">
				<div class="rounded-text">
					<img src="<?php echo $banner_rotate_img;?>" alt="Scroll Down" class="rotating" />
				</div>
				<img src="<?php echo $banner_rotate_icon;?>" alt="Arrow Down" class="center-icon" />
				<img src="<?php echo $banner_rotate_circle_icon;?>" alt="Circle" class="circle" />
			</a>
			<style>
				@media screen and (min-width: 768px) {
					.hero-banner {
						position: fixed;
						z-index: 1031;
					}

					.top-nav {
						top: -100px;
						transition: all 0.3s ease;
					}

					.video_play_finished .top-nav {
						top: 0;
					}

					body:not(.video_play_finished) {
						max-height: 100vh;
						overflow: hidden;
					}

					body:not(.video_play_finished) .trusted_by {
						margin-top: 100vh;
					}
				}
			</style>
			<script>
				const body = document.querySelector("body");
				const heroSection = document.querySelector(".hero-banner");
				const video = document.querySelector(".hero-video");

				video.addEventListener("loadedmetadata", function () {
					var completeTime = video.duration - 4;
					setTimeout(function () {
						if (!body.classList.contains("video_play_finished")) {
							body.classList.add("video_play_finished");
						}
						if (!heroSection.classList.contains("section-behind")) {
							heroSection.classList.add("section-behind");
						}
					}, completeTime * 1000);
				});
				document.addEventListener("DOMContentLoaded", (event) => {
					setTimeout(function () {
						if (!body.classList.contains("video_play_finished")) {
							body.classList.add("video_play_finished");
						}
						if (!heroSection.classList.contains("section-behind")) {
							heroSection.classList.add("section-behind");
						}
					}, 4000);
				});
			</script>
		</section>

		<?php

	}
}