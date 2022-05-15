<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gesimatica
 */

get_header();
?>
<div id="content" class="container my-5 py-5">
    <div class="row">
        <div class="col-md-9">
            <main id="primary" class="site-main">
                <?php //the_breadcrumb(); ?>
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

                    <?php comments_template(); ?>

	</main><!-- #main -->
	</div> <!-- col-md-9 -->
    <div class="col-md-3">
    <?php get_sidebar(); ?>   
    </div>
	</div> <!-- row -->
	</div> <!-- #content -->
<?php
get_footer();
