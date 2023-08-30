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
                        <li><a href="<?php the_field('theme_twitter', 'option'); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
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

    <!-- Cart Page -->
    <?php if ( is_page( 'cart' ) || is_cart() ) { ?>
        <script>
            var $ = jQuery;

            // add the restricted shipping zone message
            $(document).ready(function() {
                if ( $('.cart_totals').length ) {
                    $('<div class="restricted-message-wrapper"><p class="restricted-message">Apologies, the provided address is currently not within our delivery range. We only accept orders within the UK mainland - for orders outside this region, please contact the sales office.</p></div>').insertAfter('.cart_totals');
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
                if ( $('.woocommerce-shipping-methods').length ) {
                    $('.wc-proceed-to-checkout').show();
                }
                else {
                    $('.wc-proceed-to-checkout').hide();
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
                if ( $('.woocommerce-shipping-methods').length ) {
                    $('.wc-proceed-to-checkout').show();
                }
                else {
                    $('.wc-proceed-to-checkout').hide();
                }
            });
        </script>
    <?php } ?>

    <!-- Checkout Page -->
    <?php if ( is_page( 'checkout' ) || is_checkout() ) { ?>
        <script>
            var $ = jQuery;
            // console.log("checkout - test");

            // add the restricted shipping zone message
            $(document).ready(function() {
                if ( $('.woocommerce-checkout-review-order').length ) {
                    $('<div class="restricted-message-wrapper"><p class="restricted-message">Apologies, the provided address is currently not within our delivery range. We only accept orders within the UK mainland - for orders outside this region, please contact the sales office.</p></div>').insertAfter('.woocommerce-checkout-review-order');
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
        </script>
    <?php } ?>
</body>
</html>