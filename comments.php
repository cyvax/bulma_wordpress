<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bulma
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}

// You can start editing here -- including this comment!
?>
<div id="comments" class="comments-area">
<?php
if ( have_comments() ) :?>
    <h2 class="secondary_title pb-6">Comments</h2>
    <?php the_comments_navigation(); ?>
        <div class="comments_area">
            <?php foreach (get_comments() as $comment): ?>
                <div class="comment">
                    <img src="<?php echo get_avatar_url($comment->comment_author_email);?>" alt="<?php echo $comment->comment_author; ?>'s avatar" class="comment__avatar">
                    <div class="comment__content">
                        <h5><?php echo $comment->comment_author; ?></h5>
                        <p><?php echo $comment->comment_content ?></p>
                        <time datetime="<?php comment_time( 'Y-m-d' ); ?>" pubdate class="comment__time">
                            <?php comment_time('d-m-Y'); ?> à <?php comment_time('H:m:s'); ?>
                        </time>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open()) :
            ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bulma' ); ?></p>
        <?php
        endif;
    endif; // Check for have_comments().

    comment_form();
    ?>

</div><!-- #comments -->
