<?php  
/**
 *  Tutorail Single page
 */
    get_header();
 ?>  
       
       <div class="container parent" id="">

            <h3 class="title-header row  page-title">
                <?php the_title(); ?>
                
            </h3>
                <?php 
                    the_content(); 
                    while( have_posts() ) : the_post(); 
                    the_content();   
                   
                   endwhile;   
                ?>   
            
        </div>
       
       
<?php 
    get_footer();
?>