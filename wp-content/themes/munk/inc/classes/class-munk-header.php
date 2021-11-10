<?php
/**
 * Munk Header class
 *
 * @package Munk
 *
 * @since 2.0.5
 *
 */

if ( !class_exists( 'Munk_Header' ) ) :
	Class Munk_Header {

		
		// Get our default customizer values
		public $customizer_defaults;		

		/**
		 * Constructor
		 */
		public function __construct() {	
										
			$this->customizer_defaults = munk_customizer_defaults();				
			
		}		

		/**
		 * Desktop header markup
		 */
		public function munk_header_markup_render() {		
						
			//desktop header
			$header_desktop_layout_ed = get_theme_mod( 'munk_layout_site_header_primary_ed', $this->customizer_defaults['munk_layout_site_header_primary_ed'] );		
			$munk_desktop_header_layout = str_replace("-", "_", $header_desktop_layout_ed);	
			
			//mobile header
			$header_mobile_layout_ed = get_theme_mod( 'munk_layout_site_header_mobile_ed', $this->customizer_defaults['munk_layout_site_header_mobile_ed'] );		
			$munk_mobile_header_layout = str_replace("-", "_", $header_mobile_layout_ed);		
			
			//sticky header
			$munk_layout_site_header_sticky_ed = get_theme_mod( 'munk_layout_site_header_sticky_ed', $this->customizer_defaults['munk_layout_site_header_sticky_ed'] );	
			$is_sticky = '';
			
			if ($munk_layout_site_header_sticky_ed) {
				$is_sticky = 'is-sticky';
			}
			if ($header_desktop_layout_ed != 'none') {
				munk_header_before();
				echo '<header id="masthead" class="site-header munk-header '.esc_attr($header_desktop_layout_ed) .' '.esc_attr($header_mobile_layout_ed) .' '.esc_attr($is_sticky).'" role="banner">';
					munk_header_top();
						echo '<div class="desktop-header">';
							call_user_func( array( $this, 'munk_header_' . $munk_desktop_header_layout ) );	
						echo '</div>';
						if ($header_mobile_layout_ed != 'none') {
							echo '<div class="mobile-header">';
								call_user_func( array( $this, 'munk_header_' . $munk_mobile_header_layout ) );	
							echo '</div>';
						}
					munk_header_bottom();
				echo '</header><!-- #masthead -->';	
				munk_header_after();
			}
			?>
			<div class="search-overlay"></div>
			<?php
		}				
		
		public function munk_header_none() {
			// header disabled			
		}
		
		public function munk_header_layout_one() {
		$munk_header_container = get_theme_mod( 'munk_layout_site_header_width', $this->customizer_defaults['munk_layout_site_header_width'] );					
		?>	            
                <div class="<?php echo esc_attr($munk_header_container); ?>">
                    <div class="row d-flex align-items-center">                        
							<?php $this->munk_site_branding(); ?>
							<?php $this->munk_navbar(); ?>
                    </div>
				</div>
		<?php			
		}
		
		public function munk_header_layout_two() {
		$munk_header_container = get_theme_mod( 'munk_layout_site_header_width', $this->customizer_defaults['munk_layout_site_header_width'] );			
		?>
	        <div class="layout-two-header">    
                <div class="<?php echo esc_attr($munk_header_container); ?>">
                    <div class="row">                        
							<?php $this->munk_site_branding(); ?>                                                
                    </div><!-- .row -->
                </div><!-- .container -->
            </div>
            <div class="layout-two-navbar">            
                <div class="<?php echo esc_attr($munk_header_container); ?>">
                    <div class="row">   
                            <div class="header-bottom ">
								<?php $this->munk_navbar(); ?>  
                            </div>
                    </div>
                </div>
            </div>
		<?php
		}	
		
		public function munk_header_layout_three() {
		$munk_header_container = get_theme_mod( 'munk_layout_site_header_width', $this->customizer_defaults['munk_layout_site_header_width'] );					
		?>
				<div class="<?php echo esc_attr($munk_header_container); ?>">
						<div class="munk-header-items">
							<?php $this->munk_navbar(); ?>  	
							<?php $this->munk_site_branding(); ?>	
							<div class="munk-header-elements">
								<?php $this->munk_header_element_render('munk_primary_header_three_element'); ?>
							</div>
						</div>
				</div>
				<?php $this->munk_header_search_form(); ?>
		<?php
		}	
		
		public function munk_header_layout_four() {
		$munk_header_container = get_theme_mod( 'munk_layout_site_header_width', $this->customizer_defaults['munk_layout_site_header_width'] );					
		?>
				<div class="<?php echo esc_attr($munk_header_container); ?>">
						<div class="munk-header-items">
							<?php $this->munk_site_branding(); ?>							
							<?php $this->munk_navbar(); ?>  									
							<div class="munk-header-elements">
								<?php $this->munk_header_element_render('munk_primary_header_four_element'); ?>
							</div>
						</div>
				</div>
				<?php $this->munk_header_search_form(); ?>				
		<?php
		}	
		
		public function munk_header_layout_five() {
		$munk_header_container = get_theme_mod( 'munk_layout_site_header_width', $this->customizer_defaults['munk_layout_site_header_width'] );					
		?>
				<div class="<?php echo esc_attr($munk_header_container); ?>">
						<div class="munk-header-items">
							<?php $this->munk_site_branding(); ?>																							
							<div class="munk-header-elements">
								<?php $this->munk_header_element_render('munk_primary_header_five_element'); ?>
							</div>
						</div>
				</div>
				<div class="munk-bottom-navbar">
					<div class="<?php echo esc_attr($munk_header_container); ?>">
						<?php $this->munk_navbar(); ?>  
					</div>
				</div>
				<?php $this->munk_header_search_form(); ?>				
		<?php			
		}
		
		public function munk_header_layout_six() {
		$munk_header_container = get_theme_mod( 'munk_layout_site_header_width', $this->customizer_defaults['munk_layout_site_header_width'] );					
		?>
				<div class="<?php echo esc_attr($munk_header_container); ?>">
						<div class="munk-header-items">
							<div class="munk-header-elements elements-left">
								<?php $this->munk_header_element_render('munk_primary_header_six_element_left'); ?>							
							</div>
							<?php $this->munk_site_branding(); ?>																							
							<div class="munk-header-elements elements-right">								
								<?php $this->munk_header_element_render('munk_primary_header_six_element_right'); ?>
							</div>
						</div>
				</div>
				<div class="munk-bottom-navbar">
					<div class="<?php echo esc_attr($munk_header_container); ?>">
						<?php $this->munk_navbar(); ?>  
					</div>
				</div>
				<?php $this->munk_header_search_form(); ?>				
		<?php			
		}
		
		public function munk_header_layout_seven() {
		$munk_header_container = get_theme_mod( 'munk_layout_site_header_width', $this->customizer_defaults['munk_layout_site_header_width'] );					
		?>
				<div class="<?php echo esc_attr($munk_header_container); ?>">
						<div class="munk-header-items">
							<?php $this->munk_site_branding(); ?>																							
							<div class="munk-header-elements elements-right">
								<?php $this->munk_header_element_render('munk_primary_header_seven_element_top'); ?>
							</div>
						</div>
				</div>
				<div class="munk-bottom-navbar">
					<div class="<?php echo esc_attr($munk_header_container); ?>">
						<div class="munk-header-items">
						<?php $this->munk_navbar(); ?> 
						<div class="munk-header-elements elements-right">
							<?php $this->munk_header_element_render('munk_primary_header_seven_element_bottom'); ?>
						</div>	
						</div>
					</div>
				</div>
				<?php $this->munk_header_search_form(); ?>				
		<?php			
		}		
		
		public function munk_header_layout_eight() {
		$munk_header_container = get_theme_mod( 'munk_layout_site_header_width', $this->customizer_defaults['munk_layout_site_header_width'] );					
		?>			
				<div class="<?php echo esc_attr($munk_header_container); ?>">
						<div class="munk-header-items">
							<div class="munk-header-elements elements-left">
								<?php $this->munk_header_element_render('munk_primary_header_eight_element_top_left'); ?>
							</div>
							<?php $this->munk_site_branding(); ?>																							
							<div class="munk-header-elements elements-right">
								<?php $this->munk_header_element_render('munk_primary_header_eight_element_top_right'); ?>
							</div>
						</div>
				</div>
				<div class="munk-bottom-navbar">
					<div class="<?php echo esc_attr($munk_header_container); ?>">
						<div class="munk-header-items">
						<?php $this->munk_navbar(); ?> 
						<div class="munk-header-elements elements-right">
							<?php $this->munk_header_element_render('munk_primary_header_eight_element_bottom'); ?>
						</div>	
						</div>
					</div>
				</div>
				<?php $this->munk_header_search_form(); ?>							
		<?php			
		}			

		// mobile header layout one
		public function munk_header_mobile_layout_one() {
		$munk_header_elements = get_theme_mod( 'munk_mobile_header_element', $this->customizer_defaults['munk_mobile_header_element'] );
		?>    
			<div class="munk-header-items">
                <div class="container-fluid">
                    <div class="row">                        
							<?php $this->munk_site_branding(); ?>
							<?php if ($munk_header_elements) { ?>
								<div class="munk-header-elements">
									<?php $this->munk_header_element_render('munk_mobile_header_element'); ?>
								</div>							
							<?php } ?>
							<?php $this->munk_mobile_toggler(); ?>													
					</div>						
					<?php $this->munk_header_search_form(); ?>																	
                </div>  			
			</div>			
				<div class="site-navigation"> 						
						<?php $this->munk_navbar(); ?>                                                							
				</div>	
		<?php
		}
		
		// mobile header layout two
		public function munk_header_mobile_layout_two() { 
		$munk_header_elements = get_theme_mod( 'munk_mobile_header_element', $this->customizer_defaults['munk_mobile_header_element'] );
		?>    
			<div class="munk-header-items">
                <div class="container-fluid">
                    <div class="row">                        							
							<?php if ($munk_header_elements) { ?>
								<div class="munk-header-elements">
									<?php $this->munk_header_element_render('munk_mobile_header_element'); ?>
								</div>							
							<?php } ?>						
							<?php $this->munk_site_branding(); ?>						
							<?php $this->munk_mobile_toggler(); ?>													
					</div>						
					<?php $this->munk_header_search_form(); ?>																	
                </div>   
			</div>		
			<div class="site-navigation"> 						
				<?php $this->munk_navbar(); ?>                                                							
			</div>
		<?php
		}
		
		// mobile header layout three
		public function munk_header_mobile_layout_three() { 
		$munk_header_elements = get_theme_mod( 'munk_mobile_header_element', $this->customizer_defaults['munk_mobile_header_element'] );			
		?>    
			<div class="munk-header-items">
                <div class="container-fluid">
                    <div class="row">                       
							<?php $this->munk_mobile_toggler(); ?>						
							<?php $this->munk_site_branding(); ?>
							<?php if ($munk_header_elements) { ?>
								<div class="munk-header-elements">
									<?php $this->munk_header_element_render('munk_mobile_header_element'); ?>
								</div>							
							<?php } ?>																			
					</div>						
					<?php $this->munk_header_search_form(); ?>																	
                </div>   
			</div>	
			<div class="site-navigation"> 						
					<?php $this->munk_navbar(); ?>                                                							
			</div>
		<?php
		}					
		
		
		public function munk_site_branding() {
		?>
			<div class="site-branding">
					<?php the_custom_logo(); ?>
					<h1 class="site-title text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
						<p class="site-description text-center"><?php echo esc_html( $description ); // phpcs:ignore ?></p>
					<?php endif; ?>
			 </div> 			
		<?php	
		}
		
	 	public function munk_navbar() {
		$munk_primary_menu = get_theme_mod ('munk_layout_site_header_primary_menu', $this->customizer_defaults['munk_layout_site_header_primary_menu']);
		if (!$munk_primary_menu) {
			return;
		}
		?>
			<?php munk_header_main_navigation_before(); ?>
			<nav class="navbar" role="navigation">
				  <?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'depth'	          => 4,
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'navbar-nav',						  							  
					) );
				  ?>                                                   
			</nav> 	
			<?php munk_header_main_navigation_after(); ?>
		<?php	
		}				
		
		public function munk_header_element_render( $location ) {
			$munk_header_elements = get_theme_mod( $location, $this->customizer_defaults[$location] );
			$munk_header_elements_arr = explode(',', $munk_header_elements);
			foreach ($munk_header_elements_arr as $element) {
				if($element) {
					call_user_func( array( $this, $element ) );
				}
			}
		}
		
		public function munk_search_trigger() {
		?>
			<a href="#" class="header-item search-trigger">
				<i class="icon-search active"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"/></svg></i>
				<i class="icon-search"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"/></svg></i>				
			</a>

		<?php	
		}
		
		public function munk_wc_cart_icon(){
		
			if ( !class_exists( 'WooCommerce' ) ) {
				return;
			}

			echo munk_wc_header_cart(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped									
		} 
		
		public function munk_wc_account_icon(){
			
			if ( !class_exists( 'WooCommerce' ) ) {
				return;
			}

			echo munk_wc_header_account_link(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped				
		} 		
		
		public function munk_header_button() {
			$button_text = get_theme_mod('munk_header_element_button_text', $this->customizer_defaults['munk_header_element_button_text']);
			$button_url = get_theme_mod('munk_header_element_button_url', $this->customizer_defaults['munk_header_element_button_url']);	
			$new_window = get_theme_mod('munk_header_element_button_url_nw', $this->customizer_defaults['munk_header_element_button_url_nw']);	
			
			if ($new_window) {
				$target = '_blank';
			}
			else {
				$target = '_self';
			}			
			
		?>
			<a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($button_url); ?>" class="header-item button btn btn-primary munk-header-button">
				<?php echo esc_html($button_text); ?>
			</a>
		<?php				
		}
		
		public function munk_header_contact() {
			
			$email = get_theme_mod('munk_header_element_contact_email', $this->customizer_defaults['munk_header_element_contact_email']);
			$phone = get_theme_mod('munk_header_element_contact_phone', $this->customizer_defaults['munk_header_element_contact_phone']);
			$inline = get_theme_mod('munk_header_element_contact_layout', $this->customizer_defaults['munk_header_element_contact_layout']);
			
			if ($inline) {
				$inline_class = 'inline';
			}
			else {
				$inline_class = '';
			}
			
		?>
			<ul class="header-item header-contact <?php echo esc_attr($inline_class); ?>">	
					<li><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M2.243 6.854L11.49 1.31a1 1 0 0 1 1.029 0l9.238 5.545a.5.5 0 0 1 .243.429V20a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.283a.5.5 0 0 1 .243-.429zM4 8.133V19h16V8.132l-7.996-4.8L4 8.132zm8.06 5.565l5.296-4.463 1.288 1.53-6.57 5.537-6.71-5.53 1.272-1.544 5.424 4.47z"/></svg></span>
						<span class="contact-info contact-email"><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></span>
					</li>
					<li><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M9.366 10.682a10.556 10.556 0 0 0 3.952 3.952l.884-1.238a1 1 0 0 1 1.294-.296 11.422 11.422 0 0 0 4.583 1.364 1 1 0 0 1 .921.997v4.462a1 1 0 0 1-.898.995c-.53.055-1.064.082-1.602.082C9.94 21 3 14.06 3 5.5c0-.538.027-1.072.082-1.602A1 1 0 0 1 4.077 3h4.462a1 1 0 0 1 .997.921A11.422 11.422 0 0 0 10.9 8.504a1 1 0 0 1-.296 1.294l-1.238.884zm-2.522-.657l1.9-1.357A13.41 13.41 0 0 1 7.647 5H5.01c-.006.166-.009.333-.009.5C5 12.956 11.044 19 18.5 19c.167 0 .334-.003.5-.01v-2.637a13.41 13.41 0 0 1-3.668-1.097l-1.357 1.9a12.442 12.442 0 0 1-1.588-.75l-.058-.033a12.556 12.556 0 0 1-4.702-4.702l-.033-.058a12.442 12.442 0 0 1-.75-1.588z"/></svg></span>
					<span class="contact-info contact-phone"><a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a></span>
					</li>							
			</ul>
		<?php				
		}
		
		/**
		 * Search form
		 */
		public function munk_header_search_form() {
			?>
			<div class="munk-header-search-form">
				<?php get_search_form(); ?>
			</div>
			<?php
		}		
		
		public function munk_mobile_toggler() {
		$allowed_tags = array(
			'div' => array(
				'style' => array()
			),
			'svg'     => array(
				'class'       => true,
				'xmlns'       => true,
				'width'       => true,
				'height'      => true,
				'viewbox'     => true,
				'aria-hidden' => true,
				'role'        => true,
				'focusable'   => true,
			),
			'path'    => array(
				'd'      => true,
			),
			'rect'    => array(
				'x'      => true,
				'y'      => true,
				'width'  => true,
				'height' => true,
				'transform' => true
			),			
		);			
			
		$munk_mobile_header_toggle_icon = get_theme_mod('munk_mobile_header_toggle_icon', $this->customizer_defaults['munk_mobile_header_toggle_icon']);
		if ($munk_mobile_header_toggle_icon == 'icon-one') {
			$icon_show = '<svg width="16" height="7" viewBox="0 0 16 7" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="16" height="1"/><rect y="6" width="16" height="1"/></svg>';
		}
		elseif ($munk_mobile_header_toggle_icon == 'icon-two') {
			$icon_show = '<svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="16" height="1"/><rect y="5" width="16" height="1"/><rect y="10" width="16" height="1"/></svg>';
		}
		elseif ($munk_mobile_header_toggle_icon == 'icon-three') {
			$icon_show = '<svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="16" height="1"/><rect y="5" width="10" height="1"/><rect y="10" width="16" height="1"/></svg>';
		}
		elseif ($munk_mobile_header_toggle_icon == 'icon-four') {
			$icon_show = '<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><rect y="7" width="14" height="1"/><rect x="7.5" y="0.5" width="14" height="1" transform="rotate(90 7.5 0.5)"/></svg>';
		}
		else {
			$icon_show = '<svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="16" height="1"/><rect y="5" width="16" height="1"/><rect y="10" width="16" height="1"/></svg>';
		}
		?>
			<div id="munk-burger">
				<button class="navbar-toggler" type="button">
					<span class="navbar-toggler-icon"><?php echo wp_kses( $icon_show, $allowed_tags ); ?></span>
				</button>     
			</div>
		<?php				
		}
		
		
	}

endif;

function munk_header_primary_markup() {
	
    $munk_header_ed = new Munk_Header();    
	$single_header_ed = get_post_meta( get_queried_object_id(), 'munk_settings_disable_primary_header', true );								
	if (!$single_header_ed) {		
		$munk_header_ed->munk_header_markup_render();
	}
}

add_action('munk_header', 'munk_header_primary_markup', 20);