<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gesimatica
 */

?>

	<footer id="colophon" class="site-footer mt-4">

	<div class="bg-dark pt-0 mt-0 pb-0">
        <div class="container">
            
            <!-- Top Footer Widget -->
            <?php if ( is_active_sidebar( 'top-footer' )) : ?>
                <div class="text-center text-white pt-4">
                    <?php dynamic_sidebar( 'top footer' ); ?>
                </div>
            <?php endif; ?>            
            
            <div class="row">

                <!-- Footer 1 Widget -->
                <div class="col-md-6 col-lg-3">
                    <?php if ( is_active_sidebar( 'footer-1' )) : ?>
                        <div>
                            <?php dynamic_sidebar( 'footer-1' ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Footer 2 Widget -->
                <div class="col-md-6 col-lg-3">
                    <?php if ( is_active_sidebar( 'footer-2' )) : ?>
                        <div>
                            <?php dynamic_sidebar( 'footer-2' ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Footer 3 Widget -->
                <div class="col-md-6 col-lg-3">
                    <?php if ( is_active_sidebar( 'footer-3' )) : ?>
                        <div>
                            <?php dynamic_sidebar( 'footer-3' ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Footer 4 Widget -->
                <div class="col-md-6 col-lg-3">
                    <?php if ( is_active_sidebar( 'footer-4' )) : ?>
                        <div>
                            <?php dynamic_sidebar( 'footer-4' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- Footer Widgets End -->
            </div>

             <!-- Footer Menu -->
             <div id="footer-menu" class="footer-menu">
           		<nav class="nav">
            		<?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'container' => 'div',
                        'menu_class' => '',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto mb-2 mb-md-0 %2$s fs-5">%3$s</ul>',
                        'depth' => 1,
                        'walker' => new bootstrap_5_wp_nav_menu_walker()
                    ));
                    ?>
				</nav>
            </div>
            <!-- Footer Menu -->
                                   
        </div>
    </div>
    
    <div class="bg-dark text-white pb-2 mt-0 text-center">
        <div class="container">
            <small>&copy;&nbsp;<?php echo Date('Y'); ?> - <a href="<?php bloginfo('url'); ?>" class="link-light"><?php bloginfo('name'); ?></a></small>    
        </div>
    </div>		
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
