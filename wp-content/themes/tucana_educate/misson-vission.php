<?php 
/**
 * Template Name:mission and Vission
 */
    get_header(); 
?>
	
    <div id="content-wrap" class="clr">
        <div id="primary">
            <div id="content" class="clr tabs-about-area">
                
                    <div class="service-header about-header"  data-stellar-background-ratio="0.5">
                        <h2 class="page-title"><?php the_title(); ?></h2>
                    </div>
                    <div class="container bg-white">
                        <?php       

                            $args = array(
                                'post_type' => 'about',
                            );
                            $idd            = get_the_ID();
                            $about      = new WP_Query($args);
                            $about_taxs = [];
                            if(is_array($about->posts) && !empty($about->posts)) {

                                foreach($about->posts as $gallery_post) {

                                    $post_taxs = wp_get_post_terms($gallery_post->ID, 'about_category', array("fields" => "all"));
                                    
                                    if(is_array($post_taxs) && !empty($post_taxs)) {

                                        foreach($post_taxs as $post_tax) {

                                            $about_taxs[$post_tax->slug] = $post_tax->name;
                                        }
                                    }
                                }
                            }
                            if(is_array($about_taxs) && !empty($about_taxs) && get_post_meta($idd, 'pyre_about_filters', true) != 'no'): 
                        ?>
                            <div class="col-md-12 col-xs-12 col-sm-12 mission-area">
                                <ul class="nav nav-pills mission-vission">     
                                    <?php 
                                        foreach($about_taxs as $about_tax_slug => $about_tax_name): 
                                    ?>
                                            <li class="margin-right-s" role="presentation">
                                                <a data-toggle="tab" class="button" href="#in<?php echo $about_tax_slug; ?>">
                                                    <i class="fa fa-list"></i> 
                                                    <?php echo $about_tax_name; ?>
                                                </a>
                                            </li>  
                                    <?php 
                                        the_tags(); 
                                        endforeach; 
                                    ?> 
                                </ul>
                            </div>
                        <?php  

                            endif; 
                        ?>
             
                        <div class="container-tabs">
                            <div class="tab-content tab-pane-item">
                                <?php 
                                    foreach($about_taxs as $about_tax_slug => $about_tax_name): 
                                ?>
                                        <div class="tab-pane fade in" id="in<?php echo $about_tax_slug; ?>">
                                            <?php  
                                           
                                                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                                                $custom_args = array(
                                                    'post_type'          => 'about',
                                                    'posts_per_page'     => 1,
                                                    'about_category' => $about_tax_name,
                                                    'paged'              => $paged
                                                );

                                                $loop = new WP_Query( $custom_args ); 

                                                if ( $loop->have_posts() ) {

                                                    while ( $loop->have_posts() ) : $loop->the_post();
                                                        $idd = get_the_ID();
                                                        $src = wp_get_attachment_image_src( get_post_thumbnail_id($idd), 'full', false, '' );
                                                        the_tags(); 
                                            ?>
                                                        
                                                        <p><?php the_content(); ?></p>
                                            <?php
                                                    
                                                    endwhile;
                                                } else {
                                                echo'No Post found';
                                                }
                                            ?>
                                        </div>
                                <?php 
                                    endforeach; 
                                ?>    
                            </div>
                        </div>
                    </div>    
			</div>
        </div>
    </div>

<?php 
    get_footer();
?>