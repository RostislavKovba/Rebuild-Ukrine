<?php
/**
 * Template part for displaying section with other results loop
 */
?>

<?php if ( get_field('active_results') ) : ?>

<section class="section_3 slider_1 scroll-y">
    <div class="container">
        <div class="heading_wrap">
            <p class="heading">
                <?php if ( !is_front_page() ) echo 'Other '; ?>results
            </p>

            <div class="swiper_buttons slider-blog_btns">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>

    <div class="swiper-container swiper slider-blog">
        <div class="swiper-wrapper">
            <?php the_post_loop([
                'post_type'     => 'result',
                'post__not_in'  => [ get_the_ID() ]
            ],true); ?>
        </div>
    </div>

    <svg class="scroll-y scrolling-svg scrolling-svg-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 228" fill="none">
        <path class="scrolling-path" d="M0 201.424C53.7409 216.583 234.257 257.569 409.5 184.002C520.572 137.373 549.723 48.9732 534.5 29.5016C519.851 10.764 492.304 48.0337 624.313 91.5144C756.322 134.995 877.854 60.4567 995.195 14.9055C1112.54 -30.6458 1303.23 51.7245 1496 74.5001C1659.43 93.8084 1850.5 70.6199 1920 12.5446" stroke="#9BA6EE" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>

    <a href="/results/" class="btn btn-primary">
        <span>All results</span>
    </a>
</section>

<?php endif; ?>