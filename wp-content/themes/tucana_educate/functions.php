<?php
function load_old_jquery_fix() {
    if ( ! is_admin() ) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', ( "http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" ), false, '1.11.3' );
        wp_enqueue_script( 'jquery' );
    }
}
if ( ! function_exists( 'jbrsoft_my_add_mce_button' ) ) {
    function jbrsoft_my_add_mce_button( $settings ) {
        $new_styles = array(
            array(
                'title' => __( 'Custom Styles', 'jbrsoft' ),
                'items' => array(
                    array(
                        'title'     => __('Theme Button','jbrsoft'),
                        'selector'  => 'a',
                        'classes'   => 'theme-button'
                    ),
                    array(
                        'title'     => __('Highlight','jbrsoft'),
                        'inline'    => 'span',
                        'classes'   => 'text-highlight',
                    ),
                ),
            ),
        );

        $settings['style_formats_merge'] = true;
        $settings['style_formats']       = json_encode( $new_styles );
        return $settings;

    }
}
add_filter( 'tiny_mce_before_init', 'jbrsoft_my_add_mce_button' );

function jbrsoft_my_add_mce_buttons() {

    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
        return;
    }

    if ( 'true' == get_user_option( 'rich_editing' ) ) {
        add_filter( 'mce_external_plugins', 'jbrsoft_my_add_tinymce_plugin' );
        add_filter( 'mce_buttons', 'jbrsoft_my_register_mce_button' );
    }
}
add_action('admin_head', 'jbrsoft_my_add_mce_buttons');

function jbrsoft_my_add_tinymce_plugin( $plugin_array ) {
    $plugin_array['my_mce_button'] = jbrsoft_url .'/assets/js/mc_button.js';
    return $plugin_array;
}

function jbrsoft_my_register_mce_button( $buttons ) {
    array_push( $buttons, 'my_mce_button' );
    return $buttons;
}

function jbrsoft_wp_new_excerpt($text) {

    if ($text == '') {

        $text           = get_the_content('');
        $text           = strip_shortcodes( $text );
        $text           = apply_filters('the_content', $text);
        $text           = str_replace(']]>', ']]>', $text);
        $text           = strip_tags($text);
        $text           = nl2br($text);
        $excerpt_length = apply_filters('excerpt_length', 30);
        $words          = explode(' ', $text, $excerpt_length + 1);

        if (count($words) > $excerpt_length) {
            array_pop($words);
            array_push($words, '<a href="" class="read-more">Read More</a>');
            $text = implode(' ', $words);
        }
    }
    return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'jbrsoft_wp_new_excerpt');

remove_filter ('the_content', 'wpautop');
remove_filter ('the_excerpt', 'wpautop');

class Jbrsoft_theme {

    public function __construct() {
        add_action( 'checkout',                  array($this, 'jbrsoft_checkout') );
        add_action( 'header',                    array($this, 'jbrsoft_header') );
        add_action( 'header_bottom',             array($this, 'Jbrsoft_theme_header_bottom') );
        add_action( 'wp_head',                   array($this, 'Jbrsoft_upgrade'));
        add_action( 'portfolio',                 array($this, 'jbrsoft_portfolio'));
        add_action( 'wp_enqueue_scripts',        array($this, 'Jbrsoft_enqueue_script'));
        add_action( 'admin_enqueue_scripts',     array($this, 'Jbrsoft_load_custom_wp_admin_style'));
        add_action( 'after_setup_theme',         array($this, 'jbrsoft_theme_support' ));
        add_action( 'nav_manus',                 array($this, 'Jbrsoft_theme_menus') );
        add_action( 'modal',                     array($this, 'Jbrsoft_modal') );
        add_action( 'nav_footer',                array($this, 'Jbrsoft_theme_nav_footer') );
        add_action( 'footer',                    array($this, 'jbrsoft_footer') );
        add_action( 'contact',                   array($this, 'Jbrsoft_theme_contact') );
        add_action( 'product',                   array($this, 'Jbrsoft_product') );
        add_action( 'slider',                    array($this, 'Jbrsoft_theme_slider') );
        add_action( 'price_filter',              array($this, 'Jbrsoft_price_filter') );
        add_action( 'service',                   array($this, 'Jbrsoft_service_page') );
        
        add_shortcode( 'testimonail_bullet',     array($this, 'jbrsoft_shortcode_testimonail_bullet') );
        add_shortcode( 'panel',                  array($this, 'jbrsoft_shortcode_skill') );
        add_shortcode( 'contact',                array($this, 'jbrsoft_shortcode_contact') );
        add_shortcode( 'team_authority',         array($this, 'jbrsoft_shortcode_team_authority') );
        add_shortcode( 'team_member',            array($this, 'jbrsoft_shortcode_team_member') );
        add_shortcode( 'client',                 array($this, 'jbrsoft_shortcode_client') );
        add_shortcode( 'testimonail',            array($this, 'jbrsoft_shortcode_testimonail') );
        add_shortcode( 'about',                  array($this, 'jbrsoft_shortcode_about') );
        add_shortcode( 'price',                  array($this, 'jbrsoft_shortcode_price') );
        add_shortcode( 'product_single',         array($this, 'jbrsoft_shortcode_product_single') ); 
        add_filter( 'body_class',                array($this, 'jbrsoft_sp_body_class' ) );

        $this->jbrsoft_constants();
        $this->Jbrsoft_include_functions();
        $this->jbrsoft_navs_menu();

    }

    function jbrsoft_constants() {

        define( 'jbrsoft_url', get_template_directory_uri() );

    }
                    
    public function jbrsoft_navs_menu () {
        register_nav_menus( 
            array(
                'main-menu' => 'main-menu',
                'top-menu'  => 'top-menu',
            ) 
        );
    }

