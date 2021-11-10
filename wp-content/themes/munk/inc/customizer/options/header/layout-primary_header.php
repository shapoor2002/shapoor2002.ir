<?php
/**
 * Layout Site Header - Primary Header
 *
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Site_Header_Primary' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Layout_Site_Header_Primary extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {		

			$elements = array(
				
				'munk_primary_header_control_tabs' => array(
					'setting' => array(							
					),
					'control' => array(
						'type'     => 'control_tabs',
						'priority' => 1,
						'label'    => '',
						'section'  => 'munk_layout_site_header_primary',							
						'controls_general'		=> json_encode( array( '#customize-control-munk_layout_site_header_primary_ed, #customize-control-munk_primary_header_divider_one, #customize-control-munk_layout_site_header_primary_menu, #customize-control-munk_primary_header_three_element, #customize-control-munk_primary_header_four_element, #customize-control-munk_primary_header_five_element, #customize-control-munk_primary_header_six_element_left, #customize-control-munk_primary_header_six_element_right, #customize-control-munk_primary_header_seven_element_top, #customize-control-munk_primary_header_seven_element_bottom, #customize-control-munk_primary_header_eight_element_top_right, #customize-control-munk_primary_header_eight_element_top_left, #customize-control-munk_primary_header_eight_element_bottom, #customize-control-munk_header_element_search_label, #customize-control-munk_header_element_search_type, #customize-control-munk_header_element_button_label, #customize-control-munk_header_element_button_text, #customize-control-munk_header_element_button_url, #customize-control-munk_header_element_button_url_nw, #customize-control-munk_header_element_contact_label, #customize-control-munk_header_element_contact_email, #customize-control-munk_header_element_contact_phone, #customize-control-munk_header_element_contact_layout,#customize-control-munk_layout_site_header_width,#customize-control-munk_layout_site_header_sticky_ed' )),
						'controls_design'		=> json_encode( array( '#customize-control-munk_layout_site_header_primary_padding, #customize-control-munk_layout_site_header_primary_border_ed, #customize-control-munk_layout_site_header_primary_border_color, #customize-control-munk_layout_site_header_primary_margin_bottom, #customize-control-munk_color_header_primary, #customize-control-munk_color_header_primary_ed' )),
					),					
				),					

				'munk_layout_site_header_primary_ed' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
					),
					'control' => array(
						'type'     => 'select',
						'is_default_type' => true,						
						'priority' => 10,
						'label'    => __( 'Primary Header Layout', 'munk' ),
						'section'  => 'munk_layout_site_header_primary',
						'choices'  => array(
								'none' 	  => __( 'None', 'munk' ),
								'layout-one' 	=> __( 'Layout One', 'munk' ),
								'layout-two' 	=> __( 'Layout Two', 'munk' ),		
								'layout-three' 	=> __( 'Layout Three', 'munk' ),
								'layout-four' 	=> __( 'Layout Four', 'munk' ),		
								'layout-five' 	=> __( 'Layout Five', 'munk' ),
								'layout-six' 	=> __( 'Layout Six', 'munk' ),		
								'layout-seven' 	=> __( 'Layout Seven', 'munk' ),
								'layout-eight' 	=> __( 'Layout Eight', 'munk' ),									
						),
					),
				),	
				
				'munk_layout_site_header_width' => array(
					'setting' => array(							
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
						'transport' 		=> 'postMessage',
					),				
					'control' => array(
						'type'        => 'text_radio_buttons',							
						'label'       => __( 'Header Container Size', 'munk' ),
						'section'     => 'munk_layout_site_header_primary',						
						'priority'    => 10,		
						'choices' => array(
							'container' 	=> 'Contained',													
							'container-fluid' 	=> 'Full Width',
						)						
					)
				),			
				
				'munk_layout_site_header_sticky_ed' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						'transport' 		=> 'postMessage',
					),
					'control' => array(
						'type'     => 'toggle_switch',						
						'priority' => 10,
						'label'    => __( 'Enable Sticky Header', 'munk' ),
						'section'  => 'munk_layout_site_header_primary',
					),
				),				
								
				
				'munk_layout_site_header_primary_menu' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
					),
					'control' => array(
						'type'     => 'toggle_switch',						
						'priority' => 11,
						'label'    => __( 'Enable Primary Menu', 'munk' ),
						'section'  => 'munk_layout_site_header_primary',
					),
				),	
				
				'munk_primary_header_divider_one' => array(
					'setting' => array(							
					),
					'control' => array(
						'type'     => 'divider',
						'priority' => 11,
						'label'    => '',
						'section'  => 'munk_layout_site_header_primary',														
					),					
				),					
				
				'munk_layout_site_header_primary_padding' => array(
					'output'    => array(
						array (							  
						  'selector'  => '.header-layout-one .munk-header .desktop-header, .header-layout-two .layout-two-header .desktop-header, .munk-header.layout-three .desktop-header, .munk-header.layout-four .desktop-header, .munk-header.layout-five .desktop-header, .munk-header.layout-six .desktop-header, .munk-header.layout-seven .desktop-header, .munk-header.layout-eight .desktop-header, .munk-header .mobile-header',
						  'property'  => 'padding',
						),								
					),						
					'setting' => array(
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_dimensions_sanitization' ),
					), 
					'control' => array(
						'type'     	  => 'dimensions',						
						'priority' 	  => 12,
						'label'       => __( 'Primary Header Padding', 'munk' ),
						'description' => __( 'Adjust primary header top and bottom padding', 'munk' ),
						'section'     => 'munk_layout_site_header_primary',
						'input_attrs' => array(
							'labels' => array(
								'top'  => __( 'Top', 'munk' ),
								'bottom' => __( 'Bottom', 'munk' ),
							),
							'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
						),   						
					),
				),
				
				'munk_layout_site_header_primary_border_ed' => array(
					'output' => array(
						array(
							'selector'  => '.munk-header .desktop-header',
							'property' => 'border-bottom-width',											
						),
					),						
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
						'transport' 		=> 'postMessage',
					),
					'control' => array(
						'is_default_type' => true,
						'type'     => 'text',						
						'priority' => 13,
						'label'    => __( 'Bottom Border', 'munk' ),
						'section'  => 'munk_layout_site_header_primary',						
					),
				),		
				
				'munk_layout_site_header_primary_border_color' => array(
					'output' => array(
						array(
							'selector'  => '.munk-header .desktop-header',
							'property' => 'border-bottom-color',											
						),
					),						
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_hex_rgba_sanitization' ),
						'transport' 		=> 'postMessage',
					),
					'control' => array(
						'is_default_type' => true,
						'type'     => 'color',						
						'priority' => 14,
						'label'       => __( 'Border Color', 'munk' ),
						'description' => __( 'Add bottom border color to primary header', 'munk' ),
						'section'     => 'munk_layout_site_header_primary',
					),
				),										
				
				'munk_layout_site_header_primary_margin_bottom' => array(
					'output' => array(
						array(
							'selector'  => '.munk-header',
							'property' => 'margin-bottom',		
							'unit' => 'px',
						),
					),						
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),
						'transport' => 'postMessage'
					),
					'control' => array(
						'type'     => 'slider',						
						'priority' => 16,
						'label'    => __( 'Margin Bottom', 'munk' ),
						'description' => __( 'Adjust primary header bottom margin', 'munk' ),		
						'section'  => 'munk_layout_site_header_primary',
						'choices'     => array(
							'min'  => 0,
							'max'  => 500,
							'step' => 1,
						),
						'input_attrs' => array(
							'unit' => 'PX',
						),							
					),
				),	
				
				// Color Settings
				'munk_color_header_primary' => array(					
					'setting' => array(					
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 17,
						'label'    => __('Color Settings', 'munk'),
						'section'  => 'munk_layout_site_header_primary',
					),					
				),			
				
				// Color Settings
				'munk_color_header_primary_ed' => array(					
					'output'    => array(
						array (
							'bgcolor-header' => array(							  
							  'selector'  => '.site-header, .munk-header-items .header-item.wc-header-cart .widget_shopping_cart, .munk-header-search-form',
							  'property'  => 'background-color',
							),
							'text' => array(							  
							  'selector'   => '.site-header, .site-header .site-branding p, .munk-header-items .munk-header-elements .header-item.header-contact li *',
							  'property'  => 'color',
							),			
							'link' => array(							  
							  'selector'   => '.site-header .site-branding h1 a, .munk-header-items .munk-header-elements .header-item.header-contact li a, .munk-header-items .header-item.wc-header-cart .product_list_widget li a',
							  'property'  => 'color',
							),
							'hover' => array(							  
							  'selector'   => '.site-header .site-branding h1 a:hover, .munk-header-items .munk-header-elements .header-item.header-contact li a:hover, .munk-header-items .header-item.wc-header-cart .product_list_widget li a:hover',
							  'property'  => 'color',
							),		
						)
					),												
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_multi_color_sanitization' ),
						'transport' => 'postMessage'
					),
					'control' => array(
						'label' => '',			
						'priority' => 18,
						'type'    => 'multi_color',
						'section' => 'munk_layout_site_header_primary',						
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
								'link'    => __( 'Link  Color', 'munk' ),
								'hover'   => __( 'Hover  Color', 'munk' ),
							),                    
						),							
					),					
				),		
								
				
				//Header Elements
				
				//Default For all Headers
				'munk_primary_header_three_element' => array(
					'setting' => array(							
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
					),
					'control' => array(
						'type'        => 'pill_checkbox',						
						'label'       => __( 'Header Elements', 'munk' ),
						'section'     => 'munk_layout_site_header_primary',
						'choices'     => array(
							'munk_header_button' 	=> __( 'Button', 'munk' ),
							'munk_search_trigger' 	=> __( 'Search', 'munk' ),
							'munk_wc_cart_icon' 	=> __( 'Cart Icon', 'munk' ),
							'munk_wc_account_icon' 	=> __( 'My Account Icon', 'munk' ),
							'munk_header_contact' 	=> __( 'Contact Info', 'munk' ),
						),
						'priority'  => 20,
						'transport' => 'refresh',
						'input_attrs' => array(
							'sortable' => true,
							'fullwidth' => true,
						),
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_primary_ed',
								'operator' => '==',
								'value'    => 'layout-three',
							),	
						)				
					)
				),
				
				'munk_primary_header_four_element' => array(
					'setting' => array(							
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
					),
					'control' => array(
						'type'        => 'pill_checkbox',						
						'label'       => __( 'Header Elements', 'munk' ),
						'section'     => 'munk_layout_site_header_primary',
						'choices'     => array(
							'munk_header_button' 	=> __( 'Button', 'munk' ),
							'munk_search_trigger' 	=> __( 'Search', 'munk' ),
							'munk_wc_cart_icon' 	=> __( 'Cart Icon', 'munk' ),
							'munk_wc_account_icon' 	=> __( 'My Account Icon', 'munk' ),
							'munk_header_contact' 	=> __( 'Contact Info', 'munk' ),
						),
						'priority'  => 20,
						'transport' => 'refresh',
						'input_attrs' => array(
							'sortable' => true,
							'fullwidth' => true,
						),
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_primary_ed',
								'operator' => '==',
								'value'    => 'layout-four',
							),	
						)				
					)
				),				
				
				'munk_primary_header_five_element' => array(
					'setting' => array(							
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
					),
					'control' => array(
						'type'        => 'pill_checkbox',						
						'label'       => __( 'Header Elements', 'munk' ),
						'section'     => 'munk_layout_site_header_primary',
						'choices'     => array(
							'munk_header_button' 	=> __( 'Button', 'munk' ),
							'munk_search_trigger' 	=> __( 'Search', 'munk' ),
							'munk_wc_cart_icon' 	=> __( 'Cart Icon', 'munk' ),
							'munk_wc_account_icon' 	=> __( 'My Account Icon', 'munk' ),
							'munk_header_contact' 	=> __( 'Contact Info', 'munk' ),
						),
						'priority'  => 20,
						'transport' => 'refresh',
						'input_attrs' => array(
							'sortable' => true,
							'fullwidth' => true,
						),	
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_primary_ed',
								'operator' => '==',
								'value'    => 'layout-five',
							),	
						)							
					)
				),				
				
				//Default For Header 6 left
				'munk_primary_header_six_element_left' => array(
					'setting' => array(							
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
					),
					'control' => array(
						'type'        => 'pill_checkbox',						
						'label'       => __( 'Header Elements - Left', 'munk' ),
						'section'     => 'munk_layout_site_header_primary',
						'choices'     => array(
							'munk_header_button' 	=> __( 'Button', 'munk' ),
							'munk_search_trigger' 	=> __( 'Search', 'munk' ),
							'munk_wc_cart_icon' 	=> __( 'Cart Icon', 'munk' ),
							'munk_wc_account_icon' 	=> __( 'My Account Icon', 'munk' ),
							'munk_header_contact' 	=> __( 'Contact Info', 'munk' ),
						),
						'priority'  => 20,
						'transport' => 'refresh',
						'input_attrs' => array(
							'sortable' => true,
							'fullwidth' => true,
						),
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_primary_ed',
								'operator' => '==',
								'value'    => 'layout-six',
							),	
						)							
					)
				),		
				
				//Default For Header 6 right
				'munk_primary_header_six_element_right' => array(
					'setting' => array(							
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
					),
					'control' => array(
						'type'        => 'pill_checkbox',						
						'label'       => __( 'Header Elements - Right', 'munk' ),
						'section'     => 'munk_layout_site_header_primary',
						'choices'     => array(
							'munk_header_button' 	=> __( 'Button', 'munk' ),
							'munk_search_trigger' 	=> __( 'Search', 'munk' ),
							'munk_wc_cart_icon' 	=> __( 'Cart Icon', 'munk' ),
							'munk_wc_account_icon' 	=> __( 'My Account Icon', 'munk' ),
							'munk_header_contact' 	=> __( 'Contact Info', 'munk' ),
						),
						'priority'  => 20,
						'transport' => 'refresh',
						'input_attrs' => array(
							'sortable' => true,
							'fullwidth' => true,
						),
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_primary_ed',
								'operator' => '==',
								'value'    => 'layout-six',
							),	
						)							
					)
				),	
				
				//Default For Header 7 Top
				'munk_primary_header_seven_element_top' => array(
					'setting' => array(							
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
					),
					'control' => array(
						'type'        => 'pill_checkbox',						
						'label'       => __( 'Header Elements - Top', 'munk' ),
						'section'     => 'munk_layout_site_header_primary',
						'choices'     => array(
							'munk_header_button' 	=> __( 'Button', 'munk' ),
							'munk_search_trigger' 	=> __( 'Search', 'munk' ),
							'munk_wc_cart_icon' 	=> __( 'Cart Icon', 'munk' ),
							'munk_wc_account_icon' 	=> __( 'My Account Icon', 'munk' ),
							'munk_header_contact' 	=> __( 'Contact Info', 'munk' ),
						),
						'priority'  => 20,
						'transport' => 'refresh',
						'input_attrs' => array(
							'sortable' => true,
							'fullwidth' => true,
						),
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_primary_ed',
								'operator' => '==',
								'value'    => 'layout-seven',
							),	
						)							
					)
				),	
				
				//Default For Header 7 Bottom
				'munk_primary_header_seven_element_bottom' => array(
					'setting' => array(							
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
					),
					'control' => array(
						'type'        => 'pill_checkbox',						
						'label'       => __( 'Header Elements - Bottom', 'munk' ),
						'section'     => 'munk_layout_site_header_primary',
						'choices'     => array(
							'munk_header_button' 	=> __( 'Button', 'munk' ),
							'munk_search_trigger' 	=> __( 'Search', 'munk' ),
							'munk_wc_cart_icon' 	=> __( 'Cart Icon', 'munk' ),
							'munk_wc_account_icon' 	=> __( 'My Account Icon', 'munk' ),
							'munk_header_contact' 	=> __( 'Contact Info', 'munk' ),
						),
						'priority'  => 20,
						'transport' => 'refresh',
						'input_attrs' => array(
							'sortable' => true,
							'fullwidth' => true,
						),
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_primary_ed',
								'operator' => '==',
								'value'    => 'layout-seven',
							),	
						)							
					)
				),			
				
				
				//Default For Header 8 Top Right
				'munk_primary_header_eight_element_top_right' => array(
					'setting' => array(							
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
					),
					'control' => array(
						'type'        => 'pill_checkbox',						
						'label'       => __( 'Header Elements - Top Right', 'munk' ),
						'section'     => 'munk_layout_site_header_primary',
						'choices'     => array(
							'munk_header_button' 	=> __( 'Button', 'munk' ),
							'munk_search_trigger' 	=> __( 'Search', 'munk' ),
							'munk_wc_cart_icon' 	=> __( 'Cart Icon', 'munk' ),
							'munk_wc_account_icon' 	=> __( 'My Account Icon', 'munk' ),
							'munk_header_contact' 	=> __( 'Contact Info', 'munk' ),
						),
						'priority'  => 20,
						'transport' => 'refresh',
						'input_attrs' => array(
							'sortable' => true,
							'fullwidth' => true,
						),
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_primary_ed',
								'operator' => '==',
								'value'    => 'layout-eight',
							),	
						)							
					)
				),
				
				//Default For Header 8 Bottom
				'munk_primary_header_eight_element_top_left' => array(
					'setting' => array(							
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
					),
					'control' => array(
						'type'        => 'pill_checkbox',						
						'label'       => __( 'Header Elements - Top Left', 'munk' ),
						'section'     => 'munk_layout_site_header_primary',
						'choices'     => array(
							'munk_header_button' 	=> __( 'Button', 'munk' ),
							'munk_search_trigger' 	=> __( 'Search', 'munk' ),
							'munk_wc_cart_icon' 	=> __( 'Cart Icon', 'munk' ),
							'munk_wc_account_icon' 	=> __( 'My Account Icon', 'munk' ),
							'munk_header_contact' 	=> __( 'Contact Info', 'munk' ),
						),
						'priority'  => 20,
						'transport' => 'refresh',
						'input_attrs' => array(
							'sortable' => true,
							'fullwidth' => true,
						),
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_primary_ed',
								'operator' => '==',
								'value'    => 'layout-eight',
							),	
						)							
					)
				),
				
				//Default For Header 8 Bottom
				'munk_primary_header_eight_element_bottom' => array(
					'setting' => array(							
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
					),
					'control' => array(
						'type'        => 'pill_checkbox',						
						'label'       => __( 'Header Elements - Bottom', 'munk' ),
						'section'     => 'munk_layout_site_header_primary',
						'choices'     => array(
							'munk_header_button' 	=> __( 'Button', 'munk' ),
							'munk_search_trigger' 	=> __( 'Search', 'munk' ),
							'munk_wc_cart_icon' 	=> __( 'Cart Icon', 'munk' ),
							'munk_wc_account_icon' 	=> __( 'My Account Icon', 'munk' ),
							'munk_header_contact' 	=> __( 'Contact Info', 'munk' ),
						),
						'priority'  => 20,
						'transport' => 'refresh',
						'input_attrs' => array(
							'sortable' => true,
							'fullwidth' => true,
						),
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_primary_ed',
								'operator' => '==',
								'value'    => 'layout-eight',
							),	
						)							
					)
				),		
				
//				// Header Search Settings
//				'munk_header_element_search_label' => array(					
//					'setting' => array(					
//					),
//					'control' => array(
//						'type'     => 'heading',
//						'priority' => 20,
//						'label'    => __('Header Search', 'munk'),
//						'section'  => 'munk_layout_site_header_primary',
//					),					
//				),			
//				
//				'munk_header_element_search_type' => array(
//					'output' => array(
//					),						
//					'setting' => array(						
//						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
//						'transport' 		=> 'postMessage',
//					),
//					'control' => array(
//						'is_default_type' => true,
//						'type'     => 'select',						
//						'priority' => 20,
//						'label'    => __( 'Search Form Layout', 'munk' ),
//						'section'  => 'munk_layout_site_header_primary',
//						'choices'  => array(
//								'inline' 	  => __( 'Inline Form', 'munk' ),
//								'fullscreen' => __( 'Full Screen Overlay', 'munk' ),		
//						),						
//					),
//				),					
				
				// Header Button Settings
				'munk_header_element_button_label' => array(					
					'setting' => array(					
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 20,
						'label'    => __('Header Button', 'munk'),
						'section'  => 'munk_layout_site_header_primary',
					),					
				),			
				
				'munk_header_element_button_text' => array(
					'output' => array(
					),						
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
						'transport' 		=> 'postMessage',
					),
					'control' => array(
						'is_default_type' => true,
						'type'     => 'text',						
						'priority' => 20,
						'label'    => __( 'Button Text', 'munk' ),
						'section'  => 'munk_layout_site_header_primary',						
					),
				),	
				
				'munk_header_element_button_url' => array(
					'output' => array(
					),						
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
						'transport' 		=> 'postMessage',
					),
					'control' => array(
						'is_default_type' => true,
						'type'     => 'text',						
						'priority' => 20,
						'label'    => __( 'Button URL', 'munk' ),
						'section'  => 'munk_layout_site_header_primary',						
					),
				),	
				
				'munk_header_element_button_url_nw' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
					),
					'control' => array(
						'type'     => 'toggle_switch',						
						'priority' => 20,
						'label'    => __( 'Open in New Window?', 'munk' ),
						'section'  => 'munk_layout_site_header_primary',
					),
				),					
				
				
				// Header Content Details Settings
				'munk_header_element_contact_label' => array(					
					'setting' => array(					
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 20,
						'label'    => __('Contact Info', 'munk'),
						'section'  => 'munk_layout_site_header_primary',
					),					
				),			
				
				'munk_header_element_contact_email' => array(
					'output' => array(
					),						
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
						'transport' 		=> 'postMessage',
					),
					'control' => array(
						'is_default_type' => true,
						'type'     => 'text',						
						'priority' => 20,
						'label'    => __( 'Email Address', 'munk' ),
						'section'  => 'munk_layout_site_header_primary',						
					),
				),	
				
				'munk_header_element_contact_phone' => array(
					'output' => array(
					),						
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
						'transport' 		=> 'postMessage',
					),
					'control' => array(
						'is_default_type' => true,
						'type'     => 'text',						
						'priority' => 20,
						'label'    => __( 'Phone Number', 'munk' ),
						'section'  => 'munk_layout_site_header_primary',						
					),
				),		
				
				'munk_header_element_contact_layout' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
					),
					'control' => array(
						'type'     => 'toggle_switch',						
						'priority' => 20,
						'label'    => __( 'Display Inline', 'munk' ),
						'section'  => 'munk_layout_site_header_primary',
					),
				),					
				

			);

			return $elements;

		}

	}

	new Munk_Customize_Layout_Site_Header_Primary();

endif;