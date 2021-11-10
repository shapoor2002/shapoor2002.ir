<?php
/**
 * Munk Block Editor Settings
 *
 * @package munk
 *
 * @since 1.2.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Add CSS to the admin side of the block editor.
 *
 * @since 1.2.0
 */
if ( ! function_exists( 'munk_enqueue_block_editor_assets' ) ) :
function munk_enqueue_block_editor_assets() {
    
	wp_enqueue_script( 'munk-block-editor', get_template_directory_uri() . '/assets/js/editor.js', array( 'jquery' ), MUNK_THEME_VERSION, true );               
    
    $munk_layout_container_default_ed = get_theme_mod('munk_layout_container_default_ed', 'default');

    // Localize the script with new data
    $translation_array = array(
        'munk_container_ed' => esc_attr($munk_layout_container_default_ed),     
    );
    
    wp_localize_script( 'munk-block-editor', 'Munk_Editor_Arr', $translation_array );    

}
add_action( 'enqueue_block_editor_assets', 'munk_enqueue_block_editor_assets' );
endif;

/**
 * Gutenberg layout check
 * 
 * @return string
 */
if ( ! function_exists( 'munk_block_editor_type_check' ) ) :
function munk_block_editor_type_check() {

    $munk_layout_ed = '';                
    
    $screen = get_current_screen();
    
	if( $screen->is_block_editor() ) {		
    
        $post_type_ed = $screen->post_type;

        $munk_layout_ed = '';                

        if ($post_type_ed == 'page') {    
            $munk_layout_ed = get_theme_mod('munk_layout_single_page_ed', 'right-sidebar');
        }
        elseif ($post_type_ed == 'post') {
            $munk_layout_ed = get_theme_mod('munk_layout_single_post_ed', 'right-sidebar');
        }                         

        return esc_attr($munk_layout_ed);
        
    }
    
    return esc_attr($munk_layout_ed);
    
}
endif;
/**
 * Gutenberg layout class 
 *
 * @param string $classes
 * @return string
 */
if ( ! function_exists( 'munk_block_editor_body_class' ) ) :
function munk_block_editor_body_class( $classes ) {    
    
	$screen = get_current_screen();
	if( ! $screen->is_block_editor() )
		return $classes;
	
	$post_id = isset( $_GET['post'] ) ? intval( $_GET['post'] ) : false;
    
	if( $post_id ) {
        
        //check sidebar    
        $sidebar_ed = get_post_meta( $post_id, 'munk_settings_main_sidebar', true );     
        if ($sidebar_ed && $sidebar_ed != 'default') {
            $classes .= ' munk-sidebar-type-'. esc_attr($sidebar_ed). ' ';	
        }
        else {
            $classes .= ' munk-sidebar-type-'.  munk_block_editor_type_check() . ' ';            
        }                
        
        //check container
        $container_ed = get_post_meta( $post_id, 'munk_settings_page_container', true );     
        if ($container_ed && $container_ed != 'default') {
            $classes .= ' munk-container-type-'. esc_attr($container_ed). ' ';	
        }
        else {
            $classes .= ' munk-container-type-'. esc_attr(get_theme_mod('munk_layout_container_default_ed', 'default')). ' ';	          
        }  
        
        //check padding
        $padding_ed = get_post_meta( $post_id, 'munk_settings_disable_content_padding', true );     
        if ($padding_ed) {
            $classes .= ' munk-disable-padding ';	
        }  
        
    }
    
    else {
        $munk_layout_single_page_ed = munk_block_editor_type_check();            
        $munk_layout_container_default_ed = get_theme_mod('munk_layout_container_default_ed', 'default');           
        $classes .= ' munk-sidebar-type-' . esc_attr($munk_layout_single_page_ed) . ' ';
        $classes .= ' munk-container-type-' . esc_attr($munk_layout_container_default_ed) . ' ';
    }
    
	return $classes;
}
add_filter( 'admin_body_class', 'munk_block_editor_body_class' );
endif;

/**
 * Gutenberg layout inline styles 
 * 
 * @return css
 */
