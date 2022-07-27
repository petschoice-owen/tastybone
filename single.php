<?php
/**
*** The template for displaying any single post.
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
	<main class="page-default page-legal">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<section class="hero-inner box-shadow-hero" 
					style="
						<?php 
							if (get_field('hero_background_image')) { ?>
								background-image: url(<?php the_field('hero_background_image'); ?>);
							<?php }
							else { ?>
								background-image: url(<?php the_field('blog_hero_background_image', 'option'); ?>);
							<?php }
						?>
					">
					<div class="container">
						<div class="wrapper">
							<h1 class="page-title">
								<?php 
									if (get_field('hero_title')) {
										the_field('hero_title');
									}
									else {
										echo get_the_title();
									}
								?>
							</h1>
						</div>
					</div>
				</section>
				<section class="default">
					<div class="container">
						<?php the_content(); ?>
					</div>
				</section>
			<?php endwhile; ?>
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
		<?php endif; ?>	
	</main>
<?php get_footer(); ?>