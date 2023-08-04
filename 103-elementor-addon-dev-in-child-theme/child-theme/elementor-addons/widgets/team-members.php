<?php
class Team_Members extends \Elementor\Widget_Base {

	public function get_name() {
		return 'team-members';
	}

	public function get_title() {
		return esc_html__( 'Team Members', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-elementor';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'team', 'members' ];
	}


	protected function register_controls(){
		// Elementor addon tab title
		$this->start_controls_section(
			'section_title',
			[
				"label" => esc_html__("Team Members", "elementor-addons"),
				"tab" => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'title',
			[
				"label" => esc_html__("Member Name", "elementor-addons"),
				"type" => \Elementor\Controls_Manager::TEXT,
				"default" => esc_html("Mahmudul Hasan", "elementor-addons")
			]
		);

		$this->add_control(
			'designation',
			[
				"label" => esc_html__("Member Designation", "elementor-addons"),
				"type" => \Elementor\Controls_Manager::TEXT,
				"default" => esc_html("Web Developer", "elementor addons")
			]
		);

		$this->add_control(
			'photo',
			[
				"label" => esc_html__("Photo", "elementor-addons"),
				"type" => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			"style",
			[
				"label" => esc_html__("Style", "elementor-addon"),
				"type" => \Elementor\Controls_Manager::SELECT,
				"options" => [
					"style1" => esc_html__("Style 1", "elementor-addon"),
					"style2" => esc_html__("Style 2", "elementor-addon"),
					"style3" => esc_html__("Style 3", "elementor-addon")
				],
				"default" => "style3"
			]
		);

		$this->add_control(
			'social_links',
			[
				'label'       => esc_html__('Social Links', 'elementor-addon'),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => [
					[
						'name'    => 'icon',
						'label'   => esc_html__('Icon', 'elementor-addon'),
						'type'    => \Elementor\Controls_Manager::ICONS,
						'default' => [
							'value' => 'fab fa-facebook',
							'library' => 'fa-solid',
						],
					],

					[
						'name'        => 'link',
						'label'       => esc_html__('Link', 'elementor-addon'),
						'type'        => \Elementor\Controls_Manager::URL,
						'placeholder' => esc_html__('https://example.com', 'elementor-addon'),
					],
				],
				
				'title_field' => '{{{ icon.value }}}',
			]
			);

		$this->end_controls_section();
	}

	
	protected function render() {

		$settings = $this->get_settings_for_display();

		?>

			<div class="mhasan-team-members">
				<!-- Condition: If photo is exists then show the photo -->
				<?php if (array_key_exists("photo", $settings) && !empty($settings["photo"])) : ?>
					<div class="mhasan-team-member-photo">
						<?php echo wp_get_attachment_image($settings["photo"]["id"], "medium"); ?>
					</div>
				<?php endif; ?>


				<div class="mhasan-team-member-info">
					<!-- Title -->
					<h3> <?php echo $settings["title"]; ?> </h3>
					
					<!-- Condition: If designation exists & designation not empty, then show the designation -->
					<?php if (array_key_exists("designation", $settings) && !empty ($settings["designation"])) : ?>
						<p> <?php echo $settings["designation"]; ?> </p>
					<?php endif; ?>
				
					
					<!-- Social Links -->
					<div class="social-links">

						<?php 
							foreach($settings["social_links"] as $link) :

							$is_external = $link["link"]["is_external"] == 'on' ? 'target="_blank"' : ""; 
						?>

							<a href="<?php echo $link["link"]["url"]; ?>" target="<?php echo $is_external; ?>">
								<i class="<?php echo $link["icon"]["value"]; ?>"></i>
							</a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

		<?php
	}
}