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
<style>
	.product-items {
		display: flex;
	}

	.product-item {
		display: flex;
		width: 25%;
		padding: 15px;
	}
</style>
<body <?php body_class(); ?>>
	<?php include(get_template_directory() . '/top-navigation.php'); ?>
	<main class="page-home">
		<section class="hero-inner box-shadow-hero" style="background-image: url(<?php the_field('shop_hero_background_image', 'option'); ?>);">
			<div class="container">
				<div class="wrapper">
					<h1 class="page-title"><?php the_field('shop_hero_title', 'option'); ?></h1>
				</div>
			</div>
		</section>
		<section class="product-categories">
			<div class="container">
				<div class="wrapper">
					<!-- <div class="categories">
						<ul>
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
					</div> -->
					<?php dynamic_sidebar('product_filter'); ?> 
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
					<div class="product-items">
						<?php while ($products->have_posts()) : $products->the_post(); ?>
							<div class="product-item">
								<div class="product-wrapper">
									<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
									<a href="<?php the_permalink(); ?>" class="thumbnail">
										<img src="<?php echo $image[0]; ?>" alt="" />
									</a>
									<h4 class="name dashed"><?php the_title(); ?></h4>
									<div class="button-holder">
										<a href="<?php the_permalink(); ?>" class="btn-brown">Shop Now</a>
									</div>
								</div>
							</div>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				<?php else: ?>
					<h2>Sorry, there are no products.</h2>
				<?php endif; wp_reset_query(); ?>
			</div>
		</section>
	</main>
<?php get_footer(); ?>