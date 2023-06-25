<?php
class Mhasan_Elementor_Addon_Hello_World extends \Elementor\Widget_Base {

	public function get_name() {
		return 'mhasan_hello_world';
	}

	public function get_title() {
		return esc_html__( '@mhasan', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-elementor';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'mhasan', 'hello', 'world' ];
	}

	protected function register_controls(){
		// Elementor addon tab title
		$this->start_controls_section(
			'section_title',
			[
				"label" => esc_html__("Title @mhasan", "elementor-addons"),
				"tab" => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'title',
			[
				"label" => esc_html__("Write your content @mhasan", "elementor-addons"),
				"type" => \Elementor\Controls_Manager::TEXTAREA,
				"default" => esc_html("Write your content here @mhasan", "elementor-addon")
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		?>

			<p> <?php echo $settings['title']; ?> </p>

		<?php
	}
}