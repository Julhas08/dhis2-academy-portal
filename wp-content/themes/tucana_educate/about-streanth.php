<?php
/**
 * Template Name:Strategic
 */
    get_header();
?>  
<div class="service-header"  data-stellar-background-ratio="0.5">
    <h2 class="page-title"><?php the_title(); ?></h2>
</div>   
<main id="main" class="site-main container clr">
    <div id="content-wrap" class="clr">
        <div id="primary" class="content-area clr">
            <div id="content" class="clr site-content">
                <article class="clr">
                    <div class="entry-content entry clr">
                        <?php 
                          
                            get_template_part('view/strategic','jbrsoft');
                        ?>
                        
                    </div>
                     
                </article>
            </div>
        </div>
    </div>
</main>
<?php 
    get_footer();
?>