if ( ! function_exists( 'munk_block_editor_inline_style' ) ) :
function munk_block_editor_inline_style() {
    
    $screen = get_current_screen();
	if( $screen->is_block_editor() ) {		
        
        //padding check
        $munk_page_padding = get_theme_mod('munk_layout_single_page_entry_padding', array('padding_top'=> '45px','padding_right'=> '45px','padding_bottom'=> '45px','padding_left'=> '45px'));

        //container check
        $munk_layout_single_page_ed = munk_block_editor_type_check();            
        $munk_layout_container_default_ed = get_theme_mod('munk_layout_container_default_ed', 'default');   

        // get customizer container widths            
        $munk_layout_default_container_width        = get_theme_mod('munk_layout_default_container_width', '1140'); //default  
        $munk_layout_boxed_container_inner_width    = get_theme_mod('munk_layout_boxed_container_inner_width', '1140'); // boxed
        $munk_layout_contained_container_width      = get_theme_mod('munk_layout_contained_container_width', '1140'); // fullwidth-container  

        //body background color
        $body_background_color = get_theme_mod('background_color', 'f5f6f7');                
        $body_background_color_fullwidth_contained = get_theme_mod('munk_color_general_bgcolor', '#ffffff');                
        ?>

                    <style type='text/css' media='all' id="munk_editor_inline_styles">                                                   
                            
                            .block-editor-writing-flow  {
                                padding-top: <?php echo esc_attr($munk_page_padding['padding_top']); ?>;
                                padding-right: <?php echo esc_attr( $munk_page_padding['padding_right']); ?>;
                                padding-bottom: <?php echo esc_attr( $munk_page_padding['padding_bottom']); ?>;
                                padding-left: <?php echo esc_attr( $munk_page_padding['padding_left']); ?>;
                            }          

                            body.munk-disable-padding .block-editor-writing-flow {
                                padding: 0px;                                
                            }   
                    
                            body .edit-post-visual-editor>.block-editor__typewriter {
                                background-color: #<?php echo esc_attr( $body_background_color ); ?>;                                
                            }
                        
                            body.munk-container-type-fullwidth-contained .edit-post-visual-editor>.block-editor__typewriter {
                                background-color: <?php echo esc_attr( $body_background_color_fullwidth_contained ); ?>;                                
                            }                        
                    
                            body .block-editor-writing-flow {    
                                margin: 0 auto;                                
                            }
                            
                            /* Default Container */
                            .munk-sidebar-type-left-sidebar.munk-container-type-default .block-editor-writing-flow,
                            .munk-sidebar-type-right-sidebar.munk-container-type-default .block-editor-writing-flow,
                            .munk-sidebar-type-left-sidebar.munk-container-type-default .wp-block,
                            .munk-sidebar-type-right-sidebar.munk-container-type-default .wp-block {                                   
                                max-width: calc(<?php echo esc_attr( $munk_layout_default_container_width ); ?>px - 410px);
                            }                                                                                          
                            .munk-sidebar-type-no-sidebar.munk-container-type-default .block-editor-writing-flow {      
                                max-width: <?php echo esc_attr( $munk_layout_default_container_width ); ?>px;
                            }                       
                            .munk-sidebar-type-no-sidebar.munk-container-type-default .wp-block {
                                max-width: <?php echo esc_attr( $munk_layout_default_container_width ); ?>px;
                            }
                    
                            /* Boxed Container */                        
                            .munk-sidebar-type-left-sidebar.munk-container-type-boxed .block-editor-writing-flow,
                            .munk-sidebar-type-right-sidebar.munk-container-type-boxed .block-editor-writing-flow,
                            .munk-sidebar-type-left-sidebar.munk-container-type-boxed .wp-block,
                            .munk-sidebar-type-right-sidebar.munk-container-type-boxed .wp-block {    
                                max-width: calc(<?php echo esc_attr( $munk_layout_boxed_container_inner_width ); ?>px - 410px);
                            }                                                                                          
                            .munk-sidebar-type-no-sidebar.munk-container-type-boxed .block-editor-writing-flow,
                            .munk-sidebar-type-no-sidebar.munk-container-type-boxed .wp-block {   
                                max-width: <?php echo esc_attr( $munk_layout_boxed_container_inner_width ); ?>px;
                            }                                          
                    
                            /* Full Width Contained Container */                        
                            .munk-sidebar-type-left-sidebar.munk-container-type-fullwidth-contained .block-editor-writing-flow,
                            .munk-sidebar-type-right-sidebar.munk-container-type-fullwidth-contained .block-editor-writing-flow,
                            .munk-sidebar-type-left-sidebar.munk-container-type-fullwidth-contained .wp-block,
                            .munk-sidebar-type-right-sidebar.munk-container-type-fullwidth-contained .wp-block {  
                                 max-width: calc(<?php echo esc_attr( $munk_layout_contained_container_width ); ?>px - 410px);
                            }                                                                                          
                            .munk-sidebar-type-no-sidebar.munk-container-type-fullwidth-contained .block-editor-writing-flow {
                                max-width: none;
								margin: 0px auto;
                            }
                            .munk-sidebar-type-no-sidebar.munk-container-type-fullwidth-contained .wp-block {   
                                 max-width: <?php echo esc_attr( $munk_layout_contained_container_width ); ?>px;								 
                            }                  
													
                            .munk-sidebar-type-no-sidebar.munk-container-type-fullwidth-contained .wp-block[data-align="wide"] {   
								max-width: calc(<?php echo esc_attr( $munk_layout_contained_container_width ); ?>px + 20%);								
                            } 
                            .munk-sidebar-type-no-sidebar.munk-container-type-fullwidth-contained .wp-block[data-align="full"] {                                   
								max-width: 100vw;                                								
                            }                         
                    
                            /* Fluid Container */                        
                            .munk-sidebar-type-left-sidebar.munk-container-type-fluid .block-editor-writing-flow,
                            .munk-sidebar-type-right-sidebar.munk-container-type-fluid .block-editor-writing-flow,
                            .munk-sidebar-type-left-sidebar.munk-container-type-fluid .wp-block,
                            .munk-sidebar-type-right-sidebar.munk-container-type-fluid .wp-block {  
                                max-width: calc(100% - 410px);
                            }                                                                                          
                            .munk-sidebar-type-no-sidebar.munk-container-type-fluid .block-editor-writing-flow {
                            max-width: none;    
                            }
                            .munk-sidebar-type-no-sidebar.munk-container-type-fluid .wp-block {   
                                max-width: 100%;
                            }   
                            body.munk-editor-disable-title .edit-post-visual-editor__post-title-wrapper {
                                opacity: 0.2;
                            }																							
                        

                    </style>

        <?php
        
    }
}
add_action('admin_head', 'munk_block_editor_inline_style');
endif;

