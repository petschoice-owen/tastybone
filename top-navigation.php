<div class="top-navigation">
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a href="/" class="logo-link">
                    <img src="<?php the_field('theme_header_logo', 'option'); ?>" class="logo-image lazyload" alt="Logo" >
                </a>
                <div class="menu-holder">
                    <ul class="socials">
                        <?php if( get_field('theme_facebook', 'option') ): ?>
                            <li><a href="<?php the_field('theme_facebook', 'option'); ?>" title="Facebook" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <?php endif; ?>
                        <?php if( get_field('theme_twitter', 'option') ): ?>
                            <li><a href="<?php the_field('theme_twitter', 'option'); ?>" title="Twitter" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-x.png" alt="" /></a></li>
                        <?php endif; ?>
                        <?php if( get_field('theme_instagram', 'option') ): ?>
                            <li><a href="<?php the_field('theme_instagram', 'option'); ?>" title="Instagram" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                        <?php endif; ?>
                    </ul>
                    <ul class="account">
                        <li><a href="/my-account" title="Account"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-user.png" alt="" /></a></li>
                        <li>
                            <div class="cart-holder">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-cart.png" class="icon-cart" alt="" />
                                <?php echo do_shortcode("[woo_cart_but]"); ?>
                            </div>
                        </li>
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php wp_nav_menu( array( 
                        'theme_location'    => 'header_menu', 
                        'container'         => 'ul',
                        'menu_class'        => 'navbar-nav',    
                    )); ?>
                    <div class="mobile-bottom">
                        <ul class="half badges">
                            <?php
                                if( have_rows('theme_header_mobile_images', 'option') ):
                                while( have_rows('theme_header_mobile_images', 'option') ) : the_row();
                                    $image = get_sub_field('image', 'option'); ?>
                                    <li><img src="<?php echo $image; ?>" alt="" /></li>
                                <?php endwhile;
                                else :
                                endif;
                            ?>
                        </ul>
                        <ul class="half socials">
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
                    </div>
                </div>
                <div class="navigation-border"></div>
            </div>
        </nav>
    </div>
    <?php if( get_field('theme_header_free_delivery_text', 'option') ): ?>
        <div class="wrapper-free-delivery">
            <div class="container">
                <!-- <div class="free-delivery black-friday" style="display: none;">
                    <img src="/wp-content/themes/tastybone/assets/images/icon-discount.png" class="icon-black-friday" alt="" />
                    <p><span class="top">BLACK FRIDAY SALE! </span><span class="bottom">use code BF20</span></p>
                </div> -->
                <div class="free-delivery">
                    <?php if( get_field('theme_header_free_delivery_icon', 'option') ): ?>
                        <img src="<?php the_field('theme_header_free_delivery_icon', 'option'); ?>" class="icon-truck" alt="" />
                    <?php endif; ?>
                    <p><?php the_field('theme_header_free_delivery_text', 'option'); ?></p>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- <style>
    .page-home .hero-top .badges {
        display: none;
    }
    .top-navigation .wrapper-free-delivery .container {
        position: relative;
    }
    .top-navigation .wrapper-free-delivery img {
        max-height: 17px;
        width: auto;
    }
    .top-navigation .wrapper-free-delivery .free-delivery {
        padding: 10px 12px;
    }
    .top-navigation .wrapper-free-delivery p {
        font-size: 12px;
    }
    .top-navigation .wrapper-free-delivery .black-friday {
        position: absolute;
        top: 0;
        left: 0;
    }
    .top-navigation .wrapper-free-delivery .black-friday img {
        -webkit-filter: invert(100%);
        filter: invert(100%);
    }
    @media (max-width: 1199px) {
        .top-navigation .wrapper-free-delivery .black-friday {
            left: 12px;
        }
        .top-navigation .wrapper-free-delivery img {
            max-height: 14px;
        }
    }
    @media (max-width: 767px) {
        body .top-navigation + main > section:first-child {
            padding-top: 35px;
        }
        .top-navigation .wrapper-free-delivery img {
            max-height: 12px;
        }
        .top-navigation .wrapper-free-delivery p {
            font-family: "HelveticaNeue";
            font-weight: bold;
            font-size: 10px;
            letter-spacing: 0;
        }
        .top-navigation .wrapper-free-delivery .black-friday {
            left: 20px;
        }
    }
    @media (max-width: 575px) {
        .top-navigation .wrapper-free-delivery .black-friday {
            top: initial;
            right: initial;
            bottom: calc(100% + 13px);
            left: 85px;
        }
        .top-navigation .wrapper-free-delivery .black-friday p {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            line-height: 12px;
        }
    }
</style> -->