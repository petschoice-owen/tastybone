<?php
/*-----------------------------------------------------------------------------------*/
/* This file will be referenced every time a template/page loads on your Wordpress site
/* This is the place to define custom fxns and specialty code
/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
// define( 'NAKED_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/*  Set the maximum allowed width for any content in the theme
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 900;


/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );


/*-----------------------------------------------------------------------------------*/
/* Add post thumbnail/featured image support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );


/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'header_menu'	=>	__( 'Header Menu', 'blank' ), // Register the Header menu
		'footer_menu'	=>	__( 'Footer Menu', 'blank' ), // Register the Footer menu
	)
);


/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function theme_register_sidebars() {
	register_sidebar(array(								// Start a series of sidebars to register
		'id' => 'product_filter', 						// Make an ID
		'name' => 'Product Filter',						// Name it
		'description' => 'Take it on the side...', 		// Dumb description for the admin side
		'before_widget' => '<div>',						// What to display before each widget
		'after_widget' => '</div>',						// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',						// What to display following each widget's title
		'empty_title'=> '',								// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar, 
		// just change the values of id and name to another word/name
	));
} 
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'theme_register_sidebars' );


/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/
function theme_scripts() { 
	// enqueue css files
	wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/styles/vendors/slick.min.css');
	wp_enqueue_style('slick-theme', get_stylesheet_directory_uri() . '/styles/vendors/slick-theme.min.css');
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');
	wp_enqueue_style('main', get_stylesheet_directory_uri() . '/styles/main.min.css');
	wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/style.css');

	// enqueue js files
	wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/scripts/vendors/jquery.min.js');
	wp_enqueue_script('popper', get_stylesheet_directory_uri() . '/scripts/vendors/popper.min.js');
	wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/scripts/vendors/bootstrap.min.js');
	wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/scripts/vendors/slick.min.js');
	wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/scripts/script.js');
	wp_localize_script( 'custom-script', 'wc_atc_params', array(
		'wc_ajax_url' => admin_url( 'admin-ajax.php' ),
		'wc_add_to_cart_nonce' => wp_create_nonce( 'add_to_cart_nonce' ),
	));
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header


/*-----------------------------------------------------------------------------------*/
/* PHP code for SVG support In WordPress
/*-----------------------------------------------------------------------------------*/
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
	$filetype = wp_check_filetype( $filename, $mimes );
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
  
}, 10, 4 );
  
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );
  
function fix_svg() {
	echo '<style type="text/css">
		.attachment-266x266, .thumbnail img {
			width: 100% !important;
			height: auto !important;
		}
	</style>';
}
add_action( 'admin_head', 'fix_svg' );


/*-----------------------------------------------------------------------------------*/
/* Add Theme Settings Advanced Custom Fields
/*-----------------------------------------------------------------------------------*/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header',
		'menu_title'	=> 'Header Section',
		'parent_slug'	=> 'general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer',
		'menu_title'	=> 'Footer Section',
		'parent_slug'	=> 'general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Social Media',
		'menu_title'	=> 'Social Media',
		'parent_slug'	=> 'general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Shop Settings',
		'menu_title'	=> 'Shop Settings',
		'parent_slug'	=> 'general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Blog Page',
		'menu_title'	=> 'Blog Page',
		'parent_slug'	=> 'general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> '404 Page',
		'menu_title'	=> '404 Page',
		'parent_slug'	=> 'general-settings',
	));
}


/*-----------------------------------------------------------------------------------*/
/* Advanced Custom Fields Modifications - Resize WYSIWYG Editor
/*-----------------------------------------------------------------------------------*/
function PREFIX_apply_acf_modifications() { ?>
	<style>
		.acf-editor-wrap iframe {
			min-height: 0;
		}
	</style>
	<script>
		(function($) {
			// (filter called before the tinyMCE instance is created)
			acf.add_filter('wysiwyg_tinymce_settings', function(mceInit, id, $field) {
				// enable autoresizing of the WYSIWYG editor
				mceInit.wp_autoresize_on = true;
				return mceInit;
			});
			// (action called when a WYSIWYG tinymce element has been initialized)
			acf.add_action('wysiwyg_tinymce_init', function(ed, id, mceInit, $field) {
				// reduce tinymce's min-height settings
				ed.settings.autoresize_min_height = 100;
				// reduce iframe's 'height' style to match tinymce settings
				$('.acf-editor-wrap iframe').css('height', '100px');
			});
		})(jQuery)
	</script>
<?php }
add_action('acf/input/admin_footer', 'PREFIX_apply_acf_modifications');


