<?php
/**
*** The template for displaying Blog page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-blog">
        <section class="hero-inner box-shadow-hero" style="background-image: url(<?php the_field('blog_hero_background_image', 'option'); ?>);">
            <div class="container">
                <div class="wrapper">
                    <h1 class="page-title"><?php the_field('blog_hero_title', 'option'); ?></h1>
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