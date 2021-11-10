<?php
/**
 * The file for breadcrumbs feature.
 *
 * @package    Munk
 * @since      2.0.6
 * @author     MetricThemes <support@metricthemes.com>
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Munk_Breadcrumbs' ) ) {
    
    class Munk_Breadcrumbs {


                /**
                 * Member Variable
                 *
                 * @var instance
                 */
                private static $instance;

                /**
                 *  Initiator
                 */
                public static function get_instance() {
                    if ( ! isset( self::$instance ) ) {
                        self::$instance = new self();
                    }
                    return self::$instance;
                }    

                /**
                * Constructor
                */
                public function __construct() {
					
					$this->customizer_defaults = munk_customizer_defaults();	
					
                    add_action( 'customize_register', array( $this, 'munk_breadcrumbs_register_panels'), 100 );		
					add_action( 'after_setup_theme', array( $this, 'munk_breadcrumbs_customizer_options') );		
					
                    require get_template_directory() . '/inc/classes/breadcrumbs/breadcrumb-trail/breadcrumb-trail.php';   

                    add_action( 'wp', array( $this, 'munk_breadcrumb_render' ) );											

                }   	

				// Register Breacrumbs Section in Customizer
				public function munk_breadcrumbs_register_panels( $wp_customize ) {									
					
					$wp_customize->add_section( 'munk_breadcrumb_settings' , array(
						'title'      => __( 'Breadcrumbs', 'munk' ),
						'capability'     => 'edit_theme_options',
						'priority'   => 30,
					) );		
					
				}				
		
				public function munk_breadcrumbs_customizer_options (){			
					
					add_theme_support( 'breadcrumb-trail' );			
					require get_template_directory() . '/inc/classes/breadcrumbs/customizer-munk-breadcrumbs.php';                   
					
				}

                public function munk_breadcrumb_render() {

                    $munk_breadcrumb_ed = get_theme_mod('munk_breadcrumb_ed', $this->customizer_defaults['munk_breadcrumb_ed'] );

                        if ( self::munk_breadcrumb_rules() ) {                

                            if ($munk_breadcrumb_ed) {
								if (is_singular()) {
                                	add_action( 'munk_entry_top', array( $this, 'munk_breadcrumbs_cb' ), 20 );	
								}
								else {
									add_action( 'munk_content_while_before', array( $this, 'munk_breadcrumbs_cb' ), 20 );	
								}
                            }

                        }
					
                }    


                /**
                 * Munk Breadcrumbs Rules             
                 *
                 * @since 1.0.0
                 *
                 * @return boolean
                 */
                public function munk_breadcrumb_rules() {

                    // Display Breadcrumb default true.
                    $display_breadcrumb = false;
					$munk_settings_disable_breadcrumbs = get_post_meta( get_queried_object_id(), 'munk_settings_disable_breadcrumbs', true );				
					

                    if ( is_home() && '1' == get_theme_mod( 'munk_breadcrumb_ed_blog', $this->customizer_defaults['munk_breadcrumb_ed_blog'] ) ) {
                        $display_breadcrumb = true;
                    }					

                    if ( ( is_archive() ) && '1' == get_theme_mod( 'munk_breadcrumb_ed_archive', $this->customizer_defaults['munk_breadcrumb_ed_archive'] ) ) {
                        $display_breadcrumb = true;
                    }

                    if ( is_search() && '1' == get_theme_mod( 'munk_breadcrumb_ed_search', $this->customizer_defaults['munk_breadcrumb_ed_search'] ) ) {
                        $display_breadcrumb = true;
                    }                

                    if ( is_page() && '1' == get_theme_mod( 'munk_breadcrumb_ed_single_page', $this->customizer_defaults['munk_breadcrumb_ed_single_page'] ) ) {	
						if (!$munk_settings_disable_breadcrumbs) {
                        	$display_breadcrumb = true;
						}
                    }

                    if ( is_singular('post') && '1' == get_theme_mod( 'munk_breadcrumb_ed_single_post', $this->customizer_defaults['munk_breadcrumb_ed_single_post'] ) ) {
                        if (!$munk_settings_disable_breadcrumbs) {
                        	$display_breadcrumb = true;
						}
                    }																	
					
					if (is_front_page()) {
						$display_breadcrumb = false;
					}


                    return apply_filters( 'munk_breadcrumb_enabled', $display_breadcrumb );
                }    


                public function munk_breadcrumbs_cb () {

                    if ( function_exists( 'breadcrumb_trail' ) ) {

                        $munk_breadcrumb_home_text = get_theme_mod('munk_breadcrumb_home_text', $this->customizer_defaults['munk_breadcrumb_home_text']);
						$munk_breadcrumb_separator = get_theme_mod('munk_breadcrumb_separator', $this->customizer_defaults['munk_breadcrumb_separator'] );
						$munk_breadcrumb_alignment = get_theme_mod('munk_breadcrumb_alignment', $this->customizer_defaults['munk_breadcrumb_alignment'] );
                        $munk_breadcrumb_current_ed = filter_var(get_theme_mod('munk_breadcrumb_current_ed', $this->customizer_defaults['munk_breadcrumb_current_ed']), FILTER_VALIDATE_BOOLEAN);


                        $breadcrumbs_defaults = array(
                            'container'       => 'nav',
                            'before'          => '<div class="container"><div class="row ' .esc_attr($munk_breadcrumb_separator). ' ' .esc_attr($munk_breadcrumb_alignment). '">',
                            'after'           => '</div></div>',
                            'browse_tag'      => 'h2',
                            'list_tag'        => 'ul',
                            'item_tag'        => 'li',
                            'show_on_front'   => true,
                            'network'         => true,
                            'show_title'      => $munk_breadcrumb_current_ed,
                            'show_browse'     => false,
                            'labels' => array(
                                'browse'              => esc_html__( 'Browse:',                               'munk' ),
                                'aria_label'          => esc_attr_x( 'Breadcrumbs', 'breadcrumbs aria label', 'munk' ),
                                'home'                => esc_html($munk_breadcrumb_home_text),
                                'error_404'           => esc_html__( '404 Not Found',                         'munk' ),
                                'archives'            => esc_html__( 'Archives',                              'munk' ),
                                // Translators: %s is the search query.
                                'search'              => esc_html__( 'Search results for: %s',                'munk' ),
                                // Translators: %s is the page number.
                                'paged'               => esc_html__( 'Page %s',                               'munk' ),
                                // Translators: %s is the page number.
                                'paged_comments'      => esc_html__( 'Comment Page %s',                       'munk' ),
                                // Translators: Minute archive title. %s is the minute time format.
                                'archive_minute'      => esc_html__( 'Minute %s',                             'munk' ),
                                // Translators: Weekly archive title. %s is the week date format.
                                'archive_week'        => esc_html__( 'Week %s',                               'munk' ),

                                // "%s" is replaced with the translated date/time format.
                                'archive_minute_hour' => '%s',
                                'archive_hour'        => '%s',
                                'archive_day'         => '%s',
                                'archive_month'       => '%s',
                                'archive_year'        => '%s',
                            ),
                            'post_taxonomy' => array(
                            ),
                            'echo'            => true
                        );                    

                        breadcrumb_trail($breadcrumbs_defaults);

                    }

                }

    }
    
    /**
    *  Starting this off by calling 'get_instance()' method
    */
    Munk_Breadcrumbs::get_instance();
    
}    