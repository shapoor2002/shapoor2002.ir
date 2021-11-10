<?php
/**
 * Munk Footer class
 *
 * @package Munk
 *
 * @since 2.0.6
 *
 */

if ( !class_exists( 'Munk_Footer' ) ) :
	Class Munk_Footer {

		
		// Get our default customizer values
		public $customizer_defaults;		

		/**
		 * Constructor
		 */
		public function __construct() {	
										
			$this->customizer_defaults = munk_customizer_defaults();				
			
		}		
		
		public function munk_footer_render() {
		?>
			<footer id="colophon" class="site-footer" role="contentinfo">
					<?php munk_footer_top(); ?>
					<?php $this->munk_footer_widget_area(); ?>
					<?php $this->munk_footer_copyright(); ?>
					<?php munk_footer_bottom(); ?> 
			</footer>
		<?php
		}

		/**
		 * Widgets
		 */
		public function munk_footer_widget_area() {
			$container 	= get_theme_mod( 'munk_layout_footer_container', 'container' );
			$layout 	= get_theme_mod( 'munk_layout_footer_ed', 'three-col' );			
			$visibility = get_theme_mod( 'munk_layout_footer_visibility', 'all' );

			if ( !is_active_sidebar( 'footer-1' ) || 'none' === $layout ) {
				return;
			}

			switch ($layout) {

				case 'four-col':
				case 'four-col-wide-left':
				case 'four-col-wide-right':	
					$columns 	= 'col-3';
					$column_no  = 4;
					break;

				case 'three-col':
				case 'three-col-wide-left':
				case 'three-col-wide-right':
					$columns = 'col-4';
					$column_no  = 3;
					break;

				case 'two-col':
				case 'two-col-wide-left':
				case 'two-col-wide-right':
					$columns = 'col-6';
					$column_no  = 2;
					break;

				default:
					$columns = 'col-12';
					$column_no  = 1;
					break;
			}

			?>
	
			<div class="footer-t visibility-<?php echo esc_attr( $visibility ); ?>">
				<div class="<?php echo esc_attr( $container ); ?>">
					<div class="widget-area footer-widgets-grid <?php echo esc_attr( $layout ); ?>">
					<?php for ( $i = 1; $i <= $column_no; $i++ ) { ?>
						<?php if ( is_active_sidebar( 'footer-' . $i ) ) : ?>
						<div class="widget-column">
							<?php dynamic_sidebar( 'footer-' . $i); ?>
						</div>
						<?php endif; ?>	
					<?php } ?>
					</div>
				</div>
			</div>
			<?php
		}	
		
		public function munk_footer_copyright() {		
			
			$layout = get_theme_mod( 'munk_layout_footer_copyright_layout', 'left-align' );
			$container = get_theme_mod( 'munk_layout_footer_copyright_container', 'container' );			

			echo '<div class="site-info">';
				echo '<div class="'.esc_attr( $container ).'">';					

						if ($layout == 'left-align') {
							$leftside = 'left-side';
							$rightside = 'right-side';        
						}
						elseif ($layout == 'right-align') {
							$leftside = 'right-side';
							$rightside = 'left-side';        
						}    
						else {
							$leftside = 'text-center';
							$rightside = 'text-center';                
						}

						$text  = '<div class="site-info"><div class="' . esc_attr($leftside). '">';
						$copyright = get_theme_mod( 'munk_footer_copyright' );		
						if ($copyright) {
						$text .=  esc_html($copyright);	
						}
						else {
						$text .=  esc_html__( 'Copyright &copy; ', 'munk' ) . date_i18n( 'Y' );
						$text .= ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>.';
						}		
						$text .= '</div>';

						$text .= '<div class="' . esc_attr($rightside). '">';	

						if(get_theme_mod( 'munk_ed_author_link', true ) ==  true ) {
						$text .= '<a href="' . esc_url( 'https://wpmunk.com/' ) .'" target="_blank">' . esc_html__( 'Built with Munk', 'munk' ) .'</a>. '; /* translators: %s: wordpress.org URL */ 
						}
						if(get_theme_mod( 'munk_ed_wp_link', true ) ==  true ) { /* translators: %s: wordpress.org URL */ 
						$text .= sprintf( esc_html__( 'Powered by %s', 'munk' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'munk' ) ) .'" target="_blank">' .esc_html('WordPress', 'munk'). '</a>.' );
						}

						$text .= '</div></div>';

						echo apply_filters( 'munk_footer_text', $text ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped					
					
					
				echo '</div>';
			echo '</div>';


		}
		
		
	}

endif;

function munk_footer_markup() {	
	
    $munk_footer_ed = new Munk_Footer();    
	$single_footer_ed = get_post_meta( get_queried_object_id(), 'munk_settings_disable_footer_area', true );								
	if (!$single_footer_ed) {		
		$munk_footer_ed->munk_footer_render();
	}	

}

add_action('munk_footer', 'munk_footer_markup', 10);