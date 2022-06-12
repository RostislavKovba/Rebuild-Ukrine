<?php
/**
 * Callback functions
 */

/**
 * Loop of posts
 *
 * @param array $args - args for WP_Query
 * @param bool $slider - add wrapper for swiper slider
 */
function the_post_loop( array $args = [], bool $slider = false ) {

    $args['post_type'] = $args['post_type'] ? : 'post';

    query_posts($args);

    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            get_template_part( 'template-parts/loop-item', get_post_type(), ['slider' => $slider] );
        }

    } else {
        get_template_part( 'template-parts/content', 'none' );
    }

    wp_reset_postdata();
}


/**
 * ACF Gallery
 *
 * @param $images
 * @param $lightbox
 * @return void
 */
function acf_gallery( $images ) {
    $size = 'large'; // (thumbnail, medium, large or custom size)

    if( $images ) {
        foreach ($images as $image) {
            printf(
                '<div class="swiper-slide">
                    <img src="%s" alt="%s">
                </div>',
                $image['sizes'][$size],
                $image['alt']
            );
        }
    }
}

/**
 * @param $string
 * @return string
 */
function extract_number( $string ) {
    $number = preg_replace("/[^0-9]/", '', $string);
    return $number;
}

/**
 * @param $string
 * @return string
 */
function extract_text( $string ) {
    $text = preg_replace("/\d/", '', $string);
    return $text;
}
