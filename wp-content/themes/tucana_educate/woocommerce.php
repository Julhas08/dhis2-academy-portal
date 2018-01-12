<?php  
/**
 *  Woocommerce Page
 */
    get_header();
 ?>  
    <main id="main">
        <div id="content-wrap" class="clr">
            <div id="primary" class="content-area clr">
                <div id="content" class="site-content clr">
                    <?php 
                        while ( have_posts() ) : the_post(); 
                    ?>
                            <article class="entry clr">
                                <div class="single-products">
                                    <p>
                                        <?php the_excerpt(); ?>
                                    </p>
                                </div>
                                <div class="single-products">
                                    <div class="mc-button-system">
                                        <div class="live-demo">
                                            <div class="col-md-6 col-xs-12 col-lg-6">
                                                <a class="btn btn-primary live-project-btn">LIVE DEMO</a> 
                                            </div>
                                            <div class="col-md-6 col-xs-12 col-lg-6 pull-right">
                                                <div class="pull-right">
                                                    <?php 
                                                        do_action( 'woocommerce_after_cart_table' );
                                                        do_action( 'woocommerce_ajax_added_to_cart' );
                                                        do_action( 'woocommerce_' . $product->product_type . '_add_to_cart' );
                                                    ?>
            									</div>  
                                       	 	</div>
                                    	</div>
            						</div>
                                </div>
                                <?php the_content();?> 
                            </article>

                    <?php  
                        endwhile; 
                    ?>
                </div>
            </div>
        </div>
    </main>
<?php 
    get_footer();
?>