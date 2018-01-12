
<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>HOME</h3>
    <p>Some content.</p>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Menu 1</h3>
    <p>Some content in menu 1.</p>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div>
</div>
<h2 class="title-business title-attr anime-hidden anime-visible animated lightSpeedIn"> Strategic Business Units </h2>                 
    <div class="svu-upper col-lg-12">
        <?php
            $paged        = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $custom_args  = array(
                'post_type'     => 'post',
                'category_name' => 'strategic',
                'order'         =>'ASC',
                'paged'         => $paged
            );

            $custom_query = new WP_Query( $custom_args ); 
            
            if ( $custom_query->have_posts() ) : 

                while ( $custom_query->have_posts() ) : $custom_query->the_post(); 
           
            $color   = get_post_meta( get_the_id(), 'color', true );
            $color_2 = get_post_meta( get_the_id(), 'color_2', true );
        ?>
           
            <a href="<?php the_permalink();?>">
                <div data-wow-duration="1s" class="col-lg-4 col-md-4 svu-padding wow rotateInDownLeft animated" id="strategic">
                    <div id="f1_card">
                        <div class="svu-1 svu-height front box-item box-item<?php the_id();?> ">
                            <div class="svu-image">
                                <?php 
                                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ),'slider-single'); 
                                    if($image) { 
                                ?>  
                                <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" class="img-responsive">
                                <?php 

                                    } else { 

                                        echo '<p class="strategic-content strategic-contents'.get_the_id().'">';
                                        the_content();
                                        echo '</p>';

                                    } 
                                ?>
                            </div>
                        </div>
                        <div class="svu-1 svu-height back color-picker<?php the_id();?> box-item center">
                            <div class="sbu-title"> Strategic Business Units </div>
                            <div class="svu-text">
                                <p><?php the_content(); ?></p>                              
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <?php 
                endwhile; 
                jbrsoft_custom_pagination($custom_query->max_num_pages,"",$paged);
                wp_reset_postdata(); 
            else:  

            endif; 
        ?>      
        <div class="clearfix"></div>
    </div> 