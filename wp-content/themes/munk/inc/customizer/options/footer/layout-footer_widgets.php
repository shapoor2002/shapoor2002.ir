<?php
/**
 * Layout Footer - Widget Area
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Footer_Widgets_Area' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Layout_Footer_Widgets_Area extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {


			$elements = array(
				
				'munk_layout_footer_control_tabs' => array(
					'setting' => array(							
					),
					'control' => array(
						'type'     => 'control_tabs',
						'priority' => 1,
						'label'    => '',
						'section'  => 'munk_layout_footer_widgets_area',							
						'controls_general'		=> json_encode( array( '#customize-control-munk_layout_footer_ed,#customize-control-munk_layout_footer_container,#customize-control-munk_layout_footer_visibility' )),
						'controls_design'		=> json_encode( array( '#customize-control-munk_layout_footer_spacing,#customize-control-munk_layout_footer_widget_spacing,#customize-control-munk_color_footer_main_label,#customize-control-munk_color_footer_widgets,#customize-control-munk_footer_typography_label,#customize-control-munk_typography_footer_widget_title,#customize-control-munk_typography_footer_widget_content' )),
					),					
				),					
				
				'munk_layout_footer_ed' => array(
					'setting' => array(					
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
					),
					'control' => array(
						'type'     => 'select',
						'is_default_type' => true,
						'priority' 	  => 5,
						'label'       => __( 'Footer Widgets Area Layout', 'munk' ),
						'section'     => 'munk_layout_footer_widgets_area',						
						'description' => __( 'Select Footer Widget Columns', 'munk' ),
						'choices'     => array(
							'none' 		=> __( 'Disable Footer Widgets', 'munk' ),	
							'one-col' 	=> __( 'One Column', 'munk' ),
							'two-col' 	=> __( 'Two Columns', 'munk' ),
							'two-col-wide-left' 	=> __( 'Two Columns Left Wide', 'munk' ),
							'two-col-wide-right' 	=> __( 'Two Columns Right Wide', 'munk' ),
							'three-col' => __( 'Three Columns', 'munk' ),	
							'three-col-wide-left' 	=> __( 'Three Columns Left Wide', 'munk' ),
							'three-col-wide-right' 	=> __( 'Three Columns Right Wide', 'munk' ),							
							'four-col' 	=> __( 'Four Columns', 'munk' ),				
							'four-col-wide-left' 	=> __( 'Four Columns Left Wide', 'munk' ),
							'four-col-wide-right' 	=> __( 'Four Columns Right Wide', 'munk' ),																	
						),
					),
				),	
				
				'munk_layout_footer_container' => array(
					'setting' => array(							
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
						'transport' 		=> 'postMessage',
					),				
					'control' => array(
						'type'        => 'text_radio_buttons',							
						'label'       => __( 'Container Type', 'munk' ),
						'section'     => 'munk_layout_footer_widgets_area',						
						'priority'    => 10,		
						'choices' => array(
							'container' 	=> 'Contained',													
							'container-fluid' 	=> 'Full Width',
						)						
					)
				),
				
				'munk_layout_footer_visibility' => array(
					'setting' => array(							
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),						
					),				
					'control' => array(
						'type'        => 'text_radio_buttons',							
						'label'       => __( 'Visibility', 'munk' ),
						'section'     => 'munk_layout_footer_widgets_area',						
						'priority'    => 11,		
						'choices' => array(
							'all' 	=> 'Desktop + Mobile',													
							'desktop' 	=> 'Desktop Only',
							'mobile' 	=> 'Mobile Only',
						)						
					)
				),		
								
				'munk_layout_footer_spacing' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),
						'transport' => 'postMessage'
					),
					'control' => array(
						'type'     => 'slider',						
						'priority' => 10,
						'label'    => __( 'Vertical Spacing', 'munk' ),
						'section'  => 'munk_layout_footer_widgets_area',						
						'choices'  => array(
							'min'  => 20,
							'max'  => 200,
							'step' => 1,
						),
						'input_attrs' => array(
							'unit' => 'PX',
						),														
					),
				),
				
				'munk_layout_footer_widget_spacing' => array(
					'output'    => array(
						array(
							'selector' => '.site-footer .footer-widgets-grid',
							'property' => 'gap',
							'unit' 	   => 'px',
						),
					),						
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),
						'transport' => 'postMessage'
					),
					'control' => array(
						'type'     => 'slider',						
						'priority' => 10,
						'label'    => __( 'Widget Column Spacing', 'munk' ),
						'section'  => 'munk_layout_footer_widgets_area',						
						'choices'  => array(
							'min'  => 10,
							'max'  => 200,
							'step' => 1,
						),
						'input_attrs' => array(
							'unit' => 'PX',
						),														
					),
				),				
				
				'munk_color_footer_main_label' => array(
					'setting' => array(						
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 10,
						'label'    => __('Color Settings', 'munk'),
						'section'  => 'munk_layout_footer_widgets_area',					
					),					
				),					
				
				'munk_color_footer_widgets' => array(
					'output'    => array(
						array (
							'bgcolor' => array(						  
							  'selector'  => '.site-footer',
							  'property'  => 'background-color',
							),
							'widget-title' => array(						  
							  'selector'  => '.site-footer .footer-t .widget-title',
							  'property'  => 'color',
							),
							'text' => array(						  
							  'selector'  => '.site-footer .footer-t, .site-footer .footer-t .widget, .site-footer .footer-t .widget p, .site-footer .footer-t ul li, .site-footer .widget.widget_calendar table td',
							  'property'  => 'color',
							),			
							'link' => array(						  
							  'selector'  => '.site-footer .footer-t .widget a, .site-footer .footer-t .widget ul li a',
							  'property'  => 'color',
							),
							'hover' => array(						  
							  'selector'  => '.site-footer .footer-t .widget a:hover, .site-footer .footer-t .widget ul li a:hover',
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
						'priority' => 15,
						'type'     => 'multi_color',
						'section'  => 'munk_layout_footer_widgets_area',						
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
								'text'    => __( 'Text Color', 'munk' ),
								'link'    => __( 'Link Color', 'munk' ),
								'hover'   => __( 'Hover Color', 'munk' ),
							),                    
						),							
					),					
				),		
				
				'munk_footer_typography_label' => array(
					'setting' => array(
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 20,
						'label'    => __('Typography Settings', 'munk'),
						'section'  => 'munk_layout_footer_widgets_area',					
					),					
				),		
				
				'munk_typography_footer_widget_title' => array(
					'output'    => array(
						array(
						  'selector'   => '.site-footer .footer-t .widget-title',
						),	
					),						
					'setting' => array(
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
					),
					'control' => array(
						'type'     => 'typography',
						'priority' => 25,
						'label'    => __('Widget Title', 'munk'),
						'section'  => 'munk_layout_footer_widgets_area',
						'input_attrs' => array(
							'font_count' => 'all',
							'orderby' => 'alpha',
						   'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
						),						
					),					
				),			
				
				'munk_typography_footer_widget_content' => array(
					'output'    => array(
						array(
						  'selector'   => '.site-footer, .site-footer .footer-t, .site-footer .footer-t .widget, .site-footer .footer-t .widget p, .site-footer .footer-t ul li, .site-footer .widget.widget_calendar table td, .site-footer .footer-t .widget a, .site-footer .footer-t .widget ul li a, .site-footer .footer-t .widget a:hover, .site-footer .footer-t .widget ul li a:hover',
						),	
					),						
					'setting' => array(
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
					),
					'control' => array(
						'type'     => 'typography',
						'priority' => 30,
						'label'       => __('Widget Content', 'munk'),
						'section'     => 'munk_layout_footer_widgets_area',
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

	new Munk_Customize_Layout_Footer_Widgets_Area();

endif;