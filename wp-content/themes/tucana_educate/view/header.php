<?php 

    $jbrsoft_settings = get_option( "jbrsoft_theme_settings" ); 
    $facebook = stripslashes( isset( $jbrsoft_settings['jbrsoft_facebook'] )  ? $jbrsoft_settings['jbrsoft_facebook']  : '');
    $twitter  = stripslashes( isset( $jbrsoft_settings['jbrsoft_twitter'] )   ? $jbrsoft_settings['jbrsoft_twitter']   : '');
    $google   = stripslashes( isset( $jbrsoft_settings['jbrsoft_google'] )    ? $jbrsoft_settings['jbrsoft_google']    : '');
    $linkedin = stripslashes( isset( $jbrsoft_settings['jbrsoft_linkedin'] )  ? $jbrsoft_settings['jbrsoft_linkedin']  : '');
    $phone    = stripslashes( isset( $jbrsoft_settings['jbrsoft_phone'] )     ? $jbrsoft_settings['jbrsoft_phone']     : '');
    $email    = stripslashes( isset( $jbrsoft_settings['jbrsoft_email'] )     ? $jbrsoft_settings['jbrsoft_email']     : '');

?>
        <div class="header wow bounceInDown animated" id="fixed_header">
            <div class="top_nav">
                <div class="container">
                    <div class="right">
                        <ul class="tplinks">
                          
                            <li class="side-contact">
                                <a href="support.html#">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    Support 
                                </a>
                            </li>
                            <li class="side-contact">
                                <a href="mailto:<?php echo $email; ?>">
                                <i class="fa fa-envelope-o"></i>
                                <?php if( $email ) { ?>
                                    <?php echo $email; ?>
                                <?php } ?>
                                </a>
                            </li>
                            <ul class="social-top-bar">
                                <?php if( $facebook ) { ?>
                                <li> <a target="_blank" href="<?php echo  $facebook; ?>"><i class="fa fa-facebook"></i></a></li>
                                <?php } ?>
                                
                                <?php if( $twitter ) { ?>   
                                <li> <a target="_blank" href="<?php echo  $twitter; ?>"><i class="fa fa-twitter"></i></a></li>
                                <?php } ?> 
                                
                                <?php if( $twitter ) { ?>    
                                <li> <a target="_blank" href="<?php echo  $facebook; ?>"><i class="fa fa-youtube"></i></a></li>
                                <?php } ?>    
                                
                                <?php if( $twitter ) { ?>  
                                <li> <a target="_blank" href="<?php echo  $facebook; ?>"><i class="fa fa-vimeo"></i></a></li>
                                <?php } 
                                    include_once ABSPATH . 'wp-admin/includes/plugin.php';

                                    if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
                                ?>
                                    <li class="header-cart">
                                        <ul>
                                            <i class="fa fa-cart-arrow-down" aria-hidden="true">
                                                <span class="cart-item-total">
                                                    <?php
                                                        global $woocommerce;
                                                        echo $cart_contents_count = $woocommerce->cart->cart_contents_count;
                                                    ?>
                                                </span>
                                            </i>
                                            <div class="woocmerce_cart_hover">
                                                <div class="checkout woocommerce-checkout">
                                                    <div id="order_review" class="menu-item">
                                                        <?php echo do_shortcode('[woocommerce_cart]'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                <?php
                                    } 
                                ?>
                            </ul>
                            <div class="support">
                              <p> <?php echo  $phone; ?></p>
                            </div>
                        </ul>   
                    </div>
                </div>
            </div>
        </div>