/*-----------------------------------------------------------------------------------*/
/* Redirect user to "/" or "Front Page" upon successful login
/*-----------------------------------------------------------------------------------*/
// function my_login_redirect( $redirect_to, $request, $user ) {
// 	return home_url('/');
// }
// add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );


/*-----------------------------------------------------------------------------------*/
/* Register Custom Post Type Blogs
/*-----------------------------------------------------------------------------------*/
function create_blog_cpt() {
	$labels = array(
		'name' => _x( 'Blog', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Blog', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Blog', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Blog', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Blog Archives', 'textdomain' ),
		'attributes' => __( 'Blog Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Blog:', 'textdomain' ),
		'all_items' => __( 'All Blogs', 'textdomain' ),
		'add_new_item' => __( 'Add New Blog', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Blog', 'textdomain' ),
		'edit_item' => __( 'Edit Blog', 'textdomain' ),
		'update_item' => __( 'Update Blog', 'textdomain' ),
		'view_item' => __( 'View Blog', 'textdomain' ),
		'view_items' => __( 'View Blogs', 'textdomain' ),
		'search_items' => __( 'Search Blogs', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Blog', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Blog', 'textdomain' ),
		'items_list' => __( 'Blog list', 'textdomain' ),
		'items_list_navigation' => __( 'Blog list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Blog list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Blog', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-format-aside',
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'author', 'revisions', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'blog', $args );
}
add_action( 'init', 'create_blog_cpt', 0 );


/*-----------------------------------------------------------------------------------*/
/* WooCoomerce - Cart Menu Item
/*-----------------------------------------------------------------------------------*/
function woo_cart_but() {
	ob_start();
	$cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
	$cart_url = wc_get_cart_url();  // Set Cart URL ?>

	<a class="menu-item cart-contents cart" href="<?php echo $cart_url; ?>" title="My Basket">
		<?php if ( $cart_count > 0 ) { ?>
			<span class="cart-contents-count"><?php echo $cart_count; ?></span>
		<?php } ?>
	</a>
	<?php  
    return ob_get_clean();
}
add_shortcode ('woo_cart_but','woo_cart_but');

// Add AJAX Shortcode when cart contents update
add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
function woo_cart_but_count( $fragments ) {
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url(); ?>

    <a class="cart-contents menu-item cart" href="<?php echo $cart_url; ?>" title="Cart">
		<?php if ( $cart_count > 0 ) { ?>
			<span class="cart-contents-count"><?php echo $cart_count; ?></span>
		<?php } ?>
	</a>
    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}


/*-----------------------------------------------------------------------------------*/
/* WooCoomerce Shop Page
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'woocommerce' );

// shop page - make filter section display faster
add_filter('woocommerce_attribute_lookup_regeneration_step_size', function() {
    return 100;
});


/*-----------------------------------------------------------------------------------*/
/* WooCommerce - Remove "Choose an option" in dropdown menus
/*-----------------------------------------------------------------------------------*/
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'filter_dropdown_option_html', 12, 2 );
function filter_dropdown_option_html( $html, $args ) {
	$show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' );
	$show_option_none_html = '<option value="">' . esc_html( $show_option_none_text ) . '</option>';
	$html = str_replace($show_option_none_html, '', $html);
	return $html;
}

// add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'wc_remove_options_text');
// function wc_remove_options_text( $args ){
//     $args['show_option_none'] = '';
//     return $args;
// }

/*-----------------------------------------------------------------------------------*/
/* WooCommerce - Remove elements on WooCommerce
/*-----------------------------------------------------------------------------------*/
function remove_woocommerce_elements() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 ); 				// Remove WooCommerce breadcrumbs
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 ); 					// Remove Result Count - before shop loop
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );						// Remove Result Count - after shop loop
	// remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ); 	// Remove Price Range of products in the loop
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );		// Remove Product Meta - Single Product Page
	// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );		// Remove Price - Single Product Page
}
add_action( 'after_setup_theme', 'remove_woocommerce_elements' );

