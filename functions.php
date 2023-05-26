<?php

// Add Scripts and Stylesheets
function startwordpress_scripts() {
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6' );
    wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
}

add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );

// Add Google Fonts
function startwordpress_google_fonts() {
    wp_register_style( 'OpenSans', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' );
    wp_enqueue_style( 'OpenSans' );
}

add_action( 'wp_print_styles', 'startwordpress_google_fonts' );

// Add Chart.js
function chart_scripts() {
    wp_enqueue_script( 'chart-js', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js', array(), true );
}
add_action( 'wp_enqueue_scripts', 'chart_scripts');

// WordPress Titles
function startwordpress_wp_title( $title, $sep ) {
    global $paged, $page;
	
    if ( is_feed() ) {
        return $title;
    }
	
    // Add the site name.
    $title .= get_bloginfo( 'name' );
	
    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title = "$title $sep $site_description";
    }
    return $title;
} 

add_filter( 'wp_title', 'startwordpress_wp_title', 10, 2 );

// Custom settings
function custom_settings_add_menu() {
    add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99);
}

add_action( 'admin_menu', 'custom_settings_add_menu' );

// Create Custom Global Settings
function custom_settings_page() { ?>
    <div class="wrap">
        <h1>Custom Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('section');
            do_settings_sections('theme-options');      
            submit_button(); 
            ?>
        </form>
    </div>
<?php }

// Twitter
function setting_twitter() { ?>
    <input type="text" name="twitter" id="twitter" value="<?php echo get_option('twitter'); ?>" />
<?php }

function setting_github() { ?>
    <input type="text" name="github" id="github" value="<?php echo get_option('github'); ?>" />
<?php }

function setting_facebook() { ?>
    <input type="text" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>" />
<?php }

function custom_settings_page_setup() {
    add_settings_section( 'section', 'All Settings', null, 'theme-options' );
    add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
    add_settings_field( 'github', 'GitHub URL', 'setting_github', 'theme-options', 'section' );
    add_settings_field( 'facebook', 'Facebook URL', 'setting_facebook', 'theme-options', 'section' );
  
    register_setting( 'section', 'twitter' );
    register_setting( 'section', 'github' );
    register_setting( 'section', 'facebook' );
}

add_action( 'admin_init', 'custom_settings_page_setup' );

// Support Featured Images
add_theme_support( 'post-thumbnails' );

// Create Events Post
function create_events_post() {
    register_post_type('events',
        array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Events' ),		
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array(
                'with_front' => false,
                'hierarchical' => true,
                'slug' => 'events'),
            'supports' => array(
                'title',		
                'thumbnail',
			    'custom-fields'
			)
	));
}

// Create Content Post
function create_content_post() {
    register_post_type('content',
        array(
            'labels' => array(
                'name' => __( 'Content' ),
                'singular_name' => __( 'Content' ),
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array(
                'with_front' => false,
                'slug' => 'content'
			),
            'supports' => array(
                'title',	
                'thumbnail',
                'custom-fields'
            )
    ));
}

// Create Organisation Post
function create_organisations_post() {
    register_post_type('organisations',
        array(
            'labels' => array(
                'name' => __( 'Organisations' ),
                'singular_name' => __( 'Organisations' ),	
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array(
                'with_front' => false,
                'slug' => 'organisations'
            ),
            'supports' => array(
            'title',		
            'thumbnail',
            'custom-fields'
            )
    ));
}

add_filter( 'post_type_link', 'custom_event_permalink', 1, 3 );

// Create Event Permalink
function custom_event_permalink( $post_link, $id = 0, $leavename ) {
    if ( strpos( '%post_id%', $post_link ) === 'FALSE' ) {
        return $post_link;
    }
    $post = &get_post( $id );
    if ( is_wp_error( $post ) || $post->post_type != 'events' ) {
        return $post_link;
    }
    return str_replace( '%post_id%', $post->ID, $post_link );
}

add_filter( 'post_type_link', 'custom_content_permalink', 1, 3 );

// Create Content Permalink
function custom_content_permalink( $post_link, $id = 0, $leavename ) {
    if ( strpos( '%post_id%', $post_link ) === 'FALSE' ) {
        return $post_link;
    }
    $post = &get_post( $id );
    if ( is_wp_error( $post ) || $post->post_type != 'content' ) {
        return $post_link;
    }
    return str_replace( '%post_id%', $post->ID, $post_link );
}

add_filter( 'post_type_link', 'custom_organisation_permalink', 1, 3 );

// Create Organisation Permalink
function custom_organisation_permalink( $post_link, $id = 0, $leavename ) {
    if ( strpos( '%post_id%', $post_link) === 'FALSE' ) {
        return $post_link;
    }
    $post = &get_post( $id );
    if ( is_wp_error( $post ) || $post->post_type != 'organisations' ) {
        return $post_link;
    }
    return str_replace( '%post_id%', $post->ID, $post_link );
}

// Action Initialisation
add_action('add_results_button','parse_results');
add_action('admin_head', 'add_results_button');
add_action('init', 'create_organisations_post');
add_action('init', 'create_events_post'); 
add_action('init', 'create_content_post'); 
