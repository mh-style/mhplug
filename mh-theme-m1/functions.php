<?php
/*
Theme Function
*/

//Theme Support
function mhtheme_theme_support() {
    add_theme_support( 'post-thumbnails' ); // Enables support for Post Thumbnails
    add_theme_support( 'title-tag' ); // Enables support for title tag
}
add_action( 'after_setup_theme', 'mhtheme_theme_support' );


//css js query
function mhtheme_enqueue_styles() {
    wp_enqueue_style( 'mhstyle-css', get_template_directory_uri() . '/assets/css/mh-style.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'mhstyle-icon-css', get_template_directory_uri() . '/assets/css/mhstyle-icon.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style('mhtheme-style', get_stylesheet_uri());
    wp_enqueue_script( 'mhstyle-js', get_template_directory_uri() . '/assets/js/mhstyle.min.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'mhtheme_enqueue_styles' );

// Menu Registion
function mhtheme_register_nav_menu(){
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'mh-theme' ),
        'footer_menu'  => __( 'Footer Menu', 'mh-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'mhtheme_register_nav_menu', 0 );


//Custom Excerpt
function mhtheme_custom_excerpt_length( $length ) {
    return 20; // Return 20 words as the excerpt length
}
add_filter( 'excerpt_length', 'mhtheme_custom_excerpt_length', 999 );

// Widgets register
function mhtheme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'mh-theme' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here.', 'mh-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'mhtheme_widgets_init' );


//Customizer Register

// Add the customizer option for footer visibility
function mhtheme_customize_register( $wp_customize ) {
    // Add section for footer settings
    $wp_customize->add_section( 'footer_section', array(
        'title'    => __( 'Footer Settings', 'mh-theme' ),
        'priority' => 120,
    ) );

    // Add setting for footer visibility
    $wp_customize->add_setting( 'footer_visibility', array(
        'default'           => true, // Set default value to true (footer visible)
        'sanitize_callback' => 'mhtheme_sanitize_checkbox',
    ) );

    // Add control for footer visibility
    $wp_customize->add_control( 'footer_visibility', array(
        'label'    => __( 'Show Footer', 'mh-theme' ),
        'section'  => 'footer_section',
        'type'     => 'checkbox',
    ) );
}
add_action( 'customize_register', 'mhtheme_customize_register' );

// Sanitize checkbox value
function mhtheme_sanitize_checkbox( $input ) {
    return (bool) $input;
}

// Function to check if footer is visible
function is_footer_visible() {
    return get_theme_mod( 'footer_visibility', true ); // Default to true if setting not found
}


//Security Enhancements
function mhtheme_remove_wp_version() {
    return '';
}
add_filter( 'the_generator', 'mhtheme_remove_wp_version' );

//Register Meta Field
function mhtheme_add_custom_meta_box() {
    add_meta_box(
        'mhtheme_page_title_meta_box',
        __('Page Title Display Options', 'mh-theme'),
        'mhtheme_render_page_title_meta_box',
        'page',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'mhtheme_add_custom_meta_box');

function mhtheme_render_page_title_meta_box($post) {
    // Use nonce for verification
    wp_nonce_field('mhtheme_toggle_page_title_nonce_action', 'mhtheme_toggle_page_title_nonce');

    // Retrieve the current value
    $hide_page_title = get_post_meta($post->ID, '_hide_page_title', true);

    ?>
    <p>
        <label for="mhtheme_hide_page_title">
            <input type="checkbox" name="mhtheme_hide_page_title" id="mhtheme_hide_page_title" <?php checked($hide_page_title, 'on'); ?> />
            <?php _e('Hide the page title', 'mh-theme'); ?>
        </label>
    </p>
    <?php
}

function mhtheme_save_page_title_meta_box($post_id) {
    // Check nonce
    if (!isset($_POST['mhtheme_toggle_page_title_nonce']) || !wp_verify_nonce($_POST['mhtheme_toggle_page_title_nonce'], 'mhtheme_toggle_page_title_nonce_action')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check user permissions
    if (isset($_POST['post_type']) && 'page' == $_POST['post_type'] && !current_user_can('edit_page', $post_id)) {
        return;
    }

    // Update the meta field
    if (isset($_POST['mhtheme_hide_page_title'])) {
        update_post_meta($post_id, '_hide_page_title', 'on');
    } else {
        delete_post_meta($post_id, '_hide_page_title');
    }
}
add_action('save_post', 'mhtheme_save_page_title_meta_box');
