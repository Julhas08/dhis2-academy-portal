<?php 
    get_header();
?>

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
           
        ?>
            <div class="col-md-3 col-xs-12 col-lg-3 col-sm-3 portfolio-part">
                <div class="portfolio-column">
                    <div class="imageframe-align-center">
                        <span class="fusion-imageframe imageframe-none imageframe-26 hover-type-zoomin" style="border:10px solid rgba(000,000,000,.04);">
                            <div data-ride="carousel" class="carousel slide" id="portfolioCarousel">
                                 <ol class="carousel-indicators portfolio-item">
                                    <li class="" data-slide-to="0" data-target="#testimonialCarousel"></li>
                                    <li class="" data-slide-to="<?php echo $post_no; ?>" data-target="#testimonialCarousel"></li>
                                </ol>    
                                <div role="listbox" class="carousel-inner">
                                    <?php 
                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ),'slider-single'); 
                                        if($image) { 
                                    ?> 
                                        <div class="item">
                                            <img height="171" width="257" class="img-responsive wp-image-15095" alt="Avada Admin" src="<?php echo $image[0]; ?>">
                                        </div>
                                    <?php 
                                        }

                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ),'slider-single'); 
                                        if($image) { 
                                    ?> 
                                        <div class="item">
                                            <img height="171" width="257" class="img-responsive wp-image-15095" alt="Avada Admin" src="<?php echo $image[0]; ?>">
                                        </div>
                                    <?php } ?>
                                   
                                </div> 
                            </div>                                        
                        </span>
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
<?php
    do_action('modal');
    get_footer(); 
?>            
