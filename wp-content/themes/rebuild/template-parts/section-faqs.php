<?php
/**
 * Template part for displaying section with FAQs
 */
?>

<section class="section_7 linear_bg scroll-y">
    <div class="container">
        <div class="column">
            <p class="heading">Faq</p>
            <svg class="svg_icon svg_branch_3">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/svg_map.svg#svg_branch_3" />
            </svg>
        </div>

        <div class="column">
            <ul class="faq" id="filterData">
                <?php the_post_loop([
                    'post_type' => 'faq'
                ]); ?>
            </ul>

            <?php rebuild_load_more_button('link'); ?>
        </div>
    </div>
    <img src="<?php echo get_template_directory_uri(); ?>/img/logo_4.svg" alt="#" title="#"/>
</section>
