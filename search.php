<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package gesimatica
 */

get_header();
?>
<div id="content" class="container my-5 py-5">
	<div class="row">
		<div class="col-md-9">
			<main id="primary" class="site-main">

			<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Resultados de busqueda para: %s', 'gsmtc' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
		</div> <!-- col-md-9 -->
		<div class="col md-3">
			<?php get_sidebar(); ?>
		</div> <!-- col-md-3-->
	</div> <!-- row -->
</div> <!-- #content -->
<?php
get_sidebar();
get_footer();
