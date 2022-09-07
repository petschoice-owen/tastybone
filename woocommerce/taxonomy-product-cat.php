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
		<section class="hero-inner" style="background-image: url(<?php the_field('shop_hero_background_image', 'option'); ?>);">
			<div class="container">
				<div class="wrapper">
					<h1 class="page-title"><?php the_field('shop_hero_title', 'option'); ?></h1>
				</div>
			</div>
		</section>
		<section class="product-categories box-shadow-hero" data-category="<?php $catname = single_term_title(); echo $catname; ?>">
			<div class="container">
				<div class="wrapper">
					<ul class="categories">
                        <li><a href="#">All</a></li>
                        <li><a href="#">Nylon</a></li>
                        <li><a href="#">Dental</a></li>
                        <li><a href="#">Gourmet</a></li>
                        <li><a href="#">Flexi</a></li>
                        <li><a href="#">Festive</a></li>
                        <li><a href="#">Halloween</a></li>
                        <li><a href="#">Offers</a></li>
                        <li><a href="#">Wild</a></li>
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
									<?php echo $flavour; ?>
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