<?php
/**
 * Template name: Results
 */
?>

<?php get_header(); ?>

<main class="page-wrapper results-page">
    <section class="scroll-y">
        <svg  class="scroll-y scrolling-svg" width="364" height="444" viewBox="0 0 364 444" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path  class="scrolling-path" d="M1 1C157.227 20.066 185.993 93.9374 178.575 138.559C174.275 164.421 160.5 180 153.5 173.5C135.335 156.633 274.682 95.9546 353.203 193.094C387.576 235.618 424.077 377.777 379.052 443" stroke="#9BA6EE" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <div class="container">
            <h1 class="heading animated_title">
                <p class="t1">
                    <?php the_title(); ?>
                </p>
            </h1>

            <div class="row" id="filterData">
                <?php the_post_loop([
                    'post_type' => 'result'
                ]); ?>
            </div>

            <svg class="scrolling-svg" width="1440" height="261" viewBox="0 0 1440 261" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="scrolling-path" d="M1471 1C1464.71 47.9316 1351 124.553 1147.03 100.455C954.256 77.6795 872.537 9.35257 755.195 54.9038C637.854 100.455 516.322 174.994 384.313 131.513C252.304 88.0321 279.851 50.7624 294.5 69.5C316 97 245 287 -13 257" stroke="#9BA6EE" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            <?php rebuild_load_more_button(); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>