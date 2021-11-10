<?php
/**
 * Above Header
 *
 * @package munk
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Site_Navigation' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Layout_Site_Navigation extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {


			$elements = array(			
				
				// Main Navigation Typograpy Settings
				'munk_typography_main_nav_toggle_label' => array(
					'setting' => array(						
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 3,
						'label'       => __('Menu Typography', 'munk'),
						'section'  => 'munk_layout_site_navigation',
					),					
				),			
				
				// Typography Settings
				'munk_typography_main_nav_ed' => array(
					'output'    => array(
						array(
						  'selector'   => '.munk-header .navbar .navbar-nav .menu-item, .munk-header .navbar a, .munk-header .navbar .navbar-nav .menu-item, .munk-header .navbar a, .navbar ul li a',
						),
					),						
					'setting' => array(	
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
					),
					'control' => array(
						'type'     => 'typography',
						'priority' => 5,
						'label'    => '',
						'section'  => 'munk_layout_site_navigation',
						'input_attrs' => array(
							'font_count' => 'all',
							'orderby' => 'alpha',
						    'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
						),	
					),					
				),																	
				
				// Main Nav Color Settings
				'munk_color_main_nav_label' => array(
					'setting' => array(						
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 10,
						'label'    => __('Main Navigation', 'munk'),
						'section'  => 'munk_layout_site_navigation',
					),					
				),			
				
				// Main Nav Color Settings
				'munk_color_main_nav_ed' => array(
					'output'    => array(
						array (
							'bgcolor' => array(						  
							  'selector'   => '.munk-header.layout-two .navbar, .munk-header.layout-one .navbar',
							  'property'  => 'background-color',
							),
							'link' => array(						  
							  'selector'   => '.munk-header .navbar .navbar-nav .menu-item, .munk-header .navbar a, .munk-header .navbar .navbar-nav .menu-item, .munk-header .navbar a, .munk-header .navbar ul li a',
							  'property'  => 'color',
							),
							'hover' => array(						  
							  'selector'   => '.munk-header .navbar .navbar-nav .menu-item:hover, .munk-header .navbar a:hover',
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
						'section'  => 'munk_layout_site_navigation',						
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
								'hover'   => __( 'Hover  Color', 'munk' ),
							),                    
						),	
					),					
				),
				
				// Dropdown Nav Color Settings
				'munk_color_main_nav_submenu_label' => array(
					'setting' => array(						
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 20,
						'label'       => __('Main Navigation Dropdown', 'munk'),
						'section'  => 'munk_layout_site_navigation',
					),					
				),			
				
				// Dropdown Nav Color Settings
				'munk_color_main_nav_submenu' => array(
					'output' => array(
						array (						
							'bgcolor' => array(						  
							  'selector'   => '.munk-header .navbar ul ul,.munk-header .navbar ul ul ul,.munk-header .navbar ul ul li a, .munk-header .navbar ul:not(.sub-menu) li.menu-item-has-children:hover > a',
							  'property'  => 'background-color',
							),
							'link' => array(						  
							  'selector'   => '.munk-header .navbar ul ul li a, .munk-header .navbar ul ul ul li a,.munk-header .navbar ul li.menu-item-has-children:hover a',
							  'property'  => 'color',
							),
							'hover' => array(						  
							  'selector'   => '.munk-header .navbar ul ul li a:hover, .munk-header .navbar ul ul ul li a:hover, .munk-header .navbar ul li.menu-item-has-children:hover a:hover',
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
						'priority' => 25,
						'type'     => 'multi_color',
						'section' => 'munk_layout_site_navigation',						
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
								'hover'   => __( 'Hover  Color', 'munk' ),
							),                    
						),	
					),					
				),																																								
				

			);

			return $elements;

		}

	}

	new Munk_Customize_Layout_Site_Navigation();

endif;