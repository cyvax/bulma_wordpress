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
            <h2 class="subtitle">
                <?php the_time('d/m/Y'); ?> à <?php the_date(); ?> <?php the_time('H:m:s'); ?>
                <br>
                <?php comments_popup_link(__('Leave a Comment', 'wp_babobski'), __('1 Comment', 'wp_babobski'), __('% Comments', 'wp_babobski')); ?>
                <?php $posttags = get_the_tags(); ?>
                <br>
                <div class="tags are-medium is-justify-content-center is-align-items-center">
                    <?php if ($posttags): ?>
                        <?php foreach($posttags as $tag): ?>
                        <a href="<?php echo get_tag_link($tag); ?>"><span class="tag is-rounded"><?php echo $tag->name; ?></span></a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </h2>
        </div>
    </section>
    <section class="section wh-full" id="#Articles">
        <div class="columns">
            <div class="column">
                <?php the_content(); ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </section>
    <section class="section wh-full" id="#Articles">

    <?php
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    ?>
    </section>
    <section class="tile is-ancestor widgets_area">
        <?php dynamic_sidebar( 'widgets_area'); ?>
    </section>

<?php
get_sidebar();
get_footer();
