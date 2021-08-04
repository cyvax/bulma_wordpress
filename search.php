<?php
/**
 * Bulma Theme
 */
get_header();
?>
    <section class="hero article_page" id="#Home">
        <div class="container">
            <h1 class="title">
                <?php if ( have_posts() ): ?>
                    Search Results for <?php echo get_search_query(); ?>
                <?php else: ?>
                    No results found for <?php echo get_search_query(); ?>
                <?php endif; ?>
            </h1>

    </div>
    </section>

    <section class="section wh-full" id="#Articles">
        <div class="columns">
            <div class="column">
                <?php if ( have_posts() ): ?>
                <?php while (have_posts()) : the_post(); ?>
                    <a class="articles__link" href="<?php esc_url(the_permalink()); ?>">
                        <div class="column is-narrow articles">
                            <?php if (has_post_thumbnail()): ?>
                                <?php echo get_the_post_thumbnail("", "", array("class" => "articles__image")); ?>
                            <?php else: ?>
                                <img src="https://placekitten.com/g/500/500" class="articles__image" alt="kitten-placeholder">
                            <?php endif; ?>
                            <div class="articles__search">
                                <h5 class="articles__title"><?php echo get_the_title(); ?></h5>
                                <p><?php the_excerpt(); ?></p>
                                <time datetime="<?php the_time( 'Y-m-d'); ?>" class="articles__time">
                                    <?php the_time('d-m-Y'); ?> à <?php the_time('H:m:s'); ?>
                                </time>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        <?php get_sidebar(); ?>
        </div>
    </section>
    <section class="tile is-ancestor widgets_area">
        <?php dynamic_sidebar( 'widgets_area'); ?>
    </section>

<?php
get_sidebar();
get_footer();
