<?php
/***********************************
**                                **
**      Skill Meta Box            **
**                                **
************************************/ 

function jbrsoft_testimonial_add_meta_box() {
    $screens = array( 'testimonial' );
    foreach ( $screens as $screen ) {
        add_meta_box(
            'testimonial Link',
             __( 'testimonial Link', 'jbrsoft' ),
            'jbrsoft_testimonial_meta_box_callback',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'jbrsoft_testimonial_add_meta_box' );

function jbrsoft_testimonial_meta_box_callback( $post ) {
    wp_nonce_field( 'jbrsoft_testimonial_save_meta_box_data', 'myplugin_meta_box_nonce' );
    $testimonial = get_post_meta( $post->ID, 'testimonial', true );
    echo '<label for="testimonial">';
    _e( 'Please Select Your Skill:', 'jbrsoft' );
    echo '</label>
        <div>
            <input type="text" id="testimonial" name="testimonial" value="' . esc_attr( $testimonial ) . '">
        </div>  
        ';
}

function jbrsoft_testimonial_save_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'jbrsoft_testimonial_save_meta_box_data' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    if ( ! isset( $_POST['testimonial'] ) ) {
        return;
    }
    $testimonial_data    = sanitize_text_field( $_POST['testimonial'] );

    update_post_meta( $post_id, 'testimonial', $testimonial_data );
}
add_action( 'save_post', 'jbrsoft_testimonial_save_meta_box_data' );

/***********************************
**                                **
**      Service Meta Box            **
**                                **
************************************/ 

function jbrsoft_service_add_meta_box() {
    $screens = array( 'service' );
    foreach ( $screens as $screen ) {
        add_meta_box(
            'service Icon',
             __( 'service Icon', 'jbrsoft' ),
            'jbrsoft_service_meta_box_callback',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'jbrsoft_service_add_meta_box' );

function jbrsoft_service_meta_box_callback( $post ) {
    wp_nonce_field( 'jbrsoft_service_save_meta_box_data', 'myplugin_meta_box_nonce' );
    $service = get_post_meta( $post->ID, 'service', true );
    echo '
        <div class="form-group">
            <div class="input-group">
            
                <input data-placement="bottomRight" class="form-control icp service" name="service" id="service" value="' . esc_attr( $service ) . '" type="text" />
                <span class="input-group-addon"></span>
            </div>
        </div>
   ';
}

function jbrsoft_service_save_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'jbrsoft_service_save_meta_box_data' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    if ( ! isset( $_POST['service'] ) ) {
        return;
    }
    $service_data    = sanitize_text_field( $_POST['service'] );

    update_post_meta( $post_id, 'service', $service_data );
}
add_action( 'save_post', 'jbrsoft_service_save_meta_box_data' );


/***********************************
**                                **
** Skill Meta Box                 **
**                                **
************************************/ 

function jbrsoft_skill_add_meta_box() {
    $screens = array( 'post' );
    foreach ( $screens as $screen ) {
        add_meta_box(
            'Post Options',
             __( 'Post Options', 'jbrsoft' ),
            'jbrsoft_skill_meta_box_callback',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'jbrsoft_skill_add_meta_box' );

function jbrsoft_skill_meta_box_callback( $post ) {
    wp_nonce_field( 'jbrsoft_skill_save_meta_box_data', 'myplugin_meta_box_nonce' );
    $skill = get_post_meta( $post->ID, 'skill', true );
    echo '<label for="skill">';
    _e( 'Column:', 'jbrsoft' );
    echo '</label>
        <div>
            <input type="range" min="0"  id="skill" name="skill" value="' . esc_attr( $skill ) . '" max="12" data-rangeSlider>
            <output  id="skill" name="skill" value="' . esc_attr( $skill ) . '"></output>
        </div>  
        ';

    $color = get_post_meta( $post->ID, 'color', true );
    _e( '<label for="color"><br>Please Select Your Top color:<br></label> ', 'jbrsoft' );
    echo '
        <input type="text"  id="color" name="color" value="' . esc_attr( $color ) . '" class="my-color-field" /><br>
    ';

    $color_2 = get_post_meta( $post->ID, 'color_2', true );
    _e( '<label for="color_2"><br>Please Select Your Font color:<br></label> ', 'jbrsoft' );
    echo '  
        <input type="text"  id="color_2" name="color_2" value="' . esc_attr( $color_2 ) . '" class="my-color-field-2" /><br>
        '; 
        ?>
            <script>
                (function () {
                    var selector = '[data-rangeSlider]',
                    elements = document.querySelectorAll(selector);
                    function valueOutput(element) {
                        var value = element.value,
                            output = element.parentNode.getElementsByTagName('output')[0];
                            output.innerHTML = value;
                    }
                    for (var i = elements.length - 1; i >= 0; i--) {
                        valueOutput(elements[i]);
                    }
                    Array.prototype.slice.call(document.querySelectorAll('input[type="range"]')).forEach(function (el) {
                        el.addEventListener('input', function (e) {
                            valueOutput(e.target);
                        }, false);
                    });

                    rangeSlider.create(elements, {
                        min: 1,
                        max: 100,
                        value : "' . esc_attr( $skill ) . '",
                        borderRadius : 5,
                        buffer : 0,
                        minEventInterval : 1000,

                        onInit: function () {
                        },

                        onSlideStart: function (value, percent, position) {
                            console.info('onSlideStart', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
                        },

                        onSlide: function (value, percent, position) {
                            console.log('onSlide', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
                        },

                        onSlideEnd: function (value, percent, position) {
                            console.warn('onSlideEnd', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
                        }
                    });

                })();
            </script>
        <?php
}

function jbrsoft_skill_save_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'jbrsoft_skill_save_meta_box_data' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    if ( ! isset( $_POST['skill'] ) ) {
        return;
    }
    $skill_data    = sanitize_text_field( $_POST['skill'] );
    $color_data    = sanitize_text_field( $_POST['color'] );
    $color_2_data    = sanitize_text_field( $_POST['color_2'] );

    update_post_meta( $post_id, 'skill', $skill_data );
    update_post_meta( $post_id, 'color', $color_data );
    update_post_meta( $post_id, 'color_2', $color_2_data );
}
add_action( 'save_post', 'jbrsoft_skill_save_meta_box_data' );



/***********************************
**                                **
** Author Meta Box                **
**                                **
************************************/ 

function jbrsoftauthor_add_meta_box() {
    $screens = array( 'team' );
    foreach ( $screens as $screen ) {
        add_meta_box(
            'author Add',
             __( 'author Add', 'jbrsoft' ),
            'jbrsoft_author_meta_box_callback',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'jbrsoftauthor_add_meta_box' );
function jbrsoft_author_meta_box_callback( $post ) {
    wp_nonce_field( 'jbrsoft_author_save_meta_box_data', 'myplugin_meta_box_nonce' );
    $author = get_post_meta( $post->ID, 'author', true );
    echo '<label for="author">';
    _e( 'Please Select Your author:', 'jbrsoft' );
    echo '</label> ';
    
    echo '<input type="text"  id="author" name="author" value="' . esc_attr( $author ) . '" >
    '; 
}
function jbrsoft_author_save_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'jbrsoft_author_save_meta_box_data' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
    if ( ! isset( $_POST['author'] ) ) {
        return;
    }
    $author_data    = sanitize_text_field( $_POST['author'] );
    update_post_meta( $post_id, 'author', $author_data );
}
add_action( 'save_post', 'jbrsoft_author_save_meta_box_data' );



/***********************************
**                                **
**  Price Meta Box                **
**                                **
************************************/ 

function jbrsoft_price_add_meta_box() {
    $screens = array( 'Price' );
    foreach ( $screens as $screen ) {
        add_meta_box(
            'Price Setting',
             __( 'Price Setting', 'jbrsoft' ),
            'jbrsoft_price_meta_box_callback',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'jbrsoft_price_add_meta_box' );
function jbrsoft_price_meta_box_callback( $post ) {
    wp_nonce_field( 'jbrsoft_price_save_meta_box_data', 'myplugin_meta_box_nonce' );
    $price_system = get_post_meta( $post->ID, 'price_system', true );
    echo '<label for="price_system">';
    _e( 'Please Select Your price_system:', 'jbrsoft' );
    echo '</label> ';
    echo '<input type="text"  id="price_system" name="price_system" value="' . esc_attr( $price_system ) . '" > <br>'; 

    $link = get_post_meta( $post->ID, 'link', true );
    echo '<label for="link">';
    _e( 'Please Select Your link:', 'jbrsoft' );
    echo '</label> ';
    echo '<input type="text"  id="link" name="link" value="' . esc_attr( $link ) . '" > <br>';
    
    
    
}
function jbrsoft_price_save_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'jbrsoft_price_save_meta_box_data' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
    if ( ! isset( $_POST['price_system'] ) ) {
        return;
    }
    $price_system_data    = sanitize_text_field( $_POST['price_system'] );
    $link_data    = sanitize_text_field( $_POST['link'] );
    

    update_post_meta( $post_id, 'price_system', $price_system_data );
    update_post_meta( $post_id, 'link', $link_data );
}
add_action( 'save_post', 'jbrsoft_price_save_meta_box_data' );



/***********************************
**                                **
** Product Meta Box               **
**                                **
************************************/ 

function jbrsoft_product_bg_add_meta_box() {
    $screens = array( 'portfolio' );
    foreach ( $screens as $screen ) {
        add_meta_box(
            'Jbrsoft Setting Images',
             __( 'Jbrsoft Setting Images', 'jbrsoft' ),
            'jbrsoft_product_bg_meta_box_callback',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'jbrsoft_product_bg_add_meta_box' );
function jbrsoft_product_bg_meta_box_callback( $post ) {

    wp_nonce_field( 'jbrsoft_product_bg_save_meta_box_data', 'myplugin_meta_box_nonce' );
    $author = get_post_meta( $post->ID, 'author', true );
    echo '<label for="author">';
    _e( 'Please Select Your author:', 'jbrsoft' );
    echo '</label> ';
    echo '<input type="text"  id="author" name="author" value="' . esc_attr( $author ) . '" >'; 
   
    $image1 = get_post_meta( $post->ID, 'image1', true );
    echo '<label for="image1">';
    _e( 'Please Select Your image1:', 'jbrsoft' );
    echo '</label> ';
    echo '<input type="text"  id="image1" name="image1" value="' . esc_attr( $image1 ) . '" >'; 
   
   $image2 = get_post_meta( $post->ID, 'image2', true );
    echo '<label for="image2">';
    _e( 'Please Select Your image2:', 'jbrsoft' );
    echo '</label> ';
    echo '<input type="text"  id="image2" name="image2" value="' . esc_attr( $image2 ) . '" >'; 
   
   $image3 = get_post_meta( $post->ID, 'image3', true );
    echo '<label for="image3">';
    _e( 'Please Select Your image3:', 'jbrsoft' );
    echo '</label> ';
    echo '<input type="text"  id="image3" name="image3" value="' . esc_attr( $image3 ) . '" >'; 
   
   $image4 = get_post_meta( $post->ID, 'image4', true );
    echo '<label for="image4">';
    _e( 'Please Select Your image4:', 'jbrsoft' );
    echo '</label> ';
    echo '<input type="text"  id="image4" name="image4" value="' . esc_attr( $image4 ) . '" >'; 
   
   $image5 = get_post_meta( $post->ID, 'image5', true );
    echo '<label for="image5">';
    _e( 'Please Select Your image5:', 'jbrsoft' );
    echo '</label> ';
    echo '<input type="text"  id="image5" name="image5" value="' . esc_attr( $image5 ) . '" >'; 
    
                    
}
function jbrsoft_product_bg_save_meta_box_data( $post_id ) {

    if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'jbrsoft_product_bg_save_meta_box_data' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    if ( ! isset( $_POST['image1'] ) ) {
        return;
    }

    $image1_data    = sanitize_text_field( $_POST['image1'] );
    $image2_data    = sanitize_text_field( $_POST['image2'] );
    $image3_data    = sanitize_text_field( $_POST['image3'] );
    $image4_data    = sanitize_text_field( $_POST['image4'] );
    $image5_data    = sanitize_text_field( $_POST['image5'] );

    update_post_meta( $post_id, 'image1', $image1_data );
    update_post_meta( $post_id, 'image2', $image2_data );
    update_post_meta( $post_id, 'image3', $image3_data );
    update_post_meta( $post_id, 'image4', $image4_data );
    update_post_meta( $post_id, 'image5', $image5_data );

}
add_action( 'save_post', 'jbrsoft_product_bg_save_meta_box_data' );


?>