<?php
class MyNewWidget extends WP_Widget {

	function __construct() {
		parent::__construct( false, 'Instafeed' );
	}

	function widget( $args, $instance,$no_posts = 5, $before = '<li>', $after = '</li>', $hide_pass_post = true, $skip_posts = 0, $show_excerpts = false, $include_pages = false ) {

		global $wpdb;
		$now 		= gmdate( "Y-m-d H:i:s", time() );
		$request 	= "SELECT ID, post_title, post_excerpt FROM $wpdb->posts WHERE post_status = 'publish' ";
		
		if ( $hide_pass_post ) {
			$request .= "AND post_password ='' ";
		}
		if ( $include_pages ) {
			$request .= "AND (post_type='post' OR post_type='page') ";
		} else {
			$request .= "AND post_type='post' ";
		}

		$request .= $wpdb->prepare( "AND post_date_gmt < %s ORDER BY post_date_gmt DESC LIMIT %d, %d", $now, $skip_posts, $no_posts );
		$posts 	  = $wpdb->get_results( $request );

		$output   = '';
		
		if ( $posts ) {
			
			foreach ( $posts as $post ) {

				$post_title = $post->post_title;
				$output .= $before . '<a href="' . esc_url( get_permalink( $post->ID ) ) . '" rel="bookmark" title="Permanent Link: ' . esc_attr( $post_title ) . '">' . esc_html( $post_title ) . '</a>';
				
				if ( $show_excerpts ) {
					$post_excerpt = esc_html( $post->post_excerpt );
					$output.= '<br />' . $post_excerpt;
					 $now;
				}
				
				$output .= $after;

			}
			
		} else {
			$output .= $before . "None found" . $after;

		}

		echo'<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 footer-widget"><h2 class="widget-title">Instafeed</h2><div class="clothes-pics"><div class="img-row">';
		global $post;
		$args 		= array( 'posts_per_page' =>6, 'post_type'=> 'gallery');
		$newsposts 	= get_posts( $args );
		
		foreach( $newsposts as $post ) : setup_postdata($post);
			$image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'slider-single');

	        echo'          
	            <figure class="one col-md-4 col-lg-4 col-sm-4 col-xs-4 instafeed-images">
	                <img src="'.$image[0].'" alt="instafeed images">
	            </figure>';
	    endforeach;
	 	
	 	echo'</div> </div></div>';
	
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
		// Output admin widget options form
	}
}

function myplugin_register_widgets() {
	register_widget( 'MyNewWidget' );
}

add_action( 'widgets_init', 'myplugin_register_widgets' );

class page_functionlity extends WP_Widget {

	function __construct() {
		parent::__construct( false, 'Page Custom Type' );
	}

