<?php
/**
*** Template Name: Recycling Info Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-recycling-info">
        <section class="hero-inner box-shadow-hero" style="background-image: url(<?php the_field('hero_background_image'); ?>);">
            <div class="container">
                <div class="wrapper">
                    <h1 class="page-title"><?php the_field('hero_title'); ?></h1>
                </div>
            </div>
        </section>
        <section class="recycling-intro">
            <div class="container">
                <div class="text-editor">
                    <?php if( get_field('section_heading_intro') ): ?>
                        <div class="content-heading">
                            <?php the_field('section_heading_intro'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if( get_field('section_content_intro') ): ?>
                        <div class="content-description">
                            <?php the_field('section_content_intro'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if( get_field('section_image_intro') ): ?>
                    <div class="large-width-image">
                        <img src="<?php the_field('section_image_intro'); ?>" alt="full width image" />
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <section class="recycling-plastic">
            <div class="container">
                <?php if( get_field('section_heading_plastic') ): ?>
                    <div class="content-heading">
                        <?php the_field('section_heading_plastic'); ?>
                    </div>
                <?php endif; ?>
                <?php if( have_rows('information_plastic_group') ): ?>
                    <div class="items">
                        <?php while( have_rows('information_plastic_group') ) : the_row(); ?>
                            <?php $image = get_sub_field('image'); ?>
                            <?php $heading = get_sub_field('heading'); ?>
                            <?php $description = get_sub_field('description'); ?>
                            <div class="item">
                                <div class="image">
                                    <img src="<?php echo $image; ?>" alt="icon" />
                                </div>
                                <div class="heading">
                                    <h4><?php echo $heading; ?></h4>
                                </div>
                                <div class="description">
                                    <?php echo $description; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else : ?>
                <?php endif; ?>
            </div>
        </section>
        <section class="recycling-cardboard">
            <div class="container">
                <?php if( get_field('section_heading_cardboard') ): ?>
                    <div class="content-heading">
                        <?php the_field('section_heading_cardboard'); ?>
                    </div>
                <?php endif; ?>
                <?php if( have_rows('information_cardboard_group') ): ?>
                    <div class="items">
                        <?php while( have_rows('information_cardboard_group') ) : the_row(); ?>
                            <?php $image = get_sub_field('image'); ?>
                            <?php $heading = get_sub_field('heading'); ?>
                            <?php $description = get_sub_field('description'); ?>
                            <div class="item">
                                <div class="image">
                                    <img src="<?php echo $image; ?>" alt="icon" />
                                </div>
                                <div class="heading">
                                    <h4><?php echo $heading; ?></h4>
                                </div>
                                <div class="description">
                                    <?php echo $description; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else : ?>
                <?php endif; ?>
            </div>
        </section>
        <?php if( have_rows('cta_items') ): ?>
            <section class="cta">
                <div class="no-container">
                    <div class="items items-4">
                        <?php while( have_rows('cta_items') ) : the_row(); ?>
                            <?php $background_image = get_sub_field('background_image'); ?>
                            <?php $heading = get_sub_field('heading'); ?>
                            <?php $button_url = get_sub_field('button_url'); ?>
                            <?php $button_text = get_sub_field('button_text'); ?>
                            <div class="item" style="background-image: url(<?php echo $background_image; ?>);">
                                <h3 class="heading"><?php echo $heading; ?></h3>
                                <a href="<?php echo $button_url; ?>" class="btn-brand"><?php echo $button_text; ?></a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        <?php else : ?>
        <?php endif; ?>        
    </main>
<?php get_footer(); ?>