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
<div id="content" class="site-content container">
    <div id="primary" class="content-area">
        
    <!-- Hook to add something usefull or necesary -->
    <?php do_action('gsmtc_after_primary'); ?>  

        <main id="primary" class="site-main">

            <!-- Header -->
            <div class="text-center">
                <h1 class="display-1"><?php bloginfo('name'); ?></h1>
                <p class="lead"><?php bloginfo('description'); ?></p>
            </div>

            <!-- Sticky Post -->
            <?php if (is_sticky() && is_home() && !is_paged()) : ?>
            <div class="row">
                <div class="col">
                    <?php
					$args = array(
					    'posts_per_page' => 2,
					    'post__in'  => get_option( 'sticky_posts' ),
					    'ignore_sticky_posts' => 2
					);
					$the_query = new WP_Query( $args );
					 if ( $the_query->have_posts() ) : 
					 while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="card horizontal mb-4">
                            <div class="row">
                                <!-- Featured Image-->
                                <?php if (has_post_thumbnail() )
								echo '<div class="card-img-left col-md-6 col-lg-4">' . get_the_post_thumbnail(null, 'medium') . '</div>';
								?>
                                <div class="col">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-10">
                                                <?php gsmtc_category_badge(); ?>
                                            </div>
                                            <div class="col-2 text-end">
                                                <!-- Featured -->
                                                <div class="badge bg-danger"><i class="bi bi-star-fill"></i></div>
                                            </div>
                                        </div>
                                        <!-- Title -->
                                        <h2 class="blog-post-title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                        <!-- Meta -->
                                        <?php if ( 'post' === get_post_type() ) : ?>
                                        <small class="text-secondary mb-2">
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
                            </div>
                    </article>
                    <?php 
					endwhile; 
					endif;  
					 wp_reset_postdata();
					  ?>
                </div>
                <!-- col -->
            </div>
            <!-- row -->
            <?php endif; ?>
            <!-- Post List -->
            <div class="row">
                <div class="col">
                    <!-- Grid Layout -->
                    <?php if (have_posts() ) : ?>
                    <?php while (have_posts() ) : the_post(); ?>
                    <?php if(is_sticky()) continue; //ignore sticy posts?>
                    <div class="card horizontal mb-4">
                        <div class="row">
                            <!-- Featured Image-->
                            <?php if (has_post_thumbnail() )
							echo '<div class="card-img-left-md col-lg-5">' . get_the_post_thumbnail(null, 'medium') . '</div>';
							?>
                            <div class="col">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <?php gsmtc_category_badge(); ?>
                                    </div>
                                    <!-- Title -->
                                    <h2 class="blog-post-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <!-- Meta -->
                                    <?php if ( 'post' === get_post_type() ) : ?>
                                    <small class="text-secondary mb-2">
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
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
    
                    <!-- Pagination -->
                    <div>
                        <?php gsmtc_pagination(); ?>
                    </div>
                    
                </div>
                <!-- col -->
                <?php get_sidebar(); ?>
            </div>
            <!-- row -->
        </main><!-- #main -->

    </div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
    
