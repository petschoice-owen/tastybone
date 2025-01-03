<?php
/**
*** Template Name: Size Guide Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-size-guide">
        <section class="banner-section">
            <div class="container">
                <div class="wrapper">
                    <div class="wrapper-logo">
                        <img src="<?php echo get_field('banner_logo'); ?>" class="banner-logo" alt="TastyBone Logo" />
                    </div>
                    <div class="wrapper-text">
                        <?php if( get_field('banner_text') ): ?>
                            <div class="banner-text"><?php echo get_field('banner_text'); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="safety">
            <div class="container">
                <?php if( get_field('safety_text_content') ): ?>
                    <div class="section-text-content"><?php echo get_field('safety_text_content'); ?></div>
                <?php endif; ?>
                <div class="images">
                    <div class="image-left">
                        <?php if( get_field('safety_image_left') ): ?>
                            <img src="<?php echo get_field('safety_image_left'); ?>" alt="Puppy" />
                        <?php endif; ?>
                    </div>
                    <div class="image-right">
                        <?php if( get_field('safety_image_right') ): ?>
                            <img src="<?php echo get_field('safety_image_right'); ?>" alt="Adult" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="chew-size">
            <div class="container">
                <?php if( get_field('chew_size_text_content') ): ?>
                    <div class="section-text-content"><?php echo get_field('chew_size_text_content'); ?></div>
                <?php endif; ?>
                <div class="size-chart">
                    <?php if( get_field('chew_size_ruler') ): ?>
                        <div class="image-ruler">
                            <img src="<?php echo get_field('chew_size_ruler'); ?>" alt="Ruler" />
                        </div>
                    <?php endif; ?>
                    <?php if( have_rows('bone_sizes') ): ?>
                        <div class="bone-sizes">
                            <?php while( have_rows('bone_sizes') ) : the_row();
                                $image = get_sub_field('image');
                                $name = get_sub_field('name');
                                $size = get_sub_field('size'); ?>
                                <div class="size-item">
                                    <div class="wrapper">
                                        <div class="wrapper-image">
                                            <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>" />
                                        </div>
                                        <div class="wrapper-text">
                                            <h4 class="name"><?php echo $name; ?></h4>
                                            <h6 class="size"><?php echo $size; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else : 
                    endif; ?>
                </div>
                <?php if( get_field('chew_size_bottom_content') ): ?>
                    <div class="section-bottom-content"><?php echo get_field('chew_size_bottom_content'); ?></div>
                <?php endif; ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>