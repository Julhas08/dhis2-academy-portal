<div class="entry-content entry clr">
    <div class="full-backgrournd-job">
        <div class="container">
            <?php
                global $post;
                $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'slider-single');
                $args  = array( 
                    'posts_per_page' => 10, 
                    'post_type'      => 'post',
                    'category_name'  => 'job'
                );

                $newsposts  = get_posts( $args );
                foreach( $newsposts as $post ) : setup_postdata($post); 
            ?>
                    <div class="col-md-6 col-xs-12 col-lg-6 col-md-6">
                        <div class="wpb_wrapper wpex-vc-column-wrapper wpex-clr all_register_item">
                            <div class="vcex-teaser">
                                <div class="vcex-teaser-content clr">
                                    <div class="vcex-teaser-text remove-last-p-margin clr">
                                        <ul class="counter clearfix">
                                            <li class="zero-item zero">0</li>
                                            <li class="zero-item">0</li>
                                            <li class="zero-item">0</li>
                                            <li class="zero-item">0</li>
                                            <li class="zero-item">0</li>
                                            <li class="zero-item">6</li>
                                        </ul>
                                        <div class="jobs">
                                            <span class="right-button-job"><?php the_title();?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="button-register">
                                <button class="vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-turquoise">REGISTER NOW</button>
                            </div>
                        </div>
                    </div>
            <?php 
                endforeach;

                global $post;
                $args = array( 
                    'posts_per_page' => 10, 
                    'post_type'      => 'post',
                    'category_name'  => 'register'
                );
                $newsposts  = get_posts( $args );
                $image      = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'slider-single');
                    foreach( $newsposts as $post ) : setup_postdata($post);  
            ?>
                        <div class="col-md-6 col-xs-12 col-lg-6 col-md-6">
                            <div class="all_jobs_item">
                                <div class="vcex-image-grid wpex-row clr grid-style-default lightbox-group">
                                    <div class="id-4590 vcex-image-grid-entry span_1_of_4 col col-1">
                                        <figure class="vcex-image-grid-entry-img clr ">
                                            <a data-type="image" data-title="verified" class="vcex-image-grid-entry-img wpex-lightbox-group-item" title="verified" href="<?php echo $image[0]; ?>">
                                                <img width="118" height="119" alt="<?php the_title();?>" src="<?php echo $image[0]; ?>"> 
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                                
                                <div class="vc_btn3-container vc_btn3-inline vc_custom_1451994437210">
                                    <button class="vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-pink">ALL JOB</button>
                                </div>
                            </div>
                        </div>
            <?php 
                    endforeach; 
            ?>
        </div>
    </div>  
    <div class="container">
        <div class="col-md-8 col-xs-12 col-lg-8 col-sm-8">
            <div class="wpb_wrapper wpex-vc-column-wrapper wpex-clr ">
                <div class="wpb_text_column wpb_content_element ">
                    <div class="wpb_wrapper">
                        <div class="title-lines">
                            <h3 class="mt0">Find a Job Per</h3>
                        </div>
                    </div>
                </div>
                <div class="map-vc-system">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a class ="" data-toggle="tab" href="#home">Map</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <p> 
                                <?php 
                                    $jbrsoft_settings = get_option( "jbrsoft_theme_settings" );
                                    echo $jbrsoft_map = stripslashes(isset($jbrsoft_settings['jbrsoft_map'] )          ? $jbrsoft_settings['jbrsoft_map']        : '') ;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <div class="col-md-4 col-lg-4 col-xs-12">
            <h5 class="socials-title">Share Us</h5>
            <div class="socail-share-color pull-right" data-easyshare-url="http://jbrsoft.com" data-easyshare="http://jbrsoft.com">
                <button class="button-share-job" data-easyshare-button="facebook">
                    <span class="fa fa-facebook"></span>
                    <span>Share</span>
                </button>
                <span data-easyshare-button-count="facebook">0</span>
                
                <button class="button-share-job" data-easyshare-tweet-text="" data-easyshare-button="twitter">
                    <span class="fa fa-twitter"></span>
                    <span>Tweet</span>
                </button>
                <span data-easyshare-button-count="twitter">0</span>

                <button class="button-share-job" data-easyshare-button="google">
                    <span class="fa fa-google-plus"></span>
                    <span>+1</span>
                </button>
                <span class="" data-easyshare-button-count="google">0</span>

                <button class="button-share-job" data-easyshare-button="linkedin">
                    <span class="fa fa-linkedin"></span>
                </button>
                <span data-easyshare-button-count="linkedin">0</span>
                <div data-easyshare-loader="" class="hide">Loading...</div>
            </div>
        </div>
    </div>
</div>