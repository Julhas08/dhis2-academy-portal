<?php
    $paged        = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $custom_args  = array(
        'post_type' => 'portfolio',
        'paged'     => $paged
    );

    $custom_query = new WP_Query( $custom_args ); 
    
    if ( $custom_query->have_posts() ) : 
        while ( $custom_query->have_posts() ) : $custom_query->the_post(); 
   
?>
            <div id="portfolio_<?php the_ID();?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title title-blog-modal">
                                <div class="blogo-title">
                                    <span class="content-fa portpolio-modal-title">
                                        <?php the_title();?>
                                    </span>
                                </div>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="img_container blog-images-body col-md-6 col-xs-6 col-lg-6">
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ),'slider-single'); ?>
                                <img src="<?php echo $image[0];?>" alt="<?php the_title();?>"> 
                            </div>
                            <p class="content  col-md-6 col-xs-6 col-lg-6">
                                <?php the_content(); ?>
                            </p>
                        </div> 
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
<?php 
        endwhile; 
        jbrsoft_custom_pagination($custom_query->max_num_pages,"",$paged);
        wp_reset_postdata(); 
    else:  
?>
<p><?php echo 'Sorry, no posts matched your Blog'; ?></p>
<?php 
    endif; 
?>  