/**
 * Gutenberg layout inline styles from Customizer Settings
 * 
 * @return css
 */
if ( ! function_exists( 'munk_block_editor_customizer_inline_style' ) ) :
function munk_block_editor_customizer_inline_style() {
    
    $screen = get_current_screen();
	if( $screen->is_block_editor() ) {		
		
		$munk_customizer_defaults = munk_customizer_defaults();
        
        $munk_color_sale_ed 			= json_decode(get_theme_mod('munk_color_sale_ed', $munk_customizer_defaults['munk_color_sale_ed']), true);		
		$munk_color_primary_button 		= json_decode(get_theme_mod('munk_color_primary_button', $munk_customizer_defaults['munk_color_primary_button']), true);
		$munk_typography_primary_button = json_decode(get_theme_mod('munk_typography_primary_button', $munk_customizer_defaults['munk_typography_primary_button']), true);
		
		
		$munk_color_general_bgcolor 	= get_theme_mod('munk_color_general_bgcolor', $munk_customizer_defaults['munk_color_general_bgcolor']);
		$munk_color_general_title_color = get_theme_mod('munk_color_general_title_color', $munk_customizer_defaults['munk_color_general_title_color']);
		$munk_color_general_text_color 	= get_theme_mod('munk_color_general_text_color', $munk_customizer_defaults['munk_color_general_text_color']);
		$munk_color_general_link_color 	= get_theme_mod('munk_color_general_link_color', $munk_customizer_defaults['munk_color_general_link_color']);
		$munk_color_general_link_hover 	= get_theme_mod('munk_color_general_link_hover', $munk_customizer_defaults['munk_color_general_link_hover']); 
		
		//base content font
		$munk_typography_general_content = json_decode(get_theme_mod('munk_typography_general_content', $munk_customizer_defaults['munk_typography_general_content']), true);
		
		//post/page title font
		$munk_typography_general_post_title = json_decode(get_theme_mod('munk_typography_general_post_title', $munk_customizer_defaults['munk_typography_general_post_title']), true);
		
		//post/page content font
		$munk_typography_general_post_content = json_decode(get_theme_mod('munk_typography_general_post_content', $munk_customizer_defaults['munk_typography_general_post_content']), true);
		
		//h1 font
		$munk_typography_general_post_h1 = json_decode(get_theme_mod('munk_typography_general_post_h1', $munk_customizer_defaults['munk_typography_general_post_h1']), true);

		//h2 font
		$munk_typography_general_post_h2 = json_decode(get_theme_mod('munk_typography_general_post_h2', $munk_customizer_defaults['munk_typography_general_post_h2']), true);

		//h3 font
		$munk_typography_general_post_h3 = json_decode(get_theme_mod('munk_typography_general_post_h3', $munk_customizer_defaults['munk_typography_general_post_h3']), true);
	
		
        ?>

                    <style type='text/css' media='all' id="munk_editor_inline_styles_fonts">   												
												
						body .block-editor-writing-flow {
							background-color: <?php echo esc_attr($munk_color_general_bgcolor); ?>;
						}
						
						.edit-post-visual-editor__post-title-wrapper .editor-post-title {
							color: <?php echo esc_attr($munk_color_general_title_color); ?>;
						}
						
						.editor-styles-wrapper .wp-block {							
							color: <?php echo esc_attr($munk_color_general_text_color); ?>;
						}
						
						.editor-styles-wrapper a, .editor-styles-wrapper a:visited {
							color: <?php echo esc_attr($munk_color_general_link_color); ?>;							
						}
						
						.editor-styles-wrapper a:hover, .editor-styles-wrapper a:focus {
							color: <?php echo esc_attr($munk_color_general_link_hover); ?>;														
						}
						
					
						/* post title font */
						.editor-styles-wrapper .editor-post-title__input {
							font-family: <?php echo esc_attr($munk_typography_general_post_title['font']); ?>;
							font-weight: <?php echo esc_attr($munk_typography_general_post_title['variant']); ?>;
							font-size: <?php echo esc_attr($munk_typography_general_post_title['fontsize_desktop']); ?>;
							line-height: <?php echo esc_attr($munk_typography_general_post_title['lineheight_desktop']); ?>;
							text-transform: <?php echo esc_attr($munk_typography_general_post_title['texttransform_desktop']); ?>;
							text-align: <?php echo esc_attr($munk_typography_general_post_title['textalign_desktop']); ?>;
						}						
						
						/* content font */
						:root .editor-styles-wrapper {
							--base-content-font-family: <?php echo esc_attr($munk_typography_general_content['font']); ?>;
							--base-content-font-variant: <?php echo esc_attr($munk_typography_general_content['variant']); ?>;
							--base-content-font-size: <?php echo esc_attr($munk_typography_general_content['fontsize_desktop']); ?>;
							--base-content-line-height: <?php echo esc_attr($munk_typography_general_content['lineheight_desktop']); ?>;
							--base-content-text-transform: <?php echo esc_attr($munk_typography_general_content['texttransform_desktop']); ?>;
							--base-content-text-align: <?php echo esc_attr($munk_typography_general_content['textalign_desktop']); ?>;									 			
							--post-content-font-family: <?php echo esc_attr($munk_typography_general_post_content['font']); ?>;
							--post-content-font-variant: <?php echo esc_attr($munk_typography_general_post_content['variant']); ?>;
							--post-content-font-size: <?php echo esc_attr($munk_typography_general_post_content['fontsize_desktop']); ?>;
							--post-content-line-height: <?php echo esc_attr($munk_typography_general_post_content['lineheight_desktop']); ?>;
							--post-content-text-transform: <?php echo esc_attr($munk_typography_general_post_content['texttransform_desktop']); ?>;
							--post-content-text-align: <?php echo esc_attr($munk_typography_general_post_content['textalign_desktop']); ?>;									
							--post-content-font-h1-family: <?php echo esc_attr($munk_typography_general_post_h1['font']); ?>;
							--post-content-font-h1-variant: <?php echo esc_attr($munk_typography_general_post_h1['variant']); ?>;
							--post-content-font-h1-size: <?php echo esc_attr($munk_typography_general_post_h1['fontsize_desktop']); ?>;
							--post-content-line-h1-height: <?php echo esc_attr($munk_typography_general_post_h1['lineheight_desktop']); ?>;
							--post-content-text-h1-transform: <?php echo esc_attr($munk_typography_general_post_h1['texttransform_desktop']); ?>;
							--post-content-text-h1-align: <?php echo esc_attr($munk_typography_general_post_h1['textalign_desktop']); ?>;									
							--post-content-font-h2-family: <?php echo esc_attr($munk_typography_general_post_h2['font']); ?>;
							--post-content-font-h2-variant: <?php echo esc_attr($munk_typography_general_post_h2['variant']); ?>;
							--post-content-font-h2-size: <?php echo esc_attr($munk_typography_general_post_h2['fontsize_desktop']); ?>;
							--post-content-line-h2-height: <?php echo esc_attr($munk_typography_general_post_h2['lineheight_desktop']); ?>;
							--post-content-text-h2-transform: <?php echo esc_attr($munk_typography_general_post_h2['texttransform_desktop']); ?>;
							--post-content-text-h2-align: <?php echo esc_attr($munk_typography_general_post_h2['textalign_desktop']); ?>;									
							--post-content-font-h3-family: <?php echo esc_attr($munk_typography_general_post_h3['font']); ?>;
							--post-content-font-h3-variant: <?php echo esc_attr($munk_typography_general_post_h3['variant']); ?>;
							--post-content-font-h3-size: <?php echo esc_attr($munk_typography_general_post_h3['fontsize_desktop']); ?>;
							--post-content-line-h3-height: <?php echo esc_attr($munk_typography_general_post_h3['lineheight_desktop']); ?>;
							--post-content-text-h3-transform: <?php echo esc_attr($munk_typography_general_post_h3['texttransform_desktop']); ?>;
							--post-content-text-h3-align: <?php echo esc_attr($munk_typography_general_post_h3['textalign_desktop']); ?>;							
							--button-content-font-family: <?php echo esc_attr($munk_typography_primary_button['font']); ?>;
							--button-content-font-variant: <?php echo esc_attr($munk_typography_primary_button['variant']); ?>;
							--button-content-font-size: <?php echo esc_attr($munk_typography_primary_button['fontsize_desktop']); ?>;
							--button-content-line-height: <?php echo esc_attr($munk_typography_primary_button['lineheight_desktop']); ?>;
							--button-content-text-transform: <?php echo esc_attr($munk_typography_primary_button['texttransform_desktop']); ?>;
							--button-content-text-align: <?php echo esc_attr($munk_typography_primary_button['textalign_desktop']); ?>;
						} 	
						
						.woocommerce span.onsale,.wc-block-grid__product-onsale {
							background-color : <?php echo esc_attr($munk_color_sale_ed['background']); ?>;
							color : <?php echo esc_attr($munk_color_sale_ed['content']); ?> !important;
						}
						
						.button, #button, input[type="button"], input[type="submit"], .btn, .btn-primary, .woocommerce a.button, .woocommerce .added_to_cart, .woocommerce add_to_cart_button, .woocommerce button.button, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled[disabled], .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links .current, .entry-card .read-more a, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .editor-styles-wrapper .wp-block-button .wp-block-button__link {
							background-color: <?php echo esc_attr($munk_color_primary_button['bgcolor']); ?>;
							color: <?php echo esc_attr($munk_color_primary_button['text']); ?>;
						}						
						
						.button:hover, #button:hover, input[type="button"]:hover, input[type="submit"]:hover, .btn:hover, .btn-primary:hover, .woocommerce a.button:hover, .woocommerce .added_to_cart:hover, .woocommerce add_to_cart_button:hover, .woocommerce button.button:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled]:hover, .entry-card .read-more a:hover, .editor-styles-wrapper .wp-block-button .wp-block-button__link:hover {
							background-color: <?php echo esc_attr($munk_color_primary_button['hover-bg']); ?>;
							color: <?php echo esc_attr($munk_color_primary_button['hover-text']); ?>;	
						}								
                    </style>

        <?php
        
    }
}
add_action('admin_print_styles', 'munk_block_editor_customizer_inline_style', 1);
endif;