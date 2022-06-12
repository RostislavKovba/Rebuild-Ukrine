<?php
/**
 * Slider-block for gutenberg
 */
?>

<div class="inner_slider">
    <div class="swiper-container swiper article-slider">
        <div class="swiper-wrapper">

            <?php acf_gallery( get_field('slides') ); ?>
            <?php acf_gallery( get_field('slides') ); ?>

        </div>
    </div>

    <div class="swiper_buttons article-slider_btns">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>
