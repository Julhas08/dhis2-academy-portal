<?php 
/**
 * Template Name:Team Management
 */
	get_header(); 
?>
<div id="content-wrap" class="clr">
    <div id="primary">
        <div id="content" class="clr site-content">
           
               
			<div class="service-header"  data-stellar-background-ratio="0.5">
			    <h2 class="page-title"><?php the_title(); ?></h2>
			</div>
			<div class="service-content container team-area-part">
				<?php
		            $paged        = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		            $custom_args  = array(
		                'post_type'      => 'team',
		                'posts_per_page' => -1,

		            );

		            $custom_query = new WP_Query( $custom_args ); 
		            $post_no=1;
		            if ( $custom_query->have_posts() ) : 
		                while ( $custom_query->have_posts() ) : $custom_query->the_post(); 
		                $post_no+=2;
		                $service = get_post_meta(get_the_id(), 'service', true );
		           
		        ?>
							<div class="col-md-4 col-xs-12 col-sm-4 col-lg-4 client-area-row wow bounceInLeft animated animated" data-wow-delay="0.<?php echo $post_no;?>s">
								<div class="fusion-column-wrapper">
									<div class="fusion-person person fusion-person-left fusion-person-icon-top">
										<div class="person-shortcode-image-wrapper">
											<?php 
						                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ),'slider-single'); 
						                        if($image) { 
						                    ?> 
											<div class="person-image-container hover-type-liftup">
												<img alt="<?php the_title(); ?>" src="<?php echo $image[0]; ?>" style="-webkit-border-radius:0px;-moz-border-radius:0px;border-radius:0px;border:0px solid #f6f6f6;" class="person-img img-responsive">
											</div>
											<?php } ?>
											</div>
											<div class="person-desc">
												<div class="person-author">
													<span class="person-name"><?php the_title(); ?></span>
													<div class="col-md-6 col-xs-12 team-area-member">
														
														<span class="person-title"><?php echo $testimonial = get_post_meta( get_the_id(), 'author', true ); ?></span>
													</div>
													<div class="col-md-6 col-xs-12 team-area-member">
														<div class="fusion-social-networks-wrapper pull-right">
															<i class="fa fa-facebook social-icons-part"></i>
															<i class="fa fa-twitter social-icons-part"></i>
															<i class="fa fa-linkedin social-icons-part"></i>
														</div>
													</div>
												</div>
												<div class="person-content fusion-clearfix">
													<?php the_excerpt(); ?>	
												</div>
											</div>
									</div>
									<div class="fusion-clearfix"></div>
								</div>
							</div>
				<?php 
		                endwhile; 
		                wp_reset_postdata(); 
		            else:  

		            endif; 
		        ?> 			
			</div>

		</div>
	</div>
</div>
<?php 
	get_footer();
?>
				