<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>

<div class="container">

	<?php
	/**
	 * Hook: woocommerce_before_single_product.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 */
	do_action( 'woocommerce_before_single_product' );

	if ( post_password_required() ) {
		echo get_the_password_form(); // WPCS: XSS ok.
		return;
	}
	?>

	<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
		<div class="single-product-wrapper">
			<div class="heading-wrapper">
				<h1 class="single-product-title"><?php echo get_the_title(); ?></h1>
				<?php $thumbnail_sizes = get_field('product_thumbnail_sizes'); if( $thumbnail_sizes ): ?>
					<div class="heading-product-sizes <?php foreach( $thumbnail_sizes as $size ): echo $size . ' '; endforeach; ?>">
						<?php
							// if( have_rows('product_size', 'option') ): ?>
								<!-- <ul class="list-unstyled heading-thumbnail-size"> -->
									<?php // while( have_rows('product_size', 'option') ) : the_row();
										// $size_name = get_sub_field('size_name'); 
										// $size_name_simple = str_replace(" dog","",$size_name);
										// $size_text = strtolower($size_name_simple);
										// $size_thumbnail = get_sub_field('size_thumbnail'); ?>
										<!-- <li class="size-detail d-none" data-size="<?php echo $size_text; ?>"><img src="<?php echo $size_thumbnail; ?>" alt="size" /></li> -->
									<?php // endwhile; ?>
								</ul>
							<?php // else :
							// endif;
						?>
						<ul class="list-unstyled heading-thumbnail-size">
							<li class="size-detail toy"><img src="/wp-content/uploads/2022/09/size-toy.png')" alt="size" /></li>
							<li class="size-detail small"><img src="/wp-content/uploads/2022/09/size-small.png')" alt="size" /></li>
							<li class="size-detail large"><img src="/wp-content/uploads/2022/09/size-large.png')" alt="size" /></li>
							<li class="size-detail giant"><img src="/wp-content/uploads/2022/09/size-giant.png')" alt="size" /></li>
						</ul>
					</div>
				<?php endif; ?>
			</div>
			<div class="image-wrapper">
				<?php
				/**
				 * Hook: woocommerce_before_single_product_summary.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
				?>
			</div>

			<div class="description-wrapper">
				<div class="product-tabs">
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<button class="nav-link active" id="nav_product_info" data-bs-toggle="tab" data-bs-target="#product_info_tab" type="button" role="tab" aria-controls="product_info_tab" aria-selected="true">Product Info</button>
							<button class="nav-link" id="nav_safety_advice" data-bs-toggle="tab" data-bs-target="#safety_advice_tab" type="button" role="tab" aria-controls="safety_advice_tab" aria-selected="false">Safety Advice</button>
						</div>
					</nav>
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="product_info_tab" role="tabpanel" aria-labelledby="nav_product_info">
							<?php if ( get_the_content() ) { ?>
								<div class="tab-group">
									<h2 class="tab-group-heading">Product Description</h2>
									<?php echo the_content(); ?>
								</div>
							<?php } ?>
							<?php if( get_field('product_ingredients') ): ?>
								<div class="tab-group">
									<h2 class="tab-group-heading">Ingredients</h2>
									<p><?php the_field('product_ingredients'); ?></p>
								</div>
							<?php endif; ?>
						</div>
						<div class="tab-pane fade" id="safety_advice_tab" role="tabpanel" aria-labelledby="nav_safety_advice">
							<?php if( get_field('product_cleaning_instructions') ): ?>
								<div class="tab-group">
									<h2 class="tab-group-heading">Cleaning Instructions</h2>
									<p><?php the_field('product_cleaning_instructions'); ?></p>
								</div>
							<?php endif; ?>
							<?php if( get_field('product_safety_details') ): ?>
								<div class="tab-group">
									<h2 class="tab-group-heading">Safety Details</h2>
									<p><?php the_field('product_safety_details'); ?></p>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="summary entry-summary">
					<?php
					/**
					 * Hook: woocommerce_single_product_summary.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					do_action( 'woocommerce_single_product_summary' );
					?>
				</div>
			</div>

			<?php
				$available_flavours = get_field('product_available_flavours');
				if ( $available_flavours ): ?>
				<div class="related-wrapper">
					<section class="related products">
						<div class="heading-related">
							<h3 class="heading">
								<span>Available in these</span>
								<span class="colored-text">Lip-smacking flavours</span>
							</h3>
						</div>
					</section>
					<ul class="list-unstyled available-flavours d-none">
						<?php foreach( $available_flavours as $flavour ): ?>
							<li data-flavour="<?php echo $flavour; ?>"><?php echo $flavour; ?></li>
						<?php endforeach; ?>
					</ul>
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
										$data_url = "/shop?filter_flavour=" . $data_filter . "&query_type_flavour=or";
										$text_color = get_sub_field('text_color','option');
										$background_color = get_sub_field('background_color','option');
										$border = get_sub_field('border','option'); ?>
										<div class="flavour-item d-none">
											<a href="<?php echo $data_url; ?>" 
												class="flavour-link <?php echo $data_filter; ?> <?php if( get_sub_field('border', 'option') == 'bordered' ) { ?>bordered<?php } ?>" 
												data-filter="<?php echo $data_filter; ?>" 
												style="background-color: <?php echo $background_color; ?>;">
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
										<div class="flavour-item d-none">
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
			<?php endif; ?>

		</div>
	</div>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
