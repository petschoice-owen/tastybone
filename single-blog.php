<?php
/**
*** The template for displaying single blog post.
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-single-blog">
        <section class="hero-inner box-shadow-hero" style="background-image: url(<?php the_field('blog_hero_background_image', 'option'); ?>);">
            <div class="container">
                <div class="wrapper">
                    <h1 class="page-title">Blog</h1>
                </div>
            </div>
        </section>
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <section class="single-blog">
                    <div class="container">
                        <a href="/blog" class="btn-brand btn-arrow-back">Back to Blog</a>
                        <h1 class="blog-title"><?php the_title(); ?></h1>
                        <?php if(get_the_author_meta('display_name') != 'dev-owen'): ?>
                            <div class="blog-meta">
                                <p>Written by <strong><?php the_author_meta('display_name'); ?></strong></p>
                            </div>
                        <?php else: ?>
                        <?php endif; ?>
                        <div class="featured-image">
                            <?php $featured_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full' ); ?>
                            <img src="<?php echo $featured_img[0]; ?>" alt="" />
                        </div>
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php else : ?>
            <article class="post error">
                <h1 class="404">Nothing has been posted like that yet</h1>
            </article>
        <?php endif; ?>
    </main>
<?php get_footer(); ?>