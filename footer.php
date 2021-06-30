<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bulma
 */

?>
            </div><!-- .columns -->
        </div><!-- .container -->
    </div><!-- #content -->

    <footer id="colophon" class="site-footer footer">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <?php esc_html_e( 'Copyright &copy; All rights reserved.', 'bulma' ); ?>
                </div><!-- .column -->
                <div class="column">
                    <div class="site-info is-pulled-right">
                        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bulma' ) ); ?>">
                            <?php
                            printf( esc_html__( 'Proudly powered by %s', 'bulma' ), 'WordPress' );
                            ?>
                        </a>
                        <div class="footer_widgets">
                            <?php dynamic_sidebar( 'footer__widgets'); ?>
                        </div>
                    </div><!-- .site-info -->
                </div><!-- .column -->
            </div><!-- .columns -->
        </div><!-- .container -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
