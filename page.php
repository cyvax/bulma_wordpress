<?php
/**
 * Bulma Theme
 */
get_header();
?>
    <section class="hero article_page" id="#Home">
        <div class="container">
            <h1 class="title">
                <?php the_title() ?>
            </h1>
        </div>
    </section>

    <section class="section" id="#Articles">
        <div class="columns">
            <div class="column">
                <?php the_content(); ?>
                <?php comments_template( '', true ); ?>
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
