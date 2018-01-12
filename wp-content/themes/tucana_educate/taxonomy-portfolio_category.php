<?php 
    get_header();
?>
<div class="service-header"  data-stellar-background-ratio="0.5">
    <h2 class="page-title">
	    <?php 

			if( is_tax() ) {
                global $wp_query;
                $term = $wp_query->get_queried_object();
                echo $title = $term->name;
            }
			
	    ?>
    </h2>
</div>
<div id="portfolio" class="scrollto padding-top-bottom">       
    <div class="portfolio padding-top-space pdding-bottom-space">
        <div class="container">
       		<?php 
                while( have_posts() ) : the_post(); 
                
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
            ?> 
         
        </div>
    </div> 
</div>
<?php
    do_action('modal');
    get_footer(); 
?>            