function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] );					// Remove the description tab
    unset( $tabs['reviews'] ); 						// Remove the reviews tab
    // unset( $tabs['additional_information'] );	// Remove the additional information tab
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

// function remove_gallery_thumbnail_images() {
// 	if ( is_product() ) {
// 		remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );	// Remove product thumbnails - Single Product Page
// 	}
// }
// add_action('loop_start', 'remove_gallery_thumbnail_images');

// function remove_short_description() {
// 	remove_meta_box( 'postexcerpt', 'product', 'normal');	// Remove product short description - Single Product Page CMS
// }
// add_action('add_meta_boxes', 'remove_short_description', 999);

// add_action('template_redirect', 'remove_shop_breadcrumbs' );
// function remove_shop_breadcrumbs(){
 
//     if (is_shop())
//         remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
 
// }


/*-----------------------------------------------------------------------------------*/
/* Shop Page and Category Pages - Display variations dropdowns for variable products
/*-----------------------------------------------------------------------------------*/
add_filter( 'woocommerce_loop_add_to_cart_link', 'woo_display_variation_dropdown_on_shop_page' );

function woo_display_variation_dropdown_on_shop_page() {
	global $product;
	if( $product->is_type( 'variable' )) {
		$attribute_keys = array_keys( $product->get_attributes() ); ?>
		<form class="variations_form cart js-shop-atc-variable" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->id ); ?>" data-product_variations="<?php echo htmlspecialchars( json_encode( $product->get_available_variations() ) ) ?>">
			<?php do_action( 'woocommerce_before_variations_form' ); ?>
			<?php if ( empty( $product->get_available_variations() ) && false !== $product->get_available_variations() ) : ?>
				<p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
			<?php else : ?>
				<table class="variations" cellspacing="0">
					<tbody>
						<?php foreach ( $product->get_variation_attributes() as $attribute_name => $options ) : ?>
							<tr>
								<!-- <td class="label"><label for="<?php echo sanitize_title( $attribute_name ); ?>"><?php echo wc_attribute_label( $attribute_name ); ?></label></td> -->
								<td class="value">
									<?php
										$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( urldecode( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ) : $product->get_variation_default_attribute( $attribute_name );
										wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected ) );
										//    echo end( $attribute_keys ) === $attribute_name ? apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . __( 'Clear', 'woocommerce' ) . '</a>' ) : '';
									?>
								</td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
				<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
				<div class="single_variation_wrap">
					<?php
						/**
							* woocommerce_before_single_variation Hook.
							*/
						do_action( 'woocommerce_before_single_variation' );

						/**
							* woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
							* @since 2.4.0
							* @hooked woocommerce_single_variation - 10 Empty div for variation data.
							* @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
							*/
						do_action( 'woocommerce_single_variation' );

						/**
							* woocommerce_after_single_variation Hook.
							*/
						do_action( 'woocommerce_after_single_variation' );
					?>
				</div>
				<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
			<?php endif; ?>
			<?php do_action( 'woocommerce_after_variations_form' ); ?>
		</form>
	<?php } 
  	else {
	   $html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart js-shop-atc" method="post" enctype="multipart/form-data"><div class="variations varation-items quantity"><div class="variation-item options"><div class="value option-selection variation-quantity">';
	   $html .= '<div class="product-quantity"><input type="hidden" value="1" class="prod_id"><div class="input-group" id="qty_selector"><a class="qty-btn decrement-btn"></a><input type="text" class="qty-input" value="1"/><a class="qty-btn increment-btn"></a></div></div>';
	   $html .= '<div class="d-none woocommerce-quantity">' . woocommerce_quantity_input( array(), $product, false ) . '</div>';
	   $html .= '<input type="hidden" name="product_id" value="'. absint( $product->id ) .'">';
	   $html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
	   $html .= '</div></div></div></form>';
	   return $html;
   	}
}

wp_enqueue_script('wc-add-to-cart-variation');

