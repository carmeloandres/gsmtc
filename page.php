<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gesimatica
 */

get_header();
?>
<div id="content" class="container">
	<div id="primary" class="content-area">

    <!-- Hook to add something usefull or necesary -->
    <?php do_action('gsmtc_after_primary'); ?>  

	<div class="row">

        <?php  if ( is_active_sidebar( 'sidebar-1' ) ) {  ?>
                    <div class="col-md-8 col-xxl-9">
        <?php } else { ?>
            <div class="col">
        <?php } ?>

                <main id="main" class="site-main">

                    <header class="entry-header">
                        <?php the_post(); ?>
                        <!-- Title -->
                        <?php the_title('<h1>', '</h1>'); ?>
                        <!-- Featured Image-->
                        <?php gsmtc_post_thumbnail(); ?>
                        <!-- .entry-header -->
                    </header>

                    <div class="entry-content">
                        <!-- Content -->
                        <?php the_content(); ?>
                        <!-- .entry-content -->
                        <?php wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gsmtc' ),
					'after'  => '</div>',
					) );
					?>
                    </div>

                    <footer class="entry-footer">

                    </footer>
                    <!-- Comments -->
                    <?php comments_template(); ?>

                </main><!-- #main -->

            </div><!-- col -->

            <?php  if ( is_active_sidebar( 'sidebar-1' ) ) {
                        get_sidebar(); 
            }?>

        </div><!-- row -->

    </div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
