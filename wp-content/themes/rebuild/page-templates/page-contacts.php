<?php
/**
 * Template name: Contacts
 */
?>

<?php get_header(); ?>

<main class="page-wrapper contacts-page">

    <section class="section_1 scroll-y">
        <div class="container">
            <div class="row block_1">
                <div class="column">
                    <div class="heading animated_title">
                        <p class="t1"><?php the_title(); ?></p>
                    </div>

                    <div class="group">
                        <svg class="svg_icon svg_phone">
                            <use xlink:href="<?php echo get_template_directory_uri();  ?>/img/svg_map.svg#svg_phone" />
                        </svg>
                        <a href="tel:<?php the_field('phone', 'contact'); ?>" class="subtitle_1">
                            <?php the_field('phone', 'contact'); ?>
                        </a>
                    </div>

                    <div class="group">
                        <svg class="svg_icon svg_email">
                            <use xlink:href="<?php echo get_template_directory_uri();  ?>/img/svg_map.svg#svg_email" />
                        </svg>
                        <a href="mailto:<?php the_field('email', 'contact'); ?>"class="subtitle_1">
                            <?php the_field('email', 'contact'); ?>
                        </a>
                    </div>

                    <div class="group">
                        <svg class="svg_icon svg_adress">
                            <use xlink:href="<?php echo get_template_directory_uri();  ?>/img/svg_map.svg#svg_adress" />
                        </svg>
                        <span class="subtitle_1">
                            <?php the_field('address', 'contact'); ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="row block_2">
                <div class="column">
                    <?php rebuild_socials_buttons(); ?>

                    <?php rebuild_donate_button(); ?>
                </div>
            </div>
        </div>

        <div class="map">
            <?php the_field('map', 'contact'); ?>
        </div>
    </section>

    <section class="section_2 scroll-y">
        <div class="container">
            <div class="column">
                <p class="heading">contact </br> us</p>
                <p class="subtitle_3">Contact us if you have any questions</p>
                <svg class="svg_icon svg_branch">
                    <use xlink:href="<?php echo get_template_directory_uri();  ?>/img/svg_map.svg#svg_branch" />
                </svg>
            </div>

            <div class="column">
                <?php echo do_shortcode( get_field('form', 'contact') ); ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