function tb_ajax_add_to_cart() {
    // Check for nonce security
    if ( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'add_to_cart_nonce' ) )
        die();

    // Get the product ID and quantity from the POST request
    $product_id = absint( $_POST['product_id'] );
    $quantity = isset( $_POST['quantity'] ) ? absint( $_POST['quantity'] ) : 1;
	$variation_id = intval($_POST['variation_id']);

    // Add to cart
    $added = WC()->cart->add_to_cart( $product_id, $quantity, $variation_id );

    // Respond back with success or failure
    if ( $added ) {
        $fragments = apply_filters( 'woocommerce_add_to_cart_fragments', array() );
		// Get cart hash
		$cart_hash = WC()->cart->get_cart_hash();
  
		// Return success response with fragments and cart hash
		wp_send_json_success(array(
			'fragments' => $fragments,
			'cart_hash' => $cart_hash,
		));
    } else {
        wp_send_json_error( array( 'message' => 'Error adding to cart' ) );
    }

    die();
}
add_action( 'wp_ajax_tb_ajax_add_to_cart', 'tb_ajax_add_to_cart' );
add_action( 'wp_ajax_nopriv_tb_ajax_add_to_cart', 'tb_ajax_add_to_cart' );

/*-----------------------------------------------------------------------------------*/
/* Shop Page, Category Pages, and Product Page - prevent product variation from displaying if not enabled
/*-----------------------------------------------------------------------------------*/
// add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'remove_disabled_variations_dropdown', 10, 1 );
// function remove_disabled_variations_dropdown( $args ) {
//     $args['options'] = array_filter( $args['options'], function( $option ) {
//         return $option['variation_is_visible'];
//     } );
//     return $args;
// }



/*-----------------------------------------------------------------------------------*/
/* Hide shipping rates when free shipping is available.
/* Updated to support WooCommerce 2.6 Shipping Zones.
/*-----------------------------------------------------------------------------------*/
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );


/*-----------------------------------------------------------------------------------*/
/* Force Product-Category url to start with "/shop/%product_cat%"
/*-----------------------------------------------------------------------------------*/
add_filter( 'rewrite_rules_array', function( $rules ) {
    $new_rules = array(
        'shop/([^/]*?)/page/([0-9]{1,})/?$' => 'index.php?product_cat=$matches[1]&paged=$matches[2]',
        'shop/([^/]*?)/?$' => 'index.php?product_cat=$matches[1]',
    );
    return $new_rules + $rules;
});


/*-----------------------------------------------------------------------------------*/
/* Remove Yoast SEO Canonical Meta Tag
/*-----------------------------------------------------------------------------------*/
add_filter( 'wpseo_canonical', 'remove_multiple_yoast_meta_tags' );

function remove_multiple_yoast_meta_tags( $removeCanonical ) {
    if ( is_page () || is_single() || is_singular() || is_product() || is_product_category() || is_category() || is_tax() ) {
        return false;
    }
	
    return $removeCanonical;
}


/*----------------------------------------------------------------------------------------*/
/* WooCommerce Cart Page - set minimum order amount to £10 and maximum order amount to £250
/*----------------------------------------------------------------------------------------*/
add_action( 'woocommerce_checkout_process', 'wc_min_max_order_amount' );
add_action( 'woocommerce_before_cart' , 'wc_min_max_order_amount' );

