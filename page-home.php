<?php
/**
*** Template Name: Home Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-home">
        <section class="hero-home-slider border-bottom-10">
            <?php if( have_rows('hero_badges') ): ?>
            <div class="container hero-top-wrapper">
                <div class="hero-top">
                    <ul class="badges">
                        <?php
                            while( have_rows('hero_badges') ) : the_row();
                                $image = get_sub_field('image'); ?>
                                <li><img src="<?php echo $image; ?>" alt="" /></li>
                            <?php endwhile; ?>
                    </ul>
                    <!-- <div class="newsletter">
                        <div class="accordion" id="accordionNewsletter">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingNewsletter">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNewsletter" aria-expanded="false" aria-controls="collapseNewsletter">
                                        <span class="text">Get Tasty Treats to your inbox!</span>
                                        <span class="image">
                                            <img src="assets/images/icon-envelope.png" alt="" />
                                        </span>
                                    </button>
                                </h2>
                                <div id="collapseNewsletter" class="accordion-collapse collapse" aria-labelledby="headingNewsletter" data-bs-parent="#accordionNewsletter">
                                    <div class="accordion-body">
                                        <form action="">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="newsletter_name" aria-describedby="emailHelp" placeholder="Full name">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="newsletter_email" aria-describedby="emailHelp" placeholder="Email">
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="input-checkbox" id="newsletter_checkbox">
                                                <label class="form-check-label" for="newsletter_checkbox">Please send me the latest special offers, updates and promotions from TastyBone.</label>
                                            </div>
                                            <div class="form-submit">
                                                <button type="submit" class="btn-brand btn-arrow-right">Subscribe</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <?php endif; ?>
            <div class="hero-slider">
                <?php
                    if( have_rows('hero_slider_home') ):
                    while( have_rows('hero_slider_home') ) : the_row();
                        $type = get_sub_field( 'hero_heading_type' );
                        $hero_bg_color = get_sub_field( 'hero_bg_color' ) ? 'style="background-color: '.get_sub_field( 'hero_bg_color' ).'"' : '';
                        $hero_is_fullwidth = get_sub_field( 'hero_is_fullwidth' );
                        $hero_slider_heading_white = get_sub_field('hero_slider_heading_white');
                        $hero_slider_heading_colored = get_sub_field('hero_slider_heading_colored');
                        $hero_slider_subheading = get_sub_field('hero_slider_subheading');
                        $hero_heading_image = get_sub_field('hero_heading_image');
                        $hero_slider_banner_image = get_sub_field('hero_slider_banner_image');
                        $hero_slider_banner_image_tablet = get_sub_field('hero_slider_banner_image_tablet');
                        $hero_slider_banner_image_mobile = get_sub_field('hero_slider_banner_image_mobile');
                        $hero_slider_button_text = get_sub_field('hero_slider_button_text');
                        $hero_slider_button_link = get_sub_field('hero_slider_button_link');
                        $is_image_only = get_sub_field( 'hero_is_image_only' );
                        ?>
                        <div class="slide-item <?php echo $type . ($hero_is_fullwidth ? ' is-fullwidth' : '') . ($is_image_only ? ' image-only' : ''); ?>" <?php echo $hero_bg_color; ?>>
                            <?php if( !$hero_is_fullwidth ) : ?>
                            <div class="container">
                            <?php endif; ?>
                                <?php if ( $hero_slider_banner_image_mobile ) : ?>
                                    <img src="<?php echo $hero_slider_banner_image_mobile; ?>" class="image-dog image-dog-adjusted image-dog--mobile" alt="" />
                                <?php endif; ?>
                                <?php if ( $hero_slider_banner_image_tablet ) : ?>
                                    <img src="<?php echo $hero_slider_banner_image_tablet; ?>" class="image-dog image-dog-adjusted image-dog--tablet" alt="" />
                                <?php endif; ?>
                                <img src="<?php echo $hero_slider_banner_image; ?>" class="image-dog image-dog-adjusted image-dog--desktop" alt="" />
                                <?php if( $hero_is_fullwidth ) : ?>
                                <div class="container">
                                <?php endif; ?>
                                    <div class="wrapper">
                                        <?php
                                        if(!$is_image_only) :
                                            if( get_sub_field('hero_heading_type') == 'image' ) { ?>
                                                <div class="heading-text">
                                                    <img src="<?php echo $hero_heading_image; ?>" alt="" />
                                                </div>
                                            <?php } 
                                            else if ( $type === 'text2' ) {
                                                echo get_sub_field( 'hero_text2_style_content' ) ? '<div class="heading-text2">'. get_sub_field( 'hero_text2_style_content' ) . '</div>' : '';
                                            }
                                            else { ?>
                                                <h1 class="heading"><?php echo $hero_slider_heading_white; ?> <span><?php echo $hero_slider_heading_colored; ?></span></h1>
                                                <div class="subheading">
                                                    <?php echo $hero_slider_subheading; ?>
                                                </div>
                                            <?php }
                                        ?>
                                        <?php if( $hero_slider_button_link ) : ?>
                                        <div class="button-holder">
                                            <a href="<?php echo $hero_slider_button_link; ?>" class="btn-white btn-arrow-right"><?php echo $hero_slider_button_text; ?></a>
                                        </div>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php if( $hero_is_fullwidth ) : ?>
                                </div>
                                <?php endif; ?>
                            <?php if( !$hero_is_fullwidth ) : ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile;
                    else :
                    endif;
                ?>
            </div>
        </section>
        <section class="tasty border-bottom-10">
            <div class="container">
                <div class="bones">
                    <div class="slider-wrapper">
                        <div class="custom-slider">
                            <?php
                                if( have_rows('flavour_slider_images') ):
                                while( have_rows('flavour_slider_images') ) : the_row();
                                    $image = get_sub_field('image'); ?>
                                    <div class="slide-item">
                                        <div class="image-holder">
                                            <img src="<?php echo $image; ?>" alt="" />
                                        </div>
                                    </div>
                                <?php endwhile;
                                else :
                                endif;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <h2 class="section-heading section-heading-column text-color-black"><?php the_field('flavour_heading_black'); ?> <span><?php the_field('flavour_heading_brown'); ?></span></h2>
                    <p class="subheading"><?php the_field('flavour_subheading'); ?></p>
                    <div class="accordion" id="accordionFlavour">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFlavour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFlavour" aria-expanded="false" aria-controls="collapseFlavour">
                                    <?php
                                        if( have_rows('flavour_button') ):
                                        while( have_rows('flavour_button') ) : the_row();
                                            $button_toggler = get_sub_field('button_toggler_text'); ?>
                                            <?php echo $button_toggler; ?>
                                        <?php endwhile;
                                        else :
                                        endif;
                                    ?>
                                </button>
                            </h2>
                            <div id="collapseFlavour" class="accordion-collapse accordion-collapse-flavour collapse" aria-labelledby="headingFlavour" data-bs-parent="#accordionFlavour">
                                <div class="accordion-body">
                                    <div class="flavours">
                                        <?php
                                            if( have_rows('flavour_list', 'option') ):
                                                while ( have_rows('flavour_list', 'option') ) : the_row();                                                    
                                                    if( get_row_layout() == 'flavour_color' ):
                                                        $flavour_name = get_sub_field('flavour_name','option');
                                                        $name = strtolower($flavour_name);
                                                        $name = preg_replace('/[^A-Za-z0-9\-]/', '-', $name);
                                                        $lower_case = preg_replace('/\s+/', ' ', $name);
                                                        $single_space = preg_replace('/\s+/', ' ', $lower_case);
                                                        $data_filter = preg_replace('#[ -]+#', '-', $single_space);
                                                        $text_color = get_sub_field('text_color','option');
                                                        $background_color = get_sub_field('background_color','option');
                                                        $border = get_sub_field('border','option'); ?>
                                                        <div class="flavour-item">
                                                            <a href="#" 
                                                                class="flavour-link <?php echo $data_filter; ?> <?php if( get_sub_field('border', 'option') == 'bordered' ) { ?>bordered<?php } ?>" 
                                                                data-filter="<?php echo $data_filter; ?>" 
                                                                style="color: <?php echo $text_color; ?>; background-color: <?php echo $background_color; ?>;">
                                                                <i class="fa-solid fa-check"></i>
                                                                <p class="flavour-name">I am <span class="flavour-text" style="color: <?php echo $text_color; ?>;"><?php echo $flavour_name; ?></span> flavour</p>
                                                            </a>
                                                        </div>

                                                    <?php elseif( get_row_layout() == 'flavour_image' ): 
                                                        $flavour_name = get_sub_field('flavour_name','option');
                                                        $name = strtolower($flavour_name);
                                                        $name = preg_replace('/[^A-Za-z0-9\-]/', '-', $name);
                                                        $lower_case = preg_replace('/\s+/', ' ', $name);
                                                        $single_space = preg_replace('/\s+/', ' ', $lower_case);
                                                        $data_filter = preg_replace('#[ -]+#', '-', $single_space);
                                                        $text_color = get_sub_field('text_color','option');
                                                        $background_image = get_sub_field('background_image','option');
                                                        $border = get_sub_field('border','option'); ?>
                                                        <div class="flavour-item">
                                                            <a href="#" 
                                                                class="flavour-link world-flavours <?php echo $data_filter; ?> <?php if( get_sub_field('border', 'option') == 'bordered' ) { ?>bordered<?php } ?>" 
                                                                data-filter="<?php echo $data_filter; ?>" 
                                                                style="background-image: url(<?php echo $background_image; ?>);">
                                                                <i class="fa-solid fa-check"></i>
                                                                <p class="flavour-name">I am <span class="flavour-text" style="color: <?php echo $text_color; ?>;"><?php echo $flavour_name; ?></span> flavour</p>
                                                            </a>
                                                        </div>

                                                    <?php endif;
                                                endwhile;
                                            else :
                                            endif;
                                        ?>
                                    </div>
                                    <div class="button-holder">
                                        <?php
                                            if( have_rows('flavour_button') ):
                                            while( have_rows('flavour_button') ) : the_row();
                                                $button_text = get_sub_field('button_range_text'); 
                                                $button_link = get_sub_field('button_range_link'); ?>
                                                <a href="<?php echo $button_link; ?>" class="btn-brand btn-arrow-right" id="product_filter_trigger_home"><?php echo $button_text; ?></a>
                                            <?php endwhile;
                                            else :
                                            endif;
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="tastybone-test border-bottom-10">
            <img src="<?php the_field('description_image'); ?>" class="bg-dog" alt="" />
            <div class="container">
                <div class="wrapper">
                    <h2 class="section-heading section-heading-column text-color-white"><?php the_field('description_heading_white'); ?> <span><?php the_field('description_heading_brown'); ?></span></h2>
                    <div class="custom-border custom-border-70 custom-border-brand"></div>
                    <h5 class="text-color-white text-uppercase"><?php the_field('description_subheading'); ?></h5>
                    <div class="items">
                        <?php
                            if( have_rows('description_category_1') ):
                            while( have_rows('description_category_1') ) : the_row();
                                $text = get_sub_field('category_text');
                                $link = get_sub_field('category_link'); ?>                                
                                <div class="item">
                                    <a href="<?php echo $link; ?>"><?php echo $text; ?></a>
                                </div>
                            <?php endwhile;
                            else :
                            endif;
                        ?>
                        <?php
                            if( have_rows('description_category_2') ):
                            while( have_rows('description_category_2') ) : the_row();
                                $text = get_sub_field('category_text');
                                $link = get_sub_field('category_link'); ?>                                
                                <div class="item">
                                    <a href="<?php echo $link; ?>"><?php echo $text; ?></a>
                                </div>
                            <?php endwhile;
                            else :
                            endif;
                        ?>
                        <?php
                            if( have_rows('description_category_3') ):
                            while( have_rows('description_category_3') ) : the_row();
                                $text = get_sub_field('category_text');
                                $link = get_sub_field('category_link'); ?>                                
                                <div class="item">
                                    <a href="<?php echo $link; ?>"><?php echo $text; ?></a>
                                </div>
                            <?php endwhile;
                            else :
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="happy">
            <div class="container">
                <div class="titles">
                    <div class="title-item">
                        <?php
                            if( have_rows('happy_column_1') ):
                            while( have_rows('happy_column_1') ) : the_row();
                                $heading = get_sub_field('heading');
                                $button_link = get_sub_field('button_link'); ?>
                                <a href="<?php echo $button_link; ?>"><?php echo $heading; ?></a>
                            <?php endwhile;
                            else :
                            endif;
                        ?>
                    </div>
                    <div class="title-item">
                        <?php
                            if( have_rows('happy_column_2') ):
                            while( have_rows('happy_column_2') ) : the_row();
                                $heading = get_sub_field('heading');
                                $button_link = get_sub_field('button_link'); ?>
                                <a href="<?php echo $button_link; ?>"><?php echo $heading; ?></a>
                            <?php endwhile;
                            else :
                            endif;
                        ?>
                    </div>
                    <div class="title-item">
                        <?php
                            if( have_rows('happy_column_3') ):
                            while( have_rows('happy_column_3') ) : the_row();
                                $heading = get_sub_field('heading');
                                $button_link = get_sub_field('button_link'); ?>
                                <a href="<?php echo $button_link; ?>"><?php echo $heading; ?></a>
                            <?php endwhile;
                            else :
                            endif;
                        ?>
                    </div>
                </div>
                <div class="image-dogs">
                    <img src="<?php the_field('happy_image'); ?>" alt="" />
                </div>
                <div class="buttons">
                    <?php
                        if( have_rows('happy_column_1') ):
                        while( have_rows('happy_column_1') ) : the_row();
                            $button_text = get_sub_field('button_text');
                            $button_link = get_sub_field('button_link'); ?>
                            <a href="<?php echo $button_link; ?>" class="btn-brand btn-arrow-right"><?php echo $button_text; ?></a>
                        <?php endwhile;
                        else :
                        endif;
                    ?>
                    <?php
                        if( have_rows('happy_column_2') ):
                        while( have_rows('happy_column_2') ) : the_row();
                            $button_text = get_sub_field('button_text');
                            $button_link = get_sub_field('button_link'); ?>
                            <a href="<?php echo $button_link; ?>" class="btn-brand btn-arrow-right"><?php echo $button_text; ?></a>
                        <?php endwhile;
                        else :
                        endif;
                    ?>
                    <?php
                        if( have_rows('happy_column_3') ):
                        while( have_rows('happy_column_3') ) : the_row();
                            $button_text = get_sub_field('button_text');
                            $button_link = get_sub_field('button_link'); ?>
                            <a href="<?php echo $button_link; ?>" class="btn-brand btn-arrow-right"><?php echo $button_text; ?></a>
                        <?php endwhile;
                        else :
                        endif;
                    ?>
                </div>
            </div>
        </section>
        <?php if ( have_posts() ) :
            $args = array(
                'post_type' => 'blog',
                'post_status' => 'publish',
                'posts_per_page' => 3, 
                'orderby' => 'date', 
                'order' => 'DESC',
            );
            $blog = new WP_Query( $args ); ?>
            <section class="blog">
                <div class="container">
                    <div class="custom-border custom-border-100 custom-border-brand"></div>
                    <h2 class="section-heading text-color-black"><?php the_field('blog_heading_black'); ?> <span><?php the_field('blog_heading_brown'); ?></span></h2>
                </div>
                <div class="blogs">
                    <?php while ( $blog->have_posts() ) : $blog->the_post(); ?> 
                        <?php $featured_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full' ); ?>
                        <div class="blog-item">
                            <div class="container">
                                <div class="image">
                                    <a href="<?php the_permalink(); ?>" class="image-link">
                                        <img src="<?php echo $featured_img[0]; ?>" alt="" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h3 class="blog-title"><?php the_title(); ?></h3>
                                    <?php if( get_field('blog_author_name') ): ?>
                                        <p class="author-section">Written by: <span class="author-name"><?php the_field('blog_author_name'); ?></span></p>
                                    <?php endif; ?>
                                    <p class="excerpt">	
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
                                    <div class="button-holder">
                                        <a href="<?php the_permalink(); ?>" class="btn-white btn-arrow-right">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </section>
        <?php else : ?>	
            <div class="page-404">
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
            </div>
        <?php endif; wp_reset_query(); ?>
    </main>
<?php get_footer(); ?>