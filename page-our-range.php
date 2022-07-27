<?php
/**
*** Template Name: Our Range Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-our-range">
        <section class="hero-inner box-shadow-hero" style="background-image: url(<?php the_field('hero_background_image'); ?>);">
            <div class="container">
                <div class="wrapper">
                    <h1 class="page-title"><?php the_field('hero_title'); ?></h1>
                </div>
            </div>
        </section>
        <section class="range">
            <div class="container">
                <div class="ranges">
                    <?php if( have_rows('ranges') ):
                        while( have_rows('ranges') ) : the_row();
                            $logo = get_sub_field('logo');
                            $product_image = get_sub_field('product_image');
                            $heading = get_sub_field('heading');
                            $text_content = get_sub_field('text_content');
                            $button_text = get_sub_field('button_text');
                            $button_link = get_sub_field('button_link'); ?>

                            <div class="range-item">
                                <div class="image">
                                    <div class="image-logo">
                                        <img src="<?php echo $logo; ?>" alt="" />
                                    </div>
                                    <div class="image-product">
                                        <a href="<?php echo $button_link; ?>" class="image-product-link">
                                            <img src="<?php echo $product_image; ?>" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="text">
                                    <div class="text-heading">
                                        <h2>"<?php echo $heading; ?>"</h2>
                                    </div>
                                    <div class="text-body">
                                        <p><?php echo $text_content; ?></p>
                                    </div>
                                    <div class="text-button">
                                        <a href="<?php echo $button_link; ?>" class="btn-brand btn-arrow-right"><?php echo $button_text; ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                    else :
                    endif; ?>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>