function wc_min_max_order_amount() {
    $minimum = 10; // set this variable to specify a minimum order value
    $maximum = 250; // set this variable to specify a maximum order value
    $cart_total = WC()->cart->total; // cart total including shipping
    $shipping_total = WC()->cart->get_shipping_total();  // cost of shipping
	$shipping_taxes = WC()->cart->get_shipping_taxes();
	$total_shipping_taxes = array_sum($shipping_taxes);
	$total_shipping = $shipping_total + $total_shipping_taxes;
    $cart_subtotal = WC()->cart->subtotal;  // cart total excluding shipping

   if ( ($cart_total - $total_shipping) < $minimum ) {
        if( is_cart() ) {
            wc_print_notice( 
                sprintf( 'Your current order total is %s — you must have an order with a minimum of %s to place your order' , 
                    wc_price( $cart_total - $total_shipping ), 
                    wc_price( $minimum )
                ), 'error' 
            );
            // JavaScript to hide the element with class "wc-proceed-to-checkout"
            ?>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function() {
                    var proceedToCheckout = document.querySelector('.wc-proceed-to-checkout');
                    if (proceedToCheckout) {
                        proceedToCheckout.style.display = 'none';
                    }
                });
            </script>
            <?php
        } else {
            wc_add_notice( 
                sprintf( 'Your current order total is %s — you must have an order with a minimum of %s to place your order' , 
                    wc_price( $cart_total - $total_shipping ), 
                    wc_price( $minimum )
                ), 'error' 
            );
            // JavaScript to hide the element with class "wc-proceed-to-checkout"
            ?>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function() {
                    var proceedToCheckout = document.querySelector('#payment');
                    if (proceedToCheckout) {
                        proceedToCheckout.style.display = 'none';
                    }
                });
            </script>
            <?php
        }
    }

    elseif ( ($cart_total - $total_shipping) > $maximum ) {
        if( is_cart() ) {
            wc_print_notice( 
                sprintf( 'Your order value is %s. We do not currently accept online order values of over %s.' , 
                    wc_price( $cart_total - $total_shipping ), 
                    wc_price( $maximum )
                ), 'error' 
            );
            // JavaScript to hide the element with class "wc-proceed-to-checkout"
            ?>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function() {
                    var proceedToCheckout = document.querySelector('.wc-proceed-to-checkout');
                    if (proceedToCheckout) {
                        proceedToCheckout.style.display = 'none';
                    }
                });
            </script>
            <?php
        } else {
            wc_add_notice( 
                sprintf( 'Your order value is %s. We do not currently accept online order values of over %s.' , 
                    wc_price( $cart_total - $total_shipping ), 
                    wc_price( $maximum )
                ), 'error' 
            );
            // JavaScript to hide the element with class "wc-proceed-to-checkout"
            ?>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function() {
                    var proceedToCheckout = document.querySelector('#payment');
                    if (proceedToCheckout) {
                        proceedToCheckout.style.display = 'none';
                    }
                });
            </script>
            <?php
        }
    }
}

add_action( 'woocommerce_cart_item_removed' , 'wc_min_max_order_amount', 10, 2 );

//  CART | CHECKOUT
function tb_check_cart_total() {
    $min_price = 10;
    $max_price = 250;
	$shipping_total = WC()->cart->get_shipping_total();  // cost of shipping
	$shipping_taxes = WC()->cart->get_shipping_taxes();
	$total_shipping_taxes = array_sum($shipping_taxes);
	$total_shipping = $shipping_total + $total_shipping_taxes;
	$cart_total_value = WC()->cart->total - $total_shipping;

	$total =  wc_price($cart_total_value);
	$notice = '';
	if ($min_price && $cart_total_value < $min_price) {
		$price = wc_price($min_price);
		$notice .= sprintf('Your current order total is %1s — you must have an order with a minimum of %2s to place your order.', $total, $price);
	}
	
	if ($max_price && $cart_total_value > $max_price) {
		$price = wc_price($max_price);
		$notice .= sprintf('Your order value is %1s. We do not currently accept online order values of over %2s.', $total, $price);
	}

	wp_send_json_success(array('notice' => $notice));
}
add_action('wp_ajax_tb_check_cart_total', 'tb_check_cart_total');
add_action('wp_ajax_nopriv_tb_check_cart_total', 'tb_check_cart_total');


