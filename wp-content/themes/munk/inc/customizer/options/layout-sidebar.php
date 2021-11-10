<?php
/**
 * Sidebar Options
 *
 * @package munk
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Sidebar' ) ) :


	class Munk_Customize_Layout_Sidebar extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {
			
				$elements = array(						
										
					'munk_sidebar_control_tabs' => array(
						'setting' => array(							
						),
						'control' => array(
							'type'     => 'control_tabs',
							'priority' => 5,
							'label'    => '',
							'section'  => 'munk_layout_sidebar',							
							'controls_general'		=> json_encode( array( '#customize-control-munk_layout_sidebar_padding,#customize-control-munk_layout_sidebar_width,#customize-control-munk_layout_sidebar_sticky') ),
							'controls_design'		=> json_encode( array( '#customize-control-munk_color_main_sidebar,#customize-control-munk_typography_sidebar_widget_title,#customize-control-munk_typography_sidebar_widget_content,#customize-control-munk_sidebar_font_label,#customize-control-munk_sidebar_color_label') ),							
						),					
					),					
					
							
					'munk_layout_sidebar_padding' => array(
						'output'    => array(
							array (							  
							  'selector'  => '#secondary',
							  'property'  => 'padding',
							),								
						),							
						'setting' => array(						
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_dimensions_sanitization' ),							
						), 
						'control' => array(
							'type'     => 'dimensions',													
							'priority' => 10,
							'label'       => __( 'Sidebar Spacing', 'munk' ),
							'description' => __( 'Adjust sidebar spacing', 'munk' ),
							'section'     => 'munk_layout_sidebar',
							'input_attrs' => array(
							'labels' => array(
								'top'  => __( 'Top', 'munk' ),
								'right'  => __( 'Right', 'munk' ),
								'bottom' => __( 'Bottom', 'munk' ),
								'left' => __( 'Left', 'munk' ),
							),
							'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
							),   						
						),
					),			
					
					// sidebar width
					'munk_layout_sidebar_width' => array(						
						'setting' => array(						
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),							
						),
						'control' => array(
							'type'     => 'slider',						
							'priority' => 10,
							'label'    => __( 'Sidebar Width', 'munk' ),
							'section'  => 'munk_layout_sidebar',						
							'choices'  => array(
								'min'  => 10,
								'max'  => 70,
								'step' => 1,
							),
							'input_attrs' => array(
								'unit' => '%',
							),													
						),
					),		
					
					'munk_layout_sidebar_sticky' => array(
						'setting' => array(						
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),
						'control' => array(
							'type'     => 'toggle_switch',						
							'priority' => 15,
							'label'    => __( 'Enable Sticky Sidebar', 'munk' ),
							'section'  => 'munk_layout_sidebar',
						),
					),						

					// Color Settings
					'munk_color_main_sidebar' => array(							
						'output' => array(
							array (							
								'bgcolor' => array(							  
								  'selector'   => '#secondary',
								  'property'   => 'background-color',
								),
								'widget-title' => array(							  
								  'selector'   => '#secondary .widget .widget-title',
								  'property'   => 'color',
								),
								'widget-title-bg' => array(							  
								  'selector'   => '#secondary .widget .widget-title',
								  'property'   => 'background-color',
								),			
								'text' => array(							  
								  'selector'   => '#secondary, #secondary .widget, #secondary .widget p, #secondary ul li, .widget table td',
								  'property'   => 'color',
								),			
								'link' => array(							  
								  'selector'   => '#secondary .widget a, #secondary .widget ul li a',
								  'property'   => 'color',
								),
								'hover' => array(							  
								  'selector'   => '#secondary .widget a:hover, #secondary .widget ul li a:hover',
								  'property'   => 'color',
								),			
							)
						),							
						'setting' => array(							
								'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_multi_color_sanitization' ),
								'transport' => 'postMessage'
						),
						'control' => array(
							'label' => __( 'Sidebar Color', 'munk' ),
							'priority' => 20,
							'type'     => 'multi_color',
							'section' => 'munk_layout_sidebar',						
							'input_attrs' => array(
								'palette' => array(
									'#000000',
									'#222222',
									'#444444',
									'#777777',
								),
								'choices'     => array(
									'bgcolor' => __( 'Background Color', 'munk' ),
									'widget-title' => __( 'Widget Title Color', 'munk' ),			
									'widget-title-bg' => __( 'Widget Title Background Color', 'munk' ),						
									'text'    => __( 'Text Color', 'munk' ),
									'link'    => __( 'Link Color', 'munk' ),
									'hover'   => __( 'Hover Color', 'munk' ),
								),                    
							),						
						),					
					),			

					'munk_sidebar_font_label' => array(
						'setting' => array(							
						),
						'control' => array(
							'type'     => 'heading',
							'priority' => 25,
							'label'       => __('Typography Settings', 'munk'),
							'section'     => 'munk_layout_sidebar',
						),					
					),							

					'munk_typography_sidebar_widget_title' => array(
						'output'    => array(
							array(
							  'selector'   => '#secondary .widget .widget-title',							  
							),	
						),							
						'setting' => array(		
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
						),
						'control' => array(
							'type'     => 'typography',
							'priority' => 30,
							'label'       => __('Widget Title', 'munk'),
							'section'  => 'munk_layout_sidebar',
							'input_attrs' => array(
								'font_count' => 'all',
								'orderby' => 'alpha',
							   'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
							),	
						),					
					),	

					'munk_typography_sidebar_widget_content' => array(
						'output'    => array(
							array(
							  'selector' => '#secondary .widget p, #secondary ul li, #secondary .widget table td, #secondary .widget a, #secondary .widget ul li a, #secondary .widget a:hover, #secondary .widget ul li a:hover',
							),	
						),							
						'setting' => array(				
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
						),
						'control' => array(
							'type'     => 'typography',
							'priority' => 35,
							'label'       => __('Widget Content', 'munk'),
							'section'  => 'munk_layout_sidebar',
							'input_attrs' => array(
								'font_count' => 'all',
								'orderby' => 'alpha',
							   'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
							),	
						),					
					),						
					
			
				);
			return $elements;

		}

	}

	new Munk_Customize_Layout_Sidebar();

endif;