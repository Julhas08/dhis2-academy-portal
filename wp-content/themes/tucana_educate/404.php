<?php
/**
 * @package WordPress
 * @subpackage Jbrsoft
 * @since Jbrsoft 1.0
 */
	get_header(); 
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found container padding-top-bottom">
				<h1 class="page-title">
					<?php _e( 'Oops! That page can&rsquo;t be found.', 'jbrsoft' ); ?>
				</h1>
				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'jbrsoft' ); ?></p>
				</div>
			</section>
		</main>
	</div>
<?php 
	get_footer(); 
?>