/*----------------------------------------------------------------------------------------*/
/* WooCommerce Product Page - Product Gallery 
/*----------------------------------------------------------------------------------------*/
// JavaScript/jQuery to initialize Slick Slider on product gallery images
function custom_init_slick_slider() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // Initialize Slick Slider
            $('.product-gallery-thumbnails').slick({
                slidesToShow: 4,
                slidesToScroll: 4,
                arrows: true,
                infinite: false
            });
			// Handle click event on gallery images to replace main product image
			// $('.product-gallery-thumbnails .slick-slide').each(function() {
			// 	$(this).find('a').click(function(e) {
			// 		e.preventDefault();
			// 	});
			// });
            // $('.product-gallery-thumbnails .slick-slide').on('click', function() {
			// 	var $clickedImage = $(this).find('a');
            //     var newImageUrl = $clickedImage.attr('href');
            //    $('.product-main-image .woocommerce-product-gallery__image img').attr({
			//		src: newImageUrl,
			//		srcset: newImageUrl
			//	});
            // });
			$('.product-image-wrapper .product-main-image a').css('pointer-events','all').attr('target','_blank');
			$('.product-gallery-thumbnails .slick-slide').each(function() {
				$(this).click(function() {
					$('.product-main-image .woocommerce-product-gallery__image img').attr('data-o_src','');
					$('.product-main-image .woocommerce-product-gallery__image img').attr('data-o_srcset','');
					$('.product-main-image .woocommerce-product-gallery__image img').attr('data-o_data-src','');
					$('.product-main-image .woocommerce-product-gallery__image img').attr('data-o_data-large_image','');
					var $clickedImage = $(this).find('a');
					var newImageUrl = $clickedImage.attr('href');
					$('.product-main-image .woocommerce-product-gallery__image').attr('data-thumb', newImageUrl);
					$('.product-main-image .woocommerce-product-gallery__image a').attr({
						'href': newImageUrl,
						'data-thumb': newImageUrl,
					});
					$('.product-main-image .woocommerce-product-gallery__image img').attr({
						'src': newImageUrl,
						'data-src': newImageUrl,
						'data-large_image': newImageUrl,
						'srcset': newImageUrl,
					});
				});
			});
        });
    </script>
    <?php
}
add_action('wp_footer', 'custom_init_slick_slider');

// Retrieve product gallery images and insert into Slick Slider, excluding the main product image
function custom_display_product_gallery() {
    global $product;

    // Get product gallery attachment IDs
    $attachment_ids = $product->get_gallery_image_ids();

    if ($attachment_ids) {
        echo '<div class="product-gallery-thumbnails">';
        // Loop through attachment IDs and output image HTML
        foreach ($attachment_ids as $attachment_id) {
            $image_url = wp_get_attachment_image_url($attachment_id, 'full');
            echo '<div><img src="' . esc_url($image_url) . '" /></div>';
        }
        echo '</div>';
    }
}



// Checkout Page - instance id checker
// add_action('woocommerce_review_order_before_shipping', 'display_shipping_instance_ids');

function display_shipping_instance_ids() {
    // Get the chosen shipping methods
    $chosen_methods = WC()->session->get('chosen_shipping_methods');

    // Get all available shipping methods
    $available_methods = WC()->shipping->get_packages();

    foreach ($available_methods as $package_key => $package) {
        foreach ($package['rates'] as $rate_id => $rate) {
            // Check if this rate is among the chosen methods
            if (in_array($rate_id, $chosen_methods)) {
                // Display the instance ID
                echo '<p class="instance_id" style="display: none;">' . esc_html($rate->method_title) . ' - Instance ID: ' . esc_html($rate->instance_id) . '</p>';
            }
        }
    }
}



// Update instance_id in shipping method JSON based on selected shipping method 
add_filter('woocommerce_package_rates', 'set_shipping_instance_id', 10, 2);

function set_shipping_instance_id($rates, $package) {
    // Get the chosen shipping methods
    $chosen_methods = WC()->session->get('chosen_shipping_methods');

    // Loop through each shipping rate
    foreach ($rates as $rate_id => $rate) {
        // Check if this rate is among the chosen methods
        if ($chosen_methods && in_array($rate_id, $chosen_methods)) {
            // Force instance_id to 1 for Flat Rate or 2 for Free Shipping
            if ($rate->method_id === 'flat_rate') {
                $rates[$rate_id]->instance_id = 1; // Set instance_id to 1 for Flat Rate
            } elseif ($rate->method_id === 'free_shipping') {
                $rates[$rate_id]->instance_id = 2; // Set instance_id to 2 for Free Shipping
            }
        } else {
            // Set instance_id to empty if not the chosen method
            $rates[$rate_id]->instance_id = '';
        }
    }

    return $rates;
}
