<?php
function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'other', get_theme_file_uri( '/assets/css/other.css' ) );
    wp_enqueue_style( 'font-awesome', 'https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css' );
    wp_enqueue_script( 'customize',  get_theme_file_uri( '/assets/js/customize.js' ), array(), '1.0.0', true );
    wp_enqueue_script( 'other',  get_theme_file_uri( '/assets/js/other.js' ), array(), '1.0.0', true );
}
// 添加CSS与JS
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

// 去除顶部工具栏
show_admin_bar(false);