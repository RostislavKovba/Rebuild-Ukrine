<?php
/**
 * Template part for displaying "request" item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>

<div class="request_item">
    <div class="top">
        <div class="column">
            <div class="img_wrap">
                <?php rebuild_post_thumbnail(); ?>
            </div>

            <div class="rating">
                <p>Funds raised:</p>
                <div class="line"><span></span></div>
                <p class="group">
                    <span><?php the_field('cur_amount'); ?>$</span>
                    <span><?php the_field('amount'); ?>$</span>
                </p>
            </div>

            <div class="btn-extra">
                <span>Read more</span>
                <svg class="svg_icon svg_arrow">
                    <use xlink:href="<?php echo get_template_directory_uri();  ?>/img/svg_map.svg#svg_arrow" />
                </svg>
            </div>
        </div>

        <div class="column">
            <div class="wrap">
                <p class="group">
                    <span>From <?php the_field('city'); ?></span>
                    <span><?php rebuild_posted_on(); ?></span>
                </p>
                <p class="subtitle_2"><?php the_field('name'); ?></p>
                <p><?php the_field('about'); ?></p>
            </div>

            <?php rebuild_support_button(); ?>

            <div class="btn-extra">
                <span>Read more</span>
                <svg class="svg_icon svg_arrow">
                    <use xlink:href="<?php echo get_template_directory_uri();  ?>/img/svg_map.svg#svg_arrow" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bottom">
        <div class="cover">
            <p>We created this project to provide urgent help and support in face of an extreme and unforeseen situation in Ukraine. We created this project to provide urgent help and support in face of an extreme and unforeseen situation in Ukraine. We created this project to provide urgent help and support in face of an extreme and unforeseen situation in Ukraine.</p>
            <p>Support in face of an extreme and unforeseen situation in Ukraine. We created this project to provide urgent help and support in face.We created this project to provide urgent help and support in face.</p>
            <div class="btn-extra">
                <span>Hide</span>
                <svg class="svg_icon svg_arrow">
                    <use xlink:href="<?php echo get_template_directory_uri();  ?>/img/svg_map.svg#svg_arrow" />
                </svg>
            </div>
        </div>
    </div>
</div>