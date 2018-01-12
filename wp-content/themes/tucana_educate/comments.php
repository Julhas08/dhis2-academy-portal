<?php
/**
 *  Comments templets
 */
if ( post_password_required() )
    return;
?>
 
<div id="comments" class="comments-area">
    <?php 
        if ( have_comments() ) : 
    ?>
        <div class="row login-pattern">
            <div class="col-md-6 col-xs-6 comments-count">
                <?php
                    printf( _nx( '"', '%1$s Cooments on "%2$s"', get_comments_number(), 'comments title', 'jbrsoft' ),
                    number_format_i18n( get_comments_number() ), '' . get_the_title() . '' );
                ?> 
            </div>
            <div class="col-md-6 col-xs-6 Login-dropdown">
                <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">
                    Login <span class="caret"></span>
                </a>
                <ul class="dropdown-menu blog-dropdown-menu">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Google Plus</a></li>
                </ul>
            </div>
        </div>
        <div class="row login-patterns">
            <div class="col-md-5 col-xs-12 comments-share-on">
                <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">
                    Share On<span class="caret"></span>
                </a>
                <ul class="dropdown-menu blog-dropdown-menu">
                    <li><a href="#" target="_blank">Facebook Twitter</a></li>
                </ul> 

            </div>
            <div class="col-md-7 col-xs-12 Login-dropdown">
                <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">
                    Short By Best <span class="caret"></span>
                </a>
                <ul class="dropdown-menu blog-dropdown-menu">
                    <li><a href="#">Best</a></li>
                    <li><a href="#">Newest</a></li>
                    <li><a href="#">Oldest</a></li>
                </ul>
            </div>
        </div>
 
        <?php
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'jbrsoft' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'jbrsoft' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'jbrsoft' ) ); ?></div>
            </nav>
        <?php 
            endif; 

            if ( ! comments_open() && get_comments_number() ) :
        ?>
            <p class="no-comments"><?php _e( 'Comments are closed.' , 'jbrsoft' ); ?></p>
    <?php 
            endif;
        endif; 
        comment_form(); 
    ?>
    <ol class="comment-list">
        <?php
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 74,
            ) );
        ?>
    </ol>
</div>