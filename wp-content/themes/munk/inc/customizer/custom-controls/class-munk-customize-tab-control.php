<?php
/**
 * Munk Customize Tabs Control Class.
 *
 * @package munk
 *
 * @since 2.0.5
 *
 * @see     WP_Customize_Control
 * @access  public
 *
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Munk_Control_Tabs_Custom_Control extends Munk_Custom_Control_Base {
	/**
	 * The type of control being rendered
	 */
	public $type = 'control_tabs';
	
	public $controls_general;

	public $controls_design;	
	
	/**
	 * Render the control in the customizer
	 */
	public function render_content(){
	?>
	<div class="munk-custom-control-tabs">
		<div class="control-tab control-tab-general active" data-connected="<?php echo esc_attr( $this->controls_general ); ?>"><?php echo esc_html__( 'General', 'munk' ); ?></div>
		<div class="control-tab control-tab-design" data-connected="<?php echo esc_attr( $this->controls_design ); ?>"><?php echo esc_html__( 'Design', 'munk' ); ?></div>
	</div>
	<?php
	}
}