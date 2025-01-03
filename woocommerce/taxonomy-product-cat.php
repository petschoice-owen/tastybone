<?php	
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

defined( 'ABSPATH' ) || exit;

// get_header( 'shop' );
get_header(); 
?>

<body <?php body_class(); ?>>
    <?php include(get_template_directory() . '/top-navigation.php'); ?>

    <?php
    /**
     * Hook: woocommerce_before_main_content.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * @hooked woocommerce_breadcrumb - 20
     * @hooked WC_Structured_Data::generate_website_data() - 30
     */
    do_action( 'woocommerce_before_main_content' );

    ?>
    <!-- <header class="woocommerce-products-header">
        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
        <?php endif; ?>

        <?php
        /**
         * Hook: woocommerce_archive_description.
         *
         * @hooked woocommerce_taxonomy_archive_description - 10
         * @hooked woocommerce_product_archive_description - 10
         */
        do_action( 'woocommerce_archive_description' );
        ?>
    </header> -->
    <?php 
        if (is_product_category()) {
            $archive_title = single_cat_title( '', false );
            // $archive_title = preg_replace('/\s+/', '', $archive_title);
            $archive_title = str_replace(' ', '-', $archive_title); ?>

            <div class="category-banners d-none">
                <?php
                    if( have_rows('category_list', 'option') ):
                    while( have_rows('category_list', 'option') ) : the_row();
                        $category_name = get_sub_field('category_name'); 
                        $category_name_formatted = str_replace(' ', '-', $category_name);
                        $category_banner = get_sub_field('category_banner'); ?>
                        <div class="banner-detail" data-identifier="<?php echo strtolower($category_name_formatted); ?>" data-name="<?php echo $category_name; ?>" data-banner="<?php echo $category_banner; ?>"></div>
                    <?php endwhile;
                    else :
                    endif;
                ?>
            </div>
            <section class="hero-inner hero-inner-category" >
                <div class="container">
                    <div class="wrapper">
                        <h1 class="page-title page-title-category opacity-0"></h1>
                    </div>
                </div>
            </section>
        <?php }
        else { ?>
            <section class="hero-inner" style="background-image: url(<?php the_field('shop_hero_background_image', 'option'); ?>);">
                <div class="container">
                    <div class="wrapper">
                        <h1 class="page-title"><?php the_field('shop_hero_title', 'option'); ?></h1>
                    </div>
                </div>
            </section>
        <?php }
    ?>
    
    <section class="product-categories box-shadow-hero d-none" <?php if (is_product_category()) { ?> data-archive="<?php echo strtolower($archive_title); ?>"<?php } ?> >
        <div class="container">
            <div class="wrapper">
                <ul class="categories">
                    <li><a href="/shop">All</a></li>
                    <?php
                        if( have_rows('category_list', 'option') ):
                        while( have_rows('category_list', 'option') ) : the_row();
                            $category_name = get_sub_field('category_name');
                            $name = strtolower($category_name);
                            $lower_case = preg_replace('/\s+/', ' ', $name);
                            $single_space = preg_replace('/\s+/', ' ', $lower_case);
                            $slug = preg_replace('#[ -]+#', '-', $single_space); ?>
                            <li><a href="/shop/<?php echo $slug; ?>"><?php echo $category_name; ?></a></li>
                        <?php endwhile;
                        else :
                        endif;
                    ?>
                </ul>
            </div>
            <div class="wrapper-responsive">
                <div class="accordion accordion-responsive" id="accordionCategory">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingCategory">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">Select <b>Category</b></button>
                        </h2>
                        <div id="collapseCategory" class="accordion-collapse accordion-collapse-category collapse" aria-labelledby="headingCategory" data-bs-parent="#accordionCategory">
                            <div class="accordion-body">
                                <ul class="categories">
                                    <li><a href="/shop">All</a></li>
                                    <?php
                                        if( have_rows('category_list', 'option') ):
                                        while( have_rows('category_list', 'option') ) : the_row();
                                            $category_name = get_sub_field('category_name');
                                            $name = strtolower($category_name);
                                            $lower_case = preg_replace('/\s+/', ' ', $name);
                                            $single_space = preg_replace('/\s+/', ' ', $lower_case);
                                            $slug = preg_replace('#[ -]+#', '-', $single_space); ?>
                                            <li><a href="/shop/<?php echo $slug; ?>"><?php echo $category_name; ?></a></li>
                                        <?php endwhile;
                                        else :
                                        endif;
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-filter d-none">
        <div class="container">
            <div class="wrapper">
                <div class="accordion" id="accordionFlavour">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFlavour">
                            <span class="hide-mobile">Choose</span>
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFlavour" aria-expanded="false" aria-controls="collapseFlavour">
                                <b>Flavours</b>
                            </button>
                        </h2>
                        <h2 class="accordion-header" id="headingSize">
                            <span class="d-none show-mobile">Choose</span>
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSize" aria-expanded="false" aria-controls="collapseSize">
                                <b>Size</b>
                            </button>
                        </h2>
                        <div class="button-holder">
                            <a href="#" class="btn-brand btn-apply" id="product_filter_trigger">Apply</a>
                        </div>
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
                            </div>
                        </div>
                        <div id="collapseSize" class="accordion-collapse accordion-collapse-size collapse" aria-labelledby="headingSize" data-bs-parent="#accordionFlavour">
                            <div class="accordion-body">
                                <div class="sizes">
                                    <?php if( have_rows('product_size' , 'option') ):
                                        while( have_rows('product_size' , 'option') ) : the_row();
                                            $size_name = get_sub_field('size_name' , 'option');
                                            $size_name_formatted = strtolower($size_name);
                                            $size_image = get_sub_field('size_thumbnail' , 'option'); ?>
                                            <div class="size-item">
                                                <a href="#" class="size-link bordered" data-size="<?php echo $size_name_formatted; ?>">
                                                    <i class="fa-solid fa-check"></i>
                                                    <img src="<?php echo $size_image; ?>" alt="icon-<?php echo $size_name_formatted; ?>" />
                                                    <span class="size-name"><?php echo $size_name; ?></span>
                                                </a>
                                            </div>
                                        <?php endwhile;
                                    else :
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="product-attribute-flavour d-none">
                    <?php // dynamic_sidebar('product_filter'); ?> 
                </div> -->
            </div>
        </div>
    </section>
    <?php
    // Get the current term object
    $term = get_queried_object();

    if ( $term && is_a( $term, 'WP_Term' ) ) {
        if ( !empty( $term->description ) ) { ?>
            <section class="product-category-intro">
                <div class="container">
                    <div class="wrapper">
                        <h1 class="product-category-title"><?php echo esc_html( $term->name ); ?></h1>
                        <div class="product-category-description"><?php echo wp_kses_post( wpautop( $term->description ) ); ?></div>
                    </div>
                </div>
            </section>
        <?php }
    }
    ?>
    <section class="products opacity-0">
        <div class="container">
            <?php
            if ( woocommerce_product_loop() ) {

                /**
                 * Hook: woocommerce_before_shop_loop.
                 *
                 * @hooked woocommerce_output_all_notices - 10
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                do_action( 'woocommerce_before_shop_loop' );

                woocommerce_product_loop_start();

                if ( wc_get_loop_prop( 'total' ) ) {
                    while ( have_posts() ) {
                        the_post();

                        /**
                         * Hook: woocommerce_shop_loop.
                         */
                        do_action( 'woocommerce_shop_loop' );

                        wc_get_template_part( 'content', 'product' );
                    }
                }

                woocommerce_product_loop_end();

                /**
                 * Hook: woocommerce_after_shop_loop.
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action( 'woocommerce_after_shop_loop' );
            } else {
                /**
                 * Hook: woocommerce_no_products_found.
                 *
                 * @hooked wc_no_products_found - 10
                 */
                do_action( 'woocommerce_no_products_found' );
            } ?>
        </div>
    </section>

    <?php
    /**
     * Hook: woocommerce_after_main_content.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );

get_footer(); ?>