	function widget( $args, $instance ) {
		$address = $instance['address'];
		$title   = $instance['title'];
		$skype   = $instance['skype'];
		$email   = $instance['email'];
		echo'<div class="footer-box col-md-3 col-sm-3 col-lg-3 col-xs-12">
			<div class="footer-widget widget_wpex_recent_posts_icons clr">
			<div class="widget-title">'.$title.'</div>
			<div class="img-row is-showing">          
	                <div class="wpb_wrapper is-showing">
	                <p>
	                   <span class="footer-contact-content">
	                        <i class="fa fa-home"></i> 
		                    '.$address.'
	                    </span>
	                </p>
	                <p class="margin-optizime">
	                    <span class="footer-contact-content">
	                    	<i class="fa fa-skype"></i>
	                    	'.$skype.'
	                    </span>
	                </p>
	                <p>
	                    <span class="footer-contact-content">
	                    	<i aria-hidden="true" class="fa fa-envelope"></i>
							'.$email.'
	                    </span>
	                </p>
	            </div>
	        </div>';
		
		echo '</div></div>';
		
	}

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
	    $instance[ 'address' ] = strip_tags( $new_instance[ 'address' ] );
	    $instance[ 'title' ]   = strip_tags( $new_instance[ 'title' ] );
	    $instance[ 'skype' ]   = strip_tags( $new_instance[ 'skype' ] );
	    $instance[ 'email' ]   = strip_tags( $new_instance[ 'email' ] );
	    return $instance;

	}

	function form( $instance ) {
		    $defaults = array(
        		'address' => '-1',
        		'skype'   => '-1',
        		'email'   => '-1',
        		'title'   => '-1'
		    );

		    $title   = $instance[ 'title' ];
		    $address = $instance[ 'address' ];
		    $skype   = $instance[ 'skype' ];
		    $email   = $instance[ 'email' ];
		     
		?>	<p>
			    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
			    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
		    <p>
		        <label for="<?php echo $this->get_field_id( 'address' ); ?>">Office Address:</label>

		    	<textarea name="<?php echo $this->get_field_name( 'address' ); ?>" id="<?php echo $this->get_field_id( 'address' ); ?>" cols="30" rows="10"><?php echo esc_attr( $address ); ?></textarea>
		        
		    </p>
		    <p>
		        <label for="<?php echo $this->get_field_id( 'skype' ); ?>">Skype:</label>
		        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" value="<?php echo esc_attr( $skype ); ?>">
		    </p>
		    
		    <p>
		        <label for="<?php echo $this->get_field_id( 'email' ); ?>">Email:</label>
		        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo esc_attr( $email ); ?>">
		    </p>        
		<?php
	}
}

function jbrsoft_page_widget() {
	register_widget( 'page_functionlity' );
}

add_action( 'widgets_init', 'jbrsoft_page_widget' );


class event_latest_post extends WP_Widget {

	function __construct() {
		parent::__construct( false, 'Letest Event' );
	}

	function widget( $args, $instance ) {
		$textarea = $instance['depth'];
		$title    = $instance['title'];

		echo'
		<div class="footer-box col-md-3 col-sm-3 col-lg-3 col-xs-12">
			<div class="footer-widget widget_wpex_recent_posts_icons clr">
				<div class="widget-title">'.$title.'</div>';

			        $custom_args = array(
			            'post_type'      => 'event',
			            'posts_per_page' => $textarea,
			            'post_status'    => 'publish',
			        );

			        $custom_query = new WP_Query( $custom_args ); 

                        while ( $custom_query->have_posts() ) : $custom_query->the_post(); 
                            
                            $date= get_post_meta( get_the_ID (), 'date', true );

                            the_tags(); 
                            echo '<div class="event-widget">
                            	<div class="col-md-3 col-xs-3 col-lg-3 event-widget-left">';
                            echo  the_post_thumbnail('img-responsive thumbnil-contnet-event'); 
                            echo '
	                            </div>
	                            <div class="col-md-9 col-xs-9 col-lg-9 event-widget-right">
	                            	<h6 class="thumbnil-contnet-event">
	                            		<strong>';
                            			the_title();
                            	echo '</strong><strong class="date-event-widget">';
                            	echo $date;
                            	echo '</strong>';
                            echo '</h6></div></div>';
                           
			         
			            endwhile; 
			            wp_reset_postdata(); 
			  
			echo ' </div></div>';
	}

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
	    $instance[ 'depth' ] = strip_tags( $new_instance[ 'depth' ] );
	    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
	    return $instance;

	}

	function form( $instance ) {
		    $defaults = array(
        		'depth' => '-1',
        		'title' => '-1'
		    );
		    $depth = $instance[ 'depth' ];
		    $title = $instance[ 'title' ];
		     
		?>
		  
		    <p>
			    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
			    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
			<p>
		        <label for="<?php echo $this->get_field_id( 'depth' ); ?>">Post Count:</label>
		        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'depth' ); ?>" name="<?php echo $this->get_field_name( 'depth' ); ?>" value="<?php echo esc_attr( $depth ); ?>">
		    </p>
		             
		<?php
	}
}

function event_post_widget() {
	register_widget( 'event_latest_post' );
}

add_action( 'widgets_init', 'event_post_widget' );