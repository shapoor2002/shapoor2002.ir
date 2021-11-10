<?php
/**
 * Munk Customize Divider Control Class.
 *
 * @package munk
 *
 * @since 2.0.5
 *
 * @see     WP_Customize_Control
 * @access  public
 *
 */

class Munk_Divider_Custom_control extends Munk_Custom_Control_Base {
	/**
	 * The type of control being rendered
	 */
	public $type = 'divider';
	/**
	 * Render the control in the customizer
	 */
	public function render_content(){
	?>
		<hr class="munk-custom-divider" />		
	<?php
	}
}