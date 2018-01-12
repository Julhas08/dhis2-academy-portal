<div id="portfolio" class="scrollto padding-top-bottom">       
    <div class="portfolio padding-top-space pdding-bottom-space">
     
        <div class="container">
        <?php
            $paged        = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $custom_args  = array(
                'post_type'      => 'portfolio',
                'posts_per_page' => -1,

            );

            $custom_query = new WP_Query( $custom_args ); 
            
            if ( $custom_query->have_posts() ) : 
                $post_no = 1; 
                while ( $custom_query->have_posts() ) : $custom_query->the_post(); 

                $service = get_post_meta(get_the_id(), 'service', true );
                $image_id = get_post_meta(get_the_id(), '_listing_image_id', true );

                //$product_bg_data    = sanitize_text_field( $_POST['product_bg'] );
           
        ?>
            <div class="col-md-3 col-xs-12 col-lg-3 col-sm-3 portfolio-part wow bounceInDown animated animated" data-wow-delay="0.6s"  >
                <div class="portfolio-column">
                    <div class="imageframe-align-center">
                           
                        <div id="portfolios<?php the_ID();?>" class="owl-carousel">
                            <?php 
                                $image1 = get_post_meta(get_the_id(), 'image1', true );
                                $image2 = get_post_meta(get_the_id(), 'image2', true );
                                $image3 = get_post_meta(get_the_id(), 'image3', true );
                                $image4 = get_post_meta(get_the_id(), 'image4', true );
                                $image5 = get_post_meta(get_the_id(), 'image5', true );
                                if($image1) { 
                            ?> 
                                <div class="item block portfolio-item-image">
                                   <a class="fancybox zoom zoom-portfolio" rel="group" href="<?php echo $image1;?>" id="portfolios<?php the_ID();?>">
                                   <img src="<?php echo $image1;?>" alt="<?php the_title(); ?>" class="img-responsive"></a>
                                </div>
                            <?php
                             
                                }

                               if($image2) { 
                            ?> 
                                <div class="item block portfolio-item-image">
                                   <a class="fancybox zoom zoom-portfolio" rel="group" href="<?php echo $image2;?>" id="portfolios<?php the_ID();?>">
                                   <img src="<?php echo $image2;?>" alt="<?php the_title(); ?>" class="img-responsive"></a>
                                </div>
                            <?php
                             

                                }

                               if($image3) { 
                            ?> 
                                <div class="item  block portfolio-item-image">
                                   <a class="fancybox zoom zoom-portfolio" rel="group" href="<?php echo $image3;?>" id="portfolios<?php the_ID();?>">
                                   <img src="<?php echo $image3;?>" alt="<?php the_title(); ?>" class="img-responsive"></a>
                                </div>
                            <?php
                             
                                }

                               if($image4) { 
                            ?> 
                                <div class="item  block portfolio-item-image">
                                   <a class="fancybox zoom zoom-portfolio" rel="group" href="<?php echo $image4;?>" id="portfolios<?php the_ID();?>">
                                   <img src="<?php echo $image4;?>" alt="<?php the_title(); ?>" class="img-responsive"></a>
                                </div>
                            <?php
                             
                                }
                                 if($image5) { 
                            ?> 

                                <div class="item block portfolio-item-image">
                                   <a class="fancybox zoom zoom-portfolio" rel="group" href="<?php echo $image5;?>" id="portfolios<?php the_ID();?>">
                                   <img src="<?php echo $image5;?>" alt="<?php the_title(); ?>" class="img-responsive"></a>
                                </div>
                            <?php
                             
                                }

                            ?> 
                            </div>                                        
                       
                    </div>
                    <h2 style="text-align: center;" data-fontsize="18" data-lineheight="27"><?php the_title();?></h2>
                    <p class="portfolio-contents"> <?php the_content();?> </p>
                    <a href="<?php the_permalink(); ?>" target="_blank" class="fusion-button button-flat button-round button-small button-custom button-2">
                        <span class="fusion-button-text">Learn More</span>
                    </a>
                </div>
            </div>
        <?php 
                endwhile; 
                //jbrsoft_custom_pagination($custom_query->max_num_pages,"",$paged);
                wp_reset_postdata(); 
            else:  

            endif; 
        ?>    
         
        </div>
    </div> 
</div>