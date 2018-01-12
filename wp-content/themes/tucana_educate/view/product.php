<h2 class="prodcts-title">-: OUR PRODUCTS :-</h2>

<div class="vcex-portfolio-grid-wrap wpex-clr product">
    <?php 
                 
        $args = array(
            'post_type' => 'product',
        );

        $idd            = get_the_ID();
        $product      = new WP_Query($args);
        $product_taxs = [];

        if(is_array($product->posts) && !empty($product->posts)) {
            
            foreach($product->posts as $gallery_post) {
                $post_taxs = wp_get_post_terms($gallery_post->ID, 'product_cat', array("fields" => "all"));
                
                if(is_array($post_taxs) && !empty($post_taxs)) {

                    foreach($post_taxs as $post_tax) {
                        $product_taxs[$post_tax->slug] = $post_tax->name;
                    }
                }
            }
        }
        if(is_array($product_taxs) && !empty($product_taxs) && get_post_meta($idd, 'pyre_product_filters', true) != 'no'):
        the_tags(); 
    ?>
        
        <div class="features-tab">
            <ul class="portfolioFilters">
                <li class="active">
                    <a href="#" data-filter="*" class="theme-button minimal-border">
                        <span>All</span>
                    </a>
                </li>  
                <?php 
                    foreach($product_taxs as $product_tax_slug => $product_tax_name): 
                ?>
                        <li class=".product<?php echo implode(explode(' ', $product_tax_name )); ?>">
                            <a href="#" data-filter=".product<?php echo implode(explode(' ', $product_tax_name )); ?>" class="theme-button minimal-border">
                                <?php echo $product_tax_name; ?>
                            </a>
                        </li>
                <?php 
                    endforeach; 
                ?> 
            </ul>
            <?php  
                endif;
            ?>
        
            <div class="portfolioContainers">
                <?php 
                    foreach($product_taxs as $product_tax_slug => $product_tax_name): 
                    $custom_args = array(
                            'post_type'      => 'product',
                            'product_cat'    => $product_tax_name,
                            'posts_per_page' => '3',
                        );
                    $loop = new WP_Query( $custom_args );

                    if ( $loop->have_posts() ) {

                        while ( $loop->have_posts() ) : $loop->the_post();
                        $image_id = get_post_meta(get_the_id(), '_listing_image_id', true );
                        $src      = wp_get_attachment_image_src( get_post_thumbnail_id($idd), 'full', false, '' );
                ?>
                            <div class="product<?php echo implode(explode(' ', $product_tax_name )); ?> product-entry">    

                                <?php 
                                    if($image_id) {
                                        echo $thumbnail_html = wp_get_attachment_image( $image_id, 'post-thumbnail' );
                                    } 
                                ?>
                            
                                <div class="products-item product<?php echo implode(explode(' ', $product_tax_name )); ?>">
                                    <div class="container">
                                        <div class="product-entry-media col-md-6 col-xs-12 col-lg-6 col-sm-6 entry-media">
                                            <a  class="product-entry-media-link" href="<?php the_permalink();?>">
                                                <?php the_post_thumbnail('portfolio-entry-img'); ?>
                                            </a>
                                        </div>
                                        <div class="product-entry-details col-md-6 col-xs-12 col-lg-6 col-sm-6 entry-details wpex-clr">
                                            <h2 class="product-entry-title entry-title">
                                                <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                            </h2>
                                            <div class="product-entry-excerpt wpex-clr">
                                                <ul class="product-full">
                                                    <?php 
                                                        the_tags();
                                                        $terms = get_the_terms( get_the_ID(), 'product_tag' );

                                                        if ($terms) {
                                                            foreach ($terms as $term) {
                                                                echo '<li>' . $term->name.'</li>';
                                                            }

                                                        }  else {
                                                           echo "<h2>No Product Tag Found</h2>";
                                                        }
                                                    ?>                                   
                                                </ul>
                                            </div>
                                            <?php 
                                                $image_id = get_post_meta(get_the_ID(), '_listing_image_id', true );
                                            ?>
                                            <div class="portfolio-entry-readmore-wrap wpex-clr">
                                                <a href="<?php the_permalink();?>"  class="view-buttons-system theme-button animate-on-hover">PRODUCT DETAILS </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <br>
                <?php
                        endwhile;
                    } else {
                        echo 'No products found';
                    }
                    wp_reset_postdata();
                    endforeach; 
                ?>  
            </div>
        </div>
        
        <?php 
            if ( is_front_page() ) {   
        ?>  
                <a class="btn btn-primary our-all-product"  target="_self">
                    OUR ALL PRODUCTS 
                    <i class="fa fa-long-arrow-right"></i>
                </a>
        <?php 
            }
        ?>
<br>
</div>

  