<html lang="en">
<head>
    <meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
    <div class="overall-area">
        <div class="top-header">
                <div class="pull-right">
                    
                    <button class="btn btn-suceess signup">
                        +8801989-442856
                    </button>
                    <button class="btn btn-suceess login "> 
                        <i class="fa fa-map-marker icon-play" aria-hidden="true"></i> 
                        Contact Us
                    </button>
                </div>
            </div>
            <div class="header-file header-other-page">  
                <div class="container">
                    <?php      
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $image     = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        
                        if($image) { 
                    ?>
                        <div class="col-md-3 col-xs-12 col-lg-3 col-sm-3 left-box">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $image[0]; ?>" alt="" class="img-responsive"></a>
                        </div>
                    <?php 
                        } 
                    ?>
                    <div class="col-md-9 col-xs-12 col-lg-9 col-sm-9 left-box">
                        <div class="container-fulid menubar-area">
                    <div class="menubar">
                        <nav class="navbar navbar-inverse navbar-systen">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    
                                </div>

                                <div class="collapse navbar-collapse" id="myNavbar">
                                    <?php
                                        $defaults = array(
                                            'theme_location'  => 'main-menu',
                                            'menu'            => 'main-menu',
                                            'container'       => 'div',
                                            'container_class' => 'collapse navbar-collapse',
                                            'container_id'    => 'myNavbar',
                                            'menu_class'      => 'navbar-bootstrap',
                                            'menu_id'         => 'tabMenu',
                                            'echo'            => true,
                                            'fallback_cb'     => 'wp_page_menu',
                                            'before'          => '',
                                            'after'           => '',
                                            'link_before'     => '',
                                            'link_after'      => '',
                                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                            'depth'           => 0,
                                            'walker'          => ''
                                        );
                                        wp_nav_menu( $defaults );
                                ?>

                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                   
                    </div>
                </div>
            </div>  
            <div class="content-top">
                <div class="container">
                    <div class="col-md-5 col-xs-12 col-lg-5 header-right-search">
                        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s"  title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                            <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />       
                        </form>
                    </div>
                    <div class="col-md-5 col-xs-12 col-lg-5 pull-right">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>      