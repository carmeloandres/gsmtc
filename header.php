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
        <nav id="nav-main" class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-primary fixed-top">
            <div class="container">
            <?php
                    the_custom_logo();
                    $gsmtc_description = get_bloginfo('description','display');
                    if ( $gsmtc_description || is_customize_preview() ): // To take efect the enable/disable of description must use class "site-description"
                ?>
                   <span class="site-description text-primary mx-3 px-3"><?php echo $gsmtc_description; ?></span>
                    <?php endif ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu-toggle"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'container' => false,
                        'menu_class' => '',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto mb-2 mb-md-0 %2$s fs-5">%3$s</ul>',
                        'depth' => 2,
                        'walker' => new bootstrap_5_wp_nav_menu_walker()
                    ));
                    ?>
                </div><!-- collapse navbar-collapse -->
            </div><!-- container-fluid -->
        </nav><!-- nav-main -->
	</header><!-- #masthead -->
