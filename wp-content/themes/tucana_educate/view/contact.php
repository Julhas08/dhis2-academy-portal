<div id="contact" class="scrollto"> 
    <div class="container top-contact">
        <div data-wow-delay="1s" data-wow-duration="1s" class="company-address-area wow zoomInDown animated">
            <div class="client-right client-height">

                <div class="drop-line">
                    <p>Drop us a line, give us a call, or just stop by. </p>
                </div>
                <div class="para-inside-the-group client clearfix">
                    <div class="contact-address-system">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mag-location-house-number-dctit.png">
                        <p class="location-text l-text-house">   45 Probal Tower, 3rd Floor </p>
                    </div>
                    <div class="contact-address-system">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mag-location-road-number-dctit.png">
                        <p class="location-text l-text-house"> Probal Housing </p>
                    </div>
                    <div class="contact-address-system">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mag-location-gulshan-dctit.png">
                        <p class="location-text l-text-house">Ring Road ,Adabar </p>
                    </div>
                    <div class="contact-address-system">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mag-location-dhaka-dctit.png">
                        <p class="location-text l-text-house"> Dhaka-1207 </p>
                    </div>
                    <div class="contact-address-system country">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mag-location-bangladesh-dctit.png">
                        <p class="location-text l-text-house"> Bangladesh </p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container contact-area">
        <?php 
            $jbrsoft_settings = get_option( "jbrsoft_theme_settings" );
            $jbrsoft_intro    = stripslashes( isset($jbrsoft_settings['jbrsoft_intro'] ) ? $jbrsoft_settings['jbrsoft_intro'] : '') ;
            $jbrsoft_email    = stripslashes( isset($jbrsoft_settings['jbrsoft_email'] ) ? $jbrsoft_settings['jbrsoft_email'] : '') ;
            $jbrsoft_phone    = stripslashes( isset($jbrsoft_settings['jbrsoft_phone'] ) ? $jbrsoft_settings['jbrsoft_phone'] : '') ;
            $jbrsoft_map      = stripslashes( isset($jbrsoft_settings['jbrsoft_map'] )   ? $jbrsoft_settings['jbrsoft_map']   : '') ;
            
        ?>
       
        <div class=" padding-top-bottom">
            <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                <h2 class="contct-form-title"> Send Us your Query </h2>
                <form action="#" method="post" class="contact-form">
                    <p class="col-md-12 col-lg-12 col-sm-12 col-xs-12 contact-per-row">
                        <label class="label-name-contact"> First Name: </label>
                        <span>
                            <input type="text" name="your-name" placeholder="Your First Name" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
                        </span>
                    </p>
                    <p class="col-md-12 col-lg-12 col-sm-12 col-xs-12 contact-per-row">
                        <label class="label-name-contact"> Last Name: </label>
                        <span>
                            <input type="text" name="your-name" placeholder="Your Last Name" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
                        </span>
                    </p>
                    <p class="col-md-12 col-lg-12 col-sm-6 col-xs-12 contact-per-row">
                        <label class="label-name-contact"> Email: </label>
                        <span>
                            <input type="email" name="your-email" placeholder="Your Email" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false">
                        </span>
                    </p>
                    <p  class="col-md-12 col-lg-12 col-sm-6 col-xs-12 contact-per-row">
                        <label class="label-name-contact"> Message: </label>
                        <span>
                            <textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" placeholder="Send Your Message" aria-invalid="false"></textarea>
                        </span> 
                    </p>
                    <p class="col-md-12 col-lg-12 col-sm-6 col-xs-12 contact-per-row">
                        <input type="submit" value="SEND US" class="submit">
                    </p>
                </form> 
            </div>
            <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                <div class="contact-office">
                    <h2>Office Location</h2>

                    <?php   
                        echo $jbrsoft_map;
                    ?>
                    
                </div>    
            </div>
        </div>
    </div>
</div>
