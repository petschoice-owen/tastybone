<?php
/**
*** Template Name: Promotion Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-promotion">
        <section class="hero-inner box-shadow-hero" style="background-image: url(<?php the_field('hero_background_image'); ?>);">
            <div class="container">
                <div class="wrapper">
                    <h1 class="page-title"><?php the_field('hero_title'); ?></h1>
                </div>
            </div>
        </section>
        <section class="promotion-content">
            <div class="container">
                <?php if( have_rows('promotion_content') ):
                    while ( have_rows('promotion_content') ) : the_row();
                        if( get_row_layout() == 'promotion_text_editor' ): 
                            if( have_rows('heading_text_editor') ): ?>
                                <div class="text-editor">
                                    <?php while ( have_rows('heading_text_editor') ) : the_row(); ?>
                                        <?php if( get_row_layout() == 'content_heading' ):
                                            $heading_black = get_sub_field('heading_black');
                                            $heading_brown = get_sub_field('heading_brown'); ?>
                                            <div class="content-heading">
                                                <h1><?php echo $heading_black; ?> <b><?php echo $heading_brown; ?></b></h1>
                                            </div>

                                        <?php elseif( get_row_layout() == 'content_text_editor' ): 
                                            $text_editor = get_sub_field('text_editor'); ?>
                                            <div class="content-description">
                                                <p><?php echo $text_editor; ?></p>
                                            </div>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                            <?php else :
                            endif;

                        elseif( get_row_layout() == 'promotion_full_width_image' ): ?>
                            <div class="full-width-image">
                                <img src="<?php the_sub_field('image'); ?>" alt="" />
                            </div>
                            <?php 
                            
                        elseif( get_row_layout() == 'promotion_circle_images' ): 
                            if( have_rows('circle_image') ): ?>
                                <div class="circle-images">
                                    <?php while ( have_rows('circle_image') ) : the_row(); 
                                        $image = get_sub_field('image'); ?>
                                        <div class="circle-image">
                                            <img src="<?php echo $image; ?>" alt="" />
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php else :
                            endif;
                        
                        elseif( get_row_layout() == 'promotion_line_separator' ): ?>
                            <div class="line-separator"></div>
                        <?php endif;
                    endwhile;
                else :
                endif; ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>