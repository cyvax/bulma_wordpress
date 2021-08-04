<?php
/**
 * Bulma Theme
 */
get_header();
?>
    <section class="hero home_page" id="#Home">
        <div class="container">
            <h1 class="title">
                <?php echo get_bloginfo("name") ?>
            </h1>
            <h2 class="subtitle">
                <?php echo get_bloginfo("description") ?>
            </h2>
        </div>
    </section>

<section class="section wh-full" id="#Articles">
    <h2 class="secondary_title pb-6">Articles</h2>
    <div class="columns">
        <div class="column">
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
                        <p class="hidden_overflow"><?php echo wp_trim_words(get_the_content(), 56); ?><p>
						<p>lire la suite&#8239;<i class="fas fa-long-arrow-alt-right"></i></p>
                        <time datetime="<?php the_time( 'Y-m-d'); ?>" pubdate>
                            <?php the_time('d-m-Y'); ?> à <?php the_time('H:m:s'); ?>
                        </time>
                    </div>
                </div>
            </a>
            <?php endwhile; ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
    <section class="tile is-ancestor widgets_area">
        <?php dynamic_sidebar( 'widgets_area'); ?>
    </section>
</section>
<?php
get_sidebar();
get_footer();
