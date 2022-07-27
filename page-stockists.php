<?php
/**
*** Template Name: Stockists Page
**/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php include 'top-navigation.php'; ?>
    <main class="page-stockists">
        <section class="hero-inner box-shadow-hero" style="background-image: url(<?php the_field('hero_background_image'); ?>);">
            <div class="container">
                <div class="wrapper">
                    <h1 class="page-title"><?php the_field('hero_title'); ?></h1>
                </div>
            </div>
        </section>
        <section class="store-locator">
            <div class="container">
                <?php if( have_rows('stockists_stores') ): ?>
                    <ul class="stores">
                        <?php while( have_rows('stockists_stores') ) : the_row();
                            $store_logo = get_sub_field('store_logo');
                            $store_link = get_sub_field('store_link'); ?>
                            <li><a href="<?php echo $store_link; ?>" class="store-link"><img src="<?php echo $store_logo; ?>" alt="" /></a></li>
                        <?php endwhile; ?>
                    </ul>
                    <?php else :
                endif; ?>
                <div class="text-editor">
                    <?php the_field('stockists_text_editor'); ?>
                </div>
            </div>
        </section>
        <section class="stockists">
            <div class="container">
                <div class="search-section">
                    <div class="search">
                        <form action="" class="search-form">
                            <div class="form-group">
                                <input type="text" class="search-input" id="search_input" placeholder="Enter postcode or town" name="destination">
                                <div class="button-holder">
                                    <a href="#search_results" id="search_stockist" class="btn-brand btn-arrow-right btn-search btn-not-clickable"></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="map-section">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d588126.4491567899!2d-2.7132537135226413!3d54.843769832183625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sph!4v1656929561428!5m2!1sen!2sph" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="search-results-section d-none" id="search_results">
                    <ul class="items" id="search_results_items">
                        <?php if ( have_posts() ) :
                            $args = array(
                                'post_type' => 'stockists',
                                'post_status' => 'publish',
                                'posts_per_page' => -1, 
                                'orderby' => 'date', 
                                'order' => 'DESC',
                            );
                            $news = new WP_Query( $args ); ?>
                            <?php while ( $news->have_posts() ) : $news->the_post(); ?> 
                                <?php 
                                    $address_1 = get_field('stockist_address_1');
                                    $area_village = get_field('stockist_area_village');
                                    $town = get_field('stockist_town');
                                    $county = get_field('stockist_county');
                                    $country = get_field('stockist_country');
                                    $postcode = get_field('stockist_postcode');
                                    $number = get_field('stockist_number');
                                    $email_address = get_field('stockist_email_address');
                                    $website_address = get_field('stockist_website_address');
                                    $latitude = get_field('stockist_latitude');
                                    $longitude = get_field('stockist_longitude');
                                ?>
                                <li class="item">
                                    <span class="title d-none"><?php the_title(); ?> <?php echo $town; ?> <?php echo $postcode; ?></span>
                                    <div class="item-wrapper">
                                        <div class="information">
                                            <h5 class="name"><?php the_title(); ?></h5>
                                            <p class="address">
                                            <?php echo $address_1; ?>
                                                <?php if( get_field('stockist_address_1') ): ?><?php echo $address_1; ?>,<?php endif; ?> <?php if( get_field('stockist_area_village') ): ?><?php echo $area_village; ?>,<?php endif; ?><br/>
                                                <?php if( get_field('stockist_town') ): ?><?php echo $town; ?>,<?php endif; ?> <br/>
                                                <?php if( get_field('stockist_postcode') ): ?><?php echo $postcode; ?><?php endif; ?>
                                            </p>
                                        </div>
                                        <div class="contact">
                                            <?php if( get_field('stockist_postcode') ): ?><a href="tel:<?php echo $postcode; ?>" class="phone"><?php echo $postcode; ?></a><?php endif; ?>
                                            <div class="web-email">
                                                <?php if( get_field('stockist_email_address') ): ?>
                                                    <a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a>
                                                <?php endif; ?>
                                                <?php if( get_field('stockist_website_address') ): ?>
                                                    <a href="mailto:<?php echo $website_address; ?>"><?php echo $website_address; ?></a>
                                                <?php endif; ?>
                                            </div>
                                            <?php if( get_field('stockist_postcode') ): ?><a href="https://www.google.com/maps/search/<?php echo $latitude; ?>,+<?php echo $longitude; ?>" class="view" target="_blank">View in Google Map</a><?php endif; ?>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile;
                            wp_reset_postdata();
                        else : ?>
                        <?php endif; wp_reset_query(); ?>
                    </ul>
                    <p class="search-results-none d-none" id="search_results_none">Sorry, please try a different postcode or town.</p>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>