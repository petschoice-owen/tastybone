<?php
/**
*** Template Name: Legal Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-default page-legal">
        <section class="hero-inner box-shadow-hero" 
            style="
                <?php 
                    if (get_field('hero_background_image')) { ?>
                        background-image: url(<?php the_field('hero_background_image'); ?>);
                    <?php }
                    else { ?>
                        background-image: url(<?php the_field('blog_hero_background_image', 'option'); ?>);
                    <?php }
                ?>
            ">
            <div class="container">
                <div class="wrapper">
                    <h1 class="page-title">
                        <?php 
                            if (get_field('hero_title')) {
                                the_field('hero_title');
                            }
                            else {
                                echo get_the_title();
                            }
                        ?>
                    </h1>
                </div>
            </div>
        </section>
        <section class="default">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>