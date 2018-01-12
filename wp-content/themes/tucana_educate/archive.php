<?php
/**
 * 	Arcive Template
 *  All Previous Post Show
 */
	get_header(); 
?>
	<section id="primary" class="content-area ">
		<main id="main" class="site-main " role="main">
			<div class="container">
				<?php 
					if ( have_posts() ) : 
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					
					while ( have_posts() ) : the_post();
						get_template_part( 'content', get_post_format() );
					endwhile;

					the_posts_pagination( array(
						'prev_text'          => __( 'Previous page', 'jbrsoft' ),
						'next_text'          => __( 'Next page', 'jbrsoft' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'jbrsoft' ) . ' </span>',
					) );
					else :
						get_template_part( 'content', 'jbrsoft' );
					endif;
				?>
			</div>
		</main>
	</section>

<?php 
	get_footer(); 
?>
