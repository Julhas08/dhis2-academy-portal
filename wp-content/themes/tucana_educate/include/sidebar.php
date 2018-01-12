<?php

add_action( 'widgets_init', 'jbrsoft_theme_slug_widgets_init' );

function jbrsoft_theme_slug_widgets_init() {

    register_sidebar( array (
		'name'          => __( 'Footer', 'jbrsoft' ),
		'id'            => 'footer',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'jbrsoft' ),
		'before_widget' => '<div id="%1$s" class="footer-box col-md-3 col-sm-3 col-lg-3 col-xs-12 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );

    register_sidebar( array (
		'name'          => __( 'blog-sidebar', 'jbrsoft' ),
		'id'            => 'blog-sidebar',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'jbrsoft' ),
		'before_widget' => ' <ul class="widget-list">',
		'after_widget'  => '</ul>',
		'before_title'  => '<h3 class="category-title">',
		'after_title'   => '</h3>',
    ) );

}