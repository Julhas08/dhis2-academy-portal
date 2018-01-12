<?php
/**
 * Template Name:Welcome Template
 */
    get_header();
?>     
<main id="main" class="site-main container clr homepage-area">
    <div id="content-wrap" class="clr">
        <div id="primary" class="content-area clr">
            <div id="content" class="clr site-content">
                <article class="clr">
                    <div class="entry-content entry clr">
                        <?php 
                            do_action('slider'); 
                            get_template_part('view/strategic','jbrsoft');
                        ?>
                        
                    </div>
                        <?php 
                            
                            while( have_posts() ) : the_post(); 
                                the_content(); 
                                wp_link_pages(); 
                            endwhile; 
                        ?>  
                </article>
            </div>
        </div>
    </div>
</main>
<?php 
    get_footer();
?>