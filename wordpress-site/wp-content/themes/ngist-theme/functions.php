<?php
/**
 * NGIST Theme Functions
 * 
 * @package NGIST_Theme
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function ngist_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'ngist-theme'),
        'footer'  => __('Footer Menu', 'ngist-theme'),
        'mobile'  => __('Mobile Menu', 'ngist-theme')
    ));
    
    // Add custom image sizes
    add_image_size('hero-image', 1920, 1080, true);
    add_image_size('card-image', 400, 300, true);
    add_image_size('program-image', 600, 400, true);
    add_image_size('news-thumbnail', 300, 200, true);
    add_image_size('faculty-photo', 250, 250, true);
}
add_action('after_setup_theme', 'ngist_theme_setup');

/**
 * Enqueue Scripts and Styles
 */
function ngist_enqueue_scripts() {
    // Theme stylesheet
    wp_enqueue_style('ngist-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap', 
        array(), null
    );
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', 
        array(), '6.4.0'
    );
    
    // AOS Animation Library
    wp_enqueue_style('aos-css', 
        'https://unpkg.com/aos@2.3.1/dist/aos.css', 
        array(), '2.3.1'
    );
    wp_enqueue_script('aos-js', 
        'https://unpkg.com/aos@2.3.1/dist/aos.js', 
        array(), '2.3.1', true
    );
    
    // Anime.js for animations
    wp_enqueue_script('anime-js', 
        'https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js', 
        array(), '3.2.1', true
    );
    
    // Splide Carousel
    wp_enqueue_style('splide-css', 
        'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css', 
        array(), '4.1.4'
    );
    wp_enqueue_script('splide-js', 
        'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', 
        array(), '4.1.4', true
    );
    
    // Custom theme JavaScript
    wp_enqueue_script('ngist-scripts', 
        get_template_directory_uri() . '/assets/js/theme.js', 
        array('jquery', 'aos-js', 'anime-js', 'splide-js'), '1.0.0', true
    );
    
    // Localize script for AJAX
    wp_localize_script('ngist-scripts', 'ngist_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('ngist_nonce')
    ));
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'ngist_enqueue_scripts');

/**
 * Register Widget Areas
 */
function ngist_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'ngist-theme'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'ngist-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 1', 'ngist-theme'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here.', 'ngist-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 2', 'ngist-theme'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here.', 'ngist-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 3', 'ngist-theme'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here.', 'ngist-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'ngist_widgets_init');

/**
 * Custom Post Types
 */
