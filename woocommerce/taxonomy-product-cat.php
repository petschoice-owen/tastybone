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
                                        <?php
                                            if( have_rows('flavour_list', 'option') ):
                                                while ( have_rows('flavour_list', 'option') ) : the_row();                                                    
                                                    if( get_row_layout() == 'flavour_color' ):
                                                        $flavour_name = get_sub_field('flavour_name','option');
                                                        $name = strtolower($flavour_name);
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
                                                                style="background-color: <?php echo $background_color; ?>;">
                                                                <i class="fa-solid fa-check"></i>
                                                                <p class="flavour-name">I am <span class="flavour-text" style="color: <?php echo $text_color; ?>;"><?php echo $flavour_name; ?></span> flavour</p>
                                                            </a>
                                                        </div>

                                                    <?php elseif( get_row_layout() == 'flavour_image' ): 
                                                        $flavour_name = get_sub_field('flavour_name','option');
                                                        $name = strtolower($flavour_name);
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
                        'post_type'         => 'product',
                        'post_status'       => 'publish',
                        'posts_per_page'    => -1,
                        'orderby'           => 'date', 
						'order'             => 'DESC',
                        'tax_query'         => array( array(
                            'taxonomy'      => 'product_cat',
                            'field'         => 'term_id',
                            'terms'         => array( get_queried_object()->term_id ),
                        ))
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