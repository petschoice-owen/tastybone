<?php
/**
*** Template Name: About Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-about">
        <section class="hero-inner" style="background-image: url(<?php the_field('hero_background_image'); ?>);">
            <div class="container">
                <div class="wrapper">
                    <h1 class="page-title"><?php the_field('hero_title'); ?></h1>
                </div>
            </div>
        </section>
        <section class="page-navigation">
            <ul>
                <?php
                    if( have_rows('about_tab_navigation') ):
                    while( have_rows('about_tab_navigation') ) : the_row();
                        $text = get_sub_field('navigation_text');
                        $link = get_sub_field('navigation_link');
                        $highlight = get_sub_field('navigation_highlight'); ?>
                        <li><a href="<?php echo $link; ?>" class="<?php echo $highlight; ?>"><?php echo $text; ?></a></li>
                    <?php endwhile;
                    else :
                    endif;
                ?>
            </ul>
        </section>
        <section class="about-content">
            <div class="container">
                <?php if( have_rows('about_content') ):
                    while ( have_rows('about_content') ) : the_row();

                        if( get_row_layout() == 'about_text_editor' ): 
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
                                            $text_editor_field = get_sub_field('text_editor_field'); ?>
                                            <div class="content-description">
                                                <p><?php echo $text_editor_field; ?></p>
                                            </div>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                            <?php else :
                            endif;
                            
                        elseif( get_row_layout() == 'about_image_text' ): 
                            if( have_rows('image_text') ):
                                while ( have_rows('image_text') ) : the_row();
                                    if( get_row_layout() == 'right_image_text' ):
                                        if( have_rows('right_image_text_group') ):
                                            while( have_rows('right_image_text_group') ) : the_row(); 
                                                $image = get_sub_field('image'); ?>

                                                <div class="image-text image-right">
                                                    <?php if( have_rows('content') ):
                                                        while( have_rows('content') ) : the_row();
                                                            $text = get_sub_field('text'); ?>
                                                            
                                                            <div class="text">
                                                                <?php
                                                                    if( have_rows('heading') ):
                                                                    while( have_rows('heading') ) : the_row();
                                                                        $heading_black = get_sub_field('heading_black');
                                                                        $heading_brown = get_sub_field('heading_brown'); ?>
                                                                        <div class="content-heading">
                                                                            <h1><?php echo $heading_black; ?> <b><?php echo $heading_brown; ?></b></h1>
                                                                        </div>
                                                                    <?php endwhile;
                                                                    else :
                                                                    endif;
                                                                ?>                                                                
                                                                <div class="content-description">
                                                                    <p><?php echo $text; ?></p>
                                                                </div>
                                                            </div>
                                                        <?php endwhile;
                                                    else :
                                                    endif; ?>                                                    
                                                    <div class="image">
                                                        <img src="<?php echo $image; ?>" alt="" />
                                                    </div>
                                                </div>
                                            <?php endwhile;
                                        else :
                                        endif;
                                        
                                    elseif( get_row_layout() == 'left_image_text' ): 
                                        if( have_rows('left_image_text_group') ):
                                            while( have_rows('left_image_text_group') ) : the_row(); 
                                                $image = get_sub_field('image'); ?>

                                                <div class="image-text image-left">
                                                    <?php if( have_rows('content') ):
                                                        while( have_rows('content') ) : the_row();
                                                            $text = get_sub_field('text'); ?>
                                                            
                                                            <div class="text">
                                                                <?php
                                                                    if( have_rows('heading') ):
                                                                    while( have_rows('heading') ) : the_row();
                                                                        $heading_black = get_sub_field('heading_black');
                                                                        $heading_brown = get_sub_field('heading_brown'); ?>
                                                                        <div class="content-heading">
                                                                            <h1><?php echo $heading_black; ?> <b><?php echo $heading_brown; ?></b></h1>
                                                                        </div>
                                                                    <?php endwhile;
                                                                    else :
                                                                    endif;
                                                                ?>                                                                
                                                                <div class="content-description">
                                                                    <p><?php echo $text; ?></p>
                                                                </div>
                                                            </div>
                                                        <?php endwhile;
                                                    else :
                                                    endif; ?>                                                    
                                                    <div class="image">
                                                        <img src="<?php echo $image; ?>" alt="" />
                                                    </div>
                                                </div>
                                            <?php endwhile;
                                        else :
                                        endif;
                            
                                    endif;
                                endwhile;
                            else :
                            endif;

                        elseif( get_row_layout() == 'about_testimonials' ): 
                            if( have_rows('testimonials') ): ?>
                                <div class="testimonials">
                                    <?php while( have_rows('testimonials') ) : the_row(); ?>
                                        <div class="testimonial-item">
                                            <div class="wrapper">
                                                <?php if( have_rows('content') ):
                                                    while( have_rows('content') ) : the_row();
                                                        $title = get_sub_field('title'); ?>
                                                        <h3 class="testimonial-heading"><?php echo $title; ?></h3>
                                                    <?php endwhile;
                                                    else :
                                                endif; ?>
                                                <div class="testimonial-image">
                                                    <img src="<?php the_sub_field('image'); ?>" class="image" alt="" />
                                                </div>
                                                <?php if( have_rows('content') ):
                                                    while( have_rows('content') ) : the_row();
                                                        $description = get_sub_field('description'); ?>
                                                        <div class="testimonial-description">
                                                            <p class="description"><?php echo $description; ?></p>
                                                        </div>
                                                    <?php endwhile;
                                                    else :
                                                endif; ?>
                                            </div>
                                        </div>
                                        
                                    <?php endwhile; ?>
                                </div>
                            <?php else :
                            endif;
                        
                        elseif( get_row_layout() == 'about_faqs' ): 
                            if( have_rows('faqs') ): ?>
                                <?php $counter = 1; ?>
                                <div class="faqs accordion" id="accordion_custom">
                                    <?php while( have_rows('faqs') ) : the_row(); ?>
                                        <div class="accordion-item faqs-item">
                                            <h2 class="accordion-header" id="accordion_heading_<?php echo $counter; ?>">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion_collapse_<?php echo $counter; ?>" aria-expanded="false" aria-controls="accordion_collapse_<?php echo $counter; ?>"><?php the_sub_field('title'); ?></button>
                                            </h2>
                                            <div id="accordion_collapse_<?php echo $counter; ?>" class="accordion-collapse collapse" aria-labelledby="accordion_heading_<?php echo $counter; ?>" data-bs-parent="#accordion_custom">
                                                <div class="accordion-body">
                                                    <p><?php the_sub_field('content'); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $counter++; ?>                                     
                                    <?php endwhile; ?>
                                </div>
                            <?php else :
                            endif;

                        endif;
                    endwhile;
                else :
                endif; ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>