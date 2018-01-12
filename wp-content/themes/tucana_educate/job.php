<?php 
/**
*  Template Name:Job Seekers
*/
    get_header();
?>   
<main class="site-main clr" id="main">
    <div id="content-wrap">
        <div class="content-area clr" id="primary">
            <div class="clr site-content container-fulid" id="content">
                <article class="clr">
                    <?php get_template_part('view/job', 'jbrsoft');?>
                </article>    
            </div>
        </div>
    </div>
</main>
<?php 
    get_footer();
?>
