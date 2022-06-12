<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package rebuild
 */

/**
 * Prints the current post-date/time.
 */
function rebuild_posted_on() {
    echo esc_attr( get_the_date() );
}

/**
 * Displays an optional post thumbnail.
 */
function rebuild_post_thumbnail() {
    ?>
    <img src="<?php the_post_thumbnail_url(); ?>"
         alt="<?php the_title(); ?>"
         title="<?php the_title(); ?>">

    <?php
}

/**
 * Displays "support" button
 *
 * @param string $link
 */
function rebuild_support_button( $link='' ) {
    $link = !empty($link) ? $link : get_field('support_link', 'contact');
    ?>

    <a href="<?php echo $link; ?>" target="_blank" class="btn btn-secondary">
        <div class="magnetic-area"></div>
        <svg class="svg_icon btn_svg_2">
            <use xlink:href="<?php echo get_template_directory_uri();  ?>/img/svg_map.svg#btn_svg_2" />
        </svg>
        <span>Support</span>
        <svg class="svg_icon btn_svg_2">
            <use xlink:href="<?php echo get_template_directory_uri();  ?>/img/svg_map.svg#btn_svg_3" />
        </svg>
    </a>

    <?php
}

/**
 * Displays "donate" button
 */
function rebuild_donate_button() {
    ?>

    <a href="<?php the_field('support_link', 'contact'); ?>" class="btn btn-primary">
        <svg class="svg_icon btn_svg_1">
            <use xlink:href="<?php echo get_template_directory_uri();  ?>/img/svg_map.svg#btn_svg_1" />
        </svg>
        <span>Donate</span>
    </a>

    <?php
}

/**
 * Displays socials buttons
 */
function rebuild_socials_buttons() {
    ?>

    <div class="social">
        <a href="<?php the_field('facebook', 'contact'); ?>">
            <svg class="svg_icon svg_social">
                <use xlink:href="<?php echo get_template_directory_uri();  ?>/img/svg_map.svg#svg_fb" />
            </svg>
        </a>
        <a href="<?php the_field('twitter', 'contact'); ?>">
            <svg class="svg_icon svg_social">
                <use xlink:href="<?php echo get_template_directory_uri();  ?>/img/svg_map.svg#svg_twitter" />
            </svg>
        </a>
    </div>

    <?php
}

/**
 * Template part for displaying load-more btn
 *
 * @param string $type - button or link
 */
function rebuild_load_more_button( string $type = 'button' ) {
    global $wp_query;

    if ( $wp_query->max_num_pages > 1 ) : ?>
        <script>
            var ajaxurl     = '<?php echo site_url(); ?>/wp-admin/admin-ajax.php';
            var query_posts = '<?php echo serialize($wp_query->query_vars); ?>';
            var paged       = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages   = '<?php echo $wp_query->max_num_pages; ?>';
        </script>

        <?php if ($type == 'button') : ?>

            <div class="btn btn-primary" id="loadMoreBtn" >
                <span>See more</span>
            </div>

        <?php elseif ($type == 'link') : ?>

            <div class="btn-extra" id="loadMoreBtn">
                <span>Read more</span>
                <svg class="svg_icon svg_arrow">
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/svg_map.svg#svg_arrow" />
                </svg>
            </div>

        <?php endif;?>
    <?php endif;
}