<div class="service-header"  data-stellar-background-ratio="0.5">
    <h2 class="page-title"><?php the_title(); ?></h2>
</div>
    <div class="service-content container" >
        <?php
            $paged        = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $custom_args  = array(
                'post_type'     => 'service',
                'posts_per_page' => -1,

            );

            $custom_query = new WP_Query( $custom_args ); 
            
            if ( $custom_query->have_posts() ) : 

                while ( $custom_query->have_posts() ) : $custom_query->the_post(); 

                $service = get_post_meta(get_the_id(), 'service', true );
           
        ?>
                    <div class="col-md-4 col-xs-12 col-lg-4 col-sm-4 service-content-part wow bounceInDown animated animated" data-wow-delay="0.6s">
                        <div class="service-row">
                            <?php if($service) { ?>
                            <i class="fa <?php echo $service; ?>"></i>
                            <?php } ?>
                            <h2><?php the_title();?></h2>
                            <p><?php the_content();?></p>
                        </div>
                    </div>
                    <?php 
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ),'slider-single'); 
                        if($image) { 
                    ?> 
                    
                        <div class="col-md-4 col-xs-12 col-lg-4 col-sm-4 service-content-part block wow bounceInDown animated animated" data-wow-delay="0.9s" >
                           <a class="fancybox zoom" rel="group" href="<?php echo $image[0];?>" id="blue<?php the_ID();?>"><img src="<?php echo $image[0];?>" alt="<?php the_title(); ?>" class="img-responsive"></a>
                        </div>
                    <?php } ?>

        <?php 
                endwhile; 
                wp_reset_postdata(); 
            else:  

            endif; 
        ?>         
    </div>