    public function jbrsoft_sp_body_class( $classes ) {
        $classes[] = 'custom-class';
        return $classes;
    }

    public function  Jbrsoft_modal() {
        require_once('view/modal.php');
    }

    public function jbrsoft_header() {
        require_once('view/header.php');
    }

    public function jbrsoft_checkout() {
        require_once('view/checkout.php');
    }

    public function jbrsoft_portfolio() {
        require_once('view/portfolio.php');
    }

    public function Jbrsoft_theme_slider() {
        require_once('view/slider.php');
    }

    public function Jbrsoft_product() {
        require_once('view/product.php');        
    }

    public function Jbrsoft_theme_contact() {
        require_once('view/contact.php');
    }

    public function jbrsoft_footer() {
        require_once('view/footer.php');
    }

    public function Jbrsoft_upgrade() {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    }
   
    public function Jbrsoft_album_search_option() {
        require_once('view/search.php');
    }

    public function Jbrsoft_include_functions() {
        include_once('include/custom.php');
        include_once('include/meta.php');
        if ( is_admin() ) require_once( 'settings.php' );
        require_once('include/sidebar.php');
        //require_once('include/install_plugin.php');
        require_once('include/widget.php');
        require_once('include/multi-post-thumbnails.php');
       
    }


    /***********************************
    **                                **
    ** Load Custom admin script       **
    **                                **
    ************************************/ 

    public function Jbrsoft_load_custom_wp_admin_style() {

        wp_register_style( 'custom_wp_admin_css', jbrsoft_url . '/assets/css/admin-custom.css', false, '1.0.0' );
        wp_register_style( 'iconpicker', jbrsoft_url . '/assets/css/fontawesome-iconpicker.css', false, '1.0.0' );
        wp_register_style( 'fonts-item', jbrsoft_url . '/fonts/css/font-awesome.css', false, '1.0.0' );
        
        wp_enqueue_style( 'custom_wp_admin_css' );
        wp_enqueue_style( 'iconpicker' );
        wp_enqueue_style( 'fonts-item' );

        wp_enqueue_script( 'bootstrap', jbrsoft_url . '/assets/js/bootstrap.js', array( 'wp-color-picker' ), '1.0',false );
        wp_enqueue_script( 'rangeSlider', jbrsoft_url . '/assets/js/rangeSlider.js', array('jquery'), '3.1.5', false);    
        wp_enqueue_script( 'iconpicker', jbrsoft_url . '/assets/js/fontawesome-iconpicker.js', array('jquery'), '3.1.5', true); 
        wp_enqueue_script( 'admin-script', jbrsoft_url . '/assets/js/admin-script.js', array( 'wp-color-picker' ), '1.0',true );

        wp_enqueue_script( 'bootstrap' );
        wp_enqueue_script( 'rangeSlider' );
        wp_enqueue_script( 'iconpicker' );
        wp_enqueue_script( 'admin-script' );
          
    }

    /***********************************
    **                                **
    **   Load Custom theme script     **
    **                                **
    ************************************/ 

    public function Jbrsoft_enqueue_script() {

        wp_register_style( 'font-awesome', jbrsoft_url . '/fonts/css/font-awesome.css', array(), '1.0', 'all' );
        wp_register_style( '3dfont', jbrsoft_url . '/fonts/3dfont.css', array(), '1.0', 'all' );
        wp_register_style( 'bootstrap', jbrsoft_url . '/assets/css/bootstrap.min.css', array(), '1.0', 'all' );
        wp_register_style( 'stylesheet', jbrsoft_url . '/assets/css/style.css', array(), '1.0', 'all' );
        wp_register_style( 'owlcarousel', jbrsoft_url . '/assets/owlcarousel/assets/owl.carousel.min.css', array(), '1.0', 'all' );
        wp_register_style( 'responsive', jbrsoft_url . '/assets/css/responsive.css', array(), '1.0', 'all' );
        wp_register_style( 'owl', jbrsoft_url . '/assets/owlcarousel/assets/owl.theme.default.min.css', array(), '1.0', 'all' );
        wp_register_style( 'timeline_light', jbrsoft_url . '/assets/css/timeline_light.css', array(), '1.0', 'all' );
        wp_register_style( 'animated', jbrsoft_url . '/assets/css/animated.css', array(), '1.0', 'all' );
        wp_register_style( 'layerslider', jbrsoft_url . '/assets/css/layerslider.css', array(), '1.0', 'all' );
        wp_register_style( 'skin', jbrsoft_url . '/assets/borderlessdark/skin.css', array(), '1.0', 'all' );
        wp_register_style( 'jquery.fancybox', jbrsoft_url . '/assets/css/jquery.fancybox.css', array(), '1.0', 'all' );
        
        wp_enqueue_style('font-awesome'); 
        wp_enqueue_style('3dfont');
        wp_enqueue_style('bootstrap'); 
        wp_enqueue_style('stylesheet'); 
        wp_enqueue_style('owlcarousel'); 
        wp_enqueue_style('revslider'); 
        wp_enqueue_style('responsive');  
        wp_enqueue_style('owl');
        wp_enqueue_style('timeline_light');
        wp_enqueue_style('animated');
        wp_enqueue_style('layerslider');
        wp_enqueue_style('skin');
        wp_enqueue_style('jquery.fancybox');
      
        wp_enqueue_script('jbrsoft_jquery', jbrsoft_url . '/assets/js/jquery.js', array('jquery'), '1.0', false);
        wp_enqueue_script('bootstrap', jbrsoft_url . '/assets/js/bootstrap.min.js', array('jquery'), '1.0', false);
        wp_enqueue_script('owlcarousel', jbrsoft_url . '/assets/owlcarousel/owl.carousel.js', array('jquery'), '1.0', false);
        wp_enqueue_script('wow', jbrsoft_url . '/assets/js/scripts/shCorede8c.js', array('jquery'), '1.0', false);
        wp_enqueue_script('greensock', jbrsoft_url . '/assets/js/scripts/shBrushPhpde8c.js', array('jquery'), '1.0', false);
        wp_enqueue_script('layerslider.transitions', jbrsoft_url . '/assets/js/scripts/shBrushPlainde8c.js', array('jquery'), '1.0', false);
        wp_enqueue_script('layerslider.kreaturamedia.jquery', jbrsoft_url . '/assets/js/layerslider.kreaturamedia.jquery.js', array('jquery'), '1.0', false);
        wp_enqueue_script('smooth', jbrsoft_url . '/assets/js/smooth-scroll.js', array('jquery'), '1.0', false);
        wp_enqueue_script('scripts', jbrsoft_url . '/assets/js/scripts.js', array('jquery'), '1.0', true); 
     
        wp_enqueue_script('jbrsoft_jquery');
        wp_enqueue_script('bootstrap');
        wp_enqueue_script('owlcarousel');
        wp_enqueue_script('greensock');
        wp_enqueue_script('layerslider.transitions');
        wp_enqueue_script('layerslider.kreaturamedia.jquery');
        wp_enqueue_script('wow');

        wp_enqueue_script('smooth');
        wp_enqueue_script('revulation');
        wp_enqueue_script('revolution_min');
        wp_enqueue_script('extension');
        wp_enqueue_script('layeranimation');
        wp_enqueue_script('navigation');
        wp_enqueue_script('scripts');
  

    } 

