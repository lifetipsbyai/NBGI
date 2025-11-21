# WordPress Integration Guide - Noble Genius Institute

## Overview
This guide provides step-by-step instructions for converting the HTML prototype into a fully functional WordPress website with a custom theme and user-friendly backend management.

## Prerequisites
- WordPress hosting (recommended: SiteGround or Bluehost)
- WordPress installation (latest version)
- FTP access or hosting file manager
- Basic understanding of WordPress administration

## Step 1: Theme Setup

### 1.1 Create Theme Structure
```
/wp-content/themes/ngist-theme/
├── style.css
├── index.php
├── header.php
├── footer.php
├── functions.php
├── page.php
├── single.php
├── archive.php
├── template-parts/
│   ├── content-page.php
│   ├── content-single.php
│   └── content-news.php
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
└── templates/
    ├── template-home.php
    ├── template-about.php
    ├── template-programs.php
    ├── template-admissions.php
    ├── template-news-events.php
    └── template-contact.php
```

### 1.2 Theme Files Setup

**style.css**
```css
/*
Theme Name: NGIST Theme
Description: Custom theme for Noble Genius Institute of Science and Technology
Author: Your Name
Version: 1.0
*/

/* Import Tailwind CSS */
@import url('https://cdn.tailwindcss.com');

/* Custom styles */
:root {
    --primary-blue: #1e40af;
    --secondary-blue: #3b82f6;
    --accent-teal: #0891b2;
}

/* Add your custom styles here */
```

**functions.php**
```php
<?php
// Theme setup
function ngist_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-list', 'gallery', 'caption'));
    
    // Register menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'ngist-theme'),
        'footer' => __('Footer Menu', 'ngist-theme')
    ));
    
    // Add image sizes
    add_image_size('hero-image', 1920, 1080, true);
    add_image_size('card-image', 400, 300, true);
}
add_action('after_setup_theme', 'ngist_theme_setup');

// Enqueue scripts and styles
function ngist_enqueue_scripts() {
    // Enqueue Tailwind CSS
    wp_enqueue_script('tailwind', 'https://cdn.tailwindcss.com', array(), null, false);
    
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap', array(), null);
    
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), null);
    
    // Enqueue Animation Libraries
    wp_enqueue_style('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), null);
    wp_enqueue_script('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null, true);
    
    // Enqueue Splide Carousel
    wp_enqueue_style('splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css', array(), null);
    wp_enqueue_script('splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), null, true);
    
    // Enqueue custom scripts
    wp_enqueue_script('ngist-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'ngist_enqueue_scripts');

// Register custom post types
function ngist_register_post_types() {
    // Programs post type
    register_post_type('program', array(
        'labels' => array(
            'name' => __('Programs'),
            'singular_name' => __('Program')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'programs')
    ));
    
    // Events post type
    register_post_type('event', array(
        'labels' => array(
            'name' => __('Events'),
            'singular_name' => __('Event')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'events')
    ));
}
add_action('init', 'ngist_register_post_types');

// Customizer settings
function ngist_customize_register($wp_customize) {
    // Add sections for theme options
    $wp_customize->add_section('ngist_theme_options', array(
        'title' => __('Theme Options', 'ngist-theme'),
        'priority' => 30
    ));
    
    // Add settings and controls here
}
add_action('customize_register', 'ngist_customize_register');
?>
```

## Step 2: Page Templates

### 2.1 Home Page Template
**template-home.php**
```php
<?php
/*
Template Name: Home Page
*/
get_header();
?>

<!-- Hero Section -->
<section class="hero-bg flex items-center justify-center relative">
    <div class="relative z-10 text-center text-white max-w-4xl mx-auto px-4">
        <h1 class="font-display text-5xl md:text-7xl font-bold mb-6">
            <?php echo get_theme_mod('hero_title', 'Innovating Science & Technology Education'); ?>
        </h1>
        <p class="text-xl md:text-2xl mb-8 opacity-90 max-w-2xl mx-auto">
            <?php echo get_theme_mod('hero_subtitle', 'Empowering the next generation of innovators'); ?>
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo get_permalink(get_page_by_path('programs')); ?>" class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors text-lg">
                Explore Programs
            </a>
            <a href="<?php echo get_permalink(get_page_by_path('admissions')); ?>" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors text-lg">
                Apply Now
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
?>
```

## Step 3: Plugin Integration

### 3.1 Required Plugins
Install and activate the following plugins:

1. **Elementor Pro** - Page builder for easy content management
2. **Advanced Custom Fields** - Custom fields for dynamic content
3. **Contact Form 7** - Contact forms
4. **The Events Calendar** - Event management
5. **Yoast SEO** - SEO optimization
6. **Wordfence** - Security
7. **UpdraftPlus** - Backup management
8. **WP Rocket** - Performance optimization

