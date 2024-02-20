<?php
/*
Plugin Name: MHPlug
Plugin URI: http://mhstyle.net/mhplug
Description: A custom plugin with a top-level menu in the admin dashboard.
Version: 1.0
Author: MH-Style
Author URI: http://mhstyle.net
*/

// Hook for adding admin menu
add_action('admin_menu', 'mhplug_setup_menu');

// Function for adding menu
function mhplug_setup_menu(){
    add_menu_page( 
        'MHPlug Page', // Page title
        'MHPlug', // Menu title
        'manage_options', // Capability
        'mhplug', // Menu slug
        'mhplug_init', // Function to display the page content
        'dashicons-admin-generic', // Icon URL
        20 // Position
    );
}

// Function to display the page content
function mhplug_init(){?>
    <div class="wrap">
        <h1>Welcome to MHPlug</h1>
        <p>This is your custom plugin page content.</p>
    </div>
    <?php
}
// Check if Elementor installed and activated
if ( did_action( 'elementor/loaded' ) ) {
    add_action( 'elementor/widgets/widgets_registered', 'register_custom_widgets' );
} else {
    add_action( 'admin_notices', 'show_elementor_not_loaded_notice' );
}

function register_custom_widgets() {
    require_once __DIR__ . '/elementor/widgets/class-mhplug-header-widget.php';

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \MHPlug_Header_Widget() );
}

// Show admin notice if Elementor is not activated
function show_elementor_not_loaded_notice() {
    if ( current_user_can( 'activate_plugins' ) ) {
        echo '<div class="error"><p>';
        echo esc_html__( 'MHPlug requires Elementor to be installed and activated.', 'mhplug-domain' );
        echo '</p></div>';
    }
}
add_action( 'elementor/init', function() {
    \Elementor\Plugin::$instance->elements_manager->add_category(
        'mhplug-category',
        [
            'title' => __( 'MHPlug', 'mhplug-domain' ),
            'icon' => 'fa fa-plug', // Make sure you use a valid icon class here or leave it empty
        ],
        1 // Position
    );
});
