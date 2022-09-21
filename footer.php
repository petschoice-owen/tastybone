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
                <?php if( get_field('footer_newsletter_text', 'option') ): ?>
                    <p class="newsletter-section">
                        <a href="#" class="newsletter-link">
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
</body>
</html>