    /***********************************
    **                                **
    ** Theme Support                  **
    **                                **
    ************************************/

    public  function jbrsoft_theme_support() {

        add_theme_support( 'woocmmerce' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );
        add_theme_support( "custom-background");
        add_theme_support( "custom-header" );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'custom-logo', array(
           'height'      => 175,
           'width'       => 400,
           'flex-width'  => true,
           'header-text' => array( 'site-title', 'site-description' ),
        ) );

    }

    public function Jbrsoft_theme_menus() {
        include('include/nav_menus.php');    
    }

    public function Jbrsoft_theme_nav_footer() {
        require_once('view/nav_footer.php');    
    }

    public function Jbrsoft_service_page() {
        require_once('view/service.php');    
    }

    
    public function Jbrsoft_theme_header_bottom() {
        require_once('view/header-bottom.php');  
    }

    /***********************************
    **                                **
    **        Skill Shortcode         **
    **                                **
    ************************************/

    public function jbrsoft_shortcode_skill( $atts, $content=null ) {

        extract( shortcode_atts( array(
            'category' => '',
            'content' => '',
            'link'    => '',
        ), $atts ));

 
        $list = ' <li>  
                        <a href="'.$link.'" target="_blank">
                            <span class="list-view-content">
                                <i class="fa fa-eye list-view" aria-hidden="true"></i> 
                                '.$content.' 
                            </span>
                            <button class="btn btn-success btn-preview pull-right"> Preview</button>
                        </a>
                    </li> ';

        return $list;           
    }                       
    
    /***********************************
    **                                **
    ** Support System shortcode       **
    **                                **
    ************************************/

    public function jbrsoft_shortcode_contact( $atts, $content=null ) {

        extract( shortcode_atts( array(
            'category' => '',
            'count'    => '6',
            'title'    => '',
        ), $atts ));
        $q = new WP_Query(
            array(  'post_type'  => 'post',
                'posts_per_page' => $count,
                'category_name'  => $category
            ));  

        $list = '';
        while($q->have_posts()) : $q->the_post();

            $id         = get_the_ID();
            $src_attach = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false, '' );
            $skill      = get_post_meta( $id,'skill' , true );
            
            $list.= '
                <div class="wpex-vc-row-wrap clr">
                    <div class="vc_row wpb_row clr vc_row-fluid vc_custom_1450325107377 support">
                        <div class="wpex-vc-columns-wrap container clr">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="wpb_wrapper wpex-vc-column-wrapper wpex-clr ">
                                    <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1450324169946">
                                        <div class="wpb_column vc_column_container vc_col-sm-6">
                                            <div class="wpb_wrapper wpex-vc-column-wrapper wpex-clr">
                                                <div class="vcex-spacing" style="height:30px"></div>
                                                <div class="wpb_text_column wpb_content_element  vc_custom_1451561774791">
                                                    <div class="wpb_wrapper">
                                                        <p><span style="font-size: 28px; color: #000000;"> '.get_the_title().'</span></p>
                                                        <p>'.get_the_content().'</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wpb_column vc_column_container vc_col-sm-6">
                                            <div class="wpb_wrapper wpex-vc-column-wrapper wpex-clr">
                                                <div class="vcex-image-grid wpex-row clr grid-style-default lightbox-group">
                                                    <div class="id-3708 vcex-image-grid-entry span_1_of_1 col col-1">
                                                        <figure class="vcex-image-grid-entry-img clr ">
                                                            <a href="assets/images/jbrsoft-support.jpg" title="Call center" class="vcex-image-grid-entry-img wpex-lightbox-group-item" data-title="Call center" data-type="image">
                                                                <img src="'.$src_attach[0].'" />
                                                            </a>
                                                            <!--========= // End vcex-image-grid-entry-img ===============-->
                                                        </figure>
                                                    </div>
                                                    <!-- vcex-image-grid-entry ===============-->
                                                </div>
                                                <!--========= // End vcex-image-grid ===============-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--========= // End wpex-vc-columns-wrap ===============-->
                    </div>
                </div>
            ';

        endwhile;
        $list.= '';
        wp_reset_query();
        return $list;           
    }                       


    /***********************************
    **                                **
    **      Team Author Shortcode     **
    **                                **
    ************************************/

    public function jbrsoft_shortcode_team_authority( $atts, $content=null ) {
        extract( shortcode_atts( array(
            'category'  => '',
            'count'     => '6',
            'title'     => '',
        ), $atts ));

        $q = new WP_Query(
            array(  
                'post_type'      => 'team',
                'posts_per_page' => $count,
                'team_category'  => $category
            ));  

        $list = '
            <div class="wpex-vc-row-wrap clr">
                    <div class="vc_row wpb_row clr vc_row-fluid">     
                        <div class="wpex-vc-columns-wrap clr">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="wpb_wrapper wpex-vc-column-wrapper wpex-clr ">
                                    <div style="height:30px" class="vcex-spacing">
                                    </div>
                                    <h1 class="vc_custom_heading" style="font-size: 25px;color: #666666;text-align: center;font-family:Abril Fatface;font-weight:400;font-style:normal">'.$title.'</h1>
                                    <div style="height:30px" class="vcex-spacing"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
            <div class="clr about-main-item col-xs-12 col-md-9 col-sm-9">
        ';

        while($q->have_posts()) : $q->the_post();
            
            $id         = get_the_ID();
            $src_attach = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false, '' );
            $skill      = get_post_meta( $id,'skill' , true );
            $author     = get_post_meta( $id,'author' , true );
            
            $list .= '
                    <style>
                        .ch-info'.$id.' {
                          background: #c9512e url("'.$src_attach[0].'") repeat scroll 0 0;
                        
                        }
                        .ch-img-'.$id.' { 
                              background-image: url("'.$src_attach[0].'");
                              z-index: 12;
                        }
                    </style>
                    <div class="col-md-6 col-xs-12 col-sm-6">
                        <div class="team-management-system">
                            <ul class="ch-grid management-poster">
                                <li>
                                    <div class="ch-item-before">
                                        <div class="ch-info'.$id.' ch-info">
                                            <a href="#">
                                                Read More
                                            </a>
                                        </div>
                                        <div class="ch-thumb ch-img-'.$id.'"></div>
                                    </div>
                                </li>
                            </ul>
                            <div class="vcex-teaser-content clr">
                                <h2 style="text-transform:uppercase;" class="vcex-teaser-heading wpex-em-16px wpex-fw-600 no-margin">
                                    '.$author.'                                 
                                </h2>
                                <div class="vcex-teaser-text clr">
                                    <span class="founder-title">
                                        '.get_the_title().'
                                    </span>
                                    <span class="founder">
                                        '.get_the_content().'
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="vc_btn3-container vc_btn3-inline">
                            <button class="read-more-author">READ MORE</button>
                        </div>
                    </div>
                  
            ';                
        endwhile;
        $list.= ' </div>';
        wp_reset_query();
        return $list;           
    }                       
   

    /***********************************
    **                                **
    **     Team Member Shortcode      **
    **                                **
    ************************************/

    public function jbrsoft_shortcode_team_member( $atts, $content=null ) {

        extract( shortcode_atts( array(
            'category' => '',
            'count'    => '6',
            'title'    => '',
        ), $atts ));
        $q = new WP_Query(
                array( 
                    'post_type'      => 'team',
                    'posts_per_page' => $count,
                    'team_category'  => $category
                ));

        $list =' <div class="developement-team">                       
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="wpb_wrapper wpex-vc-column-wrapper wpex-clr ">
                            <div style="height:30px" class="vcex-spacing"></div>
                            <h1 class="vc_custom_heading" style="font-size: 25px;color: #666666;text-align: center;font-family:Abril Fatface;font-weight:400;font-style:normal">TEAM  MEMBERS</h1>
                            <div style="height:30px" class="vcex-spacing"></div>
                        </div>
                    </div>
                    <hr><div id="owl-demos" class="owl-carousel"> ';

        while($q->have_posts()) : $q->the_post();

            $id         = get_the_ID();
            $src_attach = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false, '' );
            $skill      = get_post_meta( $id,'skill' , true );
            $list .= '
                    <style>
                        .jbrsoft-img-'.$id.' {
                          background: #c9512e url("'.$src_attach[0].'") repeat scroll 0 0;
                          background-size: 100% 100%;
                        
                        }
                    </style>
                    <div class="item">
                        <div class="col-sm-2 col-md-2 col-xs-12">
                            <ul class="ch-grid ">
                                <li>
                                    <div class="jbrsoft-item ch-item jbrsoft-img-'.$id.'">
                                        <div class="jbrsoft-info">
                                            <h3>'.get_the_title().'</h3>
                                            <p>'.get_the_content().'</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div> ';                
        endwhile;
        $list.= '</div>  
                <div class="customNavigation">
                    <a class="btn prev item_ones"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    <a class="btn next item_twos"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>';
        wp_reset_query();
        return $list;           
    }                       
    
    /***********************************
    **                                **
    ** Clients Shortcode              **
    **                                **
    ************************************/

    public function jbrsoft_shortcode_client( $atts, $content=null ) {
        extract( shortcode_atts( array(
            'category' => '',
            'count'    => '6',
            'title'    => '',
        ), $atts ));

        $q = new WP_Query(
                array(  
                    'post_type'      => 'clients',
                    'posts_per_page' => $count
                ));

        $list = '
        <div class="clients-area">
                <div id="owl-demo" class="owl-carousel">
               ';

        while($q->have_posts()) : $q->the_post();
            $id         = get_the_ID();
            $src_attach = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false, '' );
            $skill      = get_post_meta( $id,'skill' , true );

            $list .= '
                    <div class="item">
                        <div class="client-row">
                            <div class="client-images-media">
                                <img src="'.$src_attach[0].'" class="img-responsive" alt="'.get_the_title().'">
                            </div>
                            <div class="client-row-content clr">
                                <h2 class="client-title-heading"> '.get_the_title().'  </h2>
                            </div>
                        </div>
                    </div>            
                ';                
            endwhile;
            $list .= '  
            </div>
                <div class="customNavigation">
                    <a class="btn prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    <a class="btn next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>';
        wp_reset_query();
        return $list;           
    }                       
    
    /***********************************
    **                                **
    ** Testimonail Shortcode          **
    **                                **
    ************************************/

    public function jbrsoft_shortcode_testimonail( $atts, $content=null ) {

        extract( shortcode_atts( array(
            'category' => '',
            'count'    => '6',
            'title'    => '',
        ), $atts ));

        $q = new WP_Query(
            array( 
                'post_type'      => 'testimonial',
                'posts_per_page' => $count
            ));

        $list =' 
         <h2 class="title-business title-attr anime-hidden anime-visible animated lightSpeedIn"> What&#39s Client Says</h2>      
           
            <div data-ride="carousel" class="carousel slide wow zoomInRight animated animated" data-wow-duration="1s" id="testimonialCarousel">
                '.do_shortcode('[testimonail_bullet]').'
                <div role="listbox" class="carousel-inner">';

        while($q->have_posts()) : $q->the_post();

            $id          = get_the_ID();
            $src_attach  = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false, '' );
            $testimonial = get_post_meta( $id,'testimonial' , true );
            
            $list .= '
                    <div class="item">
                        <div class="testimonail-item">
                            <div class="testomonail-part">
                                <div class="testomonail-images">
                                    <img  src="'.$src_attach[0].'" alt="'.get_the_title().'">
                                </div>
                                <div class="testimonail-content">
                                    <p class="testimonail-text">'.get_the_content().'</p>
                                    <a class="testimonail-link" target="_blank" href="'.$testimonial.'">'.$testimonial.'</a>
                                </div>
                            </div>
                        </div>
                    </div>           
               '; 

        endwhile;

        $list .= '</div></div>';
        wp_reset_query();
        return $list;           
    }                       
    
    /***********************************
    **                                **
    ** Testimonial Bullet Shortcode   **
    **                                **
    ************************************/

    public function jbrsoft_shortcode_testimonail_bullet( $atts, $content=null ) {

        extract( shortcode_atts( array(
            'category' => '',
            'count'    => '6',
            'title'    => '',
        ), $atts ));

        $q = new WP_Query(
                array(  
                    'post_type'      => 'testimonial',
                    'posts_per_page' => $count
                ));

        $list = ' 
       
            <ol class="carousel-indicators">
                <li class="" data-slide-to="0" data-target="#testimonialCarousel"></li>    
        ';

        $post_no = 0; 

        while($q->have_posts()) : $q->the_post();

            $id          = get_the_ID();
            $src_attach  = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false, '' );
            $testimonial = get_post_meta( $id,'testimonial' , true );
            $post_no++;
            $list .= '
                    <li class="" data-slide-to="'.$post_no.'" data-target="#testimonialCarousel"></li>      
                '; 

        endwhile;
        $list .= '</ol>';
        wp_reset_query();
        return $list;           
    }                       
    

    /***********************************
    **                                **
    **  Company About Us Shortcode    **
    **                                **
    ************************************/

    public function jbrsoft_shortcode_about( $atts, $content=null ) {

        extract( shortcode_atts( array(
            'category' => '',
            'count'    => '6',
            'title'    => '',
        ), $atts ));

        $q = new WP_Query(
            array( 
                'post_type'      => 'post',
                'posts_per_page' => $count,
                'category_name'  => $category
            ));

        $list ='';

        while($q->have_posts()) : $q->the_post();
            
            $id         = get_the_ID();
            $src_attach = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false, '' );
            $skill      = get_post_meta( $id,'skill' , true );
            
            $list .= '
            <div class="wpex-vc-row-wrap clr">
                <div class="vc_row wpb_row clr vc_row-fluid">
                    <div class="wpex-vc-columns-wrap clr">
                        <div class="wpb_column vc_column_container vc_col-sm-6">
                            <div class="wpb_wrapper wpex-vc-column-wrapper wpex-clr ">
                                <div class="vcex-image-grid wpex-row clr grid-style-default lightbox-group">
                                    <div class="id-4449 vcex-image-grid-entry span_1_of_1 col col-1">
                                        <figure class="vcex-image-grid-entry-img clr ">
                                            <a data-type="image" data-title="About JBRSOFT" class="vcex-image-grid-entry-img wpex-lightbox-group-item" title="About JBRSOFT" href="'.$src_attach[0].'">
                                                <img alt="'.get_the_title().'" src="'.$src_attach[0].'">                        
                                            </a>
                                            <!--========= // End vcex-image-grid-entry-img ===============-->
                                        </figure>
                                    </div>
                                    <!--. vcex-image-grid-entry ===============-->
                                </div>
                                <!--========= // End vcex-image-grid ===============-->
                            </div>
                        </div>
                        <div class="wpb_column vc_column_container vc_col-sm-6">                                    
                            <div class="wpb_wrapper">
                                <p style="text-align: center;">
                                    <span style="font-family: Open Sans;">
                                        <strong>
                                            <span style="font-size: 24px; padding-bottom: 5px; border-bottom: 1px solid #666666;">'.get_the_title().'
                                            </span>
                                        </strong>
                                    </span>
                                </p>
                                '.get_the_content().'
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>                      
            ';                
        endwhile;
        $list .= '';
        wp_reset_query();
        return $list;           
    }                       
    

    /***********************************
    **                                **
    **  Product Price Cunjaction      **
    **                                **
    ************************************/

    public function jbrsoft_shortcode_price( $atts, $content=null ) {

        extract( shortcode_atts( array(
            'tag'   => '',
            'count' => '4',
            'title' => '',
        ), $atts ));

        $q = new WP_Query(
            array( 
                'post_type'      => 'product',
                'posts_per_page' => $count,
                'product_tag'    => $tag
            ));  
        ?>
            <div class="cealr-both"></div>
            <div class="single-products white-bg">
                <div class="price-row">
        <?php

            while($q->have_posts()) : $q->the_post();

                $id         = get_the_ID();
                $src_attach = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false, '' );
                $format     = get_post_meta( $id, 'format', true );
                $terms      = get_the_terms( $id, 'product_tag' );

        ?>
           
            <div class="col-md-3 col-xs-12 col-sm-3 col-lg-3 price-table">
                <div class="vcex-pricing table-<?php echo $format;?>">
                    <div class="vcex-pricing-header <?php echo $format;?> clr">  <?php echo $format;?> </div>
                    <div class="jbrsoft-pricing-cost clr">
                        <div class="vcex-pricing-ammount">
                            <?php 
                                echo get_woocommerce_currency_symbol("USD"); 
                                $product = new WC_Product( get_the_ID() ); echo $product->price;
                            ?>
                        </div> 
                    </div>
                    <div class="jbrsoft-pricing-content">
                        
                        <?php 

                            if ($terms) {

                                foreach ($terms as $term) {
                                    echo '<ul><li><a href="#">' . $term->name.'</a></li> </ul>';
                                }
                            } 
                        ?>
                       
                    </div>
                        <?php do_action('woocommerce_single_product_summary');?>
                </div>
            </div> 
        <?php       
        endwhile;
       
        echo '</div></div>';
        
        wp_reset_query();
                
    }  

    public function jbrsoft_shortcode_product_single( $atts,$content=null ) {

        extract( shortcode_atts( array(
                'category' => '',
                'count'    => '6',
                'title'    => '',
                'text'     => '',
                'src'      => '',
            ), $atts ));

        echo
            '<div class="single-products">
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                    <figure class="vcex-image-grid-entry-img clr overlay-parent overlay-parent-plus-hover">
                        <img width="1349" height="1347" alt="'.$title.'" src="'.$src.'">
                    </figure>
                </div>
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                    <h2 class="single-porduct-post-title">'.$title.'</h2>
                   '.$text.'
                </div>
            </div>';
    }               


}

