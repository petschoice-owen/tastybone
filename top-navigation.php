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
                            <li><a href="<?php the_field('theme_facebook', 'option'); ?>"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <?php endif; ?>
                        <?php if( get_field('theme_twitter', 'option') ): ?>
                            <li><a href="<?php the_field('theme_twitter', 'option'); ?>"><i class="fa-brands fa-twitter"></i></a></li>
                        <?php endif; ?>
                        <?php if( get_field('theme_instagram', 'option') ): ?>
                            <li><a href="<?php the_field('theme_instagram', 'option'); ?>"><i class="fa-brands fa-instagram"></i></a></li>
                        <?php endif; ?>
                    </ul>
                    <ul class="account">
                        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-user.png" alt="" /></a></li>
                        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-cart.png" alt="" /></a></li>
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
                                <li><a href="<?php the_field('theme_facebook', 'option'); ?>"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <?php endif; ?>
                            <?php if( get_field('theme_twitter', 'option') ): ?>
                                <li><a href="<?php the_field('theme_twitter', 'option'); ?>"><i class="fa-brands fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if( get_field('theme_instagram', 'option') ): ?>
                                <li><a href="<?php the_field('theme_instagram', 'option'); ?>"><i class="fa-brands fa-instagram"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="navigation-border"></div>
            </div>
        </nav>
    </div>
</div>