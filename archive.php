<?php
/**
 * The template for displaying archive pages
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
		<div class="col">
			<main id="main" class="site-main">

            <!-- Title & Description -->
			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header>

            <!-- Grid Layout -->
			<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="card horizontal mb-4">
				<div class="row">
					<!-- Featured Image-->
					<?php if (has_post_thumbnail())
						echo '<div class="card-img-left-md col-lg-5">' . get_the_post_thumbnail(null, 'medium') . '</div>';
					?>
					<div class="col">
						<div class="card-body">
							<?php gsmtc_category_badge(); ?>
                             <!-- Title -->
                            <h2 class="blog-post-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
							<?php if ( 'post' === get_post_type() ) : ?>
							<!-- Meta -->
                            <small class="text-muted mb-2">
                            <?php
								gsmtc_date();
								gsmtc_author();
								gsmtc_comments();
								gsmtc_edit();
							?>
                            </small>
                            <?php endif; ?>
                            <!-- Excerpt & Read more -->
                            <div class="card-text mt-auto">
                                <?php the_excerpt(); ?> <a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Read more »', 'gsmtc'); ?></a>
                        	</div>
                            <!-- Tags -->
                            <?php gsmtc_tags(); ?>
						</div>
					</div>
				</div><!-- row -->
			</div><!-- card -->
			<?php endwhile; ?>

            <!-- Pagination -->
			<div>
				<?php gsmtc_pagination(); ?>
			</div> 

			<?php else : 

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

			</main><!-- #main -->
		</div><!-- col -->
		<?php get_sidebar(); ?>
	</div><!-- row -->
	</div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
