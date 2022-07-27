<?php
/**
*** The template for displaying 404 pages (not found)
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-404">
		<section class="hero-inner box-shadow-hero" style="background-image: url(<?php the_field('404_hero_background_image', 'option'); ?>);">
            <div class="container">
                <div class="wrapper">
                    <h1 class="page-title"><?php the_field('404_hero_title', 'option'); ?></h1>
                </div>
            </div>
        </section>
        <section class="404">
            <div class="container">
                <div class="content">
                    <h2><?php the_field('404_content_text', 'option'); ?></h2>
                    <div class="button-holder">
                        <a href="<?php the_field('404_content_button_link_1', 'option'); ?>" class="btn-brand btn-arrow-right"><?php the_field('404_content_button_text_1', 'option'); ?></a>
                        <a href="<?php the_field('404_content_button_link_2', 'option'); ?>" class="btn-brand btn-arrow-right"><?php the_field('404_content_button_text_2', 'option'); ?></a>
                    </div>
                </div>
            </div>
            <img src="<?php the_field('404_content_image', 'option'); ?>" class="image-dog" alt="" />
        </section>
    </main>
<?php get_footer(); ?>