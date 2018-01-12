<?php 
/**
 * Template Name:Blog Template
 *
 * Blog Template For Jbrsoft Theme
 */

    get_header();

    $paged        = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $custom_args  = array(
        'post_type'     => 'post',
        'category_name' => 'blog',
        'paged'         => $paged
    );

    $custom_query = new WP_Query( $custom_args ); 
    
    if ( $custom_query->have_posts() ) : 

        while ( $custom_query->have_posts() ) : $custom_query->the_post(); 
   
?>
        <div id="blog_<?php the_ID();?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title title-blog-modal">
                            <div class="blogo-title">
                                <i class="fa fa-user author-icon"></i>
                                <span class="title-author-name"><?php the_author();?> </span>
                                <span class="content-fa"><?php the_date();?></span>
                                <span class="blog-date"><?php the_title();?></span>
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
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6 blog-modal-left">
                                <?php comments_template(); ?>
                            </div>
                            <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6 blog-modal-left">
                                <div class="row">
                                    <div class="socail-share-color" data-easyshare-url="<?php the_permalink(); ?>" data-easyshare="<?php the_permalink(); ?>">
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

    endif; 
?>  
    <div class="content-main" >
        <div class="content-div contact-div">
            <div class="wrap content-contact">
                <div class="page-system bg-white padding-top-bottom" id="home">
                    <div class="col-md-9 col-xs-12 col-lg-9">
                        <div id="jbrsot-blog-main">
                            <div class="jbrsot-blog-main dual">
                                <div class="spine animated"></div>
                                    
                                <?php
                                    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                                    $custom_args = array(
                                        'post_type'     => 'post',
                                        'posts_per_page'=> 4,
                                        'category_name' => 'blog',
                                        'paged'         => $paged
                                    );

                                    $custom_query = new WP_Query( $custom_args ); 

                                    if ( $custom_query->have_posts() ) : 
                                    
                                        while ( $custom_query->have_posts() ) : $custom_query->the_post(); 
                                ?>
                                            <div class="column column_left">
                                                <div class="fadeInLeft jbrsot_blog-part blog_post animated">
                                                    <div class="title">
                                                        <i class="fa fa-user author-icon"></i>
                                                        <span class="author-name">
                                                            <?php the_author(); ?> 
                                                        </span>
                                                        <span class="label">
                                                            <?php the_title(); ?>
                                                        </span>
                                                        <span class="date">
                                                            <?php the_date(); ?>
                                                        </span>
                                                        <span class="toltipse"></span>
                                                    </div>
                                                    <div class="blog-page-item">
                                                        <div class="img_container blog-part-colunmn">
                                                            <ul id="lightgallery" class="list-unstyled row">
                                                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ),'slider-single'); ?>
                                                                <li>
                                                                    <a href="#">
                                                                        <img src="<?php echo $image[0]; ?>" class="img-responsive blog-images" alt="<?php the_title();?>">  
                                                                    </a>
                                                                </li>
                                                            </ul>  
                                                        </div>
                                                        <p class="content">
                                                            <?php the_excerpt();?>
                                                            <button data-target="#blog_<?php the_ID();?>" data-toggle="modal" class="btn btn-default" type="button">View</button>
                                                        </p>
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
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    if ( is_active_sidebar( 'blog-sidebar' ) ) : 
                ?>
                        <div class="col-md-3 col-xs-12 col-lg-3">                       
                            <?php dynamic_sidebar( 'blog-sidebar' ); ?> 
                        </div>
                <?php 
                    endif; 
                ?>
            </div> 
        </div>       
    </div>
<?php 
    get_footer();
?>