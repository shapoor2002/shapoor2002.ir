<?php
/**
 * Layout Site Header - Primary Header
 *
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Site_Header_Mobile' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Layout_Site_Header_Mobile extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {		

			$elements = array(		
				
				'munk_mobile_header_control_tabs' => array(
					'setting' => array(							
					),
					'control' => array(
						'type'     => 'control_tabs',
						'priority' => 1,
						'label'    => '',
						'section'  => 'munk_layout_site_header_mobile',							
						'controls_general'		=> json_encode( array( '#customize-control-munk_layout_site_header_mobile_ed,#customize-control-munk_mobile_header_element,#customize-control-munk_mobile_header_link_alignment,#customize-control-munk_mobile_header_toggle_icon' )),
						'controls_design'		=> json_encode( array( '#customize-control-munk_mobile_header_color_label,#customize-control-munk_mobile_header_color_ed,#customize-control-munk_mobile_navbar_color_label,#customize-control-munk_mobile_navbar_color_ed,#customize-control-munk_mobile_header_link_spacing,#customize-control-munk_color_main_nav_toggle_label,#customize-control-munk_color_main_nav_toggle' )),
					),					
				),					

				'munk_layout_site_header_mobile_ed' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
					),
					'control' => array(
						'type'     => 'select',
						'is_default_type' => true,						
						'priority' => 5,
						'label'    => __( 'Mobile Header Layout', 'munk' ),
						'section'  => 'munk_layout_site_header_mobile',
						'choices'  => array(								
								'none' 					=> __( 'None', 'munk' ),	
								'mobile-layout-one' 	=> __( 'Layout One', 'munk' ),
								'mobile-layout-two' 	=> __( 'Layout Two', 'munk' ),		
								'mobile-layout-three' 	=> __( 'Layout Three', 'munk' ),
						),
					),
				),	
				
				'munk_mobile_header_element' => array(
					'setting' => array(							
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
					),
					'control' => array(
						'type'        => 'pill_checkbox',						
						'label'       => __( 'Mobile Header Elements', 'munk' ),
						'section'     => 'munk_layout_site_header_mobile',
						'choices'     => array(
							'munk_header_button' 	=> __( 'Button', 'munk' ),
							'munk_search_trigger' 	=> __( 'Search', 'munk' ),
							'munk_wc_cart_icon' 	=> __( 'Cart Icon', 'munk' ),
							'munk_wc_account_icon' 	=> __( 'My Account Icon', 'munk' ),
							'munk_header_contact' 	=> __( 'Contact Info', 'munk' ),
						),
						'priority'  => 10,
						'transport' => 'refresh',
						'input_attrs' => array(
							'sortable' => true,
							'fullwidth' => true,
						),							
					)
				),		
				
				'munk_mobile_header_link_alignment' => array(
					'output' => array(
						array(
							'selector'  => '.munk-header .mobile-header .navbar ul li a',
							'property' => 'text-align',
						),
					),						
					'setting' => array(							
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
						'transport' => 'postMessage'
					),				
					'control' => array(
						'type'        => 'text_radio_buttons',							
						'label'       => __( 'Link Alignment', 'munk' ),
						'section'     => 'munk_layout_site_header_mobile',						
						'priority'    => 15,		
						'choices' => array(
							'left' 		=> '<svg width="16" height="13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h10v1H0zM0 4h16v1H0zM0 8h10v1H0zM0 12h16v1H0z"/></svg>',
							'center' 	=> '<svg width="16" height="13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 0h10v1H3zM0 4h16v1H0zM3 8h10v1H3zM0 12h16v1H0z"/></svg>',
							'right' 	=> '<svg width="16" height="13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 0h10v1H6zM0 4h16v1H0zM6 8h10v1H6zM0 12h16v1H0z"/></svg>',
						)						
					)
				),									
				
				'munk_mobile_header_link_spacing' => array(
					'output' => array(
						array(
							'selector'  => '.munk-header .mobile-header .navbar, .munk-header .mobile-header .navbar ul, .munk-header .mobile-header .navbar ul li, .munk-header .mobile-header .navbar ul li a',
							'property' => 'line-height',		
							'unit' => 'px',
						),
					),						
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),
						'transport' => 'postMessage'
					),
					'control' => array(
						'type'     => 'slider',						
						'priority' => 20,
						'label'    => __( 'Link Spacing', 'munk' ),						
						'section'  => 'munk_layout_site_header_mobile',
						'choices'     => array(
							'min'  => 0,
							'max'  => 100,
							'step' => 1,
						),
						'input_attrs' => array(
							'unit' => 'PX',
						),							
					),
				),		
				
				'munk_mobile_header_toggle_icon' => array(
					'setting' => array(							
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),						
					),				
					'control' => array(
						'type'        => 'text_radio_buttons',							
						'label'       => __( 'Toggle Menu Icon', 'munk' ),
						'section'     => 'munk_layout_site_header_mobile',						
						'priority'    => 25,		
						'choices' => array(
							'icon-one' 	=> '<svg width="16" height="7" viewBox="0 0 16 7" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="16" height="1"/><rect y="6" width="16" height="1"/></svg>',
							'icon-two' 	=> '<svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="16" height="1"/><rect y="5" width="16" height="1"/><rect y="10" width="16" height="1"/></svg>',
							'icon-three' 	=> '<svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="16" height="1"/><rect y="5" width="10" height="1"/><rect y="10" width="16" height="1"/></svg>',
							'icon-four' 	=> '<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><rect y="7" width="14" height="1"/><rect x="7.5" y="0.5" width="14" height="1" transform="rotate(90 7.5 0.5)"/></svg>',
						)						
					)
				),		
				
				// Mobile Header Color Label
				'munk_mobile_header_color_label' => array(					
					'setting' => array(					
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 30,
						'label'    => __('Mobile Header Colors', 'munk'),
						'section'  => 'munk_layout_site_header_mobile',
					),					
				),			
				
				// Mobile Header Color Settings
				'munk_mobile_header_color_ed' => array(					
					'output'    => array(
						array (
							'bgcolor-header' => array(							  
							  'selector'  => '.munk-header .mobile-header, .munk-header .mobile-header .munk-header-search-form',
							  'property'  => 'background-color',
							),
							'text' => array(							  
							  'selector'  => '.munk-header .mobile-header .site-title, .munk-header .mobile-header .site-title a, .munk-header .mobile-header .site-description, .munk-header .mobile-header *, .munk-header .mobile-header a, .munk-header .mobile-header p .munk-header .mobile-header ul li a',
							  'property'  => 'color',
							),			
							'border-color' => array(							  
								'selector'  => '.munk-header .mobile-header',
								'property'  => 'border-bottom-color',
							),		
						)
					),												
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_multi_color_sanitization' ),
						'transport' => 'postMessage'
					),
					'control' => array(
						'label' => '',			
						'priority' => 35,
						'type'    => 'multi_color',						
						'section' => 'munk_layout_site_header_mobile',						
						'input_attrs' => array(
							'palette' => array(
								'#FFFFFF',
								'#222222',
								'#444444',
								'#777777',
							),
							'choices'     => array(
								'bgcolor-header' => __( 'Background Color', 'munk' ),
								'text'    => __( 'Text Color', 'munk' ),
								'border-color'    => __( 'Border Color', 'munk' ),
							),                    
						),							
					),					
				),	
				
				// Mobile Navbar Color Label		
				'munk_mobile_navbar_color_label' => array(					
					'setting' => array(					
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 40,
						'label'    => __('Mobile Menu Colors', 'munk'),
						'section'  => 'munk_layout_site_header_mobile',
					),					
				),	
				
				// Mobile Navbar Color Settings
				'munk_mobile_navbar_color_ed' => array(					
					'output'    => array(
						array (
							'bgcolor-header' => array(							  
							  'selector'  => '.munk-header .mobile-header .navbar, .munk-header .mobile-header .navbar ul, .munk-header .mobile-header .navbar ul li, .munk-header .mobile-header .navbar ul li a',
							  'property'  => 'background-color',
							),
							'text' => array(							  
							  'selector'  => '.munk-header .mobile-header .navbar ul li a',
							  'property'  => 'color',
							),	
							'separtor-color' => array(							  
							  'selector'  => '.munk-header .mobile-header .navbar ul li a',
							  'property'  => 'border-bottom-color',
							),							
						)
					),												
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_multi_color_sanitization' ),
						'transport' => 'postMessage'
					),
					'control' => array(
						'label' => '',			
						'priority' => 45,
						'type'    => 'multi_color',						
						'section' => 'munk_layout_site_header_mobile',						
						'input_attrs' => array(
							'palette' => array(
								'#FFFFFF',
								'#222222',
								'#444444',
								'#777777',
							),
							'choices'     => array(
								'bgcolor-header' => __( 'Background Color', 'munk' ),
								'text'    => __( 'Text Color', 'munk' ),
								'separtor-color' => __( 'Separator Color', 'munk' ),
							),                    
						),							
					),					
				),
				
				// Mobile Menu Label Settings
				'munk_color_main_nav_toggle_label' => array(
					'setting' => array(
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 50,
						'label'       => __('Mobile Menu Toggle Icon', 'munk'),
						'section'  => 'munk_layout_site_header_mobile',
					),					
				),			
				
				// Mobile Menu Color Settings
				'munk_color_main_nav_toggle' => array(
					'output'    => array(
						array (							
							'bgcolor' => array(						  
							  'selector'   => '.munk-header .mobile-header #munk-burger .navbar-toggler',
							  'property'  => 'background-color',
							),
							'link' => array(						
							  'selector'   => '.munk-header .mobile-header #munk-burger .navbar-toggler .navbar-toggler-icon svg',
							  'property'  => 'fill',
							),
						)
					),						
					'setting' => array(								
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_multi_color_sanitization' ),
							'transport' => 'refresh'
					),
					'control' => array(
						'label' => '',			
						'priority' => 55,
						'type'     => 'multi_color',
						'section' => 'munk_layout_site_header_mobile',						
						'input_attrs' => array(
							'palette' => array(
								'#000000',
								'#222222',
								'#444444',
								'#777777',
							),
							'choices'     => array(
								'bgcolor' => __( 'Background Color', 'munk' ),
								'link'    => __( 'Link  Color', 'munk' ),
							),                    
						),	
					),					
				),					

			);

			return $elements;

		}

	}

	new Munk_Customize_Layout_Site_Header_Mobile();

endif;