<?php
class Theme_Header_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Theme_Header_Widget';
	}

	public function get_title() {
		return esc_html__( 'Theme Header', 'ts_story_theme' );
	}

	public function get_icon() {
		return 'eicon-elementor';
	}

	public function get_categories() {
		return [ 'theme-widget-category' ];
	}

	public function get_keywords() {
		return [ 'Theme', 'Header' ];
	}

	protected function register_controls() {}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		?>

		<nav class="navbar navbar-expand-md top-nav fixed-top" id="fixed-top">
			<div class="container-fluid container-lg">
				<a href="<?php echo home_url();?>" class="custom-logo-link"><img width="213" height="33" src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) );?>" class="custom-logo" alt="Ascend Agency Logo White"/></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#ascendTopMenu" aria-controls="ascendTopMenu" aria-expanded="false" aria-label="Toggle navigation">
					<span></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="ascendTopMenu">
					<?php 
					wp_nav_menu(array(
						'theme_location' => 'primary-menu-location',
						'menu_class' => 'navbar-nav',
						'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
						'walker' => new WP_Bootstrap_Navwalker(),
					));
					?>
				</div>
			</div>
		</nav>

		<?php

	}
}