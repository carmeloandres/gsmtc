<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gesimatica
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
        <div class="header-content">
            <div class="site-branding">
                    <?php 
                    the_custom_logo(); 
                    $gsmtc_description = get_bloginfo( 'description', 'display' );
                    if ( $gsmtc_description || is_customize_preview() ) :
                    // To take efect de enable/disable of description must use class "site-description"
                    ?>
                    <p class="site-description"><?php echo $gsmtc_description;  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><p>
                    <?php endif; ?>                
            </div> <!-- .site-branding -->
            <nav id="site-navigation" class="main-navigation">
                <button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" onclick="menuToggleClick()"></button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        )
                    );
                ?>
            </nav><!-- .site-navigation -->
        </div> <!-- .header-content -->
	</header><!-- #masthead -->
