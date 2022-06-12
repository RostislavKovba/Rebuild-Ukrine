<?php
/**
 * Template name: Home
 */
?>

<?php get_header(); ?>

<main class="page-wrapper front-page">
    <section class="section_1 scroll-y">
        <div class="container">
            <div class="column">
                <h1 class="heading animated_title">
                    <p class="t1">Let's rebuild </p>
                    <div>
                        <svg class="svg_icon svg_trident">
                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/svg_map.svg#svg_trident" />
                        </svg>
                        <p class="t2">Ukraine </p>
                    </div>
                    <p class="t3">together</p>
                </h1>
            </div>

            <div class="column">
                <div class="group">
                    <svg class="svg_icon svg_branch">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/svg_map.svg#svg_branch" />
                    </svg>

                    <div class="img_wrap">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/image_3.png" alt="#" title="#">
                    </div>

                    <svg class="svg_icon svg_flower">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/svg_map.svg#svg_flower" />
                    </svg>
                </div>
            </div>
            <svg class="scrolling-svg" width="1402" height="1081" viewBox="0 0 1402 1081" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1389.12 1C1383.12 4.02578 1382.04 33.8294 1386.62 56.6744C1390.62 76.6445 1396.58 113.559 1400.12 146.843C1411.18 250.929 1326.53 326.291 1366.65 386.87C1406.77 447.45 1421.65 342.042 1317.06 400.198C1212.48 458.354 942.903 478.951 840.122 362.639C830.789 352.092 808.722 330.2 795.122 327C778.122 323 764.122 327.361 748.122 345C732.122 362.639 680.122 405 580.122 421C480.122 437 445.122 426 396.122 421C334.122 414.673 277.122 434 255.122 478C233.122 522 233.122 575 266.122 619C270.456 625.333 286.122 638.2 314.122 639C349.122 640 377.122 639 363.122 649C349.122 659 316.122 667 272.122 649C228.122 631 135.122 590 68.1221 655C1.12212 720 -2.61486 831.998 2.6582 890C7.65837 945 42.6583 1012 91.6583 1039C140.658 1066 214.658 1093 301.122 1074C366.415 1059.65 402.122 1018 463.122 1017C511.922 1016.2 560.122 1038 578.122 1049" stroke="url(#paint0_linear_581_3287)" stroke-linecap="round" stroke-linejoin="round"/>
                <defs>
                    <linearGradient id="paint0_linear_581_3287" x1="1384.12" y1="0.999933" x2="1252.82" y2="363.489" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#2A46F3"/>
                        <stop offset="1" stop-color="#9BA6EE"/>
                    </linearGradient>
                </defs>
            </svg>
        </div>

        <?php rebuild_support_button(); ?>
    </section>

    <section class="section_2 half-circle-list scroll-y">
        <div class="container">
            <div class="column">
                <div class="half-circle half-circle-1 blue"></div>
                <h3 class="subtitle_2">About us</h3>
                <p>
                    We created this project to provide urgent help and support in face of an extreme and unforeseen situation in Ukraine.
                </p>
            </div>
            <div class="column">
                <div class="half-circle half-circle-2 red"></div>
                <h3 class="subtitle_2">Our goal</h3>
                <p>
                    We created this project to provide urgent help and support in face of an extreme and unforesan extreme and unforesan extreme and unforeseen situation in Ukraine.
                </p>
            </div>
            <div class="column">
                <div class="half-circle half-circle-3 yellow"></div>
                <h3 class="subtitle_2">Our objective</h3>
                <p>
                    We created this project to provide urgent help and support in face of an extreme and unforeseen situation in Ukraine.
                </p>
            </div>
        </div>
    </section>

    <section class="section_3 decoration_bg scroll-y">
        <div class="container">
            <svg class="svg_icon svg_hand">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/svg_map.svg#svg_hand" />
            </svg>

            <?php echo do_shortcode( get_field('form', 'contact') ); ?>

            <svg class="svg_icon svg_branch_2">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/svg_map.svg#svg_branch_2" />
            </svg>
        </div>
    </section>

    <section class="section_4 tickerLine scroll-y">
        <div class="ticker">
            <p class="heading">are you a volunteer?</p>
        </div>
        <div class="ticker">
            <p class="heading">Let's support together</p>
        </div>
    </section>

    <section class="section_5 linear_bg scroll-y col_section">
        <div class="container">
            <div class="column">
                <h3 class="subtitle_2">What to do</h3>
                <p>We created this project to provide urgent help and support in face of an extreme and unforeseen situation in Ukraine. We created this project to provide urgent help and support in face of an extreme and unforeseen situation in Ukraine.</p>
                <p>Support in face of an extreme and unforeseen situation in Ukraine. We created this project to provide urgent help and support in face.</p>
            </div>

            <div class="column">
                <p class="title">If you want to join our team, contact us. Let's rebuild the country together!</p>

                <a href="/contacts/" class="btn btn-secondary">
                    <svg class="svg_icon btn_svg_2">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/svg_map.svg#btn_svg_2" />
                    </svg>
                    <span>get in touch</span>
                    <svg class="svg_icon btn_svg_2">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/svg_map.svg#btn_svg_3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/section', 'results'); ?>

    <?php get_template_part('template-parts/section', 'faqs'); ?>
</main>

<?php get_footer(); ?>