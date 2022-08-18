<?php
/**
*** The template for displaying Blog page
**/
?>
<?php get_header(); ?>
<style>
	.ajax-load-more-wrap .alm-btn-wrap {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        padding: 0;
    	margin: 0;
	}
	.ajax-load-more-wrap .alm-load-more-btn.btn-brand {
		height: auto !important;
		display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        width: -webkit-fit-content;
        width: -moz-fit-content;
        width: fit-content;
        padding: 25px 45px !important;
        margin: 30px auto;
        font-family: "HelveticaNeue Bold" !important;
        font-size: 18px !important;
        line-height: 1.2 !important;
        color: #fff;
        text-transform: uppercase;
        background-color: #ac8f63 !important;
        border: none;
        -webkit-box-shadow: 0 0 5px 0 rgba(0,0,0,.5);
        box-shadow: 0 0 5px 0 rgba(0,0,0,.5);
        border-radius: 4px;
        -webkit-transition: all .25s ease-in-out;
        -o-transition: all .25s ease-in-out;
        transition: all .25s ease-in-out;
	}
	.ajax-load-more-wrap .alm-load-more-btn.btn-brand:hover,
    .ajax-load-more-wrap .alm-load-more-btn.btn-brand:focus {
		color: #fff;
        background-color: #90754c !important;
        outline: none !important;
        box-shadow: 0 0 5px 0 rgba(0,0,0,.5);
	}
    .ajax-load-more-wrap .alm-load-more-btn.btn-brand::before {
        opacity: 0 !important;
        -webkit-transition: all .25s ease-in-out;
        -o-transition: all .25s ease-in-out;
        transition: all .25s ease-in-out;
    }
    .ajax-load-more-wrap .alm-load-more-btn.btn-brand.done {
		display: none !important;
	}
    .ajax-load-more-wrap .alm-load-more-btn.btn-brand.loading {
		color: transparent !important;
	}
    .ajax-load-more-wrap .alm-load-more-btn.btn-brand.loading::before {
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        margin: auto;
        background: url(/wp-content/themes/tastybone/assets/images/custom-loading.gif) no-repeat center center;
        background-size: 30px;
        background-color: transparent;
        opacity: 1 !important;
	}

    @media (max-width: 991px) {
        .ajax-load-more-wrap .alm-load-more-btn.btn-brand {
            padding: 18px 30px !important;
        }
    }
</style>

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
                'posts_per_page' => 3, 
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
                    <?php endwhile; ?>
                    <?php echo do_shortcode( '[ajax_load_more seo="true" loading_style="grey" container_type="div" post_type="blog" sticky_posts="true" posts_per_page="6" images_loaded="true" offset="3" pause="true" transition_container="false"]' ); ?>
                    <?php wp_reset_postdata(); ?>
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