$Jbrsoft_theme = new Jbrsoft_theme();

    function jbrsoft_custom_pagination($numpages = '', $pagerange = '', $paged='') {

        if (empty($pagerange)) {
            $pagerange = 10;
        }
        global $paged;

        if (empty($paged)) {
            $paged = 1;
        }

        if ($numpages == '') {
            global $wp_query;
            $numpages = $wp_query->max_num_pages;

            if(!$numpages) {
                $numpages = 1;
            }
        }

        $pagination_args = array(
            'base'            => get_pagenum_link(1) . '%_%',
            'format'          => 'page/%#%',
            'total'           => $numpages,
            'current'         => $paged,
            'show_all'        => False,
            'end_size'        => 1,
            'mid_size'        => $pagerange,
            'prev_next'       => True,
            'prev_text'       => __('<i class="fa fa-angle-left" aria-hidden="true"></i>','tucana'),
            'next_text'       => __('<i class="fa fa-angle-right" aria-hidden="true"></i>','tucana'),
            'type'            => 'plain',
            'add_args'        => false,
            'add_fragment'    => ''
        );

        $paginate_links = paginate_links($pagination_args);

        if ($paginate_links) {
            echo "<nav class='custom-pagination'>";
            echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
            echo $paginate_links;
            echo "</nav>";
        }

    }

    function jbrsoft_comicpress_copyright() {
        global $wpdb;
        $copyright_dates = $wpdb->get_results(" SELECT YEAR(min(post_date_gmt)) AS firstdate, YEAR(max(post_date_gmt)) AS lastdate FROM $wpdb->posts WHERE post_status = 'publish' ");
        $output = '';

        if($copyright_dates) {
            
            $copyright = "Copyright &copy;&nbsp;" . $copyright_dates[0]->firstdate."&nbsp;<a href='http://legazo.bz'>LEGAZO</a>, Developed By: <a href='http://jbrsoft.com'>JBRSOFT IT FIRM</a>";
            
            if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
                $copyright .= '-' . $copyright_dates[0]->lastdate;
            }
            $output = $copyright;
        }
        return $output;
    }

    /***********************************
    **                                **
    **  Image upload Class            **
    **                                **
    ************************************/



