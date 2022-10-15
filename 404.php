<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package gesimatica
 */

get_header();
?>
<div id="content" class="container">
	<main id="primary" class="site-main">
		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Uups! Esta página no se ha encontrado.', 'gsmtc' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'Parece que no hay nada en esta dirección. Tal vez prueba en el buscador o en los enlaces inferiores.', 'gsmtc' ); ?></p>

					<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Categorias mas vistas', 'gsmtc' ); ?></h2>
						<ul>
							<?php
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							?>
						</ul>
					</div><!-- .widget -->

				<?php
				/* translators: %1$s: smiley */
				$gsmtc_archive_content = '<p>' . sprintf( esc_html__( 'Intenta buscarlo en los archivos mensuales. %1$s', 'gsmtc' ), convert_smilies( ':)' ) ) . '</p>';
				the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$gsmtc_archive_content" );

				the_widget( 'WP_Widget_Tag_Cloud' );
				?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->
	</main><!-- #main -->
</div><!-- #content -->
<?php
get_footer();
