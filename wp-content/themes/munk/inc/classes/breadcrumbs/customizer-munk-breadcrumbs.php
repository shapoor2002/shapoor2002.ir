<?php
/**
 * Munk Breadcrumbs Customizer Options
 *
 * @package    Munk
 * @since      2.0.6
 * @author     MetricThemes <support@metricthemes.com> 
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Register_Breadcrumb' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Register_Breadcrumb extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {
			
				$elements = array(		
					
					'munk_breadcrumb_control_tabs' => array(
						'setting' => array(							
						),
						'control' => array(
							'type'     => 'control_tabs',
							'priority' => 1,
							'label'    => '',
							'section'  => 'munk_breadcrumb_settings',							
							'controls_general'		=> json_encode( array( '#customize-control-munk_breadcrumb_ed,#customize-control-munk_ed_breadcrumb_display,#customize-control-munk_breadcrumb_ed_blog,#customize-control-munk_breadcrumb_ed_archive,#customize-control-munk_breadcrumb_ed_search,#customize-control-munk_breadcrumb_ed_single_post,#customize-control-munk_breadcrumb_ed_single_page,#customize-control-munk_breadcrumb_ed_404,#customize-control-munk_breadcrumb_current_ed,#customize-control-munk_breadcrumb_home_text,#customize-control-munk_breadcrumb_separator' )),
							'controls_design'		=> json_encode( array( '#customize-control-munk_breadcrumb_alignment,#customize-control-munk_heading_breadcrumb_typography,#customize-control-munk_breadcrumb_typography,#customize-control-munk_breadcrumbs_colors_label,#customize-control-munk_breadcrumbs_colors_ed' )),
						),					
					),					
					
					'munk_breadcrumb_ed' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'    	=> 'toggle_switch',											
							'label'     => __( 'Enable Breadcrumbs', 'munk' ),
							'section' 	=> 'munk_breadcrumb_settings',							
							'priority'	=> 5,							
						)
					),					
					
					'munk_ed_breadcrumb_display' => array(
						'setting' => array(							
						),
						'control' => array(
							'type'     => 'heading',
							'priority' => 10,
							'label'       => __('Display Settings', 'munk'),
							'section'     => 'munk_breadcrumb_settings',
						),					
					),											
					
					'munk_breadcrumb_ed_blog' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'    	=> 'checkbox',				
							'is_default_type' => true,		
							'label'     => __( 'Blog', 'munk' ),
							'section' 	=> 'munk_breadcrumb_settings',							
							'priority'	=> 11,							
						)
					),						
					
					'munk_breadcrumb_ed_archive' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'    	=> 'checkbox',				
							'is_default_type' => true,		
							'label'     => __( 'Category/Tag Archives', 'munk' ),
							'section' 	=> 'munk_breadcrumb_settings',							
							'priority'	=> 11,							
						)
					),	
					
					'munk_breadcrumb_ed_search' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'    	=> 'checkbox',				
							'is_default_type' => true,		
							'label'     => __( 'Search', 'munk' ),
							'section' 	=> 'munk_breadcrumb_settings',							
							'priority'	=> 11,							
						)
					),	
					
					'munk_breadcrumb_ed_single_post' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'    	=> 'checkbox',				
							'is_default_type' => true,		
							'label'     => __( 'Single Post', 'munk' ),
							'section' 	=> 'munk_breadcrumb_settings',							
							'priority'	=> 11,							
						)
					),		
					
					'munk_breadcrumb_ed_single_page' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'    	=> 'checkbox',				
							'is_default_type' => true,		
							'label'     => __( 'Single Page', 'munk' ),
							'section' 	=> 'munk_breadcrumb_settings',							
							'priority'	=> 11,							
						)
					),							
					
					'munk_breadcrumb_current_ed' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'    	=> 'toggle_switch',											
							'label'     => __( 'Show Current Page Title', 'munk' ),
							'section' 	=> 'munk_breadcrumb_settings',							
							'priority'	=> 15,							
						)
					),			
					
					'munk_breadcrumb_home_text' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),							
						),					
						'control' => array(						
							'type'     => 'text',
							'is_default_type' => true,									
							'label'     => __( 'Home Text', 'munk' ),
							'section'  => 'munk_breadcrumb_settings',							
							'priority' => 20,				
						)	
					),				
					
					'munk_breadcrumb_separator' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),						
						),				
						'control' => array(
							'type'        => 'text_radio_buttons',							
							'label'       => __( 'Separator', 'munk' ),
							'section'     => 'munk_breadcrumb_settings',						
							'priority'    => 25,		
							'choices' => array(
								'icon-one' 	=> '&rsaquo;',
								'icon-two' 	=> '&raquo;',
								'icon-three' => '&#47;',
							)						
						)
					),		
					
					'munk_breadcrumb_alignment' => array(
						'output' => array(
							array(
								'selector'  => '.munk-header',
								'property' => 'text-align',
							),
						),						
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
							'transport' => 'postMessage'
						),				
						'control' => array(
							'type'        => 'text_radio_buttons',							
							'label'       => __( 'Horizontal Alignment', 'munk' ),
							'section'     => 'munk_breadcrumb_settings',						
							'priority'    => 35,		
							'choices' => array(
								'left' 		=> '<svg width="16" height="13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h10v1H0zM0 4h16v1H0zM0 8h10v1H0zM0 12h16v1H0z"/></svg>',
								'center' 	=> '<svg width="16" height="13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 0h10v1H3zM0 4h16v1H0zM3 8h10v1H3zM0 12h16v1H0z"/></svg>',
								'right' 	=> '<svg width="16" height="13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 0h10v1H6zM0 4h16v1H0zM6 8h10v1H6zM0 12h16v1H0z"/></svg>',
							)						
						)
					),					
					
					'munk_heading_breadcrumb_typography' => array(
						'setting' => array(							
						),
						'control' => array(
							'type'     => 'heading',
							'priority' => 35,
							'label'       => __('Typography Settings', 'munk'),
							'section'     => 'munk_breadcrumb_settings',
						),					
					),			
					
					// breadcrumbs typography settings
					'munk_breadcrumb_typography' => array(
						'output'  => array(
							array(
								'selector' => '.munk-breadcrumb, .munk-breadcrumb a, .munk-breadcrumb p',
							),
						),					
						'setting' => array(	
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
						),
						'control' => array(
							'type'     => 'typography',
							'priority' => 40,
							'label'       => '',		
							'section'     => 'munk_breadcrumb_settings',
							'input_attrs' => array(
								'font_count' => 'all',
								'orderby' => 'alpha',
							   'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
							),	
						),					
					),			
					
					'munk_breadcrumbs_colors_label' => array(
						'setting' => array(							
						),
						'control' => array(
							'type'     => 'heading',
							'priority' => 45,
							'label'       => __('Color Settings', 'munk'),
							'section'     => 'munk_breadcrumb_settings',
						),					
					),	
					
					'munk_breadcrumbs_colors_ed' => array(					
						'output'    => array(
							array (
								'bgcolor' => array(							  
								  'selector'  => '.munk-breadcrumb',
								  'property'  => 'background-color',
								),
								'text' => array(							  
								  'selector'  => '.munk-breadcrumb, .munk-breadcrumb .trail-items li',
								  'property'  => 'color',
								),			
								'link' => array(							  
									'selector'  => '.munk-breadcrumb a, .munk-breadcrumb .trail-items li a, .munk-breadcrumb .trail-items li a:visited',
									'property'  => 'color',
								),		
								'hover' => array(							  
									'selector'  => '.munk-breadcrumb a:hover, .munk-breadcrumb .trail-items li a:hover,.munk-breadcrumb .trail-items li a:active',
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
							'priority' => 50,
							'type'    => 'multi_color',						
							'section' => 'munk_breadcrumb_settings',						
							'input_attrs' => array(
								'palette' => array(
									'#FFFFFF',
									'#222222',
									'#444444',
									'#777777',
								),
								'choices'     => array(
									'bgcolor' => __( 'Background Color', 'munk' ),
									'text'    => __( 'Text Color', 'munk' ),
									'link'    => __( 'Link Color', 'munk' ),
									'hover'    => __( 'Border Color', 'munk' ),
								),                    
							),							
						),					
					),																						
					
			
				);
			return $elements;

		}

	}

	new Munk_Customize_Register_Breadcrumb();

endif;