add_action('service_category_add_form_fields', 'jbrsoft_category_metabox_add', 10, 1);
add_action('service_category_edit_form_fields', 'jbrsoft_category_metabox_edit', 10, 1);    
 
function jbrsoft_category_metabox_add($tag) { ?>
    <div class="form-group">
        <div class="input-group">
        <label for="icon-select"><?php _e('Icon select') ?></label>
            <input data-placement="bottomRight" class="form-control icp icp-auto" name="icon-select" id="icon-select" value="fa-archive" type="text" />
            <span class="input-group-addon"></span>
        </div>
    </div>


<?php 
    }     
 
    function jbrsoft_category_metabox_edit($tag) { ?>
    
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="icon-select"><?php _e('icon-select'); ?></label>
        </th>
        <td>
            <div class="form-group">
                <div class="input-group">
                <label for="icon-select"><?php _e('Icon select') ?></label>
                    <input data-placement="bottomRight" class="form-control icp icp-autos" name="icon-select" id="icon-select" value="<?php echo get_term_meta($tag->term_id, 'icon-select', true); ?>" type="text" />
                    <span class="input-group-addon"></span>
                    <p class="description"><?php _e('This image will be the thumbnail shown on the category page.');  echo get_term_meta($tag->term_id, 'icon-select', true); ?></p>
                </div>
            </div>
                <?php  get_term_meta($tag->term_id, 'icon-select', true); ?>
           
        </td>
    </tr>
  
<?php 
    } 
    
