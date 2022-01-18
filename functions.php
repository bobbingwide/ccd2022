<?php
/**
 * ccd2022 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage ccd2022
 * @since ccd2022 1.0
 */


if ( ! function_exists( 'ccd2022_support' ) ) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * @since ccd2022 1.0
     *
     * @return void
     */
    function ccd2022_support() {

        // Add support for block styles.
        add_theme_support( 'wp-block-styles' );

        // Enqueue editor styles.
        add_editor_style( 'style.css' );

    }

endif;

add_action( 'after_setup_theme', 'ccd2022_support' );

if ( ! function_exists( 'ccd2022_styles' ) ) :

    /**
     * Enqueue styles.
     *
     * @since ccd2022 1.0
     *
     * @return void
     */
    function ccd2022_styles() {
        // Register theme stylesheet.
        $theme_version = wp_get_theme()->get( 'Version' );

        $version_string = is_string( $theme_version ) ? $theme_version : false;
        wp_register_style(
            'ccd2022-style',
            get_template_directory_uri() . '/style.css',
            array(),
            $version_string
        );

        // Add styles inline.
        //wp_add_inline_style( 'ccd2022-style', ccd2022_get_font_face_styles() );

        // Enqueue theme stylesheet.
        wp_enqueue_style( 'ccd2022-style' );

    }

endif;

add_action( 'wp_enqueue_scripts', 'ccd2022_styles' );

if ( ! function_exists( 'ccd2022_editor_styles' ) ) :

    /**
     * Enqueue editor styles.
     *
     * @since ccd2022 1.0
     *
     * @return void
     */
    function ccd2022_editor_styles() {

        // Add styles inline.
        wp_add_inline_style( 'wp-block-library', ccd2022_get_font_face_styles() );

    }

endif;

add_action( 'admin_init', 'ccd2022_editor_styles' );


if ( ! function_exists( 'ccd2022_get_font_face_styles' ) ) :

    /**
     * Get font face styles.
     * Called by functions ccd2022_styles() and ccd2022_editor_styles() above.
     *
     * @since ccd2022 1.0
     *
     * @return string
     */
    function ccd2022_get_font_face_styles() {

        return "
		@font-face{
			font-family: 'Source Serif Pro';
			font-weight: 200 900;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Roman.ttf.woff2' ) . "') format('woff2');
		}

		@font-face{
			font-family: 'Source Serif Pro';
			font-weight: 200 900;
			font-style: italic;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Italic.ttf.woff2' ) . "') format('woff2');
		}
		";

    }

endif;

if ( ! function_exists( 'ccd2022_preload_webfonts' ) ) :

    /**
     * Preloads the main web font to improve performance.
     *
     * Only the main web font (font-style: normal) is preloaded here since that font is always relevant (it is used
     * on every heading, for example). The other font is only needed if there is any applicable content in italic style,
     * and therefore preloading it would in most cases regress performance when that font would otherwise not be loaded
     * at all.
     *
     * @since ccd2022 1.0
     *
     * @return void
     */
    function ccd2022_preload_webfonts() {
        ?>
        <link rel="preload" href="<?php echo esc_url( get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Roman.ttf.woff2' ) ); ?>" as="font" type="font/woff2" crossorigin>
        <?php
    }

endif;

add_action( 'wp_head', 'ccd2022_preload_webfonts' );

// Add block patterns
//require get_template_directory() . '/inc/block-patterns.php';

