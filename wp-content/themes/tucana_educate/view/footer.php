<?php 

	$jbrsoft_settings = get_option( "jbrsoft_theme_settings" ); 
	$facebook         = stripslashes( isset( $jbrsoft_settings['jbrsoft_facebook'] ) ? $jbrsoft_settings['jbrsoft_facebook']  : '') ;
	$twitter          = stripslashes( isset( $jbrsoft_settings['jbrsoft_twitter'] )  ? $jbrsoft_settings['jbrsoft_twitter']   : '') ;
	$google           = stripslashes( isset( $jbrsoft_settings['jbrsoft_google'] )   ? $jbrsoft_settings['jbrsoft_google']    : '') ;
	$linkedin         = stripslashes( isset( $jbrsoft_settings['jbrsoft_linkedin'] ) ? $jbrsoft_settings['jbrsoft_linkedin']  : '') ;
	$phone            = stripslashes( isset( $jbrsoft_settings['jbrsoft_phone'] )    ? $jbrsoft_settings['jbrsoft_phone']     : '') ;
?>
<footer id="footer" class="site-footer wow fadeInUp animated" data-wow-duration="1s">
	 <div class="footer-top">
        <div class="container">
            <div class="col-md-4 col-xs-12 col-lg-4">
                <div class="left">
                    <h4 class="caps subscibe-title"><strong>Subscribe</strong></h4>
                    <form action="#">
						<input type="text" class="newsletter form-control">
						<button class="btn btn-success newsletter-button">Submit</button>
					</form>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-lg-4 col-sm-4 pull-right">
                <ul class="scoail-share pull-right">
                    <li class="col-md-4 col-xs-12 col-lg-4 col-sm-4">
                        <div class="widget-title">Follow Us:</div>
                    </li>
                    <li class="col-md-8 col-xs-12 col-lg-8 col-sm-8">
                        <ul class="socail-share-item">
                            <?php 

                                $jbrsoft_settings = get_option( "jbrsoft_theme_settings" ); 
                                $facebook = stripslashes( isset( $jbrsoft_settings['jbrsoft_facebook'] )  ? $jbrsoft_settings['jbrsoft_facebook']  : '');
                                $twitter  = stripslashes( isset( $jbrsoft_settings['jbrsoft_twitter'] )   ? $jbrsoft_settings['jbrsoft_twitter']   : '');
                                $google   = stripslashes( isset( $jbrsoft_settings['jbrsoft_google'] )    ? $jbrsoft_settings['jbrsoft_google']    : '');
                                $linkedin = stripslashes( isset( $jbrsoft_settings['jbrsoft_linkedin'] )  ? $jbrsoft_settings['jbrsoft_linkedin']  : '');
                                $phone    = stripslashes( isset( $jbrsoft_settings['jbrsoft_phone'] )     ? $jbrsoft_settings['jbrsoft_phone']     : '');
                                $email    = stripslashes( isset( $jbrsoft_settings['jbrsoft_email'] )     ? $jbrsoft_settings['jbrsoft_email']     : '');
                            ?>
                            <?php if($facebook) { ?>
                            <li>
                                <a target="_blank" class="twitter socail-icon-all" href="<?php echo $facebook; ?>">
                                    <span class="fa fa-twitter"></span>
                                </a>
                            </li>
                            <?php } ?>

                             <?php if($twitter) { ?>
                            <li>
                                <a target="_blank" class="facebook socail-icon-all" href="<?php echo $twitter; ?>">
                                    <span class="fa fa-facebook"></span>
                                </a>
                            </li>
                            <?php } ?>
                             <?php if($google) { ?>
                            <li>
                                <a target="_blank" class="google-pluse socail-icon-all" href="<?php echo $google;?>">
                                    <span class="fa fa-google-plus"></span>
                                </a>
                            </li>
                            <?php } ?>

                            <?php if($linkedin) { ?>
                            <li>
                                <a target="_blank" class="socail-linkdin socail-icon-all" href="<?php echo $linkedin;?>">
                                    <span class="fa fa-linkedin"></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
	<div id="footer-inner" class="container clr">
        <?php if ( is_active_sidebar( 'footer' ) ) : ?>
		<div id="footer-widgets" class="wpex-row clr gap-30">
            <?php dynamic_sidebar('footer') ?> 
		</div>
		<?php endif; ?>
	</div>
</footer>

<div id="footer-bottom" class="clr wow fadeInUp animated" data-wow-duration="1s">
    <div id="footer-bottom-inner" class="container clr">
        <div id="copyright" class="clr" role="contentinfo"> 
        	<?php echo jbrsoft_comicpress_copyright(); ?> 
        </div>

        <div id="footer-bottom-menu" class="clr">
        </div>
    </div>
</div>

<?php 
	if( is_front_page() ) {
?>
	<div id="bottom-item-system">
	    <a data-scroll data-options='{ "easing": "easeOutCubic" }' href="#">
	        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
	    </a>
	</div>
<?php 
	} 
?>
