<?php
/**
 * gesimatica functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gesimatica
 */

/**
 * The theme version.
 *
 * @since 1.0.0
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', wp_get_theme()->get( 'Version' ) );
}


/**
 * Register Comment list
 */
require_once('inc/comment-list.php');


/**
 * Actualizaciones del Theme
 */
require_once(dirname(__FILE__).'/update-checker/update-checker.php');

$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://gesimatica.com/updates/?action=get_metadata&slug=gsmtc',
	__FILE__, //Full path to the main plugin file or functions.php.
	'gsmtc'
);

$myUpdateChecker->addQueryArgFilter('wsh_filter_update_checks');
function wsh_filter_update_checks($queryArgs) {
//    $settings = get_option('my_plugin_settings');
//    if ( !empty($settings['license_key']) ) {
//        $queryArgs['license_key'] = $settings['license_key'];
//    }
    $queryArgs['user_id'] = '1';

    $queryArgs['license_key'] = '123456789';   
//    error_log(var_export($queryArgs,true));
    return $queryArgs;
}

if (! function_exists('gsmtc_setup')){
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gsmtc_setup() {
		/*
			* Make theme available for translation.
			* Translations can be filed in the /languages/ directory.
			* If you're building a theme based on gesimatica, use a find and replace
			* to change 'gsmtc' to the name of your theme in all the template files.
			*/
		load_theme_textdomain( 'gsmtc', get_template_directory() . '/languages' );
	
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
	
		/*
			* Let WordPress manage the document title.
			* By adding theme support, we declare that this theme does not use a
			* hard-coded <title> tag in the document head, and expect WordPress to
			* provide it for us.
			*/
		add_theme_support( 'title-tag' );
	
		/*
			* Enable support for Post Thumbnails on posts and pages.
			*
			* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			*/
		add_theme_support( 'post-thumbnails' );
	
		// This theme uses wp_nav_menu() in two location, header and footer.
		register_nav_menus(
			array(
				'header-menu' => esc_html__( 'Header menu', 'gsmtc' ),
				'footer-menu' => esc_html__( 'Footer menu', 'gsmtc' ),

			)
		);
		/**
 		* Register class menu bootstrap 5 nav walker
 		*/
		require_once ('inc/class-bootstrap-5-nav-menu-walker.php');
	
		/*
			* Switch default core markup for search form, comment form, and comments
			* to output valid HTML5.
			*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
	
		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'gsmtc_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);
	
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
}
add_action( 'after_setup_theme', 'gsmtc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gsmtc_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'gsmtc_content_width', 640 );
}
add_action( 'after_setup_theme', 'gsmtc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if ( ! function_exists('gsmtc_widgets_init')){

	function gsmtc_widgets_init() {
	
			// Top Nav
			register_sidebar(array(
				'name' => esc_html__('Top Nav', 'gsmtc' ),
				'id' => 'top-nav',
				'description' => esc_html__('Add widgets here.', 'gsmtc' ),
				'before_widget' => '<div class="ms-3">',
				'after_widget' => '</div>',
				'before_title' => '<div class="widget-title d-none">',
				'after_title' => '</div>'
			));
			// Top Nav End
	
			// Sidebar
			register_sidebar(array(
				'name'          => esc_html__( 'Sidebar', 'gsmtc' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'gsmtc' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4 bg-light border-0">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title card-title border-bottom py-2">',
				'after_title'   => '</h2>',
			));
			// Sidebar End
	
			// Top Footer
			register_sidebar(array(
				'name' => esc_html__('Top Footer', 'gsmtc' ),
				'id' => 'top-footer',
				'description' => esc_html__('Add widgets here.', 'gsmtc' ),
				'before_widget' => '<div class="footer_widget mb-5">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="widget-title">',
				'after_title' => '</h2>'
			));
			// Top Footer End
		
			// Footer 1
			register_sidebar(array(
				'name' => esc_html__('Footer 1', 'gsmtc' ),
				'id' => 'footer-1',
				'description' => esc_html__('Add widgets here.', 'gsmtc' ),
				'before_widget' => '<div class="footer_widget mb-4">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="widget-title h4">',
				'after_title' => '</h2>'
			));
			// Footer 1 End
		
			// Footer 2
			register_sidebar(array(
				'name' => esc_html__('Footer 2', 'gsmtc' ),
				'id' => 'footer-2',
				'description' => esc_html__('Add widgets here.', 'gsmtc'),
				'before_widget' => '<div class="footer_widget mb-4">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="widget-title h4">',
				'after_title' => '</h2>'
			));
			// Footer 2 End
		
			// Footer 3
			register_sidebar(array(
				'name' => esc_html__('Footer 3', 'gsmtc' ),
				'id' => 'footer-3',
				'description' => esc_html__('Add widgets here.', 'gsmtc'),
				'before_widget' => '<div class="footer_widget mb-4">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="widget-title h4">',
				'after_title' => '</h2>'
			));
			// Footer 3 End
		
			// Footer 4
			register_sidebar(array(
				'name' => esc_html__('Footer 4', 'gsmtc' ),
				'id' => 'footer-4',
				'description' => esc_html__('Add widgets here.', 'gsmtc'),
				'before_widget' => '<div class="footer_widget mb-4">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="widget-title h4">',
				'after_title' => '</h2>'
			));
			// Footer 4 End
	
			// 404 Page
			register_sidebar(array(
				'name' => esc_html__('404 Page', 'gsmtc' ),
				'id' => '404-page',
				'description' => esc_html__('Add widgets here.', 'gsmtc'),
				'before_widget' => '<div class="mb-4">',
				'after_widget' => '</div>',
				'before_title' => '<h1 class="widget-title">',
				'after_title' => '</h1>'
			));
			// 404 Page End
	
	}
}
add_action( 'widgets_init', 'gsmtc_widgets_init' );

// Enable shortcode in HTML-Widget
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode', 11 );
// Enable shortcode in HTML-Widget End


/**
 * Enqueue scripts and styles.
 */
function gsmtc_scripts() {
	// gsmtc bootstrap version
	wp_enqueue_style( 'gsmtc-bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), _S_VERSION );

	// wp_enqueue_style( 'gsmtc-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_style_add_data( 'gsmtc-style', 'rtl', 'replace' );

	//wp_enqueue_script( 'gsmtc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// javascript bootstrap
	wp_enqueue_script( 'gsmtc-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gsmtc_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Amount of posts/products in category
if ( ! function_exists( 'wpsites_query' ) ) :

    function wpsites_query( $query ) {
    if ( $query->is_archive() && $query->is_main_query() && !is_admin() ) {
            $query->set( 'posts_per_page', 24 );
        }
    }
    add_action( 'pre_get_posts', 'wpsites_query' );

endif;
// Amount of posts/products in category End


// Pagination Categories
function gsmtc_pagination($pages = '', $range = 2) 
{  
	$showitems = ($range * 2) + 1;  
	global $paged;
	if($pages == '')
	{
		global $wp_query; 
		$pages = $wp_query->max_num_pages;
	
		if(!$pages)
			$pages = 1;		 
	}   
	
	if(1 != $pages)
	{
	    echo '<nav aria-label="Page navigation" role="navigation">';
        echo '<span class="sr-only">Page navigation</span>';
        echo '<ul class="pagination justify-content-center ft-wpbs mb-4">';
		
     
	 	if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link(1).'" aria-label="First Page">&laquo;</a></li>';
	
	 	if($paged > 1 && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'" aria-label="Previous Page">&lsaquo;</a></li>';
	
		for ($i=1; $i <= $pages; $i++)
		{
		    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				echo ($paged == $i)? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>'.$i.'</span></li>' : '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'"><span class="sr-only">Page </span>'.$i.'</a></li>';
		}
		
		if ($paged < $pages && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" aria-label="Next Page">&rsaquo;</a></li>';  
	
	 	if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'" aria-label="Last Page">&raquo;</a></li>';
	
	 	echo '</ul>';
        echo '</nav>';
        // echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">of</span> '.$pages.' ]</div>';	 	
	}
}
//Pagination Categories End


// Pagination Buttons Single Posts
add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');

function post_link_attributes($output) {
    $code = 'class="page-link"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}
// Pagination Buttons Single Posts End

// Excerpt to pages
add_post_type_support( 'page', 'excerpt' );
// Excerpt to pages End

// Breadcrumb
if ( ! function_exists( 'the_breadcrumb' ) ) :
    function the_breadcrumb() {
        if(!is_home()) {
            echo '<nav class="breadcrumb mb-4 mt-2 bg-light py-1 px-2 rounded">';
            echo '<a href="'.home_url('/').'">'.('<i class="bi bi-house-fill"></i>').'</a><span class="divider">&nbsp;/&nbsp;</span>';
            if (is_category() || is_single()) {
                the_category(' <span class="divider">&nbsp;/&nbsp;</span> ');
                if (is_single()) {
                    echo ' <span class="divider">&nbsp;/&nbsp;</span> ';
                    the_title();
                }
            } elseif (is_page()) {
                echo the_title();
            }
            echo '</nav>';
        }
    }
    add_filter( 'breadcrumbs', 'breadcrumbs' );
endif;
// Breadcrumb End

// Comment Button
function gsmtc_comment_form( $args ) {
    $args['class_submit'] = 'btn btn-outline-primary'; // since WP 4.1    
    return $args;    
}
add_filter( 'comment_form_defaults', 'gsmtc_comment_form' );
// Comment Button End

// Password protected form
function gsmtc_pw_form () {
	$output = '
		  <form action="'.get_option('siteurl').'/wp-login.php?action=postpass" method="post" class="form-inline">'."\n"
		.'<input name="post_password" type="password" size="" class="form-control me-2 my-1" placeholder="' . __('Password', 'gsmtc') . '"/>'."\n"
		.'<input type="submit" class="btn btn-outline-primary my-1" name="Submit" value="' . __('Submit', 'gsmtc') . '" />'."\n"
		.'</p>'."\n"
		.'</form>'."\n";
	return $output;
}
add_filter("the_password_form","gsmtc_pw_form");
// Password protected form End

// Allow HTML in term (category, tag) descriptions
foreach ( array( 'pre_term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_filter_kses' );
	if ( ! current_user_can( 'unfiltered_html' ) ) {
		add_filter( $filter, 'wp_filter_post_kses' );
	}
}
 
// Allow HTML in author bio
remove_filter('pre_user_description', 'wp_filter_kses');
add_filter( 'pre_user_description', 'wp_filter_post_kses');
// Allow HTML in author bio End

// Open links in comments in new tab
if ( ! function_exists( 'gsmtc_comment_links_in_new_tab' ) ) :
    function gsmtc_comment_links_in_new_tab($text) 
    {
        return str_replace('<a', '<a target="_blank" rel=”nofollow”', $text);
    }
    add_filter('comment_text', 'gsmtc_comment_links_in_new_tab');
endif;
// Open links in comments in new tab



foreach ( array( 'term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_kses_data' );
}
// Allow HTML in term (category, tag) descriptions End



/**
 * Filter to add new clases to custom logo
 */
if (!defined('gsmtc_change_logo_class')){
	function gsmtc_change_logo_class ($html){
//		$html = str_replace( 'custom-logo', 'your-custom-class', $html );
    	$html = str_replace( 'custom-logo-link', 'navbar-brand', $html );
		
    	return $html;
	}
	add_filter( 'get_custom_logo', 'gsmtc_change_logo_class' );	
}

// Return an alternate title, without prefix, for every type used in the get_the_archive_title().
add_filter('get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_year() ) {
        $title = get_the_date( _x( 'Y', 'yearly archives date format' ) );
    } elseif ( is_month() ) {
        $title = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
    } elseif ( is_day() ) {
        $title = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
    } elseif ( is_tax( 'post_format' ) ) {
        if ( is_tax( 'post_format', 'post-format-aside' ) ) {
            $title = _x( 'Asides', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
            $title = _x( 'Galleries', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
            $title = _x( 'Images', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
            $title = _x( 'Videos', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
            $title = _x( 'Quotes', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
            $title = _x( 'Links', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
            $title = _x( 'Statuses', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
            $title = _x( 'Audio', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
            $title = _x( 'Chats', 'post format archive title' );
        }
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } else {
        $title = __( 'Archives' );
    }
    return $title;
});

// Category Badge
if ( ! function_exists( 'gsmtc_category_badge' ) ) :
	function gsmtc_category_badge() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
            echo '<div class="category-badge mb-2">';
            $thelist = '';
			$i = 0;
            foreach( get_the_category() as $category ) {
		      if ( 0 < $i ) $thelist .= ' ';
						    $thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="badge bg-secondary">' . $category->name.'</a>';
						    $i++;
            }
            echo $thelist;	
            echo '</div>';
		}
	}
endif;
// Category Badge End

// Date
if ( ! function_exists( 'gsmtc_date' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function gsmtc_date() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			'%s',
			'<span rel="bookmark">' . $time_string . '</span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;
// Date End

// Author
if ( ! function_exists( 'gsmtc_author' ) ) :

	function gsmtc_author() {
		$byline = sprintf(
			esc_html_x( 'por %s', 'post author', 'gsmtc' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;
// Author End

// Single Comments Count
if ( ! function_exists( 'gsmtc_comment_count' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function gsmtc_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo ' | <i class="far fa-comments"></i> <span class="comments-link">';

			/* translators: %s: Name of current post. Only visible to screen readers. */
			// comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'gsmtc' ), get_the_title() ) );
			comments_popup_link( sprintf( __( 'Leave a comment', 'gsmtc' ), get_the_title() ) );


			echo '</span>';
		}
	}
endif;
// Single Comments Count End

// Tags
if ( ! function_exists( 'gsmtc_tags' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function gsmtc_tags() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {


			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', ' ' );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<div class="tags-links mt-2">' . esc_html__( 'Tagged %1$s', 'gsmtc' ) . '</div>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}
endif;
// Tags End

add_filter( "term_links-post_tag", 'add_tag_class');

function add_tag_class($links) {
    return str_replace('<a href="', '<a class="badge bg-secondary" href="', $links);
}
// Tags End




// woocommerce funtions hooks

if (! function_exists('gsmtc_before_woocommerce_main_content')){
	function gsmtc_before_woocommerce_main_content(){
		echo '<h1> Hook : before_woocommerce_main_content </h1> ';
	}
	add_action ( 'before_woocommerce_main_content', 'gsmtc_before_woocommerce_main_content');
}

if (! function_exists('gsmtc_before_shop_loop')){
	function gsmtc_before_shop_loop(){
		echo '<h1> Hook : before_shop_loop </h1> ';
	}
	add_action ( 'woocommerce_before_shop_loop', 'gsmtc_before_shop_loop');
} 
// end woocommerce funtions hooks


