<?php
/*
 * Bulma Theme functions and definitions
 */
if (!function_exists('bulma_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function bulma_setup() {
        /*
         * Make theme available for translation.
         */
        load_theme_textdomain( 'bulma', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        register_nav_menus(
            array(
                'menu-1' => esc_html__( 'Primary', 'bulma' ),
            )
        );
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        add_theme_support(
            'custom-background',
            apply_filters(
                'bulma_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        add_theme_support( 'custom-header', apply_filters( 'bulma_custom_header_args', array(
            'default-image'      => '',
            'default-text-color' => '000000',
            'width'              => 1900,
            'height'             => 450,
            'flex-height'        => true,
            'header-text'        => false,
        ) ) );

        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'responsive-embeds' );
    }
endif;
add_action( 'after_setup_theme', 'bulma_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bulma_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'bulma_content_width', 640 );
}

add_action( 'after_setup_theme', 'bulma_content_width', 0 );

function bulma_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Blog Sidebar', 'bulma' ),
            'id'            => 'widgets_area',
            'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'bulma' ),
            'before_widget' => '<section class="tile is-parent"><section id="%1$s" class="tile is-child bulma__widget %2$s">',
            'after_widget'  => '</section></section>',
            'before_title'  => '<h2 class="tile-title widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Blog side info', 'bulma' ),
            'id'            => 'side__info__widgets',
            'description'   => esc_html__( 'Add widgets here to appear in the side_info.', 'bulma' ),
            'before_widget' => '<hr class="light_hr"><section id="%1$s" class="%2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-tile-subtitle">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Blog footer widgets', 'bulma' ),
            'id'            => 'footer__widgets',
            'description'   => esc_html__( 'Add widgets here to appear in the footer.', 'bulma' ),
            'before_widget' => '<section id="%1$s" class="%2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-tile-subtitle">',
            'after_title'   => '</h3>',
        )
    );
}

add_action( 'widgets_init', 'bulma_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bulma_scripts() {
    $debug = defined('WP_DEBUG') ? date_timestamp_get(date_create()) : '';
    $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    wp_enqueue_style('bulma', get_template_directory_uri() . '/third_party/bulma/bulma' . $min . '.css', '', '0.9.3');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/third_party/fontawesome/css/all' . $min . '.css', '', '5.15.3');
    wp_enqueue_style('nunito', 'https://fonts.googleapis.com/css?family=Nunito:400,700', '', '1.0.0');
    wp_enqueue_style('jost', 'https://fonts.googleapis.com/css?family=Jost:400,500,700', '', '1.0.0');
    wp_enqueue_style('bulma-style', get_stylesheet_uri(), array(), '1.0.0' );
    wp_enqueue_style('bulma-custom', get_template_directory_uri() . '/css/custom' . $min . '.css', array('bulma-style'),$debug . '1.0.0');
    wp_enqueue_script('bulma-ts_particles', get_template_directory_uri() . '/js/ts_particles/ts_particles' . $min . '.js', array(), '1.0.4', true);
    wp_enqueue_script('bulma-ts_options', get_template_directory_uri() . '/js/ts_particles/ts_settings' . $min . '.js', array(), '1.0.4', true);
    wp_enqueue_script('bulma-navigation', get_template_directory_uri() . '/js/navigation' . $min . '.js', array(), '20151215', true);
    wp_enqueue_script('bulma-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix' . $min . '.js', array(), '20151215', true);
    wp_enqueue_script('bulma-custom', get_template_directory_uri() . '/js/custom' . $min . '.js', array( 'jquery' ), '1.0.4', true);
    wp_enqueue_script('bulma-custom', get_template_directory_uri() . '/js/custom' . $min . '.js', array( 'jquery' ), '1.0.4', true);

    if (is_singular() && comments_open() && get_option('thread_comments') ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'bulma_scripts' );
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Nav Walker.
 */
require get_template_directory() . '/lib/navwalker/navwalker.php';
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'primary' ),
) );

/**
 * Load helpers.
 */
require get_template_directory() . '/inc/helpers.php';

function get_custom_logo_url()
{
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    return $image[0];
}
function add_search_bar($items, $args)
{
    if( $args->theme_location == 'primary')  {
        $items .= '<div class="navbar-end navbar-search">';
        $items .= get_search_form(array('echo' => false));
        $items .= '</div>';
    }
    return $items;
}

add_filter('wp_nav_menu_items','add_search_bar', 10, 2);

/**
 * Create Logo Setting and Upload Control
 */
function your_theme_new_customizer_settings($wp_customize) {
    // add a setting for the site logo
    $wp_customize->add_setting('bulma_theme_author');
    $wp_customize->add_setting('bulma_theme_author_first_name');
    $wp_customize->add_setting('bulma_theme_author_last_name');
    $wp_customize->add_setting('bulma_theme_author_description');
    // Add a control to upload the logo
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'bulma_theme_author',
            array(
                'label' => 'Author',
                'section' => 'title_tagline',
                'settings' => 'bulma_theme_author',
            )));
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'bulma_theme_author_first_name',
            array(
                'label' => 'Author First Name',
                'section' => 'title_tagline',
                'settings' => 'bulma_theme_author_first_name',
            )));
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'bulma_theme_author_last_name',
            array(
                'label' => 'Author Last Name',
                'section' => 'title_tagline',
                'settings' => 'bulma_theme_author_last_name',
            )));
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'bulma_theme_author_description',
            array(
                'label' => 'Author Description',
                'section' => 'title_tagline',
                'settings' => 'bulma_theme_author_description',
            )));
}

add_action('customize_register', 'your_theme_new_customizer_settings');

function br() {
    echo '<br>';
}

add_shortcode('br', 'br');

function display_all_posts() {
    $args = array(
        'post_type'=> 'post',
        'orderby'    => 'ID',
        'post_status' => 'publish',
        'order'    => 'DESC',
        'posts_per_page' => -1 // this will retrive all the post that is published
    );
    $result = new WP_Query($args);
    if ($result-> have_posts()) {
        while ($result->have_posts()) {
            $result->the_post();
            echo '<a class="articles__link" href="';
            echo esc_url(the_permalink());
            echo '">
                <div class="column is-narrow articles">';
            if (has_post_thumbnail()) {
                echo get_the_post_thumbnail("", "", array("class" => "articles__image"));
            } else {
                echo '<img src="https://placekitten.com/g/500/500" class="articles__image" alt="kitten-placeholder">';
            }
            echo '
                    <div class="articles__search">
                        <h5 class="articles__title">' . get_the_title() . '</h5>
                        <p>' . get_the_excerpt() . '</p>
                        <time datetime="' . get_the_time( 'Y-m-d') . '" class="articles__time">
                            ' .  get_the_time('d-m-Y') . ' à ' . get_the_time('H:m:s') . '
                        </time>
                    </div>
                </div>
            </a>';
            wp_reset_postdata();
        }
    }
}

add_shortcode('all_posts', 'display_all_posts');