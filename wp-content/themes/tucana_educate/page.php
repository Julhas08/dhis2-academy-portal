<?php
/**
 * index.php
 * defult page
 */
    get_header();
 ?>            
      
<hr class="margin-top">
<section class="main-content">
    <?php 
                 
        $args = array(
            'post_type' => 'post',
        );

        $idd            = get_the_ID();
        $product      = new WP_Query($args);
        $post_text = [];

        if(is_array($product->posts) && !empty($product->posts)) {
            
            foreach($product->posts as $gallery_post) {
                $post_taxs = wp_get_post_terms($gallery_post->ID, 'category', array("fields" => "all"));
                
                if(is_array($post_taxs) && !empty($post_taxs)) {

                    foreach($post_taxs as $post_tax) {
                        $post_text[$post_tax->slug] = $post_tax->name;
                        
                       
                    }
                }
            }
        }
        if(is_array($post_text) && !empty($post_text) && get_post_meta($idd, 'pyre_product_filters', true) != 'no'):
        the_tags(); 
    ?>
            <div class="container">
                <div class="large-12 columns">
                    <div class="owl-carousel owl-theme">
                        <?php 
                            foreach($post_text as $product_tax_slug => $product_tax_name): 
                                    $custom_args = array(
                                    'post_type'      => 'post',
                                    'category_name'    => $product_tax_name,
                                );
                            $loop = new WP_Query( $custom_args );

                            if ( $loop->have_posts() ) {

                                while ( $loop->have_posts() ) : $loop->the_post();
                                $image_id = get_post_meta(get_the_id(), '_listing_image_id', true );
                                $src      = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false, '' );
                        ?>

                                    <div class="item">
                                        <div class="column-post" data-toggle="tab" href="#product<?php echo implode(explode(' ', get_the_id() )); ?>"> 
                                            <img src="<?php echo $src[0]; ?>" alt="" class="image-responsive post-image">
                                            <div class="post-bottom-content">
                                                <h3 class="post-title"><?php the_title(); ?></h3>
                                                                                               
                                                
                                            </div>
                                        </div>
                                    </div> 
                        <?php 
                                               endwhile;
                            } else {
                                echo 'No Post found';
                            }
                            wp_reset_postdata();
                            endforeach; 
                        ?>   
                    </div>
                  <hr>
                  <script>
                    jQuery(document).ready(function($) {
                      var owl = jQuery('.owl-carousel');
                      owl.on('initialize.owl.carousel initialized.owl.carousel ' +
                        'initialize.owl.carousel initialize.owl.carousel ' +
                        'resize.owl.carousel resized.owl.carousel ' +
                        'refresh.owl.carousel refreshed.owl.carousel ' +
                        'update.owl.carousel updated.owl.carousel ' +
                        'drag.owl.carousel dragged.owl.carousel ' +
                        'translate.owl.carousel translated.owl.carousel ' +
                        'to.owl.carousel changed.owl.carousel',
                        function(e) {
                          jQuery('.' + e.type)
                            .removeClass('secondary')
                            .addClass('success');
                          window.setTimeout(function() {
                            jQuery('.' + e.type)
                              .removeClass('success')
                              .addClass('secondary');
                          }, 500);
                        });
                      owl.owlCarousel({
                        loop:false,
                        nav: true,
                        lazyLoad: true,
                        margin: 10,
                        video: true,
                        responsive: {
                          0: {
                            items: 1
                          },
                          600: {
                            items:2
                          },
                          960: {
                            items:4,
                          },
                          1200: {
                            items: 4
                          }
                        }
                      });
                    });
                  </script>
                </div>
            </div>
    <?php  
        endif;
    ?>
    <div class="tab-content">
        <?php 
            foreach($post_text as $product_tax_slug => $product_tax_name): 
            $custom_args = array(
                    'post_type'      => 'post',
                    'category_name'  => $product_tax_name,
                    
                );
            $loop = new WP_Query( $custom_args );

            if ( $loop->have_posts() ) {

                while ( $loop->have_posts() ) : $loop->the_post();
                $image_id = get_post_meta(get_the_id(), '_listing_image_id', true );
                $src      = wp_get_attachment_image_src( get_post_thumbnail_id($idd), 'full', false, '' );
        ?>
            <div id="product<?php echo implode(explode(' ', get_the_id() )); ?>" class="tab-pane fade">
                <div class="container content-system">
                    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                        <h3 class="category-item"><?php the_title(); ?></h3>
                     
                        <?php the_content(); ?>
                       <?php comments_template(); ?>
                    </div>
                </div>
            </div>
        <?php
                endwhile;
            } else {
                echo 'No Post found';
            }
            wp_reset_postdata();
            endforeach; 
        ?>      
    </div>          
</section>
<?php 
    get_footer();
?>