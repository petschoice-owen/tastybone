<?php
/**
*** Template Name: Home Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-home">
        <section class="hero-home border-bottom-10">
            <div class="container">
                <img src="<?php the_field('hero_banner_image'); ?>" class="image-dog" alt="" />
                <div class="hero-top">
                    <ul class="badges">
                        <?php
                            if( have_rows('hero_badges') ):
                            while( have_rows('hero_badges') ) : the_row();
                                $image = get_sub_field('image'); ?>
                                <li><img src="<?php echo $image; ?>" alt="" /></li>
                            <?php endwhile;
                            else :
                            endif;
                        ?>
                    </ul>
                    <div class="newsletter">
                        <div class="accordion" id="accordionNewsletter">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingNewsletter">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNewsletter" aria-expanded="false" aria-controls="collapseNewsletter">
                                        <span class="text"><?php the_field('hero_newsletter_text'); ?></span>
                                        <span class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-envelope.png" alt="" />
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
                    </div>
                </div>
                <div class="wrapper">
                    <h1 class="heading"><?php the_field('hero_heading_white'); ?> <span><?php the_field('hero_heading_colored'); ?></span></h1>
                    <p class="subheading"><?php the_field('hero_subheading'); ?></p>
                    <div class="button-holder">
                        <a href="<?php the_field('hero_button_link'); ?>" class="btn-white btn-arrow-right"><?php the_field('hero_button_text'); ?></a>
                    </div>
                </div>
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
                    <div class="accordion" id="accordionCategory">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingCategory">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
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
                            <div id="collapseCategory" class="accordion-collapse collapse" aria-labelledby="headingCategory" data-bs-parent="#accordionCategory">
                                <div class="accordion-body">
                                    <div class="flavours">
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link apple-pie">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">apple pie</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link bacon">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">bacon</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link bbq-prawn">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">bbq prawn</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link beef">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">beef</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link beef-sausage">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">beef sausage</span> flavour</p>
                                            </a>
                                        </div>

                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link beef-wellington">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">beef wellington</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link cheese">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">cheese</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link chicken">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">chicken</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link chicken-cordon-bleu">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">chicken cordon bleu</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link world-flavours chicken-tikka">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">chicken tikka</span> flavour</p>
                                            </a>
                                        </div>
                                        
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link chocolate">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">chocolate</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link world-flavours chorizo">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">chorizo</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link cinnamon-mint">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">cinnamon mint</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link duck">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">duck</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link world-flavours fish-n-chips">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">fish n chips</span> flavour</p>
                                            </a>
                                        </div>
                                        
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link hickory-smoked-steak">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">hickory smoked steak</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link world-flavours hoisin-duck">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">hoisin duck</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link lamb">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">lamb</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link lamb-chop">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">lamb chop</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link parsley">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">parsley</span> flavour</p>
                                            </a>
                                        </div>
                                        
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link peanut-butter">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">peanut butter</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link peppermint">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">peppermint</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link pheasant">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">pheasant</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link raspberry-mint">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">raspberry mint</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link roast-beef">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">roast beef</span> flavour</p>
                                            </a>
                                        </div>
                                        
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link roast-beef-red-wine">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">roast beef & red wine</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link roast-chicken">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">roast chicken</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link roast-chicken-thyme">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">roast chicken & thyme</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link smoked-salmon">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">smoked salmon</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link spearmint">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">spearmint</span> flavour</p>
                                            </a>
                                        </div>
                                        
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link stilton">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">stilton</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link strawberry">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">strawberry</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link surf-n-turf">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">surf n turf</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link tbone-steak">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">t-bone steak</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link vanilla">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">vanilla</span> flavour</p>
                                            </a>
                                        </div>
                                        
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link venison">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">venison</span> flavour</p>
                                            </a>
                                        </div>


                                    </div>
                                    <div class="button-holder">
                                        <?php
                                            if( have_rows('flavour_button') ):
                                            while( have_rows('flavour_button') ) : the_row();
                                                $button_text = get_sub_field('button_range_text'); 
                                                $button_link = get_sub_field('button_range_link'); ?>
                                                <a href="<?php echo $button_link; ?>" class="btn-brand btn-arrow-right"><?php echo $button_text; ?></a>
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
                'posts_per_page' => -1, 
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