<?php
class Theme_Work_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Theme_Work_Widget';
	}

	public function get_title() {
		return esc_html__( 'Work Section', 'ts_story_theme' );
	}

	public function get_icon() {
		return 'eicon-elementor';
	}

	public function get_categories() {
		return [ 'theme-widget-category' ];
	}

	public function get_keywords() {
		return [ 'Theme', 'Work Section' ];
	}

	protected function register_controls() {
		
		$this->start_controls_section(
			'work_content',
			[
				'label' => esc_html__( 'Work Section Content', 'pubhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'work_content_title',
			[
				'label' => esc_html__( 'Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'work_content_signature_title',
			[
				'label' => esc_html__( 'Signature Title', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'work_content_button_text',
			[
				'label' => esc_html__( 'Button Text', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'work_content_button_link',
			[
				'label' => esc_html__( 'Button Link', 'pubhub' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$work_content_title = $settings['work_content_title'];
		$work_content_signature_title = $settings['work_content_signature_title'];
		$work_content_button_text = $settings['work_content_button_text'];
		$work_content_button_link = $settings['work_content_button_link'];
		
		?>

		<section class="our-work-h bg-light py-5 overflow-hidden">
			<div class="py-xxl-5 d-block">
				<div class="container py-lg-5">
					<div class="d-flex flex-wrap align-items-center justify-content-between gap-4 mb-5">
						<h2 class="display-3 font-extrabold text-signature">
							<?php echo $work_content_title?>
							<span class="signature text-white opacity-100"><?php echo $work_content_signature_title?></span>
						</h2>
						<div class="d-flex gap-3 align-items-center flex-wrap">
							<a href="<?php echo $work_content_button_link?>" class="btn btn-dark py-3 px-4"><?php echo $work_content_button_text?></a>
							<div class="custom-flickity-nav custom-work-nav custom-work-nav_1">
								<span class="flickity-prev flickity-prev_1"></span>
								<span class="flickity-next flickity-next_1"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="card-carousel_1">

						<?php 
							$args = array(
								'post_type' => 'post',
								'posts_per_page' => -1,
								'category_name' => 'case-study',
							);

							$query = new WP_Query($args);

							if( $query->have_posts() ) {
								while( $query->have_posts() ) {
									$query->the_post();
								?>
									<div class="col-xxl-3 col-lg-4 col-md-6 mx-3 zig-zag flickity-item">
										<div class="card card-shadow card-work p-0 overflow-hidden">
											<img src="<?php echo get_the_post_thumbnail_url();?>" class="card-banner-img" />
											<div class="card-detail bg-white p-xxl-5 p-4">
												<h4 class="font-bold"><?php echo get_the_title();?></h4>
												<p></p>
												<div class="d-flex mt-4">
													<a href="<?php echo get_field('work_external_link');?>" target="_blank" class="btn btn-sm btn-outline btn-arrow">Read More</a>
												</div>
											</div>
										</div>
									</div>
								<?php
								}

								wp_reset_postdata();
							}
						?>
					</div>
				</div>
			</div>
		</section>

		<script type="text/javascript" src="<?php echo home_url()?>/wp-content/themes/hello-theme-child-master/assets/js/flickity.min.js"></script>

		<script>
			function slider_start(selector1,selector2,selector3,selector4) {
				Flickity.createMethods.push("_createPrevNextCells");

				Flickity.prototype._createPrevNextCells = function () {
					this.on("select", this.setPrevNextCells);
				};

				Flickity.prototype.setPrevNextCells = function () {
					// remove classes
					changeSlideClasses(this.previousSlide, "remove", "is-previous");
					changeSlideClasses(this.nextSlide, "remove", "is-next");
					// set slides
					this.previousSlide = this.slides[this.selectedIndex - 1];
					this.nextSlide = this.slides[this.selectedIndex + 1];
					// add classes
					changeSlideClasses(this.previousSlide, "add", "is-previous");
					changeSlideClasses(this.nextSlide, "add", "is-next");
				};

				function changeSlideClasses(slide, method, className) {
					if (!slide) {
						return;
					}
					slide.getCellElements().forEach(function (cellElem) {
						cellElem.classList[method](className);
					});
				}

				/* Client Logo Slider */
				const carousels = document.querySelectorAll(".ticker"),
					args = {
						accessibility: true,
						resize: false,
						wrapAround: true,
						prevNextButtons: false,
						pageDots: false,
						percentPosition: true,
						setGallerySize: true,
						rightToLeft: true,
					};

				carousels.forEach((carousel) => {
					let requestId;

					if (carousel.childNodes.length > 1) {
						const mainTicker = new Flickity(carousel, args);

						// Set initial position to be 0
						mainTicker.x = 0;

						// Start the marquee animation
						play();

						// Main function that 'plays' the marquee.
						function play() {
							mainTicker.x = mainTicker.x - 0.8;
							mainTicker.settle(mainTicker.x);
							requestId = window.requestAnimationFrame(play);
						}

						// Main function to cancel the animation.
						function pause() {
							if (requestId) {
								window.cancelAnimationFrame(requestId);
								requestId = undefined;
							}
						}

						// Pause on mouse over / focusin
						carousel.addEventListener("mouseover", pause, false);
						carousel.addEventListener("focusin", pause, false);

						// Unpause on mouse out / focusout
						carousel.addEventListener("mouseout", play, false);
						carousel.addEventListener("focusout", play, false);
					}
				});

				/* Card Carousel */
				var flkty = new Flickity(selector1, {
					wrapAround: true,
					prevNextButtons: false,
					pageDots: false,
					initialIndex: "1",
				});

				const customFlickityNav = document.querySelector(selector2);
				const customFlickityNext = customFlickityNav.querySelector(selector3);
				const customFlickityPrev = customFlickityNav.querySelector(selector4);

				customFlickityNext.addEventListener("click", (e) => {
					flkty.next();
				});
				customFlickityPrev.addEventListener("click", (e) => {
					flkty.previous();
				});
			}
			slider_start(".card-carousel_1",".custom-work-nav_1",".flickity-next_1",".flickity-prev_1");
    	</script>

		<?php

	}
}