<?php 
/**
 * Template Name:Service
 * Service page
 */
    get_header(); 
?>
	
    <div id="content-wrap" class="clr">
        <div id="primary">
            <div id="content" class="clr site-content">
                <div id="main"> </div>       
                <?php do_action('service'); ?>
			</div>
        </div>
    </div>

<?php 
    get_footer();
?>