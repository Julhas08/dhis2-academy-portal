<?php
/**
 * Template Name:Clients Template
 *
 * Client Part
 */
 	get_header(); 
 ?>

	<div class="content-main" >
	    <div class="content-div contact-div">
	        <div class="wrap content-contact">
	            <div class="page-system bg-white page" id="home">
	                
	                <h2 class="title-business title-attr anime-hidden anime-visible animated lightSpeedIn"> <?php the_title(); ?> </h2> 
	              
                    <div class="clients-area">
                        <ul id="da-thumbs" class="da-thumbs">
                                <?php
                                    $paged        = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                                    $custom_args  = array(
                                        'post_type'     => 'clients',
                                        'posts_per_page' => -1,

                                    );

                                    $custom_query = new WP_Query( $custom_args ); 
                                    
                                    if ( $custom_query->have_posts() ) : 

                                        while ( $custom_query->have_posts() ) : $custom_query->the_post(); 

                                        $service = get_post_meta(get_the_id(), 'service', true );
                                   
                                ?>
                                <?php 
                                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ),'slider-single'); 
                                    if($image) { 
                                ?>
                                    <li class="col-lg-3 col-sm-3 col-xs-12 col-md-3 clients-item wow bounceInDown animated animated" data-wow-delay="0.6s" >
                	                	<a class="client-content">
                	                		<img src="<?php echo $image[0];?>" alt="<?php the_title(); ?>" class="img-responsive">
                	              		   <div><span><?php the_title(); ?></span></div>
                                        </a>
                                        
            	                   </li>
                                <?php 
                                    }   
                                        endwhile; 
                                        wp_reset_postdata(); 
                                    else:  

                                    endif; 
                                ?>  
                            </ul>          
                        </div>

	                
	            </div>       
	        </div>
	    </div>
	</div> 
<?php 
	get_footer(); 
?>