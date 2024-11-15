    <div class="footer-section">
        <div class="container">
            <ul class="badges">
                <?php
                    if( have_rows('footer_images', 'option') ):
                    while( have_rows('footer_images', 'option') ) : the_row();
                        $image = get_sub_field('image', 'option'); ?>
                        <li><img src="<?php echo $image; ?>" alt="" /></li>
                    <?php endwhile;
                    else :
                    endif;
                ?>
            </ul>
            <div class="footer-right">
                <ul class="socials">
                    <?php if( get_field('theme_facebook', 'option') ): ?>
                        <li><a href="<?php the_field('theme_facebook', 'option'); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <?php endif; ?>
                    <?php if( get_field('theme_twitter', 'option') ): ?>
                        <!-- <li><a href="<?php the_field('theme_twitter', 'option'); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></li> -->
                        <li><a href="<?php the_field('theme_twitter', 'option'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-x.png" alt="" /></a></li>
                    <?php endif; ?>
                    <?php if( get_field('theme_instagram', 'option') ): ?>
                        <li><a href="<?php the_field('theme_instagram', 'option'); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                    <?php endif; ?>
                </ul>
                <?php if( get_field('footer_newsletter_visibility', 'option') == 'show' ): ?>
                    <p class="newsletter-section">
                        <a href="<?php if( get_field('footer_newsletter_url', 'option') ) { the_field('footer_newsletter_url', 'option'); } else { echo "#"; } ?>" class="btn-brand newsletter-link">
                            <?php the_field('footer_newsletter_text', 'option'); ?>
                            <?php if( get_field('footer_newsletter_icon', 'option') ): ?>
                                <img src="<?php the_field('footer_newsletter_icon', 'option'); ?>" alt="" />
                            <?php endif; ?>
                        </a>
                    </p>
                <?php endif; ?>
                <p class="copyright-text"><?php the_field('copyright_text', 'option'); ?></p>
                <?php wp_nav_menu( array( 
                    'theme_location'    => 'footer_menu',
                    'container'         => 'ul',
                    'menu_class'        => 'links',    
                )); ?>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>

    <!-- Product Page -->
    <?php if ( is_product() ) { ?>
        <script>
            var $ = jQuery;
            
            $(window).on('load', function() {
                const shadowRoot = $("#feefo-product-review-widgetId")[0].shadowRoot;
                const titleElement = $(shadowRoot).find('.feefowidget-header-information-title h2');
                const productTitle = $('.single-product-title').text().trim();
                titleElement.text(productTitle);

                const feefoWidgetComments = $('.single-product .single-product-wrapper .reviews-wrapper');
                feefoWidgetComments.css('opacity','1');
            });
        </script>
    <?php } ?>

    <!-- Cart Page -->
    <?php if ( is_page( 'cart' ) || is_cart() ) { ?>
        <script>
            var $ = jQuery;

            // add the restricted shipping zone message
            $(document).ready(function() {
                if ( $('.cart_totals').length ) {
                    $('<div class="restricted-message-wrapper"><p class="restricted-message">Apologies, the provided address is currently not within our delivery range. We are unable to deliver outside of the UK. This includes Scottish Highlands, Channel Islands, and Northern Ireland.</p></div>').insertAfter('.cart_totals');
                }
            });

            $(document).ready(function() {
                // validate shipping zone on page load
                var shippingMethod = $('#shipping_method').text().trim();
                if ( shippingMethod.includes("Restricted Zone") ) {
                    // console.log("restricted zone");
                    $('body').addClass('restricted-zone');
                }
                else {
                    // console.log("UK Mainland");
                    $('body').removeClass('restricted-zone');
                }

                // hide/show proceed to checkout button
                if ( $('.woocommerce-shipping-methods li').length ) {
                    $('.wc-proceed-to-checkout').show();
                }
                else {
                    $('.wc-proceed-to-checkout').hide();
                }

                // hide/show proceed to checkout extended
                var shippingMessage = $('.woocommerce-shipping-destination').text().trim();
                if ( shippingMessage.includes("Shipping options") ) {
                    $('.wc-proceed-to-checkout').hide();
                }
                else {
                    $('.wc-proceed-to-checkout').show();
                }

                // minimum and maximum order amount validation
                var minMaxError = $('.woocommerce-error').text().trim();
                if ( minMaxError.includes("minimum") ) {
                    $('.wc-proceed-to-checkout').css('display','none');
                }
                else if ( minMaxError.includes("order values of over") ) {
                    $('.wc-proceed-to-checkout').css('display','none');
                }
                else {
                    $('.wc-proceed-to-checkout').css('display','block');
                }
            });

            $(window).on('load', function() {
                // hide/show proceed to checkout extended
                var shippingMessage = $('.woocommerce-shipping-destination').text().trim();
                if ( shippingMessage.includes("Shipping options") ) {
                    $('.wc-proceed-to-checkout').hide();
                }
                else {
                    $('.wc-proceed-to-checkout').show();
                }
            });

            $('body').on('updated_cart_totals', function() {
                // console.log('updated_cart_totals triggered');
                
                // validate shipping zone on change address
                var shippingMethod = $('#shipping_method').text().trim();

                if ( shippingMethod.includes("Restricted Zone") ) {
                    // console.log("restricted zone");
                    $('body').addClass('restricted-zone');
                }
                else {
                    // console.log("UK Mainland");
                    $('body').removeClass('restricted-zone');
                }

                // hide/show proceed to checkout button
                if ( $('.woocommerce-shipping-methods li').length ) {
                    $('.wc-proceed-to-checkout').show();
                }
                else {
                    $('.wc-proceed-to-checkout').hide();
                }

                // hide/show proceed to checkout extended
                var shippingMessage = $('.woocommerce-shipping-destination').text().trim();
                if ( shippingMessage.includes("Shipping options") ) {
                    $('.wc-proceed-to-checkout').hide();
                }
                else {
                    $('.wc-proceed-to-checkout').show();
                }

                // minimum and maximum order amount validation
                var minMaxError = $('.woocommerce-error').text().trim();
                if ( minMaxError.includes("minimum") ) {
                    $('.wc-proceed-to-checkout').css('display','none');
                }
                else if ( minMaxError.includes("order values of over") ) {
                    $('.wc-proceed-to-checkout').css('display','none');
                }
                else {
                    $('.wc-proceed-to-checkout').css('display','block');
                }

                // minimum anx maximum order amount - on update cart
                var minAmount = 10;
                var maxAmount = 250;
                var totalAmount = $('.cart-subtotal .amount').text();
                var total = totalAmount.replace(/^[£]+/,"").replace(",","").replace(".00","");

                if ( total < minAmount ) {
                    $('.woocommerce-error').each(function() {
                        if ( $(this).text().trim().includes("minimum") || $(this).text().trim().includes("over") ) {
                            $(this).remove();
                        }
                    });
                    setTimeout(() => {
                        $('<ul class="woocommerce-error" role="alert"><li>Your current order total is '+totalAmount+' — you must have an order with a minimum of £10.00 to place your order.</li></ul>').insertAfter('.woocommerce-notices-wrapper');
                    }, 100);
                }
                else if ( total > maxAmount ) {
                    $('.woocommerce-error').each(function() {
                        if ( $(this).text().trim().includes("minimum") || $(this).text().trim().includes("over") ) {
                            $(this).remove();
                        }
                    });
                    $('<ul class="woocommerce-error" role="alert"><li>Your order value is '+totalAmount+'. We do not currently accept online order values of over £250.00.</li></ul>').insertAfter('.woocommerce-notices-wrapper');
                }
                else {
                    $('.woocommerce-error').each(function() {
                        if ( $(this).text().trim().includes("minimum") || $(this).text().trim().includes("over") ) {
                            $(this).remove();
                        }
                    });
                }
            });
        </script>
    <?php } ?>

    <!-- Checkout Page -->
    <?php if ( is_page( 'checkout' ) || is_checkout() ) { ?>
        <script>
            var $ = jQuery;
            // add the restricted shipping zone message
            $(document).ready(function() {
                if ( $('.woocommerce-checkout-review-order').length ) {
                    $('<div class="restricted-message-wrapper"><p class="restricted-message">Apologies, the provided address is currently not within our delivery range. We are unable to deliver outside of the UK. This includes Scottish Highlands, Channel Islands, and Northern Ireland.</p></div>').insertAfter('.woocommerce-checkout-review-order');
                }
            });

            // validate shipping zone on page load
            $(document).ready(function() {
                var shippingMethod = $('#shipping_method').text().trim();
                if ( shippingMethod.includes("Restricted Zone") ) {
                    // console.log("on load - restricted zone");
                    $('body').addClass('restricted-zone');
                }
                else {
                    // console.log("on load - UK Mainland");
                    $('body').removeClass('restricted-zone');
                }
            });

            // validate shipping zone on change address
            $('body').on('updated_checkout', function() {
                // console.log('updated_checkout triggered');

                var shippingMethod = $('#shipping_method').text().trim();

                if ( shippingMethod.includes("Restricted Zone") ) {
                    // console.log("restricted zone");
                    $('body').addClass('restricted-zone');
                }
                else {
                    // console.log("UK Mainland");
                    $('body').removeClass('restricted-zone');
                }
            });

            // validate shipping zone on change postcode
            $('#billing_postcode, #shipping_postcode').on('focusout, blur', function() {
                // console.log('updated_checkout triggered');
                $(document.body).trigger('update_checkout');
            });

            // minimum and maximum order amount validation
            $(document).ready(function() {
                var minAmount = 10;
                var maxAmount = 250;
                var totalAmount = $('.cart-subtotal .amount').text();
                var total = totalAmount.replace(/^[£]+/,"").replace(",","").replace(".00","");

                if ( total < minAmount ) {
                    $('.woocommerce-checkout.woocommerce-page').addClass('min-max-show');
                    $('<div class="min-max-error"><p class="min-max-message">Your current order total is £'+total+ '— you must have an order with a minimum of £10.00 to place your order.</p></div>').insertAfter('.woocommerce-checkout-review-order');
                    setTimeout(() => {
                        $('.min-max-error').addClass('min-max-error-show');
                    }, 100);
                }
                else if ( total > maxAmount ) {
                    $('.woocommerce-checkout.woocommerce-page').addClass('min-max-show');
                    $('<div class="min-max-error"><p class="min-max-message">Your order value is £'+total+ '. We do not currently accept online order values of over £250.00.</p></div>').insertAfter('.woocommerce-checkout-review-order');
                    setTimeout(() => {
                        $('.min-max-error').addClass('min-max-error-show');
                    }, 100);
                }
                else {
                    $('.woocommerce-checkout.woocommerce-page').removeClass('min-max-show');
                    if ( $('.min-max-error').length ) {
                        $('.min-max-error').removeClass('min-max-error-show');
                    }
                }

                $('body').on('updated_cart_totals', function() {
                    var minAmount = 10;
                    var maxAmount = 250;
                    var totalAmount = $('.cart-subtotal .amount').text();
                    var total = totalAmount.replace(/^[£]+/,"").replace(",","").replace(".00","");

                    if ( total < minAmount ) {
                        $('.woocommerce-checkout.woocommerce-page').addClass('min-max-show');
                        setTimeout(() => {
                            $('.min-max-error').addClass('min-max-error-show');
                        }, 100);
                    }
                    else if ( total > maxAmount ) {
                        $('.woocommerce-checkout.woocommerce-page').addClass('min-max-show');
                        setTimeout(() => {
                            $('.min-max-error').addClass('min-max-error-show');
                        }, 100);
                    }
                    else {
                        $('.woocommerce-checkout.woocommerce-page').removeClass('min-max-show');
                        if ( $('.min-max-error').length ) {
                            $('.min-max-error').removeClass('min-max-error-show');
                        }
                    }
                });
            });
        </script>
    <?php } ?>
    <div class="popup-atc-message"><div class="popup-atc-message__content"><span class="js-product-name"></span> has been added to your cart!</div></div>
</body>
</html>