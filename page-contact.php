<?php
/**
*** Template Name: Contact Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-contact">
        <section class="hero-inner box-shadow-hero" style="background-image: url(<?php the_field('hero_background_image'); ?>);">
            <div class="container">
                <div class="wrapper">
                    <h1 class="page-title"><?php the_field('hero_title'); ?></h1>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container">
                <div class="wrapper">
                    <div class="image-holder">
                        <img src="<?php the_field('content_image'); ?>" alt="" />
                    </div>
                    <div class="text">
                        <?php the_field('text_editor'); ?>
                    </div>
                    <div class="text-small">
                        <?php the_field('text_editor_small'); ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-form">
            <div class="container">
                <?php echo do_shortcode(('[contact-form-7 id="'.get_field('content_cf_id').'"]')); ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>