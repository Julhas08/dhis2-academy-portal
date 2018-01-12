<?php
/**
 *  Template name:Welcome Template
 */
    get_header();
 ?>            
      

<section class="main-content">

<div class="box">


<div class="boxBody">
    <div id="posts " class="selected parent">
            <div class="container">
                <div class="large-12 columns">
                    <div class="owl-carousel owl-theme">
                        <?php 
                            
                            $custom_args = array(
                                    'post_type'      => 'post',
                                    'category_name'    => 'Home',
                                    'posts_per_page'    => '10',
                                );
                            $loop = new WP_Query( $custom_args );
                                while ( $loop->have_posts() ) : $loop->the_post();
                                $image_id = get_post_meta(get_the_id(), '_listing_image_id', true );
                                $src      = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()), 'full', false, '' );
                        ?>
                                
                                    <div class="item">
                                        <style>
                                            .column-post<?php echo get_the_id() ?> {
                                                background: url(<?php echo $src[0]; ?>);
                                            }
                                        </style>
                                        <div class="column-post column-post<?php echo get_the_id() ?>" data-toggle="tab" href="#column-post<?php echo get_the_id() ?>"> 
                                            <div class="post-bottom-content">
                                                <h3 class="post-title"><?php the_title(); ?></h3>
                                            </div>
                                        </div>
                                    </div> 
                        <?php 
                               endwhile;
                        ?>   
                    </div>
                  
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
                            items: 3
                          },
                          600: {
                            items:2
                          },
                          960: {
                            items:3,
                          },
                          1200: {
                            items: 3
                          }
                        }
                      });
                    });
                  </script>
                </div>
            </div>
<div class="block-item">
    <div class="post col-md-9 col-xs-12 col-lg-9">
        <div class="tab-content">
                <?php 
                   
                    $custom_args = array(
                            'post_type'      => 'post',
                            'category_name'  =>'home',
                            
                        );
                    $loop = new WP_Query( $custom_args );

                    if ( $loop->have_posts() ) {

                        while ( $loop->have_posts() ) : $loop->the_post();
                        $image_id = get_post_meta(get_the_id(), '_listing_image_id', true );
                        $src      = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full', false, '' );
                ?>

                    <div id="column-post<?php echo get_the_id() ?>" class="tab-pane fade">
                        <h3 class="title-header container">
                            <span class="line-title"><?php the_title(); ?> </span>
                            <span class="line"></span>
                        </h3>
                        <div class=" content-with-tab">
                            <div class="">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a data-toggle="tab" href="#Details">Course Details</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#Advioser">Course Advisor</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#Syllabus">Syllabus</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#Exam">Exam & Certification</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="Details" class="tab-pane fade in active">
                                        <?php the_content(); ?>
                                    </div>
                                    <div id="Advioser" class="tab-pane fade">
                                        <div class="advioser">
                                            <div class="col-md-3 col-xs-12 col-lg-3">
                                                <img class="img-responsive img-circle" src="http://edutech.tucanashop.com/wp-content/uploads/2017/02/Julhas.jpg">
                                            </div>
                                            <div class="col-md-9 col-xs-12 col-lg-9 ">
                                                <div class="span-overall">
                                                    <span class="author-name" >Julhas Sujan </span>
                                                    <span class="author-title" > Zend Certified </span>
                                                    <span class="author-email" >Email: julhaspustcse@gmail.com </span>
                                                </div>
                                           </div>
                                       </div>
                                    </div>
                                        <div id="Syllabus" class="tab-pane fade">
                                          

                                        </div>
                                        <div id="Exam" class="tab-pane fade">
                                            Test Message
                                        </div>

                                    </div>
                               
                                    <!--<pre class="brush: php; title: ; notranslate" title="">
                                        
                                    </pre> -->
                                <hr>
                             
                            </div>
                            
                        </div>

                    </div>
                <?php
                        endwhile;
                    } else {
                        echo 'No Post found';
                    }

                    wp_reset_postdata();
                 
                ?>  
                 
            </div> 
           
                 <?php 
                                
                $custom_args = array(
                        'post_type'      => 'post',
                        'category_name'    => 'blog',
                        'posts_per_page'    => '3',
                    );
                $loop = new WP_Query( $custom_args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                    $image_id = get_post_meta(get_the_id(), '_listing_image_id', true );
                    $src      = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()), 'full', false, '' );
            ?>
                    <div class="row-blog">
                        <h2 class="title-image"> <?php the_title(); ?></h2>
                        <p class="title-image"> <?php the_content(); ?></p>
                    </div>
            <?php 
                endwhile;
            ?>
            </div>
            <div class="col-md-3 col-xs-12 col-lg-3">
                    <?php dynamic_sidebar('blog-sidebar'); ?>
            </div>   
            </div>
</div>
    <?php 
        $args = array(
            'post_type' => 'post',
        );
        $idd          = get_the_ID();
        $product      = new WP_Query($args);
        $product_taxs = [];

        if(is_array($product->posts) && !empty($product->posts)) {
            
            foreach($product->posts as $gallery_post) {
                $post_taxs = wp_get_post_terms($gallery_post->ID, 'category', array("fields" => "all"));
                
                if(is_array($post_taxs) && !empty($post_taxs)) {

                    foreach($post_taxs as $post_tax) {
                        $product_taxs[$post_tax->slug] = $post_tax->name;
                    }
                }
            }
        }
        if(is_array($product_taxs) && !empty($product_taxs) && get_post_meta($idd, 'pyre_product_filters', true) != 'no'):
        the_tags(); 
    
        foreach($product_taxs as $product_tax_slug => $product_tax_name):
    ?>  
       
            <?php 
                                
                $custom_args = array(
                        'post_type'      => 'post',
                        'category_name'    => $product_tax_name,
                        'posts_per_page'    => '3',
                    );
                $loop = new WP_Query( $custom_args );
                
                

                    while ( $loop->have_posts() ) : $loop->the_post();
                    $image_id = get_post_meta(get_the_id(), '_listing_image_id', true );
                    $src      = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()), 'full', false, '' );
            ?>
            <div class="container parent" id="">
                <h3 class="title-header container page-title">
                    <span class="line-title"><?php echo  $product_tax_name; ?> </span>
                    <span class="line"></span>
                </h3>
                <?php the_content(); ?>
            </div>
    <?php 
        endwhile;
         endforeach; 
        endif;
    ?>   
    
  </div>  
  
</div>
  

</div>
            
</section>
<?php 
    get_footer();
?>