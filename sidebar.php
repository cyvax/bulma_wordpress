<section class="column is-narrow">
    <section class="tile is-vertical side_info">
        <?php
        $author_id = get_post_field( 'post_author', get_the_ID());
        $author = get_user_meta($author_id);
        if ($author) {
            $theme_author = get_avatar_url($author_id);
            $theme_author_firstname = $author['first_name'][0];
            $theme_author_lastname = $author['last_name'][0];
            $theme_author_description = $author['description'][0];
        } else {
            $theme_author = get_theme_mod( 'bulma_theme_author');
            $theme_author_firstname = get_theme_mod('bulma_theme_author_first_name');
            $theme_author_lastname = get_theme_mod('bulma_theme_author_last_name');
            $theme_author_description = get_theme_mod('bulma_theme_author_description');
        }
        if ($theme_author && $theme_author_firstname && $theme_author_lastname):
            ?>
            <section class="author_div">
            <h3 class="tile-subtitle">A Propos de l'auteur</h3>
                <img src="<?php echo $theme_author ;?>" alt="author's avatar" class="author_avatar">
                <h4 class="author_name"><?php echo $theme_author_firstname; ?> <?php echo $theme_author_lastname; ?></h4>
                <p><?php echo $theme_author_description; ?></p>
            </section>
        <?php endif; ?>
        <?php dynamic_sidebar( 'side__info__widgets'); ?>
    </section>
</section>