### 3.2 Plugin Configuration

**Contact Form 7 Setup**
```
[contact-form-7 id="123" title="Contact Form"]
```

**The Events Calendar Setup**
- Create events for workshops, seminars, and important dates
- Configure calendar views and event details
- Set up RSVP functionality

## Step 4: Content Management

### 4.1 Creating Pages
Create the following pages in WordPress:

1. **Home** - Use Home Page template
2. **About Us** - Use default template
3. **Academic Programs** - Use Programs template
4. **Admissions** - Use Admissions template
5. **News & Events** - Use News & Events template
6. **Contact Us** - Use Contact template

### 4.2 Menu Setup
Create a primary menu with the following structure:
- Home
- About Us
  - Mission & Vision
  - History
  - Governance
  - Accreditation
- Academic Programs
  - National Diploma (ND)
  - Higher National Diploma (HND)
  - Certificate Programs
- Admissions
  - Application Process
  - Requirements
  - Fees & Financial Aid
  - Important Dates
- Research & Innovation
- News & Events
- Contact Us

### 4.3 Widget Areas
Register widget areas in functions.php:
```php
// Register widget areas
function ngist_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer Widget Area', 'ngist-theme'),
        'id' => 'footer-widgets',
        'description' => __('Widgets for the footer area'),
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));
}
add_action('widgets_init', 'ngist_widgets_init');
```

## Step 5: Custom Fields Setup

### 5.1 Programs Custom Fields
Using Advanced Custom Fields, create fields for:
- Program Type (ND, HND, Certificate)
- Duration
- Course Overview
- Entry Requirements
- Career Prospects
- Tuition Fees

### 5.2 Events Custom Fields
Create fields for:
- Event Date
- Event Time
- Location
- Event Type
- Registration Link
- Featured Image

## Step 6: Theme Customization

### 6.1 Customizer Settings
Add theme customization options:
- Logo upload
- Color scheme selection
- Typography settings
- Social media links
- Contact information

### 6.2 Dynamic Content
Replace static content with dynamic WordPress functions:
```php
// Dynamic logo
<?php the_custom_logo(); ?>

// Dynamic navigation
<?php wp_nav_menu(array('theme_location' => 'primary')); ?>

// Dynamic content
<?php the_content(); ?>

// Dynamic post loop
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!-- Post content -->
<?php endwhile; endif; ?>
```

## Step 7: Performance Optimization

### 7.1 Image Optimization
- Use WordPress image sizes
- Implement lazy loading
- Optimize images before upload

### 7.2 Caching
Configure WP Rocket for:
- Page caching
- Browser caching
- Database optimization
- CDN integration

### 7.3 Security
Configure Wordfence for:
- Firewall protection
- Malware scanning
- Login security
- Regular backups

## Step 8: SEO Setup

### 8.1 Yoast SEO Configuration
- Set up meta titles and descriptions
- Configure XML sitemap
- Set up social media meta tags
- Configure breadcrumbs

### 8.2 Content Optimization
- Optimize all pages for target keywords
- Add alt text to images
- Create SEO-friendly URLs
- Set up internal linking

## Step 9: Testing & Launch

### 9.1 Testing Checklist
- [ ] All pages load correctly
- [ ] Navigation menus work
- [ ] Contact forms function
- [ ] Images display properly
- [ ] Mobile responsiveness
- [ ] Cross-browser compatibility
- [ ] Page load speed
- [ ] SEO elements
- [ ] Security features

### 9.2 Launch Preparation
- Set up Google Analytics
- Configure Google Search Console
- Test all functionality
- Create backup
- Set up monitoring

## Step 10: Training Materials

### 10.1 Staff Training
Create training documentation for:
- WordPress dashboard navigation
- Content creation and editing
- Media management
- Plugin usage
- Backup procedures
- Security best practices

### 10.2 User Roles
Set up appropriate user roles:
- Administrator (full access)
- Editor (content management)
- Author (content creation)
- Contributor (limited access)

## Maintenance

### Regular Tasks
- WordPress and plugin updates
- Security scans
- Performance monitoring
- Content updates
- Backup verification
- SEO monitoring

### Support
- Provide ongoing technical support
- Regular maintenance checks
- Content updates as needed
- Performance optimization
- Security monitoring

## Conclusion
This WordPress integration provides a robust, scalable, and user-friendly website solution for Noble Genius Institute. The custom theme and plugin integration ensure easy content management while maintaining the professional design and functionality of the original prototype.

For technical support or additional customization, please contact the development team.