add_action('created_service_category', 'jbrsoft_save_category_metadata', 10, 1);    
add_action('edited_service_category', 'jbrsoft_save_category_metadata', 10, 1);

function jbrsoft_save_category_metadata($term_id) {
    if (isset($_POST['icon-select'])) 
        update_term_meta( $term_id, 'icon-select', $_POST['icon-select']);                  
}


function jbrosft_admin_footer() {
    ?>
    <button class="btn btn-default action-create">Create instances</button>
    <?php 
}
add_action('admin_footer','jbrosft_admin_footer');
add_action('admin_footer','enqueue_admin_scripts');
 function enqueue_admin_scripts() {
    wp_enqueue_script("featured-image-custom", plugins_url(basename(dirname(__FILE__)) . '/js/multi-post-thumbnails-admin.js'), array('jquery'));
}
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(array(
        'label' => '2nd Feature Image',
        'id' => 'feature-image-2',
        'post_type' => 'folio'
        )
    );
    new MultiPostThumbnails(array(
        'label' => '3rd Feature Image',
        'id' => 'feature-image-3',
        'post_type' => 'folio'
        )
    );
    new MultiPostThumbnails(array(
        'label' => '4th Feature Image',
        'id' => 'feature-image-4',
        'post_type' => 'folio'
        )
    );
    new MultiPostThumbnails(array(
        'label' => '5th Feature Image',
        'id' => 'feature-image-5',
        'post_type' => 'folio'
        )
    );      
 
};
function educate_comments_template( $file = '/comments.php', $separate_comments = false ) {
    global $wp_query, $withcomments, $post, $wpdb, $id, $comment, $user_login, $user_ID, $user_identity, $overridden_cpage;
 
    if ( !(is_single() || is_page() || $withcomments) || empty($post) )
        return;
 
    if ( empty($file) )
        $file = '/comments.php';
 
    $req = get_option('require_name_email');
 
    /*
     * Comment author information fetched from the comment cookies.
     */
    $commenter = wp_get_current_commenter();
 
    /*
     * The name of the current comment author escaped for use in attributes.
     * Escaped by sanitize_comment_cookies().
     */
    $comment_author = $commenter['comment_author'];
 
    /*
     * The email address of the current comment author escaped for use in attributes.
     * Escaped by sanitize_comment_cookies().
     */
    $comment_author_email = $commenter['comment_author_email'];
 
    /*
     * The url of the current comment author escaped for use in attributes.
     */
    $comment_author_url = esc_url($commenter['comment_author_url']);
 
    $comment_args = array(
        'orderby' => 'comment_date_gmt',
        'order' => 'ASC',
        'status'  => 'approve',
        'post_id' => $post->ID,
        'no_found_rows' => false,
        'update_comment_meta_cache' => false, // We lazy-load comment meta for performance.
    );
 
    if ( get_option('thread_comments') ) {
        $comment_args['hierarchical'] = 'threaded';
    } else {
        $comment_args['hierarchical'] = false;
    }
 
    if ( $user_ID ) {
        $comment_args['include_unapproved'] = array( $user_ID );
    } elseif ( ! empty( $comment_author_email ) ) {
        $comment_args['include_unapproved'] = array( $comment_author_email );
    }
 
    $per_page = 0;
    if ( get_option( 'page_comments' ) ) {
        $per_page = (int) get_query_var( 'comments_per_page' );
        if ( 0 === $per_page ) {
            $per_page = (int) get_option( 'comments_per_page' );
        }
 
        $comment_args['number'] = $per_page;
        $page = (int) get_query_var( 'cpage' );
 
        if ( $page ) {
            $comment_args['offset'] = ( $page - 1 ) * $per_page;
        } elseif ( 'oldest' === get_option( 'default_comments_page' ) ) {
            $comment_args['offset'] = 0;
        } else {
            // If fetching the first page of 'newest', we need a top-level comment count.
            $top_level_query = new WP_Comment_Query();
            $top_level_args  = array(
                'count'   => true,
                'orderby' => false,
                'post_id' => $post->ID,
                'status'  => 'approve',
            );
 
            if ( $comment_args['hierarchical'] ) {
                $top_level_args['parent'] = 0;
            }
 
            if ( isset( $comment_args['include_unapproved'] ) ) {
                $top_level_args['include_unapproved'] = $comment_args['include_unapproved'];
            }
 
            $top_level_count = $top_level_query->query( $top_level_args );
 
            $comment_args['offset'] = ( ceil( $top_level_count / $per_page ) - 1 ) * $per_page;
        }
    }
 
    /**
     * Filters the arguments used to query comments in comments_template().
     *
     * @since 4.5.0
     *
     * @see WP_Comment_Query::__construct()
     *
     * @param array $comment_args {
     *     Array of WP_Comment_Query arguments.
     *
     *     @type string|array $orderby                   Field(s) to order by.
     *     @type string       $order                     Order of results. Accepts 'ASC' or 'DESC'.
     *     @type string       $status                    Comment status.
     *     @type array        $include_unapproved        Array of IDs or email addresses whose unapproved comments
     *                                                   will be included in results.
     *     @type int          $post_id                   ID of the post.
     *     @type bool         $no_found_rows             Whether to refrain from querying for found rows.
     *     @type bool         $update_comment_meta_cache Whether to prime cache for comment meta.
     *     @type bool|string  $hierarchical              Whether to query for comments hierarchically.
     *     @type int          $offset                    Comment offset.
     *     @type int          $number                    Number of comments to fetch.
     * }
     */
    $comment_args = apply_filters( 'comments_template_query_args', $comment_args );
    $comment_query = new WP_Comment_Query( $comment_args );
    $_comments = $comment_query->comments;
 
    // Trees must be flattened before they're passed to the walker.
    if ( $comment_args['hierarchical'] ) {
        $comments_flat = array();
        foreach ( $_comments as $_comment ) {
            $comments_flat[]  = $_comment;
            $comment_children = $_comment->get_children( array(
                'format' => 'flat',
                'status' => $comment_args['status'],
                'orderby' => $comment_args['orderby']
            ) );
 
            foreach ( $comment_children as $comment_child ) {
                $comments_flat[] = $comment_child;
            }
        }
    } else {
        $comments_flat = $_comments;
    }
 
    /**
     * Filters the comments array.
     *
     * @since 2.1.0
     *
     * @param array $comments Array of comments supplied to the comments template.
     * @param int   $post_ID  Post ID.
     */
    $wp_query->comments = apply_filters( 'comments_array', $comments_flat, $post->ID );
 
    $comments = &$wp_query->comments;
    $wp_query->comment_count = count($wp_query->comments);
    $wp_query->max_num_comment_pages = $comment_query->max_num_pages;
 
    if ( $separate_comments ) {
        $wp_query->comments_by_type = separate_comments($comments);
        $comments_by_type = &$wp_query->comments_by_type;
    } else {
        $wp_query->comments_by_type = array();
    }
 
    $overridden_cpage = false;
    if ( '' == get_query_var( 'cpage' ) && $wp_query->max_num_comment_pages > 1 ) {
        set_query_var( 'cpage', 'newest' == get_option('default_comments_page') ? get_comment_pages_count() : 1 );
        $overridden_cpage = true;
    }
 
    if ( !defined('COMMENTS_TEMPLATE') )
        define('COMMENTS_TEMPLATE', true);
 
    $theme_template = STYLESHEETPATH . $file;
    /**
     * Filters the path to the theme template file used for the comments template.
     *
     * @since 1.5.1
     *
     * @param string $theme_template The path to the theme template file.
     */
    $include = apply_filters( 'comments_template', $theme_template );
    if ( file_exists( $include ) )
        require( $include );
    elseif ( file_exists( TEMPLATEPATH . $file ) )
        require( TEMPLATEPATH . $file );
    else // Backward compat code will be removed in a future release
        require( ABSPATH . WPINC . '/theme-compat/comments.php');
}


