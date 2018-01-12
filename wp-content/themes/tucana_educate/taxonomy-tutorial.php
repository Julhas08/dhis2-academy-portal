<?php 
/**
 * single page
 */
    get_header();
?>

<div class="content-main" >
    <div class="content-div contact-div">
        <div class="wrap content-contact">
            <div class="page-system bg-white padding-top-bottom" id="home">
                <?php 
                    while( have_posts() ) : the_post(); 
                        the_content(); 
                        wp_link_pages(); 
                    endwhile; 
                ?>           
            </div>      
        </div>
    </div>
</div> 

<?php
    get_footer();
?>