function ngist_register_post_types() {
    // Programs Post Type
    register_post_type('program', array(
        'labels' => array(
            'name'               => __('Programs', 'ngist-theme'),
            'singular_name'      => __('Program', 'ngist-theme'),
            'menu_name'          => __('Programs', 'ngist-theme'),
            'add_new'            => __('Add New Program', 'ngist-theme'),
            'add_new_item'       => __('Add New Program', 'ngist-theme'),
            'edit_item'          => __('Edit Program', 'ngist-theme'),
            'new_item'           => __('New Program', 'ngist-theme'),
            'view_item'          => __('View Program', 'ngist-theme'),
            'search_items'       => __('Search Programs', 'ngist-theme'),
            'not_found'          => __('No programs found', 'ngist-theme'),
            'not_found_in_trash' => __('No programs found in trash', 'ngist-theme'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array('slug' => 'programs'),
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'    => 'dashicons-book-alt',
        'show_in_rest' => true,
    ));
    
    // Faculty Post Type
    register_post_type('faculty', array(
        'labels' => array(
            'name'               => __('Faculty', 'ngist-theme'),
            'singular_name'      => __('Faculty Member', 'ngist-theme'),
            'menu_name'          => __('Faculty', 'ngist-theme'),
            'add_new'            => __('Add New Faculty', 'ngist-theme'),
            'add_new_item'       => __('Add New Faculty Member', 'ngist-theme'),
            'edit_item'          => __('Edit Faculty Member', 'ngist-theme'),
            'new_item'           => __('New Faculty Member', 'ngist-theme'),
            'view_item'          => __('View Faculty Member', 'ngist-theme'),
            'search_items'       => __('Search Faculty', 'ngist-theme'),
            'not_found'          => __('No faculty found', 'ngist-theme'),
            'not_found_in_trash' => __('No faculty found in trash', 'ngist-theme'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array('slug' => 'faculty'),
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'    => 'dashicons-groups',
        'show_in_rest' => true,
    ));
    
    // Events Post Type
    register_post_type('event', array(
        'labels' => array(
            'name'               => __('Events', 'ngist-theme'),
            'singular_name'      => __('Event', 'ngist-theme'),
            'menu_name'          => __('Events', 'ngist-theme'),
            'add_new'            => __('Add New Event', 'ngist-theme'),
            'add_new_item'       => __('Add New Event', 'ngist-theme'),
            'edit_item'          => __('Edit Event', 'ngist-theme'),
            'new_item'           => __('New Event', 'ngist-theme'),
            'view_item'          => __('View Event', 'ngist-theme'),
            'search_items'       => __('Search Events', 'ngist-theme'),
            'not_found'          => __('No events found', 'ngist-theme'),
            'not_found_in_trash' => __('No events found in trash', 'ngist-theme'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array('slug' => 'events'),
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'    => 'dashicons-calendar-alt',
        'show_in_rest' => true,
    ));
    
    // Research Publications Post Type
    register_post_type('publication', array(
        'labels' => array(
            'name'               => __('Publications', 'ngist-theme'),
            'singular_name'      => __('Publication', 'ngist-theme'),
            'menu_name'          => __('Publications', 'ngist-theme'),
            'add_new'            => __('Add New Publication', 'ngist-theme'),
            'add_new_item'       => __('Add New Publication', 'ngist-theme'),
            'edit_item'          => __('Edit Publication', 'ngist-theme'),
            'new_item'           => __('New Publication', 'ngist-theme'),
            'view_item'          => __('View Publication', 'ngist-theme'),
            'search_items'       => __('Search Publications', 'ngist-theme'),
            'not_found'          => __('No publications found', 'ngist-theme'),
            'not_found_in_trash' => __('No publications found in trash', 'ngist-theme'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array('slug' => 'publications'),
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'    => 'dashicons-media-document',
        'show_in_rest' => true,
    ));
}
add_action('init', 'ngist_register_post_types');

/**
 * Custom Taxonomies
 */
function ngist_register_taxonomies() {
    // Program Categories
    register_taxonomy('program_category', 'program', array(
        'labels' => array(
            'name'              => __('Program Categories', 'ngist-theme'),
            'singular_name'     => __('Program Category', 'ngist-theme'),
            'search_items'      => __('Search Program Categories', 'ngist-theme'),
            'all_items'         => __('All Program Categories', 'ngist-theme'),
            'edit_item'         => __('Edit Program Category', 'ngist-theme'),
            'update_item'       => __('Update Program Category', 'ngist-theme'),
            'add_new_item'      => __('Add New Program Category', 'ngist-theme'),
            'new_item_name'     => __('New Program Category Name', 'ngist-theme'),
            'menu_name'         => __('Categories', 'ngist-theme'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'program-category'),
        'show_in_rest'      => true,
    ));
    
    // Faculty Departments
    register_taxonomy('department', 'faculty', array(
        'labels' => array(
            'name'              => __('Departments', 'ngist-theme'),
            'singular_name'     => __('Department', 'ngist-theme'),
            'search_items'      => __('Search Departments', 'ngist-theme'),
            'all_items'         => __('All Departments', 'ngist-theme'),
            'edit_item'         => __('Edit Department', 'ngist-theme'),
            'update_item'       => __('Update Department', 'ngist-theme'),
            'add_new_item'      => __('Add New Department', 'ngist-theme'),
            'new_item_name'     => __('New Department Name', 'ngist-theme'),
            'menu_name'         => __('Departments', 'ngist-theme'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'department'),
        'show_in_rest'      => true,
    ));
    
    // Event Categories
    register_taxonomy('event_category', 'event', array(
        'labels' => array(
            'name'              => __('Event Categories', 'ngist-theme'),
            'singular_name'     => __('Event Category', 'ngist-theme'),
            'search_items'      => __('Search Event Categories', 'ngist-theme'),
            'all_items'         => __('All Event Categories', 'ngist-theme'),
            'edit_item'         => __('Edit Event Category', 'ngist-theme'),
            'update_item'       => __('Update Event Category', 'ngist-theme'),
            'add_new_item'      => __('Add New Event Category', 'ngist-theme'),
            'new_item_name'     => __('New Event Category Name', 'ngist-theme'),
            'menu_name'         => __('Categories', 'ngist-theme'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'event-category'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'ngist_register_taxonomies');

/**
 * Custom Meta Boxes
 */
function ngist_add_meta_boxes() {
    // Program Details Meta Box
    add_meta_box(
        'program_details',
        __('Program Details', 'ngist-theme'),
        'ngist_program_details_callback',
        'program',
        'normal',
        'high'
    );
    
    // Faculty Details Meta Box
    add_meta_box(
        'faculty_details',
        __('Faculty Details', 'ngist-theme'),
        'ngist_faculty_details_callback',
        'faculty',
        'normal',
        'high'
    );
    
    // Event Details Meta Box
    add_meta_box(
        'event_details',
        __('Event Details', 'ngist-theme'),
        'ngist_event_details_callback',
        'event',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'ngist_add_meta_boxes');

/**
 * Program Details Meta Box Callback
 */
function ngist_program_details_callback($post) {
    wp_nonce_field('ngist_save_program_details', 'ngist_program_details_nonce');
    
    $duration = get_post_meta($post->ID, '_program_duration', true);
    $level = get_post_meta($post->ID, '_program_level', true);
    $requirements = get_post_meta($post->ID, '_program_requirements', true);
    $career_prospects = get_post_meta($post->ID, '_program_career_prospects', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="program_duration"><?php _e('Duration', 'ngist-theme'); ?></label></th>
            <td><input type="text" id="program_duration" name="program_duration" value="<?php echo esc_attr($duration); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="program_level"><?php _e('Level', 'ngist-theme'); ?></label></th>
            <td>
                <select id="program_level" name="program_level">
                    <option value=""><?php _e('Select Level', 'ngist-theme'); ?></option>
                    <option value="ND" <?php selected($level, 'ND'); ?>><?php _e('National Diploma (ND)', 'ngist-theme'); ?></option>
                    <option value="HND" <?php selected($level, 'HND'); ?>><?php _e('Higher National Diploma (HND)', 'ngist-theme'); ?></option>
                    <option value="Certificate" <?php selected($level, 'Certificate'); ?>><?php _e('Certificate', 'ngist-theme'); ?></option>
                    <option value="Professional" <?php selected($level, 'Professional'); ?>><?php _e('Professional Training', 'ngist-theme'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="program_requirements"><?php _e('Entry Requirements', 'ngist-theme'); ?></label></th>
            <td><textarea id="program_requirements" name="program_requirements" rows="4" class="large-text"><?php echo esc_textarea($requirements); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="program_career_prospects"><?php _e('Career Prospects', 'ngist-theme'); ?></label></th>
            <td><textarea id="program_career_prospects" name="program_career_prospects" rows="4" class="large-text"><?php echo esc_textarea($career_prospects); ?></textarea></td>
        </tr>
    </table>
    <?php
}

/**
 * Faculty Details Meta Box Callback
 */
function ngist_faculty_details_callback($post) {
    wp_nonce_field('ngist_save_faculty_details', 'ngist_faculty_details_nonce');
    
    $position = get_post_meta($post->ID, '_faculty_position', true);
    $qualifications = get_post_meta($post->ID, '_faculty_qualifications', true);
    $specialization = get_post_meta($post->ID, '_faculty_specialization', true);
    $email = get_post_meta($post->ID, '_faculty_email', true);
    $phone = get_post_meta($post->ID, '_faculty_phone', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="faculty_position"><?php _e('Position', 'ngist-theme'); ?></label></th>
            <td><input type="text" id="faculty_position" name="faculty_position" value="<?php echo esc_attr($position); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="faculty_qualifications"><?php _e('Qualifications', 'ngist-theme'); ?></label></th>
            <td><textarea id="faculty_qualifications" name="faculty_qualifications" rows="3" class="large-text"><?php echo esc_textarea($qualifications); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="faculty_specialization"><?php _e('Specialization', 'ngist-theme'); ?></label></th>
            <td><input type="text" id="faculty_specialization" name="faculty_specialization" value="<?php echo esc_attr($specialization); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="faculty_email"><?php _e('Email', 'ngist-theme'); ?></label></th>
            <td><input type="email" id="faculty_email" name="faculty_email" value="<?php echo esc_attr($email); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="faculty_phone"><?php _e('Phone', 'ngist-theme'); ?></label></th>
            <td><input type="text" id="faculty_phone" name="faculty_phone" value="<?php echo esc_attr($phone); ?>" class="regular-text" /></td>
        </tr>
    </table>
    <?php
}

/**
 * Event Details Meta Box Callback
 */
function ngist_event_details_callback($post) {
    wp_nonce_field('ngist_save_event_details', 'ngist_event_details_nonce');
    
    $date = get_post_meta($post->ID, '_event_date', true);
    $time = get_post_meta($post->ID, '_event_time', true);
    $location = get_post_meta($post->ID, '_event_location', true);
    $organizer = get_post_meta($post->ID, '_event_organizer', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="event_date"><?php _e('Event Date', 'ngist-theme'); ?></label></th>
            <td><input type="date" id="event_date" name="event_date" value="<?php echo esc_attr($date); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="event_time"><?php _e('Event Time', 'ngist-theme'); ?></label></th>
            <td><input type="time" id="event_time" name="event_time" value="<?php echo esc_attr($time); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="event_location"><?php _e('Location', 'ngist-theme'); ?></label></th>
            <td><input type="text" id="event_location" name="event_location" value="<?php echo esc_attr($location); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="event_organizer"><?php _e('Organizer', 'ngist-theme'); ?></label></th>
            <td><input type="text" id="event_organizer" name="event_organizer" value="<?php echo esc_attr($organizer); ?>" class="regular-text" /></td>
        </tr>
    </table>
    <?php
}

/**
 * Save Meta Box Data
 */
function ngist_save_meta_boxes($post_id) {
    // Check if user has permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save Program Details
    if (isset($_POST['ngist_program_details_nonce']) && wp_verify_nonce($_POST['ngist_program_details_nonce'], 'ngist_save_program_details')) {
        if (isset($_POST['program_duration'])) {
            update_post_meta($post_id, '_program_duration', sanitize_text_field($_POST['program_duration']));
        }
        if (isset($_POST['program_level'])) {
            update_post_meta($post_id, '_program_level', sanitize_text_field($_POST['program_level']));
        }
        if (isset($_POST['program_requirements'])) {
            update_post_meta($post_id, '_program_requirements', sanitize_textarea_field($_POST['program_requirements']));
        }
        if (isset($_POST['program_career_prospects'])) {
            update_post_meta($post_id, '_program_career_prospects', sanitize_textarea_field($_POST['program_career_prospects']));
        }
    }
    
    // Save Faculty Details
    if (isset($_POST['ngist_faculty_details_nonce']) && wp_verify_nonce($_POST['ngist_faculty_details_nonce'], 'ngist_save_faculty_details')) {
        if (isset($_POST['faculty_position'])) {
            update_post_meta($post_id, '_faculty_position', sanitize_text_field($_POST['faculty_position']));
        }
        if (isset($_POST['faculty_qualifications'])) {
            update_post_meta($post_id, '_faculty_qualifications', sanitize_textarea_field($_POST['faculty_qualifications']));
        }
        if (isset($_POST['faculty_specialization'])) {
            update_post_meta($post_id, '_faculty_specialization', sanitize_text_field($_POST['faculty_specialization']));
        }
        if (isset($_POST['faculty_email'])) {
            update_post_meta($post_id, '_faculty_email', sanitize_email($_POST['faculty_email']));
        }
        if (isset($_POST['faculty_phone'])) {
            update_post_meta($post_id, '_faculty_phone', sanitize_text_field($_POST['faculty_phone']));
        }
    }
    
    // Save Event Details
    if (isset($_POST['ngist_event_details_nonce']) && wp_verify_nonce($_POST['ngist_event_details_nonce'], 'ngist_save_event_details')) {
        if (isset($_POST['event_date'])) {
            update_post_meta($post_id, '_event_date', sanitize_text_field($_POST['event_date']));
        }
        if (isset($_POST['event_time'])) {
            update_post_meta($post_id, '_event_time', sanitize_text_field($_POST['event_time']));
        }
        if (isset($_POST['event_location'])) {
            update_post_meta($post_id, '_event_location', sanitize_text_field($_POST['event_location']));
        }
        if (isset($_POST['event_organizer'])) {
            update_post_meta($post_id, '_event_organizer', sanitize_text_field($_POST['event_organizer']));
        }
    }
}
add_action('save_post', 'ngist_save_meta_boxes');

/**
 * Customizer Settings
 */
function ngist_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('ngist_hero', array(
        'title'    => __('Hero Section', 'ngist-theme'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Noble Genius Institute of Science and Technology',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero Title', 'ngist-theme'),
        'section' => 'ngist_hero',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'Innovating Science and Technology Education for Tomorrow\'s Leaders',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Hero Subtitle', 'ngist-theme'),
        'section' => 'ngist_hero',
        'type'    => 'textarea',
    ));
    
    $wp_customize->add_setting('hero_background', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background', array(
        'label'   => __('Hero Background Image', 'ngist-theme'),
        'section' => 'ngist_hero',
    )));
    
    // Contact Information
    $wp_customize->add_section('ngist_contact', array(
        'title'    => __('Contact Information', 'ngist-theme'),
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('contact_phone', array(
        'default'           => '08065758399',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label'   => __('Phone Number', 'ngist-theme'),
        'section' => 'ngist_contact',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('contact_email', array(
        'default'           => 'ngisatedu@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label'   => __('Email Address', 'ngist-theme'),
        'section' => 'ngist_contact',
        'type'    => 'email',
    ));
    
    $wp_customize->add_setting('contact_address', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('contact_address', array(
        'label'   => __('Address', 'ngist-theme'),
        'section' => 'ngist_contact',
        'type'    => 'textarea',
    ));
}
add_action('customize_register', 'ngist_customize_register');

/**
 * AJAX Handler for Contact Forms
 */
function ngist_handle_contact_form() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'ngist_nonce')) {
        wp_die('Security check failed');
    }
    
    // Sanitize form data
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);
    
    // Send email
    $to = get_theme_mod('contact_email', 'ngisatedu@gmail.com');
    $headers = array('Content-Type: text/html; charset=UTF-8', 'From: ' . $name . ' <' . $email . '>');
    
    $email_subject = 'Contact Form Submission: ' . $subject;
    $email_message = '<h3>New Contact Form Submission</h3>';
    $email_message .= '<p><strong>Name:</strong> ' . $name . '</p>';
    $email_message .= '<p><strong>Email:</strong> ' . $email . '</p>';
    $email_message .= '<p><strong>Subject:</strong> ' . $subject . '</p>';
    $email_message .= '<p><strong>Message:</strong></p>';
    $email_message .= '<p>' . nl2br($message) . '</p>';
    
    if (wp_mail($to, $email_subject, $email_message, $headers)) {
        wp_send_json_success('Message sent successfully!');
    } else {
        wp_send_json_error('Failed to send message. Please try again.');
    }
}
add_action('wp_ajax_ngist_contact_form', 'ngist_handle_contact_form');
add_action('wp_ajax_nopriv_ngist_contact_form', 'ngist_handle_contact_form');

/**
 * Security Enhancements
 */
// Remove WordPress version from head
remove_action('wp_head', 'wp_generator');

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Remove unnecessary meta tags
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

// Limit login attempts (basic implementation)
function ngist_limit_login_attempts() {
    $attempts = get_transient('ngist_login_attempts_' . $_SERVER['REMOTE_ADDR']);
    if ($attempts && $attempts >= 5) {
        wp_die('Too many login attempts. Please try again later.');
    }
}
add_action('wp_login_failed', function() {
    $attempts = get_transient('ngist_login_attempts_' . $_SERVER['REMOTE_ADDR']) ?: 0;
    set_transient('ngist_login_attempts_' . $_SERVER['REMOTE_ADDR'], $attempts + 1, 15 * MINUTE_IN_SECONDS);
});

/**
 * Performance Optimizations
 */
// Remove query strings from static resources
function ngist_remove_query_strings($src) {
    $parts = explode('?ver', $src);
    return $parts[0];
}
add_filter('script_loader_src', 'ngist_remove_query_strings', 15, 1);
add_filter('style_loader_src', 'ngist_remove_query_strings', 15, 1);

// Defer JavaScript loading
function ngist_defer_scripts($tag, $handle, $src) {
    $defer_scripts = array('ngist-scripts', 'aos-js', 'anime-js', 'splide-js');
    if (in_array($handle, $defer_scripts)) {
        return '<script src="' . $src . '" defer></script>' . "\n";
    }
    return $tag;
}
add_filter('script_loader_tag', 'ngist_defer_scripts', 10, 3);

/**
 * Helper Functions
 */
function ngist_get_program_meta($post_id, $key) {
    return get_post_meta($post_id, '_program_' . $key, true);
}

function ngist_get_faculty_meta($post_id, $key) {
    return get_post_meta($post_id, '_faculty_' . $key, true);
}

function ngist_get_event_meta($post_id, $key) {
    return get_post_meta($post_id, '_event_' . $key, true);
}

function ngist_format_date($date) {
    return date_i18n(get_option('date_format'), strtotime($date));
}

function ngist_format_time($time) {
    return date_i18n(get_option('time_format'), strtotime($time));
}