<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// get_header( 'shop' ); 
get_header(); 
?>

<body <?php body_class(); ?>>
    <?php include(get_template_directory() . '/top-navigation.php'); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	
	<?php 
		foreach( wp_get_post_terms( get_the_id(), 'product_cat' ) as $term ){
			if ( $term ) {
				$category = strtolower($term->name);
				$category = preg_replace('/\s+/', '', $category); 
			}
		}
	?>

	<?php
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<div id="product_breadcrumbs" class="d-none">','</div>' );
		}
	?>

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
	<section class="hero-inner hero-inner-product" data-category="<?php echo $category; ?>">
		<div class="container">
			<div class="wrapper">
				<h1 class="page-title page-title-product opacity-0"></h1>
			</div>
		</div>
	</section>
	<section class="product-categories box-shadow-hero d-none">
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
                                            <li><a href="/category/<?php echo $slug; ?>"><?php echo $category_name; ?></a></li>
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

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<?php wc_get_template_part( 'content', 'single-product' ); ?>

	<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		// do_action( 'woocommerce_sidebar' );
	?>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
