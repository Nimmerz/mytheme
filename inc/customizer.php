<?php
/**
 * my_newtheme Theme Customizer.
 *
 * @package my_newtheme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function my_newtheme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'my_newtheme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function my_newtheme_customize_preview_js() {
	wp_enqueue_script( 'my_newtheme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'my_newtheme_customize_preview_js' );


  
 
function position_sidebar_customize_register( $wp_customize ) { 
$wp_customize->add_section( 'part_sidebar' , array( 
'title' => __( 'part sidebar', 'blog' ), 
'priority' => 30, 
) ); 
$wp_customize->add_setting( 'part_sidebar'); 
$wp_customize->add_control( 
new WP_Customize_Control( $wp_customize, 'sidebar', 
array( 
'label' => __( 'part_sidebar', 'blogname' ), 
'section' => 'part_sidebar', 
'settings' => 'part_sidebar', 
'type' => 'radio', 
'choices' => array( 
'left' => __('left'), 
'right' => __('right'), 
) 
) 
) 
); 
} 
add_action( 'customize_register', 'position_sidebar_customize_register' ); 
 

function color_customize_register( $wp_customize ) { 
$wp_customize->add_section( 'color_blog' , array( 
'title' => __( 'color theme', 'blog' ), 
'priority' => 30, 
) ); 
$wp_customize->add_setting( 'color_theme' , array( 
'default' => '#ffd500', 
'transport' => 'refresh', 
) ); 
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mark_color', array( 
'label' => __( 'Mark Color', 'blogname' ), 
'section' => 'color_blog', 
'settings' => 'color_theme', 
) ) ); 
} 
add_action( 'customize_register', 'color_customize_register' ); 
?>

<?php 
function banner_customize_register( $wp_customize ) { 
$wp_customize->add_section( 'banner_theme' , array( 
'title' => __( 'banner', 'blog' ), 
'priority' => 30, 
) ); 
$wp_customize->add_setting( 'banner' , array( 
'default' => '', 
'transport' => 'refresh', 

) ); 
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'number', array( 
'label' => __( 'banner', 'blog' ), 
'section' => 'banner_theme', 
'settings' => 'banner', 
) ) ); 
} 

add_action( 'customize_register', 'banner_customize_register' ); 
?>