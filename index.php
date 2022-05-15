<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
				<?php while ( have_posts() ) :?>

                    <header class="entry-header">
                        <?php the_post(); ?>
                        <?php gsmtc_category_badge(); ?>
                        <?php the_title('<h1>', '</h1>'); ?>
                        <p class="entry-meta">
                            <small class="text-muted">
                            <?php
						             gsmtc_date();
						             _e(' por ', 'gsmtc'); the_author_posts_link();
						             gsmtc_comment_count();							
					        ?>
                            </small>
                        </p>
                        <?php gsmtc_post_thumbnail(); ?>
                    </header>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <footer class="entry-footer clear-both">
                        <div class="mb-4">
                            <?php gsmtc_tags(); ?>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-around">
                                    <li class="page-item">
                                        <?php previous_post_link('%link'); ?>
                                    </li>
                                <li class="page-item">
                                    <?php next_post_link('%link'); ?>
                                </li>
                            </ul>
                        </nav>
                    </footer>

                <?php comments_template(); 
				endwhile; 
                endif;                  
                ?>
                
	</main><!-- #main -->
	</div> <!-- col-md-9 -->
    <div class="col-md-3">
    <?php get_sidebar(); ?>   
    </div>
	</div> <!-- row -->
	</div> <!-- #content -->
<?php
get_footer();
