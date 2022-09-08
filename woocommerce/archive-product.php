<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
	<?php include(get_template_directory() . '/top-navigation.php'); ?>
	<main class="page-shop">
        <?php 
            if (is_product_category()) {
                $archive_title = single_cat_title( '', false );
                $archive_title = preg_replace('/\s+/', '', $archive_title); ?>

                <div class="category-banners d-none">
                    <?php
                        if( have_rows('category_list', 'option') ):
                        while( have_rows('category_list', 'option') ) : the_row();
                            $category_name = get_sub_field('category_name'); 
                            $category_banner = get_sub_field('category_banner'); ?>
                            <div class="banner-detail" data-identifier="<?php echo strtolower($category_name); ?>" data-name="<?php echo $category_name; ?>" data-banner="<?php echo $category_banner; ?>"></div>
                        <?php endwhile;
                        else :
                        endif;
                    ?>
                </div>
                <section class="hero-inner hero-inner-category">
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
		<section class="product-categories box-shadow-hero" <?php if (is_product_category()) { ?> data-archive="<?php echo strtolower($archive_title); ?>"<?php } ?> >
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
                                <li><a href="/category/<?php echo $slug; ?>"><?php echo $category_name; ?></a></li>
                            <?php endwhile;
                            else :
                            endif;
                        ?>
                    </ul>
				</div>
			</div>
		</section>
		<section class="product-filter">
			<div class="container">
				<div class="wrapper">
					<div class="accordion" id="accordionCategory">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingCategory">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                                    Choose <b>Flavours</b></span>
                                </button>
								<div class="button-holder">
									<a href="#" class="btn-brand btn-apply" id="product_filter_trigger">Apply</a>
								</div>
                            </h2>
                            <div id="collapseCategory" class="accordion-collapse collapse" aria-labelledby="headingCategory" data-bs-parent="#accordionCategory">
                                <div class="accordion-body">
                                    <div class="flavours">
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link apple-pie" data-filter="apple-pie">
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
                                            <a href="#" class="flavour-link beef" data-filter="beef">
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
                                            <a href="#" class="flavour-link cheese" data-filter="cheese">
                                                <i class="fa-solid fa-check"></i>
                                                <p class="flavour-name">I am <span class="flavour-text">cheese</span> flavour</p>
                                            </a>
                                        </div>
                                        <div class="flavour-item">
                                            <a href="#" class="flavour-link chicken" data-filter="chicken">
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
                                            <a href="#" class="flavour-link lamb" data-filter="lamb">
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
                                            <a href="#" class="flavour-link peanut-butter" data-filter="peanut-butter">
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
                                            <a href="#" class="flavour-link roast-beef-red-wine" data-filter="roast-beef-red-wine">
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
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="product-attribute-flavour d-none">
						<?php dynamic_sidebar('product_filter'); ?> 
					</div>
				</div>
			</div>
		</section>
		<section class="products">
			<div class="container">
				<?php
					$args = array(
						'post_type' => 'product',
						'post_status' => 'publish',
						'posts_per_page' => -1, 
						'orderby' => 'date', 
						'order' => 'DESC',
					);
					$products = new WP_Query($args);
				?>
				<?php if ($products->have_posts()) : ?>
					<div class="product-items opacity-hide">
						<?php while ($products->have_posts()) : $products->the_post(); ?>
							<?php 
								global $product;
								$flavour = array_shift( wc_get_product_terms( $product->id, 'pa_flavour', array( 'fields' => 'id=>slug' ) ) );
							?>
							<div class="product-item" data-flavour="<?php echo $flavour; ?>">
								<div class="product-wrapper">
									<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
									<a href="<?php the_permalink(); ?>" class="thumbnail">
										<img src="<?php echo $image[0]; ?>" alt="" />
									</a>
									<h4 class="name dashed"><?php the_title(); ?></h4>
									<div class="button-holder">
										<a href="<?php the_permalink(); ?>" class="btn-brown">Shop Now</a>
									</div>
									<p style="font-size: 10px;"><?php echo $flavour; ?></p>
								</div>
							</div>
						<?php endwhile; wp_reset_postdata(); ?>
                        <div class="no-product d-none">
                            <h2 class="heading-no-result">
                                Sorry, there are no products matching your selection.
                                <br />
                                Please change your filter selection and try again.
                            </h2>
                        </div>
					</div>
				<?php else: ?>
                    <div class="no-product">
                        <h2 class="heading-no-result">
                            Sorry, there are no products matching your selection.
                            <br />
                            Please change your filter selection and try again.
                        </h2>
                    </div>
				<?php endif; wp_reset_query(); ?>
			</div>
		</section>
	</main>
<?php get_footer(); ?>










<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
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
</header>
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
}

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
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
