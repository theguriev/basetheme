<?php
/**
 * Sidebar Creator module file
 *
 * @package photolab
 */

if ( class_exists( 'WP_Customize_Control' ) ) :

/**
 * Sidebar_Creator module class
 */
class Sidebar_Creator extends \WP_Customize_Control {

	/**
	 * Add scripts and styles
	 */
	public function enqueue() {
		wp_enqueue_script(
			'sidebar-creator',
			Utils::assets_url().'/js/sidebar-creator.js',
			[ 'jquery', 'underscore' ]
		);
		wp_enqueue_style(
			'sidebar-creator',
			Utils::assets_url() . '/css/sidebar-creator.css'
		);
	}

	/**
	 * Render content
	 */
	public function render_content() {
		echo View::make(
			'blocks/sidebar-creator',
			[
				'id'    => 'customize-control-' . str_replace( array( '[', ']' ), array( '-', '' ), $this->id ),
				'class' => 'customize-control customize-control-' . $this->type,
				'label' => esc_html( $this->label ),
				'value' => $this->value(),
				'link'  => $this->get_link(),
			]
		);
	}

	/**
	 * Register widget area.
	 */
	public static function widgets_init() {
		$sidebar_creator = \Sidebar_Settings_Model::getSidebarsOptions();
		if ( count( $sidebar_creator ) && is_array( $sidebar_creator ) ) {
			foreach ( $sidebar_creator as $sidebar ) {
				register_sidebar( $sidebar );
			}
		}
	}
}

add_action( 'widgets_init', [ '\Modules\Custom\Sidebar_Creator', 'widgets_init' ] );
endif;