class Walker_Nav_Menus extends Walker {
    /**
     * What the class handles.
     *
     * @since 3.0.0
     * @access public
     * @var string
     *
     * @see Walker::$tree_type
     */
    public $tree_type = array( 'post_type', 'taxonomy', 'custom' );
 
    /**
     * Database fields to use.
     *
     * @since 3.0.0
     * @access public
     * @todo Decouple this.
     * @var array
     *
     * @see Walker::$db_fields
     */
    public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
 
    /**
     * Starts the list before the elements are added.
     *
     * @since 3.0.0
     *
     * @see Walker::start_lvl()
     *
     * @param string   $output Passed by reference. Used to append additional content.
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );
        $output .= "{$n}{$indent}<ul class=\"sub-menu\">{$n}";
    }
 
    /**
     * Ends the list of after the elements are added.
     *
     * @since 3.0.0
     *
     * @see Walker::end_lvl()
     *
     * @param string   $output Passed by reference. Used to append additional content.
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );
        $output .= "$indent</ul>{$n}";
    }
 
    /**
     * Starts the element output.
     *
     * @since 3.0.0
     * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
     *
     * @see Walker::start_el()
     *
     * @param string   $output Passed by reference. Used to append additional content.
     * @param WP_Post  $item   Menu item data object.
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     * @param int      $id     Current item ID.
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
 
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
 
        /**
         * Filters the arguments for a single nav menu item.
         *
         * @since 4.4.0
         *
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param WP_Post  $item  Menu item data object.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
 
        /**
         * Filters the CSS class(es) applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array    $classes The CSS classes that are applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
 
        /**
         * Filters the ID applied to a menu item's list item element.
         *
         * @since 3.0.1
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
 
        $output .= $indent . '<li' . $id . $class_names .'>';
 
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
       
        /**
         * Filters the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         *     @type string $title  Title attribute.
         *     @type string $target Target attribute.
         *     @type string $rel    The rel attribute.
         *     @type string $href   The href attribute.
         * }
         * @param WP_Post  $item  The current menu item.
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
       
        $attributes = '';
        
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
               
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
 
        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters( 'the_title', $item->title, $item->ID );
 
        /**
         * Filters a menu item's title.
         *
         * @since 4.4.0
         *
         * @param string   $title The menu item's title.
         * @param WP_Post  $item  The current menu item.
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
     
         
            $item_output = $args->before;
            
            $item_output .= '<a'. $attributes .'  data-toggle="tab" >';

            $item_output .= $args->link_before . $title . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
       
 
        /**
         * Filters a menu item's starting output.
         *
         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
         * no filter for modifying the opening and closing `<li>` for a menu item.
         *
         * @since 3.0.0
         *
         * @param string   $item_output The menu item's starting HTML output.
         * @param WP_Post  $item        Menu item data object.
         * @param int      $depth       Depth of menu item. Used for padding.
         * @param stdClass $args        An object of wp_nav_menu() arguments.
         */
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
 
    /**
     * Ends the element output, if needed.
     *
     * @since 3.0.0
     *
     * @see Walker::end_el()
     *
     * @param string   $output Passed by reference. Used to append additional content.
     * @param WP_Post  $item   Page data object. Not used.
     * @param int      $depth  Depth of page. Not Used.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $output .= "</li>{$n}";
    }
 
} // Walker_Nav_Menu
